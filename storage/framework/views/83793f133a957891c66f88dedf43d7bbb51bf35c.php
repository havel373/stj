<?php if (isset($component)) { $__componentOriginal7b6721487b7b8dd63e67398e09f7d70f121b9aa3 = $component; } ?>
<?php $component = App\View\Components\AuthLayout::resolve(['title' => 'Login / Register'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('auth-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AuthLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div id="login_page">
        <div class="w-lg-500px bg-white rounded shadow-sm p-10 p-lg-15 mx-auto">
            <!--begin::Form-->
            <form class="form w-100" novalidate="novalidate" id="form_login">
                <!--begin::Heading-->
                <div class="text-center mb-10">
                    <!--begin::Title-->
                    <h1 class="text-dark mb-3">Sign In to <?php echo e(config('app.name')); ?></h1>
                    <!--end::Title-->
                </div>
                <!--begin::Heading-->
                <!--begin::Input group-->
                <div class="fv-row mb-10">
                    <!--begin::Label-->
                    <label class="form-label fs-6 fw-bolder text-dark">Username</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input class="form-control form-control-lg form-control-solid" type="text" id="username" name="username" autocomplete="off" data-login="1" />
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-10">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack mb-2">
                        <!--begin::Label-->
                        <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                        <!--end::Label-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Input-->
                    <input class="form-control form-control-lg form-control-solid" type="password" id="password" name="password" autocomplete="off" data-login="2"/>
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
                <!--begin::Actions-->
                <div class="text-center">
                    <!--begin::Submit button-->
                    <button type="button"
                      id="tombol_login" class="btn btn-lg btn-primary w-100 mb-5">
                        <span class="indicator-label">Continue</span>
                        <span class="indicator-progress">
                            Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>
                    <!--end::Submit button-->
                </div>
                <!--end::Actions-->
            </form>
            <!--end::Form-->
        </div>
    </div>
    <?php $__env->startSection('custom_js'); ?>
        <script type="text/javascript">
            auth_content('login_page');
            $("#hp").focus();
        </script>
    <?php $__env->stopSection(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7b6721487b7b8dd63e67398e09f7d70f121b9aa3)): ?>
<?php $component = $__componentOriginal7b6721487b7b8dd63e67398e09f7d70f121b9aa3; ?>
<?php unset($__componentOriginal7b6721487b7b8dd63e67398e09f7d70f121b9aa3); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\stj.sweatboxfnp.com\resources\views/pages/auth/main.blade.php ENDPATH**/ ?>