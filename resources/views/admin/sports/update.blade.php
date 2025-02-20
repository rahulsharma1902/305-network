@extends('admin_layout.master')
@section('content')
<div class="nk-block nk-block-lg">
    <div class="nk-block-head d-flex justify-content-between">
        <div class="nk-block-head-content">
            <h4 class="title nk-block-title">Add Sports</h4>   
        </div>
    </div>
    <div class="card card-bordered">
        <div class="card-inner">
            <form action="{{ url('admin-dashboard/sports/addProcc') }}" class="form-validate" novalidate="novalidate" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $sports->id ?? '' }}">
                <div class="row g-gs">
                    <!-- Name Field -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="name">Name</label>
                            <sup>
                                @error('name')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="name" name="name" value="{{ $sports->name ?? '' }}" />
                            </div>
                        </div>
                    </div>

                    <input type="hidden" class="form-control" id="slug" name="slug" value="{{ $sports->slug ?? ''  }}" />

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label">Type</label>
                            <sup>
                                @error('type')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <select class="form-select js-select2" name="type">
                                    <option value="men" {{ $sports->type === 'men' ? 'selected' : '' }}>Men</option>
                                    <option value="women" {{ $sports->type === 'women' ? 'selected' : '' }}>Women</option>
                                </select>
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
                    <div class="col-sm-6">
                        <div class="form-group">
                           
                                <img src="{{ asset($sports->image ?? '') }}" alt="Sport Icon" />

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label" for="icon">Icon</label>
                            <sup>
                                @error('icon')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <div class="form-file">
                                    <input type="file" class="form-file-input" name="icon" id="icon">
                                    <label class="form-file-label" for="image">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                           
                                <img style="max-width: 8rem;" src="{{ asset($sports->icon ?? '') }}" alt="Sport Icon" />

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="facebook">Facebook</label>
                            <sup>
                                @error('facebook')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="facebook" name="facebook" value="{{ $sports->facebook ?? '' }}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="instagram">Instagram</label>
                            <sup>
                                @error('instagram')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="instagram" name="instagram" value="{{ $sports->instagram ?? '' }}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="twitter">Twitter</label>
                            <sup>
                                @error('twitter')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="twitter" name="twitter" value="{{ $sports->twitter ?? '' }}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="ticketmaster">Ticket Master</label>
                            <sup>
                                @error('ticketmaster')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="ticketmaster" name="ticketmaster" value="{{ $sports->ticketmaster ?? '' }}" />
                            </div>
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <div class="col-md-12 mt-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Update Sport</button>
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
@endsection
