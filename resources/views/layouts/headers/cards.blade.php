<style>
    .centrar{
        justify-content: center;
        text-align:center;
    }

    .precios{
        font-size: 150%;
        text-align: center;
        
        background-color: white;
        border-radius: 25px;
    }
    .contenerdor2{
        justify-content: center;
        margin-bottom: 10%;
        display: grid;
        gap: 5rem;
        grid-auto-rows: 10rem;
        grid-template-columns:repeat(auto-fit, minmax(11rem, 1fr));
        margin-left: 5%;
        margin-right: 5%;
        
    }
    h5{
        margin-top: 6%;
    }

</style>

<div class="header bg-gradient-primary   pt-md-8 " >
    <div class="header-body" style="margin-bottom: 20px; justify-content: center;">
        <div  class="contenerdor2">
                
                
                    <a href="{{url('building')}}" class= "precios">
                        <h5 class="card-title text-uppercase text-muted mb-0" style = "font-size: 90%;">@lang('Buildings')</h5>
                        <span class="h2 font-weight-bold mb-1" style = "font-size: 90%;">{{$buildings}}</span>
                        
                        <div class="row centrar">
                            <div class="icon icon-shape bg-danger text-white rounded-circle shadow ">
                                            <i class="fas fa-chart-bar" style = "font-size: 90%;"></i>
                            </div>
                        </div>
                    </a>
                    
                
                    <div class= "precios">
                    <h5 class="card-title text-uppercase text-muted mb-0" style = "font-size: 90%;">@lang('Inquilinos')</h5>
                                        <span class="h2 font-weight-bold mb-0" style = "font-size: 90%;">{{$tenants}}</span>
                                        <div class="row centrar">
                                        <div class="icon icon-shape bg-warning text-white rounded-circle shadow" style = "font-size: 90%;"> 
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                        
                    </div>
                        
                
                
                    <a href="{{route('tenantpayments.wallet')}}" class= "precios">
                    <h5 class="card-title text-uppercase text-muted mb-0" style = "font-size: 90%;">@lang('Pagos')</h5>
                                        <span class="h2 font-weight-bold mb-0" style = "font-size: 90%;">${{getAmount($payments,0)}}</span>
                                        <div class="row centrar">
                                        <div class="icon icon-shape bg-yellow text-white rounded-circle shadow" style = "font-size: 90%;">
                                            <i class="fas fa-chart-pie"></i>
                                        </div>
                                    </div>
                                </a>
                        
                

                
                
                    <div class= "precios">
                        <h5 class="card-title text-uppercase text-muted mb-0"  style = "font-size: 90%;">@lang('Departamentos')</h5>
                        <span class="h2 font-weight-bold mb-0" style = "font-size: 90%;">{{$departaments}}</span>
    
                        <div class="row centrar" >
                            <div class="icon icon-shape bg-info text-white rounded-circle shadow" style = "font-size: 90%;">
                                <i class="fas fa-percent"></i>
                        </div>
                                        
                        </div>
                    </div>
                        
                    




        </div>
    
        <div style="height: 40px;"></div>
            
            
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