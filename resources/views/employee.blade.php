@extends('afterlogin')

@section('container')

    <div class="container mt-5">
    <h2 class="m-100">Employee Menu</h2>
        <div class="row mt-5">
            <div class="col-md-12">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Departemen </th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($employee as $d)
                                <tr>
                                    <td>{{ $d->EmpName }}</td>
                                    <td>{{ $d->DeptName }}</td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data Post belum Tersedia.
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