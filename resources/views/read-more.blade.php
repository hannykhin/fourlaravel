@extends('layouts.front')
@section('title', $post->title)

@section('content')
<div class="row mt-3">
    <div class="col-sm-8 offset-sm-2">

        <div class="card-shadow">
            <div class="card-body">


                <div class="embed-responsive embed-responsive-21by9">
                    {{!!$post->video!!}}
                  </div>

                <h5 class="card-title">{{$post->title}} </h5>
                <p class="card-text">
                  {{$post->content}}
                </p>

               <div class="card-action">
                   <span class="small text-secondary">

                    Tag : {{$post->cat->category_name}}


                   </span>

                   <span class="small text-secondary">
                       Post Date: {{$post->created_at->diffForHumans()}}


                   </span>

                <a href="{{route('/')}}" class="btn btn-block mt-2"> back</a>


               </div>


            </div>
        </div>


    </div>


</div>

@endsection
