@extends('user_layout.master')

@section('content')


	<!-- banner section start  -------------------->
	<section class="hero_sec">
		<div class="banner-slider">
			@if(isset($homePage->bannerSliders) && $homePage->bannerSliders->count() > 0)
				@foreach($homePage->bannerSliders as $slider)
					<div class="banner-slide">
						<img src="{{asset($slider->image) ?? ''}}" alt="American Football">
					</div>
				@endforeach
			@else
			<div class="banner-slide">
				<img src="{{asset('img/banner_img.png')}}" alt="Football Match">
			</div>
			@endif
			<!-- <div class="banner-slide">
				<img src="{{asset('img/banner_img.png')}}" alt="Football Match">
			</div>
			<div class="banner-slide">
				<img src="{{asset('img/banner_img.png')}}" alt="Football Match">
			</div>
			<div class="banner-slide">
				<img src="{{asset('img/banner_img.png')}}" alt="Football Match">
			</div>
			<div class="banner-slide">
				<img src="{{asset('img/banner_img.png')}}" alt="Football Match">
			</div> -->
		</div>
		<div class="slider-counter">
			<span class="current-slide">1</span> / <span class="total-slides"></span>
		</div>
		<div class="hero_imgabs">
			<img src="{{asset('img/hero_abimg.png')}}" alt="">
		</div>
	</section>
	<!-- banner section start  -------------------->

	<!-- First section start -->
	<section class="sec1_start">
		<div class="sec1_inside">
			@if(isset($homePage->advertisement_banner_image))
				<img class="img_sec1" src="{{ asset($homePage->advertisement_banner_image) }}" alt="Section Image">
			@else
			<img class="img_sec1" src="{{asset('img/sec1_img.png')}}" alt="Section Image">
			@endif
			<div class="cross_icon">
				<a href="#">
					<img src="{{asset('img/sec1_crs.png')}}" alt="Close Icon">
				</a>
			</div>
		</div>
	</section>
	<!-- First section end -->

	<!-- Blog section start ---->
	<section class="blog_sec">
		<div class="inside_blogsec">
			<div class="container">
				<div class="hdg_slider">
					<h2>LATEST NEWS</h2>
				</div>
				<div class="row">
					<div class="col-lg-8 blog_sildr">
						<div class="inside_blg">
							<div class="slid_secblog">
								<div class="slick-blog">
									<div><img src="{{asset('img/blog_sld1.png')}}" alt="Blog Slide 1"></div>
									<div><img src="{{asset('img/blog_sld2.png')}}" alt="Blog Slide 2"></div>
									<div><img src="{{asset('img/blog_sld3.png')}}" alt="Blog Slide 3"></div>
									<div><img src="{{asset('img/blog_sld2.png')}}" alt="Blog Slide 4"></div>
								</div>
							</div>
						</div>

						<div class="slide_bcontent">
							<div class="otr_ul_box">
								<ul class="in_box_ul">
									<li>
										<span>
											Author:
										</span>
									</li>
									<li>
										<a href="">
											John Doe
										</a>
									</li>
								</ul>
								<ul class="in_box_ul">
									<li>
										<span>
											Date:
										</span>
									</li>
									<li>
										<a href="">
											Jan 02, 2025
										</a>
									</li>
								</ul>
							</div>
							<div class="cont_bcslide">
								<h3>
									Lorem Ipsum is simply dummy text of the printing and typesetting industry.
								</h3>
								<p class="para_slide">
									Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
									Ipsum has been the industry's
									standard dummy text ever since the 1500s, when an unknown printer took a galley of
									type and scrambled it to make a
									type specimen book.
								</p>
							</div>



						</div>



					</div>
					<div class="col-lg-4">
						<div class="latest_blog">
							<div class="inside_blog">
								<div class="inimg">
									<a href="">
										<img src="{{asset('img/inblog1.png')}}" alt="Blog 1">
									</a>
								</div>
								<div class="in_cont size23">
									Lorem Ipsum is simply dummy text of the printing and typesetting.
								</div>
							</div>
							<div class="inside_blog">
								<div class="inimg">
									<a href="">
										<img src="{{asset('img/inblog2.png')}}" alt="Blog 2">
									</a>
								</div>
								<div class="in_cont size23">
									Lorem Ipsum is simply dummy text of the printing and typesetting.
								</div>
							</div>
							<div class="inside_blog">
								<div class="inimg">
									<a href="">
										<img src="{{asset('img/inblog3.png')}}" alt="Blog 3">
									</a>
								</div>
								<div class="in_cont size23">
									Lorem Ipsum is simply dummy text of the printing and typesetting.
								</div>
							</div>
							<div class="inside_blog">
								<div class="inimg">
									<a href="">
										<img src="{{asset('img/inblog4.png')}}" alt="Blog 4">
									</a>
								</div>
								<div class="in_cont size23">
									Lorem Ipsum is simply dummy text of the printing and typesetting.
								</div>
							</div>
							<div class="inside_blog">
								<div class="inimg">
									<a href="">
										<img src="{{asset('img/inblog5.png')}}" alt="Blog 5">
									</a>
								</div>
								<div class="in_cont size23">
									Lorem Ipsum is simply dummy text of the printing and typesetting.
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>
	<!-- Blog section end ---->

	<!-- marquee section start   -->
	<section class="otr_marquee">
		<div class="container">
			<div class="row">
				<div class="inside_marquee">
					<div class="marquee_hdg">
						<h4>
							{{ $homePage->news_ticker_title ?? 'NEWS TICKER+++' }}
						</h4>
					</div>
					<div class="marquee_slide">
						<div class="marquee-container">
							<div class="marquee-slider">
								@if(isset($homePage->newsTickerContents) && $homePage->newsTickerContents->count() > 0)
									@foreach($homePage->newsTickerContents as $content)
										<div class="marquee-item">
											{{ $content->title ?? '' }}
										</div>
									@endforeach
								@endif
										<!-- <div class="marquee-item">Gilchrist Connell promotes fin</div>
										<div class="marquee-item">Gilchrist Connell promotes financial lines specialist to
											principal</div>
										<div class="marquee-item">Gilchrist Connell promotes fin</div>
										<div class="marquee-item">Gilchrist Connell promotes financial lines specialist to
											principal</div>
										<div class="marquee-item">Gilchrist Connell promotes fin</div> -->
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>

	</section>
	<!-- marquee section end   -->

	<!-- media gallery start   -->
	<section class="gallery_sec">
		<div class="container">
			<div class="row">
				<div class="gallry_hd">
					<h2>
						Media Gallery
					</h2>
				</div>
			</div>
		</div>

		<div class="inside_glly">
			<div class="gallery_slider">
				@if(isset($homePage->matchHighlights) && $homePage->matchHighlights->count() > 0)
					@foreach($homePage->matchHighlights as $highlight)
						<div>
							<div class="gelly_img">
								<div class="video-container">
									<video poster="{{asset( $highlight->image ?? '')}}">
										<source src="{{ $highlight->video_url ?? '' }}" type="video/mp4">
									</video>
									<button type="button" class="play_button"></button>
								</div>
							</div>
						</div>
					@endforeach
				@endif
				<!-- <div>
					<div class="gelly_img">
						<div class="video-container">
							<video poster="{{asset('img/img_glly2.png')}}">
								<source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
							</video>
							<button type="button" class="play_button"></button>
						</div>
					</div>
				</div>
				<div>
					<div class="gelly_img">
						<div class="video-container">
							<video poster="{{asset('img/img_glly3.png')}}">
								<source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
							</video>
							<button type="button" class="play_button"></button>
						</div>
					</div>
				</div> -->
			</div>
			<div class="media_abdrag" id="media_abdrag">
				<img src="{{asset('img/medgllry_drg.png')}}" alt="">
			</div>
		</div>


	</section>
	<!-- media gallery end   -->

	<!-- next game section start   -->
	<section class="next_gsec">
		<div class="inside_ngame">
			<div class="container">
				<div class="row">
					<div class="flex_ngame">
						<div class="hd_ngame">
							<h2 class="prd_hd">
								Next Game
							</h2>
							<p class="prd">
								Presented by
							</p>
						</div>
						<div class="img_ngame">
							<a href="">
								<img src="{{asset('img/next_img.png')}}" alt="">
							</a>
						</div>
						<div class="form_next">
							<div class="form_nextbox">
								<div class="days_nxt">
									<h3>
										<span class="nxt_dy"></span>
										Saturday Mar 22
										</span>
									</h3>
									<p class="nxt_time">
										6:05 PM CST
									</p>
								</div>
								<div class="nxt_cnt">
									<div class="centr_nxt">
										VS. Central
									</div>
									<div class="nxt_btn">
										<a href="" class="cta_btn">
											View Roster
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>
	<!-- next game section end -->

	<!-- footworld sec start ----------- -->
	<section class="otr_footsec">
		<div class="inside_footsec">
			<div class="container">
				<div class="row">
					<div class="footsec_slider">
						<div class="img_slider">
							@if(isset($homePage->matchNotifications) && $homePage->matchNotifications->count() > 0)
                                @foreach($homePage->matchNotifications as $notification)
									<div>
										<img src="{{ asset($notification->image) ?? '' }}" alt="Slide 1">
									</div>
								@endforeach
							@endif
							<!-- <div>
								<img src="{{asset('img/football_world.png')}}" alt="Slide 2">
							</div>
							<div>
								<img src="{{asset('img/football_world.png')}}" alt="Slide 3">
							</div>
							<div>
								<img src="{{asset('img/football_world.png')}}" alt="Slide 2">
							</div>
							<div>
								<img src="{{asset('img/football_world.png')}}" alt="Slide 3">
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</div>

	</section>
	<!-- footworld sec end ----------- -->


	<!-- pause_playslider start -------------->
	<section class="image_playpause">
		<div class="container">
			<div class="row">
				<div class="inside_playimg">
					<div class="slider-container">
						<!-- Image Slider -->
						<div class="pyimg_slider">
							<div><img src="{{asset('img/pyimg1.png')}}" alt="Logo 1"></div>
							<div><img src="{{asset('img/pyimg2.png')}}" alt="Logo 2"></div>
							<div><img src="{{asset('img/pyimg3.png')}}" alt="Logo 3"></div>
							<div><img src="{{asset('img/pyimg4.png')}}" alt="Logo 4"></div>
							<div><img src="{{asset('img/pyimg5.png')}}" alt="Logo 5"></div>
							<div><img src="{{asset('img/pyimg6.png')}}" alt="Logo 6"></div>
							<div><img src="{{asset('img/pyimg3.png')}}" alt="Logo 3"></div>
							<div><img src="{{asset('img/pyimg4.png')}}" alt="Logo 4"></div>
							<div><img src="{{asset('img/pyimg5.png')}}" alt="Logo 5"></div>
							<div><img src="{{asset('img/pyimg6.png')}}" alt="Logo 6"></div>
						</div>

						<!-- Left Arrow, Play/Pause Button, Right Arrow -->
						<div class="controls">
							<button type="button" class="slick-prev"></button>
							<button id="playPauseBtn">||</button>
							<button type="button" class="slick-next">›</button>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>





@endsection('content')
