@extends('admin_layout.master')
@section('content')
<div class="nk-block nk-block-lg">
    <div class="nk-block-head d-flex justify-content-between">
        <div class="nk-block-head-content">
            <h4 class="title nk-block-title">Add Coaches</h4>   
        </div>
    </div>
    <div class="card card-bordered">
        <div class="card-inner">
            <form action="{{ url('admin-dashboard/coaches/addProcc') }}" class="form-validate" novalidate="novalidate" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $coaches->id ?? '' }}">

                <div class="row g-gs">
                    <!-- Name Field -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="name">Name</label>
                            <sup>
                                @error('name')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="name" name="name" value="{{ $coaches->name ?? '' }}" />
                            </div>
                        </div>
                    </div>
                    <input type="hidden" class="form-control" id="slug" name="slug" value="{{ $coaches->slug ?? '' }}" />

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="title">Title</label>
                            <sup>
                                @error('title')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="title" name="title" value="{{ $coaches->title ?? '' }}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="phone">Phone</label>
                            <sup>
                                @error('phone')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ $coaches->phone ?? '' }}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="email">Email</label>
                            <sup>
                                @error('email')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="email" name="email" value="{{ $coaches->email ?? ''  }}" />
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="twitter">Twitter</label>
                            <sup>
                                @error('twitter')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="twitter" name="twitter" value="{{ $coaches->twitter ?? ''  }}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label">Position</label>
                            <sup>
                                @error('position_id')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                
                                @if(isset($positions) && $positions->count())
                                    <select class="form-select js-select2" name="position_id">
                                    @foreach ($positions as $position)
                                        <option value="{{ $position->id }}" 
                                            {{ old('position', isset($coaches) ? $coaches->position_id : '') == $position->id ? 'selected' : '' }}>
                                            {{ $position->name }}
                                        </option>
                                    @endforeach
                                    </select>
                                @endif
                            </div>
                        </div>
                      
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label" for="bio">Bio</label>
                            <div class="form-control-wrap">
                                <textarea name="bio" class="description" id="bio">{{ $coaches->bio ?? ''  }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label" for="career_record">Career Record</label>
                            <sup>
                                @error('career_record')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <textarea name="career_record" class="description" id="career_record">{{ $coaches->career_record ?? ''  }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label" for="postseason_appearances">Postseason Appearances</label>
                            <sup>
                                @error('postseason_appearances')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <textarea name="postseason_appearances" class="description" id="postseason_appearances">{{ $coaches->postseason_appearances ?? ''  }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label" for="image">Image</label>
                            <sup>
                                @error('image')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <div class="form-file">
                                    <input type="file" class="form-file-input" name="image" id="image">
                                    <label class="form-file-label" for="image">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                           
                                <img src="{{ asset($coaches->image ?? '') }}" alt="Sport Icon" />

                        </div>
                    </div>
                    <!-- Submit Button -->
                    <div class="col-md-12 mt-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Update Coache</button>
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
    // Update the slug field based on the name field
    $('#name').on('input', function(){
        let name = $(this).val().toLowerCase();
        let slug = name.replace(/\s+/g, "-").replace(/\//g, "-");
        $('#slug').val(slug);
    });

});
</script>
@endsection
