@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('layouts.headers.page') 
<style>

   
    .buttons{
            
            font-size: 140%;
            
        }
        .row{
            width: 99%;
            display: flex;
            grid-template-columns: repeat(3, auto);
            padding: 0 40px;
            gap: 0px;
            align-items: center;
        }
        @media only screen and (max-width: 893px) {
            .textoaD {
                display: none;
            }
            .iconoD {
                margin-right:10px;
            }
        }

        @media only screen and (min-width: 892px) {
            .iconoD {
                display: none;
            }
        }
        button{
            text-align: center;
        }

    .columna{
        width: 20%;
        height: 100%;
        
        background: transparent; 
       
        
    }
    
    .tablelist2{
        width: 100%
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
        
        margin-top: 2%;
        display: ;
        
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











<div class="" style=" ">
    <div class= "fondo" >
        <div class="text-right">
            <a href="{{route('contacts.create')}}" class="btn btn-sm btn-primary buttons" style="font-size: 15px;  margin-right: 2%;">@lang('Agregar contacto')</a>
        </div>
        @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
            <h1 class="preciosL">Contactos</h1>
            <div class="card shadow">
                
            </div>


            <div class="table-responsive" style="width: 100%">
                    <table id="tablelistTenantsPayments" class="table align-items-center table-flush" style="">

                        <thead class="thead-light" >
                            <tr >
                                <th scope="col" style="font-size: 13px;">@lang('Alias')</th>
                                <th scope="col"style="font-size: 13px;">@lang('Nombre')</th>
                                <th scope="col" style="font-size: 13px;">@lang('Correo electronico')</th>
                                <th scope="col" style="font-size: 13px;">@lang('Cuenta clave')</th>
                                <th scope="col" style="font-size: 13px;">@lang('Acciones')</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contacts as $contact)
                                <tr>
                                    <td style="font-size: 13px;">{{$contact->alias}}</td>
                                    <td style="font-size: 13px;">{{$contact->fullname}}</td>
                                    <td style="font-size: 13px;">{{$contact->email}}</td>
                                    <td style="font-size: 13px;">{{$contact->key_account}}</td>
                                    <td  style="font-size: 13px;" class="text-right">
                                        
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-primary btnI" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="{{ route('contacts.edit', $contact->id) }}">{{__('Edit')}}</a>
                                                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" class="dropdown-item" value="{{__('Delete')}}">
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>


                                

                                
                            @endforeach
                        </tbody>
                    </table>
                </div>

        
        
    </div>
    
</div>

@include('layouts.footers.auth')

@endsection
