@extends('layout.template')


    
    @section('konten')

   <!-- START FORM -->
    <form action='{{ url('siswa/'.$data->nisn)}}' method='post'>
        @csrf
        @method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href='{{url('siswa') }}' class="btn btn-secondary"><< Back</a>
            <div class="mb-3 row">
                <label for="nisn" class="col-sm-2 col-form-label">NISN</label>
                <div class="col-sm-10">
                    {{ $data->nisn}}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama' value="{{ $data->nama}}" id="nama">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='kelas' value="{{ $data->kelas}}" id="kelas">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='alamat' value="{{ $data->alamat}}" id="alamat">
                </div>
        </div>
            <div class="mb-3 row">
                <label for="kelas" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">EDIT</button></div>
                
            </div>
        </div>
       </form>
        <!-- AKHIR FORM -->
    @endsection
    