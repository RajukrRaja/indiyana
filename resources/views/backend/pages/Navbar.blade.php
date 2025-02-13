@extends('backend.layouts.app')
@include('layouts._message')

@section('content')

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    h1 { text-align: center; margin-bottom: 20px; }
    .btn-add { padding: 10px 15px; background: #28a745; color: white; border-radius: 5px; margin-bottom: 10px; }
    .table th { background: #007bff; color: white; }
    .submenu-row td { padding-left: 40px; background: #f9f9f9; }
</style>

<div class="container">
    <h1>Manage Navbar</h1>

    <!-- Button to trigger Add New Menu modal -->
    <button class="btn btn-add" data-bs-toggle="modal" data-bs-target="#addMenuModal">Add Menu</button>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Menu Name</th>
                <th>URL</th>
                <th>Order</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menus as $menu)
                <tr>
                    <td>{{ $menu->id }}</td>
                    <td>{{ $menu->name }}</td>
                    <td>{{ is_string($menu->url) ? $menu->url : '' }}</td>
                    <td>{{ $menu->order }}</td>
                    <td>{{ $menu->is_active ? 'Yes' : 'No' }}</td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editMenuModal{{ $menu->id }}">Edit</button>
                        <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#addSubmenuModal{{ $menu->id }}">Add Submenu</button>
                        <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('post')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>

                @foreach($menu->submenus as $submenu)
                    <tr class="submenu-row">
                        <td>{{ $submenu->id }}</td>
                        <td>{{ $submenu->name }}</td>
                        <td>{{ is_string($submenu->url) ? $submenu->url : '' }}</td>
                        <td colspan="2">Submenu of {{ $menu->name }}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editSubmenuModal{{ $submenu->id }}">Edit</button>
                            <form action="{{ route('submenus.destroy', $submenu->id) }}" method="POST" style="display:inline;">
    @csrf
    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
</form>

                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>

<!-- Add Menu Modal -->
<div class="modal fade" id="addMenuModal" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('menus.store') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <label>Menu Name:</label>
                    <input type="text" class="form-control" name="name" required>
                    <label>URL:</label>
                    <input type="text" class="form-control" name="url" required>
                    <label>Order:</label>
                    <input type="number" class="form-control" name="order" required>
                    <label>Active:</label>
                    <select class="form-control" name="is_active">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Menu</button>
                </div>
            </div>
        </form>
    </div>
</div>

@foreach($menus as $menu)
<!-- Edit Menu Modal -->
<div class="modal fade" id="editMenuModal{{ $menu->id }}" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('menus.update', $menu->id) }}" method="POST">
            @csrf
            @method('Post')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <label>Menu Name:</label>
                    <input type="text" class="form-control" name="name" value="{{ $menu->name }}" required>
                    <label>URL:</label>
                    <input type="text" class="form-control" name="url" value="{{ is_string($menu->url) ? $menu->url : '' }}" required>
                    <label>Order:</label>
                    <input type="number" class="form-control" name="order" value="{{ $menu->order }}" required>
                    <label>Active:</label>
                    <select class="form-control" name="is_active">
                        <option value="1" {{ $menu->is_active ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ !$menu->is_active ? 'selected' : '' }}>No</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Add Submenu Modal -->
<div class="modal fade" id="addSubmenuModal{{ $menu->id }}" tabindex="-1">
    <div class="modal-dialog">
    <form method="POST" action="{{ route('submenus.store') }}">
    @csrf

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Submenu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <label>Submenu Name:</label>
                    <input type="text" class="form-control" name="name" required>
                    <label>URL:</label>
                    <input type="text" class="form-control" name="url" required>
                    <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Add Submenu</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection
