@extends('layouts.app')

@section('content')
@include('layouts.headers.page')
<body onload="initialize();">
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
            <div class="row align-items-center">
                <h3 class="mb-0">{{ __('Edit Entity') }}</h3>
            </div>
        </div>
        <div class="card-body">
            <form  method="post" action="{{route('building.update', $building->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <h6 class="heading-small text-muted mb-4">{{ __('Entity information') }}</h6>
                


                <h2>@lang('Building Type')</h2>
                <div class="pl-lg-4">
                    <div  class="form-check form-check-inline{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <img src="{{ asset('argon') }}/img/v.png" width="100">
                        <input type="checkbox" name="type_building" id="checkbox" class="form-check-input{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Vertical') }}"  value="vertical" autofocus>
                        <label class="form-check-label" for="input-name">{{ __('Vertical') }}</label>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-check form-check-inline{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <img src="{{ asset('argon') }}/img/h.png" width="100"><br>
                        <input  type="checkbox" name="type_building" id="checkbox" class="form-check-input{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Horizontal') }}" value="horizontal"   autofocus>
                        <label class="form-check-label" for="input-name">{{ __('Horizontal') }}</label>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>


                    <h2>@lang('Building Information')</h2>
                    <div class="form-group row">
                        <div class="col-md-auto">
                            <label for="rows" class="form-check-label">{{__('Rows')}}</label>
                            <input type="number" class="form-control" name="rows" id="rows" value="{{ $building->rows }}" placeholder="Rows">
                        </div>

                        <div class="col-md-auto">
                            <label for="columns" class="form-check-label">{{__('Columns')}}</label>
                            <input type="number" class="form-control" name="columns" id="columns" value="{{ $building->columns }}" placeholder="columns">
                        </div>
                    </div>

                    <h2>@lang('Building Location')</h2>
                    <div id="map" style="height: 280px;"></div>
                    <div class="form-group row">
                        <div class="col">
                            <input type="text" name="address" class="form-control" placeholder="@lang('Address')" value="{{ $building->address }}" id="input-address" readonly/>
                        </div>
                        <div class="col-md-auto">
                            <input type="text" name="latitude" class="form-control" placeholder="@lang('latitude')" value="{{ $building->latitude }}" id="latitude" readonly/>
                        </div>
                        <div class="col-md-auto">
                            <input type="text" name="longitude" class="form-control" placeholder="{{__('longitude')}}" value="{{ $building->longitude }}" id="longitude" readonly/>
                        </div>
                    </div>
                        
                        <div class="text-center">
                            <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                        </div>
                </div>
            </form>
        </div>
        @include('layouts.footers.auth')
    </div>
</body>
@endsection
    @push('js')
    <script type="text/javascript">
    $("input:checkbox").on('click', function() {
    var $box = $(this);
    if ($box.is(":checked")) {
        var group = "input:checkbox[name='" + $box.attr("name") + "']";
        $(group).prop("checked", false);
        $box.prop("checked", true);
    } else {
        $box.prop("checked", false);
    }
    });
</script>
<script type="text/javascript">
    var map;
    var marker;
    var lat = document.getElementById("latitude").value;
    var long = document.getElementById("longitude").value;
    var myLatlng = new google.maps.LatLng(lat, long);
    var geocoder = new google.maps.Geocoder();
    var infowindow = new google.maps.InfoWindow();
    function initialize() {
        var mapOptions = {
        zoom: 20,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        
        map = new google.maps.Map(document.getElementById("map"), mapOptions);
        marker = new google.maps.Marker({
            map: map,
            position: myLatlng,
            draggable: true
        });

        google.maps.event.addListener(marker, 'dragend', function() {
            geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        var address_components = results[0].formatted_address;                        
                        $('#input-address').val(address_components);
                        $('#latitude').val(marker.getPosition().lat());
                        $('#longitude').val(marker.getPosition().lng());
                        infowindow.setContent(results[0].formatted_address);
                        infowindow.open(map, marker);
                    }
                }
            });
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
@endpush