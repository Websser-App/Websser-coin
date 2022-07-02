@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('layouts.headers.page') 
<style>
    .paquetes{
        border-radius: 20px;
        width: 30%;
        margin-left: 5px;
        margin-right: 5px;
        background: linear-gradient(to  right bottom, #5e6afb, #c2e8fe);
       
        
    }
    .contenedor{
        
        text-align: center;
        margin-top: 5%;
        width: 1000px;
    }
    .precios{
        background: linear-gradient(to bottom  right, #fe00d1, #fe00d1);
        border-radius: 20px 20px 0px 0px;
        border-bottom: 1px solid #a7b3af;
    }
    .contenerdor2{
        display: flex;
        justify-content: space-between;
        
    }
    .descripcion{
        background-color: ;  
        
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
    .precios2{
        
        justify-content: right;
        position: relative;
        
        font-size: 300%;
    }
    .buttonPay{
        border-radius: 10px;
        background-color: transparent;
        color: white;
        border: 2px solid #0bf12c;
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
                        <h2>Principiante</h2>
                        <div class="row">
                            <div class = "col"><h3 class="columna">$</h3></div>
                            <div class = "col"></div>
                            <div class = "col"></div>
                        </div>
                        <div class="row">
                            <div class = "col"></div>
                            <div class = "col"><h1 class="precios2">5</h1></div>
                            <div class = "col"></div>
                        </div>
                        <div class="row">
                            <button class="buttonPay">Elegir</button>
                        </div>
                    </div>
                    <div class="descripcion">
                        <h3>descipcion de plan</h3>
                        <h3>descipcion de plan</h3>
                    </div>
                </div>
                <div class="paquetes">
                    <div class= "precios">
                        <h2>Profesional</h2>
                        <div class="row">
                            <div class = "col"><h3 class="columna">$</h3></div>
                            <div class = "col"></div>
                            <div class = "col"></div>
                        </div>
                        <div class="row">
                            <div class = "col"></div>
                            <div class = "col"><h1 class="precios2">50</h1></div>
                            <div class = "col"></div>
                        </div>
                        <div class="row">
                            <button class="buttonPay">Elegir</button>
                        </div>
                        
                    </div>
                        <div class="descripcion">
                        <h3>descipcion de plan</h3>
                        <h3>descipcion de plan</h3>
                        <h3>descipcion de plan</h3>
                    </div>
                </div>
                <div class="paquetes">
                    <div class= "precios">
                        <h2>VIP</h2>
                        <div class="row">
                            <div class = "col"><h3 class="columna">$</h3></div>
                            <div class = "col"></div>
                            <div class = "col"></div>
                        </div>
                        <div class="row">
                            <div class = "col"></div>
                            <div class = "col"><h1 class="precios2">100</h1></div>
                            <div class = "col"></div>
                        </div>
                        <div class="row">
                            <button class="buttonPay">Elegir</button>
                        </div>
                    </div>
                        <div class="descripcion">
                            <h3>descipcion de plan</h3>
                            <h3>descipcion de plan</h3>
                            <h3>descipcion de plan</h3>
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
