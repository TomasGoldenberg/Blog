@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear Articulo</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form 
                        action="{{ route('posts.store') }}" 
                        method="POST" 
                        enctype="multipart/form-data"
                        
                    >

                        <div class="form-group">
                            <label >Titulo *</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>

                        <div class="form-group custom-file">
                            <input type="file"class="custom-file-input" name="file" id="image">
                            <label class="custom-file-label"for="image" data-browse="Elige una imagen"><i class="far fa-file-image"></i> Elige una imagen</label>                           
                        </div>

                        <div class="form-group">
                            <label >Contenido *</label>
                            <textarea name="body" required rows="6" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label >Contenido embebido</label>
                            <textarea name="iframe" class="form-control"></textarea>
                        </div>

                        <div class="form-group text-center ">
                            @csrf
                            <input type="submit" value="Crear !" class="btn btn-outline-primary btn-lg">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
