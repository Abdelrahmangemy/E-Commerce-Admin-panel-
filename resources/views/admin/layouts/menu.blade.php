<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-comments-o"></i>
          @php $countcontact = getContact('count'); @endphp 
          @if($countcontact > 0)
          <span class="badge badge-danger navbar-badge">{{$countcontact}}</span>
          @endif
        </a>
        @forelse(getContact() as $message)
          <a href="{{route('contacts.show',$message->id)}}" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{url('public/panel/img/user1-128x128.jpg')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  {{$message -> subject}}
                  <span class="float-right text-sm text-danger"><i class="fa fa-star"></i>{{$message->created_at->diffForHumans()}}</span>
                </h3>
                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i>{{str_limit($message -> message,100)}} </p>
            <!-- Message End -->
          </a>
          @empty
          <li>
          <a href="#" >
          <p>No Data </p>
          </a>
          </li>
          @endforelse
          <a href="{{route('contacts.index' )}}" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
            class="fa fa-th-large"></i></a>
      </li>
    </ul>
  </nav>