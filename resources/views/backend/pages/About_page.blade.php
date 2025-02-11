@extends('backend.layouts.app')
@section('content')

<style> 
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }
    
    .container {
        max-width: 1200px;
        margin: 40px auto;
        background: #fff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    
    h1 {
        color: #333;
        text-align: center;
        margin-bottom: 20px;
    }
    
    .search-bar {
        display: flex;
        justify-content: flex-end;
        margin-bottom: 20px;
    }
    
    .search-bar input {
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        width: 300px;
    }
    
    .btn-add {
        background-color: #007bff;
        color: #fff;
        padding: 10px 15px;
        text-decoration: none;
        border-radius: 5px;
        display: inline-block;
        margin-bottom: 20px;
    }
    
    .btn-add:hover {
        background-color: #0056b3;
    }
    
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background: #fff;
    }
    
    table th, table td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
    }
    
    table th {
        background-color: #007bff;
        color: #fff;
    }
    
    table tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    
    table tbody tr:hover {
        background-color: #f1f1f1;
    }
    
    img {
        display: block;
        max-width: 50px;
        height: 50px;
        border-radius: 5px;
        object-fit: cover;
    }
    
    .btn {
        padding: 8px 12px;
        border-radius: 5px;
        text-decoration: none;
        color: #fff;
        text-align: center;
        display: inline-block;
        font-size: 14px;
    }
    
    .btn-edit {
        background-color: #ffc107;
    }
    
    .btn-edit:hover {
        background-color: #e0a800;
    }
    
    .btn-delete {
        background-color: #dc3545;
        border: none;
        cursor: pointer;
    }
    
    .btn-delete:hover {
        background-color: #c82333;
    }
    
    @media (max-width: 768px) {
        .container {
            padding: 20px;
        }
    
        table, table thead, table tbody, table th, table td, table tr {
            display: block;
        }
    
        table tr {
            margin-bottom: 15px;
            border: 1px solid #ddd;
            padding: 10px;
        }
    
        table td {
            text-align: right;
            position: relative;
            padding-left: 50%;
        }
    
        table td::before {
            content: attr(data-label);
            position: absolute;
            left: 10px;
            font-weight: bold;
            text-align: left;
        }
    }
</style> 

<div class="container">
    <h1>Manage About Us</h1>
    <a href="" class="btn-add">Add About Us</a>

    <form method="GET" action="" class="search-bar">
        <input type="text" name="search" placeholder="Search About Us" value="{{ request('search') }}">
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Heading</th>
                <th>Description</th>
                <th>Main Image</th>
                <th>Small Image</th>
                <th>Bullet Points</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($aboutUs as $about)
                <tr>
                    <td>{{ $about->id }}</td>
                    <td>{{ Str::limit($about->heading, 50) }}</td>
                    <td>{{ Str::limit($about->description, 80) }}</td>
                    <td>
                        @if($about->image_main)
                            <img src="{{ asset('storage/' . $about->image_main) }}" alt="Main Image">
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        @if($about->image_small)
                            <img src="{{ asset('storage/' . $about->image_small) }}" alt="Small Image">
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        @php 
                            $bullet_points = !empty($about->bullet_points) ? json_decode($about->bullet_points, true) : [];
                        @endphp
                        @if(is_array($bullet_points) && count($bullet_points) > 0)
                            <ul>
                                @foreach($bullet_points as $point)
                                    @if(!empty($point))
                                        <li>{{ $point }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        @else
                            N/A
                        @endif
                    </td>
                    <td>{{ $about->is_active ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('edit_about', ['id' => $about->id]) }}" class="btn btn-edit">Edit</a>
                        <form action="" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" style="text-align:center;">No About Us entries found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
