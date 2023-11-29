@extends('afterlogin')

@section('container')
    <div class="container mt-5 mb-5">
    <h2 class="m-100">Tambah Departemen</h2>

        <div class="row">
            <div class="col-md-12">
                    <div class="card-body">
                        <form action="{{ route('postDept') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf

                            <div class="form-group mt-4">
                                <label class="font-weight-bold">Nama Departemen</label>
                                <input type="text" class="form-control" name="nama" value="" placeholder="Masukkan Nama Departemen" required>
                            </div>

                            <div class="form-group mt-4">
                            <label for="exampleInputEmail1" class="form-label"
                                >Negara</label
                                >
                                <select class="form-select" aria-label="Default select example" name="negara" placeholder="Pilih" required>
                                <option selected disbled hidden></option>
                                @foreach($country as $c)
                                <option value="{{$c->CountryId}}">{{$c->CountryName}}</option>
                                @endforeach

                                </select>
                            </div>

                        

                            <div class="mt-4">

                                <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                                <button type="reset" class="btn btn-md btn-warning">RESET</button>
                            </div>

                        </form> 
                    </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>

@endsection