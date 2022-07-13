@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('layouts.headers.page') 

    <style>

   
    

.columna{
    width: 20%;
    height: 100%;
    
    background: transparent; 
   
    
}


.contenedor{
    
    text-align: center;
    margin-top: 5%;
    width: 1000px;
}
.precios{
    
    background: linear-gradient(to  right, #87028e, #d9427d);
    border-radius: 20px 20px 0px 0px;
    border-bottom: 1px solid white;
}
.black{
    color:black;
}
input{
    margin-bottom: 3%;
}

.contenerdor2{
    display: grid;
    gap: 1rem;
    grid-auto-rows: 7rem;
    grid-template-columns: repeat(auto-fit, minmax(15rem, 1fr));
    
}
.descripcion{
    position: ;
    background: linear-gradient(to  right, #87028e, #d9427d);  
    bottom: 100%;
    
}
.fondo{
    
    margin: 20px;
    display: block;
    
    background-color: white;
    border-radius: 20px;
}
.preciosL{
    margin-left: 3%;
    font-weight: bold;
    color: black;
    font-size: 200%;
}
.buttonCancel{
    font-size: 150%;
    font-weight: bold;
    border-radius: 10px;
    background-color: transparent;
    color: #8b8ead;
    border: 2px solid #8b8ead;
    margin-bottom: 5%;
    width: 70%;
    
}
</style>
<div class="container" style=" ">
<div class= "fondo" >
    <h1 class="preciosL">Editar Contacto</h1>
    
        <form class="row g-3" method="post" action="{{route('contacts.update', $contacts->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')    
            <div class= "contenerdor2" >
                <div class="col">
                    
                    <input type="text" class="form-control" id="fullname" value="{{$contacts->fullname}}" name="fullname" placeholder="Nombre(s) y apellidos (Obligatorio)*" required>
                    <input type="text" class="form-control" id="email" value="{{$contacts->email}}" name="email" placeholder="Correo electronico (Opcional)" >
                </div>

                <div class="col">
                    
                    <input type="text" class="form-control" id="alias" value="{{$contacts->alias}}" name="alias" placeholder="Alias (Opcional)" >
                    <input type="text" class="form-control" id="key_account" value="{{$contacts->key_account}}" name="key_account" placeholder="Cuenta CLABE (Obligatoria)*" required>
                </div>
            </div>
            <div class="text-center">
                
                    <button type="submit" class="btn btn-success mt-4 buttonCancel">{{ __('Save') }}</button>
                
            </div>
        </form>
    
</div>
@include('layouts.footers.auth')
</div>
@endsection
