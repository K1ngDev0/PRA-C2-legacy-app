@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Manual</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('manuals.update', $manual->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Manual Name:</label>
            <input type="text" name="name" value="{{ old('name', $manual->name) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="filesize">File Size:</label>
            <input type="number" name="filesize" value="{{ old('filesize', $manual->filesize) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="originUrl">Origin URL:</label>
            <input type="url" name="originUrl" value="{{ old('originUrl', $manual->originUrl) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="filename">File Name:</label>
            <input type="text" name="filename" value="{{ old('filename', $manual->filename) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="downloadedServer">Downloaded on Server:</label>
            <select name="downloadedServer" class="form-control" required>
                <option value="1" {{ old('downloadedServer', $manual->downloadedServer) == 1 ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ old('downloadedServer', $manual->downloadedServer) == 0 ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Manual</button>
    </form>
</div>
@endsection
