 <?php
     use App\Http\Controllers\HomeController;
     $total = HomeController::cart_item();
     ?>
 <style>
   .active {
    background-color: white;
    color: white;
}
li a:hover {
    background-color: white;
}

</style>

 <!--StateNav-->
  <div class="site-wrap">
<div class="py-2 bg-white site-navbar">
      <div class="container-fluid">
        <div class=" d-flex align-items-center justify-content-between">

           <div class="icons">
            <a href="#" class="ml-3 site-menu-toggle js-menu-toggle d-inline-block d-lg-none"><span
                class="icon-menu"></span></a>
          </div>

          <div class="logo">
            <div class="site-logo">
              <a class="js-logo-clone" href="{{ url('/') }}">
              {{-- Online Pdf Reader --}}
             <img  src="/storage/image/logo1.png" class="justify-center d-flex w-50" alt="">
              </a>
            </div>
          </div>

          <div class=" main-nav d-none d-lg-block">
            <nav class="text-right site-navigation text-md-center " role="navigation">
              <ul class="site-menu js-clone-nav d-none d-lg-block">
                 <li class="{{'/' == request()->path() ? 'active':''}}">
     <a class="icons-btn d-inline-block bag" href="/">Home</a>
 </li>

 <li class="{{'shop' == request()->path() ? 'active':''}}">
     <a class="icons-btn d-inline-block bag" href="/shop">Readers</a>
 </li>

              </ul>

            </nav>
          </div>

           {{-- <div class="{{'cartlist' == request()->path() ? 'active':''}}">
            <a href="/cart_list" class="icons-btn d-inline-block bag ">
              <span><i class="fa fa-shopping-bag" style="color:black"></i></span>
              <span class="text-white number bg-danger">{{ $total }}</span>
            </a>
          </div> --}}
        <div>

         @if (Route::has('login'))
               <div class="top-right links" style="float:right;">
                   @auth


                 @if (Auth::user()->role=="admin")
                       <a class="px-1" href="{{ url('/admin/dashboard') }} ">{{ Auth::user()->name }}</a>
                       @else
                       <a class="px-1" href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                       <div class="dropdown-menu top-right links" style="float:right;">

						<a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
             </a>

             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
             </form>
					</div>
                       @endif
                   @else
                      <a class="px-1"href="{{ route('login') }}">Login</a>

                      @if (Route::has('register'))
                           <a class="px-1" href="{{ route('register') }}">Register</a>
                       @endif
                   @endauth
               </div>
           @endif
            </div>
      </div>
    </div>
    </div>

