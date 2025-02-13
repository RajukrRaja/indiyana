@extends('backend.layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Add New Menu</h4>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{url}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Menu Name:</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="url">Menu URL:</label>
                    <input type="text" name="url" id="url" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="order">Order:</label>
                    <input type="number" name="order" id="order" class="form-control" required>
                </div>
                
                <button type="submit" class="btn btn-success">Add Menu</button>
                <a href="" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection