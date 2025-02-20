@extends('admin_layout.master')
@section('content')

<div class="nk-block nk-block-lg">
    <div class="nk-block-head d-flex justify-content-between">
        <div class="nk-block-head-content">
            <h4 class="title nk-block-title">Update Footer Content</h4>
        </div>
    </div>
    <div class="card card-bordered">
        <div class="card-inner">
            <form action="{{ url('admin-dashboard/pages/footer/addProcc') }}" class="form-validate" novalidate="novalidate" method="post">
                @csrf
                <div class="row g-gs">
                    
                    <!-- Address -->
                    <div class="col-md-12 mt-3">
                        <div class="form-group">
                            <label class="form-label" for="address">Address</label>
                            <sup>@error('address') <div class="error text-danger">{{ $message }}</div> @enderror</sup>
                            <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $footerPage->address ?? '') }}">
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="col-md-12 mt-3">
                        <div class="form-group">
                            <label class="form-label" for="email">Email</label>
                            <sup>@error('email') <div class="error text-danger">{{ $message }}</div> @enderror</sup>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $footerPage->email ?? '') }}">
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="col-md-12 mt-3">
                        <div class="form-group">
                            <label class="form-label" for="phone">Phone</label>
                            <sup>@error('phone') <div class="error text-danger">{{ $message }}</div> @enderror</sup>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $footerPage->phone ?? '') }}">
                        </div>
                    </div>

                    <!-- Description Title -->
                    <div class="col-md-12 mt-3">
                        <div class="form-group">
                            <label class="form-label" for="description_title">Description Title</label>
                            <sup>@error('description_title') <div class="error text-danger">{{ $message }}</div> @enderror</sup>
                            <input type="text" class="form-control" id="description_title" name="description_title" value="{{ old('description_title', $footerPage->description_title ?? '') }}">
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="col-md-12 mt-3">
                        <div class="form-group">
                            <label class="form-label" for="description">Description</label>
                            <sup>@error('description') <div class="error text-danger">{{ $message }}</div> @enderror</sup>
                            <textarea class="form-control" id="description" name="description" rows="4">{{ old('description', $footerPage->description ?? '') }}</textarea>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="col-md-12 mt-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Update Footer Content</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

@endsection
