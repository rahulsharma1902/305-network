@extends('admin_layout.master')
@section('content')
<div class="nk-block nk-block-lg">
    <div class="nk-block-head d-flex justify-content-between">
        <div class="nk-block-head-content">
            <h4 class="title nk-block-title">Add Attributes: {{ $sport->name ?? '' }}</h4>   
        </div>
    </div>
    <div class="card card-bordered">
        <div class="card-inner">
            <form action="{{ url('admin-dashboard/sports/addAttrProcc') }}" method="post">
                @csrf
                <input type="hidden" name="sport_id" value="{{ $sport->id }}">

                <div class="row g-gs">
                    <!-- Editable Existing Attributes -->
                    @if(isset($sport->attributes) && $sport->attributes->count())
                    <div class="col-md-12">
                        <label class="form-label">Existing Attributes</label>
                        @foreach($sport->attributes as $attribute)
                            <div class="d-flex mb-2">
                                <input type="hidden" name="existing_attributes[{{ $attribute->id }}][id]" value="{{ $attribute->id }}">
                                <input type="text" class="form-control" name="existing_attributes[{{ $attribute->id }}][attribute_name]" value="{{ $attribute->attribute_name }}" />
                            </div>
                        @endforeach
                    </div>
                    @endif

                    <!-- Dynamic Attribute Fields -->
                    <div class="col-md-12">
                        <label class="form-label">Add Attributes</label>
                        <div id="attribute-container">
                            <!-- No empty input at start -->
                        </div>
                        <button type="button" id="add-attribute" class="btn btn-sm btn-primary mt-2">Add More</button>

                        <!-- Validation Errors -->
                        @if($errors->has('attributes'))
                            <div class="error text-danger">
                                {{ $errors->first('attributes') }}
                            </div>
                        @endif
                    </div>

                    <!-- Submit Button -->
                    <div class="col-md-12 mt-4">
                        <button type="submit" class="btn btn-lg btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript for Adding/Removing Fields -->
<script>
    $(document).ready(function () {
        $("#add-attribute").on("click", function () {
            let attributeField = `
                <div class="d-flex mb-2 new-attribute">
                    <input type="text" class="form-control" required name="attributes[]" placeholder="Enter attribute" />
                    <button type="button" class="btn btn-danger ms-2 remove-attribute">X</button>
                </div>
            `;
            $("#attribute-container").append(attributeField);
        });

        // Remove only newly added attributes
        $(document).on("click", ".remove-attribute", function () {
            $(this).closest(".new-attribute").remove();
        });
    });
</script>

@endsection
