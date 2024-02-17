@extends('layouts.layout')


@section('content')

    <div class="row">
        <div class="col-lg-10 m-auto">
            <div class="card">
                <div class="card-header text-center">User List</div>
                <div class="card-body">
                    @if (session('delete'))
                        <div class="alert alert-success">{{ session('delete') }}</div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">SL</th>
                            <th scope="col">photo</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $sl=>$user)

                            <tr>
                              <td>{{ $sl+1 }}</td>
                              <td><img src="{{ $user->photo != null ? (asset($user->photo)) : Avatar::create($user->name)->toBase64() }}" alt=""></td>
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->email }}</td>
                              <td>
                                <a data-id="{{ $user->id }}" data-name="{{ $user->name }}"  class="delete btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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
                $('.delete').on('click', function(){
            let id = $(this).data('id');
            let name = $(this).data('name');
            let deleteUrl = "{{ route('user.delete', ['id' => ':id']) }}";
            deleteUrl = deleteUrl.replace(':id', id);

            Swal.fire({
                title: "Are you sure?",
                text: "You Want TO Delete The User '" + name + "'",
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
