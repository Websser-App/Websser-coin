@extends('layouts.app', ['title' => __('User Profile')])

@section('content')

@include('layouts.headers.page')
    


<style>
    .drag-area{
            
        border: 5px dashed #ddd;
        width: 250px;
        height: 250px;
        border-radius: 5px;
        text-align: center;
        
    }
    .tg{
        margin-top:20%;
        margin-bottom: 20%;
    }
    .drag-area.active{
        background-color: #b8d4fe;
        color: black;
        border: 2px dashed #618ac9;
    }
    .drag-area span{
        font-weight:500;
        color: #000;
    }
    .drag-area h3{
        font-weight:500;
    }
    .drag-area label{
        padding:5px 5px;
        border: 0;
        outline: none;
        background-color: #5256ad;
        color: white;
        border-radius: 5px;
        cursor: pointer;
    }
    .file-container{
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px;
        border: solid 1px #ddd;
    }
    .status-text{
        padding: 0 10px;

    }
    .success{
        color: green;
    }
    .failure{
        color: #ff0000;
    }



    .precios{
        font-size: 100%;
        text-align: center;
        
        background-color: white;
        border-radius: 25px;
    }
    .fondo{
        
        margin: 5%;
        display: flex;
        justify-content: center;
        background-color: white;
        border-radius: 20px;
    }
    .contenerdor2{
        display: grid;
        gap: 1rem;
        grid-auto-rows: 7rem;
        grid-template-columns: repeat(auto-fill, minmax(min(100%,25rem), 1fr));
        
    }
    .nombre{
        margin-left: 5%;
        
    }
    .preciosL{
        
        font-weight: bold;
        color: black;
        
        font-size: 200%;
    }

</style>

    
    <div class="card card-profile shadow">
        <div class="row justify-content-right">
            
            <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                    
                    <a href="/home">
                        @if(auth()->user()->avatar == NULL)
                            <div href="{{url('profile')}}">
                                <img alt="Image placeholder"  id="myImageId"   src="{{ asset('argon') }}/img/theme/perfile.jpg" class= "rounded-circle mb-3">
                            </div>
                        @else
                            <div href="{{url('profile')}}">
                                <img alt="Image placeholder"  id="myImageId"  src="data:image/png;base64, {{auth()->user()->avatar}}" class= "rounded-circle mb-3">
                            </div>
                        @endif    
                    </a>
                </div>
            </div>
        </div>
        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <!---
                        <div class="d-flex justify-content-between">
                            <a href="#" class="btn btn-sm btn-info mr-4">{{ __('Connect') }}</a>
                            <a href="#" class="btn btn-sm btn-default float-right">{{ __('Message') }}</a>   class="rounded-circle mb-3"
                        </div>
                        -->
                    </div>
                    <div class="card-body pt-0 pt-md-4">
                        
                        <div class="">
                            
                                <div class=" display-flex justify-content- mt-md-5">
                                    <div class="nombre">
                                        <h2><label  style = "color = #000; font-weight:500; font-size: 200%; text-shadow: 2px 2px 3px;" >Bienvenido</label></h2>
                                    </div>
                                    
                                    <div class="text-right" style="right: -90%; width: 100%;">
                                        <button title="@lang('Address')" type="button" class="btn btn-sm text-primary btnI" data-bs-toggle="modal"  data-bs-target="#avatar" >
                                            Cambiar imagen de perfil
                                        </button>
                                        <a href="#" class="btn btn-sm btn-primary buttons" style="font-size: 130%;">Documentos</a>
                                    </div>
                                </div>
                           
                        </div>
                        <!--
                        <div class="row"> <label  style = "color = #000; font-weight:500; font-size: 150%; text-shadow: 2px 2px 3px;" >{{ old('name', auth()->user()->name) }}</label>
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                    <div>
                                        <span class="heading">22</span>
                                        <span class="description">{{ __('Friends') }}</span>
                                    </div>
                                    <div>
                                        <span class="heading">10</span>
                                        <span class="description">{{ __('Photos') }}</span>
                                    </div>
                                    <div>
                                        <span class="heading">89</span>
                                        <span class="description">{{ __('Comments') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h3>
                                {{ auth()->user()->name }}<span class="font-weight-light">, 27</span>
                            </h3>
                            <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2"></i>{{ __('Bucharest, Romania') }}
                            </div>
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>{{ __('Solution Manager - Creative Tim Officer') }}
                            </div>
                            <div>
                                <i class="ni education_hat mr-2"></i>{{ __('University of Computer Science') }}
                            </div>
                            <hr class="my-4" />
                            <p>{{ __('Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music.') }}</p>
                            <a href="#">{{ __('Show more') }}</a>
                        </div>
                        -->
        </div>
        <label value="{{ old('name', auth()->user()->name) }}" class = ""></label>
    </div>


    <div class="fondo">
        <div class="card bg-secondary shadow" style=" width: 100%; border-radius: 20px;">
            <div class="card-header bg-white border-0" style=" width: 100%; border-radius: 20px;" >
                <div class="text-right" style="right: -90%; width: 100%;">
                    <a href="#" class="btn btn-sm btn-primary buttons" style="font-size: 100%;">Transferir Datos</a>
                </div>
                <div class=" text-center">
                    <h3 class="mb-0 preciosL">{{ __('Edit Profile') }}</h3>
                </div>
            </div> 
            @if(Session::has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card-body" >
                <form method="post" action="{{route('user.update', auth()->user()->id)}}" autocomplete="on">
                    @csrf
                    @method('put')

                    <h6 class="heading-small text-muted mb-4 text-center">{{ __('User information') }}</h6>
                    
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="contenerdor2">
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                            <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">{{ __('Surname') }}</label>
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-name-83"></i></span>
                                </div>
                                <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Surname') }}" type="text" name="surname" value="{{ old('name', auth()->user()->surname) }}" required>
                            </div>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">{{ __('Second surname') }}</label>
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-name-83"></i></span>
                                </div>
                                <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Second surname') }}" type="text" name="second_surname" value="{{ old('name', auth()->user()->second_surname) }}" required>
                            </div>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                            <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div>
                            <label class="form-control-label" for="input-name">{{ __('Country') }}</label>
                            <div class="input-group right">
                        
                                <select class="custom-select" id="inputGroupSelect04" name="country">
                                    <option selected disabled>{{auth()->user()->country}}</option>
                                    <option value="Aguascalientes">Aguascalientes</option>
                                    <option value="Baja California">Baja California</option>
                                    <option value="Baja California Sur">Baja California Sur</option>
                                    <option value="Campeche">Campeche</option>
                                    <option value="Chiapas">Chiapas</option>
                                    <option value="Chihuahua">Chihuahua</option>
                                    <option value="CDMX">Ciudad de México</option>
                                    <option value="Coahuila">Coahuila</option>
                                    <option value="Colima">Colima</option>
                                    <option value="Durango">Durango</option>
                                    <option value="Estado de México">Estado de México</option>
                                    <option value="Guanajuato">Guanajuato</option>
                                    <option value="Guerrero">Guerrero</option>
                                    <option value="Hidalgo">Hidalgo</option>
                                    <option value="Jalisco">Jalisco</option>
                                    <option value="Michoacán">Michoacán</option>
                                    <option value="Morelos">Morelos</option>
                                    <option value="Nayarit">Nayarit</option>
                                    <option value="Nuevo León">Nuevo León</option>
                                    <option value="Oaxaca">Oaxaca</option>
                                    <option value="Puebla">Puebla</option>
                                    <option value="Querétaro">Querétaro</option>
                                    <option value="Quintana Roo">Quintana Roo</option>
                                    <option value="San Luis Potosí">San Luis Potosí</option>
                                    <option value="Sinaloa">Sinaloa</option>
                                    <option value="Sonora">Sonora</option>
                                    <option value="Tabasco">Tabasco</option>
                                    <option value="Tamaulipas">Tamaulipas</option>
                                    <option value="Tlaxcala">Tlaxcala</option>
                                    <option value="Veracruz">Veracruz</option>
                                    <option value="Yucatán">Yucatán</option>
                                    <option value="Zacatecas">Zacatecas</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="form-control-label" for="input-name">{{ __('Gender') }}</label>
                            <div class="input-group right">
                                <select class="custom-select" id="inputGroupSelect04" name="gender">
                                    <option selected disabled>{{__(auth()->user()->gender)}}</option>
                                    @if(auth()->user()->gender == 'Men')
                                        <option value="Woman">@lang('Woman')</option>
                                    @else
                                        <option value="Men">@lang('Men')</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">{{ __('Phone') }}</label>
                            <input type="text" name="phone" id="input-phone" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('phone') }}" value="{{ old('name', auth()->user()->phone) }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-password">{{ __('New Password') }}</label>
                            <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" value="">
                            
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div> 
                    
                    <div class="text-center">
                        <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                    </div>
                </form>
            </div> 
        </div> 
    </div>
    
    
    <div class="modal fade" id="avatar" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modalSize">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" >@lang('Arrastre la nueva imagen de perfil')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <center>
                        <form role="form" method="POST" action="{{ route('uploadUserAvatar') }}" enctype="multipart/form-data">
                            @csrf
                                
                                <input type="hidden" name="id" value="{{ auth()->user()->id }}" id="userId">
                                @if(auth()->user()->avatar == NULL)
                                    <div class="drag-area rounded-circle" id= "drag" name="drag" style=" background-image: url({{ asset('argon') }}/img/theme/perfile.jpg); background-size: cover;">
                                        
                                        <h3 id="textG1" name = "textG1" class="tg"> Arrastre y suelte su archivo </h3>
                                        
                                    </div>
                                @else
                                    <div class="drag-area rounded-circle" id= "drag" name="drag" style=" background-image: url('data:image/png;base64, {{auth()->user()->avatar}}'); background-size: cover;">
                                        
                                        <h3 id="textG1" name = "textG1" class="tg"> Arrastre y suelte su archivo </h3>
                                        
                                    </div>
                                @endif
                                <div id = "preview" name = "preview"></div>
                        </form>
                    </center>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('Close')</button>
                </div>
            </div>
        </div>
    </div>
<!--
    <div class="fondo">
        <div class="">
            <div class="">
                
            </div>
            <div class="" style=" width: 100%;">
                <div class="card bg-secondary shadow" style=" width: 100%;">
                    <div class="card-header bg-white border-0" style=" width: 100%;">
                        <div class=" align-items-center">
                            <h3 class="mb-0">{{ __('Edit Profile') }}</h3>
                        </div>
                    </div>
                    @if(Session::has('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card-body" >
                        <form method="post" action="{{route('user.update', auth()->user()->id)}}" autocomplete="on">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>
                            
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif


                            <div class="">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Surname') }}</label>
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-name-83"></i></span>
                                        </div>
                                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Surname') }}" type="text" name="surname" value="{{ old('name', auth()->user()->surname) }}" required>
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <label class="form-control-label" for="input-name">{{ __('Second surname') }}</label>
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-name-83"></i></span>
                                        </div>
                                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Second surname') }}" type="text" name="second_surname" value="{{ old('name', auth()->user()->second_surname) }}" required>
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <label class="form-control-label" for="input-name">{{ __('Country') }}</label>
                                <div class="input-group right">
                                    <select class="custom-select" id="inputGroupSelect04" name="country">
                                        <option selected disabled>{{auth()->user()->country}}</option>
                                        <option value="Aguascalientes">Aguascalientes</option>
                                        <option value="Baja California">Baja California</option>
                                        <option value="Baja California Sur">Baja California Sur</option>
                                        <option value="Campeche">Campeche</option>
                                        <option value="Chiapas">Chiapas</option>
                                        <option value="Chihuahua">Chihuahua</option>
                                        <option value="CDMX">Ciudad de México</option>
                                        <option value="Coahuila">Coahuila</option>
                                        <option value="Colima">Colima</option>
                                        <option value="Durango">Durango</option>
                                        <option value="Estado de México">Estado de México</option>
                                        <option value="Guanajuato">Guanajuato</option>
                                        <option value="Guerrero">Guerrero</option>
                                        <option value="Hidalgo">Hidalgo</option>
                                        <option value="Jalisco">Jalisco</option>
                                        <option value="Michoacán">Michoacán</option>
                                        <option value="Morelos">Morelos</option>
                                        <option value="Nayarit">Nayarit</option>
                                        <option value="Nuevo León">Nuevo León</option>
                                        <option value="Oaxaca">Oaxaca</option>
                                        <option value="Puebla">Puebla</option>
                                        <option value="Querétaro">Querétaro</option>
                                        <option value="Quintana Roo">Quintana Roo</option>
                                        <option value="San Luis Potosí">San Luis Potosí</option>
                                        <option value="Sinaloa">Sinaloa</option>
                                        <option value="Sonora">Sonora</option>
                                        <option value="Tabasco">Tabasco</option>
                                        <option value="Tamaulipas">Tamaulipas</option>
                                        <option value="Tlaxcala">Tlaxcala</option>
                                        <option value="Veracruz">Veracruz</option>
                                        <option value="Yucatán">Yucatán</option>
                                        <option value="Zacatecas">Zacatecas</option>
                                    </select>
                                </div>
                                <br>

                                <label class="form-control-label" for="input-name">{{ __('Gender') }}</label>
                                <div class="input-group right">
                                    <select class="custom-select" id="inputGroupSelect04" name="gender">
                                        <option selected disabled>{{__(auth()->user()->gender)}}</option>
                                        @if(auth()->user()->gender == 'Men')
                                            <option value="Woman">@lang('Woman')</option>
                                        @else
                                            <option value="Men">@lang('Men')</option>
                                        @endif
                                    </select>
                                </div>
                                <br>
                                <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Phone') }}</label>
                                    <input type="text" name="phone" id="input-phone" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('phone') }}" value="{{ old('name', auth()->user()->phone) }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <!
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                                ->
                            
                        <!</form>->
                        <hr class="my-4" />

                        <!-<form method="post" action="{}" autocomplete="off">->

                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-password">{{ __('New Password') }}</label>
                                    <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" value="">
                                    
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
       
    </div>
-->
    @include('layouts.footers.auth')

    <script>
        

        userid = input = document.getElementById("userId").value;
        dropArea = document.getElementById("drag");
        dragText = document.getElementById("textG1");
        

        
        
        
        let files;

        function uploadFile(file, id){
            formData = new FormData();
            formData.append("avatar", file);
            formData.append("user_id", userid);
            formData.append("_token", $('input[name="_token"]').val());
            console.log("en carga");
            //console.log(fileUrl);
           // console.log(fail);
            try {
                $.ajax({
                        url: '/uploadUserAvatar',
                        method: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,  
                        
                    }).done(function(res){
                        console.log("hecho si paso el post" );
                        fileReader.readAsDataURL(file);

                        fileReader.addEventListener('load', function(e){
                            fileUrl = fileReader.result;
                            document.getElementById("myImageId").src= `${fileUrl}`;
                            dropArea.style.backgroundImage = `url('${fileUrl}')`;
                            document.getElementById(
                                `${id}st`
                            ).innerHTML= '<span class="succes">Archivo subido corectamente...</span>';
                        });
                        
                        
                        
                    }).fail(function(error) {
                        console.log( error );
                    });
            } catch (error) {
                console.log($('input[name="_token"]').val());
                console.log(error);
            }
        }
        
        



        function processFile(file){
            var urlfile = null;
            docType = file[0].type
            console.log(docType)
            validExtension = ['image/jpeg', 'image/jpg', 'image/png']

            if(validExtension.includes(docType)){
                //archivo valido
                fileReader = new FileReader();
                id = `file-${Math.random().toString(32).substring(7)}`;

                fileReader.addEventListener('load', function(e){
                    e.preventDefault();
                    fileUrl = fileReader.result;
                    urlfile = `${fileUrl}`;
                    console.log("ennnn eventooooooooooooooooooooooooooooo");
                    //console.log("ennnn eventooooooooooooooooooooooooooooo",urlfile);
                    
                    image = `
                        <div id="${id}" class = "file-container">
                            <img src="${fileUrl}" alt="${file[0].name}" width= "50">
                            <div class="status">
                                
                                <span>${file[0].name}</span>
                                <span  id="${id}st" name = "${id}st" class="status-text"> Loading ...
                                </span>
                            </div>
                        </div>
                    `;
                    html = document.getElementById("preview").innerHTML;
                    document.getElementById("preview").innerHTML = image;
                });
                console.log("pocesandoooooo");
                console.log("pocesandoooooo",urlfile);
                fileReader.readAsDataURL(file[0]);
                
                //console.log("despues eventooo",urlfile);
                uploadFile(file[0], id);
                
            }else{
                alert("No es un archivo valido");
            }
        }

        

        dropArea.addEventListener("dragover", function(e) {
            
            e.preventDefault();
            
            dropArea.classList.add("active");
            dragText.textContent = "Suelte para subir archivos";

        });

        dropArea.addEventListener("dragleave", function(e)  {
           
            e.preventDefault();
            
            dropArea.classList.remove("active");
            dragText.textContent = "Arrastre y suelte su archivo";
        });

        dropArea.addEventListener("drop", function(e)  {
            e.preventDefault();
           
            files = e.dataTransfer.files;
            console.log(files);
            processFile(files);
            dropArea.classList.remove("active");
            dragText.textContent = "Arrastre y suelte su archivo";
        });

        


    </script>
@endsection

