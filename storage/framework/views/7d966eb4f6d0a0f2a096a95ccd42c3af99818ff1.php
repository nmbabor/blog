 <? $info=DB::table('about_company')->first();
$socialLinks=DB::table('social_links')->where('status',1)->get();
  ?>
<footer class="footer-widget-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <aside class="footer-widget">
                    <div class="about-img"><a href="<?php echo e(URL::to('/')); ?>"><img src='<?php echo e(asset("images/logo/$info->logo")); ?>' alt="<?php echo e($info->company_name); ?>" title="<?php echo e($info->company_name); ?>"></a></div>
                    <div class="about-content">
                        <?php echo e($info->short_description); ?>

                        <a href="<?php echo e(URL::to('about')); ?>" class="btn btn-info btn-sm">Read More</a>
                    </div>
                    <div class="address">
                        
                    </div>
                </aside>
            </div>

            <div class="col-md-4">
                <aside class="footer-widget">
                    <h3 class="widget-title text-uppercase">Quick Links</h3>
                    <ul class="footer-quick-link">
                        <li><a href="<?php echo e(URL::to('about')); ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> About  Us</a></li><li><a href="<?php echo e(URL::to('page/privacy-policy')); ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Privacy Policy</a></li>
                        <!-- <li><a href="<?php echo e(URL::to('/')); ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Contact us</a></li>
                        <li><a href="<?php echo e(URL::to('/')); ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Blog</a></li>
                        <li><a href="<?php echo e(URL::to('/')); ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Sitemap</a></li>
                        <li><a href="<?php echo e(URL::to('page/advertising')); ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Advertising</a></li> -->
                    
                    </ul>

                </aside>
            </div>
            <div class="col-md-4">
                <aside class="footer-widget">
                    <h3 class="widget-title text-uppercase">Social Links</h3>
                    <ul class="footer-quick-link">
                    <?php $__currentLoopData = $socialLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e($social->link); ?>"><i class="<?php echo e($social->icon_class); ?>"></i> <?php echo e($social->name); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </aside>
            </div>
        </div>
    </div>
    <div class="footer-copy">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div>&copy; 2017, All Rights Reserved by <a href="http://codeplanners.com" target="_blank">Code Planners</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="developed_by">Developed by <a href="http://codeplanners.com" target="_blank"><img src="public/img/codeplanners.png')}}" alt="Code Planners" style="height: 30px;"></a></div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- js files -->
<script type="text/javascript" src="<?php echo e(asset('public/frontend/js/jquery-1.11.3.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('public/frontend/js/bootstrap.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('public/frontend/js/owl.carousel.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('public/frontend/js/jquery.stickit.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/frontend/jssocials/jssocials.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('public/frontend/js/menu.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('public/frontend/js/scripts.js')); ?>"></script>
    <div id="fb-root"></div>
<script>

$('.maps').click(function () {
    $('.maps iframe').css("pointer-events", "auto");
});

$( ".maps" ).mouseleave(function() {
  $('.maps iframe').css("pointer-events", "none"); 
})
</script>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.12&appId=152285325491622&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>