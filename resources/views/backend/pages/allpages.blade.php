@extends('backend.layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Pages - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#content',
            plugins: 'lists link image table code autosave wordcount preview media',  // Added 'media'
            toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image table | code preview | media', // Added 'media'
            height: 300,
            // Image upload configuration (requires backend endpoint)
            image_title: true,
            automatic_uploads: true,
            images_upload_url: '/panel/pages/upload-image', // Replace with your image upload endpoint
            file_picker_types: 'image',
            file_picker_callback: function (cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                input.onchange = function () {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), { title: file.name });
                    };
                    reader.readAsDataURL(file);
                };
                input.click();
            },
        });
    </script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <header class="mb-6">
            <h1 class="text-3xl font-bold text-center text-gray-700">All Pages Management</h1>
            <p class="text-center text-gray-500">Manage your pages effectively with modern tools</p>
        </header>

        <div class="flex justify-between items-center mb-4">
            <button onclick="openCreateModal()" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded shadow">
                <i class="fas fa-plus"></i> Add New Page
            </button>
           
            <button onclick="exportToCSV()" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded shadow">
                <i class="fas fa-download"></i> Export to CSV
            </button>
        </div>

        <div class="flex mb-4">
            <input type="text" id="searchTitle" placeholder="Search by Title" class="border rounded-lg px-3 py-2 mr-4">
            <select id="filterStatus" class="border rounded-lg px-3 py-2 mr-4">
                <option value="">Filter by Status</option>
                <option value="Published">Published</option>
                <option value="Draft">Draft</option>
                <option value="Archived">Archived</option>
            </select>
            <button onclick="applyFilters()" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">Apply Filters</button>
        </div>

        <div class="bg-white shadow-lg rounded-lg p-4 overflow-x-auto">
            <table id="pagesTable" class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ID</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Title</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Created At</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pages as $page)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $page->id }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $page->title }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <span class="inline-block px-3 py-1 font-semibold text-white text-xs {{ $page->status === 'Published' ? 'bg-green-500' : ($page->status === 'Draft' ? 'bg-yellow-500' : 'bg-red-500') }}">
                                    {{ $page->status }}
                                </span>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $page->created_at->format('Y-m-d') }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                <div class="flex justify-center space-x-4">
                                    <button onclick="viewPage({{ $page->id }})" class="bg-gray-500 hover:bg-gray-600 text-white px-3 py-2 rounded flex items-center">
                                        <i class="fas fa-eye mr-2"></i>View
                                    
                                    </button>


                                    <a href="{{ route('edit_page_view', $page->id) }}" 
                                        class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded flex items-center">
                                        <i class="fas fa-edit mr-2"></i>Edit
                                     </a>
                                     
                                     
                                    

                                
                                    
                               
                                    <button onclick="deletePage({{ $page->id }})" class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded flex items-center">
                                        <i class="fas fa-trash mr-2"></i>Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    

    <script>
// ... (rest of your JavaScript) ...

function editPage(id) {
    $('#modalTitle').text('Edit Page');
    $('#pageModal').removeClass('hidden');
    $('#pageForm').attr('action', "{{ url('/panel/pages/edit_page/' . $page->id) }}");


    // Fetch page data via AJAX
    $.ajax({
        url: route('pages.show', { id: id }),
        type: 'GET',
        success: function(response) {
            // Populate the form fields
            $('#pageId').val(response.id);
            $('#title').val(response.title);
            tinymce.get('content').setContent(response.content);
            $('#status').val(response.status);
            $('#tags').val(response.tags);
        },
        error: function(xhr, status, error) {
            Swal.fire('Error!', 'Failed to fetch page data.', 'error');
            console.log(xhr.responseText);
        }
    });
}
// ... (rest of the javascript code)

// Add this event listener to the form
$('#pageForm').submit(function(event) {
    event.preventDefault(); // Prevent the default form submission

    // Get the form data, including TinyMCE content
    var formData = {
        _token: "{{ csrf_token() }}", // Include CSRF token
        id: $('#pageId').val(),
        title: $('#title').val(),
        content: tinymce.get('content').getContent(), // Get content from TinyMCE
        status: $('#status').val(),
        tags: $('#tags').val(),
    };
    //console.log(formData); //for debugging

    $.ajax({
        url: $(this).attr('action'), // Use the form's action attribute
        type: 'POST',
        data: formData,
        success: function(response) {
            // Handle the JSON response
            Swal.fire('Success!', response.message, 'success'); // Show success message
            closeModal(); // Close the modal
            reloadTable(); // Reload the DataTable to show the changes
        },
        error: function(xhr, status, error) {
            // Handle errors (e.g., validation errors)
            var errors = xhr.responseJSON.errors; // Get validation errors
            var errorMessage = '';
            for (var key in errors) {
                errorMessage += errors[key][0] + '<br>'; // Format error messages
            }
            Swal.fire('Error!', errorMessage, 'error');
        }
    });
});

// ... rest of your JavaScript code ...



        $(document).ready(function() {
            $('#pagesTable').DataTable();
        });

        function reloadTable() {
            $('#pagesTable').DataTable().ajax.reload();
        }

         function applyFilters() {
            let title = $('#searchTitle').val();
            let status = $('#filterStatus').val();

            // Use DataTables API to filter the table
            $('#pagesTable').DataTable().columns(1).search(title).draw();
            $('#pagesTable').DataTable().columns(2).search(status).draw();
        }

        function openCreateModal() {
            $('#modalTitle').text('Add New Page');
            $('#pageId').val(''); // Clear any previous ID
            $('#pageForm')[0].reset();  // Reset the form
             tinymce.get('content').setContent(''); // Clear TinyMCE content
            $('#pageModal').removeClass('hidden');
            $('#pageForm').attr('action', "{{ url('/panel/pages/add_page') }}"); // Set action for adding

        }

        function closeModal() {
            $('#pageModal').addClass('hidden');
        }


       


        function deletePage(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Perform the deletion via AJAX
                    $.ajax({
                        url: `/panel/pages/${id}`, // Use string interpolation
                        type: 'DELETE',
                        data: {
                            "_token": "{{ csrf_token() }}"  // Include CSRF token
                        },
                        success: function(response) {
                            Swal.fire(
                                'Deleted!',
                                'The page has been deleted.',
                                'success'
                            );
                            reloadTable(); // Reload the table after successful deletion

                        },
                        error: function(xhr, status, error) {
                            Swal.fire('Error!', 'Failed to delete the page.', 'error');
                        }
                    });
                }
            });
        }

        function viewPage(id) {
            // Construct the URL for viewing the page.  This assumes you have a route
            // like /pages/{id} that displays the page.
            window.location.href = `/pages/${id}`;
        }


          function exportToCSV() {
                // Get all data from the DataTable
                var data = $('#pagesTable').DataTable().data().toArray();

                // CSV header row
                var csvContent = "data:text/csv;charset=utf-8,ID,Title,Status,Created At\n";

                // Add data rows
                data.forEach(function(row) {
                    // Extract data, ensuring it's properly escaped (e.g., for commas within fields)
                    var rowData = [
                        row[0], // ID
                        '"' + row[1].replace(/"/g, '""') + '"', // Title, enclosed in quotes and double quotes escaped
                        '"' + row[2].replace(/"/g, '""') + '"', // Status, similar escaping
                        row[3] // Created At
                    ];
                    csvContent += rowData.join(",") + "\n";
                });

                // Create a download link and trigger the download
                var encodedUri = encodeURI(csvContent);
                var link = document.createElement("a");
                link.setAttribute("href", encodedUri);
                link.setAttribute("download", "pages.csv");
                document.body.appendChild(link); // Required for Firefox
                link.click();
                document.body.removeChild(link); // Clean up
            }
    </script>
</body>
</html>
@endsection