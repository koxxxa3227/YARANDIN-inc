<?php $__env->startSection('content'); ?>
    <div class="container">
        <form action="<?php echo e(route('project-task-save')); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="id" value="<?php echo e($task->id); ?>">
            <input type="hidden" name="project_id" value="<?php echo e($project_id); ?>">

            <div class="form-group row align-items-end">
                <div class="col-lg">
                    <label for="title"><?php echo app('translator')->get("Title"); ?></label>
                    <input type="text" name="title" id="title" class="form-control" value="<?php echo e($task->title); ?>">
                </div>
                <div class="col-lg">
                    <label for="status_id"><?php echo app('translator')->get("Status"); ?></label>
                    <select name="status_id" id="status_id" class="form-control">
                        <option
                            <?php echo e($task->status_id == $task::STATUS_DONE ? 'selected'  : ''); ?> value="<?php echo e($task::STATUS_DONE); ?>"><?php echo app('translator')->get("Project task status 1"); ?></option>
                        <option
                            <?php echo e($task->status_id == $task::STATUS_IN_PROCESS ? 'selected'  : ''); ?> value="<?php echo e($task::STATUS_IN_PROCESS); ?>"><?php echo app('translator')->get("Project task status 2"); ?></option>
                        <option
                            <?php echo e($task->status_id == $task::STATUS_NEW ? 'selected'  : ''); ?> value="<?php echo e($task::STATUS_NEW); ?>"><?php echo app('translator')->get("Project task status 3"); ?></option>
                    </select>
                </div>
                <div class="col-lg">
                    <div class="custom-file">
                        <label for="file" class="custom-file-label"><?php echo app('translator')->get("File"); ?></label>
                        <input type="file" name="file" id="file">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="description"><?php echo app('translator')->get("Description"); ?></label>
                <textarea name="description" id="description" rows="10"
                          class="form-control"><?php echo e($task->description); ?></textarea>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\WebProjects\YARANDIN-Inc\resources\views/profile/projects/tasks/form.blade.php ENDPATH**/ ?>