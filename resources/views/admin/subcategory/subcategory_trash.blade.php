@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col-lg-10 m-auto">
            <form id="select_form" action="{{ route('subcategory.select.trash') }}" method="POST">
                @csrf
                @if (session('restored'))
                    <div class="alert alert-success">{{ session('restored') }}</div>
                @endif
                @if (session('force_delete'))
                    <div class="alert alert-warning">{{ session('force_delete') }}</div>
                @endif
                @if (session('selected_restore'))
                <div class="alert alert-success">{{ session('selected_restore') }}</div>
                @endif
                @if (session('selected_delete'))
                    <div class="alert alert-danger">{{ session('selected_delete') }}</div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3>Subcategory Trash List</h3>
                        <button type="submit" value="restore" name="btn" id="restore_btn" style= "height: 31px; width: 128px; line-height: 2px;margin-right: -577px;" class="btn btn-success d-none restore_btn">Restore All</button>
                        <button type="submit" value="delete" name="btn" id="delete_btn" style= "height: 31px; width: 128px; line-height: 2px;" class="btn btn-danger d-none delete_btn">Delete All</button>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderd">
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input id="SelectAll" title="Select All" type="checkbox" class="form-check-input">
                                        <i class="input-frame"></i></label>
                                    </div>
                                </th>
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
                                <td>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input title="Select" type="checkbox" name="subcategories_id[]" value="{{ $subcategory->id }}" class="select-one form-check-input">
                                        <i class="input-frame"></i></label>
                                    </div>
                                </td>
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
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        // delete
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

                    // If All Box Be Checked SelectAll Will Be Checked

        $(".select-one").on('change', function() {
        var allChecked = $(".select-one:checked").length === $(".select-one").length;
        $("#SelectAll").prop("checked", allChecked);

        var anySelected = $(".select-one:checked").length > 0;
        $("#delete_btn").toggleClass("d-none", !anySelected);
        $("#restore_btn").toggleClass("d-none", !anySelected);
        });
        // Check All
        $("#SelectAll").on('click', function(){
        this.checked ? $(".select-one").prop("checked",true) : $(".select-one").prop("checked",false);

        var anySelected = $(".select-one:checked").length > 0;
        $("#delete_btn").toggleClass("d-none", !anySelected);
        $("#restore_btn").toggleClass("d-none", !anySelected);
        })

                    // delete Sweet Alert
            $("#delete_btn").on('click', function(e) {
                e.preventDefault(); // Prevent the default form submission

                // Use SweetAlert to show a confirmation popup
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You want to delete Selected Subcategories. You won\'t be able to revert this!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // If user confirms, submit the form
                        $("#select_form").submit();
                    }
                });
            });
    </script>
@endsection
