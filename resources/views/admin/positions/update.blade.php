@extends('admin_layout.master')
@section('content')
<div class="nk-block nk-block-lg">
    <div class="nk-block-head d-flex justify-content-between">
        <div class="nk-block-head-content">
            <h4 class="title nk-block-title">Edit Positions</h4>   
        </div>
    </div>
    <div class="card card-bordered">
        <div class="card-inner">
            <form action="{{ url('admin-dashboard/positions/addProcc') }}/{{ $positions->id ?? '' }}" class="form-validate" novalidate="novalidate" method="post" enctype="multipart/form-data">
                @csrf
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
                                <input type="text" class="form-control" id="name" name="name" value="{{ $positions->name ?? '' }}" />
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="short_code">Short Code</label>
                            <sup>
                                @error('short_code')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="short_code" name="short_code" value="{{ $positions->short_code ?? '' }}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label">Category</label>
                            <sup>
                                @error('category')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <select class="form-select js-select2" name="category">
                                    <option value="player" {{ $positions->category === 'player' ? 'selected' : '' }}>Player</option>
                                    <option value="coach" {{ $positions->category === 'coach' ? 'selected' : '' }}>Coach</option>
                                </select>
                            </div>
                        </div>
                      
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label">Sport</label>
                            <sup>
                                @error('sport_id')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                
                                @if(isset($sports) && $sports->count())
                                    <select class="form-select js-select2" name="sport_id">
                                    @foreach ($sports as $sport)
                                        <option value="{{ $sport->id }}" 
                                            {{ old('sport_id', isset($positions) ? $positions->sport_id : '') == $sport->id ? 'selected' : '' }}>
                                            {{ $sport->name }}
                                        </option>
                                    @endforeach
                                    </select>
                                @endif
                            </div>
                        </div>
                      
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label" for="description">description</label>
                            <sup>
                                @error('description')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <textarea name="description" class="description" id="description">{{ $positions->description ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>

                    

                    <!-- Submit Button -->
                    <div class="col-md-12 mt-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Update Position</button>
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
