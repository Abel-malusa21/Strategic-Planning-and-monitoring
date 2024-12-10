<?php $__env->startSection('content'); ?>
    <h1>Add Strategic Area</h1>
    <form action="<?php echo e(route('strategic-areas.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="form-group mt-3">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-success mt-3">Save</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\StrategicPlanningApp4\resources\views/strategic-areas/create.blade.php ENDPATH**/ ?>