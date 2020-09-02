@extends('layouts.app')

@section('title', "category")

@section('content')

<div class="card shadow-sm">
    <div class="card-body">
    @include("partials.msg")
        <div class="card-title"><i class="fas fa-clipboard-list"></i> Categories</div>
        <div class="row">
            <div class="col-sm-8">


                <table class="table table-hover">

                    <tr>
                        <td> Name </td>
                        <td> Action </td>
                    </tr>

                 @foreach ($cats as $c )

                 <tr>
                 <td> {{$c->category_name}}</td>

                 <td>
                        <a data-toggle="modal" data-target="#e{{$c->id}}"  href="#"> <i class="fas fa-edit"> </i></a>

                         <!-- Modal -->
                    <div class="modal fade" id="e{{$c->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">

                            <form action="{{route('update.category')}}" method="post">
                            <input type="hidden" name="id" value="{{$c->id}}" >

                                <div class="form-group">
                                    <label for="category_name"> Category Name</label>
                                <input class="form-control" value="{{ $c->category_name}}" type="text" name="category_name">


                                </div>



                           


                            </div>
                            <div class="modal-footer">
                           <button type="submit" class="btn btn-primary"> Save change  </button>
                            </div>

                         @csrf
                        </form>
                        </div>
                        </div>
                    </div>
                   <!--End  Modal -->








                        <a  data-toggle="modal" data-target="#d{{$c->id}}" href="#" class="text-danger"> <i class="fas fa-times-circle"> </i></a>

                    <!-- Modal -->
                    <div class="modal fade" id="d{{$c->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body text-center text-danger">

                            <i class="fas fa-exclamation-circle fa-3x"> </i>
                            <p>
                                Are you sure to delete ?
                            </p>
                            


                            </div>
                            <div class="modal-footer">
                            <a href="{{route('delete.category',['id'=>$c->id])}}"> Agree </a>
                            </div>
                        </div>
                        </div>
                    </div>
                   <!--End  Modal -->

                </td>
                 </tr>
                     
                 @endforeach
                </table>

            </div>
            <div class="col-sm-4">
                <div class="card-title"> Add Category</div>

            <hr> 
            <form method="post" action={{route('cat.new')}}>

                <div class="form-group">
                    <label for="cat_name"> Category Name</label>
                    <input type="text" id="cat_name" name="category_name" class="form-control">
                @if ($errors->has('category_name')) <span>{{$errors->first('category_name')}}</span>@endif
                </div>

                <div class="form-group">
                   <button type="submit" class="btn btn-success btn-lg"> Save</button>
                </div>
                @csrf




            </form>

                


            </div>

        </div>


    </div>


</div>

@stop