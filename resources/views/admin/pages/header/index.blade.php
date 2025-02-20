@extends('admin_layout.master')
@section('content')

<div class="nk-block nk-block-lg">
    <div class="nk-block-head d-flex justify-content-between">
        <div class="nk-block-head-content">
            <h4 class="title nk-block-title">Update Header Content</h4>
        </div>
    </div>
    <div class="card card-bordered">
        <div class="card-inner">
            <form action="{{ url('admin-dashboard/pages/header/addProcc') }}" class="form-validate" novalidate="novalidate" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row g-gs">

                    <div class="col-md-12 mt-3">
                        <div class="form-group">
                            <label class="form-label" for="breaking_text">Breaking Text</label>
                            <sup>@error('breaking_text') <div class="error text-danger">{{ $message }}</div> @enderror</sup>

                            <input type="text" class="form-control" id="breaking_text" name="breaking_text" value="{{ old('breaking_text', $headerPage->breaking_text ?? '') }}">
                        </div>
                    </div> 

                    <div class="col-md-12 mt-3">
                        <div class="form-group">
                            <label class="form-label" for="news_label">News Label</label>
                            <sup>@error('news_label') <div class="error text-danger">{{ $message }}</div> @enderror</sup>

                            <input type="text" class="form-control" id="news_label" name="news_label" value="{{ old('news_label', $headerPage->news_label ?? '') }}">
                        </div>
                    </div>

                    <div class="col-md-12 mt-3">
                        <div class="form-group">
                            <label class="form-label" for="news_ticker_text">News Ticker Text</label>
                            <sup>@error('news_ticker_text') <div class="error text-danger">{{ $message }}</div> @enderror</sup>

                            <input type="text" class="form-control" id="news_ticker_text" name="news_ticker_text" value="{{ old('news_ticker_text', $headerPage->news_ticker_text ?? '') }}">
                        </div>
                    </div>

                    <div class="col-md-12 mt-3">
                        <div class="form-group">
                            <label class="form-label" for="news_ticker_link">News Ticker Link</label>
                            <sup>@error('news_ticker_link') <div class="error text-danger">{{ $message }}</div> @enderror</sup>

                            <input type="text" class="form-control" id="news_ticker_link" name="news_ticker_link" value="{{ old('news_ticker_link', $headerPage->news_ticker_link ?? '') }}">
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="col-md-12 mt-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Update Header Content</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

@endsection
