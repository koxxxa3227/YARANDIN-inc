<?php $__env->startSection('content'); ?>
    <div class="container">
        <form action="<?php echo e(route('project-save')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="project_id" value="<?php echo e($project->id); ?>">

            <div class="form-group">
                <label for="description"><?php echo app('translator')->get("Description"); ?></label>
                <textarea name="description" id="description" rows="10"
                          class="form-control"><?php echo e($project->description); ?></textarea>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-success btn-sm">
                    <i class="fa fa-save"></i>
                    <?php echo app('translator')->get("Save"); ?>
                </button>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\WebProjects\YARANDIN-Inc\resources\views/profile/projects/form.blade.php ENDPATH**/ ?>