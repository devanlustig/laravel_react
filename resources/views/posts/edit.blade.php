@extends('layouts.app')
@section('content')
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">GAMBAR</label>
                                <input type="file" class="form-control" name="image">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">JUDUL</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $post->title) }}" placeholder="Masukkan Judul Post">
                            
                                <!-- error message untuk title -->
                                @error('title')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">KONTEN</label>
                                <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="5" placeholder="Masukkan Konten Post">{{ old('content', $post->content) }}</textarea>
                            
                                <!-- error message untuk content -->
                                @error('content')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                               <label class="font-weight-bold">Status</label>
                                 <select class="form-control" aria-label="Default select" name="status">
                                    <option value="1" <?php if(isset($post->status) && $post->status == 1) echo 'selected'; ?>>Actived</option>
                                    <option value="2" <?php if(isset($post->status) && $post->status == 2) echo 'selected'; ?>>Inactived</option>
                                    <option value="3" <?php if(isset($post->status) && $post->status == 3) echo 'selected'; ?>>Banned</option>
                                </select>
                            </div>

                            <br>
                            <div style="float:right;">
                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            <a href="{{ url()->previous() }}" class="btn btn-md btn-warning">BACK</a>
                            </div>

                        </form> 
                    </div>
                </div>
            
 @endsection   
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    //CKEDITOR.replace( 'content' );
</script>
</body>
</html>