<?php if($paginator->hasPages()): ?>
    <nav>
        <ul class="pagination paginasi">
            <?php if($paginator->onFirstPage()): ?>
            <?php else: ?>
                <li class="page-item">
                    <a href="javascript:;" halaman="<?php echo e($paginator->previousPageUrl()); ?>" class="page-link paginasi">&lsaquo;</a>
                </li>
            <?php endif; ?>
            <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(is_string($element)): ?>
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link"><?php echo e($element); ?></span></li>
                <?php endif; ?>
                <?php if(is_array($element)): ?>
                    <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($page == $paginator->currentPage()): ?>
                            <li class="page-item active" aria-current="page">  <a href="javascript:;" class="page-link"><?php echo e($page); ?></a></li>
                        <?php else: ?>
                            <li halaman="<?php echo e($url); ?>" href="javascript:;" class="page-link paginasi"><?php echo e($page); ?></a></li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php if($paginator->hasMorePages()): ?>
                <li class="page-item">
                    <a halaman="<?php echo e($paginator->nextPageUrl()); ?>" href="javascript:;"  class="page-link paginasi">&rsaquo;</a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
<?php endif; ?>
<?php /**PATH C:\laragon\www\stj.sweatboxfnp.com\resources\views/theme/web/pagination.blade.php ENDPATH**/ ?>