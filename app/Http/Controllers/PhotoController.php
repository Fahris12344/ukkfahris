<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Album;
use Illuminate\Support\Facades\Auth;

class PhotoController extends Controller
{
    /**
     * Menampilkan daftar foto.
     */
    public function index()
    {
        $photos = Photo::with('album', 'user')->where('user_id', Auth::id())->get();

        return view('photo.index', compact('photos'));
    }

    /**
     * Menampilkan form tambah foto.
     */
    public function create()
    {
        $albums = Album::where('user_id', Auth::id())->get();
        return view('photo.create', compact('albums')); // Gunakan file view yang sesuai
    }


    /**
     * Menyimpan data foto baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'album_id' => 'required|exists:albums,id'
        ]);

        $imagePath = $request->file('foto')->store('photos', 'public');

        Photo::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'foto' => $imagePath,
            'album_id' => $request->album_id,
            'user_id' => Auth::id()
        ]);

        return redirect()->route('photo.index')->with('success', 'Foto berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail foto.
     */
    public function show($id)
    {
        $photos =Photo::with('id', $id);
        return view('photo.show', compact('photos'));
    }

    /**
     * Menampilkan form edit foto.
     */
    public function edit(Photo $photo)
    {

    }

    /**
     * Update foto yang sudah ada.
     */
    public function update(Request $request, Photo $photo)
    {

    }

    /**
     * Menghapus foto.
     */
    public function destroy(Photo $photo)
    {
        $photo->delete();
        return redirect()->route('photos.index')->with('success', 'Foto berhasil dihapus.');
    }
}
