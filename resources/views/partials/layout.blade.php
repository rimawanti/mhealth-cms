<!DOCTYPE html>
<html lang="en">
  <head>
   @include('partials._head')
  </head>
  <body>

  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    @include('partials._nav-header')
  </nav>

 <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    @include('partials._sidebar')

  </div>


  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main"> 
    <div class="row">
        <ol class="breadcrumb">
          <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
          <li class="active">Icons</li>
        </ol>
    </div><!--/.row-->

        @include('partials._message')
        @yield('content')

  </div>
     
@include('partials._script')

  </body>
</html>