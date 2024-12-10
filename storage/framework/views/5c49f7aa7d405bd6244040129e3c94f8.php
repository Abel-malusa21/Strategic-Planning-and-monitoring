<?php $__env->startSection('title', 'Edit Strategic Area'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Edit Strategic Area</h1>
    <form action="<?php echo e(route('strategic-areas.update', $strategicArea->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="<?php echo e($strategicArea->name); ?>" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea id="description" name="description" class="form-control" required><?php echo e($strategicArea->description); ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Strategic Area</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\StrategicPlanningApp4\resources\views/strategic-areas/edit.blade.php ENDPATH**/ ?>