@extends('afterlogin')

@section('container')
    <div class="container mt-5">
    <h2 class="m-100">Folder Menu</h2>
        <div class="row">
            <div class="col-md-12">
                    <div class="card-body">
                        <a href="{{ route('tambahFolder') }}" class="btn btn-md btn-success my-3">Tambah</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">Nomor</th>
                                <th scope="col">Nama Folder</th>
                                <th scope="col">Nama Pengguna</th>
                                <th scope="col">Hak Akses</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach ($folder as $key) {?>
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $key->FolderName }}</td>
                                        <td>{{ $key->EmpName }}</td>
                                        <td>{{ $key->AccessType }}</td>
                                        <td>
                                            <a href="{{ url('folder/edit/'.$key->FolderId) }}" class="btn btn-mdl btn-primary">Edit</a>
                                            <a href="{{ url('folder/deletes/'.$key->FolderId) }}" class="btn btn-mdl btn-warning">Hapus Sementara</a>
                                            <a href="{{ url('folder/delete/'.$key->FolderId) }}" class="btn btn-mdl btn-danger">Hapus Permanen</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                          </table>  
                    </div>
            </div>
        </div>
    </div>
    

    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>

@endsection