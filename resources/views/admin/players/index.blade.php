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
            <h3 class="nk-block-title page-title">Players</h3>
            </div>
                <div class="nk-block-head-content">
                    <div class="toggle-wrap nk-block-tools-toggle">
                        <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                    <li class="nk-block-tools-opt">
                                        <a href="{{ url('admin-dashboard/players/add') ?? '' }}" class=" btn btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em></a>
                                        <a href="{{ url('admin-dashboard/players/add') ?? '' }}" class=" btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Add players</span></a>
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
                        <th class="nk-tb-col"><span class="sub-text">Image</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Name</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Email</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Phone</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Height</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Weight</span></th>
                        <th class="nk-tb-col"><span class="sub-text">High School</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Social Links</span></th>
                        
                        <th class="nk-tb-col tb-tnx-action">
                            <span>Action</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                @if(isset($players) && $players->count())
                    @foreach($players as $player)
                        <tr class="nk-tb-item">

                          
                            <td class="nk-tb-col tb-col-mb">
                                <div class="nk-activity-media user-avatar ">
                                    <img src="{{ asset($player->image) ?? '' }}" alt="">
                                </div>
                            </td>
                            <td class="nk-tb-col tb-col-mb">
                                <span class="tb-amount">{{ $player->first_name ?? '' }} {{ $player->last_name ?? '' }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-mb">
                                <span class="tb-amount">{{ $player->email ?? '' }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-mb">
                                <span class="tb-amount">{{ $player->phone ?? '' }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-mb">
                                <span class="tb-amount">{{ $player->height ?? '' }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-mb">
                                <span class="tb-amount">{{ $player->weight ?? '' }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-mb">
                                <span class="tb-amount">{{ $player->high_school ?? '' }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-mb">
                                @if(!empty($player->facebook))
                                    <a href="{{ $player->facebook }}" target="_blank"><em class="fab fa-facebook"></em></a>
                                @endif

                                @if(!empty($player->twitter))
                                    <a href="{{ $player->twitter }}" target="_blank"><em class="fab fa-twitter"></em></a>
                                @endif

                                @if(!empty($player->instagram))
                                    <a href="{{ $player->instagram }}" target="_blank"><em class="fab fa-instagram"></em></a>
                                @endif

                                @if(!empty($player->ticketmaster))
                                    <a href="{{ $player->ticketmaster }}" target="_blank"><em class="fas fa-ticket-alt"></em></a>
                                @endif
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
                                                        <a href="{{ url('admin-dashboard/players/update') ?? '' }}/{{ $player->id ?? ''}}">
                                                            <em class="icon ni ni-edit-fill"></em>
                                                            <span>Edit</span>
                                                        </a>
                                                    </li>
                                                
                                                    <li class="removeConfermation" data-url="{{ url('admin-dashboard/players/remove') ?? '' }}/{{ $player->id ?? '' }}">
                                                        <a class="delete" href="{{ url('admin-dashboard/players/remove') ?? '' }}/{{ $player->id ?? '' }}">
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
