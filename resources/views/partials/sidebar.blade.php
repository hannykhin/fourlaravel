<ul class="list-group list-group-flush"> 

    <li class="list-group-item">

    <a href="{{url('/home')}}"> <i class="fas fa-user-circle"></i> {{Auth::user()->name}}</a>
   
    </li>

    <li class="list-group-item">

        <a href="{{Route('category')}}"> <i class="fas fa-clipboard-list"></i> Category</a>
    
    </li>

    <li class="list-group-item">
        
        
        <a href="{{Route('posts')}}"> <i class="fas fa-clipboard-list"></i> Posts</a>

      
    
    </li>



</ul>