<?php $__env->startSection('page_heading', $employee->projectname ); ?>

<?php $__env->startSection('section'); ?>
	<div class="col-sm-12">
		
		<?php $__env->startSection('collapsible_panel_title', $employee->region); ?>
		<?php $__env->startSection('collapsible_panel_link', route('lead.create',['id'=>$employee->id]) ); ?>
		<?php $__env->startSection('collapsible_panel_body'); ?>
		<table class="leadstable">
			<thead>
				<tr>
					<th>Location</th>
					<th>Main Category</th>
					<th>Sub Category</th>
					<th>Activty</th>
					<th>Keyowrd</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $__currentLoopData = $leads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($lea->Location); ?></td>
					<td><?php echo e($lea->Main_Category); ?></td>
					<td><?php echo e($lea->Sub_Category); ?></td>
					<td><?php echo e($lea->Activity_Type); ?></td>
					<td><?php echo e($lea->Keyword); ?></td>
					<td><a href="/admin/project/lead/<?php echo e($lea->id); ?>">View</a></td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
		</table>
		<?php $__env->stopSection(); ?>
		<?php echo $__env->make('superadmin.widgets.panel', array('header'=>true, 'as'=>'collapsible'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('superadmin.layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/atom/Ashish/seocms/resources/views/superadmin/panel.blade.php ENDPATH**/ ?>