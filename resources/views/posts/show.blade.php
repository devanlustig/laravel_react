@extends('layouts.app')
@section('content')
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <img src="{{ asset('laravelten/public/storage/posts/'.$post->image) }}" class="rounded" style="width: 150px">

                        <hr>
                        <h4>{{ $post->title }}</h4>
                        <p class="tmt-3">
                            {!! $post->content !!}
                        </p>
                    </div>
                </div>
@endsection            
    
</body>
</html>