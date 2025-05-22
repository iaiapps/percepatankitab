<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
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
        //
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
        //
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
        // dd($course);
        try {
            $thumbnailUrl = $this->getYoutubeThumbnail($course->youtube_url, 'high');

            if (!$thumbnailUrl) {
                return false;
            }
            // download gambar
            $image = Http::get($thumbnailUrl)->body();

            // Buat direktori jika belum ada
            $directory = public_path('img-thumbnails');
            if (!File::exists($directory)) {
                File::makeDirectory($directory, 0755, true);
            }

            $file_name = 'yt_' . $course->youtube_id . '_' . time() . '.jpg';
            $path = 'img-thumbnails/' . $file_name;

            file_put_contents(public_path($path), $image);

            $course->update([
                'thumbnail_path' => $path,
                'file_name' => $file_name
            ]);

            return true;
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }
}
