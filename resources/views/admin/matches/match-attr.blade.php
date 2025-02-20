@extends('admin_layout.master')
@section('content')
<div class="nk-block nk-block-lg">
    <div class="nk-block-head d-flex justify-content-between">
        <div class="nk-block-head-content">
            <h4 class="title nk-block-title">Update Match Records :
                <span class="text-success">{{ $playerAttr->first()->matchdata->team1->name ?? '' }}  </span>
                vs 
                <span class="text-success">{{ $playerAttr->first()->matchdata->team2->name ?? '' }} </span>
                #
                <span class="text-danger">
                 {{ $playerAttr->first()->player->first_name ?? '' }} {{ $playerAttr->first()->player->last_name ?? '' }}
                </span>
            </h4>
        </div>
    </div>
    <div class="card card-bordered">
        <div class="card-inner">
            <form action="{{ url('admin-dashboard/matche/player-records/addProcc') }}" class="form-validate" method="post">
                @csrf
                <input type="hidden" value="{{ $playerAttr->first()->match_id ?? '' }}" name="match_id">
                <input type="hidden" value="{{ $playerAttr->first()->player_id ?? '' }}" name="player_id">
                
                @foreach ($playerAttr as $attr)
                    <div class="form-group">
                        <label class="form-label" for="attribute_{{ $attr->attribute->id ?? '' }}">
                            {{ $attr->attribute->attribute_name ?? 'Attribute' }}
                        </label>
                        <input type="text" class="form-control" id="attribute_{{ $attr->attribute->id ?? '' }}"
                               name="attributes[{{ $attr->attribute->id ?? '' }}]"
                               value="{{ $attr->attribute_value ?? '0' }}">
                    </div>
                @endforeach
                
                <div class="mt-4">
                    <button type="submit" class="btn btn-lg btn-primary">Update Match Records</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
