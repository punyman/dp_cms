<?php $__env->startSection('content'); ?>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); //Tooltip on icons top

$('.popoverOption').each(function() {
    var $this = $(this);
    $this.popover({
      trigger: 'hover',
      placement: 'left',
      container: $this,
      html: true,
  
    });
});
});
</script>

<div class="div">

     <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>
              <?php foreach($taskCompletedThisMonth as $thisMonth): ?>
						 <?php echo e($thisMonth->total); ?>

				<?php endforeach; ?>
				</h3>

              <p><?php echo e(trans('main.Tasks completed this month')); ?></p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-book-outline"></i>
            </div>
            <a href="<?php echo e(route('tasks.index')); ?>" class="small-box-footer"><?php echo e(trans('main.All tasks')); ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>
              <?php foreach($leadCompletedThisMonth as $thisMonth): ?>
						 <?php echo e($thisMonth->total); ?>

				<?php endforeach; ?>
				</h3>

              <p>Leads completed this month</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo e(route('leads.index')); ?>" class="small-box-footer">All leads <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo e($totalClients); ?></h3>

              <p>All Clients</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="<?php echo e(route('clients.index')); ?>" class="small-box-footer">All clients <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>           
				<?php foreach($totalTimeSpent[0] as $sum => $value): ?>
				
        <?php echo e($value); ?>

				<?php endforeach; ?>
        <?php if($value == ""): ?>
        0
        <?php endif; ?></h3>

              <p>Total hours registered</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

<?php $createdTaskEachMonths = array(); $taskCreated = array();?>
<?php foreach($createdTasksMonthly as $task): ?>
		<?php $createdTaskEachMonths[] =  date('F', strTotime($task->created_at)) ?>
		<?php $taskCreated[] = $task->month;?>
<?php endforeach; ?>

<?php $completedTaskEachMonths = array(); $taskCompleted = array();?>

<?php foreach($completedTasksMonthly as $tasks): ?>
		<?php $completedTaskEachMonths[] =  date('F', strTotime($tasks->updated_at)) ?>
		<?php $taskCompleted[] = $tasks->month;?>
<?php endforeach; ?>

<?php $completedLeadEachMonths = array(); $leadsCompleted = array();?>
<?php foreach($completedLeadsMonthly as $leads): ?>
		<?php $completedLeadEachMonths[] =  date('F', strTotime($leads->updated_at)) ?>
		<?php $leadsCompleted[] = $leads->month;?>
<?php endforeach; ?>

<?php $createdLeadEachMonths = array(); $leadCreated = array();?>
<?php foreach($createdLeadsMonthly as $lead): ?>
		<?php $createdLeadEachMonths[] =  date('F', strTotime($lead->created_at)) ?>
		<?php $leadCreated[] = $lead->month;?>
<?php endforeach; ?>
<div class="row">	

    <?php echo $__env->make('partials.dashboardone', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
   

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>