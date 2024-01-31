@extends('layouts.layout')

@section('content')
        <div class="row">
            <div class="col-lg-12">
                <div class="card-header"><h2 class="h2 m-auto">Sub Categories</h2></div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-danger text-center">{{ session('success') }}</div>
                    @endif
                    <div class="row">
                        @foreach ($categories as $category)

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3>{{ $category->name }}</h3>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Subcategory</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach (App\Models\Subcategory::where('category_id', $category->id)->get() as $subcategory)

                                        <tr>
                                            <td>{{ $subcategory->subcategory }}</td>
                                            <td>
                                                <a title="Edit {{ $subcategory->subcategory }}" data-subcategory="{{ json_encode(['id' => $subcategory->id, 'subcategory' => $subcategory->subcategory]) }}" class="edit btn btn-primary shadow btn-xs sharp"><i class="fa fa-edit"></i></a>
                                                <a title="Delete {{ $subcategory->subcategory }}" data-id="{{ $subcategory->id }}" data-name="{{ $subcategory->subcategory }}" class="delete btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>

                        @endforeach
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
            let deleteUrl = "{{ route('delete.subcategory', ['id' => ':id']) }}";
            deleteUrl = deleteUrl.replace(':id', id);

            Swal.fire({
                title: "Are you sure?",
                text: "You Want TO Delete The Subcategory '" + name + "'",
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
            let subcategoryData = $(this).data('subcategory');
            let id = subcategoryData.id;
            let subcategory = subcategoryData.subcategory;

            let editUrl = "{{ route('subcategory.edit', ['id' => ':id']) }}";
            editUrl = editUrl.replace(':id', id);
            let csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;

            Swal.fire({
                title: "Edit '"+ subcategory + "'",
                html:
                    `<label for="subcategory">Enter Subcategory</label>
                    <input type="text" id="subcategory" name="subcategory" class="swal2-input" placeholder="Enter input 1" value="${subcategory}">
                    `,
                showCancelButton: true,
                confirmButtonColor: "#28a745",
                cancelButtonColor: "#d33",
                confirmButtonText: "Save",
            }).then((result) => {
                if (result.isConfirmed) {
                    // Access input values
                    let subcategoryValue = document.getElementById('subcategory').value;

                    // Create a FormData object to send the data
                    let formData = new FormData();
                    formData.append('_token', csrfToken);
                    formData.append('id', id);
                    formData.append('subcategory', subcategoryValue);
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
    </script>
@endsection
