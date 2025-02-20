@extends('admin_layout.master')
@section('content')
<div class="nk-block nk-block-lg">
    <div class="nk-block-head d-flex justify-content-between">
        <div class="nk-block-head-content">
            <h4 class="title nk-block-title">Update Match</h4>   
        </div>
    </div>
    <div class="card card-bordered">
        <div class="card-inner">
            <form action="{{ url('admin-dashboard/matches/addProcc') }}" class="form-validate" method="post">
                @csrf
                <input type="hidden" value="{{ $match->id ?? '' }}" name="id">
                <input type="hidden" id="team_update" value="{{ $match->team_update ?? 0 }}">
                @if($match->team_update === 1)
                    <input type="hidden" name="sport_id" value="{{ $match->sport_id ?? '' }}">
                    <input type="hidden" name="team1_id" value="{{ $match->team1_id ?? '' }}">
                    <input type="hidden" name="team2_id" value="{{ $match->team2_id ?? '' }}">
                    <input type="hidden" name="status" value="{{ $match->status ?? '' }}">
                    <input type="hidden" name="season_year" value="{{ $match->season_year ?? '' }}">
                    <input type="hidden" name="match_date" value="{{ $match->match_date ?? '' }}">
                    <input type="hidden" name="match_time" value="{{ $match->match_time ?? '' }}">
                @endif
                <div class="row g-gs">

                    <!-- Sport Selection -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="sport_id">Sport</label>
                            <div class="form-control-wrap">
                                <select class="form-control disable-if-team-update" id="sport_id" name="sport_id" required>
                                    <option value="">Select Sport</option>
                                    @foreach($sports as $sport)
                                        <option value="{{ $sport->id }}" {{ $match->sport_id == $sport->id ? 'selected' : '' }}>
                                            {{ $sport->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Season Year -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="season_year">Season Year</label>
                            <div class="form-control-wrap">
                                <input type="number" class="form-control disable-if-team-update" id="season_year" name="season_year" min="2000" max="{{ date('Y') + 1 }}" value="{{ $match->season_year }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- Team 1 Selection -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="team1_id">Team 1</label>
                            <div class="form-control-wrap">
                                <select class="form-control disable-if-team-update" id="team1_id" name="team1_id" required>
                                    <option value="">Select Team 1</option>
                                    @foreach($teams as $team)
                                        <option value="{{ $team->id }}" {{ $match->team1_id == $team->id ? 'selected' : '' }}>
                                            {{ $team->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Team 2 Selection -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="team2_id">Team 2</label>
                            <div class="form-control-wrap">
                                <select class="form-control disable-if-team-update" id="team2_id" name="team2_id" required>
                                    <option value="">Select Team 2</option>
                                    @foreach($teams as $team)
                                        <option value="{{ $team->id }}" {{ $match->team2_id == $team->id ? 'selected' : '' }}>
                                            {{ $team->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Match Date -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="match_date">Match Date</label>
                            <div class="form-control-wrap">
                                <input type="date" class="form-control disable-if-team-update" id="match_date" name="match_date" value="{{ $match->match_date }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- Match Time -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="match_time">Match Time</label>
                            <div class="form-control-wrap">
                                <input type="time" class="form-control disable-if-team-update" id="match_time" name="match_time" value="{{ $match->match_time }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- Match Status -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="status">Match Status</label>
                            <div class="form-control-wrap">
                                <select class="form-control disable-if-team-update" id="status" name="status" required>
                                    <option value="upcoming" {{ $match->status == 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                                    <option value="live" {{ $match->status == 'live' ? 'selected' : '' }}>Live</option>
                                    <option value="done" {{ $match->status == 'done' ? 'selected' : '' }}>Done</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="highlight_status">Match Highlight Status</label>
                            <sup>@error('highlight_status') <div class="error text-danger">{{ $message }}</div> @enderror</sup>
                            <div class="form-control-wrap">
                                <select class="form-control" id="highlight_status" name="highlight_status" required>
                                    <option value="non_featured" {{ $match->highlight_status == 'non_featured' ? 'selected' : '' }}>Non Featured</option>
                                    <option value="featured" {{ $match->highlight_status == 'featured' ? 'selected' : '' }}>Featured</option>
                                </select>
                            </div>
                            <small class="text-muted">
                                Example: <code>This match will be displayed on the score page if you make it Featured.</code>
                            </small>
                        </div>
                    </div>
                    <!-- Scores (Only show when match is completed) -->
                    <div class="col-md-6 {{ $match->status !== 'done' ? 'd-none' : '' }}" id="score_fields">
                        <div class="form-group">
                            <label class="form-label">Scores</label>
                            <div class="form-control-wrap">
                                <input type="number" class="form-control" id="score_team1" name="score_team1" min="0" value="{{ $match->score_team1 ?? '' }}" placeholder="Team 1 Score">
                                <input type="number" class="form-control mt-2" id="score_team2" name="score_team2" min="0" value="{{ $match->score_team2 ?? '' }}" placeholder="Team 2 Score">
                            </div>
                        </div>
                    </div>

                    <!-- Winning Team (Hidden if Upcoming) -->
                    <div class="col-md-6 {{ $match->status === 'upcoming' ? 'd-none' : '' }}" id="winning_team_field">
                        <div class="form-group">
                            <label class="form-label" for="winning_team">Winning Team</label>
                            <div class="form-control-wrap">
                                <select class="form-control" id="winning_team" name="winning_team">
                                    <option value="">Select Winning Team</option>
                                    <option value="{{ $match->team1_id }}" {{ $match->winning_team == $match->team1_id ? 'selected' : '' }}>{{ $match->team1->name }}</option>
                                    <option value="{{ $match->team2_id }}" {{ $match->winning_team == $match->team2_id ? 'selected' : '' }}>{{ $match->team2->name }}</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Man of the Match (Hidden if Upcoming) -->
                    <div class="col-md-6 {{ $match->status === 'upcoming' ? '' : '' }}" id="man_of_the_match_field">
                        <div class="form-group">
                            <label class="form-label" for="manof_match_id">Man of the Match</label>
                            <div class="form-control-wrap">
                                <select class="form-control" id="manof_match_id" name="manof_match_id">
                                    <option value="">Select Player</option>
                                    <!-- Players will be populated based on the sport selected -->
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-4">
                        <button type="submit" class="btn btn-lg btn-primary">Update Match</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function () {
    const teamUpdate = $("#team_update").val();

    if (teamUpdate == 1) {
        // Disable all fields except for the ones we want to keep enabled
        $(".disable-if-team-update").prop("disabled", true);

        // Enable the fields we want to keep editable
        $("#score_team1, #score_team2, #winning_team, #manof_match_id").prop("disabled", false);
    }
});

$(document).ready(function () {
    const $statusField = $("#status");
    const $sportField = $("#sport_id");
    const $team1Field = $("#team1_id");
    const $team2Field = $("#team2_id");
    const $winningTeamField = $("#winning_team_field");
    const $manOfTheMatchField = $("#man_of_the_match_field");
    const $scoreFields = $("#score_fields");

    // Function to update the teams based on selected sport
    function updateTeams(sportId) {
        $team1Field.empty().append('<option value="">Select Team 1</option>');
        $team2Field.empty().append('<option value="">Select Team 2</option>');

        if (sportId) {
            $.get(`/admin-dashboard/matches/getTeams/${sportId}`, function(data) {
                data.forEach(team => {
                    let teamOption1 = `<option value="${team.id}">${team.name}</option>`;
                    let teamOption2 = `<option value="${team.id}">${team.name}</option>`;
                    $team1Field.append(teamOption1);
                    $team2Field.append(teamOption2);
                });

                // Retain already selected teams
                if ("{{ $match->team1_id }}") {
                    $team1Field.val("{{ $match->team1_id }}");
                }
                if ("{{ $match->team2_id }}") {
                    $team2Field.val("{{ $match->team2_id }}");
                }

                updateWinningTeam();
            });
        }
    }

    // Function to update the winning team field
    function updateWinningTeam() {
        const team1Id = $team1Field.val();
        const team2Id = $team2Field.val();
        $winningTeamField.find("select").empty();
        
        if (team1Id && team2Id) {
            // $winningTeamField.removeClass("d-none").find("select").append(`
            //     <option value="${team1Id}">${$("#team1_id option:selected").text()}</option>
            //     <option value="${team2Id}">${$("#team2_id option:selected").text()}</option>
            // `);
            $winningTeamField.find("select").append(`
                <option value="${team1Id}">${$("#team1_id option:selected").text()}</option>
                <option value="${team2Id}">${$("#team2_id option:selected").text()}</option>
            `);
        } else {
            $winningTeamField.addClass("d-none");
        }
    }

    // Function to update the Man of the Match field
    function updateManOfTheMatch() {
    const team1Id = $team1Field.val() || "{{ $match->team1_id }}";
    const team2Id = $team2Field.val() || "{{ $match->team2_id }}";
    const manOfTheMatchId = "{{ $match->manof_match_id }}"; // Use this to pre-select the existing man of the match

    // Call the AJAX endpoint to get the players
    $.get(`/admin-dashboard/matches/getPlayers/${team1Id}/${team2Id}`, function(data) {
        const $manOfTheMatch = $("#manof_match_id");
        $manOfTheMatch.empty().append('<option value="">Select Player</option>');

        data.forEach(player => {
            const isSelected = manOfTheMatchId == player.id ? 'selected' : ''; // Check if this player is the man of the match
            $manOfTheMatch.append(`<option value="${player.id}" ${isSelected}>${player.player.first_name} ${player.player.last_name}</option>`);
        });
    });
}


    // Function to handle status change visibility
    function handleStatusChange() {
        const status = $statusField.val();

        if (status === 'live') {
            $scoreFields.removeClass('d-none');
            // $sportField.prop('disabled', true);
            $winningTeamField.addClass('d-none');
            $manOfTheMatchField.addClass('d-none');

            // $manOfTheMatchField.removeClass('d-none');
            // $winningTeamField.removeClass('d-none');
        } else if(status === 'done'){
            // $sportField.prop('disabled', true);
            $scoreFields.removeClass('d-none');
            $manOfTheMatchField.removeClass('d-none');
            $winningTeamField.removeClass('d-none');
        }else {
            $scoreFields.addClass('d-none');
            $manOfTheMatchField.addClass('d-none');
            $winningTeamField.addClass('d-none');
        }
    }

    // Listen to changes on status selection and update visibility of fields
    $statusField.change(function() {
        handleStatusChange();
        updateManOfTheMatch();
    });

    // Listen to changes on sport selection and update teams and players
    $sportField.change(function() {
        const sportId = $(this).val();
        updateTeams(sportId);
        updateManOfTheMatch();
    });

    // Listen to changes on team selection and update winning team
    $team1Field.change(updateWinningTeam);
    $team2Field.change(updateWinningTeam);

    // Initialize page with teams based on current sport
    const currentSportId = $sportField.val();
    if (currentSportId) {
        updateTeams(currentSportId);
        updateManOfTheMatch();
    }

    // Initially update winning team if teams are selected
    updateWinningTeam();

    // Initially handle status visibility on page load
    handleStatusChange();
});

</script>
@endsection