@extends('layouts.app')

@section('content')
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body table-responsive">
                        <div class="row">
                            <div class="col-md-9 float-left">
                            <a href="{{ route('posts.create') }}" class="btn btn-md btn-success mb-3">TAMBAH POST</a>
                            </div>
                             <div class="col-md-3 float-right">
                                 <form class="mb-3" id="searchForm">
                                    <div class="input-group">
                                        <input type="text" name="search" id="searchInput" class="form-control" placeholder="Search...">
                                    </div>
                                </form>
                             </div>
                        </div>

                        <div id="tableContainer">
                            @include('posts._table', ['posts' => $posts])
                        </div>

                    </div>
                </div>
    @endsection
            
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif

    </script>

    <script>
        $(document).ready(function() {
            $('#searchInput').on('input', function() {
                clearTimeout($(this).data('timer'));
                $(this).data('timer', setTimeout(function() {
                    $.ajax({
                        url: '{{ route('postsearch') }}',
                        method: 'GET',
                        data: $('#searchForm').serialize(),
                        success: function(response) {
                            $('#tableContainer').html(response);
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                }, 500));
            });
        });
    </script>



</body>
</html>