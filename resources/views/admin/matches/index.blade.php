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
            <h3 class="nk-block-title page-title">matches</h3>
            </div>
                <div class="nk-block-head-content">
                    <div class="toggle-wrap nk-block-tools-toggle">
                        <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                    <li class="nk-block-tools-opt">
                                        <a href="{{ url('admin-dashboard/matches/add') ?? '' }}" class=" btn btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em></a>
                                        <a href="{{ url('admin-dashboard/matches/add') ?? '' }}" class=" btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Add matches</span></a>
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
                        <th class="nk-tb-col"><span class="sub-text">Team1</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Team2</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Winning Team</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Team1 Score</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Team2 Score</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Man of the match</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Match Status</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Highlight Status</span></th>
                        
                        <th class="nk-tb-col tb-tnx-action">
                            <span>Action</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                @if(isset($matches) && $matches->count())
                    @foreach($matches as $matche)
                        <tr class="nk-tb-item">

                          
                            
                            <td class="nk-tb-col tb-col-mb">
                                <div class="nk-activity-media user-avatar ">
                                    <img src="{{ asset($matche->team1->logo) ?? '' }}" alt="">
                                </div>
                                <span class="tb-amount">{{ $matche->team1->name ?? '' }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-mb">
                                <div class="nk-activity-media user-avatar ">
                                    <img src="{{ asset($matche->team2->logo) ?? '' }}" alt="">
                                </div>
                                <span class="tb-amount">{{ $matche->team2->name ?? '' }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-mb">
                                <span class="tb-amount">
                                    {{ $matche->winningteam->name ?? '-' }}
                                </span>
                            </td>
                            <td class="nk-tb-col tb-col-mb">
                                <span class="tb-amount">
                                    {{ $matche->score_team1 ?? '0' }}
                                </span>
                            </td>
                            <td class="nk-tb-col tb-col-mb">
                                <span class="tb-amount">
                                    {{ $matche->score_team2 ?? '0' }}
                                </span>
                            </td>
                            <td class="nk-tb-col tb-col-mb">
                                <span class="tb-amount">{{ $matche->manofthematch->first_name ?? '-' }} {{ $matche->manofthematch->last_name ?? '-' }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-mb">
                                <span class="tb-amount">{{ $matche->status ?? '' }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-mb">
                                <div class="nk-ibx-context-badges">
                                    <span class="badge bg-{{ $matche->highlight_status === 'featured' ? 'success' : 'warning' }}">
                                        {{ $matche->highlight_status === 'featured' ? 'Featured' : 'Non Featured' }}
                                    </span>
                                </div>
                            </td>


                            <td class="nk-tb-col nk-tb-col-tools">
                                <ul class="nk-tb-actions gx-1">
                                    <li>
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                                    <li>
                                                        <a href="{{ url('admin-dashboard/matches/update') ?? '' }}/{{ $matche->id ?? ''}}">
                                                            <em class="icon ni ni-edit-fill"></em>
                                                            <span>Edit</span>
                                                        </a>
                                                    </li>
                                                    @if($matche->status === 'done')
                                                    <li>
                                                        <a href="{{ url('admin-dashboard/matches/update-match-record') ?? '' }}/{{ $matche->id ?? ''}}">
                                                            <em class="icon ni ni-edit-fill"></em>
                                                            <span>Player match records</span>
                                                        </a>
                                                    </li>
                                                    @endif
                                                    <li class="removeConfermation" data-url="{{ url('admin-dashboard/matches/remove') ?? '' }}/{{ $matche->id ?? '' }}">
                                                        <a class="delete" href="{{ url('admin-dashboard/matches/remove') ?? '' }}/{{ $matche->id ?? '' }}">
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


</div>

@endsection
