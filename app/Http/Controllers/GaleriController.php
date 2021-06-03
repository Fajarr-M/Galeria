<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;
use App\Models\Album;
use File;
use Image;
use Auth;

class GaleriController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batas = 3;
        $galeri = Galeri::orderBy('id', 'desc')->paginate($batas);
        $no = $batas * ($galeri->currentPage() -1);
        return view('admin.galeri.index', compact('galeri','no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $album = Album::all();
        return view('admin.galeri.create', compact('album'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_galeri'=>'required',
            'keterangan'=>'required',
            'foto'=>'required|image|mimes:jpg,jpeg,png'
        ]);

        $galeri = New Galeri;
        $galeri->nama_galeri = $request->nama_galeri;
        $galeri->keterangan = $request->keterangan;
        $galeri->id_album = $request->id_album;
        $galeri->id_user = Auth::id();

        $foto = $request->foto;
        $namafile = time().'.'.$foto->getClientOriginalExtension();

        Image::make($foto)->resize(150,150)
        ->save('storage/thumb/'.$namafile);
        $foto->move('storage/images/',$namafile);

        $galeri->foto = $namafile;
        $galeri->save();
        return redirect('/galeri')->with('status','Data Galeri Foto berhasil disimpan');
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
        $album = Album::all();
        $galeri = Galeri::find($id);
        return view('admin.galeri.edit',compact('album','galeri'));
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
        $galeri = Galeri::find($id);
        if ($request->has('foto')){
            $galeri->nama_galeri = $request->nama_galeri;
            $galeri->keterangan = $request->keterangan;
            $galeri->id_album = $request->id_album;

            $foto = $request->foto;
            $namafile = time().'.'.$foto->getClientOriginalExtension();

            Image::make($foto)->resize(150,150)
            ->save('storage/thumb/'.$namafile);
            $foto->move('storage/images/',$namafile);

            $galeri->foto = $namafile;
        }
         else{
             $galeri->nama_galeri = $request->nama_galeri;
             $galeri->keterangan = $request->keterangan;
             $galeri->id_album = $request->id_album;
            }

         $galeri->update();
         return redirect('/galeri')->with('status','Data Album berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $galeri = Galeri::find($id);
        $namafile = $galeri->foto;
        File::delete('storage/thumb/'.$namafile);
        File::delete('storage/images/'.$namafile);
        $galeri->delete();
        return redirect('/galeri')->with('status','Data Galeri Foto Berhasil Dihapus');
    }
}
