<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Trackvideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;


class TrackvideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tracks = Trackvideo::all();
        return view('admin.track.index', compact('tracks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Trackvideo $trackvideo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trackvideo $trackvideo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trackvideo $trackvideo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trackvideo $trackvideo)
    {
        //
    }

    // helper
    public function manualRun()
    {
        Artisan::call('send:daily-videos');
        $output = Artisan::output();
        return redirect()->route('laporan')->with('success', $output);
    }

    // cek
    public function pengirimanVideo()
    {
        $users = User::where('type', 'pembeli')
            ->whereNotNull('activated_at')
            ->withCount('trackvideos')
            ->get();

        $totalVideos = Course::count();
        $missing = [];

        foreach ($users as $user) {
            $sentVideos = Trackvideo::where('user_id', $user->id)
                ->orderBy('course_id')
                ->pluck('course_id')
                ->toArray();

            $expected = Course::orderBy('id')->pluck('id')->toArray();
            $notSent = array_diff($expected, $sentVideos);

            if (!empty($notSent)) {
                $missing[] = [
                    'user' => $user,
                    'missing_courses' => Course::whereIn('id', $notSent)->get()
                ];
            }

            $user->missing_count = count($notSent);
            $user->should_sent = $totalVideos;
        }

        return view('admin.track.laporan', compact('users', 'missing', 'totalVideos'));
    }
}
