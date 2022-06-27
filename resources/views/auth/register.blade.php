@extends('layouts.app')

@section('content')
    @include('layouts.headers.guest')

    <div class="container mt--4 pb-5">
        <!-- Table -->
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <center>
                            <a class="navbar-brand" href="{{ route('inicio') }}">
                                <img height="80px" width="80px" src="{{ asset('argon') }}/img/brand/white.png" />
                            </a>
                        </center>
                        <br>
                        <div class="text-muted text-center mt-2 mb-4"><small>{{ __('Register Phone') }}</small></div>
                        <form role="form" method="POST" action="{{ route('register') }}">
                            @csrf


                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-mobile-button"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Phone') }}" type="text" name="phone" value="{{ old('name') }}" required autofocus>
                                </div>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary mt-4">{{ __('Create account') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
