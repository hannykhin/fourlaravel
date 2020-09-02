@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div col-sm-6>
                            <h3>{{ $chart1->options['chart_title'] }}</h3>
                           {!! $chart1->renderHtml() !!}



                        </div>


                    </div>

                    <div class="row">

                        <div class="col-sm-4">
                            <div class="card-shadow">
                                <div class="card-body">
                                <div class="card-title"> Post <span class="badge badge-pill badge-primary float-right">{{count($posts)}}</span></div>
                                <a href="{{route('posts')}}" class="btn btn-block"> More</a>

                                </div>


                            </div>

                        </div>

                        <div class="col-sm-8">


                            <div class="card-shadow">
                                <div class="card-body">
                                     <div class="card-title"> Categories<span class="badge badge-pill badge-success float-right">{{count($cats)}}</span></div>
                                <a href="{{route('category')}}" class="btn btn-block"> More</a>

                                </div>


                            </div>



                        </div>


                    </div>




                  
                    



                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('javascript')
{!! $chart1->renderChartJsLibrary() !!}
{!! $chart1->renderJs() !!}
@endsection

