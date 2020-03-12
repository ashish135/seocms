<?php $__env->startSection('page_heading','Projects'); ?>
<?php $__env->startSection('section'); ?>
 <?php if(\Session::has('success')): ?>
        <div class="alert alert-success">
            <?php echo e(\Session::get('success')); ?>

        </div>
<?php endif; ?>
<div class="row">
    <div class="topheading">
        <div class="col-md-6 text-left">
        </div>
        <div class="col-md-6 text-right">
            <a href="/admin/projects/create" class="btn btn-primary">Add New</a>
        </div>
    </div>
    <div class="col-md-12">
        <div class="lstofproject">
            <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">26</div>
                                    <div><?php echo e($project->projectname); ?></div>
                                    <div><span>Region : </span><?php echo e($project->region); ?></div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo e(route('projects.show',['project'=>$project->id])); ?>">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
             </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
</div>   
            
            
<?php $__env->stopSection(); ?>

<?php echo $__env->make('superadmin.layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/atom/Ashish/seocms/resources/views/superadmin/projects.blade.php ENDPATH**/ ?>