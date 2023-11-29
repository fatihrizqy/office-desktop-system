@extends('afterlogin')

@section('container')

    <div class="container mt-5 mb-5">
    <h2 class="m-100">Country Menu</h2>

        <div class="row">
            <div class="col-md-12">
                    <div class="card-body">
                        <form action="{{ route('updateCountry') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @foreach ($country as $data)
                                <input type="hidden" class="form-control" name="id" value="{{ $data->CountryId }}" placeholder="Masukkan Nama Negara">

                                <div class="form-group mt-4">
                                    <label class="font-weight-bold">Negara</label>
                                    <input type="text" class="form-control" name="negara" value="{{ $data->CountryName }}" placeholder="Masukkan Nama Negara">
                                </div>
                                
                                <div class="form-group mt-4">
                                    <label class="font-weight-bold">Benua</label>
                                    <input type="text" class="form-control" name="benua" value="{{ $data->Continent }}" placeholder="Masukkan Benua Negara">
                                </div>
                                
                                <div class="form-group mt-4">
                                    <label class="font-weight-bold">Mata Uang</label>
                                    <input type="text" class="form-control" name="singkatan" value="{{ $data->Currency }}" placeholder="Masukkan Singkatan Negara">
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