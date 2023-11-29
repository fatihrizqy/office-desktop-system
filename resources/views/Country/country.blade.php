@extends('afterlogin')

@section('container')

    <div class="container mt-5">
    <h2 class="m-100">Country Menu</h2>
        <div class="row">
            <div class="col-md-12">
                    <div class="card-body">
                        <a href="{{ route('createCountry') }}" class="btn btn-md btn-success my-3">Tambah</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">Nomor</th>
                                <th scope="col">Negara</th>
                                <th scope="col">Benua</th>
                                <th scope="col">Mata Uang</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; $nomor = 1; foreach ($country as $data) {?>
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->CountryName }}</td>
                                        <td>{{ $data->Continent }}</td>
                                        <td>{{ $data->Currency }}</td>
                                        <td>
                                            <a href="{{ url('country/edit/'.$data->CountryId) }}" class="btn btn-mdl btn-primary">Edit</a>
                                            @if($cid!=$data->CountryId)
                                            <a href="{{ url('country/deletes/'.$data->CountryId) }}" class="btn btn-mdl btn-warning">Hapus Sementara</a>                                                
                                            <a href="{{ url('country/delete/'.$data->CountryId) }}" class="btn btn-mdl btn-danger">Hapus Permanen</a>
                                            @endif
                                        </td>
                                    </tr>
                                <?php } ?>
                                {{-- @forelse ($country as $data)
                                  <tr>
                                      <td>{{ $data->CountryId }}</td>
                                      <td>{{ $data->CountryName }}</td>
                                      <td>{{ $data->Continent }}</td>
                                      <td>{{ $data->Currency }}</td>
                                      <td>
                                          <a href="{{ url('country/edit/'.$data->CountryId) }}" class="btn btn-mdl btn-primary">Edit</a>
                                          <a href="{{ url('country/deletes/'.$data->CountryId) }}" class="btn btn-mdl btn-warning">Hapus Sementara</a>
                                          <a href="{{ url('country/delete/'.$data->CountryId) }}" class="btn btn-mdl btn-danger">Hapus Permanen</a>
                                      </td>
                                  </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Negara belum Tersedia.
                                    </div>
                                @endforelse --}}
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