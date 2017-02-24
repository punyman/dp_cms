




<br/><br/>
<div class="col-sm-6">

    <div class="box box-primary">
        <div class="box-header with-border">
             <h4 class="box-title"
              >
                 Tasks each month
             </h4>
             <div class="box-tools pull-right">
                <button type="button" id="collapse1" class="btn btn-box-tool"    data-toggle="collapse"
                 data-target="#collapseOne"><i id="toggler1" class="fa fa-minus"></i>
                </button>
              </div>
        </div>
        <div id="collapseOne" class="panel-collapse">
            <div class="box-body">
              <div>
                  <graphline class="chart" :labels="<?php echo e(json_encode($createdTaskEachMonths)); ?>" :values="<?php echo e(json_encode($taskCreated)); ?>" :valuesextra="<?php echo e(json_encode($taskCompleted)); ?>"></graphline>
              </div>
            </div>
        </div>
    </div>
     <div class="box box-primary">
        <div class="box-header with-border">
             <h4 class="box-title"
>
                 Leads each month
             </h4>
             <div class="box-tools pull-right">
                <button type="button" id="collapse2" class="btn btn-box-tool" data-toggle="collapse"
                 data-target="#collapseTwo"><i id="toggler2" class="fa fa-minus"></i>
                </button>
              </div>
        </div>
        <div id="collapseTwo" class="panel-collapse">
            <div class="box-body">
              <div >
                <graphline class="chart" :labels="<?php echo e(json_encode($createdLeadEachMonths)); ?>" :values="<?php echo e(json_encode($leadCreated)); ?>" :valuesextra="<?php echo e(json_encode($leadsCompleted)); ?>"></graphline>

              </div>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-6">

  <div class="col-lg-12">
          <!-- Info Boxes Style 2 -->
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="ion ion-ios-book-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">All Tasks</span>
              <span class="info-box-number"><?php echo e($allCompletedTasks); ?> / <?php echo e($alltasks); ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: <?php echo e($totalPercentageTasks); ?>%"></div>
              </div>
                  <span class="progress-description">
                    <?php echo e(number_format($totalPercentageTasks, 0)); ?>% Completed
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
 </div>
          <div class="col-lg-12">
          <!-- /.info-box -->
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="ion ion-stats-bars"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">All Leads</span>
              <span class="info-box-number"><?php echo e($allCompletedLeads); ?> / <?php echo e($allleads); ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: <?php echo e($totalPercentageLeads); ?>%"></div>
              </div>
                  <span class="progress-description">
                    <?php echo e(number_format($totalPercentageLeads, 0)); ?>% Completed
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>

</div>
<div class="col-sm-12">

    <div class="box box-primary">
        <div class="box-header with-border">
             <h4 class="box-title"
              >
                 Users
             </h4>
             <div class="box-tools pull-right">

              </div>
        </div>
        <div id="collapseOne" class="panel-collapse">
            
<?php foreach($users as $user): ?>
<div class="col-lg-1">
  <?php if($user->isOnline()): ?>
    <i class="dot-online" data-toggle="tooltip" title="Online" data-placement="left"></i>
  <?php else: ?>
    <i class="dot-offline" data-toggle="tooltip" title="Offline" data-placement="left"></i>
  <?php endif; ?>
  <a href="<?php echo e(route('users.show', $user->id)); ?>">
  <img class="small-profile-picture" data-toggle="tooltip" title="<?php echo e($user->name); ?>" data-placement="left"
  <?php if($user->image_path != ""): ?>
      src="images/<?php echo e($companyname); ?>/<?php echo e($user->image_path); ?>"
  <?php else: ?>
      src="images/default_avatar.jpg"
  <?php endif; ?> />
   </a>

</div>
  
<?php endforeach; ?>
            
        </div>
    </div>
    </div>


</div>
      </div>  


         <!-- Info boxes -->
      <div class="row movedown">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-book-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Tasks completed today</span>
              <span class="info-box-number"><?php echo e($completedTasksToday); ?><small></small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-ios-book-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Tasks created today</span>
              <span class="info-box-number"><?php echo e($createdTasksToday); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-stats-bars"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Leads Completed today</span>
              <span class="info-box-number"><?php echo e($completedLeadsToday); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-stats-bars"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Leads created today</span>
              <span class="info-box-number"><?php echo e($createdLeadsToday); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
        </div>
    </div>
          <!-- /.info-box -->
    
