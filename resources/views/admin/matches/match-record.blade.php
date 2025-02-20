@extends('admin_layout.master')
@section('content')

<div class="nk-block nk-block-lg">
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">{{ $match->team1->name ?? '' }} vs {{ $match->team2->name ?? '' }}</h3>
            </div>
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                            <!-- <li class="nk-block-tools-opt">
                                <a href="{{ url('admin-dashboard/matches/add') ?? '' }}" class="btn btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em></a>
                                <a href="{{ url('admin-dashboard/matches/add') ?? '' }}" class="btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Add matches</span></a>
                            </li> -->
                            <li>
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle btn btn-white btn-dim btn-outline-light" 
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                        <span><span class="d-none d-md-inline">Select</span> Team</span>
                                        <em class="dd-indc icon ni ni-chevron-right"></em>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <ul class="link-list-opt no-bdr">
                                            <li class="select-team" data-for="all">
                                                <a href="#"><span>Select Both Teams</span></a>
                                            </li>
                                            <li class="select-team" data-for="team1">
                                                <a href="#"><span>{{ $match->team1->name ?? 'Team 1' }}</span></a>
                                            </li>
                                            <li class="select-team" data-for="team2">
                                                <a href="#"><span>{{ $match->team2->name ?? 'Team 2' }}</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

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
                        <th class="nk-tb-col">
                            <span>Team Name</span>
                        </th>
                        <th class="nk-tb-col"><span class="sub-text">Player Name</span></th>
                        @foreach($match->sportAttributes as $sportAttr)
                            <th class="nk-tb-col"><span class="sub-text">{{ $sportAttr['attribute_name'] ?? '' }}</span></th>
                        @endforeach
                        
                        <th class="nk-tb-col tb-tnx-action">
                            <span>Player Position</span>
                        </th>
                        <th class="nk-tb-col tb-tnx-action">
                            <span>Action</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($match->sportAttributes) && $match->sportAttributes->count())
                        <!-- Team 1 Players -->
                        @foreach($match->team1->players as $player)
                            <tr class="nk-tb-item team1players" >
                               
                                <td class="nk-tb-col tb-col-mb">
                                    <div class="nk-activity-media user-avatar ">
                                        <img src="{{ asset($match->team1->logo) ?? '' }}" alt="">
                                    </div>
                                    <span class="tb-amount">{{ $match->team1->name ?? '' }}</span>
                                </td>
                                <td class="nk-tb-col">
                                    <span class="tb-amount">{{ $player->player->first_name ?? '' }}</span>
                                </td>
                                @foreach($match->sportAttributes as $attr)
                                    @php
                                    
                                        $attributeValue = collect($player->matchPlayerStats)
                                            ->firstWhere('attribute_id', $attr->id)
                                            ->attribute_value ?? '0';
                                        @endphp
                                    <td class="nk-tb-col">
                                        <span class="tb-amount">{{ $attributeValue }}</span>
                                    </td>
                                @endforeach
                               
                                <td class="nk-tb-col">
                                    <span class="tb-amount">{{ $player->position->short_code ?? '' }}</span>
                                </td>
                                <td class="nk-tb-col nk-tb-col-tools">
                                    <ul class="nk-tb-actions gx-1">
                                        <li>
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li>
                                                        <a href="{{ url('admin-dashboard/matches/update-attr', [$match->id ?? '', $player->id ?? '']) }}">
                                                                <em class="icon ni ni-edit-fill"></em>
                                                                <span>Edit</span>
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

                        <!-- Team 2 Players -->
                        @foreach($match->team2->players as $player)
                            <tr class="nk-tb-item team2players">
                                <td class="nk-tb-col tb-col-mb">
                                    <div class="nk-activity-media user-avatar ">
                                        <img src="{{ asset($match->team2->logo) ?? '' }}" alt="">
                                    </div>
                                    <span class="tb-amount">{{ $match->team2->name ?? '' }}</span>
                                </td>
                                <td class="nk-tb-col">
                                    <span class="tb-amount">{{ $player->player->first_name ?? '' }}</span>
                                </td>
                                @foreach($match->sportAttributes as $attr)
                                    @php
                                    
                                        $attributeValue = collect($player->matchPlayerStats)
                                                ->firstWhere('attribute_id', $attr->id)
                                                ->attribute_value ?? '0';
                                    @endphp
                                    <td class="nk-tb-col">
                                        <span class="tb-amount">{{ $attributeValue }}</span>
                                    </td>
                                @endforeach
                                
                                <td class="nk-tb-col">
                                    <span class="tb-amount">{{ $player->position->short_code ?? '' }}</span>
                                </td>
                                <td class="nk-tb-col nk-tb-col-tools">
                                    <ul class="nk-tb-actions gx-1">
                                        <li>
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li>
                                                        <a href="{{ url('admin-dashboard/matches/update-attr', [$match->id ?? '', $player->id ?? '']) }}">
                                                            <!-- <a href="{{ url('admin-dashboard/matche/update') ?? '' }}/{{ $match->id ?? ''}}"> -->
                                                                <em class="icon ni ni-edit-fill"></em>
                                                                <span>Edit</span>
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

   
</div>

<script>
    $(document).ready(function () {
        $('.select-team').on('click', function (e) {
            e.preventDefault(); // Prevent page reload from anchor tag
            var selectedTeam = $(this).data('for'); // Get team from data attribute
            
            if (selectedTeam === 'team1') {
                $('.team1players').show();
                $('.team2players').hide();
            } else if (selectedTeam === 'team2') {
                $('.team2players').show();
                $('.team1players').hide();
            } else {
                // Show both teams when "all" is selected
                $('.team1players').show();
                $('.team2players').show();
            }
            
            console.log('Selected Team:', selectedTeam);
        });
    });
</script>


@endsection