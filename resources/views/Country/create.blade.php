@extends('afterlogin')

@section('container')
    <div class="container mt-5 mb-5">
    <h2 class="m-100">Tambah Negara</h2>

        <div class="row">
            <div class="col-md-12">
                    <div class="card-body">
                        <form action="{{ url('country/add') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf

                            <div class="form-group mt-4">
                                <label class="font-weight-bold">Negara</label>
                                <input type="text" class="form-control" name="negara" value="" placeholder="Masukkan Nama Negara">
                            </div>

                            <div class="form-group mt-4">
                            <label for="exampleInputEmail1" class="form-label"
                                >Benua</label
                                >
                                <select class="form-select" aria-label="Default select example" name="benua">
                                <option selected>Select</option>
                                <option value="Asia">Asia</option>
                                <option value="Eropa">Eropa</option>
                                <option value="Afrika">Afrika</option>
                                <option value="Amerika Utara">Amerika Utara</option>
                                <option value="Amerika Selatan">Amerika Selatan</option>
                                <option value="Australia">Australia</option>
                                <option value="Antartika">Antartika</option>
                                </select>
                            </div>

                            <div class="form-group mt-4">
                                <label class="font-weight-bold">Mata Uang</label>
                                <input type="text" class="form-control" name="singkatan" value="" placeholder="Masukkan Mata Uang Negara">
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