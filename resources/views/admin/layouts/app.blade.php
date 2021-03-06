<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title','首页')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/admin/base.css">
    <link rel="stylesheet" href="/css/admin/index.css">
    <script src="/js/jquery.min.js"></script>
    <script src="/js/admin/common.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
    <link href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="wrapper">
  
    <div class="leftnav">
        <div class="leftfloat">
            <div class="logo_wrap">
                <p class="logo_pic "><img src="/img/admin/cmslogo.png" alt=""></p>
                <p class="show_bnt "><i></i></p>
            </div>
            <!--测边栏-->
            @include('admin.layouts.menu')

        </div>
      
        @include('admin.layouts.two_menu')
    </div>
  
    <div class="rightwrapp">
        @include('admin.layouts.top')
        
        @yield('content')
    </div>
  
</div>
</body>
</html>