@extends('user_layout.master')

@section('content')
<!-- score-section -->
<section class="score-section">
    <div class="container">
        <div class="score-sec-innr">
            <p class="p-hd">Football live scores and today schedule</p>

            <div class="schedule-wrap">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="schedule-col">
                            <div class="schedule-team">
                                <h6>All Team</h6>

                                <div class="bio-hd-toggle d-flex align-items-center">
                                    <input type="search" id="teamSearch" placeholder="Search..." onkeyup="searchTeams()">
                                    <a class="search-bar" href=""><img src="{{ asset('img/search.png') }}" alt=""></a>
                                </div>

                                <div class="search-list">
                                    <ul class="list-unstyled m-0" id="teamList">
                                        @if(isset($teams) && $teams->count())
                                            @foreach($teams as $team)
                                                <li class="team-item">
                                                    <a href="{{ url('sports/' . ($team->sport->slug ?? '') . '/teams/' . ($team->slug ?? '')) }}">
                                                        <span>
                                                            <img src="{{ asset($team->logo ?? '' )}}" alt="{{ $team->slug ?? '' }}">
                                                        </span>
                                                        {{ $team->name ?? '' }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                    <p id="noResults" style="display:none;">No results match your search</p>
                                </div>
                            </div>

                            <script>
                                function searchTeams() {
                                    const searchTerm = document.getElementById("teamSearch").value.toLowerCase();
                                    const teams = document.querySelectorAll(".team-item");
                                    let found = false;

                                    teams.forEach(team => {
                                        const teamName = team.querySelector("a").textContent.toLowerCase();
                                        if (teamName.includes(searchTerm)) {
                                            team.style.display = "block";
                                            found = true;
                                        } else {
                                            team.style.display = "none";
                                        }
                                    });

                                    // Show "No results" message if no team matched
                                    const noResultsMessage = document.getElementById("noResults");
                                    if (!found && searchTerm.length > 0) {
                                        noResultsMessage.style.display = "block";
                                    } else {
                                        noResultsMessage.style.display = "none";
                                    }
                                }
                            </script>

                            <div class="schedule-btm">
                                <div class="footbal-img">
                                    <img src="img/footbal-img.svg" alt="">
                                    <div class="cross-icon">
                                        <a href=""><i class="fa-solid fa-xmark"></i></a>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="schedule-col schedule-col-mid schedule-btm">
                            <div class="schedule-mid-hd d-flex">
                                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-All-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-All" type="button" role="tab"
                                            aria-controls="pills-All" aria-selected="true">All</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-Favorites-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-Favorites" type="button" role="tab"
                                            aria-controls="pills-Favorites" aria-selected="false">Favorites</button>
                                    </li>
                                </ul>
                                <div class="prev-nxt-btn d-flex">
                                    <a href="#" id="prevDate"><i class="fa-solid fa-chevron-left"></i></a>
                                    <p class="btn-p">
                                    <div class="bag-icon">
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18.7631 1.53305H16.4905V1.08683C16.4905 0.903353 16.4176 0.727387 16.2878 0.597646C16.1581 0.467906 15.9821 0.39502 15.7987 0.39502C15.6152 0.39502 15.4392 0.467906 15.3095 0.597646C15.1797 0.727387 15.1068 0.903353 15.1068 1.08683V1.53305H7.20287V1.08683C7.20287 0.903353 7.12998 0.727387 7.00024 0.597646C6.8705 0.467906 6.69454 0.39502 6.51106 0.39502C6.32758 0.39502 6.15161 0.467906 6.02187 0.597646C5.89213 0.727387 5.81924 0.903353 5.81924 1.08683V1.53305H3.48783C2.67011 1.53305 1.88583 1.85765 1.30728 2.43555C0.728742 3.01344 0.40326 3.79736 0.402344 4.61508V18.313C0.40326 19.1307 0.728742 19.9146 1.30728 20.4925C1.88583 21.0704 2.67011 21.395 3.48783 21.395H18.7631C19.5808 21.395 20.3651 21.0704 20.9436 20.4925C21.5222 19.9146 21.8476 19.1307 21.8486 18.313V4.61508C21.8476 3.79736 21.5222 3.01344 20.9436 2.43555C20.3651 1.85765 19.5808 1.53305 18.7631 1.53305ZM1.78597 4.61508C1.78597 4.16464 1.96491 3.73264 2.28342 3.41413C2.60193 3.09562 3.03393 2.91668 3.48437 2.91668H5.81579V3.36636C5.81579 3.54984 5.88867 3.7258 6.01841 3.85554C6.14815 3.98528 6.32412 4.05817 6.5076 4.05817C6.69108 4.05817 6.86704 3.98528 6.99678 3.85554C7.12652 3.7258 7.19941 3.54984 7.19941 3.36636V2.91668H15.1068V3.36636C15.1068 3.54984 15.1797 3.7258 15.3095 3.85554C15.4392 3.98528 15.6152 4.05817 15.7987 4.05817C15.9821 4.05817 16.1581 3.98528 16.2878 3.85554C16.4176 3.7258 16.4905 3.54984 16.4905 3.36636V2.91668H18.7631C18.9864 2.91622 19.2076 2.95982 19.4141 3.04497C19.6205 3.13012 19.8082 3.25515 19.9663 3.4129C20.1243 3.57066 20.2498 3.75805 20.3353 3.96433C20.4209 4.17062 20.4649 4.39175 20.4649 4.61508V7.16787H1.78597V4.61508ZM18.7631 20.0114H3.48783C3.2645 20.0118 3.04328 19.9683 2.83682 19.8831C2.63036 19.798 2.44272 19.6729 2.28464 19.5152C2.12657 19.3574 2.00115 19.17 1.91558 18.9637C1.83002 18.7575 1.78597 18.5363 1.78597 18.313V8.5515H20.4649V18.313C20.4649 18.5363 20.4209 18.7575 20.3353 18.9637C20.2498 19.17 20.1243 19.3574 19.9663 19.5152C19.8082 19.6729 19.6205 19.798 19.4141 19.8831C19.2076 19.9683 18.9864 20.0118 18.7631 20.0114Z"
                                                fill="#EE3A7F" />
                                        </svg>
                                    </div>
                                    <span><input type="text" id="datePicker" class="form-control" value="{{ now()->format('m-d') }}"></span>
                                    </p>
                                    <a href="#" id="nextDate"><i class="fa-solid fa-chevron-right"></i></a>
                                </div>
                            </div>


                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-All" role="tabpanel" aria-labelledby="pills-All-tab">
                                    <div class="all-txt-wrap"></div>
                                    <div class="show-all-btn">
                                        <a href="javascript:void(0)" id="toggleMatches">Read More</a>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-Favorites" role="tabpanel"
                                    aria-labelledby="pills-Favorites-tab">

                                    <div class="fav-txt-wrap">
                                        
                                    </div>
                                    <div class="show-all-btn">
                                        <a href="javascript:void(0)" id="toggleFavorites">Show ALL</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="schedule-col">
                            <div class="schedule-team sche-col-lft">
                                <h6>Featured Match</h6>
                                
                                @if(isset($featuredMatches) && $featuredMatches->count())
                                    @foreach($featuredMatches as $featured)
                                        <div class="featured-div feat-top d-flex">
                                            <div class="feature-lft">
                                                <div class="feat-img">
                                                    <img src="{{asset($featured->team1->logo)}}" alt="">
                                                </div>
                                                <p>{{ $featured->team1->name ?? ''}}</p>
                                            </div>

                                           <div class="feature-mid">
                                                <p>
                                                    {{ \Carbon\Carbon::parse($featured->match_time)->format('h:i A') ?? 'Not Fixed' }} <br> 
                                                    <span>{{ \Carbon\Carbon::parse($featured->match_date)->format('M d') ?? 'Not Fixed' }}</span>
                                                </p>
                                            </div>


                                            <div class="feature-rgt">
                                                <div class="feat-img">
                                                    <img src="{{asset($featured->team2->logo)}}" alt="">
                                                </div>
                                                <p>{{ $featured->team2->name ?? ''}}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p class="text-muted">Currently, there are no featured matches. Please check back later!</p>
                                @endif
                                <!-- <div class="featured-div d-flex">
                                    <div class="feature-lft">
                                        <div class="feat-img">
                                            <img src="{{asset('img/feature-3.png')}}" alt="">
                                        </div>
                                        <p>SDMB</p>
                                    </div>

                                    <div class="feature-mid">
                                        <p>06:00 PM <br> <span> FEB 18</span></p>
                                    </div>

                                    <div class="feature-rgt">
                                        <div class="feat-img">
                                            <img src="{{asset('img/feature-4.png')}}" alt="">
                                        </div>
                                        <p>NVMB</p>
                                    </div>
                                </div> -->


                            </div>
                            <div class="schedule-btm">
                                <div class="footbal-img">
                                    <img src="{{asset('img/big-img.png')}}" alt="">
                                    <div class="cross-icon">
                                        <a href=""> <i class="fa-solid fa-xmark"></i></a>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</section>

<script>
$(document).ready(function () {
    const maxVisibleMatches = 5; // Set how many matches to show initially
    let expanded = false;

    // Fetch initial data on page load
    let currentDate = new Date();
    let fullDate = formatFullDate(currentDate);
    fetchData(fullDate);
    $("#datePicker").datepicker("setDate", currentDate);

    $("#datePicker").datepicker({
        dateFormat: "mm-dd",
        onSelect: function (dateText) {
            let selectedDate = $("#datePicker").datepicker("getDate");
            let fullDate = formatFullDate(selectedDate);
            fetchData(fullDate);
        }
    });

    $("#prevDate").click(function (e) {
        e.preventDefault();
        changeDate(-1);
    });

    $("#nextDate").click(function (e) {
        e.preventDefault();
        changeDate(1);
    });
    $('#pills-All-tab').on('click', function(e) {
        e.preventDefault();
        changeDate(0);
    });
    // Change date for fetching matches
    function changeDate(offset) {
        let currentDate = $("#datePicker").datepicker("getDate");
        if (!currentDate) {
            currentDate = new Date();
        }
        currentDate.setDate(currentDate.getDate() + offset);
        $("#datePicker").datepicker("setDate", currentDate);

        let fullDate = formatFullDate(currentDate);
        fetchData(fullDate);
    }

    // Format date as YYYY-MM-DD
    function formatFullDate(date) {
        let year = date.getFullYear();
        let month = ("0" + (date.getMonth() + 1)).slice(-2);
        let day = ("0" + date.getDate()).slice(-2);
        return `${year}-${month}-${day}`;
    }

    // Format match time as 12-hour format
    function formatMatchTime(timeString) {
        let [hours, minutes] = timeString.split(":");
        let ampm = hours >= 12 ? "PM" : "AM";
        hours = hours % 12 || 12;
        return `${hours}:${minutes} ${ampm}`;
    }

    // Fetch match data based on selected date
    function fetchData(selectedDate) {
        $.ajax({
            url: "{{ route('fetch.match.data') }}",
            type: "GET",
            data: { date: selectedDate },
            success: function (response) {
                if (response && response.length > 0) {
                    let matchHtml = "";
                    response.forEach((match, index) => {
                        const isFavorite = isMatchFavorite(match.id);
                        matchHtml += `
                            <div class="all-txt-item g-17 match-item ${index >= maxVisibleMatches ? 'd-none' : 'd-flex'}" data-match-id="${match.id}">
                                <div class="txt-lft-mid-wrp d-flex g-17">
                                    <div class="txt-itm-lft">
                                        <p>${formatMatchTime(match.match_time)}</p>
                                    </div>
                                    <div class="txt-itm-mid">
                                        <ul class="list-unstyled m-0">
                                            <li>
                                                <p class="m-0">
                                                    <span><img src="${match.team1.logo}" alt=""></span>
                                                    <a class="text-links" href="{{ url('/scores/matches/${match.id}/teams/team-1') }}">${match.team1.name}</a>
                                                </p>
                                                <span>${ match.score_team1 ?? 0 }</span>
                                            </li>
                                            <li class="light-grey">
                                                <p class="m-0">
                                                    <span><img src="${match.team2.logo}" alt=""></span> 
                                                    <a class="text-links" href="{{ url('/scores/matches/${match.id}/teams/team-2') }}">${match.team2.name}</a>

                                                </p>
                                                <span>${ match.score_team2 ?? 0 }</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="txt-itm-rgt">
                                    <a href="javascript:void(0)" class="star-img" onclick="toggleFavorite(${match.id})">
                                        <svg width="22" height="21" viewBox="0 0 22 21" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M21.5631 8.39786C21.2996 7.58489 20.6106 7.0042 19.7647 6.88113L15.5352 6.26664C15.374 6.24324 15.2353 6.14097 15.1625 5.99536L13.2705 2.16281C12.8926 1.39751 12.1264 0.921692 11.2727 0.921692C10.419 0.921692 9.65288 1.39751 9.275 2.16367L7.38299 5.99623C7.31106 6.14183 7.17152 6.24324 7.01031 6.26751L2.77994 6.882C1.93404 7.00507 1.24501 7.58662 0.981537 8.39872C0.718059 9.21082 0.933868 10.0853 1.54489 10.6816L4.60522 13.6648C4.72222 13.7792 4.77596 13.9421 4.74822 14.1034L4.02712 18.3147C3.88239 19.1562 4.22213 19.9917 4.91203 20.4935C5.60192 20.9945 6.50156 21.0621 7.25905 20.6625L11.0413 18.6743C11.1861 18.5981 11.3586 18.5989 11.5024 18.6735L15.2856 20.6625C15.6149 20.8359 15.9711 20.9217 16.3247 20.9217C16.785 20.9217 17.2426 20.777 17.6326 20.4935C18.3234 19.9917 18.6622 19.1562 18.5184 18.3147L17.7964 14.1025C17.7687 13.9413 17.8224 13.7783 17.9385 13.6639L20.9989 10.6807C21.6108 10.0845 21.8266 9.20996 21.5631 8.39786ZM19.789 9.43963L16.7278 12.4228C16.2034 12.9359 15.9642 13.6726 16.0873 14.3946L16.8101 18.6067C16.8569 18.8797 16.6879 19.0357 16.6134 19.0904C16.538 19.145 16.3377 19.255 16.0916 19.1285L12.3085 17.1385C11.9834 16.9687 11.6281 16.8829 11.2719 16.8829C10.9157 16.8829 10.5603 16.9687 10.2353 17.1385L6.45216 19.1285C6.20515 19.255 6.00494 19.1458 5.9304 19.0904C5.85587 19.0357 5.68772 18.8806 5.73453 18.6067L6.45649 14.3946C6.58043 13.6726 6.34122 12.935 5.816 12.4228L2.75654 9.43963C2.55807 9.24549 2.60313 9.02102 2.63174 8.93261C2.66034 8.84421 2.75654 8.6362 3.03042 8.59547L7.25992 7.98097C7.98535 7.8761 8.61284 7.42109 8.93785 6.76239L10.8299 2.92984C10.9521 2.6811 11.1809 2.65509 11.2727 2.65509C11.3646 2.65509 11.5934 2.6811 11.7165 2.92984L13.6085 6.76239C13.9335 7.42109 14.5601 7.8761 15.2864 7.98097L19.5159 8.59547C19.7907 8.6362 19.8869 8.84421 19.9146 8.93261C19.9424 9.02102 19.9874 9.24549 19.789 9.43963Z"
                                                            fill="${isFavorite ? '#ee3a7f' : '#9A9A9A'}" />
                                                    </svg>
                                    </a>
                                </div>
                            </div>`;
                    });
                    $(".all-txt-wrap").html(matchHtml);
                    toggleReadMoreButton(response.length);
                } else {
                    $(".all-txt-wrap").html("<div class='text-center mt-5'><p>No matches found for this date.</p></div>");
                    $('.show-all-btn').hide();
                }
            },
            error: function () {
                alert("Failed to fetch match data.");
            }
        });
    }

    // Check if the match is a favorite
    function isMatchFavorite(matchId) {
        let favorites = JSON.parse(localStorage.getItem('favorites')) || [];
        return favorites.includes(matchId);
    }

    // Toggle favorite status for a match
    window.toggleFavorite = function (matchId) {
        let favorites = JSON.parse(localStorage.getItem('favorites')) || [];

        if (favorites.includes(matchId)) {
            favorites = favorites.filter(id => id !== matchId);
        } else {
            favorites.push(matchId);
        }

        localStorage.setItem('favorites', JSON.stringify(favorites));
        $(`.match-item[data-match-id="${matchId}"] svg path`).attr('fill', isMatchFavorite(matchId) ? '#ee3a7f' : '#9A9A9A');
    }

    // Show more matches when button clicked
    $(".show-all-btn").click(function () {
        $(".match-item.d-none").removeClass("d-none").addClass('d-flex');
        $(this).hide();
    });

    // Toggle Read More button visibility
    function toggleReadMoreButton(matchCount) {
        if (matchCount > maxVisibleMatches) {
            $('.show-all-btn').show();
        } else {
            $('.show-all-btn').hide();
        }
    }

    // Switch to favorites tab
    $(".pills-Favorites").click(function () {
        let favorites = JSON.parse(localStorage.getItem('favorites')) || [];
        $(".match-item").each(function () {
            let matchId = $(this).data("match-id");
            if (!favorites.includes(matchId)) {
                $(this).hide();
            }
        });
    });


    // for fetch your favorite data :
        $('#pills-Favorites-tab').on('click', function() {
            let favorites = JSON.parse(localStorage.getItem('favorites')) || [];
            if(favorites.length == 0) {
                $(".fav-txt-wrap").html("<div class='text-center mt-5'><p>No favorites found.</p></div>");
            } else {
                console.log('Favorites found:', favorites);
                fetchFavoriteData(favorites);
            }
        });

        function fetchFavoriteData(favorites) {
            $.ajax({
                url: "{{ route('fetch.favorite.match.data') }}", // Updated route for fetching favorite matches
                type: "GET",
                data: { 
                    favorites: favorites // Send the favorites IDs to the server
                },
                success: function(response) {
                    if (Array.isArray(response) && response.length > 0) {
                        let matchHtml = "";
                        response.forEach((match, index) => {
                            const isFavorite = favorites.includes(match.id); // Check if the match is a favorite
                            matchHtml += `
                                <div class="all-txt-item  fav-txt-item g-17 match-item ${index >= maxVisibleMatches ? 'd-none' : 'd-flex'}" data-match-id="${match.id}">
                                    <div class="txt-lft-mid-wrp d-flex g-17">
                                        <div class="txt-itm-lft">
                                            <p>${formatMatchTime(match.match_time)}</p>
                                        </div>
                                        <div class="txt-itm-mid">
                                            <ul class="list-unstyled m-0">
                                                <li>
                                                    <p class="m-0">
                                                        <span><img src="${match.team1.logo}" alt=""></span> 
                                                        <a class="text-links" href="{{ url('/scores/matches/${match.id}/teams/team-1') }}">${match.team1.name}</a>

                                                    </p>
                                                    <span>${ match.score_team1 ?? 0 }</span>
                                                </li>
                                                <li class="light-grey">
                                                    <p class="m-0">
                                                        <span><img src="${match.team2.logo}" alt=""></span> 
                                                        <a class="text-links" href="{{ url('/scores/matches/${match.id}/teams/team-2') }}">${match.team2.name}</a>

                                                    </p>
                                                    <span>${ match.score_team2 ?? 0 }</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="txt-itm-rgt">
                                        <a href="javascript:void(0)" class="star-img" onclick="toggleFavorite(${match.id})">
                                            <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M21.5631 8.39786C21.2996 7.58489 20.6106 7.0042 19.7647 6.88113L15.5352 6.26664C15.374 6.24324 15.2353 6.14097 15.1625 5.99536L13.2705 2.16281C12.8926 1.39751 12.1264 0.921692 11.2727 0.921692C10.419 0.921692 9.65288 1.39751 9.275 2.16367L7.38299 5.99623C7.31106 6.14183 7.17152 6.24324 7.01031 6.26751L2.77994 6.882C1.93404 7.00507 1.24501 7.58662 0.981537 8.39872C0.718059 9.21082 0.933868 10.0853 1.54489 10.6816L4.60522 13.6648C4.72222 13.7792 4.77596 13.9421 4.74822 14.1034L4.02712 18.3147C3.88239 19.1562 4.22213 19.9917 4.91203 20.4935C5.60192 20.9945 6.50156 21.0621 7.25905 20.6625L11.0413 18.6743C11.1861 18.5981 11.3586 18.5989 11.5024 18.6735L15.2856 20.6625C15.6149 20.8359 15.9711 20.9217 16.3247 20.9217C16.785 20.9217 17.2426 20.777 17.6326 20.4935C18.3234 19.9917 18.6622 19.1562 18.5184 18.3147L17.7964 14.1025C17.7687 13.9413 17.8224 13.7783 17.9385 13.6639L20.9989 10.6807C21.6108 10.0845 21.8266 9.20996 21.5631 8.39786ZM19.789 9.43963L16.7278 12.4228C16.2034 12.9359 15.9642 13.6726 16.0873 14.3946L16.8101 18.6067C16.8569 18.8797 16.6879 19.0357 16.6134 19.0904C16.538 19.145 16.3377 19.255 16.0916 19.1285L12.3085 17.1385C11.9834 16.9687 11.6281 16.8829 11.2719 16.8829C10.9157 16.8829 10.5603 16.9687 10.2353 17.1385L6.45216 19.1285C6.20515 19.255 6.00494 19.1458 5.9304 19.0904C5.85587 19.0357 5.68772 18.8806 5.73453 18.6067L6.45649 14.3946C6.58043 13.6726 6.34122 12.935 5.816 12.4228L2.75654 9.43963C2.55807 9.24549 2.60313 9.02102 2.63174 8.93261C2.66034 8.84421 2.75654 8.6362 3.03042 8.59547L7.25992 7.98097C7.98535 7.8761 8.61284 7.42109 8.93785 6.76239L10.8299 2.92984C10.9521 2.6811 11.1809 2.65509 11.2727 2.65509C11.3646 2.65509 11.5934 2.6811 11.7165 2.92984L13.6085 6.76239C13.9335 7.42109 14.5601 7.8761 15.2864 7.98097L19.5159 8.59547C19.7907 8.6362 19.8869 8.84421 19.9146 8.93261C19.9424 9.02102 19.9874 9.24549 19.789 9.43963Z" fill="${isFavorite ? '#ee3a7f' : '#9A9A9A'}" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>`;
                        });
                        $(".fav-txt-wrap").html(matchHtml);
                        toggleReadMoreButton(response.length); // Adjust for more matches if needed
                    } else {
                        $(".fav-txt-wrap").html("<div class='text-center mt-5'><p>No favorite matches found.</p></div>");
                        $('.show-all-btn').hide(); // Hide the "Show All" button if no favorites
                    }
                },
                error: function() {
                    alert("Failed to fetch favorite match data.");
                }
            });
        }




});

</script>
@endsection
