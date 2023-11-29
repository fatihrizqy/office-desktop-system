@extends('afterlogin')

@section('container')

    <div class="container mt-5 mb-5">
    <h2 class="m-100">Tambah Folder</h2>
        <div class="row">
            <div class="col-md-12">
                
                    <div class="card-body">
                        <form action="{{ route('insertFolder') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mt-4">
                                <label class="font-weight-bold">Nama Folder</label>
                                <input type="text" class="form-control" name="folder" value="" placeholder="Masukkan Nama Folder">
                            </div>

                            <div class="form-group mt-4">
                                <label class="font-weight-bold">Jenis Akses</label>
                                <input type="text" class="form-control" name="akses" value="" placeholder="Masukkan Jenis Akses">
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
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>
@endsection