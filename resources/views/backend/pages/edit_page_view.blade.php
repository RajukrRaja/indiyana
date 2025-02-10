@extends('backend.layouts.app')

@section('content')
<div class="container mx-auto py-8" style="max-width: 800px; margin: auto; padding: 40px; background: #f9f9f9; border-radius: 12px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
    <header class="mb-6" style="text-align: center; margin-bottom: 24px; border-bottom: 2px solid #ddd; padding-bottom: 16px;">
        <h1 class="text-3xl font-bold text-gray-700" style="font-size: 28px; font-weight: 700; color: #333;">Edit Page</h1>
        <p class="text-center text-gray-500" style="font-size: 16px; color: #666;">Modify and update your page content</p>
    </header>

    <div class="bg-white shadow-lg rounded-lg p-6" style="background: #fff; padding: 24px; border-radius: 8px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
        <form action="" method="POST">
            @csrf
            @method('PUT')
            
            <!-- Title -->
            <div class="mb-4" style="margin-bottom: 16px;">
                <label for="title" class="block text-sm font-medium text-gray-700" style="display: block; font-size: 14px; font-weight: 600; color: #444; margin-bottom: 6px;">Page Title</label>
                <input type="text" id="title" name="title" value="{{ $page->title }}" 
                    style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; font-size: 16px; transition: 0.3s; box-shadow: inset 0px 1px 3px rgba(0,0,0,0.1);" required>
            </div>

            <!-- Status -->
            <div class="mb-4" style="margin-bottom: 16px;">
                <label for="status" class="block text-sm font-medium text-gray-700" style="display: block; font-size: 14px; font-weight: 600; color: #444; margin-bottom: 6px;">Status</label>
                <select id="status" name="status" 
                    style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; font-size: 16px; background: #fff; cursor: pointer;">
                    <option value="Published" {{ $page->status === 'Published' ? 'selected' : '' }}>Published</option>
                    <option value="Draft" {{ $page->status === 'Draft' ? 'selected' : '' }}>Draft</option>
                    <option value="Archived" {{ $page->status === 'Archived' ? 'selected' : '' }}>Archived</option>
                </select>
            </div>

            <!-- Content -->
            <div class="mb-6" style="margin-bottom: 24px;">
                <label for="content" class="block text-sm font-medium text-gray-700" style="display: block; font-size: 14px; font-weight: 600; color: #444; margin-bottom: 6px;">Content</label>
                <textarea id="content" name="content" class="tinymce-editor"
                    style="width: 100%; height: 250px; padding: 10px; border: 1px solid #ccc; border-radius: 6px; font-size: 16px; transition: 0.3s; box-shadow: inset 0px 1px 3px rgba(0,0,0,0.1);">{{ $page->content }}</textarea>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end space-x-4" style="display: flex; justify-content: flex-end; gap: 12px;">
                <a href="" 
                    style="background: #666; color: white; padding: 10px 16px; border-radius: 6px; text-decoration: none; font-size: 16px; transition: 0.3s; box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);">
                    Cancel
                </a>
                <button type="submit" 
                    style="background: #007bff; color: white; padding: 10px 16px; border: none; border-radius: 6px; font-size: 16px; cursor: pointer; transition: 0.3s; box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Include TinyMCE Script -->
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    // Initialize TinyMCE editor
    tinymce.init({
        selector: '.tinymce-editor',
        plugins: 'advlist autolink link image lists charmap print preview anchor searchreplace visualblocks code fullscreen insertdatetime media table paste imagetools',
        toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | code preview fullscreen',
        height: 500,
        branding: false,
        image_title: true,
        automatic_uploads: true,
        file_picker_types: 'image',
        images_upload_url: '/upload-image', // Change this URL to your image upload route
        file_picker_callback: function (callback, value, meta) {
            if (meta.filetype === 'image') {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function () {
                    var file = this.files[0];
                    var reader = new FileReader();
                    reader.onload = function () {
                        callback(reader.result, { alt: file.name });
                    };
                    reader.readAsDataURL(file);
                };
                input.click();
            }
        }
    });
</script>
@endsection
