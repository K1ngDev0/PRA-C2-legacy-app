@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Brand</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('brands.update', $brand->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Brand Name:</label>
            <input type="text" name="name" value="{{ old('name', $brand->name) }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Brand</button>
    </form>
</div>
@endsection
