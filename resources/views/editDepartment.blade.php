@extends('afterlogin')

@section('container')

    <div class="container mt-5 mb-5">
    <h2 class="m-100">Edit Departemen</h2>

        <div class="row">
            <div class="col-md-12">
                    <div class="card-body">
                        <form action="{{ route('updateDepartment') }}" method="POST" class="mt-5">
                            @csrf
                            @foreach ($department as $data)
                                <input type="hidden" class="form-control" name="id" value="{{ $data->DepartementId }}" placeholder="Masukkan Nama Negara">

                                <div class="form-group">
                                    <label class="font-weight-bold">Nama Departemen</label>
                                    <input type="text" class="form-control" name="nama" value="{{ $data->DeptName }}" placeholder="Masukkan Nama Negara">
                                </div>

                                <div class="form-group mt-4">
                            <label for="exampleInputEmail1" class="form-label"
                                >Benua</label
                                >
                                <select class="form-select" aria-label="Default select example" name="negara">
                                <option value="{{$data->CountryId}}" selected hidden>{{$data->countryName}}</option>

                                @foreach($country as $c)
                                    <option value="{{$c->CountryId}}">{{$c->CountryName}}</option>
                                @endforeach
                                </select>
                            </div>
                                
                         
                                
                            @endforeach
                            <div class="mt-4">

                                <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                                <button type="reset" class="btn btn-md btn-warning">RESET</button>
                            </div>
                        </form> 
                    </div>
            </div>
        </div>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>
@endsection