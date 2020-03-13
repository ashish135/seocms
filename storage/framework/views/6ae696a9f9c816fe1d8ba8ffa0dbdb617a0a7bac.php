<?php $__env->startSection('page_heading','Reporting'); ?>
<?php $__env->startSection('section'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <?php if(session('message')): ?>
                        <div class="alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Success!</strong> <?php echo e(session('message')); ?>

                        </div>
                    <?php endif; ?>
                <div class="card-body">
                    <table class="table table-striped">
                        <tbody>
                          <tr>
                            <th>Project</th>
                            <td><?php echo e($leads->Project); ?></td>
                          </tr>
                          <tr>
                            <th>Region</th>
                            <td><?php echo e($leads->Region); ?></td>
                          </tr>
                          <tr>
                            <th>Main Category</th>
                            <td><?php echo e(App\Category::find($leads->Main_Category)->name); ?></td>
                          </tr>
                          <tr>
                            <th>Sub Category</th>
                            <td><?php echo e($leads->Sub_Category); ?></td>
                          </tr>
                          <tr>
                            <th>Keyword</th>
                            <td><?php echo e($leads->Keyword); ?></td>
                          </tr>
                          <tr>
                            <th>Activity Type</th>
                            <td><?php echo e($leads->Activity_Type); ?></td>
                          </tr>
                          <tr>
                            <th>Location</th>
                            <td><?php echo e($leads->Location); ?></td>
                          </tr>
                          <tr>
                            <th>Targeted URL</th>
                            <td><?php echo e($leads->Targeted_URL); ?></td>
                          </tr>
                          <tr>
                            <th>URL After Submission</th>
                            <td><?php echo e($leads->URL_After_Submission); ?></td>
                          </tr>

                        </tbody>
                    </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('superadmin.layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/atom/Ashish/seocms/resources/views/superadmin/reporting/show.blade.php ENDPATH**/ ?>