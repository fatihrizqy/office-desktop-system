@extends('afterlogin')

@section('container')

    <div class="container mt-5">
    <h2 class="m-100">Search Result</h2>
    <form action="{{route('searchDepartmentPost')}}" >
        <input type="text" class="form-control my-3" name="nama" value="" placeholder="Cari Nama Departemen" required>
    </form>
        <div class="row">
            <div class="col-md-12">
                    <div class="card-body">
                        <a href="{{ route('createDepartment') }}" class="btn btn-md btn-success mb-3">Tambah</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nama </th>
                                <th scope="col">Negara</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($department as $d)
                                <tr>
                                    <td>{{ $d->DepartementId }}</td>
                                    <td>{{ $d->DeptName }}</td>
                                    <td>{{ $d->countryName }}</td>
                                    <td>
                                        <a href="{{ url('country/edit/'.$d->DepartementId) }}" class="btn btn-mdl btn-primary">Edit</a>
                                        @if($d->DepartementId !==$user)
                                          <a href="{{ url('/department/soft-delete/'.$d->DepartementId) }}" class="btn btn-mdl btn-warning">Hapus Semetara</a>
                                          <a href="{{ url('/department/permanent-delete/'.$d->DepartementId) }}" class="btn btn-mdl btn-danger">Hapus Permanen</a>
                                        @endif
                                      </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                    </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>
@endsection