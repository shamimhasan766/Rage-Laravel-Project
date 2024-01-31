@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col-lg-10 m-auto">
            @if (session('restored'))
                <div class="alert alert-success">{{ session('restored') }}</div>
            @endif
            @if (session('force_delete'))
                <div class="alert alert-warning">{{ session('force_delete') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Subcategory Trash List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-borderd">
                        <tr>
                            <th>SL</th>
                            <th>Subcategory</th>
                            <th>Category</th>
                            <th>Deleted At</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($subcategories as $sl=>$subcategory)
                        @php
                            $category = App\Models\Category::find($subcategory->category_id);
                        @endphp
                        <tr>
                            <td>{{ $sl+1 }}</td>
                            <td>{{ $subcategory->subcategory }}</td>
                            <td>
                                @if (empty($category))
                                {{ App\Models\Category::onlyTrashed()->find($subcategory->category_id)->name }}
                                @else
                                {{ $category->name; }}
                                @endif
                            </td>
                            <td>{{ $subcategory->deleted_at->diffForHumans() }}</td>
                            <td>
                                <a title="Restore {{ $subcategory->subcategory }}" href="{{ route('restore.subcategory', ['id'=> $subcategory->id]) }}" data-category="" class="edit btn btn-success btn-icon"><i data-feather="rotate-cw"></i></a>
                                <a title="Delete {{ $subcategory->subcategory }}" data-id="{{ $subcategory->id }}" data-name="{{ $subcategory->subcategory }}" class="delete btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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
            $('.delete').on('click', function(){
            let id = $(this).data('id');
            let name = $(this).data('name');
            let deleteUrl = "{{ route('subcategory.force.delete', ['id' => ':id']) }}";
            deleteUrl = deleteUrl.replace(':id', id);

            Swal.fire({
                title: "Are you sure?",
                text: "You Want To Permanently Delete The Subcategory '" + name + "'",
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
