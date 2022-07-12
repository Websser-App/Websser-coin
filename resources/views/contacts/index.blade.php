@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('layouts.headers.page') 
<style>

    @media only screen and (max-width: 520px) {
        .contenerdor2 {
            display: block flow;
        }
    }



    .precios3{
        
        background: linear-gradient(to  right, #27055e, #673499);
        border-radius: 20px 20px 0px 0px;
        border-bottom: 1px solid white;
    }

    .preciosL3{
        
        font-weight: bold;
        color: #27055e;
        
        font-size: 300%;
    }

    .descripcion3{
        position: ;
        background: linear-gradient(to  right, #27055e, #673499);  
        bottom: 100%;
        
    }

    .buttonPay3{
        font-size: 150%;
        font-weight: bold;
        border-radius: 10px;
        background-color: transparent;
        color: #254495;
        border: 2px solid #673499;
        margin-bottom: 5%;
        
    }




    .precios2{
        
        background: linear-gradient(to  right, #254495, #52a9dd);
        border-radius: 20px 20px 0px 0px;
        border-bottom: 1px solid white;
    }

    .preciosL2{
        
        font-weight: bold;
        color: #254495;
        
        font-size: 300%;
    }

    .descripcion2{
        position: ;
        background: linear-gradient(to  right, #254495, #52a9dd);  
        bottom: 100%;
        
    }

    .buttonPay2{
        font-size: 150%;
        font-weight: bold;
        border-radius: 10px;
        background-color: transparent;
        color: #254495;
        border: 2px solid #254495;
        margin-bottom: 5%;
        
    }

    .paquetes{
        border-radius: 20px;
        width: 100%;
        margin-left: 5px;
        margin-right: 5px;
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
    h2{
        color: white;
    }
    h1{
        color: white;
    }
    h3{
        color: white;
    }
    .contenerdor2{
        display: grid;
        gap: 1rem;
        grid-auto-rows: 22rem;
        grid-template-columns: repeat(auto-fill, minmax(15rem, 1fr));
        
    }
    .descripcion{
        position: ;
        background: linear-gradient(to  right, #87028e, #d9427d);  
        bottom: 100%;
        
    }
    .fondo{
        
        margin: 20px;
        display: flex;
        justify-content: center;
        background-color: white;
        border-radius: 20px;
    }
    .columna{
        justify-content: right;
        position: absolute;
        right: 0%;
    }
    .preciosL{
        
        font-weight: bold;
        color: #87028e;
        
        font-size: 300%;
    }
    .buttonPay{
        font-size: 150%;
        font-weight: bold;
        border-radius: 10px;
        background-color: transparent;
        color: #87028e;
        border: 2px solid #87028e;
        margin-bottom: 5%;
        
    }
</style>
<div class="container" style=" ">
    <div class= "fondo" >
        <div class="contenedor" >
            <h1 style= "color: #000; margin-bottom: 5%; font-size: 50px; font-family: serif;">Elige tu plan de precios</h1>
            <div  class="contenerdor2">
                
                <div class="paquetes">
                    <div class= "precios">
                       
                        <div class="row">
                            <div class = "col"><h3 class="columna"></h3></div>
                            <div class = "col"></div>
                            <div class = "col"></div>
                        </div>
                        <div class="row">
                            <div class = "col"></div>
                            <div class = "col"><h1 class=""> <h2>Principiante</h2></div>
                            <div class = "col"></div>
                        </div>
                        <div class="row">
                            
                        </div>
                    </div>
                    <h3 class="black">Precio</h3>
                    <h1 class="preciosL">$509</h1>
                    <button class="buttonPay">Elegir</button>

                    <div class="descripcion">
                        <h3>descipcion de plan</h3>
                    
                    </div>
                </div>
                <div class="paquetes">
                    <div class= "precios2">
                        
                        <div class="row">
                            <div class = "col"><h3 class="columna"></h3></div>
                            <div class = "col"></div>
                            <div class = "col"></div>
                        </div>
                        <div class="row">
                            <div class = "col"></div>
                            <div class = "col"><h1 class=""> <h2>Profesional</h2></div>
                            <div class = "col"></div>
                        </div>
                        <div class="row">
                            
                        </div>
                        
                    </div>
                    <h3 class="black">Precio</h3>
                    <h1 class="preciosL2">$599</h1>
                    <button class="buttonPay2">Elegir</button>

                    <div class="descripcion2">
                        <h3>descipcion de plan</h3>
                        
                    </div>
                </div>
                <div class="paquetes">
                    <div class= "precios3">
                        
                        <div class="row">
                            <div class = "col"><h3 class="columna"></h3></div>
                            <div class = "col"></div>
                            <div class = "col"></div>
                        </div>
                        <div class="row">
                            <div class = "col"></div>
                            <div class = "col"><h1 class=""> <h2>VIP</h2></div>
                            <div class = "col"></div>
                        </div>
                        <div class="row">
                            
                        </div>
                        
                    </div>
                    <h3 class="black">Precio</h3>
                    <h1 class="preciosL3">$799</h1>
                    <button class="buttonPay2">Elegir</button>

                    <div class="descripcion3">
                        <h3>descipcion de plan</h3>
                        
                    </div>
                </div>
            </div>

        </div>
        <!--<div class="" style="margin-top: 10%;"> background: linear-gradient(to bottom  right, #31374a, #67a8ad);  ffede4
            <div class ="col" style = "  ">   67a8ad
                <h1 style= "color: #000; margin-bottom: 5%;">Elige tu plan de precios</h1>
            </div>
        </div>
        <div class="" style="vertical-align: top; justify-content: between; display: inline" >   
            <div class="">
                <div class= "" style=" border: 1px solid #a7b3af;width: 20%; display: inline;">
                    <div class="" style="background-color: #ffc1a3 ">
                        <h2>Principiante</h2>
                    </div>
                    <div class="">
                        <h3>descipcion de plan</h3>
                    </div>
                </div>
            </div>
            <div class="">
                <div class= "" style=" border: 1px solid #a7b3af; width: 20%;">
                    <div class="" style="background-color: #ffc1a3">
                        <h2>Profesional</h2>
                    </div>
                    <div class="" style=" ">
                        <h3>descipcion de plan</h3>
                    </div>
                </div>
            </div>
            <div class="">
                <div class= "" style=" border: 1px solid #a7b3af; width: 20%;">
                    <div class="" style="background-color: #ffc1a3">
                        <h2>VIP</h2>
                    </div>
                    <div class="">
                        <h3>descipcion de plan</h3>
                    </div>
                    <div class="">
                        <h3>descipcion de plan</h3>
                    </div>
                    <div class="">
                        <h3>descipcion de plan</h3>
                    </div>
                    <div class="">
                        <h3>descipcion de plan</h3>
                    </div>
                </div>
            </div>
        </div>
        -->
    </div>
    @include('layouts.footers.auth')
</div>
@endsection
