<style>
    .centrar{
        justify-content: center;
        text-align:center;
    }
    .paquetes{
        border-radius: 20px;
        width: 100%;
        margin-left: 5px;
        margin-right: 5px;
        background-color: transparent;
       
        
    }
    .contenedor{
        
        text-align: center;
        margin-top: 5%;
        width: 1100px;
    }
    .precios{
        background-color: white;
        border-radius: 20px 20px 20px 20px;
        border-bottom: 1px solid #a7b3af;
    }
    .contenerdor2{
        display: grid;
        gap: 1rem;
        grid-auto-rows: 22rem;
        grid-template-columns: repeat(auto-fill, minmax(15rem, 1fr));
        
    }
    .descripcion{
        background-color: ;  
        
    }
    .fondo{
        
        margin: 20px;
        display: flex;
        justify-content: center;
        background-color: transparent;
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

<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container">
        <div class="header-body">
<div class="container" style=" ">
    <div class= "fondo" >
        <div class="contenedor" >
            
            <div  class="contenerdor2">
                
                <div class="paquetes">
                    <div class= "precios">
                        <h5 class="card-title text-uppercase text-muted mb-0">@lang('Buildings')</h5>
                        <span class="h2 font-weight-bold mb-1">{{$buildings}}</span>
                        
                        <div class="row centrar">
                            <div class="icon icon-shape bg-danger text-white rounded-circle shadow ">
                                            <i class="fas fa-chart-bar"></i>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="paquetes">
                    <div class= "precios">
                    <h5 class="card-title text-uppercase text-muted mb-0">@lang('Inquilinos')</h5>
                                        <span class="h2 font-weight-bold mb-0">{{$tenants}}</span>
                                        <div class="row centrar">
                                        <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                        
                    </div>
                        
                </div>
                <div class="paquetes">
                    <div class= "precios">
                    <h5 class="card-title text-uppercase text-muted mb-0">@lang('Pagos')</h5>
                                        <span class="h2 font-weight-bold mb-0">${{getAmount($payments,0)}}</span>
                                        <div class="row centrar">
                                        <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                            <i class="fas fa-chart-pie"></i>
                                        </div>
                                    </div>
                    </div>
                        
                </div>

                <div class="paquetes">
                    <div class= "precios">
                    <h5 class="card-title text-uppercase text-muted mb-0" style="padding: 1px;">@lang('Departamentos')</h5>
                                        <span class="h2 font-weight-bold mb-0" >{{$departaments}}</span>
    
                        <div class="row centrar" >
                        <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                            <i class="fas fa-percent"></i>
                                        
                        </div>
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
   
</div>
            <!-- Card stats
            <div class="row">
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <center>
                                <div class="row">
                                    <div class="row">
                                        <h5 class="card-title text-uppercase text-muted mb-0">@lang('Buildings')</h5>
                                        <span class="h2 font-weight-bold mb-1">{{$buildings}}</span>
                                    </div>
                                    <div class="row centrar" >
                                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                            <i class="fas fa-chart-bar"></i>
                                        </div>
                                    </div>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <center>
                                <div class="row">
                                    <div class="row">
                                        <h5 class="card-title text-uppercase text-muted mb-0">@lang('Inquilinos')</h5>
                                        <span class="h2 font-weight-bold mb-0">{{$tenants}}</span>
                                    </div>
                                    <div class="row centrar">
                                        <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <center>
                                <div class="row">
                                    <div class="row ">
                                        <h5 class="card-title text-uppercase text-muted mb-0">@lang('Pagos')</h5>
                                        <span class="h2 font-weight-bold mb-0">${{getAmount($payments,0)}}</span>
                                    </div>
                                    <div class="row centrar">
                                        <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                            <i class="fas fa-chart-pie"></i>
                                        </div>
                                    </div>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <center>
                                <div class="row">
                                    <div class="row">
                                        <h5 class="card-title text-uppercase text-muted mb-0" style="padding: 1px;">@lang('Departamentos')</h5>
                                        <span class="h2 font-weight-bold mb-0" >{{$departaments}}</span>
                                    </div>
                                    
                                    <div class="row centrar">
                                        <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                            <i class="fas fa-percent"></i>
                                        </div>
                                    </div>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
             -->
        </div>
    </div>
</div>