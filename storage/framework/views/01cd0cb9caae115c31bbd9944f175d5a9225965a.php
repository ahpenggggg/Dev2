<link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <!--  <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    You are logged in!
                </div>
            </div> -->

            <div class="blocks">
              <ul id="homeblocks">
                <li id="salesRecord" ><a href="<?php echo e(route('addItem')); ?>">Add/Remove Sales Record</a></li>
                <li id="editRecord"><a href="<?php echo e(route('editRecord')); ?>">Edit Sales Record</a></li>
                <li id="displaySales"><a href="<?php echo e(route('displaySales')); ?>">Display Sales Record</a></li>
                <li id="inventoryRecord"><a href="<?php echo e(route('addInventory')); ?>">Add/Remove Inventory</a></li>
                <li id="displayInventory"><a href="<?php echo e(route('displayInventory')); ?>">Display Inventory</a></li>
              </ul>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>