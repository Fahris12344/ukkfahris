<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{

    public function index()
    {
        $albums = Album::all();
        return view('album.index', compact('albums'));
    }

    public function create()
    {
        //
        return view('album.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'nullable|string'
        ]);

        Album::create([
            'nama' => $request->nama,
            'deskripsi'=> $request->deskripsi ?? '',
            'user_id' => Auth::id()
        ]);

        return redirect()->route('album.index')->with('success','Album baru berhasil ditambahkan');
    }

    public function show(string $id)
    {
        //
        $albums = Album::all();
         return view('album.show',compact('albums'));
    }


    public function edit(string $id)
    {
        //
        $albums = Album::find($id);
        return view('album.edit',compact('albums'));
    }

    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable',
            'user_id' => Auth::id()
        ]);

        $albums = Album::find($id);
        

    }

    public function destroy(string $id)
    {
        //
        $album = Album::find($id);
        $album->delete();
        return redirect()->route('album.index')->with('success','Dara berhasil di hapus');

    }
}
