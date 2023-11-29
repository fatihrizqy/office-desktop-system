@extends('afterlogin')

@section('container')
<div class="container mt-5">
    <h2 class="m-100">Dashboard Menu</h2>
    <div class="row mt-5">
        <div class="col-md-12">
                <div class="card-body">
               
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">FolderId</th>
                            <th scope="col">AccessType</th>
                            <th scope="col">EmpName</th>
                            <th scope="col">DeptName</th>
                            <th scope="col">CountryName</th>
                            <th scope="col">Continent</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $d)
                            <tr>
                                <td>{{ $d->FolderId }}</td>
                                <td>{{ $d->AccessType }}</td>
                                <td>{{ $d->EmpName }}</td>
                                <td>{{ $d->DeptName }}</td>
                                <td>{{ $d->CountryName }}</td>
                                <td>{{ $d->Continent }}</td>
                             
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
@endsection