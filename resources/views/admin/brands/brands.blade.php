@extends('layouts.layout')
@section('content')
        <div class="row">
            <div class="col-lg-10 m-auto">
                @if (session('delete'))
                <div class="alert alert-success">{{ session('delete') }}</div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3>Brands List</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Logo</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $sl=>$brand)

                                <tr>
                                    <td>{{ $sl+1 }}</td>
                                    <td>{{ $brand->name }}</td>
                                    <td><img src="{{ $brand->logo }}" alt=""></td>
                                    <td>{{ $brand->created_at }}</td>
                                    <td>{{ $brand->updated_at }}</td>
                                    <td>
                                        <a title="Edit" data-brand="{{ json_encode(['id' => $brand->id, 'name' => $brand->name, 'logo'=> $brand->logo]) }}" class="edit btn btn-primary btn-icon"><i class="fa fa-edit"></i></a>
                                        <a title="Delete" data-id="{{ $brand->id }}" data-name="{{ $brand->name }}" class="delete btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
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
            let deleteUrl = "{{ route('soft.delete.brand', ['id' => ':id']) }}";
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


                // edit

        $('.edit').on('click', function(){
            let brandData = $(this).data('brand');
            let id = brandData.id;
            let name = brandData.name;
            let logo = brandData.logo;

            let editUrl = "{{ route('brand.edit', ['id' => ':id']) }}";
            editUrl = editUrl.replace(':id', id);
            let csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;

            Swal.fire({
                title: "Edit '"+ name + "'",
                html:
                    `<label for="name">Update Name</label>
                    <input type="text" id="name" name="name" class="swal2-input" placeholder="Enter input 1" value="${name}">
                    <img class="mt-4" height="200" id="blah" src="${logo}" alt="">
                    <input type="file" id="logo" class="mt-3" name="logo" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                    `,
                showCancelButton: true,
                confirmButtonColor: "#28a745",
                cancelButtonColor: "#d33",
                confirmButtonText: "Save",
            }).then((result) => {
                if (result.isConfirmed) {
                    // Access input values
                    let brandValue = document.getElementById('name').value;
                    let logoValue = document.getElementById('logo').files[0];

                    // Create a FormData object to send the data
                    let formData = new FormData();
                    formData.append('_token', csrfToken);
                    formData.append('id', id);
                    formData.append('name', brandValue);
                    formData.append('logo', logoValue);
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
