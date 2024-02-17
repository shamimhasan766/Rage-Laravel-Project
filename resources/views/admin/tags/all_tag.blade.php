@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col-lg-8">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>All Tags</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>SL</th>
                            <th>Tag Name</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($tags as $sl=>$tag)

                        <tr>
                            <td>{{ $tags->firstitem() + $sl }}</td>
                            <td>{{ $tag->tag_name }}</td>
                            <td>{{ $tag->created_at }}</td>
                            <td>{{ $tag->updated_at }}</td>
                            <td>
                                <a title="Edit {{ $tag->tag_name }}" data-tag="{{ json_encode(['id' => $tag->id, 'tag_name'=> $tag->tag_name]) }}" class="edit btn btn-primary shadow btn-xs sharp"><i class="fa fa-edit"></i></a>
                                <a title="Delete {{ $tag->tag_name }}" data-id="{{ $tag->id }}" data-name="{{ $tag->tag_name }}" class="delete btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>

                        @endforeach
                    </table>
                    <div class="my-2">
                        {{ $tags->links() }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card h-auto">
                <div class="card-header">
                    <h3>Add New Tag</h3>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <form action="{{ route('tag.store') }}" method="POST">
                        @csrf
                        <div id='input-cont'>

                            @if(old('tag_name'))
                                @foreach(old('tag_name') as $index => $tagName)
                                    <div class="mb-3">
                                        <label for="" class="form-label">Tag Name</label>
                                        <input placeholder="Type Tag Name...." type="text" class="form-control" name="tag_name[]" value="{{ $tagName }}">
                                        @error('tag_name.' . $index)
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                @endforeach
                            @else
                                <div class="mb-3">
                                    <label for="" class="form-label">Tag Name</label>
                                    <input placeholder="Type Tag Name...." type="text" class="form-control" name="tag_name[]">
                                    @error('tag_name.0')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            @endif

                        </div>
                        <div class="my-2 text-right">
                            <button style="line-height: 0px; height: 30px;" onclick='addInput()' type="button" class="btn btn-success">+ Add Input</button>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary m-auto">Add Tag</button>
                        </div>
                    </form>
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
            let deleteUrl = "{{ route('tag.delete', ['id' => ':id']) }}";
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
            let tagData = $(this).data('tag');
            let id = tagData.id;
            let tag_name = tagData.tag_name;

            let editUrl = "{{ route('tag.edit', ['id' => ':id']) }}";
            editUrl = editUrl.replace(':id', id);
            let csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;

            Swal.fire({
                title: "Edit '"+ tag_name + "'",
                html:
                    `<label for="name">Tag</label>
                    <input type="text" id="tag_name" name="tag_name" class="swal2-input" placeholder="Enter Tag" value="${tag_name}">
                    `,
                showCancelButton: true,
                confirmButtonColor: "#28a745",
                cancelButtonColor: "#d33",
                confirmButtonText: "Save",
            }).then((result) => {
                if (result.isConfirmed) {
                    // Access input values
                    let nameValue = document.getElementById('tag_name').value;

                    // Create a FormData object to send the data
                    let formData = new FormData();
                    formData.append('_token', csrfToken);
                    formData.append('id', id);
                    formData.append('tag_name', nameValue);

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




        const container = document.getElementById('input-cont');

        // Call addInput() function on button click
        function addInput() {
            let input = document.createElement('input');
            input.name = 'tag_name[]'
            input.placeholder = 'Type Tag Name...';
            input.className = 'form-control mt-3';
            container.appendChild(input);
        }
    </script>
@endsection
