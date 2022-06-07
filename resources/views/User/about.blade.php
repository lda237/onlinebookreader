@extends("layouts.master")

@section("content")
<style>
    .disable-text-selection {
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    }
    .box{overflow-wrap: break-word;}
</style>
    <div class="site-section" style="background-color:rgba(227, 241, 245, 0.842);">
    <div class="py-1 bg-light">
      <div class="container">
        <div class="row">
          <div class="mb-0 col-md-12">About</strong></div>
        </div>
      </div>
    </div>
    <hr>
    <div class="container">
        <div class="row">
          {{-- <div class="mr-auto col-md-1"></div> --}}
          <div class="mr-auto col-md-6">
            <div class="text-center border code box">

                <img src="{{ asset('storage') }}/{{ $abouts->image }}" class="justify-center  w-100" >
            </div>
          </div>
          <div class="col-md-6 text-center">
            <br>
            <h2 class="text-black"><h4>Description:</h4></h2><br>

<hr>
<div class="pb-5 mb-5">

<div class="row">
    <p><h4 class="text-black box">{{ $abouts->description }}</h4></p>
</div>
</div>


        </div>

        </div>
      </div>
    </div>
  <@endsection
@section('scripts')

// Function to block the right click in the iFrame
<script type="text/jscript">
    function disableContextMenu()
    {
      window.frames["fraDisabled"].document.oncontextmenu = function(){alert("No way!"); return false;};
      // Or use this
      // document.getElementById("fraDisabled").contentWindow.document.oncontextmenu = function(){alert("No way!"); return false;};;
    }
  </script>

@endsection
