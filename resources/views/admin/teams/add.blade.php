
@extends('admin_layout.master')
@section('content')
<div class="nk-block nk-block-lg">
    <div class="nk-block-head d-flex justify-content-between">
        <div class="nk-block-head-content">
            <h4 class="title nk-block-title">Add Team</h4>   
        </div>
    </div>
    <div class="card card-bordered">
        <div class="card-inner">
            <form action="{{ url('admin-dashboard/teams/addProcc') }}" class="form-validate" novalidate="novalidate" method="post" enctype="multipart/form-data">
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
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label">Sports</label>
                            <sup>
                                @error('sport_id')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                
                                @if(isset($sports) && $sports->count())
                                    <select class="form-select js-select2" name="sport_id"  data-search="on">
                                        @foreach($sports as $sport)
                                            <option value="{{ $sport->id ?? ''}}">{{ $sport->name ?? ''}}</option>
                                        @endforeach
                                    </select>
                                @endif
                            </div>
                        </div>
                       
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label">Coaches</label>
                            <sup>
                                @error('coaches_id')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                @if(isset($coaches) && $coaches->count())
                                    <select class="form-select js-select2" name="coaches_id[]" multiple="multiple" placeolder="Select your coaches">
                                        @foreach($coaches as $coache)
                                            <option value="{{ $coache->id ?? ''}}">{{ $coache->name ?? ''}}</option>
                                        @endforeach
                                    </select>
                                @endif
                            </div>
                        </div>
                    </div>
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
                                    <select class="form-select js-select2" name="players_id[]" multiple="multiple" placeolder="Select your coaches">
                                        @foreach($players as $player)
                                            <option value="{{ $player->id ?? ''}}">{{ $player->first_name ?? ''}} {{ $player->last_name ?? ''}}</option>
                                        @endforeach
                                    </select>
                                @endif
                            </div>
                        </div>
                    </div>
                   
                  
                   
                  
                 
                    
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label" for="logo">logo</label>
                            <sup>
                                @error('logo')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <div class="form-file">
                                    <input type="file" class="form-file-input" name="logo" id="logo" required>
                                    <label class="form-file-label" for="logo">Choose your logo</label>
                                </div>
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
                                    <input type="file" class="form-file-input" name="image" id="image" required>
                                    <label class="form-file-label" for="image">Choose your banner image</label>
                                </div>
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
    // Update the slug field based on the name field
    $('#name').on('input', function(){
        let name = $(this).val().toLowerCase();
        let slug = name.replace(/\s+/g, "-").replace(/\//g, "-");
        $('#slug').val(slug);
    });

});
</script>

@endsection
