@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            @if (session('delete'))
                <div class="alert alert-danger">{{ session('delete') }}</div>
            @endif
            <div class="card-header"><h3>Charge List</h3></div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Location</th>
                        <th>Charge</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($charges as $sl=>$charge)

                    <tr>
                        <td>{{ $sl+1 }}</td>
                        <td>{{ $charge->location }}</td>
                        <td>{{ $charge->charge }}</td>
                        <td>{{ $charge->created_at }}</td>
                        <td>
                            <a href="{{ route('delete.charge', $charge->id) }}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="card-header"><h3>Add Charge</h3></div>
            <div class="card-body">
                <form action="{{ route('store.charge') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="">Location</label>
                        <input type="text" name="location" value="{{ old('location') }}" class="form-control">
                        @error('location')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Charge</label>
                        <input type="number" name="charge" value="{{ old('charge') }}" class="form-control">
                        @error('charge')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Add Charge</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
