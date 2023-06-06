<?php

    if(Session::has('metaDescription')){
        $metaDescription=Session::get('metaDescription');
    }else{
        $metaDescription=primaryInfo()->company_name.". Seek out new technology. Technic Buzz is a best blog site.";
    }
    if(Session::has('title_msg')){
        $title=Session::get('title_msg')." |  ".primaryInfo()->company_name;
    }else{
        $title=primaryInfo()->company_name." | Official Website ";
    }
    $url= Request::path();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{$metaDescription}}">
    <meta name="author" content="Technic Buzz">
    <meta property="fb:app_id" content="152285325491622" />
    <meta property="fb:admins" content="1463689947081488"/>
    <meta property="og:url" content="{{Request::fullUrl()}}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?php echo $title; ?>" />
    <meta property="og:description" content="<?php echo $metaDescription; ?>" />
    @if(isset($ogImage))
    <?php $itemSmallPhoto=URL::to("images/post/small/$ogImage");?>
    <meta property="og:image" content="{{$itemSmallPhoto}}" />
    @else
    <meta property="og:image" content="{{asset(primaryInfo()->logo)}}" />
    @endif
    <!-- favicon icon -->

    <title>{{$title}}</title>

    <!-- common css -->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/owl.transitions.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/jssocials/jssocials.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/frontend/jssocials/jssocials-theme-flat.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/frontend/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/responsive.css')}}">

    <!-- HTML5 shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{asset('assets/prontend/js/html5shiv.js')}}"></script>
    <script src="{{asset('assets/prontend/js/respond.js')}}"></script>
    <![endif]-->

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{asset('assets/images/favicon.png')}}">
</head>
<body>


<nav class="navbar main-menu navbar-default">
    <div class="container">
        <div class="menu-content">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href='{{URL::to("/")}}'><img src="{{asset(primaryInfo()->logo)}}" alt=""></a>
            </div>


            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav text-uppercase">
                    @foreach(menus() as $menu)
                    <?php
                        $subMenus=DB::table('sub_menu')->where('status',1)->where('fk_menu_id',$menu->id)->orderBy('serial_num','ASC')->get();
                    ?>
                     <li  class="<?php echo($url==$menu->url)?'current' : '' ?> {{(count($subMenus)>0)?'dropdown-toggle' : ''}}" data-toggle=" {{(count($subMenus)>0)?'dropdown' : ''}}"><a href='{{URL::to("$menu->url")}}'>{{$menu->name}}
                        @if(count($subMenus)>0)
                        <i class="fa fa-angle-down"></i>
                        @endif
                     </a>
                     @if(count($subMenus)>0)
                        <ul class="sub-menu">
                            @foreach($subMenus as $subMenu)
                            <?php $subSubMenu=DB::table('sub_sub_menu')->where('fk_sub_menu_id',$subMenu->id)->orderBy('serial_num','ASC')->get(); ?>
                            <li class="{{(count($subSubMenu)>0)?'menu-item-has-children' : ''}}"><a href="{{URL::to('/')}}/{{$subMenu->url}}" title="{{$subMenu->name}}">{{$subMenu->name}}
                            @if(count($subSubMenu)>0)
                            <i class="fa fa-angle-right"></i>
                            @endif
                            </a>
                                @if(count($subSubMenu)>0)
                                <ul class="sub-menu">
                                @foreach($subSubMenu as $ssMenu)
                                    <li><a href="{{URL::to('/')}}/{{$ssMenu->url}}" title="{{$ssMenu->name}}">{{$ssMenu->name}}</a></li>
                                @endforeach
                                </ul>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    @endif
                    </li>
                @endforeach
                </ul>
                <div class="i_con">
                @foreach(socialLinks() as $social)
                        <?php $btn=str_replace(' ', '-',strtolower($social->name) ); ?>
                        <a target="_blank" href="{{$social->link}}" class="{{$btn}}-btn wow rollIn center animated" data-wow-delay=".1s" title="{{$social->name}}"><i class="{{$social->icon_class}}"></i> </a>
                @endforeach

                    <div class="top-search">
                        <a href="#"><i class="fa fa-search"></i></a>
                    </div>
                </div>

            </div>
            <!-- /.navbar-collapse -->


            <div class="show-search">
                <form role="search" method="get" id="searchform" action="index-grid.html#">
                    <div>
                        <input type="text" placeholder=" Search here..." name="s" id="s">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</nav>
