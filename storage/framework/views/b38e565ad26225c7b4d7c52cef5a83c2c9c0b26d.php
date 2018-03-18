<?php 
$info=DB::table('about_company')->first();
$menus=DB::table('menu')->where('status',1)->orderBy('serial_num','ASC')->get();
$socialLinks=DB::table('social_links')->where('status',1)->get();
    if(Session::has('metaDescription')){
        $metaDescription=Session::get('metaDescription');
    }else{
        $metaDescription=$info->company_name.". Seek out new technology. Technic Buzz is a best blog site.";
    }
    if(Session::has('title_msg')){
        $title=Session::get('title_msg')." |  ".$info->company_name;
    }else{
        $title=$info->company_name." | Official Website ";
    }
    $url= Request::path();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo e($metaDescription); ?>">
    <meta name="author" content="Technic Buzz">
    <meta property="fb:app_id" content="152285325491622" />
    <meta property="fb:admins" content="1463689947081488"/>
    <meta property="og:url" content="<?php echo e(Request::fullUrl()); ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<? echo $title; ?>" />
    <meta property="og:description" content="<? echo $metaDescription; ?>" />
    <?php if(isset($ogImage)): ?>
    <? $itemSmallPhoto=URL::to("images/post/small$ogImage");?>
    <meta property="og:image" content="<?php echo e($itemSmallPhoto); ?>" />
    <?php else: ?>
    <meta property="og:image" content="<?php echo e(asset('images/logo/'.$info->logo)); ?>" />
    <?php endif; ?>
    <!-- favicon icon -->

    <title><?php echo e($title); ?></title>

    <!-- common css -->
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/animate.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/owl.carousel.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/owl.theme.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/owl.transitions.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/jssocials/jssocials.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/jssocials/jssocials-theme-flat.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/custom.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/responsive.css')); ?>">

    <!-- HTML5 shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="<?php echo e(asset('public/prontend/js/html5shiv.js')); ?>"></script>
    <script src="<?php echo e(asset('public/prontend/js/respond.js')); ?>"></script>
    <![endif]-->

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="<?php echo e(asset('images/favicon.png')); ?>">
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
                <a class="navbar-brand" href='<?php echo e(URL::to("/")); ?>'><img src="<?php echo e(asset('images/logo/'.$info->logo)); ?>" alt=""></a>
            </div>


            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav text-uppercase">
                    <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?
                        $subMenus=DB::table('sub_menu')->where('status',1)->where('fk_menu_id',$menu->id)->orderBy('serial_num','ASC')->get();
                    ?>
                     <li  class="<? echo($url==$menu->url)?'current' : '' ?> <?php echo e((count($subMenus)>0)?'dropdown-toggle' : ''); ?>" data-toggle=" <?php echo e((count($subMenus)>0)?'dropdown' : ''); ?>"><a href='<?php echo e(URL::to("$menu->url")); ?>'><?php echo e($menu->name); ?>

                        <?php if(count($subMenus)>0): ?>
                        <i class="fa fa-angle-down"></i>
                        <?php endif; ?>
                     </a>
                     <?php if(count($subMenus)>0): ?>
                        <ul class="sub-menu">
                            <?php $__currentLoopData = $subMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <? $subSubMenu=DB::table('sub_sub_menu')->where('fk_sub_menu_id',$subMenu->id)->orderBy('serial_num','ASC')->get(); ?>
                            <li class="<?php echo e((count($subSubMenu)>0)?'menu-item-has-children' : ''); ?>"><a href="<?php echo e(URL::to('/')); ?>/<?php echo e($subMenu->url); ?>" title="<?php echo e($subMenu->name); ?>"><?php echo e($subMenu->name); ?>

                            <?php if(count($subSubMenu)>0): ?>
                            <i class="fa fa-angle-right"></i>
                            <?php endif; ?> 
                            </a>
                                <?php if(count($subSubMenu)>0): ?>
                                <ul class="sub-menu">
                                <?php $__currentLoopData = $subSubMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ssMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e(URL::to('/')); ?>/<?php echo e($ssMenu->url); ?>" title="<?php echo e($ssMenu->name); ?>"><?php echo e($ssMenu->name); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                                <?php endif; ?>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php endif; ?>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <div class="i_con">
                <?php $__currentLoopData = $socialLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <? $btn=str_replace(' ', '-',strtolower($social->name) ); ?>
                        <a target="_blank" href="<?php echo e($social->link); ?>" class="<?php echo e($btn); ?>-btn wow rollIn center animated" data-wow-delay=".1s" title="<?php echo e($social->name); ?>"><i class="<?php echo e($social->icon_class); ?>"></i> </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
