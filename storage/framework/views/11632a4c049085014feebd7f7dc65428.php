<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Strategic Planning App'); ?></title>

    <!-- Link to your CSS file -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <!-- Alpine.js for handling interactivity -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
</head>
<body>
    <div class="layout-container" x-data="{ open: false }">
        <!-- Left Panel Navigation -->
        <nav class="left-panel" x-show="open" x-transition>
            <h2>Navigation</h2>
            <ul>
                <li><a href="<?php echo e(route('welcome')); ?>" class="nav-link text-success">Home</a></li>
                <li><a href="<?php echo e(route('strategic-areas.index')); ?>">Strategic Areas</a></li>
                <li><a href="<?php echo e(route('objectives.index')); ?>">Objectives</a></li>
                <li><a href="<?php echo e(route('workplans.index')); ?>">Workplans</a></li>
                <li><a href="<?php echo e(route('reports.index')); ?>">Reports</a></li>
                <li><a href="<?php echo e(route('scorecards.index')); ?>">Scorecards</a></li>
            </ul>
        </nav>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Hamburger Icon to toggle navigation -->
            <button @click="open = !open" class="btn btn-primary">
                <i class="fas fa-bars"></i> <!-- Hamburger icon -->
            </button>

            <?php echo $__env->yieldContent('content'); ?> <!-- Content specific to each page will be injected here -->
        </main>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\StrategicPlanningApp4\resources\views/layouts/app.blade.php ENDPATH**/ ?>