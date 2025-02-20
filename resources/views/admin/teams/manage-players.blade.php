@extends('admin_layout.master')
@section('content')
<style>
    .ck.ck-content {
    min-height: 10rem;
}
</style>

<div class="nk-block nk-block-lg">
<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">Teams {{ $teams->name ?? '' }} Players</h3>
            </div>
                <div class="nk-block-head-content">
                    <div class="toggle-wrap nk-block-tools-toggle">
                        <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">

                                    <li class="nk-block-tools-opt">
                                        <a href="#" data-target="addProduct" class="toggle btn btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em></a>
                                        <a href="#" data-target="addProduct" class="toggle btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Add New Player</span></a>
                                    </li>
                                </ul>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <table class="datatable-init nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                <thead>
                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col"><span class="sub-text">Name</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Position</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Sports</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Season</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Status</span></th>
                        
                        <th class="nk-tb-col tb-tnx-action">
                            <span>Action</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                @if(isset($teams) && $teams->count())
                    @foreach($teams->players as $player)
                        <tr class="nk-tb-item">

                          
                           
                            <td class="nk-tb-col tb-col-mb">
                                <span class="tb-amount">{{ $player->player->first_name ?? '' }} {{ $player->player->last_name ?? '' }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-mb">
                                <span class="tb-amount">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            @if(isset($positions) && $positions->count())
                                                <select class=" player-position" data-player-id="{{ $player->id }}">
                                                    <option disabled>Select Position</option>
                                                    @foreach ($positions as $position)
                                                        <option value="{{ $position->id }}" 
                                                            {{ isset($player) && $player->position_id == $position->id ? 'selected' : '' }}>
                                                            {{ $position->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </div>
                                    </div>
                                </span>
                            </td>

                            <td class="nk-tb-col tb-col-mb">
                                <span class="tb-amount">{{ $teams->sport->name ?? '' }}</span>
                            </td>
                           
                            <td class="nk-tb-col tb-col-mb">
                                <span class="tb-amount">{{ $player->season_year ?? '' }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-mb">
                                <span class="tb-amount">
                                    <div class="form-group">
                                            <div class="form-control-wrap">
                                                    
                                                    <select class="player-status" data-player-id="{{ $player->id }}" name="player_status">
                                                        
                                                        <option value="retired"
                                                        {{ isset($player) && $player->status == 'retired' ? 'selected' : '' }}>
                                                        retired</option>
                                                        <option value="playing"
                                                        {{ isset($player) && $player->status == 'playing' ? 'selected' : '' }}>
                                                        playing</option>
                                                        
                                                    </select>
                                            </div>
                                    </div>
                                </span>
                            </td>

                            <td class="nk-tb-col nk-tb-col-tools">
                                <ul class="nk-tb-actions gx-1">
                                    <li>
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                                    <!-- <li>
                                                        <a href="{{ url('admin-dashboard/teams/update') ?? '' }}/{{ $team->id ?? ''}}">
                                                            <em class="icon ni ni-edit-fill"></em>
                                                            <span>Edit</span>
                                                        </a>
                                                    </li> -->
                                                
                                                    <li class="removeConfermation" data-url="{{ url('admin-dashboard/teams/remove') ?? '' }}/{{ $team->id ?? '' }}">
                                                        <a class="delete" href="{{ url('admin-dashboard/teams/remove') ?? '' }}/{{ $team->id ?? '' }}">
                                                            <em class="icon ni ni-trash-fill"></em>
                                                            <span>Remove</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    @endforeach    
                @endif
                </tbody>
            </table>
        </div>
    </div>

        <div class="nk-add-product toggle-slide toggle-slide-right" data-content="addProduct" data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h5 class="nk-block-title">New Player</h5>
                </div>
            </div><!-- .nk-block-head -->
            <div class="nk-block">
                <form action="{{ route('add.new.player') ?? '' }}" class="form-validate" novalidate="novalidate" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="team_id" value="{{ $player->team_id ?? ''}}">
                    <div class="row g-3">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Players</label>
                                <sup>
                                    @error('player_id')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </sup>
                                <div class="form-control-wrap">
                                    @if(isset($players) && $players->count())
                                        <select class="form-select js-select2" name="player_id" >
                                            @foreach($players as $player)
                                                <option value="{{ $player->id ?? ''}}">{{ $player->first_name ?? ''}} {{ $player->last_name ?? ''}}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Position</label>
                                <sup>
                                    @error('position_id')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </sup>
                                <div class="form-control-wrap">
                                    @if(isset($positions) && $positions->count())
                                        <select class="form-select js-select2" name="position_id" >
                                            @foreach($positions as $position)
                                                <option value="{{ $position->id ?? ''}}">{{ $position->name ?? ''}}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Season Year</label>
                                <sup>
                                    @error('season_year')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </sup>
                                <div class="form-control-wrap">
                                    <input type="number" class="form-control" value="{{ date('Y') }}" name="season_year" min="1900" max="{{ date('Y') }}" placeholder="Enter year">
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-12">
                            <button class="addCategory btn btn-primary form-control text-center"><em class="icon ni ni-plus"></em><span>Add New Player</span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</div>
<script>
    $(document).ready(function () {
    $('.player-position').change(function () {
        let playerId = $(this).data('player-id');  
        let positionId = $(this).val();           

        $.ajax({
            url: "{{ route('update.player.position') }}", 
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",  
                player_id: playerId,
                position_id: positionId
            },
            success: function (response) {
                // console.log(response);
                if (response.success) {
                    toastr.clear();
                    NioApp.Toast('Player position updated successfully!', 'success', {
                        position: 'top-right'
                    });
                } else {
                    toastr.clear();
                    NioApp.Toast('Failed to update positions!', 'error', {
                        position: 'top-right'
                    });
                }
            },
            error: function () {
                toastr.clear();
                    NioApp.Toast('Something went wrong.', 'error', {
                        position: 'top-right'
                    });
            }
        });
    });



    // change status
    $('.player-status').change(function () {
        let playerId = $(this).data('player-id');  
        let status = $(this).val();           

        $.ajax({
            url: "{{ route('update.player.position') }}", 
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",  
                player_id: playerId,
                status: status
            },
            success: function (response) {
                // console.log(response);
                if (response.success) {
                    toastr.clear();
                    NioApp.Toast('Player status updated successfully!', 'success', {
                        position: 'top-right'
                    });
                } else {
                    toastr.clear();
                    NioApp.Toast('Failed to update status!', 'error', {
                        position: 'top-right'
                    });
                }
            },
            error: function () {
                toastr.clear();
                    NioApp.Toast('Something went wrong.', 'error', {
                        position: 'top-right'
                    });
            }
        });
    });
});

</script>
@endsection
