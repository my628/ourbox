<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta http-equiv="x-ua-compatible" content="ie=edge"/>
  <!--Title-->
  <title>Material Design for Bootstrap</title>
    <!--Icon-->
    <link rel="icon" type="image/x-icon" href="/favicon.ico" />
    <!--Styles-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}"/>
    <!--fontawesome
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    --> 
    <!--Google Fonts Roboto
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"/>
    -->
    <!-- mdb -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css"/>
    <!--toastui-editor-viewer-->
    <link rel="stylesheet" type="text/css" href="https://uicdn.toast.com/editor/latest/toastui-editor-viewer.min.css"/>
    <!--video-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/video.js/7.8.1/video-js.min.css"/> 
    <!-- Custom styles --> 
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/tocbot/4.11.1/tocbot.css"/>
  <style>
  .chip { 
    display: inline-block; 
    height: 32px; 
    padding: 0 20px; 
    margin-right: 1rem; 
    margin-bottom: 1rem; 
    font-size: 13px; 
    font-weight: 500; 
    line-height: 32px; 
    color: rgba(0,0,0,0.6); 
    cursor: pointer; 
    background-color: #eceff1; 
    border-radius: 16px; 
    -webkit-transition: all .3s linear; 
    transition: all .3s linear; 
} 
/* Navigation*/ 
.navbar { 
    background-color: transparent; 
} 
.scrolling-navbar { 
    transition: background .5s ease-in-out, padding .5s ease-in-out; 
} 
.top-nav-collapse { 
    background-color: #34456a; 
} 

footer.page-footer { 
    background-color: #34456a; 
} 

@media only screen and (max-width: 768px) { 
    .navbar { 
        background-color: #34456a; 
    } 
} 
/* Necessary for full page carousel*/ 
html, body, .view { 
    height: 100%; 
} 

.card { 
    border-radius: 10px; 
    box-shadow: 0 15px 35px rgba(50, 50, 93, .1), 0 5px 15px rgba(0, 0, 0, .07) !important; 
} 
/* Carousel*/ 
.carousel, .carousel-item, .carousel-item.active { 
    height: 100%; 
} 
.carousel-inner { 
    height: 100%; 
} 
.carousel .carousel-item video { 
    min-width: 100%; min-height: 100%; width: auto; height: auto; top: 50%; left: 50%; transform: translate(-50%, -50%); 
}
 .btn-floating { 
     position: relative; 
     z-index: 1; 
     display: inline-block; 
     padding: 0; 
     margin: 10px; 
     overflow: hidden; 
     vertical-align: middle; cursor: pointer; 
     border-radius: 50%; 
     -webkit-box-shadow: 0 5px 11px 0 rgba(0,0,0,0.18), 0 4px 15px 0 rgba(0,0,0,0.15); 
     box-shadow: 0 5px 11px 0 rgba(0,0,0,0.18), 0 4px 15px 0 rgba(0,0,0,0.15); 
     -webkit-transition: all .2s ease-in-out; 
     transition: all .2s ease-in-out; 
     width: 47px; 
     height: 47px; 
}

.card .btn-action { 
    margin-top: -1.44rem; 
    margin-bottom: -1.44rem; 
}
.btn-floating i { 
    display: inline-block; 
    width: inherit; 
    color: #fff; 
    text-align: center; 
} 
.btn-floating i { 
    font-size: 1.25rem; 
    line-height: 47px; 
} 
.fa, .fas { 
    font-weight: 900; 
} 
.fa, .far, .fas { 
    font-family: "Font Awesome 5 Free"; 
} 
.fa, .fab, .fad, .fal, .far, .fas { 
    -moz-osx-font-smoothing: grayscale; 
    -webkit-font-smoothing: antialiased; 
    display: inline-block; 
    font-style: normal; 
    font-variant: normal; 
    text-rendering: auto; 
    line-height: 1; 
} 
.card.card-image [class*="rgba-"] { 
    height: 300px; 
    border-radius: 15px; 
} 
.btn-floating.btn-lg i { 
    font-size: 1.625rem; 
    line-height: 61.1px; 
} 
.recommend .title { 
    margin-top: 25px; 
    margin-bottom: 25px; 
    text-align: center; 
    font-size: 1.8rem; 
    font-weight: 700; 
    line-height: 1.8rem; 
}
  </style>

</head> 
<body>
  <header>
    @section('header') @include('blog.partials.navbar')
    @show 
  </header> 
  <!--main--> 
  <main> 
  @yield('content') 
  </main>
  <!--@yield('comments')-->
  <!--footer stylish-color-dark-->
  <footer class="page-footer bg-color  text-center text-md-left mt-4 pt-4">
  @include('blog.partials.footer')
  </footer>
  
  
  
  <!--scripts--> 
  <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <!--MDB-->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
    <!--fontawesome-->
  <script type="text/javascript" src="https://kit.fontawesome.com/ef9b68e1f3.js"></script>
    <!--toastui-jquery-editor-viewer-->
  <script type="text/javascript" src="https://uicdn.toast.com/editor/latest/toastui-jquery-editor-viewer.js"></script> 
    <!--Valine-->
  <script type="text/javascript" src="https://unpkg.com/valine@latest/dist/Valine.min.js"></script>
    <!--video-->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/video.js/7.8.1/video.min.js"></script>
    <!-- custom scripts -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tocbot/4.11.1/tocbot.min.js"></script>
     
  @yield('scripts')
</body>
</html>