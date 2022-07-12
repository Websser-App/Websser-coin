<style>
        input[type=file]{
            width:90px;
            color:transparent;
            display: block;
        }
        input[type=file] button{
            
            color:#5256ad;
            display: block;
        }
        .pugaso{
            border: 5px dashed #ddd;
        }
        .drag-area{
            
            border: 5px dashed #ddd;
            
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
            padding:5px 25px;
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


    </style>

<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href= "https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type = "text/css"/>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

@extends('layouts.app')

@section('content')
    @include('layouts.headers.guest')

    <div class="container mt--4 pb-5">
        <!-- Table -->
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card bg-secondary shadow border-0">
                    <div class="text-muted text-center mt-2 mb-4"><small>{{ __('Complete your registration') }}</small></div>
                    <div class="card-body px-lg-5 py-lg-5">
                        <center>
                            <a class="navbar-brand" href="{{ route('inicio') }}">
                                <img height="80px" width="80px" src="{{ asset('argon') }}/img/brand/blue.png" />
                            </a>
                        </center>

                        @if(Session::has('message'))
                            <br><div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ Session::get('message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <br>
                        @if($user->email == NULL && $user->password == NULL)
                            <form role="form" method="POST" action="{{ route('completedRegister') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $user->id }}">
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') }}" required>
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" type="password" name="password" required>
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="{{ __('Confirm Password') }}" type="password" name="password_confirmation" required>
                                    </div>
                                </div>
                                <div class="text-muted font-italic">
                                    <small>{{ __('password strength') }}: <span class="text-success font-weight-700">{{ __('strong') }}strong</span></small>
                                </div>
                                <div class="row my-4">
                                    <div class="col-12">
                                        <div class="custom-control custom-control-alternative custom-checkbox">
                                            <input class="custom-control-input" id="customCheckRegister" type="checkbox">
                                            <label class="custom-control-label" for="customCheckRegister">
                                                <span class="text-muted">{{ __('I agree with the') }} <a href="#!">{{ __('Privacy Policy') }}</a></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary mt-4">{{ __('Complete registration') }}</button>
                                </div>
                            </form>
                        @elseif($user->name == null && $user->surname == null && $user->second_surname == null && $user->country == null && $user->gender == null)
                            <form role="form" method="POST" action="{{ route('completedRegister') }}">
                                @csrf
                                

                                <input type="hidden" name="id" value="{{ $user->id }}">

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-name-83"></i></span>
                                        </div>
                                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" type="text" name="name" value="{{ old('name') }}" required>
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-name-83"></i></span>
                                        </div>
                                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Surname') }}" type="text" name="surname" value="{{ old('name') }}" required>
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-name-83"></i></span>
                                        </div>
                                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Second surname') }}" type="text" name="second_surname" value="{{ old('name') }}" required>
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-name-83"></i></span>
                                        </div>
                                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Country') }}" type="text" name="country" value="{{ old('name') }}" required>
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-name-83"></i></span>
                                        </div>
                                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Gender') }}" type="text" name="gender" value="{{ old('name') }}" required>
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary mt-4">{{ __('Complete registration') }}</button>
                                </div>
                            </form>
                        @elseif($user->ine_front == null && $user->ine_back == null)
                            <!-- forma pugaso--->
                            
                                <form role="form" method="POST" action="{{ route('ajaxIneBackUploadPost') }}" enctype="multipart/form-data">
                                    @csrf
                                        @lang('INE image in front')
                                        <input type="hidden" name="id" value="{{ $user->id }}" id="userId">
                                        <div class="drag-area" id= "drag" name="drag">
                                            
                                            <h3 id="textG1" name = "textG1" class="tg"> Arrastre y suelte su archivo </h3>
                                            
                                        </div>
                                        <div id = "preview" name = "preview"></div>
                                </form>

                                <form role="form" method="POST" action="{{ route('ajaxIneBackUploadPost') }}" enctype="multipart/form-data">
                                    @csrf
                                        @lang('INE image in back')
                                        
                                        <div class="drag-area" id= "drag2" name="drag2">
                                            <h3 id="textG2" name = "textG2"  class="tg"> Arrastre y suelte su archivo </h3>
                                            
                                        </div>
                                        <div id = "preview2" name = "preview2"></div>
                                </form>



                                <form role="form" method="POST" action="{{ route('ajaxIneBackUploadPost') }}" enctype="multipart/form-data">
                                    @csrf
                                        @lang('Certificate image (Optional)')
                                        
                                        <div class="drag-area" id= "drag3" name="drag3">
                                            <h3 id="textG3" name = "textG3"  class="tg"> Arrastre y suelte su archivo </h3>
                                            
                                        </div>
                                        <div id = "preview3" name = "preview3"></div>
                                </form>
                                <center>
                                    <a href="{{route('completeImagen', $user->id)}}" class="btn btn-primary mt-4">
                                        {{ __('Complete registration') }}
                                    </a>
                                </center>

                            <!--
                            <form role="form" method="POST" action="{{ route('completedRegister') }}" enctype="multipart/form-data">
                                @csrf
                                

                                <input type="hidden" name="id" value="{{ $user->id }}">

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    @lang('INE image in front')
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-name-83"></i></span>
                                        </div>
                                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('INE image in front') }}" type="file" name="ine_front" value="{{ old('name') }}" required>
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    @lang('INE image in back')
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-name-83"></i></span>
                                        </div>
                                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('INE image in back') }}" type="file" name="ine_back" value="{{ old('name') }}" required>
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    @lang('Certificate image (Optional)')
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-name-83"></i></span>
                                        </div>
                                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Certificate image (Optional)') }}" type="file" name="certificate" value="{{ old('name') }}">
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                               
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary mt-4">{{ __('Complete registration') }}</button>
                                </div>
                            </form>
                            -->
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        button = document.querySelector(".button");

        userid = input = document.getElementById("userId").value;
        dropArea = document.getElementById("drag");
        dragText = document.getElementById("textG1");
        

        
        dropArea2 = document.getElementById("drag2");
        dragText2 = document.getElementById("textG2");
        
        
        
        
        let files;

        function uploadFile(file, id){
            formData = new FormData();
            formData.append("ine_front", file);
            formData.append("user_id", userid);
            formData.append("_token", $('input[name="_token"]').val());

            console.log("debe pasar aquiiiiiiiiiiiiiiiiiiiiii");
            console.log("formssaspppp ", file);
            console.log("despues ");

            try {
                $.ajax({
                        url: '/ajaxIneFrontUploadPost',
                        method: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,  
                        
                    }).done(function(res){
                        console.log("hecho si paso el post" )
                        document.getElementById(
                            `${id}st`
                        ).innerHTML= '<span class="succes">Archivo subido corectamente...</span>';
                    }).fail(function(error) {
                        console.log( error );
                    });
            } catch (error) {
                console.log($('input[name="_token"]').val());
                console.log(error);
            }
        }
        
        



        function processFile(file){
            
            docType = file[0].type
            console.log(docType)
            validExtension = ['image/jpeg', 'image/jpg', 'image/png']

            if(validExtension.includes(docType)){
                //archivo valido
                fileReader = new FileReader();
                id = `file-${Math.random().toString(32).substring(7)}`;

                fileReader.addEventListener('load', function(e){
                    fileUrl = fileReader.result;
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
                fileReader.readAsDataURL(file[0]);
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

        






        function uploadFile2(file, id){
            formData = new FormData();
            formData.append("ine_back", file);
            formData.append("user_id", userid);
            formData.append("_token", $('input[name="_token"]').val());

            console.log($('input[name="_token"]').val());
            console.log("formssaspppp ", file);
            console.log("despues ");

            try {
                $.ajax({
                        url: '/ajaxIneBackUploadPost',
                        method: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,  
                        
                    }).done(function(res){
                        console.log("hecho si paso el post" )
                        document.getElementById(
                            `${id}st`
                        ).innerHTML= '<span class="succes">Archivo subido corectamente...</span>';
                    }).fail(function(error) {
                        console.log( error );
                    });
            } catch (error) {
                console.log($('input[name="_token"]').val());
                console.log(error);
            }
        }
        
       



        function processFile2(file){
            
            docType = file[0].type
            console.log(docType)
            validExtension = ['image/jpeg', 'image/jpg', 'image/png']

            if(validExtension.includes(docType)){
                //archivo valido
                fileReader = new FileReader();
                id = `file-${Math.random().toString(32).substring(7)}`;

                fileReader.addEventListener('load', function(e){
                    fileUrl = fileReader.result;
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
                    html = document.getElementById("preview2").innerHTML;
                    document.getElementById("preview2").innerHTML = image;
                });

                fileReader.readAsDataURL(file[0]);
                uploadFile2(file[0], id);
                
            }else{
                alert("No es un archivo valido");
            }
        }

        

        dropArea2.addEventListener("dragover", function(e) {
            
            e.preventDefault();
            
            dropArea2.classList.add("active");
            dragText2.textContent = "Suelte para subir archivos";

        });

        dropArea2.addEventListener("dragleave", function(e)  {
           
            e.preventDefault();
            
            dropArea2.classList.remove("active");
            dragText2.textContent = "Arrastre y suelte su archivo";
        });

        dropArea2.addEventListener("drop", function(e)  {
            e.preventDefault();
           
            files = e.dataTransfer.files;
            console.log(files);
            processFile2(files);
            dropArea2.classList.remove("active");
            dragText2.textContent = "Arrastre y suelte su archivo";
        });



        dropArea3 = document.getElementById("drag3");
        dragText3 = document.getElementById("textG3");
       


        function uploadFile3(file, id){
            formData = new FormData();
            formData.append("certificate", file);
            formData.append("user_id", userid);
            formData.append("_token", $('input[name="_token"]').val());

            console.log($('input[name="_token"]').val());
            console.log("formssaspppp ", file);
            console.log("despues ");

            try {
                $.ajax({
                        url: '/ajaxCertificateUploadPost',
                        method: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,  
                        
                    }).done(function(res){
                        console.log("hecho si paso el post" )
                        document.getElementById(
                            `${id}st`
                        ).innerHTML= '<span class="succes">Archivo subido corectamente...</span>';
                    }).fail(function(error) {
                        console.log( error );
                    });
            } catch (error) {
                console.log($('input[name="_token"]').val());
                console.log(error);
            }
        }
        
        



        function processFile3(file){
            
            docType = file[0].type
            console.log(docType)
            validExtension = ['image/jpeg', 'image/jpg', 'image/png']

            if(validExtension.includes(docType)){
                //archivo valido
                fileReader = new FileReader();
                id = `file-${Math.random().toString(32).substring(7)}`;

                fileReader.addEventListener('load', function(e){
                    fileUrl = fileReader.result;
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
                    document.getElementById("preview3").innerHTML = image;
                });

                fileReader.readAsDataURL(file[0]);
                uploadFile3(file[0], id);
                
            }else{
                alert("No es un archivo valido");
            }
        }

        

        dropArea3.addEventListener("dragover", function(e) {
            
            e.preventDefault();
            
            dropArea3.classList.add("active");
            dragText3.textContent = "Suelte para subir archivos";

        });

        dropArea3.addEventListener("dragleave", function(e)  {
           
            e.preventDefault();
            
            dropArea3.classList.remove("active");
            dragText3.textContent = "Arrastre y suelte su archivo";
        });

        dropArea3.addEventListener("drop", function(e)  {
            e.preventDefault();
           
            files = e.dataTransfer.files;
            console.log(files);
            processFile3(files);
            dropArea3.classList.remove("active");
            dragText3.textContent = "Arrastre y suelte su archivo";
        });


    </script>
@endsection
