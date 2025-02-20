
@extends('admin_layout.master')
@section('content')
<div class="nk-block nk-block-lg">
    <div class="nk-block-head d-flex justify-content-between">
        <div class="nk-block-head-content">
            <h4 class="title nk-block-title">Update Team</h4>   
        </div>
    </div>
    <div class="card card-bordered">
        <div class="card-inner">
            <form action="{{ url('admin-dashboard/teams/addProcc') }}" class="form-validate" novalidate="novalidate" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $teams->id ?? '' }}" name="id">
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
                                <input type="text" class="form-control" id="name" name="name" value="{{ $teams->name ?? '' }}" />
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="slug" value="{{ old('slug', $teams->slug ?? '') }}">

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
                                    <select class="form-select js-select2" name="sport_id" id="sport_id_display" disabled>
                                        @foreach ($sports as $sport)
                                            <option value="{{ $sport->id }}" 
                                                {{ old('sport_id', isset($teams) ? $teams->sport_id : '') == $sport->id ? 'selected' : '' }}>
                                                {{ $sport->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="sport_id" value="{{ old('sport_id', $teams->sport_id ?? '') }}">
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
                                    <select class="form-select js-select2" name="coaches_id[]" multiple="multiple">
                                        @foreach ($coaches as $coache)
                                            <option value="{{ $coache->id }}" 
                                                {{ in_array($coache->id, old('coaches_id', isset($teams) ? $teams->coaches->pluck('coach_id')->toArray() : [])) ? 'selected' : '' }}>
                                                {{ $coache->name }}
                                            </option>
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
                                    <select class="form-select js-select2" name="players_id[]" multiple="multiple" disabled>
                                        @foreach($players as $player)
                                            <option value="{{ $player->id ?? '' }}" 
                                                {{ in_array($player->id, old('players_id', isset($teams) ? $teams->players->pluck('player_id')->toArray() : [])) ? 'selected' : '' }}>
                                                {{ $player->first_name ?? '' }} {{ $player->last_name ?? '' }}
                                            </option>
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
                                    <input type="file" class="form-file-input" name="logo" id="logo">
                                    <label class="form-file-label" for="logo">Choose if you want to update your logo</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <img src="{{ asset($teams->logo ?? '') }}" alt="Sport Icon" />
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
                                    <label class="form-file-label" for="image">Choose if you want to update your banner</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <img src="{{ asset($teams->image ?? '') }}" alt="Player banner" />
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <div class="row ">
                        <div class=" mt-4">
                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-primary">Update Team</button>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="form-group">
                                <a href="{{ url('admin-dashboard/teams/manage-players') ?? '' }}/{{ $teams->id ?? '' }}" class="btn btn-lg btn-dark">Manage Your Team Players</a>
                            </div>
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
