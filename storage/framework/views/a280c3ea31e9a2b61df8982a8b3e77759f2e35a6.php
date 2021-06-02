<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="card">
            <div class="card-header"><?php echo app('translator')->get("Project"); ?> #<?php echo e($task->project_id); ?> : <?php echo e($task->title); ?></div>
            <div class="card-body">
                <?php echo e($task->description); ?>

                <?php if($task->file): ?>
                    <hr>
                    <a href="<?php echo e(route('get-file', $task->file->id)); ?>">
                        <i class="fa fa-download"></i>
                        <?php echo app('translator')->get("Download file"); ?>
                    </a>
                <?php endif; ?>
                <hr>
                <div class="text-right">
                    <?php if($task->status_id == $task::STATUS_DONE): ?>
                        <div class="text-success">
                            <i class="fas fa-dot-circle"></i>
                            <?php echo app('translator')->get("Project task status 1"); ?>
                        </div>
                    <?php elseif($task->status_id == $task::STATUS_IN_PROCESS): ?>
                        <div class="text-warning">
                            <i class="fa fa-spinner"></i>
                            <?php echo app('translator')->get("Project task status 2"); ?>
                        </div>
                    <?php elseif($task->status_id == $task::STATUS_NEW): ?>
                        <div class="text-info">
                            <i class="far fa-dot-circle"></i>
                            <?php echo app('translator')->get("Project task status 3"); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php if($task->me_author): ?>
                <div class="card-footer text-right">
                    <a href="<?php echo e(route('project-task-edit', $task->id)); ?>" class="btn btn-warning btn-sm">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="<?php echo e(route('project-task-delete', $task->id)); ?>" class="btn btn-danger btn-sm"
                       data-confirm="<?php echo e(__('Are you sure?')); ?>">
                        <i class="fa fa-trash"></i>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\WebProjects\YARANDIN-Inc\resources\views/profile/projects/tasks/overview.blade.php ENDPATH**/ ?>