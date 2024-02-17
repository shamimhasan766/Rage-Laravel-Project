@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-10">
            @if (session('restored'))
                <div class="alert alert-success">{{ session('restored') }}</div>
            @endif
            @if (session('force_delete'))
                <div class="alert alert-danger">{{ session('force_delete') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Trashed Tags</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>SL</th>
                            <th>Tag</th>
                            <th>Deleted At</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($tags as $sl=>$tag)

                        <tr>
                            <td>{{ $sl+1 }}</td>
                            <td>{{ $tag->tag_name }}</td>
                            <td>{{ $tag->deleted_at->diffForHumans() }}</td>
                            <td>
                                <a title="Restore" href="{{ route('restore.tag', $tag->id) }}" class="edit btn btn-success btn-icon"><i data-feather="rotate-cw"></i></a>
                                <a title="Permanent Delete" data-id="{{ $tag->id }}" data-name="{{ $tag->tag_name }}" class="delete btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>

                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
                // delete
        $('.delete').on('click', function(){
            let id = $(this).data('id');
            let name = $(this).data('name');
            let deleteUrl = "{{ route('tag.delete.permanent', ['id' => ':id']) }}";
            deleteUrl = deleteUrl.replace(':id', id);

            Swal.fire({
                title: "Are you sure?",
                text: "You Want TO Delete The Tag '" + name + "'",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, I will Delete!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = deleteUrl;
                }
            });
        });
    </script>

@endsection
