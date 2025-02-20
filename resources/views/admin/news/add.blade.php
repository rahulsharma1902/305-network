@extends('admin_layout.master')
@section('content')
<div class="nk-block nk-block-lg">
    <div class="nk-block-head d-flex justify-content-between">
        <div class="nk-block-head-content">
            <h4 class="title nk-block-title">Add News</h4>
        </div>
    </div>
    <div class="card card-bordered">
        <div class="card-inner">
            <form action="{{ url('admin-dashboard/news/addProcc') }}" class="form-validate" novalidate="novalidate" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row g-gs">
                    <!-- Title Field -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="title">Title</label>
                            <sup>
                                @error('title')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required />
                            </div>
                        </div>
                    </div>

                    <!-- Description Field -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label" for="description">Description</label>
                            <sup>
                                @error('description')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Author Name Field -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="author_name">Author Name</label>
                            <sup>
                                @error('author_name')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="author_name" name="author_name" value="{{ old('author_name') }}" required />
                            </div>
                        </div>
                    </div>

                    <!-- Date Field -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="date">Date</label>
                            <sup>
                                @error('date')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}" required />
                            </div>
                        </div>
                    </div>

                    <!-- Dynamic Player Tags -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label">Players</label>
                            <sup>
                                @error('players_id')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                @if(isset($players) && $players->count())
                                    <select class="form-select js-select2" name="tag_player[]" multiple="multiple" placeolder="Select your coaches">
                                        @foreach($players as $player)
                                            <option value="{{ $player->id ?? ''}}">{{ $player->first_name ?? ''}} {{ $player->last_name ?? ''}}</option>
                                        @endforeach
                                    </select>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Dynamic Multiple Image Upload -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label">Upload Images</label>
                            <sup>
                                @error('images')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <div id="image-upload-area">
                                    <div class="input-group mb-2">
                                        <input type="file" class="form-control" name="images[]">
                                        <button type="button" class="btn btn-danger remove-image">X</button>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-sm btn-primary" id="add-image">Add More</button>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="col-md-12 mt-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
$(document).ready(function(){



    // Dynamically add multiple image upload fields
    $('#add-image').click(function(){
        $('#image-upload-area').append(`
            <div class="input-group mb-2">
                <input type="file" class="form-control" name="images[]">
                <button type="button" class="btn btn-danger remove-image">X</button>
            </div>
        `);
    });

    // Remove image input field
    $(document).on('click', '.remove-image', function(){
        $(this).closest('.input-group').remove();
    });

});
</script>

@endsection
