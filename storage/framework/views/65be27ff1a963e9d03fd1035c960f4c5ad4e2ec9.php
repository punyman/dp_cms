<div id="task" class="tab-pane fade in active">
  <div class="boxspace">
    <table class="table table-hover">
      <h4>All Tasks</h4>
      <thead>
        <thead>
          <tr>
            <th>Title</th>
            <th>Assigned user</th>
            <th>Created date</th>
            <th>Deadline</th>
            <th><a href="<?php echo e(route('tasks.create', ['client' => $client->id])); ?>"><button class="btn btn-success">Add new task</button> </a></th>
            
          </tr>
        </thead>
        <tbody>
          <?php  $tr =""; ?>
          <?php foreach($client->alltasks as $task): ?>
          <?php if($task->status == 1): ?>
          <?php  $tr = '#adebad'; ?>
          <?php elseif($task->status == 2): ?>
          <?php $tr = '#ff6666'; ?>
          <?php endif; ?>
          <tr style="background-color:<?php echo $tr ;?>">
            
            <td > <a href="<?php echo e(route('tasks.show', $task->id)); ?>"><?php echo e($task->title); ?> </a></td>
            <td > <div class="popoverOption"
              rel="popover"
              data-placement="left"
              data-html="true"
              data-original-title="<span class='glyphicon glyphicon-user' aria-hidden='true'> </span> <?php echo e($task->assignee->name); ?>">
              <div id="popover_content_wrapper" style="display:none; width:250px;">
                <img src='http://placehold.it/350x150' height='80px' width='80px' style="float:left; margin-bottom:5px;"/>
                <p class="popovertext">
                  <span class="glyphicon glyphicon-envelope" aria-hidden="true"> </span>
                  <a href="mailto:<?php echo e($task->assignee->email); ?>">
                    <?php echo e($task->assignee->email); ?><br />
                  </a>
                  <span class="glyphicon glyphicon-headphones" aria-hidden="true"> </span>
                  <a href="mailto:<?php echo e($task->assignee->work_number); ?>">
                  <?php echo e($task->assignee->work_number); ?></p>
                </a>
                
              </div>
              <a href="<?php echo e(route('users.show', $task->assignee->id)); ?>"> <?php echo e($task->assignee->name); ?></a>
              
              </div> <!--Shows users assigned to task -->
            </td>
            <td><?php echo e(date('d, M Y, H:i', strTotime($task->created_at))); ?>  </td>
            <td><?php echo e(date('d, M Y', strTotime($task->deadline))); ?>

            <?php if($task->status == 1): ?>(<?php echo e($task->days_until_deadline); ?>) <?php endif; ?></td>
            <td></td>
          </tr>
          
          <?php endforeach; ?>
          
        </tbody>
      </table>
    </div>