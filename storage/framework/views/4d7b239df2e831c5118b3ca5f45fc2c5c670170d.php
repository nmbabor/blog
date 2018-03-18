<?php echo $__env->make('backend._partials.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('backend._partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div id="page-wrapper">
<?php echo $__env->yieldContent('content'); ?>
</div>

<?php echo $__env->make('backend._partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldContent('script'); ?>

</body>

</html>