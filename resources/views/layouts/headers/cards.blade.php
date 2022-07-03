<style>
    .centrar{
        justify-content: center;
        text-align:center;
    }

    .precios{
        height: 40%;
        background-color: white;
        border-radius: 20px 20px 20px 20px;
    }
    .contenerdor2{
        text-align: center;
        display: grid;
        gap: 1rem;
        grid-auto-rows: 22rem;
        grid-template-columns: repeat(auto-fill, minmax(15rem, 1fr));
        
    }

</style>

<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container">
        <div class="header-body">
            <div  class="contenerdor2">
                
                
                    <div class= "precios">
                        <h5 class="card-title text-uppercase text-muted mb-0">@lang('Buildings')</h5>
                        <span class="h2 font-weight-bold mb-1">{{$buildings}}</span>
                        
                        <div class="row centrar">
                            <div class="icon icon-shape bg-danger text-white rounded-circle shadow ">
                                            <i class="fas fa-chart-bar"></i>
                            </div>
                        </div>
                    </div>
                    
                
                
                    <div class= "precios">
                    <h5 class="card-title text-uppercase text-muted mb-0">@lang('Inquilinos')</h5>
                                        <span class="h2 font-weight-bold mb-0">{{$tenants}}</span>
                                        <div class="row centrar">
                                        <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                        
                    </div>
                        
                
                
                    <div class= "precios">
                    <h5 class="card-title text-uppercase text-muted mb-0">@lang('Pagos')</h5>
                                        <span class="h2 font-weight-bold mb-0">${{getAmount($payments,0)}}</span>
                                        <div class="row centrar">
                                        <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                            <i class="fas fa-chart-pie"></i>
                                        </div>
                                    </div>
                    </div>
                        
                

                
                
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