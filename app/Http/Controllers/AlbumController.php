<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Album;
use Illuminate\Support\Facades\Storage;
use File;

class AlbumController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batas = 5;
        $album = Album::orderBy('id')->paginate($batas);
        $no = $batas * ($album->currentPage() -1);
        return view('admin.album.index', compact( 'no', 'album'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.album.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_album'=>'required',
            'gambar'=>'required|image|mimes:jpeg,jpg,png'
        ]);

        $album = New Album;
        $album->nama_album = $request->nama_album;
        $album->album_seo = Str::slug($request->nama_album);

        $gambar = $request->gambar;
        $namafile = time().'.'.$gambar->getClientOriginalExtension();
        $gambar->move('storage/images/',$namafile);

        $album->gambar = $namafile;
        $album->save();
        return redirect('/album')->with('status','Data Album berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album = Album::find($id);
        return view('admin.album.edit',compact('album'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $album = Album::find($id);
        if ($request->has('gambar')){
            $album->nama_album = $request->nama_album;
            $album->album_seo = Str::slug($request->nama_album);

            $gambar = $request->gambar;
            $namafile = time().'.'.$gambar->getClientOriginalExtension();
            $gambar->move('storage/images/',$namafile);
            $album->gambar = $namafile;
        }
         else{
             $album->nama_album = $request->nama_album;
             $album->album_seo=Str::slug($request->nama_album);
         }

         $album->update();
         return redirect('/album')->with('status','Data Album berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = Album::find($id);
        $namafile = $album->gambar;
        File::delete('storage/images/'.$namafile);
        $album->delete();
        return redirect('/album')->with('status','Data Album Berhasil Dihapus');
    }
}
