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
                            <div class="filters">
                            <?php if(request()->get('bycalendar') == "customdate"): ?>
                                <div class="customdateview">
                                  <form action="<?php echo e(route('reporting')); ?>" method="GET">
                                    <input type="hidden" name="bycalendar" value="customdate">
                                      <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="From Date" name="fromdate" required="" value="<?php echo e(request()->get('fromdate')); ?>" />
                                      <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="To Date" name="todate" value="<?php echo e(request()->get('todate')); ?>" required="" />
                                      <button>Submit</button>
                                  </form>
                                </div>
                              <?php endif; ?>
                              <form id="calendar_form" action="<?php echo e(route('reporting')); ?>" method="GET">
                                <?php if(request()->get('bycalendar') == "day"): ?>
                                <div class="view">
                                  <a id="prev" href="/admin/reporting?bycalendar=day&daytype=prev&date=<?php echo e($today->format('Y-m-d')); ?>" class="prev btn"><</a><span class="format"><?php echo e($view); ?></span><a id="next" href="/admin/reporting?bycalendar=day&daytype=next&date=<?php echo e($today->format('Y-m-d')); ?>" class="btn next">></a>
                                </div>
                                <?php elseif(request()->get('bycalendar') == "weekly"): ?>
                                <div class="view">
                                  <a id="prev" href="/admin/reporting?bycalendar=weekly&daytype=prev&date=<?php echo e($today->format('Y-m-d')); ?>" class="prev btn"><</a><span class="format"><?php echo e($view); ?></span><a id="next" href="/admin/reporting?bycalendar=weekly&daytype=next&date=<?php echo e($today->format('Y-m-d')); ?>" class="btn next">></a>
                                </div>
                                <?php elseif(request()->get('bycalendar') == "monthly"): ?>
                                <div class="view">
                                  <a id="prev" href="/admin/reporting?bycalendar=monthly&daytype=prev&date=<?php echo e($today->format('Y-m-d')); ?>" class="prev btn"><</a><span class="format"><?php echo e($view); ?></span><a id="next" href="/admin/reporting?bycalendar=monthly&daytype=next&date=<?php echo e($today->format('Y-m-d')); ?>" class="btn next">></a>
                                </div>
                                <?php endif; ?>
                                <select name="bycalendar" onchange="return handleCalendar(); ">
                                  <option value="">Select View</option>
                                  <option value="day" <?php echo e(request()->get('bycalendar') == "day" ? 'selected' : ''); ?>>Day</option><
                                  <option value="weekly" <?php echo e(request()->get('bycalendar') == "weekly" ? 'selected' : ''); ?>>Weekly</option>
                                  <option value="monthly" <?php echo e(request()->get('bycalendar') == "monthly" ? 'selected' : ''); ?>>Monthly</option>
                                   <option value="customdate" <?php echo e(request()->get('bycalendar') == "customdate" ? 'selected' : ''); ?>>Custom Date</option>
                                </select>
                                <a class="btn" href="<?php echo e(route('reporting')); ?>">Clear</a>
                              </form>
                            </div>
                            <div class="filters">
                              <form id="filter_form" action="<?php echo e(route('reporting')); ?>" method="GET">
                                <select name="project" onchange="return handleFilter(); ">
                                  <option value="">All Projects</option>
                                  <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($p->projectname); ?>" <?php echo e(request()->get('project') == $p->projectname ? 'selected' : ''); ?>><?php echo e($p->projectname); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <select name="maincategory" onchange="return handleFilter(); ">
                                  <option value="">Main Categories</option>
                                  <?php $__currentLoopData = $maincategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($mc->name); ?>" <?php echo e($mc->name == request()->get('maincategory') ? 'selected' : ''); ?>><?php echo e($mc->name); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <select name="subcategory" onchange="return handleFilter(); ">
                                  <option value="">Sub Categories</option>
                                  <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($c->name); ?>" <?php echo e($c->name == request()->get('subcategory') ? 'selected' : ''); ?>><?php echo e($c->name); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <select name="keyword" onchange="return handleFilter(); ">
                                  <option value="">All Keywords</option>
                                  <?php $__currentLoopData = $keywords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($k->name); ?>" <?php echo e($k->name == request()->get('keyword') ? 'selected' : ''); ?>><?php echo e($k->name); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <select name="region" onchange="return handleFilter(); ">
                                  <option value="">All Region</option>
                                  <?php $__currentLoopData = $regions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($r->name); ?>" <?php echo e($r->name == request()->get('region') ? 'selected' : ''); ?>><?php echo e($r->name); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <select name="activity" onchange="return handleFilter(); ">
                                  <option value="">All Activity</option>
                                  <?php $__currentLoopData = $activitys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($a->name); ?>" <?php echo e($a->name == request()->get('activity') ? 'selected' : ''); ?>><?php echo e($a->name); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <a class="btn" href="<?php echo e(route('reporting')); ?>">Clear</a>
                              </form>
                            </div>
                            <table class="table table-hover">
                                <thead>
                                  <tr>
                                    <th>Project</th>
                                    <th>Main Category</th>
                                    <th>Sub Category</th>
                                    <th>Keywords</th>
                                    <th>Targated Region</th>
                                    <th>Activity</th>
                                    <th>Created At</th>
                                  </tr>
                                </thead>
                                 <tbody>
                                <?php $__currentLoopData = $leads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <tr>
                                    <td><?php echo e($page->Project); ?></td>
                                    <td><?php echo e(App\Category::find($page->Main_Category)->name); ?></td>
                                    <td><?php echo e($page->Sub_Category); ?></td>
                                    <td><?php echo e($page->Keyword); ?></td>
                                    <td><?php echo e($page->Region); ?></td>
                                    <td><?php echo e($page->Activity_Type); ?></td>
                                    <td><?php echo e(Carbon\Carbon::parse($page->created_at)->format('F j, Y')); ?></td>
                                    <td><a href="<?php echo e(asset('/admin/reporting/'.$page->id)); ?>">View</a></td>
                                  </tr>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                              </table>
                       
                    </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footerscript'); ?>
<script type="text/javascript">
function handleFilter(e){
  $('#filter_form').submit();
}
function handleCalendar(e){
  $('#calendar_form').submit();
}
$('#prev').click(function(){
  var queryString = location.search;
  var urlParams = new URLSearchParams(queryString);
  var search_params = new URLSearchParams(queryString); 

// new value of "id" is set to "101"
search_params.set('viewcount', '101');
  //window.location.search = urlParams.set('viewcount', 2);
  console.log(urlParams.get('viewcount'), urlParams.get('bycalendar'));
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('superadmin.layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/atom/Ashish/seocms/resources/views/superadmin/reporting/index.blade.php ENDPATH**/ ?>