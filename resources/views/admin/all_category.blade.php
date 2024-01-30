@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-8 m-auto">
            <form id="select_form" action="{{ route('category.select.delete') }}" method="POST">
                @csrf
                @if (session('delete'))
                    <div class="alert alert-danger text-center">{{ session('delete') }}</div>
                @endif
                @if (session('selected_delete'))
                    <div class="alert alert-danger text-center">{{ session('selected_delete') }}</div>
                @endif
                @error('name')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
                <div class="card">
                    <div class="card-header">
                        <h4>Category List</h4>
                        <button type="submit" id="delete_btn" style= "height: 31px; width: 127px; line-height: 2px;" href="" class="btn btn-danger d-none">Delete All</button>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input title="Select All" type="checkbox" class="form-check-input" id="SelectAll">
                                            <i class="input-frame"></i></label>
                                        </div>
                                    </td>
                                    <td>SL</td>
                                    <td>Name</td>
                                    <td>Photo</td>
                                    <td>Slug</td>
                                    <td>Created at</td>
                                    <td>Updated at</td>
                                    <td>Action</td>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($categories as $SL=>$category)

                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input title="Select" name="categories_id[]" type="checkbox" class="select-one form-check-input" value="{{ $category->id }}">
                                            <i class="input-frame"></i></label>
                                        </div>
                                    </td>
                                    <td>{{ $SL+1 }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td><img src="{{ asset($category->photo) }}" alt=""></td>
                                    <td>{{ $category->slug }}</td>
                                    <td>{{ $category->created_at->format('d-M-Y') }}</td>
                                    <td>{{ $category->updated_at == '' ? '' : $category->updated_at->diffForHumans() }}</td>
                                    <td>
                                        <a data-category="{{ json_encode(['id' => $category->id, 'image'=> $category->photo, 'name' => $category->name, 'slug' => $category->slug]) }}" class="edit btn btn-primary shadow btn-xs sharp"><i class="fa fa-edit"></i></a>
                                        <a data-id="{{ $category->id }}" data-name="{{ $category->name }}" class="delete btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
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
            let deleteUrl = "{{ route('category.delete', ['id' => ':id']) }}";
            deleteUrl = deleteUrl.replace(':id', id);

            Swal.fire({
                title: "Are you sure?",
                text: "You Want TO Delete The Category '" + name + "'",
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


                // edit

        $('.edit').on('click', function(){
            let categoryData = $(this).data('category');
            let id = categoryData.id;
            let name = categoryData.name;
            let slug = categoryData.slug;
            let image = categoryData.image;

            let editUrl = "{{ route('category.edit', ['id' => ':id']) }}";
            editUrl = editUrl.replace(':id', id);
            let csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;

            Swal.fire({
                title: "Edit '"+ name + "'",
                html:
                    `<label for="name">Name</label>
                    <input type="text" id="name" name="name" class="swal2-input" placeholder="Enter input 1" value="${name}">
                    <img class="mt-4" height="200" id="blah" src="http://127.0.0.1:8000/${image}" alt="">
                    <input type="file" id="photo" class="mt-3" name="photo" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                    `,
                showCancelButton: true,
                confirmButtonColor: "#28a745",
                cancelButtonColor: "#d33",
                confirmButtonText: "Save",
            }).then((result) => {
                if (result.isConfirmed) {
                    // Access input values
                    let nameValue = document.getElementById('name').value;
                    let photoValue = document.getElementById('photo').files[0];

                    // Create a FormData object to send the data
                    let formData = new FormData();
                    formData.append('_token', csrfToken);
                    formData.append('id', id);
                    formData.append('name', nameValue);
                    formData.append('photo', photoValue);

                    // Use fetch to send the data to the server
                    $.ajax({
                        type: 'POST',
                        url: editUrl, // Laravel route for handling the update
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                           // Handle success response
                                console.log('Update successful');

                        // Show a customized success message with SweetAlert2
                        Swal.fire({
                            title: 'Success',
                            text: 'Category updated successfully',
                            icon: 'success',
                            confirmButtonColor: '#28a745',
                        }).then((result) => {
                            // Optionally, perform actions after the user clicks the "OK" button
                            if (result.isConfirmed) {
                                location.reload(); // Reload the page or perform other actions
                            }
                        });
                        // Add an event listener to the SweetAlert modal overlay
                        document.querySelector('.swal2-container').addEventListener('click', function(event) {
                            // Check if the click is outside the modal (overlay)
                            if (event.target.classList.contains('swal2-container')) {
                                location.reload(); // Reload the page or perform other actions
                            }
                        });
                        },
                        error: function(xhr, status, error) {
                        // Handle error
                        console.error(error);

                        // Check if the error is a validation error
                        if (xhr.status === 422) {
                            // Parse the validation errors from the response JSON
                            var validationErrors = JSON.parse(xhr.responseText);

                            // Display the validation errors to the user

                            for (var field in validationErrors.errors) {
                                var message = validationErrors.errors[field].join(', ') + '\n';
                            }

                            alert(message);
                        } else {
                            // For other types of errors, show a generic error message
                            alert('An error occurred. Please try again later.');
                        }
                    },
                        complete: function() {
                            // This block will be executed after success or error
                            // You can use it for actions that need to be performed in either case
                            console.log('Request completed');
                        }
                    });

                }
            });

        });


        // If All Box Be Checked SelectAll Will Be Checked

        $(".select-one").on('change', function() {
            var allChecked = $(".select-one:checked").length === $(".select-one").length;
            $("#SelectAll").prop("checked", allChecked);

            var anySelected = $(".select-one:checked").length > 0;
             $("#delete_btn").toggleClass("d-none", !anySelected);
        });
        // Check All
        $("#SelectAll").on('click', function(){
        this.checked ? $(".select-one").prop("checked",true) : $(".select-one").prop("checked",false);
        var anySelected = $(".select-one:checked").length > 0;
        $("#delete_btn").toggleClass("d-none", !anySelected);
        })

                    // delete Sweet Alert
            $("#delete_btn").on('click', function(e) {
                e.preventDefault(); // Prevent the default form submission

                // Use SweetAlert to show a confirmation popup
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You want to delete Selected Categories. You Can revert this from trash!',
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
