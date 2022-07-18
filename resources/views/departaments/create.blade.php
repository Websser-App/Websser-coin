<style>
    .precios{
        font-size: 100%;
        text-align: center;
        
        background-color: white;
        border-radius: 25px;
    }
    .contenerdor2{
        justify-content: center;
        margin-bottom: 10%;
        display: grid;
        gap: 1rem;
        grid-auto-rows: 13rem;
        grid-template-columns:repeat(auto-fit, minmax(15rem, 1fr));
        margin-left: 5%;
        margin-right: 5%;
        
    }
    .marginado{
        margin-top: 3%;
        
    }
</style>


@extends('layouts.app')

@section('content')
@include('layouts.headers.page')
<body onload="initialize();">
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
            <div class="row align-items-center">
                <h3 class="mb-0">{{ __('Assign departments') }}</h3>
            </div>
        </div>
        <div class="card-body">
            <form class="contenerdor2" method="post" action="{{route('departaments.store')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{auth()->user()->id}}" name="user_id">
                <input type="hidden" class="form-control" id="building_id" name="building_id" value="{{ $buildings->id }}">


                @if($departaments->isEmpty())

                    @for ($i = 0; $i < $inputsDepartaments; $i++)
                        <div class="precios">
                            <div class="container">
                                <label for="number_departament" class="form-label">@lang('Assign department')</label>
                                <select  class="form-select marginado" aria-label="Default select example" name="buildings_row[]">
                                    <option selected disabled>@lang('Choose the floor number')</option>
                                    @for ($j = 1; $j <= $buildings->rows; $j++)
                                        <option value="{{$j}}">{{$j}}</option>
                                    @endfor
                                </select><br>
                                <input type="text" class="form-control marginado" id="number_departament" name="number_departament[]"  placeholder="@lang('Departament Number')"  required>
                            </div>
                        </div>
                    @endfor
                    

                @else


                    @foreach($departaments as $index => $departament)
                        @if($departament->number_departament != NULL )
                            <div class="precios">
                                <div class="container">
                                    <label for="number_departament" class="form-label">@lang('Departament Number') </label>
                                    <select class="form-select" aria-label="Default select example" name="buildings_row[]">
                                        <option selected disabled>@lang('Choose the floor number')</option>
                                        @for ($j = 1; $j <= $buildings->rows; $j++)
                                            <option value="{{$j}}">{{$j}}</option>
                                        @endfor
                                    </select><br>
                                    <input type="text" class="form-control" id="number_departament" name="number_departament[]" placeholder="@lang('Departament Number')" value="{{$departament->number_departament}}" required disabled>
                                </div>
                            </div>
                        @endif  
                    @endforeach


                    @for ($i = $index+1; $i < $inputsDepartaments; $i++)
                        @if($index !=  $inputsDepartaments)
                        <div class="precios">
                            <div class="container">
                                <label for="number_departament" class="form-label">@lang('Departament Number')</label>
                                <select class="form-select" aria-label="Default select example" name="buildings_row[]">
                                    <option selected disabled>@lang('Choose the floor number')</option>
                                    @for ($j = 1; $j <= $buildings->rows; $j++)
                                        <option value="{{$j}}">{{$j}}</option>
                                    @endfor
                                </select><br>
                                <input type="text" class="form-control" id="number_departament" name="number_departament[]" placeholder="@lang('Departament Number')" required>
                            </div>
                            </div>
                        @endif
                    @endfor


                @endif


                <div class="text-center">
                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                </div>
            </form>
        </div>
        @include('layouts.footers.auth')
    </div>
</body>
@endsection