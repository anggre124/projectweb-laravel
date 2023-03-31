<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\siswa;
use Illuminate\Http\Request;



class siswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        if (strlen($katakunci)) {
            $data = siswa::where('nisn', 'like', "%$katakunci%")
                ->orWhere('nama', 'like', "%$katakunci%")
                ->orWhere('kelas', 'like', "%$katakunci%")
                ->orWhere('alamat', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        }else{
             $data = siswa::orderBy('nisn','desc')->paginate(9);
        }
       
        return view('siswa/index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswa/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nisn', $request->nisn);
        Session::flash('nama', $request->nama);
        Session::flash('kelas', $request->kelas);
        Session::flash('alamat', $request->alamat);
        $request->validate([
            'nisn'=>'required|numeric|unique:siswa,nisn',
            'nama'=>'required',
            'kelas'=>'required',
            'alamat'=>'required',
        ],[
            'nisn.required'=>'NISN belum diisi',
            'nisn.numeric'=>'NISN harus dalam bentuk angka',
            'nisn.unique'=>'NISN sudah ada',
            'nama.required'=>'Nama belum diisi',
            'kelas.required'=>'Kelas belum diisi',
            'alamat.required'=>'Alamat belum diisi',
        ]);
        $data = [
            'nisn'=>$request->nisn,
            'nama'=>$request->nama,
            'kelas'=>$request->kelas,
            'alamat'=>$request->alamat,
        ];
        siswa::create($data);
        return redirect()->to('siswa')->with('success','Data berhasil disimpan');
       
        
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
        $data = siswa::where('nisn',$id)->first();
        return view('siswa.edit')->with('data', $data);
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
        $request->validate([
            
            'nama'=>'required',
            'kelas'=>'required',
            'alamat'=>'required',
        ],[
            
            'nama.required'=>'Nama belum diisi',
            'kelas.required'=>'Kelas belum diisi',
            'alamat.required'=>'Alamat belum diisi',
        ]);
        $data = [
            
            'nama'=>$request->nama,
            'kelas'=>$request->kelas,
            'alamat'=>$request->alamat,
        ];
        siswa::where('nisn', $id)->update($data);
        return redirect()->to('siswa')->with('success','Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        siswa::where('nisn',$id)->delete();
        return redirect()->to('siswa')->with('success','Data berhasil disimpan');
    }
}
