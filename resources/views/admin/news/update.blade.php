
@extends('admin_layout.master')
@section('content')
<div class="nk-block nk-block-lg">
    <div class="nk-block-head d-flex justify-content-between">
        <div class="nk-block-head-content">
            <h4 class="title nk-block-title">Update new</h4>
        </div>
    </div>
    <div class="card card-bordered">
        <div class="card-inner">
            <form action="{{ route('news-addProcc', $news->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row g-gs">
                    <!-- Title -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Title</label>
                            <input type="hidden" name="news_id" value="{{isset($news)?$news->id : ''}}">
                            <input type="text" class="form-control" name="title" value="{{ old('title', $news->title) }}" />
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description">{{ old('description', $news->description) }}</textarea>
                        </div>
                    </div>

                    <!-- Author -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Author Name</label>
                            <input type="text" class="form-control" name="author_name" value="{{ old('author_name', $news->author_name) }}" />
                        </div>
                    </div>

                    <!-- Date -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Date</label>
                            <input type="date" class="form-control" name="date" value="{{ old('date', $news->date) }}" />
                        </div>
                    </div>

                    <!-- Players (Multi-select) -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Players</label>
                            <select class="form-select js-select2" name="tag_player[]" multiple>
                                @foreach($players as $player)
                                    <option value="{{ $player->id }}" {{ in_array($player->id, old('tag_player', $news->tag_player ?? [])) ? 'selected' : '' }}>
                                        {{ $player->first_name }} {{ $player->last_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Existing Image Preview -->
                    <div class="col-md-12">
                        @if($news->multimediaNews->count())
                            <label class="form-label">Current Images</label>
                            <div class="form-group d-flex flex-wrap">
                                @foreach($news->multimediaNews as $image)
                                    <div class="position-relative m-2">
                                        <img src="{{ asset($image->images) }}" width="100px" class="mb-2 border" />
                                        <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 delete-image" data-id="{{ $image->id }}">X</button>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <!-- Upload New Images -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Upload New Images</label>
                            <input type="file" class="form-control" name="images[]"/>
                        </div>
                        <div id="image-upload-container"></div>
                        <button type="button" class="btn btn-secondary mt-2" id="add-more-images">+ Add More</button>

                    </div>
                    <!-- Submit Button -->
                    <div class="col-md-12 mt-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>


<!-- JavaScript -->
<script>
    $(document).ready(function() {
        $('.delete-image').click(function() {
            let imageId = $(this).data('id');
            let button = $(this);

            // SweetAlert Confirmation before deleting
            Swal.fire({
                title: "Are you sure?",
                text: "This image will be permanently deleted!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('admin.news.image.delete') }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            image_id: imageId
                        },
                        success: function(response) {
                            if(response.success) {
                                button.closest('div').fadeOut(); // Remove image from UI

                                // SweetAlert Success Message
                                Swal.fire({
                                    icon: "success",
                                    title: "Deleted!",
                                    text: "Image deleted successfully.",
                                    showConfirmButton: false,
                                    timer: 1500 // Auto-close after 1.5 seconds
                                });
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Error!",
                                    text: "Failed to delete image. Please try again.",
                                    showConfirmButton: true
                                });
                            }
                        },
                        error: function() {
                            Swal.fire({
                                icon: "error",
                                title: "Oops!",
                                text: "Something went wrong. Please try again.",
                                showConfirmButton: true
                            });
                        }
                    });
                }
            });
        });
        $("#add-more-images").click(function() {
        let newImageField = `
            <div class="form-group mt-2 d-flex">
                <input type="file" class="form-control" name="images[]" />
                <button type="button" class="btn btn-danger ms-2 remove-image-field">X</button>
            </div>
        `;
        $("#image-upload-container").append(newImageField); // Append to correct container
    });

    // Remove dynamically added image input field
    $(document).on("click", ".remove-image-field", function() {
        $(this).closest(".form-group").remove();
    });
});
    </script>



@endsection
