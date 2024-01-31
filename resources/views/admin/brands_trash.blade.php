@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col-lg-10 m-auto">
            @if (session('restored'))
                <div class="alert alert-success">{{ session('restored') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @if (session('force_delete'))
                <div class="alert alert-success">{{ session('force_delete') }}</div>
            @endif
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Logo</th>
                            <th>Deleted At</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($brands as $sl=>$brand)

                        <tr>
                            <td>{{ $sl+1 }}</td>
                            <td>{{ $brand->name }}</td>
                            <td><img src="{{ asset($brand->logo) }}" alt=""></td>
                            <td>{{ $brand->deleted_at->diffForHumans() }}</td>
                            <td>
                                <a title="Restore {{ $brand->name }}" href="{{ route('restore.brand', ['id'=> $brand->id]) }}" class="edit btn btn-success btn-icon"><i data-feather="rotate-cw"></i></a>
                                <a title="Permanent Delete {{ $brand->name }}" data-id="{{ $brand->id }}" data-name="{{ $brand->name }}" class="delete btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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
            let deleteUrl = "{{ route('brand.force.delete', ['id' => ':id']) }}";
            deleteUrl = deleteUrl.replace(':id', id);

            Swal.fire({
                title: "Are you sure?",
                text: "You Want TO Delete The Brand '" + name + "'",
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
