@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('layouts.headers.page') 
<style>

   
    

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
        <div class="text-right">
            <a href="#" class="btn btn-sm btn-primary buttons" style="font-size: 15px; margin-top: 2%; margin-bottom: 2%; margin-right: 2%;">@lang('Agregar contacto')</a>
        </div>
        <h1 class="preciosL">Contactos</h1>
            <div class="">
                <div class="table-responsive">
                    <table id="tablelist" class="table align-items-center table-flush" >

                        <thead class="thead-light" >
                            <tr class= "letras">
                                <th scope="col" style="font-size: 15px;">@lang('Alias')</th>
                                <th scope="col"style="font-size: 15px;">@lang('Nombre y apellidos')</th>
                                {{-- <th scope="col" style="font-size: 15px;">@lang('E-mail')</th> --}}
                                <th scope="col" style="font-size: 15px;">@lang('Cuarto?')</th>
                                <th scope="col" style="font-size: 15px;">@lang('Invisible?')</th>
                                <th scope="col" style="font-size: 15px;">@lang('')</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach($buildings as $building)
                                <tr>
                                    <td style="font-size: 15px;">{{$building->UUID}}</td>
                                    @if($building->type_building == 'vertical')
                                        <td style="font-size: 15px;">{{__('Vertical')}}</td>
                                    @elseif($building->type_building == 'horizontal') 
                                        <td style="font-size: 15px;">{{__('Horizontal')}}</td>
                                    @endif
                                    {{-- <td style="font-size: 15px;">{{$building->address}}</td> --}}
                                    <td style="font-size: 15px;">{{$building->rows}}</td>
                                    <td style="font-size: 15px;">{{$building->columns}}</td>
                                    <td class="text-right">
                                        
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-primary btnI" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="{{ route('building.edit', $building->id) }}">{{__('Edit')}}</a>
                                                <form action="{{ route('building.destroy', $building->id) }}" method="POST">
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
</div>
@endsection
