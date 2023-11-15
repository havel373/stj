<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<?php echo $__env->make('theme.auth.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="bg-white">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - Sign-in -->
			<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(<?php echo e(asset('keenthemes/media/illustrations/progress-hd.png')); ?>)">
				<!--begin::Content-->
				<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
					<!--begin::Logo-->
					<a href="index.html" class="mb-12">
						
					</a>
					<!--end::Logo-->
					<!--begin::Wrapper-->
					<?php echo e($slot); ?>

					<!--end::Wrapper-->
				</div>
				<!--end::Content-->
			</div>
			<!--end::Authentication - Sign-in-->
		</div>
		<!--end::Main-->
		<!--begin::Javascript-->
		<?php echo $__env->make('theme.auth.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php echo $__env->yieldContent('custom_js'); ?>
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html><?php /**PATH C:\laragon\www\stj.sweatboxfnp.com\resources\views/theme/auth/main.blade.php ENDPATH**/ ?>