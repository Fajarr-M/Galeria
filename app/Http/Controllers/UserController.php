<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Album;
Use App\DataTables\UserDataTable;

class UserController extends Controller
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
        $data = User::get();
        if (request()->ajax()){
            return datatables()->of($data)
            ->addColumn('aksi', function($data){
                $button = "<a href='user/edit/$data->id' class='btn btn-success'>Edit</a>";
                $button .= "<a href='user/delete/$data->id' class='btn btn-danger ms-2'>Hapus</a>";
                  return $button;
            })
            ->rawColumns(['aksi'])
            ->make(true);
        }
        return view('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $album = Album::all();
        return view('admin.user.create', compact('album'));
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
            'name'=>'required',
            'password'=>'required|confirmed|min:8',
            'email'=>'required|email|unique:users'
        ]);

        $user = New User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->level = $request->level;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('/user')->with('status','Data user berhasil disimpan');

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
        $user = User::find($id);
        return view('admin.user.edit',compact('user'));
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
        $user = User::find($id);
        if ($request->input('password')){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->level = $request->level;
            $user->password = bcrypt($request->password);
        }
         else{
            $user->name = $request->name;
            $user->email = $request->email;
            $user->level = $request->level;
            }

         $user->update();
         return redirect('/user')->with('status','Data User berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/user')->with('status','Data User Berhasil Dihapus');
    }
}
