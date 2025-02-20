@extends('user_layout.master')

@section('content')
<section class="player-bio">
    <div class="container">
        <div class="player-bio-inner">
            <div class="bio-hd d-flex align-items-center p_60">
                <h2>2024-25 CENTRAL ROCKETS</h2>
                <div class="bio-hd-dropdwn d-flex align-items-center g-10">
                    <p class="choose">Choose a Player:</p>
                    <div class="bio-hd-toggle d-flex align-items-center">
                        <div class="select-menu">
                            <div class="select-btn">
                                <span class="sBtn-text">Jayden Ford </span>
                                <div class="arrw-dwn"><img src="{{asset('img/arrw-dwn.png')}}" alt=""></div>
                            </div>

                            <ul class="options">
                                <li class="option">
                                    <span class="option-text">Jayden Ford2</span>
                                </li>
                                <li class="option">
                                    <span class="option-text">Jayden Ford3</span>
                                </li>


                            </ul>
                        </div>

                        <a class="search-bar" href=""><img src="{{asset('img/search.png')}}" alt=""></a>
                    </div>



                </div>
            </div>

            <div class="bio-cntnt">
                <div class="bio-vdo-wrp">
                    <!-- <div id="video_container">
                        <video id="video" poster="img/player-img.png">
                            <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                            <source src="https://www.w3schools.com/html/mov_bbb.ogg" type="video/ogg">
                        </video>
                        <button type="button" id="play_button">
                            <i class="fas fa-play"></i> Font Awesome Icon
                        </button>
                    </div> -->
                    <div class="video_wrapper">
                        <div class="img-slide">
                            <img src="img/player-img.png">
                        </div>
                        <div class="video-box video_show">
                            <iframe src="https://www.youtube.com/embed/u31qwQUeGuM?si=Y1mab_tSsQ_08QDT"
                                frameborder="0" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                        <button type="button" id="play_button">
                            <i class="fas fa-play"></i>
                        </button>
                    </div>


                    <div class="video-btm-txt">
                        <div class="vdo-btm-innr d-flex align-items-center">
                            <h3>JAYDEN FORD</h3>
                            <div class="social-links">
                                <ul class="list-unstyled d-flex align-items-center m-0">
                                    <li><a href="">JaydenFord@gmail.com</a></li>
                                    <li><a href=""><i class="fa-brands fa-instagram"></i></a></li>
                                    <li><a href=""><i class="fa-brands fa-x-twitter"></i></a></li>
                                </ul>

                            </div>
                        </div>

                    </div>

                </div>
                <div class="player-details d-flex">
                    <div class="player-img">
                        <img src="{{asset('img/profile.png')}}" alt="">
                    </div>
                    <div class="plyer-detail-cntnt">
                        <ul class="list-unstyled m-0">
                            <li><span>Position:</span> Right Back</li>
                            <li><span>Height & Weight:</span> 5'7 | 170</li>
                            <li><span>Jersey Number:</span> 1</li>
                            <li><span>Age:</span> 18</li>
                            <li><span>Graduation Year:</span> 2025</li>
                            <li><span>High School:</span> Miami-dade County Public Schools</li>
                            <li><span>Student ID:</span>#012025</li>
                        </ul>
                    </div>
                </div>

                <div class="bio-profile-tabs">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="pills-Athletic-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-Athletic" type="button" role="tab"
                                aria-controls="pills-Athletic" aria-selected="true">
                                <div class="icon-svg">
                                    <svg width="21" height="19" viewBox="0 0 21 19" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M15.7761 0H5.35367C2.87001 0 0.851562 2.01845 0.851562 4.50211V16.8904C0.851562 17.4982 1.21173 18.046 1.7745 18.2786C1.96208 18.3536 2.15717 18.3911 2.35227 18.3911C2.74245 18.3911 3.12513 18.241 3.41026 17.9484L5.49624 15.8624C5.63881 15.7199 5.82639 15.6448 6.02899 15.6448H15.7836C18.2672 15.6448 20.2857 13.6264 20.2857 11.1427V4.50211C20.2857 2.01845 18.2672 0 15.7836 0H15.7761ZM11.1164 11.758C10.9738 11.8931 10.7787 11.9756 10.5836 11.9756C10.4861 11.9756 10.3885 11.9606 10.2985 11.9156C10.2084 11.8781 10.1259 11.8255 10.0509 11.758C9.91581 11.6154 9.83327 11.4204 9.83327 11.2253C9.83327 11.1277 9.84828 11.0302 9.8933 10.9401C9.93082 10.8501 9.98334 10.7675 10.0509 10.6925C10.1259 10.625 10.2084 10.5725 10.2985 10.5349C10.5761 10.4224 10.9063 10.4899 11.1164 10.6925C11.1839 10.7675 11.2364 10.8501 11.2739 10.9401C11.319 11.0302 11.334 11.1277 11.334 11.2253C11.334 11.4204 11.2514 11.6154 11.1164 11.758ZM11.5066 4.59965L11.0939 8.9742C11.0638 9.25183 10.8162 9.46193 10.5386 9.43192C10.291 9.40941 10.1034 9.21432 10.0809 8.9742L9.66819 4.59965C9.62317 4.08942 9.99084 3.6392 10.5011 3.59418C11.0113 3.54916 11.4615 3.91683 11.5066 4.42707C11.5066 4.4871 11.5066 4.54713 11.5066 4.59965Z"
                                            fill="#EE3A7F" />
                                    </svg>
                                </div>
                                Athletic Information
                            </button>
                            <button class="nav-link" id="pills-Season-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-Season" type="button" role="tab" aria-controls="pills-Season"
                                aria-selected="false">
                                <div class="icon-svg">
                                    <svg width="18" height="16" viewBox="0 0 18 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M0.42806 9.46453H3.732C3.96866 9.46453 4.16005 9.65677 4.16005 9.89258V15.5711C4.16005 15.8077 3.96781 15.9991 3.732 15.9991L0.42806 16C0.191393 16 2.83671e-06 15.8077 2.83671e-06 15.5719V9.89256C-0.000851528 9.6559 0.191393 9.46453 0.42806 9.46453ZM7.03615 4.73271H10.3401C10.5768 4.73271 10.7681 4.92496 10.7681 5.16077V15.5719C10.7681 15.8086 10.5759 16 10.3401 16H7.03615C6.79949 16 6.6081 15.8078 6.6081 15.5719L6.60724 5.16077C6.60724 4.9241 6.79949 4.73271 7.03615 4.73271ZM13.6434 2.04426e-05H16.9473C17.184 2.04426e-05 17.3754 0.192266 17.3754 0.428078V15.5708C17.3754 15.8075 17.1831 15.9989 16.9473 15.9989L13.6434 15.9998C13.4067 15.9998 13.2153 15.8075 13.2153 15.5717V0.428057C13.2153 0.192243 13.4067 2.04426e-05 13.6434 2.04426e-05Z"
                                            fill="black" />
                                    </svg>
                                </div>Season Stats
                            </button>

                            <button class="nav-link" id="pills-Academic-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-Academic" type="button" role="tab"
                                aria-controls="pills-Academic" aria-selected="false">
                                <div class="icon-svg">
                                    <svg width="32" height="14" viewBox="0 0 32 14" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M14.0759 8.39098C14.045 8.39098 14.0141 8.38685 13.9839 8.37866L6.72266 6.39963V11.5895C6.86272 11.7489 7.58671 12.1687 9.03399 12.5847C10.624 13.0415 12.4131 13.2932 14.0737 13.2932C15.7381 13.2932 17.5291 13.0415 19.1204 12.5846C20.5682 12.1689 21.2893 11.7491 21.4293 11.5895V6.39844L14.1635 8.37866C14.1334 8.38692 14.1068 8.39098 14.0759 8.39098Z"
                                            fill="black" />
                                        <path
                                            d="M31.2311 12.5593L30.7223 8.6691C30.7201 8.65216 30.7166 8.63535 30.712 8.61875C30.5896 8.18834 30.2537 7.86115 29.8335 7.74118V3.84167C29.8335 3.64831 29.6767 3.49151 29.4834 3.49151L26.8765 3.49109L14.0763 0L0 3.84146L14.0763 7.67486L21.6966 5.59618H21.6967L26.877 4.18826L29.1333 4.19176V7.74118C28.7131 7.86115 28.3771 8.18834 28.2546 8.61875C28.25 8.63528 28.2465 8.65216 28.2442 8.6691L27.7355 12.5593C27.7335 12.5744 27.7325 12.5928 27.7325 12.6079C27.7325 13.3738 28.3556 14 29.1215 14H29.8452C30.6111 14 31.2341 13.3738 31.2341 12.6079C31.234 12.5927 31.233 12.5744 31.2311 12.5593Z"
                                            fill="black" />
                                    </svg>

                                </div>
                                Academic Information
                            </button>

                            <button class="nav-link" id="pills-Media-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-Media" type="button" role="tab" aria-controls="pills-Media"
                                aria-selected="false">
                                <div class="icon-svg">
                                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.53027 11.3204L9.78374 8.86497L5.53027 6.4093V11.3204Z"
                                            fill="black" />
                                        <path
                                            d="M13.2412 0H12.2369L13.2082 3.131H11.1865L10.2146 0H7.83397L8.80546 3.131H6.78355L5.81185 0H3.43103L4.40273 3.131H2.3806L1.40891 0H1.17402C0.525644 0 0 0.52586 0 1.17402V13.241C0 13.8893 0.52586 14.415 1.17402 14.415H13.241C13.8893 14.415 14.415 13.8891 14.415 13.241V5.57696V1.17402V0H13.2412ZM7.2076 13.1392C4.82505 13.1392 2.89374 11.2081 2.89374 8.8253C2.89374 6.44297 4.82505 4.51144 7.2076 4.51144C9.59015 4.51144 11.5215 6.44275 11.5215 8.8253C11.5215 11.2081 9.59015 13.1392 7.2076 13.1392Z"
                                            fill="black" />
                                    </svg>
                                </div>
                                Highlights & Media
                            </button>

                            <button class="nav-link" id="pills-Awards-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-Awards" type="button" role="tab" aria-controls="pills-Awards"
                                aria-selected="false">
                                <div class="icon-svg">
                                    <svg width="13" height="16" viewBox="0 0 13 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6.27076 2.88062C4.39288 2.88062 2.86621 4.41265 2.86621 6.29711C2.86621 8.18158 4.39288 9.71361 6.27076 9.71361C8.14864 9.71361 9.67532 8.18158 9.67532 6.29711C9.67532 4.41265 8.14864 2.88062 6.27076 2.88062ZM8.23107 6.00941L7.38172 6.84375L7.58241 8.01975C7.59316 8.08808 7.56449 8.15641 7.51074 8.19597C7.45698 8.23553 7.38172 8.24272 7.3208 8.21035L6.27076 7.65292L5.22073 8.20676C5.1598 8.23912 5.08813 8.23193 5.03079 8.19237C4.97703 8.15281 4.94836 8.08448 4.95911 8.01615L5.1598 6.84016L4.31046 6.00941C4.26029 5.96266 4.24237 5.89073 4.26387 5.826C4.28537 5.76126 4.34271 5.71451 4.40722 5.70372L5.58269 5.5311L6.10949 4.46299C6.13816 4.40186 6.20267 4.3623 6.27076 4.3623C6.33885 4.3623 6.39978 4.40186 6.43203 4.46299L6.95884 5.5311L8.13431 5.70372C8.2024 5.71451 8.25616 5.76126 8.27766 5.826C8.29916 5.89073 8.28124 5.96266 8.23107 6.00941Z"
                                            fill="black" />
                                        <path
                                            d="M4.01309 12.0837C3.64396 12.1592 3.2605 12.2347 2.9523 12.0585C2.52225 11.8104 2.44699 11.1954 2.25706 10.7603L0.0566406 14.2774L1.83059 14.3134C1.8951 14.3134 1.95602 14.353 1.98828 14.4105L2.79103 15.9965L5.12763 12.2635C4.99503 12.152 4.86602 12.0621 4.74059 12.0298C4.54348 11.9758 4.2747 12.0333 4.01309 12.0837Z"
                                            fill="black" />
                                        <path
                                            d="M11.64 4.85143C11.5647 4.57451 11.6292 4.26163 11.6902 3.95954C11.7547 3.63947 11.8156 3.33738 11.7045 3.14677C11.5898 2.94898 11.2959 2.85188 10.9877 2.74758C10.6975 2.65048 10.4 2.54979 10.2029 2.35199C10.0058 2.15419 9.90546 1.8521 9.80869 1.5644C9.70477 1.25152 9.60801 0.95662 9.4109 0.845134C9.04177 0.629355 8.27485 1.06091 7.71221 0.909867C7.44701 0.837941 7.21407 0.632951 6.99188 0.431558C6.75535 0.219375 6.50807 0 6.27513 0C6.04218 0 5.79491 0.219375 5.55838 0.431558C5.3326 0.632951 5.10324 0.837941 4.83805 0.909867C4.5621 0.98539 4.25031 0.920656 3.94928 0.859519C3.63033 0.794785 3.32929 0.733648 3.13936 0.845134C2.94225 0.960216 2.84549 1.25511 2.74156 1.5644C2.6448 1.8557 2.54445 2.15419 2.34735 2.35199C1.9388 2.76197 1.06079 2.76557 0.842179 3.14677C0.627154 3.52079 1.0572 4.28321 0.906686 4.85143C0.835011 5.11755 0.630738 5.35132 0.430049 5.57429C0.218608 5.81164 0 6.05979 0 6.29355C0 6.52731 0.218608 6.77546 0.430049 7.01281C0.630738 7.23938 0.835011 7.46954 0.906686 7.73567C1.0572 8.30029 0.627154 9.0699 0.842179 9.44032C0.956858 9.63812 1.25073 9.73522 1.55893 9.83952C1.84921 9.93662 2.14666 10.0373 2.34377 10.2351C2.75231 10.6451 2.75948 11.5262 3.13577 11.7456C3.50848 11.9613 4.26823 11.5298 4.83446 11.6808C5.09966 11.7528 5.3326 11.9577 5.5548 12.1591C5.79132 12.3713 6.0386 12.5907 6.27154 12.5907C6.50449 12.5907 6.75176 12.3713 6.98829 12.1591C7.21407 11.9577 7.44343 11.7528 7.70862 11.6808C7.98457 11.6053 8.29636 11.67 8.59739 11.7312C8.91634 11.7959 9.21738 11.857 9.40732 11.7456C9.60442 11.6305 9.70118 11.3356 9.80511 11.0263C9.90187 10.735 10.0022 10.4365 10.1993 10.2387C10.6079 9.82873 11.4859 9.82513 11.7045 9.44392C11.9195 9.0699 11.4895 8.30749 11.64 7.73927C11.7117 7.47314 11.9159 7.23938 12.1166 7.01641C12.3281 6.77905 12.5467 6.53091 12.5467 6.29715C12.5467 6.06339 12.3281 5.81524 12.1166 5.57788C11.9159 5.35132 11.7081 5.11755 11.64 4.85143ZM6.27154 10.0733C4.19656 10.0733 2.50862 8.37941 2.50862 6.29715C2.50862 4.21488 4.19656 2.52102 6.27154 2.52102C8.34653 2.52102 10.0345 4.21488 10.0345 6.29715C10.0345 8.37941 8.34653 10.0733 6.27154 10.0733Z"
                                            fill="black" />
                                        <path
                                            d="M6.67669 5.77564L6.27173 4.94849L5.86676 5.77564C5.84168 5.82958 5.79151 5.86555 5.73058 5.87274L4.82031 6.0058L5.47972 6.64954C5.52273 6.6891 5.54064 6.75024 5.52989 6.80778L5.37579 7.71765L6.1893 7.28969C6.24306 7.26092 6.30398 7.26092 6.35774 7.28969L7.17125 7.71765L7.01714 6.80778C7.00639 6.75024 7.0279 6.6891 7.06732 6.64954L7.72673 6.0058L6.81646 5.87274C6.75553 5.86555 6.70536 5.82958 6.67669 5.77564Z"
                                            fill="black" />
                                        <path
                                            d="M9.58581 12.0585C9.05183 12.3678 8.27058 11.9039 7.80111 12.0298C7.67568 12.0621 7.54666 12.152 7.41406 12.2635L9.75425 16.0001L10.557 14.4141C10.5857 14.3566 10.6466 14.317 10.7147 14.317L12.4886 14.281L10.2846 10.7603C10.0911 11.1954 10.0159 11.8104 9.58581 12.0585Z"
                                            fill="black" />
                                    </svg>

                                </div>Achievements & Awards
                            </button>

                            <button class="nav-link" id="pills-Recruiting-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-Recruiting" type="button" role="tab"
                                aria-controls="pills-Recruiting" aria-selected="false">
                                <div class="icon-svg">
                                    <svg width="16" height="18" viewBox="0 0 16 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M15.1706 16.3895L14.7538 13.1684C14.678 12.5053 14.4127 11.88 14.0338 11.3495C13.7874 11.0274 13.5032 10.7432 13.2001 10.4968C12.878 10.2695 12.518 10.08 12.139 9.94737L9.56218 9.05684L9.22113 8.29895C10.3959 7.35158 11.2296 5.49474 11.2296 3.92211C11.2296 1.68632 9.86534 0 7.59166 0C5.31797 0 3.95376 1.68632 3.95376 3.92211C3.95376 5.49474 4.78745 7.35158 5.96218 8.29895L5.62113 9.05684L3.04429 9.94737C2.28639 10.2126 1.62324 10.7053 1.14955 11.3495C0.751657 11.88 0.505341 12.5242 0.429552 13.1684L0.0127097 16.3895C-0.100975 17.2421 0.562183 18 1.43376 18H13.7685C14.6211 18 15.2843 17.2421 15.1706 16.3895Z"
                                            fill="black" />
                                    </svg>

                                </div>Recruiting Information
                            </button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="pills-Athletic" role="tabpanel"
                            aria-labelledby="pills-Athletic-tab">
                            <div class="tab-inner">
                                <h6>Athletic Information</h6>
                                <p class="m-0">Lorem Ipsum is simply dummy text of the printing and typesetting
                                    industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                                    1500s, when an unknown printer took a galley of type and scrambled it to make a
                                    type specimen book. It has survived not only five centuries.</p>

                                <div class="athletic-list">
                                    <ul class="list-unstyled m-0 d-flex">
                                        <li><span>40-Yard Dash Time: </span>4.52 seconds</li>
                                        <li><span>Shuttle Run Time: </span>4.15 seconds</li>
                                        <li><span>Deadlift Max: </span>500 lbs</li>
                                    </ul>
                                    <ul class="athletic-list2 list-unstyled m-0 d-flex">
                                        <li><span>Vertical Jump: </span>38 inches</li>
                                        <li><span>Squat Max:</span>450 lbs</li>
                                        <li class="empty-list"></li>
                                    </ul>

                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-Season" role="tabpanel"
                            aria-labelledby="pills-Season-tab">
                            <div class="tab-inner">
                                <h6>Season Stats</h6>
                                <p class="m-0">Lorem Ipsum is simply dummy text of the printing and typesetting
                                    industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                                    1500s, when an unknown printer took a galley of type and scrambled it to make a
                                    type specimen book. It has survived not only five centuries.</p>

                                <div class="athletic-list">
                                    <ul class="list-unstyled m-0 d-flex">
                                        <li><span>Games Played:</span> </li>
                                        <li><span>Total Yards:</span> </li>
                                        <li><span>Touchdowns:</span> </li>
                                        <li><span>Tackles/Sacks: </span> </li>
                                        <li><span>Interceptions:</span> </li>
                                        <li><span>Kicking Stats (if applicable):</span> </li>

                                    </ul>

                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-Academic" role="tabpanel"
                            aria-labelledby="pills-Academic-tab">
                            <div class="tab-inner">
                                <h6>Academic Information</h6>
                                <p class="m-0">Lorem Ipsum is simply dummy text of the printing and typesetting
                                    industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                                    1500s, when an unknown printer took a galley of type and scrambled it to make a
                                    type specimen book. It has survived not only five centuries.</p>

                                <div class="athletic-list">
                                    <ul class="list-unstyled m-0 d-flex">
                                        <li><span>GPA: </span> </li>
                                        <li><span>SAT/ACT Scores (Optional): </span> </li>
                                        <li><span>Academic Honors: </span> </li>
                                    </ul>

                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-Media" role="tabpanel"
                            aria-labelledby="pills-Media-tab">
                            <div class="tab-inner">
                                <h6>Highlights & Media</h6>
                                <p class="m-0">Lorem Ipsum is simply dummy text of the printing and typesetting
                                    industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                                    1500s, when an unknown printer took a galley of type and scrambled it to make a
                                    type specimen book. It has survived not only five centuries.</p>

                                <div class="athletic-list">
                                    <ul class="list-unstyled m-0 d-flex">
                                        <li><span>Highlight Videos: </span> </li>
                                        <li><span>Game Footage Link: </span> </li>
                                        <li><span>Photo Gallery link: </span></li>


                                    </ul>

                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-Awards" role="tabpanel"
                            aria-labelledby="pills-Awards-tab">
                            <div class="tab-inner">
                                <h6>Achievements & Awards</h6>
                                <p class="m-0">Lorem Ipsum is simply dummy text of the printing and typesetting
                                    industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                                    1500s, when an unknown printer took a galley of type and scrambled it to make a
                                    type specimen book. It has survived not only five centuries.</p>

                                <div class="athletic-list">
                                    <ul class="list-unstyled m-0 d-flex">
                                        <li><span>Team MVP Awards: </span> </li>
                                        <li><span>All-State/All-Conference Honors: </span></li>
                                        <li><span>Athletic Camps Attended: </span> </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-Recruiting" role="tabpanel"
                            aria-labelledby="pills-Recruiting-tab">
                            <div class="tab-inner">
                                <h6>Recruiting Information</h6>
                                <p class="m-0">Lorem Ipsum is simply dummy text of the printing and typesetting
                                    industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                                    1500s, when an unknown printer took a galley of type and scrambled it to make a
                                    type specimen book. It has survived not only five centuries.</p>

                                <div class="athletic-list">
                                    <ul class="list-unstyled m-0 d-flex">
                                        <li><span>Commitment Status: </span></li>
                                        <li><span>Offers Received: </span> </li>
                                        <li><span>Preferred Colleges: </span> </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>



<!-- footworld sec start ----------- -->
<section class="otr_footsec">
    <div class="inside_footsec">
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
