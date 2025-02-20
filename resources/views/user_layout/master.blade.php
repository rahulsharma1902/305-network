<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>305 Network page</title>

	<!-- Custom CSS -->
	<link rel="stylesheet" href="{{asset('css/user.css')}}">
	<link rel="stylesheet" href="{{asset('css/user_responsive.css')}}">

	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Exo+2:wght@100..900&family=Montserrat:wght@100..900&display=swap"
		rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">


	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
		crossorigin="anonymous">

	<!-- Font Awesome CDN -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

	<!-- Slick Slider CSS -->
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css" />
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css" />
	<link rel="stylesheet" type="text/css"
		href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
	<link rel="stylesheet" type="text/css"
		href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />


		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</head>

<body>

	<!-- Header Section -->
	<header>
		<div class="container-fluid">
			<div class="row">
				<div class="hd_cont_otr">
					<div class="inside_tophd">
						<span class="brk_txt">{{ $headerPage->breaking_text ?? 'Breaking' }} <span class="span_news">{{ $headerPage->news_label ?? 'News' }}</span></span>
						<a class="text-link-simple" href="{{ $headerPage->news_ticker_link ?? '#' }}"><span class="span_news_txt">{{ $headerPage->news_ticker_text ?? '' }}</span></a>
						<div class="close_abs">
							<a href="#" class="clse_btn"><i class="fa-solid fa-xmark"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="hed_slider">
			<div class="container-fluid">
				<div class="row">
					<div class="insde_slidr">
						<div class="site_logo">
							<a class="logo_img" href="{{ url('/') ?? '' }}">
								<img src="{{ asset('img/site_logo.png') ?? ''}}" alt="Site Logo">
							</a>
						</div>
						<div class="slid_hdr">
							<div class="slick-slider">
								@if(isset($upcomingMatches) && $upcomingMatches->count())
									@foreach($upcomingMatches as $match)
									<div>
										<div class="sldin_cont">
											<div class="date_tm">
												<ul class="timdt_fl">
														<li class="timdt_li">
															<span class="timdt_lian li_aft">
																{{ \Carbon\Carbon::parse($match->match_date)->format('M d') }}
															</span>
														</li>
														<li class="timdt_li">
															<span class="timdt_lian">
																{{ \Carbon\Carbon::parse($match->match_time)->format('h:i A') }}
															</span>
														</li>
												</ul>
											</div>
											<div class="slide_logfl">
												<ul class="slide_logflul">
													<li class="slide_logfli">
														<a href="">
															<img src="{{ asset($match->team1->logo ?? '' ) ?? ''}}">
														</a>
													</li>
													<li class="slide_logfli">
														vs {{ $match->team1->name ?? '' }}
														{{ $match->sports->type ?? '' }}’s {{ $match->sports->name ?? '' }}
													</li>
												</ul>
											</div>
										</div>
									</div>
									@endforeach
								@endif
								<!-- <div>
									<div class="sldin_cont">
										<div class="date_tm">
											<ul class="timdt_fl">
												<li class="timdt_li"><span class="timdt_lian li_aft">FEB 18</span></li>
												<li class="timdt_li"><span class="timdt_lian">06:00 PM</span></li>
											</ul>
										</div>
										<div class="slide_logfl">
											<ul class="slide_logflul">
												<li class="slide_logfli">
													<a href="">
														<img src="{{ asset('img/sld_2.png') ?? '' }}">
													</a>
												</li>
												<li class="slide_logfli">
													vs Carol City
													Men’s Football
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div>
									<div class="sldin_cont">
										<div class="date_tm">
											<ul class="timdt_fl">
												<li class="timdt_li"><span class="timdt_lian li_aft">FEB 21</span></li>
												<li class="timdt_li"><span class="timdt_lian">06:00 PM</span></li>
											</ul>
										</div>
										<div class="slide_logfl">
											<ul class="slide_logflul">
												<li class="slide_logfli">
													<a href="">
														<img src="{{ asset('img/sld_3.png') ?? '' }}">
													</a>
												</li>
												<li class="slide_logfli">
													vs Homestead
													Men’s Football
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div>
									<div class="sldin_cont">
										<div class="date_tm">
											<ul class="timdt_fl">
												<li class="timdt_li"><span class="timdt_lian li_aft">FEB 22</span></li>
												<li class="timdt_li"><span class="timdt_lian">06:00 PM</span></li>
											</ul>
										</div>
										<div class="slide_logfl">
											<ul class="slide_logflul">
												<li class="slide_logfli">
													<a href="">
														<img src="{{ asset('img/sld_4.png') ?? '' }}">
													</a>
												</li>
												<li class="slide_logfli">
													vs South Dade
													Men’s Football
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div>
									<div class="sldin_cont">
										<div class="date_tm">
											<ul class="timdt_fl">
												<li class="timdt_li"><span class="timdt_lian li_aft">FEB 21</span></li>
												<li class="timdt_li"><span class="timdt_lian">06:00 PM</span></li>
											</ul>
										</div>
										<div class="slide_logfl">
											<ul class="slide_logflul">
												<li class="slide_logfli">
													<a href="#">
														<img src="{{ asset('img/sld_1.png') ?? '' }}">
													</a>
												</li>
												<li class="slide_logfli">
													vs Carol City
													Men’s Football
												</li>
											</ul>
										</div>
									</div>
								</div> -->
							</div>
						</div>
						<div class="hd_btnsc">
							<a href="#" class="cta_btn">Contact Us</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="drop_downbox">
			<div class="flx_drop">
				<ul class="flx_dropul">
					<li class="has_submenu">
						<nav class="dropdown">
							<button class="dropdown-btn ">SPORTS <span class="arrow"><i
										class="fa-solid fa-angle-down"></i></span></button>
							<div class="dropdown-content">
							<ul class="menu">
								@if(isset($sports) && $sports->count())
									@foreach($sports as $sport)
										@if($sport->teams->count())
											<li class="float_right">
												<div class="toggle-dropdown">
													{{ $sport->name }} <i class="fas fa-chevron-down arrow"></i>
												</div>
												<ul class="sub_menus">
													@foreach($sport->teams as $team)
														<li>
															<a href="{{ url('sports/' . ($team->sport->slug ?? '') . '/teams/' . ($team->slug ?? '')) }}" class="submenu">
																{{ $team->name ?? ''}}
															</a>
														</li>
													@endforeach
												</ul>
											</li>
										@endif
									@endforeach
								@endif
							</ul>

							</div>
						</nav>
					</li>
					<li>
						<a href="{{url('/scores')}}">
							SCORES
						</a>
					</li>
					<li>
						<a href="{{url('/')}}">
							NEWS
						</a>
					</li>
					<li class="has_submenu">
						<nav class="dropdown">
							<button class="dropdown-btn">MEDIA <span class="arrow"><i
										class="fa-solid fa-angle-down"></i></span></button>
							<ul class="dropdown-content">
								<a href="#" class="">GAME HIGHLIGHTS</a>
								<a href="#" class="">PHOTO GALLERY</a>
							</ul>
						</nav>
					</li>
					<li>
						<a href="{{url('/scoreboard')}}">
							STADIUMS
						</a>
					</li>
					<li>
						<a href="{{url('/player-bio')}}">
							ABOUT
						</a>
					</li>
					<li>
						<a class="sech_btn" href="">
							<i class="fa-solid fa-magnifying-glass"></i>
						</a>
					</li>
				</ul>
				<!-- Navbar Toggle Button -->
				<div class="responv_view">
					<button class="navbar-toggler" type="button">
						<span class="bar bar-1"></span>
						<span class="bar bar-2"></span>
						<span class="bar bar-3"></span>
					</button>

					<!-- Navigation Menu -->
					<nav id="navbarSupportedContent">

						<ul class="flx_dropul">
							<li>
								<nav class="dropdown">
									<button class="dropdown-btn has_submenu">SPORTS <span class="arrow"><i
												class="fa-solid fa-angle-down"></i></span></button>
									<div class="dropdown-content">
										<ul class="menu">
											<li class="float_right">
												<div href="#" class="toggle-dropdown">Football<i
														class="fas fa-chevron-down arrow"></i></div>
												<ul class="sub_menus">
													<li>
														<a href="#" class="submenu">Central Rockets </a>
													</li>
													<li>
														<a href="#" class="submenu">Northwestern Bulls </a>
													</li>
													<li>
														<a href="#" class="submenu">Booker T Washington Tornadoes </a>
													</li>
													<li>
														<a href="#" class="submenu">Carol City Chiefs </a>

													</li>
													<li>
														<a href="#" class="submenu">South Dade Buccaneers </a>
													</li>
													<li>
														<a href="#" class="submenu">Norland Vikings </a>
													</li>
													<li>
														<a href="#" class="submenu">Homestead Broncos </a>
													</li>
												</ul>
											</li>
											<li class="float_right">
												<div href="#" class="toggle-dropdown">BASKETBALL<i
														class="fas fa-chevron-down arrow"></i></div>
												<ul class="sub_menus">
													<li>
														<a href="#" class="submenu">Central Rockets </a>
													</li>
													<li>
														<a href="#" class="submenu">Northwestern Bulls </a>
													</li>
													<li>
														<a href="#" class="submenu">Booker T Washington Tornadoes </a>
													</li>
													<li>
														<a href="#" class="submenu">Carol City Chiefs </a>

													</li>
													<li>
														<a href="#" class="submenu">South Dade Buccaneers </a>
													</li>
													<li>
														<a href="#" class="submenu">Norland Vikings </a>
													</li>
													<li>
														<a href="#" class="submenu">Homestead Broncos </a>
													</li>
												</ul>
											</li>

										</ul>
									</div>
								</nav>
							</li>
							<li>
								<a href="{{url('/scores')}}">
									SCORES
								</a>
							</li>
							<li>
								<a href="{{url('/')}}">
									NEWS
								</a>
							</li>
							<li>
								<nav class="dropdown">
									<button class="dropdown-btn">MEDIA <span class="arrow"><i
												class="fa-solid fa-angle-down"></i></span></button>
									<ul class="dropdown-content">
										<a href="#" class="">GAME HIGHLIGHTS</a>
										<a href="#" class="">PHOTO GALLERY</a>
									</ul>
								</nav>
							</li>
							<li>
								<a href="{{url('/scoreboard')}}">
									STADIUMS
								</a>
							</li>
							<li>
								<a href="">
									ABOUT
								</a>
							</li>
							<li>
								<a class="sech_btn" href="">
									<i class="fa-solid fa-magnifying-glass"></i>
								</a>
							</li>
							<li>
								<div class="hd_btnsc">
									<a href="#" class="cta_btn">Contact Us</a>
								</div>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</header>
    @yield('content')
	<footer>
		<section class="stay_mailotr">
			<div class="inside_gamilstay">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-5">
							<div class="stay_mailtrhd">
								<h1>
									Stay In The
									Know.
								</h1>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="stay_mailtrcont">
								<div class="inpt_otr">
									<input type="text" placeholder="name@email.com">
								</div>
								<div class="inp_arrwbox">
									<img src="{{asset('img/arrow_img.png')}}" alt="">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="footer_linksbox">
			<div class="inside_footer">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-md-6 ">
							<div class="fot_linksec">
								<div class="fot_ulhd">
									<h5>
										Quick Links
									</h5>
								</div>
								<ul class="foot_ul">
									<li>
										<a href="#">
											Scores
										</a>
									</li>
									<li>
										<a href="#">
											News
										</a>
									</li>
									<li>
										<a href="#">
											Stadiums
										</a>
									</li>
									<li>
										<a href="#">
											About
										</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="fot_linksec">
								<div class="fot_ulhd">
									<h5>
										Football
									</h5>
								</div>
								<ul class="foot_ul">
									<li>
										<a href="#">
											Central Rockets
										</a>
									</li>
									<li>
										<a href="#">
											Northwestern Bulls
										</a>
									</li>
									<li>
										<a href="#">
											Booker T Washington Tornadoes
										</a>
									</li>
									<li>
										<a href="#">
											Carol City Chiefs
										</a>
									</li>
									<li>
										<a href="#">
											South Dade Buccaneers
										</a>
									</li>
									<li>
										<a href="#">
											Norland Vikings
										</a>
									</li>
									<li>
										<a href="#">
											Homestead Broncos
										</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="fot_linksec">
								<div class="fot_ulhd">
									<h5>
										Legal Links
									</h5>
								</div>
								<ul class="foot_ul">
									<li>
										<a href="#">
											Terms of Service
										</a>
									</li>
									<li>
										<a href="#">
											Privacy Policy
										</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="fot_linksec">
								<div class="fot_ulhd">
									<h5>
										Contact Information
									</h5>
								</div>
								<ul class="foot_ul">
									<li>
										<span class="foot_loctn">
											{{ $footerPage->address ?? '' }}	
										</span>
									</li>
									<li>
										<a href="#">
											{{ $footerPage->phone ?? '' }}	
										</a>
									</li>
									<li>
										<a href="#">
										{{ $footerPage->email ?? '' }}	
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<div class="foot_endbox">
					<div class="container">
						<div class="row align-items-center">
							<div class="col-lg-8">
								<div class="foot_contentdiv">
									<p class="trade_markhdr">
										{{ $footerPage->description_title ?? '' }}	
									</p>
									<p class="trade_markpara">
										{{ $footerPage->description ?? '' }}	
									</p>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="foot_logo">
									<a href="#">
										<img class="foot_img" src="{{ asset('img/foot_logo.png') ?? '' }}">
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<a href="#" class="otr_ab up-down">
					<div class="lets_go">
						<img src="{{ asset('img/letsgo.png') ?? '' }}" alt="">
					</div>
					<div class="mesge_box">
						<img src="{{ asset('img/message.png') ?? '' }}" alt="">
					</div>
				</a>
			</div>
		</section>




	</footer>
	<!-- stay_gmail section start ---------------- -->


	<!-- Footer end -------------------------------------------------------------------------->

	<script src="{{asset('js/extra.js')}}"></script>

	<!-- jQuery -->

	<!-- Slick Slider JS -->
	<script src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>
	<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>


	<script type="text/javascript"
		src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

	<script src="{{asset('js/script.js')}}"></script>
	<!-- Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
		crossorigin="anonymous"></script>
		
		<!-- claender js -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>



</body>
</html>
