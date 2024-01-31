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
                                        <a title="Edit" href="" class="edit btn btn-primary btn-icon"><i class="fa fa-edit"></i></a>
                                        <a title="Delete" href="{{ route('soft.delete.brand', ['id'=> $brand->id]) }}" data-id="" data-name="" class="delete btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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
