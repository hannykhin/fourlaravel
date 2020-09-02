@extends('layouts.app')

@section('title','new post')


@section('content')

<div class="card shadow">
    <div  class="card-body"> 

        <div class="card-title"> <i class="fas fa-plus-circle"></i> New Post </div>



        <div class="row">

            <div class="col-sm-6 offset-sm-3"> 
            <form action="{{route('post.new')}}"  method="post" enctype="multipart/form-data">

                @csrf

                    <div class="form-group">
                        <label for="title"> Title</label>
                        <input type="text" name="title" id="title" class="form-control">
                        @if ($errors->has('title')) <span>{{$errors->first('title')}}</span>@endif
                    </div>

                    <div class="form-group">
                        <label for="image"> Selete Post Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                        @if ($errors->has('image')) <span>{{$errors->first('image')}}</span>@endif
                    </div>

                    <div class="form-group">
                        <label for="video"> Post Video </label>
                        <input type="video" name="video" id="title" class="form-control">
                        @if ($errors->has('video')) <span>{{$errors->first('video')}}</span>@endif
                    </div>

                    <div class="form-group">
                        <label for="content"> Content </label>
                      <textarea name="content" id="content" class="form-control"></textarea>
                      @if ($errors->has('content')) <span>{{$errors->first('content')}}</span>@endif
                    </div>

                    <div class="form-group">
                        <label for="cat_id"> Category </label>

                        <select name="cat_id" id="cat_id" class="custom-select">
                        <option value=""> Select Category</option>

                        @if ($errors->has('cat_id')) <span>{{$errors->first('cat_id')}}</span>@endif
                        @foreach ($cats as $c)

                        <option value="{{$c->id}}">{{$c->category_name}}</option>

                   
                    @endforeach

                    </select>
                     
                    </div>


                    <div class="form-group">

                    <a href="{{route('posts')}}" class="btn btn-secondary btn-lg "> Close </a>
                    <button type="submit" class="btn btn-primary btn-lg">  Save </button>


                    </div>


                    







                </form>







            </div>


        </div>

        
    </div>
   




</div>



@endsection
