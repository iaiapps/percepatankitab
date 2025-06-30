<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        return view('admin.course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.course.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Ekstrak video ID dari URL YouTube
        $videoId = $this->getYoutubeVideoId($request->youtube_url);

        if (!$videoId) {
            return back()->withErrors(['youtube_url' => 'URL YouTube tidak valid'])->withInput();
        }

        $course = Course::create([
            'name' => $request->name,
            'description' => $request->description,
            'youtube_url' => $request->youtube_url,
            'youtube_id' => $videoId,
            'thumbnail_url' => $this->getYoutubeThumbnail($request->youtube_url, 'high'),
        ]);

        // Opsional: Simpan thumbnail ke storage lokal
        $this->saveThumbnailToStorage($course);

        return redirect()->route('course.index');
        // return redirect()->route('courses.show', $course)->with('success', 'Kursus berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('admin.course.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        // dd($course->all());
        if ($course->thumbnail_path && file_exists(public_path($course->thumbnail_path))) {
            unlink(public_path($course->thumbnail_path));
        }
        $course->delete();

        return redirect()->route('course.index')
            ->with('success', 'Course deleted successfully');
    }


    // ------------------------------------------------------ //
    // fungsi helper youtube
    private function getYoutubeVideoId($url)
    {
        $pattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/';
        preg_match($pattern, $url, $matches);
        return $matches[1] ?? null;
    }

    /**
     * Helper: Dapatkan URL thumbnail YouTube
     */
    private function getYoutubeThumbnail($url, $type = 'default')
    {
        $videoId = $this->getYoutubeVideoId($url);

        if (!$videoId) return null;

        $types = [
            'default' => "https://img.youtube.com/vi/{$videoId}/default.jpg",
            'medium' => "https://img.youtube.com/vi/{$videoId}/mqdefault.jpg",
            'high' => "https://img.youtube.com/vi/{$videoId}/hqdefault.jpg",
            'standard' => "https://img.youtube.com/vi/{$videoId}/sddefault.jpg",
            'maxres' => "https://img.youtube.com/vi/{$videoId}/maxresdefault.jpg",
        ];

        return $types[$type] ?? $types['default'];
    }

    /**
     * Helper: Simpan thumbnail ke storage lokal
     */
    private function saveThumbnailToStorage(Course $course)
    {
        try {
            $thumbnailUrl = $this->getYoutubeThumbnail($course->youtube_url, 'high');

            if (!$thumbnailUrl) {
                Log::error('Thumbnail URL not found for course: ' . $course->id);
                return false;
            }

            $image = Http::get($thumbnailUrl)->body();

            $directory = public_path('img-thumbnails');
            $directory = str_replace('/', DIRECTORY_SEPARATOR, $directory);

            if (!File::exists($directory)) {
                Log::info('Creating directory: ' . $directory);
                $made = File::makeDirectory($directory, 0777, true);
                if (!$made) {
                    Log::error('Failed to create directory: ' . $directory);
                    return false;
                }
            }

            $file_name = 'yt_' . $course->youtube_id . '_' . time() . '.jpg';
            $path = 'img-thumbnails' . DIRECTORY_SEPARATOR . $file_name;
            $full_path = public_path($path);
            $full_path = str_replace('/', DIRECTORY_SEPARATOR, $full_path);

            Log::info('Attempting to save thumbnail to: ' . $full_path);
            $bytes = file_put_contents($full_path, $image);

            if ($bytes === false) {
                Log::error('Failed to write file: ' . $full_path);
                return false;
            }

            $course->update([
                'thumbnail_path' => str_replace(DIRECTORY_SEPARATOR, '/', $path), // Simpan dengan forward slash untuk konsistensi URL
                'file_name' => $file_name
            ]);

            return true;
        } catch (\Exception $e) {
            Log::error('Error saving thumbnail: ' . $e->getMessage());
            report($e);
            return false;
        }
    }

    // -------------------------------- handle user -------------------------------- //
    public function usercourse()
    {
        $user = Auth::user();
        $id = $user->id;
        $user_token_code = $user->token_code;
        $payment_token_code = $user->payment->token_code;
        // dd($user->payment->token_code);
        $courses = Course::all();

        if ($user_token_code == $payment_token_code) {
            $permit = true;
        } else {
            $permit = false;
        }
        return view('user.course.index', compact('permit', 'courses', 'user'));
    }

    public function kode(Request $request)
    {
        $id = $request->user_id;
        $kode = $request->kode;

        $user = User::find($id);
        // dd($user);
        $user->update(['token_code' => $kode]);
        return redirect()->back();
    }
}
