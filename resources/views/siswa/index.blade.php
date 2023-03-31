@extends('layout.template')
        <!-- START DATA -->
        @section('konten')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <!-- FORM PENCARIAN -->
            <div class="pb-3">
              <form class="d-flex" action="{{ url('siswa/') }}" method="get">
                  <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                  <button class="btn btn-secondary" type="submit">Cari</button>
              </form>
            </div>

            <!-- TOMBOL TAMBAH DATA -->
            <div class="pb-3">
              <a href='{{ url('siswa/create') }}' class="btn btn-primary">+ Tambah Data</a>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="col-md-1">No</th>
                        <th class="col-md-3">NIM</th>
                        <th class="col-md-4">Nama</th>
                        <th class="col-md-2">Kelas</th>
                        <th class="col-md-2">Alamat</th>
                        <th class="col-md-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = $data->firstItem() ?>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $item->nisn }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->kelas }}</td>
                        <td>{{ $item->alamat }}</td>
                        @if (auth()->user()->role_id == '1')
                        <td>
                            <a href='{{ url ('siswa/'.$item->nisn.'/edit')}}' class="btn btn-warning btn-sm">Edit</a>
                            <form onsubmit="return confirm('Yakin akan menghapus data?')"
                            class='d-inline' action="{{ url ('siswa/'.$item->nisn)}}"
                            method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                        </form>
                        </td>
                        @endif
                    </tr>
                    <?php $i++ ?>
                    @endforeach

                </tbody>
            </table>
           {{ $data->withQueryString()->links() }}
      </div>
      <!-- AKHIR DATA -->
        @endsection



{{-- @extends('layout.template')

        <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- FORM PENCARIAN -->
                <div class="pb-3">
                  <form class="d-flex" action="{{url('siswa')}}" method="get">
                      <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                      <button class="btn btn-secondary" type="submit">Cari</button>
                  </form>
                </div>
                
                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                    <a href='{{url('dashboard') }}' class="btn btn-secondary"><< Back</a>
                  <a href='{{ url('siswa/create')}}' class="btn btn-primary">+ Tambah Data</a>
                </div>
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-3">NISN</th>
                            <th class="col-md-4">Nama</th>
                            <th class="col-md-2">Kelas</th>
                            <th class="col-md-2">Alamat</th>
                            <th class="col-md-2">Aksi</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php $i = $data->firstItem()?>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $item->nisn}}</td>
                            <td>{{ $item->nama}}</td>
                            <td>{{ $item->kelas}}</td>
                            <td>{{ $item->alamat}}</td>
                            <td>
                                <a href='{{ url('siswa/'.$item->nisn.'/edit')}}' class="btn btn-warning btn-sm">Edit</a>
                                <form onsubmit="return confirm('Yakin Data dihapus?')" class='d-inline' action="{{url('siswa/'.$item->nisn)}}" method="post">
                                    @csrf
                                    @method("DELETE")
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                                
                            </td>
                        </tr>
                        <?php $i++ ?>
                        @endforeach
                        
                    </tbody> 
                </table>
                {{ $data->links() }}
              
          </div>
          <!-- AKHIR DATA -->
   --}}