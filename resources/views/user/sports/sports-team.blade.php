@extends('user_layout.master')

@section('content')
<section class="team-sec p_70 pb-0">
    <div class="container">
        <div class="team-content">
            <div class="player-head">
                <!-- <h2>2024-25 Central Rockets</h2> -->
                <h2> {{ $team->name ?? '' }}</h2>
            </div>
            <div class="roster-option d-flex">
             <div class="btns">
                <a href="javascript:void(0)" class="cta_btn"><i class="fa-solid fa-print"></i> Print</a>
                <a href="javascript:void(0)" class="cta_btn"><i class="fa-solid fa-download"></i> Download</a>
             </div>
             <div class="dropdowns">
                <div class="dropdown-container">
                    <div class="dropdown">
                      <select>
                        <option>Roster View - Cards</option>
                        <option>Roster View - List</option>
                        <option>Roster View - Grid</option>
                      </select>
                    </div>
                    <button class="search-button" aria-label="Search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                  </div>
                  <div class="dropdown-container">
                    <div class="dropdown">
                      <select>
                        <option>2024-25 Central Rockets</option>
                        <option>2024-25 Central Rockets</option>
                        <option>2024-25 Central Rockets</option>
                      </select>
                    </div>
                    <button class="search-button" aria-label="Search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                  </div>
             </div>
            </div>
            <div class="team-img">
                <img src="{{ asset($team->image ?? '' ) }}" alt="">
            </div>
            <div class="coach-info row">
                @if(isset($team->coaches) && $team->coaches->count())
                    @foreach($team->coaches as $coaches)
                    <div class="coach col-md-6">
                        <div class="coach-img">
                            <img src="{{asset($coaches->coach->image ?? '' )}}" alt="">
                            <div class="view-btn">
                                <!-- <a href="{{ url('coaches') ?? ''}}/{{ $coaches->coach->slug ?? '' }}" class="cta_btn">View Full Bio</a> -->
                                <a href="{{ url('sports') ?? ''}}/{{ $team->sport->slug }}/teams/{{ $team->slug }}/coaches/{{ $coaches->coach->slug ?? '' }}" class="cta_btn">View Full Bio</a>
                            </div>
                        </div>
                        <div class="coach-bio">
                            <h3>{{ $coaches->coach->name ?? '' }}</h3>
                            <p>{{ $coaches->coach->title ?? '' }}</p>
                        </div>
                    </div>
                    @endforeach
                @else
                <p>No Coach In This Team.</p>
                @endif
                
            </div>
        </div>
    </div>
</section>

    <section class="otr_footsec">
        <div class="inside_footsec pt-0">
            <div class="container">
                <div class="row">
                    <div class="footsec_slider">
                        <div class="img_slider">
                            <div>
                                <img src="{{asset('img/football_world.png')}}" alt="Slide 1">
                            </div>
                            <div>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="player-list-sec">
        <div class="container">
            <div class="player-content">
                <div class="player-head">
                    <h2>players</h2>
                </div>
                <div class="player-list">
                    <div class="row">
                    @if(isset($team->players) && $team->players->count())
                        @foreach($team->players as $player)
                        <div class="col-md-3 col-sm-6 player">
                            <a class="player-profile" href="{{ url('sports') ?? ''}}/{{ $team->sport->slug }}/teams/{{ $team->slug }}/players/{{ $player->player->slug ?? '' }}">
                                <div class="player-info">
                                    <div class="players-img">
                                        <img src="{{asset($player->player->image ?? '' )}}" alt="">
                                        <div class="player-num">
                                            <span>{{$loop->iteration ?? ''}}</span>
                                        </div>
                                    </div>
                                    <div class="player-data">
                                        <h6>{{ $player->player->first_name ?? '' }}
                                            <span>{{ $player->player->last_name ?? '' }}</span>
                                        </h6>
                                        <div class="info">
                                            <p>{{ $player->position->short_code ?? ''}} <br>
                                            {{ $player->player->class ?? '' }} | {{ $player->player->height ?? '' }} |  {{ $player->player->weight ?? '' }} <br>
                                                {{ $player->player->high_school ?? '' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    @else
                    <p>No Player In This Team.</p>
                    @endif
                        <!-- <div class="col-md-3 col-sm-6 player">
                            <div class="player-info">
                                <div class="players-img">
                                    <img src="{{asset('img/player2.png')}}" alt="">
                                    <div class="player-num">
                                        <span></span>
                                    </div>
                                </div>
                                <div class="player-data">
                                    <h6>Amari
                                        <span>Wallace</span>
                                    </h6>
                                    <div class="info">
                                        <p>DB <br>
                                            SR | 5'11 | 185 <br>
                                            Miami-dade County Public Schools</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 player">
                            <div class="player-info">
                                <div class="players-img">
                                    <img src="{{asset('img/player3.png')}}" alt="">
                                    <div class="player-num">
                                        <span></span>
                                    </div>
                                </div>
                                <div class="player-data">
                                    <h6>Khaleal
                                        <span>Sterling</span>
                                    </h6>
                                    <div class="info">
                                        <p>WR <br>
                                            SR | 5'7 | 180 <br>
                                            Miami-dade County Public Schools</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 player">
                            <div class="player-info">
                                <div class="players-img">
                                    <img src="{{asset('img/player4.png')}}" alt="">
                                    <div class="player-num">
                                        <span></span>
                                    </div>
                                </div>
                                <div class="player-data">
                                    <h6>Ezekiel
                                        <span>Marcelin</span>
                                    </h6>
                                    <div class="info">
                                        <p>LB <br>
                                            SR | 6'0 | 220 <br>
                                            Miami-dade County Public Schools</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 player">
                            <div class="player-info">
                                <div class="players-img">
                                    <img src="{{asset('img/player5.png')}}" alt="">
                                    <div class="player-num">
                                        <span></span>
                                    </div>
                                </div>
                                <div class="player-data">
                                    <h6>Herlin
                                        <span> Perry</span>
                                    </h6>
                                    <div class="info">
                                        <p>DB <br>
                                            JR | 6'0 | 180 <br>
                                            Miami-dade County Public Schools</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 player">
                            <div class="player-info">
                                <div class="players-img">
                                    <img src="{{asset('img/player6.png')}}" alt="">
                                    <div class="player-num">
                                        <span></span>
                                    </div>
                                </div>
                                <div class="player-data">
                                    <h6>Anjuan
                                        <span>Coleman</span>
                                    </h6>
                                    <div class="info">
                                        <p>WR<br>
                                            SR | 5'10 | 180 <br>
                                            Miami-dade County Public Schools</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 player">
                            <div class="player-info">
                                <div class="players-img">
                                    <img src="{{asset('img/player7.png')}}" alt="">
                                    <div class="player-num">
                                        <span></span>
                                    </div>
                                </div>
                                <div class="player-data">
                                    <h6>Nae'
                                        <span>shaun</span>
                                    </h6>
                                    <div class="info">
                                        <p>WR<br>
                                            SR | 6'2 | 175 <br>
                                            Miami-dade County Public Schools</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 player">
                            <div class="player-info">
                                <div class="players-img">
                                    <img src="{{asset('img/player8.png')}}" alt="">
                                    <div class="player-num">
                                        <span></span>
                                    </div>
                                </div>
                                <div class="player-data">
                                    <h6>Nicholas
                                        <span>McCall</span>
                                    </h6>
                                    <div class="info">
                                        <p>RB<br>
                                            SR | 5'11 | 190 <br>
                                            Miami-dade County Public Schools</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 player">
                            <div class="player-info">
                                <div class="players-img">
                                    <img src="{{asset('img/player9.png')}}" alt="">
                                    <div class="player-num">
                                        <span></span>
                                    </div>
                                </div>
                                <div class="player-data">
                                    <h6>Zion
                                        <span>Paret</span>
                                    </h6>
                                    <div class="info">
                                        <p>DB <br>
                                            SR | 5'11 | 180 <br>
                                            Miami-dade County Public Schools</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 player">
                            <div class="player-info">
                                <div class="players-img">
                                    <img src="{{asset('img/player10.png')}}" alt="">
                                    <div class="player-num">
                                        <span></span>
                                    </div>
                                </div>
                                <div class="player-data">
                                    <h6>Sekou
                                        <span>Smith</span>
                                    </h6>
                                    <div class="info">
                                        <p>WR <br>
                                            SR | 6'1 | 180 <br>
                                            Miami-dade County Public Schools</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 player">
                            <div class="player-info">
                                <div class="players-img">
                                    <img src="{{asset('img/player11.png')}}" alt="">
                                    <div class="player-num">
                                        <span></span>
                                    </div>
                                </div>
                                <div class="player-data">
                                    <h6>Tony
                                        <span>Williams</span>
                                    </h6>
                                    <div class="info">
                                        <p>DB <br>
                                            SR | 6'2 | 190 <br>
                                            Miami-dade County Public Schools</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 player">
                            <div class="player-info">
                                <div class="players-img">
                                    <img src="{{asset('img/player12.png')}}" alt="">
                                    <div class="player-num">
                                        <span></span>
                                    </div>
                                </div>
                                <div class="player-data">
                                    <h6>Bekkem
                                        <span>Kritza</span>
                                    </h6>
                                    <div class="info">
                                        <p>QB <br>
                                            SR | 6'5 | 165 <br>
                                            Miami-dade County Public Schools</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 player">
                            <div class="player-info">
                                <div class="players-img">
                                    <img src="{{asset('img/player13.png')}}" alt="">
                                    <div class="player-num">
                                        <span></span>
                                    </div>
                                </div>
                                <div class="player-data">
                                    <h6>Jalen
                                        <span>Labranche</span>
                                    </h6>
                                    <div class="info">
                                        <p>DB <br>
                                            SR | 5'8 | 180 <br>
                                            Miami-dade County Public Schools</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 player">
                            <div class="player-info">
                                <div class="players-img">
                                    <img src="{{asset('img/player14.png')}}" alt="">
                                    <div class="player-num">
                                        <span></span>
                                    </div>
                                </div>
                                <div class="player-data">
                                    <h6>Randy
                                        <span>Adiricka</span>
                                    </h6>
                                    <div class="info">
                                        <p>DL <br>
                                            SR | 6'4 | 270 <br>
                                            Miami-dade County Public Schools</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 player">
                            <div class="player-info">
                                <div class="players-img">
                                    <img src="{{asset('img/player15.png')}}" alt="">
                                    <div class="player-num">
                                        <span></span>
                                    </div>
                                </div>
                                <div class="player-data">
                                    <h6>Otis
                                        <span>Guyton</span>
                                    </h6>
                                    <div class="info">
                                        <p>DL <br>
                                            JR | 5'11 | 210<br>
                                            Miami-dade County Public Schools</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 player">
                            <div class="player-info">
                                <div class="players-img">
                                    <img src="{{asset('img/player16.png')}}" alt="">
                                    <div class="player-num">
                                        <span></span>
                                    </div>
                                </div>
                                <div class="player-data">
                                    <h6>Anthony
                                        <span>McQueen</span>
                                    </h6>
                                    <div class="info">
                                        <p>QB<br>
                                            JR | 6'0 | 170<br>
                                            Miami-dade County Public Schools</p>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sec1_start">
        <div class="sec1_inside">
            <img class="img_sec1" src="{{asset('img/sec1_img.png')}}" alt="Section Image">
            <div class="cross_icon">
                <a href="#">
                    <img src="{{asset('img/sec1_crs.png')}}" alt="Close Icon">
                </a>
            </div>
        </div>
    </section>
@endsection
