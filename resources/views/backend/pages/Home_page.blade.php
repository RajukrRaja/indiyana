@extends('backend.layouts.app')

@section('title', 'Manage Home Page')

@section('content')
<div class="container">
    <h1>Manage Home Page</h1>

    <a href="#" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addModal">+ Add Home Page Content</a>

    <form method="GET" action="" class="d-flex mb-3">
        <input type="text" name="search" class="form-control me-2" placeholder="Search Home Page" value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Company Name</th>
                <th>Tagline</th>
                <th>Description</th>
                <th>Header Image</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @if(isset($companyInfo) && $companyInfo->id)
            <tr>
                <td>{{ $companyInfo->id }}</td>
                <td>{{ Str::limit($companyInfo->company_name, 15) }}</td>
                <td>{{ Str::limit($companyInfo->tagline, 20) }}</td>
                <td>{{ Str::limit($companyInfo->description, 30) }}</td>
                <td>
                    @if($companyInfo->header_image)
                        <img src="{{ asset('storage/' . $companyInfo->header_image) }}" class="table-image" alt="Header Image">
                    @else
                        N/A
                    @endif
                </td>
                <td>{{ $companyInfo->is_active ? 'Yes' : 'No' }}</td>
                <td>
                    <button class="btn btn-warning btn-edit" data-id="{{ $companyInfo->id }}">Edit</button>
                    <button class="btn btn-danger btn-delete" data-id="{{ $companyInfo->id }}">Delete</button>
                </td>
            </tr>
        @else
            <tr>
                <td colspan="7">No records found</td>
            </tr>
        @endif
        </tbody>
    </table>
</div>

<!-- Add Content Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Home Page Content</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <label>Company Name:</label>
                    <input type="text" name="company_name" class="form-control" required>

                    <label>Tagline:</label>
                    <input type="text" name="tagline" class="form-control" required>

                    <label>Description:</label>
                    <textarea name="description" class="form-control" required></textarea>

                    <label>Header Image:</label>
                    <input type="file" name="header_image" class="form-control">

                    <label>Active Status:</label>
                    <select name="is_active" class="form-control">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Content Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" id="deleteForm">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <p>Are you sure you want to delete this content?</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript to Populate Edit and Delete Modal Data -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Edit Modal
        document.querySelectorAll('.btn-edit').forEach(button => {
            button.addEventListener('click', function () {
                document.getElementById('edit-id').value = this.dataset.id;
                document.getElementById('edit-company-name').value = this.dataset.company_name;
                document.getElementById('edit-tagline').value = this.dataset.tagline;
                document.getElementById('edit-description').value = this.dataset.description;
                document.getElementById('edit-is-active').value = this.dataset.is_active;
                document.getElementById('editForm').action = "{{ url('homepage/update') }}/" + this.dataset.id;
            });
        });

        // Delete Modal
        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', function () {
                document.getElementById('deleteForm').action = "{{ url('homepage/destroy') }}/" + this.dataset.id;
            });
        });
    });
</script>

@endsection
