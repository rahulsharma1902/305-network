@extends('admin_layout.master')
@section('content')
<div class="nk-block nk-block-lg">
    <div class="nk-block-head d-flex justify-content-between">
        <div class="nk-block-head-content">
            <h4 class="title nk-block-title">Add Matches</h4>   
        </div>
    </div>
    <div class="card card-bordered">
        <div class="card-inner">
            <form action="{{ url('admin-dashboard/matches/addProcc') }}" class="form-validate" method="post">
                @csrf
                <div class="row g-gs">

                    <!-- Sport Selection -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="sport_id">Sport</label>
                            <sup>@error('sport_id') <div class="error text-danger">{{ $message }}</div> @enderror</sup>
                            <div class="form-control-wrap">
                                <select class="form-control" id="sport_id" name="sport_id" required >
                                    <option value="">Select Sport</option>
                                    @foreach($sports as $sport)
                                        <option value="{{ $sport->id }}">{{ $sport->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- Season Year -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="season_year">Season Year</label>
                            <sup>@error('season_year') <div class="error text-danger">{{ $message }}</div> @enderror</sup>
                            <div class="form-control-wrap">
                                <input type="number" class="form-control" id="season_year" name="season_year" min="2000" max="{{ date('Y') + 1 }}" required>
                            </div>
                        </div>
                    </div>
                    <!-- Team 1 Selection -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="team1_id">Team 1</label>
                            <sup>@error('team1_id') <div class="error text-danger">{{ $message }}</div> @enderror</sup>
                            <div class="form-control-wrap">
                                <select class="form-control" id="team1_id" name="team1_id" required>
                                    <option value="">Select Team 1</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Team 2 Selection -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="team2_id">Team 2</label>
                            <sup>@error('team2_id') <div class="error text-danger">{{ $message }}</div> @enderror</sup>
                            <div class="form-control-wrap">
                                <select class="form-control" id="team2_id" name="team2_id" required>
                                    <option value="">Select Team 2</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Match Date -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="match_date">Match Date</label>
                            <sup>@error('match_date') <div class="error text-danger">{{ $message }}</div> @enderror</sup>
                            <div class="form-control-wrap">
                                <input type="date" class="form-control" id="match_date" name="match_date" required>
                            </div>
                        </div>
                    </div>

                    <!-- Match Time -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="match_time">Match Time</label>
                            <sup>@error('match_time') <div class="error text-danger">{{ $message }}</div> @enderror</sup>
                            <div class="form-control-wrap">
                                <input type="time" class="form-control" id="match_time" name="match_time" required>
                            </div>
                        </div>
                    </div>

                    <!-- Match Status -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="status">Match Status</label>
                            <sup>@error('status') <div class="error text-danger">{{ $message }}</div> @enderror</sup>
                            <div class="form-control-wrap">
                                <select class="form-control" id="status" name="status" required>
                                    <option value="upcoming">Upcoming</option>
                                    <option value="live">Live</option>
                                    <option value="done">Done</option>
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
                                    <option value="non_featured">Non Featured</option>
                                    <option value="featured">Featured</option>
                                </select>
                            </div>
                            <small class="text-muted">
                                Example: <code>This match will be displayed on the score page if you make it Featured.</code>
                            </small>
                        </div>
                    </div>


                    <!-- Scores (Only show when match is completed) -->
                    <div class="col-md-6 d-none" id="score_fields">
                        <div class="form-group">
                            <label class="form-label">Scores</label>
                            <div class="form-control-wrap">
                                <input type="number" class="form-control" id="score_team1" name="score_team1" min="0" placeholder="Team 1 Score">
                                <input type="number" class="form-control mt-2" id="score_team2" name="score_team2" min="0" placeholder="Team 2 Score">
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="col-md-12 mt-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Save</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById("status").addEventListener("change", function () {
        let scoreFields = document.getElementById("score_fields");
        if (this.value === "done") {
            scoreFields.classList.remove("d-none");
        } else {
            scoreFields.classList.add("d-none");
        }
    });

    document.getElementById("sport_id").addEventListener("change", function () {
        let sportId = this.value;
        let team1Select = document.getElementById("team1_id");
        let team2Select = document.getElementById("team2_id");

        team1Select.innerHTML = '<option value="">Select Team 1</option>';
        team2Select.innerHTML = '<option value="">Select Team 2</option>';

        if (sportId) {
            fetch(`/admin-dashboard/matches/getTeams/${sportId}`)
                .then(response => response.json())
                .then(data => {
                    data.forEach(team => {
                        let option1 = document.createElement("option");
                        option1.value = team.id;
                        option1.textContent = team.name;
                        team1Select.appendChild(option1);

                        let option2 = document.createElement("option");
                        option2.value = team.id;
                        option2.textContent = team.name;
                        team2Select.appendChild(option2);
                    });
                });
        }
    });
</script>

@endsection
