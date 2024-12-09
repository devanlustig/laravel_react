  <table class="table table-bordered">

    <thead>
     <tr>
        <th scope="col">
            GAMBAR
        </th>
        <th scope="col">
            <a href="{{ route('posts.index', ['sort_by' => 'title', 'sort_order' => request('sort_order') == 'asc' ? 'desc' : 'asc']) }}">JUDUL</a>
            @if(request('sort_by') == 'title')
                @if(request('sort_order') == 'asc')
                    <i style="color:blue;">↓</i>
                @else
                    <i style="color:blue;">↑</i>
                @endif
            @endif
        </th>
        <th scope="col">
            CONTENT
        </th>
        <th scope="col">STATUS</th>
        <th scope="col">AKSI</th>
    </tr>
    </thead>

    <tbody>
      @forelse ($posts as $post)
        <tr>
            <td class="text-center">
                <img src="{{ 'storage/posts/'.$post->image }}" class="rounded" style="width: 150px">
            </td>
            <td>{{ $post->title }}</td>
            <td>{!! $post->content !!}</td>
            <td>
                @if(isset($post->status))
                    @if($post->status == 1)
                        <p class="text-success text-center">Actived</p>
                    @elseif($post->status == 2)
                        <p class="text-warning text-center">Inactived</p>
                    @elseif($post->status == 3)
                        <p class="text-danger text-center">Banned</p>
                    @endif
                @endif
            </td>

            <td class="text-center">
                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('posts.destroy', $post->id) }}" method="POST">
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                </form>
            </td>
        </tr>
      @empty
          <div class="alert alert-danger">
              Data Post belum Tersedia.
          </div>
      @endforelse
    </tbody>
    
</table>  
{{ $posts->links() }}