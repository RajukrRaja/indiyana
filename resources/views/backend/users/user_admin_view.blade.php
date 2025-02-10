<style>
    /* General Table Styling */
    .table {
        border-collapse: collapse;
        width: 100%;
        background-color: #ffffff;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
    }

    .table th {
        background-color: #007bff;
        color: #ffffff;
        padding: 12px;
        text-align: left;
    }

    .table td {
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    .table tbody tr:hover {
        background-color: #f8f9fa;
    }

    /* Pagination Styling */
    .pagination-container {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    /* Buttons */
    .btn {
        border-radius: 4px;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
    }

    .btn-warning {
        background-color: #ffc107;
        border: none;
        color: #000;
    }

    .btn-danger {
        background-color: #dc3545;
        border: none;
    }

    /* Modals */
    .modal-content {
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .modal-header {
        background-color: #007bff;
        color: white;
        border-bottom: none;
    }

    .modal-footer {
        border-top: none;
    }

    /* Form Inputs */
    .form-control {
        border-radius: 6px;
        border: 1px solid #ced4da;
    }

    .form-group label {
        font-weight: bold;
    }

    /* Search Input */
    #searchInput {
        border-radius: 6px;
        border: 1px solid #ced4da;
        padding: 6px;
    }
</style>

@extends('backend.layouts.app')

     @include('layouts._message')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <!-- Success & Error Messages -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Manage Users</h4>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addUserModal">
                            Add User
                        </button>
                        <input type="text" id="searchInput" class="form-control w-25" placeholder="Search Users">
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Email Verified</th>
                                <th>Role</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="userTable">
                            @foreach ($getRecord as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->email_verified_at ?? 'Not Verified' }}</td>
                                    <td>
                                        @if ($user->is_admin)
                                            <span class="badge bg-success">Admin</span>
                                        @else
                                            <span class="badge bg-primary">User</span>
                                        @endif
                                    </td>
                                    <td>{{ $user->created_at->format('Y-m-d') }}</td>
                                    <td>{{ $user->updated_at->format('Y-m-d') }}</td>
                                    <td>
                                        <!-- Edit Button -->
                                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#editUserModal" data-id="{{ $user->id }}"
                                            data-name="{{ $user->name }}" data-email="{{ $user->email }}"
                                            data-role="{{ $user->is_admin }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>

                                        <!-- Delete Button -->
                                        <form action="{{ url('panel/users/delete', $user->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this user?');">
                                                <i class="bi bi-trash"></i> 
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="pagination-container">
                        {{ $getRecord->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url('panel/users/add_user_admin')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="role">Role</label>
                        <select name="role" id="role" class="form-control">
                            <option value="0">User</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit User Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editUserForm" method="post" action="{{url('panel/users/edit_user_admin')}}">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" id="editUserId" name="user_id">
                    <div class="form-group mb-3">
                        <label for="editName">Name</label>
                        <input type="text" name="name" id="editName" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="editEmail">Email</label>
                        <input type="email" name="email" id="editEmail" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="editRole">Role</label>
                        <select name="role" id="editRole" class="form-control">
                            <option value="0">User</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>




 


    <script>
  
        document.getElementById("searchInput").addEventListener("input", function () {
            const searchValue = this.value.toLowerCase().trim(); // Get the input value, trim spaces, and convert to lowercase
            const rows = document.querySelectorAll("#userTable tbody tr"); // Select all rows in the table body

            rows.forEach((row) => {
                const cells = Array.from(row.querySelectorAll("td")); // Get all cells in the row
                const rowText = cells.map(cell => cell.textContent.toLowerCase()).join(" "); // Combine cell text into one string
                
                // Show or hide row based on search value
                row.style.display = rowText.includes(searchValue) ? "" : "none";
            });
        });
    </script>

@endsection