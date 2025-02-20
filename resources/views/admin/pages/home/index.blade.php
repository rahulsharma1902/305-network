@extends('admin_layout.master')
@section('content')

<div class="nk-block nk-block-lg">
    <div class="nk-block-head d-flex justify-content-between">
        <div class="nk-block-head-content">
            <h4 class="title nk-block-title">Update Home Page Content</h4>
        </div>
    </div>
    <div class="card card-bordered">
        <div class="card-inner">
            <form action="{{ url('admin-dashboard/pages/home/addProcc') }}" class="form-validate" novalidate="novalidate" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row g-gs">

                    
                    <!-- Banner Sliders -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label title="Recommended size:1802 × 664 px" class="form-label">Banner Sliders </label>
                            <input type="file" class="form-control" name="banner_sliders[]" accept="image/*" multiple>
                            <small class="text-muted">
                                Recommended size: <code> 1802 × 664 px</code> 
                            </small>
                            @if(isset($homePage->bannerSliders) && $homePage->bannerSliders->count() > 0)
                                <div class="row mt-3">
                                    @foreach($homePage->bannerSliders as $slider)
                                    <div class="col-sm-6 col-lg-4 col-xxl-3 banner-slider-item" data-id="{{ $slider->id }}">
                                        <div class="gallery card card-bordered position-relative">
                                            <a class="gallery-image popup-image" href="{{ asset($slider->image) }}">
                                                <img class="w-100 rounded-top" src="{{ asset($slider->image) }}" alt="">
                                            </a>
                                            <button style="z-index: 1028;"  title="Close (Esc)" type="button" data-id="{{ $slider->id }}" class="mfp-close remove-slider">×</button>
                                            
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- Advertisement Banner -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Advertisement Banner</label>
                            <input type="file" class="form-control" name="advertisement_banner_image">
                            @if(isset($homePage->advertisement_banner_image))
                                
                                <div class="col-sm-6 col-lg-4 col-xxl-3 banner-slider-item my-4">
                                        <div class="gallery card card-bordered position-relative">
                                            <a class="gallery-image popup-image" href="{{ asset($homePage->advertisement_banner_image) }}">
                                                <img class="w-100 rounded-top" src="{{ asset($homePage->advertisement_banner_image) }}" alt="">
                                            </a>
                                            
                                        </div>
                                    </div>
                            @endif
                        </div>
                    </div>

                    <!-- News Ticker (Multiple) -->
                    <div class="col-md-12 mt-3">
                        <div class="form-group">
                            <label class="form-label" for="news_ticker_title">News Ticker Title</label>
                            <input type="text" class="form-control" id="news_ticker_title" name="news_ticker_title" value="{{ old('news_ticker_title', $homePage->news_ticker_title ?? '') }}">
                        </div>
                    </div> 
                    <div class="col-md-12 mt-3">
                        <div class="form-group">       
                            <label class="form-label" for="news_ticker_content  mt-3">News Ticker Content</label>
                            <sup>@error('news_ticker_content')<div class="error text-danger">{{ $message }}</div>@enderror</sup>

                            <div id="newsTickerContainer">
                                @if(isset($homePage->newsTickerContents) && $homePage->newsTickerContents->count() > 0)
                                    @foreach($homePage->newsTickerContents as $content)
                                        <div class="news-ticker-input-group d-flex align-items-center mt-2">
                                            <input type="text" class="form-control" name="news_ticker_content[]" value="{{ $content->title ?? '' }}" placeholder="Enter news ticker content" />
                                            <button type="button" class="btn btn-danger btn-sm ms-2" onclick="removeNewsTickerField(this)">Remove</button>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="news-ticker-input-group d-flex align-items-center">
                                        <input type="text" class="form-control" name="news_ticker_content[]" placeholder="Enter news ticker content" />
                                        <button type="button" class="btn btn-danger btn-sm ms-2" onclick="removeNewsTickerField(this)">Remove</button>
                                    </div>
                                @endif
                            </div>

                            <button type="button" class="btn btn-sm btn-primary mt-2" onclick="addNewsTickerField()">Add Another News Ticker Content</button>
                        </div>
                    </div>

                    <script>
                        function addNewsTickerField() {
                            const container = document.getElementById('newsTickerContainer');
                            const div = document.createElement('div');
                            div.className = 'news-ticker-input-group d-flex align-items-center mt-2';
                            
                            div.innerHTML = `
                                <input type="text" class="form-control" name="news_ticker_content[]" placeholder="Enter news ticker content" />
                                <button type="button" class="btn btn-danger btn-sm ms-2" onclick="removeNewsTickerField(this)">Remove</button>
                            `;

                            container.appendChild(div);
                        }

                        function removeNewsTickerField(button) {
                            button.parentElement.remove();
                        }
                    </script>

                   

                    <!-- Match Highlights (Multiple URLs) -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label" for="match_highlight_video">Highlight Videos</label>
                            <sup>@error('match_highlight_video')<div class="error text-danger">{{ $message }}</div>@enderror</sup>

                            <div id="highlightVideosContainer">
                                @if(isset($homePage->matchHighlights) && $homePage->matchHighlights->count() > 0)
                                    @foreach($homePage->matchHighlights as $highlight)
                                        <div class="video-input-group d-flex align-items-center mt-2">
                                            <input type="text" class="form-control" name="match_highlight_video[]" value="{{ $highlight->video_url ?? '' }}" placeholder="Enter a video URL" />
                                            <button type="button" class="btn btn-danger btn-sm ms-2" onclick="removeHighlightVideoField(this)">Remove</button>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="video-input-group d-flex align-items-center">
                                        <input type="text" class="form-control" name="match_highlight_video[]" placeholder="Enter a video URL" />
                                        <button type="button" class="btn btn-danger btn-sm ms-2" onclick="removeHighlightVideoField(this)">Remove</button>
                                    </div>
                                @endif
                            </div>

                            <button type="button" class="btn btn-sm btn-primary mt-2" onclick="addHighlightVideoField()">Add Another Highlight</button>
                        </div>
                    </div>

                    <script>
                        function addHighlightVideoField() {
                            const container = document.getElementById('highlightVideosContainer');
                            const div = document.createElement('div');
                            div.className = 'video-input-group d-flex align-items-center mt-2';
                            
                            div.innerHTML = `
                                <input type="text" class="form-control" name="match_highlight_video[]" placeholder="Enter a video URL" />
                                <button type="button" class="btn btn-danger btn-sm ms-2" onclick="removeHighlightVideoField(this)">Remove</button>
                            `;

                            container.appendChild(div);
                        }

                        function removeHighlightVideoField(button) {
                            button.parentElement.remove();
                        }
                    </script>

                 

                    <!-- Match Notifications Banners (Multiple Image Uploads) -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label" for="match_notifications_banner">Match Notifications (Select Multiple Images)</label>
                            <input type="file" class="form-control" name="match_notifications_banner[]" accept="image/*" multiple>
                        
                            @if(isset($homePage->matchNotifications) && $homePage->matchNotifications->count() > 0)
                                <div class="row mt-3">
                                    @foreach($homePage->matchNotifications as $notification)
                                    <div class="col-sm-6 col-lg-4 col-xxl-3 banner-slider-item" data-id="{{ $notification->id }}">
                                        <div class="gallery card card-bordered position-relative">
                                            <a class="gallery-image popup-image" href="{{ asset($notification->image) }}">
                                                <img class="w-100 rounded-top" src="{{ asset($notification->image) }}" alt="">
                                            </a>
                                            <button style="z-index: 1028;" title="Close (Esc)" type="button" data-id="{{ $notification->id }}" class="mfp-close remove-notification remove-highlight">×</button>
                                            
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="col-md-12 mt-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Update You Home Content</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() { 
        $('.remove-slider, .remove-highlight').click(function() {
            let id = $(this).data('id');
            $(this).closest('.banner-slider-item').remove();
            $('<input>').attr({type: 'hidden', name: 'delete_items[]', value: id}).appendTo('form');
        });
    });
</script>
@endsection
