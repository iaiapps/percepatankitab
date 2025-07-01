<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class EbookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ebooks = Ebook::all();
        return view('admin.ebook.index', compact('ebooks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ebook.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'ebook_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'ebook_file' => 'required|file|mimes:pdf|max:20480', // Max 20MB
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Buat folder jika belum ada
        if (!File::exists(public_path('ebook-file'))) {
            File::makeDirectory(public_path('ebook-file'), 0755, true);
        }

        // Upload PDF
        $file = $request->file('ebook_file');
        $fileName = Str::slug($request->ebook_name) . '_' . time() . '.' . $file->getClientOriginalExtension();
        $filePath = 'ebook-file/' . $fileName;
        $fileSize = $file->getSize();


        // simpan di folder public
        $file->move(public_path('ebook-file'), $fileName);



        // Upload cover image jika ada
        $coverPath = null;
        $coverImage = $request->file('cover_image');
        if ($coverImage != null) {
            $coverName = 'cover_' . time() . '.' . $coverImage->getClientOriginalExtension();
            $coverImage->move(public_path('ebook-file'), $coverName);
            $coverPath = 'ebook-file/' . $coverName;
        }

        // Simpan data
        Ebook::create([
            'ebook_name' => $request->ebook_name,
            'description' => $request->description,
            'ebook_path' => $filePath,
            'file_name' => $fileName,
            'file_size' => $fileSize,
            'cover_image' => $coverPath,
        ]);

        return redirect()->route('ebook.index')
            ->with('success', 'Ebook uploaded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ebook $ebook)
    {
        return view('admin.ebook.show', compact('ebook'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ebook $ebook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ebook $ebook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ebook $ebook)
    {
        // dd($course->all());
        if ($ebook->ebook_path && file_exists(public_path($ebook->ebook_path))) {
            unlink(public_path($ebook->ebook_path));
        }
        if ($ebook->cover_image && file_exists(public_path($ebook->cover_image))) {
            unlink(public_path($ebook->cover_image));
        }
        $ebook->delete();

        return redirect()->route('ebook.index')
            ->with('success', 'Ebook deleted successfully');
    }

    // helper view ebook
    public function view(Ebook $ebook)
    {
        // dd($ebook);
        // // Cek apakah user memiliki akses
        // if (!auth()->check()) {
        //     abort(403, 'You need to login to view this ebook');
        // }

        $filePath = public_path($ebook->ebook_path);

        if (!file_exists($filePath)) {
            abort(404, 'File not found');
        }

        return response()->file($filePath, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $ebook->file_name . '"'
        ]);
    }


    // -------------------------------- handle user -------------------------------- //
    public function userebook()
    {
        $user = Auth::user();
        $id = $user->id;
        $ebooks = Ebook::all();
        return view('user.ebook.index', compact('ebooks', 'user'));
    }
    public function userebookshow($id)
    {
        $course = Ebook::where("id", $id)->first();
        return view('user.ebook.show', compact('course'));
    }
}
