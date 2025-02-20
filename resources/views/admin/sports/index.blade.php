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
            <h3 class="nk-block-title page-title">Sports</h3>
            </div>
                <div class="nk-block-head-content">
                    <div class="toggle-wrap nk-block-tools-toggle">
                        <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                    <li class="nk-block-tools-opt">
                                        <a href="{{ url('admin-dashboard/sports/add') ?? '' }}" class=" btn btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em></a>
                                        <a href="{{ url('admin-dashboard/sports/add') ?? '' }}" class=" btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Add sports</span></a>
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
                        <th class="nk-tb-col"><span class="sub-text">logo</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Name</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Type</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Social Links</span></th>
                        
                        <th class="nk-tb-col tb-tnx-action">
                            <span>Action</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                @if(isset($sports) && $sports->count())
                    @foreach($sports as $sport)
                        <tr class="nk-tb-item">

                          
                            <td class="nk-tb-col tb-col-mb">
                                <div class="nk-activity-media user-avatar ">
                                    <img src="{{ asset($sport->icon) ?? '' }}" alt="">
                                </div>
                            </td>
                            <td class="nk-tb-col tb-col-mb">
                                <span class="tb-amount">{{ $sport->name ?? '' }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-mb">
                                <span class="tb-amount">{{ $sport->type ?? '' }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-mb">
                                @if(!empty($sport->facebook))
                                    <a href="{{ $sport->facebook }}" target="_blank"><em class="fab fa-facebook"></em></a>
                                @endif

                                @if(!empty($sport->twitter))
                                    <a href="{{ $sport->twitter }}" target="_blank"><em class="fab fa-twitter"></em></a>
                                @endif

                                @if(!empty($sport->instagram))
                                    <a href="{{ $sport->instagram }}" target="_blank"><em class="fab fa-instagram"></em></a>
                                @endif

                                @if(!empty($sport->ticketmaster))
                                    <a href="{{ $sport->ticketmaster }}" target="_blank"><em class="fas fa-ticket-alt"></em></a>
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
                                                        <a href="{{ url('admin-dashboard/sports/update') ?? '' }}/{{ $sport->id ?? ''}}">
                                                            <em class="icon ni ni-edit-fill"></em>
                                                            <span>Edit</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ url('admin-dashboard/sports/attributes') ?? '' }}/{{ $sport->id ?? ''}}">
                                                            <em class="icon ni ni-edit-fill"></em>
                                                            <span>Manage Sports Attributes</span>
                                                        </a>
                                                    </li>
                                                    <li class="removeConfermation" data-url="{{ url('admin-dashboard/sports/remove') ?? '' }}/{{ $sport->id ?? '' }}">
                                                        <a class="delete" href="{{ url('admin-dashboard/sports/remove') ?? '' }}/{{ $sport->id ?? '' }}">
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
