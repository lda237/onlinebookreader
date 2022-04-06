<!DOCTYPE html>
<html lang="en">

<head>
  <title>
    Online Pdf Reader
   {{--  @yield("title")  --}}
  </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" type="text/css" href="../user/css/font-awesome.min.css">
   <link rel="stylesheet" href="../user/fonts/icomoon/style.css">
   {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}

   <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
  <link rel="stylesheet" href="../user/fonts/style.css">

  <link rel="stylesheet" href="../user/css/bootstrap.min (3).css">
  <link rel="stylesheet" href="../user/css/magnific-popup.css">
  <link rel="stylesheet" href="../user/css/jquery-ui.css">
  <link rel="stylesheet" href="../user/css/owl.carousel.min.css">
 <link rel="stylesheet" type="text/css" href="../user/css/dataTables.bootstrap4.min.css">
 <link rel="stylesheet" href="{{asset('user/css/dataTables.min.css')}}">
     <link rel="stylesheet" href="../user/css/bootstrap5.css">
  <link rel="stylesheet" href="../user/css/bootstrap5.min.css">
  <link rel="stylesheet" href="../user/css/bootstrap.min.css">

  <link rel="stylesheet" href="../user/css/aos.css">
   <link rel="stylesheet" href="../user/css/style (2).css">
    <link rel="stylesheet" href="../user/css/style.css">

<script>
window.onload=function(){
document.addEventListener("contextmenu",function(e){
e.preventDefault();
},false);
}
</script>
</head>
<body>

@include('layouts.partials.master_navbar')
             @yield("content")
@include('layouts.partials.master_footer')
         </div>

  <script src="../user/js/jquery-3.3.1.min.js"></script>
  <script src="../user/js/jquery-ui.js"></script>
  <script src="../user/js/popper.min.js"></script>
  <script src="../user/js/bootstrap.min.js"></script>
  <script src="../user/js/owl.carousel.min.js"></script>
  <script src="../user/js/jquery.magnific-popup.min.js"></script>
   <script src="../user/js/jquery.dataTables.min.js"></script>
   <script src="../user/js/dataTables.bootstrap4.min.js"></script>
  <script src="{{asset('user/js/dataTables.min.js')}}"></script>
  <script src="../user/js/aos.js"></script>
  <script src="../user/js/main.js"></script>
 <script src="../user/js/bootstrap5.min.js"></script>
  <script src="../user/js/bootstrap5.js"></script>
  <script type="text/javascript">
    $(document).ready(function () {
        //Disable cut copy paste
        $(document).bind('cut copy paste', function (e) {
            e.preventDefault();
        });

        //Disable mouse right click
        $("body").on("contextmenu",function(e){
            return false;
        });

});
    });
    </script>
 @yield("scripts")
</body>



<style>

.fadeIn-right{
  left: 80%;
}

img.slider-img{
  height:400px !important
}
.custom-pudoct{
   margin-top: 80px;
}
.slider-text{
  background-color:#35443585 !important
}
.trending_image{
  height:250px;
}
.search_image{
  height:300px;
}
.single_image{
  height:400px
}
.p-name{
  text-decoration: none;
}
.search{
  float: right;
}
.search-box{

width:500px !important;
height: 40px
}
.w-10p{width:10% !important;}
.w-25p{width:25% !important;}
</style>

</html>
