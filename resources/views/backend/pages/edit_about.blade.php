@extends('backend.layouts.app')

@section('content')
<div class="container">
    <h1>Edit About Us</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(isset($aboutUs))
    <form action="{{ route('update_about', $aboutUs->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="heading">Heading:</label>
            <input type="text" name="heading" id="heading" class="form-control" 
                value="{{ old('heading', $aboutUs->heading) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $aboutUs->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="bullet_points">Bullet Points:</label>
            <input type="text" name="bullet_points" id="bullet_points" class="form-control" 
                value="{{ old('bullet_points', $aboutUs->bullet_points) }}">
        </div>

        <div class="form-group">
            <label for="bullet_points_2">Bullet Points-2:</label>
            <input type="text" name="bullet_points_2" id="bullet_points_2" class="form-control" 
                value="{{ old('bullet_points_2', $aboutUs->bullet_points_2) }}">
        </div>

        <div class="form-group">
            <label for="bullet_points_3">Bullet Points-3:</label>
            <input type="text" name="bullet_points_3" id="bullet_points_3" class="form-control" 
                value="{{ old('bullet_points_3', $aboutUs->bullet_points_3) }}">
        </div>

        <div class="form-group">
            <label for="image_main">Main Image:</label>
            <input type="file" name="image_main" id="image_main" class="form-control-file">
            @if($aboutUs->image_main)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $aboutUs->image_main) }}" width="100" alt="Main Image">
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="image_small">Small Image:</label>
            <input type="file" name="image_small" id="image_small" class="form-control-file">
            @if($aboutUs->image_small)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $aboutUs->image_small) }}" width="100" alt="Small Image">
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="is_active">Active:</label>
            <select name="is_active" id="is_active" class="form-control">
                <option value="1" {{ $aboutUs->is_active ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ !$aboutUs->is_active ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ url('panel/pages/About_page') }}" class="btn btn-secondary">Cancel</a>
    </form>
    @else
        <div class="alert alert-warning">No About Us data found.</div>
    @endif
</div>

<style>
    .container {
        max-width: 800px;
        margin: 20px auto;
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    h1 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }
    .form-group {
        margin-bottom: 15px;
    }
    .form-control {
        width: 100%;
        padding: 8px;
        border-radius: 5px;
        border: 1px solid #ddd;
    }
    .form-control-file {
        padding: 5px;
    }
    .btn {
        padding: 8px 15px;
        border-radius: 5px;
        text-decoration: none;
        text-align: center;
    }
    .btn-primary {
        background-color: #007bff;
        color: #fff;
    }
    .btn-secondary {
        background-color: #6c757d;
        color: #fff;
    }
    .alert {
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 20px;
    }
    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }
    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }
</style>

@endsection
