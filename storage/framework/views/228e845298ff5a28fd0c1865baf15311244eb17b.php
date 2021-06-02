<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="card">
            <div class="card-header"><?php echo app('translator')->get("Project"); ?> #<?php echo e($project->id); ?></div>
            <div class="card-body">
                <p class="mb-2"><?php echo app('translator')->get("Author"); ?>: <?php echo e($project->user->name); ?></p>
                <p class="mb-0"><?php echo app('translator')->get("Created"); ?>: <?php echo e($project->created_at->format('d.m.Y H:i')); ?></p>
                <hr>
                <?php echo e($project->description); ?>

                <hr>
                <strong><?php echo app('translator')->get("Tasks"); ?>:</strong>
                <ul class="list-unstyled">
                    <?php $__currentLoopData = $project->tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <a href="<?php echo e(route('project-task-overview', $task->id)); ?>"><?php echo e($task->title); ?></a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <?php if($project->me_author): ?>
                <div class="card-footer text-right">
                    <a href="<?php echo e(route('project-task-create', $project->id)); ?>" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i>
                    </a>
                    <a href="<?php echo e(route('project-edit', $project->id)); ?>" class="btn btn-warning btn-sm">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="<?php echo e(route('project-delete', $project->id)); ?>" class="btn btn-danger btn-sm"
                       data-confirm="<?php echo e(__('Are you sure?')); ?>">
                        <i class="fa fa-trash"></i>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\WebProjects\YARANDIN-Inc\resources\views/profile/projects/overview.blade.php ENDPATH**/ ?>