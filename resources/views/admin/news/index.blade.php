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
            <h3 class="nk-block-title page-title">News</h3>
            </div>
                <div class="nk-block-head-content">
                    <div class="toggle-wrap nk-block-tools-toggle">
                        <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                    <li class="nk-block-tools-opt">
                                        <a href="{{ url('admin-dashboard/news/add') ?? '' }}" class=" btn btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em></a>
                                        <a href="{{ url('admin-dashboard/news/add') ?? '' }}" class=" btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Add news</span></a>
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

                        <th class="nk-tb-col"><span class="sub-text">id</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Title</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Description</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Author name</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Tag player</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Date</span></th>

                        <th class="nk-tb-col tb-tnx-action">
                            <span>Action</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($news as $item)
                    <tr class="nk-tb-item">
                        <td class="nk-tb-col tb-col-mb">
                            <span class="tb-amount">{{ $item->id }}</span>
                        </td>
                        <td class="nk-tb-col tb-col-mb">
                            <span class="tb-amount">{{ $item->title }}</span>
                        </td>
                        <td class="nk-tb-col tb-col-mb">
                            <span class="tb-amount">{{ Str::limit($item->description,10) }}</span>
                        </td>
                        <td class="nk-tb-col tb-col-mb">
                            <span class="tb-amount">{{ $item->author_name }}</span>
                        </td>
                        <td class="nk-tb-col tb-col-mb">
                            <span class="tb-amount">{{ implode(', ', $item->tag_player ?? []) }}</span>
                        </td>
                        <td class="nk-tb-col tb-col-mb">
                            <span class="tb-amount">{{ \Carbon\Carbon::parse($item->date)->format('d M, Y') }}</span>
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
                                                    <a href="{{ url('admin-dashboard/news/update', $item->id) }}">
                                                        <em class="icon ni ni-edit-fill"></em>
                                                        <span>Edit</span>
                                                    </a>
                                                </li>
                                                <li class="removeConfermation" data-url="{{ url('admin-dashboard/news/remove', $item->id) }}">
                                                    <a class="delete" href="{{ url('admin-dashboard/news/remove', $item->id) }}">
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
                </tbody>

            </table>
        </div>
    </div>


</div>

@endsection
