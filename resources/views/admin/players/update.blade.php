@extends('admin_layout.master')
@section('content')
<div class="nk-block nk-block-lg">
    <div class="nk-block-head d-flex justify-content-between">
        <div class="nk-block-head-content">
            <h4 class="title nk-block-title">update Player</h4>   
        </div>
    </div>
    <div class="card card-bordered">
        <div class="card-inner">
            <form action="{{ url('admin-dashboard/players/addProcc') }}" class="form-validate" novalidate="novalidate" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $players->id ?? '' }}">
                <div class="row g-gs">
                    <!-- Basic Info -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label" for="first_name">First Name</label>
                            <sup>
                                @error('first_name')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $players->first_name ?? '' }}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label" for="last_name">Last Name</label>
                            <sup>
                                @error('last_name')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $players->last_name ?? '' }}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label" for="high_school">High School</label>
                            <sup>
                                @error('high_school')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="high_school" name="high_school" value="{{ $players->high_school ?? ''  }}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label" for="class">Class</label>
                            <sup>
                                @error('class')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="class" name="class" value="{{ $players->class ?? '' }}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label" for="graduation_year">Graduation Year</label>
                            <sup>
                                @error('graduation_year')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="graduation_year" name="graduation_year" value="{{ $players->graduation_year ?? '' }}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label" for="dob">Date of Birth</label>
                            <sup>
                                @error('dob')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <input type="date" class="form-control" id="dob" name="dob" value="{{ $players->dob ?? ''  }}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label" for="height">Height</label>
                            <sup>
                                @error('height')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="height" name="height" value="{{ $players->height ?? '' }}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label" for="weight">Weight (in kg)</label>
                            <sup>
                                @error('weight')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="weight" name="weight" value="{{ $players->weight ?? '' }}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label" for="jersey_number">Jersey Number</label>
                            <sup>
                                @error('jersey_number')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <input type="number" class="form-control" id="jersey_number" name="jersey_number" value="{{ $players->jersey_number ?? ''}}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label" for="email">Email</label>
                            <sup>
                                @error('email')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <input type="email" class="form-control" id="email" name="email" value="{{ $players->email ?? '' }}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label" for="twitter">Twitter</label>
                            <sup>
                                @error('twitter')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="twitter" name="twitter" value="{{ $players->twitter ?? '' }}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label" for="instagram">Instagram</label>
                            <sup>
                                @error('instagram')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="instagram" name="instagram" value="{{ $players->instagram ?? '' }}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label" for="facebook">Facebook</label>
                            <sup>
                                @error('facebook')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="facebook" name="facebook" value="{{ $players->facebook ?? '' }}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label" for="image">Image</label>
                            <sup>
                                @error('image')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <div class="form-file">
                                    <input type="file" class="form-file-input" name="image" id="image">
                                    <label class="form-file-label" for="image">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="form-label" for="banner_image_video">Banner Video (Embed URL or MP4 Link)</label>
                            <sup>
                                @error('banner_image_video')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <input type="text" value="{{ $players->banner_image_video ?? '' }}" class="form-control" name="banner_image_video" id="banner_image_video" placeholder="Paste YouTube, Vimeo, or MP4 video URL here">
                            </div>
                            <small class="text-muted">
                                Example: <code>https://www.youtube.com/embed/your-video-id</code> or <code>https://player.vimeo.com/video/your-video-id</code> or <code>https://yourdomain.com/video.mp4</code>
                            </small>

                            <!-- Video Preview -->
                            <div id="videoPreview" class="mt-3" style="display: none;">
                                <iframe id="iframePreview" width="100%" height="315" frameborder="0" allowfullscreen style="display: none;"></iframe>
                                <video id="videoPlayer" width="100%" height="315" controls style="display: none;"></video>
                            </div>
                        </div>
                    </div>

                    <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        let bannerInput = document.getElementById("banner_image_video");
                        let previewContainer = document.getElementById("videoPreview");
                        let iframePreview = document.getElementById("iframePreview");
                        let videoPlayer = document.getElementById("videoPlayer");

                        bannerInput.addEventListener("input", function() {
                            let inputValue = this.value.trim();
                            let extractedUrl = extractIframeSrc(inputValue);

                            if (extractedUrl) {
                                if (extractedUrl.endsWith(".mp4")) {
                                    // MP4 Video Handling
                                    videoPlayer.src = extractedUrl;
                                    videoPlayer.style.display = "block";
                                    iframePreview.style.display = "none";
                                } else {
                                    // YouTube/Vimeo Handling
                                    iframePreview.src = extractedUrl;
                                    iframePreview.style.display = "block";
                                    videoPlayer.style.display = "none";
                                }
                                previewContainer.style.display = "block";
                            } else {
                                previewContainer.style.display = "none";
                            }
                        });

                        function extractIframeSrc(input) {
                            let match = input.match(/src=["'](.*?)["']/);
                            let url = match ? match[1] : input;

                            // Check if it's YouTube/Vimeo or an MP4 link
                            if (url.includes("youtube.com") || url.includes("vimeo.com") || url.endsWith(".mp4")) {
                                return url;
                            }
                            return null;
                        }
                    });
                    </script>
                    <!-- Athletic Stats -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label" for="athletic_info">Athletic Info</label>
                            <sup>
                                @error('athletic_info')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <textarea name="athletic_info" class="description" id="athletic_info">{{ $players->athletic_info ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label" for="yard_dash_time">40-Yard Dash Time</label>
                            <sup>
                                @error('yard_dash_time')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <input type="number" step="0.01" class="form-control" id="yard_dash_time" name="yard_dash_time" value="{{ $players->yard_dash_time ?? '' }}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label" for="vertical_jump">Vertical Jump (in cm)</label>
                            <sup>
                                @error('vertical_jump')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <input type="number" step="0.01" class="form-control" id="vertical_jump" name="vertical_jump" value="{{ $players->vertical_jump ?? '' }}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label" for="shuttle_run_time">Shuttle Run Time</label>
                            <sup>
                                @error('shuttle_run_time')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <input type="number" step="0.01" class="form-control" id="shuttle_run_time" name="shuttle_run_time" value="{{ $players->shuttle_run_time ?? '' }}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label" for="squat_max">Squat Max (in kg)</label>
                            <sup>
                                @error('squat_max')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <input type="number" class="form-control" id="squat_max" name="squat_max" value="{{ $players->squat_max ?? '' }}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label" for="deadlift_max">Deadlift Max (in kg)</label>
                            <sup>
                                @error('deadlift_max')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <input type="number" class="form-control" id="deadlift_max" name="deadlift_max" value="{{ $players->deadlift_max ?? ''}}" />
                            </div>
                        </div>
                    </div>

                    <!-- Performance Stats -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label" for="season_stat">Season Stat</label>
                            <sup>
                                @error('season_stat')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <textarea name="season_stat" class="description" id="season_stat">{{ $players->season_stat ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label" for="games_played">Games Played</label>
                            <sup>
                                @error('games_played')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <input type="number" class="form-control" id="games_played" name="games_played" value="{{ $players->games_played ?? '' }}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label" for="total_yards_passing">Total Passing Yards</label>
                            <sup>
                                @error('total_yards_passing')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="total_yards_passing" name="total_yards_passing" value="{{ $players->total_yards_passing ?? '' }}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label" for="total_yards_rushing">Total Rushing Yards</label>
                            <sup>
                                @error('total_yards_rushing')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="total_yards_rushing" name="total_yards_rushing" value="{{ $players->total_yards_rushing ?? '' }}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label" for="total_yards_receiving">Total Receiving Yards</label>
                            <sup>
                                @error('total_yards_receiving')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="total_yards_receiving" name="total_yards_receiving" value="{{ $players->total_yards_receiving ?? '' }}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label" for="touchdowns">Touchdowns</label>
                            <sup>
                                @error('touchdowns')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <input type="number" class="form-control" id="touchdowns" name="touchdowns" value="{{ $players->touchdowns ?? '' }}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label" for="tackles">Tackles</label>
                            <sup>
                                @error('tackles')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <input type="number" class="form-control" id="tackles" name="tackles" value="{{ $players->tackles ?? '' }}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label" for="interceptions">Interceptions</label>
                            <sup>
                                @error('interceptions')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <input type="number" class="form-control" id="interceptions" name="interceptions" value="{{ $players->interceptions ?? '' }}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label" for="kicking_stats">Kicking Stats</label>
                            <sup>
                                @error('kicking_stats')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="kicking_stats" name="kicking_stats" value="{{ $players->kicking_stats ?? '' }}" />
                            </div>
                        </div>
                    </div>

                    <!-- Academic Info -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label" for="academic_info">Academic Info</label>
                            <sup>
                                @error('academic_info')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <textarea name="academic_info" class="description" id="academic_info">{{ $players->academic_info ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label" for="gpa">GPA</label>
                            <sup>
                                @error('gpa')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="gpa" name="gpa" value="{{ $players->gpa ?? '' }}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label" for="sat_act_scores">SAT/ACT Scores</label>
                            <sup>
                                @error('sat_act_scores')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="sat_act_scores" name="sat_act_scores" value="{{ $players->sat_act_scores ?? '' }}" />
                            </div>
                        </div>
                    </div>

                        <!-- Academic Honors -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label" for="academic_honors">Academic Honors</label>
                                <sup>@error('academic_honors')<div class="error text-danger">{{ $message }}</div>@enderror</sup>
                                <textarea class="form-control description" id="academic_honors" name="academic_honors">{{ $players->academic_honors ?? '' }}</textarea>
                            </div>
                        </div>

                        <!-- Highlight Info -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label" for="highlight_info">Highlight Info</label>
                                <sup>@error('highlight_info')<div class="error text-danger">{{ $message }}</div>@enderror</sup>
                                <textarea class="form-control description" id="highlight_info" name="highlight_info">{{ $players->highlight_info ?? '' }}</textarea>
                            </div>
                        </div>

                        <!-- Highlight Videos (JSON) -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label" for="highlight_videos">Highlight Videos</label>
                                <sup>@error('highlight_videos')<div class="error text-danger">{{ $message }}</div>@enderror</sup>

                                <div id="highlightVideosContainer">
                                    @if(!empty($players->highlight_videos))
                                        @foreach(json_decode($players->highlight_videos, true) as $video)
                                            <div class="video-input-group mt-2">
                                                <input type="text" class="form-control" name="highlight_videos[]" value="{{ $video }}" placeholder="Enter a video URL" />
                                                <button type="button" class="btn btn-danger btn-sm ms-2" onclick="removeHighlightVideoField(this)">Remove</button>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="video-input-group">
                                            <input type="text" class="form-control" name="highlight_videos[]" placeholder="Enter a video URL" />
                                            <button type="button" class="btn btn-danger btn-sm ms-2" onclick="removeHighlightVideoField(this)">Remove</button>
                                        </div>
                                    @endif
                                </div>

                                <button type="button" class="btn btn-sm btn-primary mt-2" onclick="addHighlightVideoField()">Add More</button>
                            </div>
                        </div>

                        <script>
                            function addHighlightVideoField() {
                                const container = document.getElementById('highlightVideosContainer');
                                const div = document.createElement('div');
                                div.className = 'video-input-group mt-2';

                                div.innerHTML = `
                                    <input type="text" class="form-control" name="highlight_videos[]" placeholder="Enter a video URL" />
                                    <button type="button" class="btn btn-danger btn-sm ms-2" onclick="removeHighlightVideoField(this)">Remove</button>
                                `;

                                container.appendChild(div);
                            }

                            function removeHighlightVideoField(button) {
                                button.parentElement.remove();
                            }
                        </script>

                        <style>
                            .video-input-group {
                                display: flex;
                                align-items: center;
                            }
                        </style>




                        <!-- Media Links -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="game_footage_link">Game Footage Link</label>
                                <sup>@error('game_footage_link')<div class="error text-danger">{{ $message }}</div>@enderror</sup>
                                <input type="text" class="form-control" id="game_footage_link" name="game_footage_link" value="{{ $players->game_footage_link ?? '' }}" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="photo_gallery_link">Photo Gallery Link</label>
                                <sup>@error('photo_gallery_link')<div class="error text-danger">{{ $message }}</div>@enderror</sup>
                                <input type="text" class="form-control" id="photo_gallery_link" name="photo_gallery_link" value="{{ $players->photo_gallery_link ?? '' }}" />
                            </div>
                        </div>

                        <!-- Awards & Camps -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label" for="award_info">Award Info</label>
                                <sup>@error('award_info')<div class="error text-danger">{{ $message }}</div>@enderror</sup>
                                <textarea class="form-control description" id="award_info" name="award_info">{{ $players->award_info ?? '' }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label" for="team_mvp_award">Team MVP Award</label>
                                <sup>@error('team_mvp_award')<div class="error text-danger">{{ $message }}</div>@enderror</sup>
                                <input type="text" class="form-control" id="team_mvp_award" name="team_mvp_award" value="{{ $players->team_mvp_award ?? '' }}" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label" for="all_state_honors">All-State Honors</label>
                                <sup>@error('all_state_honors')<div class="error text-danger">{{ $message }}</div>@enderror</sup>
                                <input type="text" class="form-control" id="all_state_honors" name="all_state_honors" value="{{ $players->all_state_honors ?? '' }}" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label" for="athletic_camps_attended">Athletic Camps Attended</label>
                                <sup>@error('athletic_camps_attended')<div class="error text-danger">{{ $message }}</div>@enderror</sup>
                                <input type="text" class="form-control" id="athletic_camps_attended" name="athletic_camps_attended" value="{{ $players->athletic_camps_attended ?? '' }}" />
                            </div>
                        </div>

                        <!-- Recruiting -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label" for="recruting_info">Recruiting Info</label>
                                <sup>@error('recruting_info')<div class="error text-danger">{{ $message }}</div>@enderror</sup>
                                <textarea class="form-control description" id="recruting_info" name="recruting_info">{{ $players->recruting_info ?? '' }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label" for="commitment_status">Commitment Status</label>
                                <sup>@error('commitment_status')<div class="error text-danger">{{ $message }}</div>@enderror</sup>
                                <input type="text" class="form-control" id="commitment_status" name="commitment_status" value="{{ $players->commitment_status ?? '' }}" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label" for="offers_received">Offers Received</label>
                                <sup>@error('offers_received')<div class="error text-danger">{{ $message }}</div>@enderror</sup>
                                <input type="text" class="form-control" id="offers_received" name="offers_received" value="{{ $players->offers_received ?? '' }}" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label" for="preferred_colleges">Preferred Colleges</label>
                                <sup>@error('preferred_colleges')<div class="error text-danger">{{ $message }}</div>@enderror</sup>
                                <input type="text" class="form-control" id="preferred_colleges" name="preferred_colleges" value="{{ $players->preferred_colleges ?? '' }}" />
                            </div>
                        </div>
                        <!-- Add Player Attribute Button -->
                        <div class="col-md-12 mt-3">
                            <button type="button" class="btn btn-primary" id="addAttribute">Add Player Attribute</button>
                        </div>
                         <!-- Attributes Container -->
                         <div class="col-md-12 mt-3" id="attributesContainer">
                            @if(old('attribute_names')) 
                                @foreach(old('attribute_names') as $index => $name)
                                    <div class="row mb-2 align-items-center attribute-row">
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" name="attribute_names[]" placeholder="Attribute Name" value="{{ old('attribute_names')[$index] }}" />
                                            @error("attribute_names.$index")
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" name="attribute_values[]" placeholder="Attribute Value" value="{{ old('attribute_values')[$index] }}" />
                                            @error("attribute_values.$index")
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-danger remove-attribute">Remove</button>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                @foreach($players->playerAttributes as $index => $attribute)
                                    <div class="row mb-2 align-items-center attribute-row">
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" name="attribute_names[]" placeholder="Attribute Name" value="{{ $attribute->attribute_name }}" />
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" name="attribute_values[]" placeholder="Attribute Value" value="{{ $attribute->attribute_value }}" />
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-danger remove-attribute">Remove</button>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                            <!-- Attributes Container -->
                            <div class="col-md-12 mt-3" id="attributesContainer"></div>
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

<!-- JavaScript -->
<script>
$(document).ready(function(){
    // Update the slug field based on the name field
    $('#name').on('input', function(){
        let name = $(this).val().toLowerCase();
        let slug = name.replace(/\s+/g, "-").replace(/\//g, "-");
        $('#slug').val(slug);
    });

});
</script>
<script>
    $(document).ready(function () {
        $("#addAttribute").click(function () {
            let attributeRow = `
                <div class="row mb-2 align-items-center attribute-row">
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="attribute_names[]" placeholder="Attribute Name" required />
                    </div>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="attribute_values[]" placeholder="Attribute Value" required />
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-danger remove-attribute">Remove</button>
                    </div>
                </div>
            `;

            $("#attributesContainer").append(attributeRow);
        });

        // Remove attribute row
        $(document).on("click", ".remove-attribute", function () {
            $(this).closest(".attribute-row").remove();
        });
    });
</script>
@endsection
