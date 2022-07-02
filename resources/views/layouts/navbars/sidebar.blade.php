<style>
    i{
        font-size: 30px;
    }
    .conf{
        font-size: 35px;
        position: absolute;
        top: 18%;
    }
    .avatar{
        width: 80%; 
        height: 80%;
    }
    @media only screen and (max-width: 767px) {
        .conf{
            font-size: 20px;
            position: absolute;
            top: 160%;
            right: 83%;
        }
        .avatar{
        width: 20%; 
        height: 20%;
        margin-right: 80%;
        position: absolute;
        right:-75%;
        top: 40%;
        }
        
    }
</style>
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <div class="navbar-brand pt-0">
            <div class = "mb-3"></div>
            <span class="avatar avatar-sm rounded-circle" style=" margin-right: 80%;">
                <a href="#">
                    <i class="iconos ni ni-settings-gear-65 text-black conf " style=""></i>
                </a>
                <a href="/profile">
                    <img alt="Image placeholder"    src="{{ asset('argon') }}/img/theme/team-4-800x800.jpg" class= "">
                </a>
                
            </span> <br></br>
            <div class="media-body ml-2 d-none d-lg-inline">
                <span class="mb-0 text-sm  font-weight-bold">{{ auth()->user()->name }}</span> 
            </div>
        </div>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-9 collapse-close right">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-black"  href="{{ url('home') }}">
                        <i class="iconos ni ni-chart-bar-32 text-black " style="font-size: 20px;"></i> {{ __('Dashboard') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black" href="{{ url('building') }}">
                        <i class="ni ni-building text-black" style="font-size: 20px;"></i> {{ __('Entity') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                        <i class="ni ni-money-coins text-black" style="color: #f4645f; font-size: 20px;"></i>
                        <span class="nav-link-text text-black" style="color: #f4645f;">{{ __('Expenses') }}</span>
                    </a>

                    <div class="collapse" id="navbar-examples">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('bills') }}">
                                    {{ __('Expenses') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('tenantpayments') }}">
                                    {{ __('Expense report') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('tenantpayments.wallet') }}">
                                    {{ __('Wallet') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link text-black" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run" style="font-size: 20px;"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </li>
            </ul>
            <!-- Divider -->
            <hr class="my-3">
        </div>
    </div>
</nav>
