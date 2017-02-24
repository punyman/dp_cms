<?php $__env->startSection('heading'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});


</script>

<div class="row">
<?php echo $__env->make('partials.clientheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('partials.userheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


</div>

     <div class="row">
        <div class="col-md-9">
          <div class="taskcase">

          <h3><?php echo e($tasks->title); ?></h3>
          <hr class="grey">
          <p><?php echo e($tasks->description); ?></p>
          <p class="smalltext">Created at: 
          <?php echo e(date('d F, Y, H:i:s', strtotime($tasks->created_at))); ?> 
          <?php if($tasks->updated_at != $tasks->created_at): ?> 
          <br/>Modified at: <?php echo e(date('d F, Y, H:i:s', strtotime($tasks->updated_at))); ?>

          <?php endif; ?></p>
          

              
      </div>
    
          <?php $count = 0;?>

           <?php $i=1 ?>
          <?php foreach($tasks->comments as $comment): ?>
          <div class="taskcase" style="margin-top:15px; padding-top:10px;">
                  <p  class="smalltext">#<?php echo e($i++); ?></p>
                  <p>  <?php echo e($comment->description); ?></p>
                  <p class="smalltext">Comment by: <a href="<?php echo e(route('users.show', $comment->user->id)); ?>"> <?php echo e($comment->user->name); ?> </a></p>
                            <p class="smalltext">Created at: 
          <?php echo e(date('d F, Y, H:i:s', strtotime($comment->created_at))); ?> 
          <?php if($comment->updated_at != $comment->created_at): ?> 
          <br/>Modified at: <?php echo e(date('d F, Y, H:i:s', strtotime($comment->updated_at))); ?>

          <?php endif; ?></p>
                  </div>
          <?php endforeach; ?>
  <br />
         <?php echo Form::open(array('url' => array('/tasks/comments',$tasks->id, ))); ?>

          <div class="form-group">
    <?php echo Form::textarea('description', null, ['class' => 'form-control']); ?>

    
    <?php echo Form::submit('Submit', ['class' => 'btn btn-primary']); ?>

</div>
        <?php echo Form::close(); ?>


          </div>
          <div class="col-md-3">
          <div class="sidebarheader">
            <p>Task information</p>
             </div>
          <div class="sidebarbox">
            <p>Assigned to:
            <a href="<?php echo e(route('users.show', $tasks->assignee->id)); ?>">
             <?php echo e($tasks->assignee->name); ?></a></p>
            <p>Created at: <?php echo e(date('d F, Y, H:i', strtotime($tasks->created_at))); ?> </p>
           
            <?php if($tasks->days_until_deadline): ?>
             <p >Deadline: <span style="color:red;"><?php echo e(date('d, F Y', strTotime($tasks->deadline))); ?>


              <?php if($tasks->status == 1): ?>(<?php echo $tasks->days_until_deadline; ?>)<?php endif; ?></span></p><!--Remove days left if tasks is completed-->

             <?php else: ?>
             <p >Deadline: <span style="color:green;"><?php echo e(date('d, F Y', strTotime($tasks->deadline))); ?>


             <?php if($tasks->status == 1): ?>(<?php echo $tasks->days_until_deadline; ?>)<?php endif; ?></span></p> <!--Remove days left if tasks is completed-->
             <?php endif; ?>
       
            <?php if($tasks->status == 1): ?>
            Task status: Open
            <?php else: ?>
            Task status: Closed
            <?php endif; ?>
            </div>   
            <?php if($tasks->status == 1): ?>

          <?php echo Form::model($tasks, [
         'method' => 'PATCH',
          'url' => ['tasks/updateassign', $tasks->id],
          ]); ?>

           <?php echo Form::select('fk_user_id_assign', $users, null, ['class' => 'form-control ui search selection top right pointing search-select', 'id' => 'search-select']); ?>

          <?php echo Form::submit('Assign new user', ['class' => 'btn btn-primary form-control closebtn']); ?>

       <?php echo Form::close(); ?>


                <?php echo Form::model($tasks, [
          'method' => 'PATCH',
          'url' => ['tasks/updatestatus', $tasks->id],
          ]); ?>

            
          <?php echo Form::submit('Close task', ['class' => 'btn btn-success form-control closebtn']); ?>

       <?php echo Form::close(); ?>


            <?php endif; ?>
             <div class="sidebarheader">
            <p>Time Managment</p>
            </div>
         <table class="table table_wrapper ">
           <tr>
             <th>Title</th>
             <th>Time</th>
           </tr>
           <tbody>
            <?php foreach($tasktimes as $tasktime): ?>
            <tr>
             <td style="padding: 5px"><?php echo e($tasktime->title); ?></td> 
             <td style="padding: 5px"><?php echo e($tasktime->time); ?> </td>
             </tr>
            <?php endforeach; ?>
           </tbody>
         </table>
  <br/>
       <button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#ModalTimer">
  Add Time
</button>

       <button type="button" class="btn btn-primary form-control movedown" data-toggle="modal" data-target="#myModal">
  Create Invoice
</button>

<div class="activity-feed movedown">
          <?php foreach($tasks->activity as $activity): ?>
          <div class="feed-item">
          <div class="activity-date"><?php echo e(date('d, F Y H:i', strTotime($activity->created_at))); ?></div>
             <div class="activity-text"><?php echo e($activity->text); ?></div>
                
                </div>
        <?php endforeach; ?>
</div>
<div class="modal fade" id="ModalTimer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Time Managment For This Task  (<?php echo e($tasks->title); ?>)</h4>
      </div>

      <div class="modal-body">
      
          <?php echo Form::open([
          'method' => 'post',
          'url' => ['tasks/updatetime', $tasks->id],
          ]); ?>


<div class="form-group">
    <?php echo Form::label('title', 'Title:', ['class' => 'control-label']); ?>

    <?php echo Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Fx Consultation Meeting']); ?>

</div>
<div class="form-group">
    <?php echo Form::label('comment', 'Description:', ['class' => 'control-label']); ?>

    <?php echo Form::textarea('comment', null, ['class' => 'form-control', 'placeholder' => 'Short Comment about whats done(Will show on Invoice)']); ?>

</div>
<div class="form-group">
    <?php echo Form::label('value', 'Hourly price(DKK):', ['class' => 'control-label']); ?>

    <?php echo Form::text('value', null, ['class' => 'form-control', 'placeholder' => '300']); ?>

</div>
<div class="form-group">
    <?php echo Form::label('time', 'Time spend (Hours):', ['class' => 'control-label']); ?>

    <?php echo Form::text('time', null, ['class' => 'form-control', 'placeholder' => '3']); ?>

</div>
    


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default col-lg-6" data-dismiss="modal">Close</button>
    <div class="col-lg-6">
        <?php echo Form::submit('Register time', ['class' => 'btn btn-success form-control closebtn']); ?>

        </div>
       <?php echo Form::close(); ?>

      </div>
    </div>
  </div>
</div>




<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Create Invoice</h4>
      </div>

      <div class="modal-body">

               <?php echo Form::model($tasks, [
          'method' => 'POST',
          'url' => ['tasks/invoice', $tasks->id],
          ]); ?>

     <?php if($apiconnected): ?>     
               <?php foreach($contacts as $key => $contact): ?>
        <?php echo Form::radio('invoiceContact', $contact['guid']); ?>

        <?php echo e($contact['name']); ?>

    <br />
  <?php endforeach; ?>
            <?php echo Form::label('mail', 'Send mail with invoice to Customer?(Cheked = Yes):', ['class' => 'control-label']); ?>

        <?php echo Form::checkbox('sendMail', true); ?>

               <?php endif; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default col-lg-6" data-dismiss="modal">Close</button>
    <div class="col-lg-6">
        <?php echo Form::submit('Create Invoice', ['class' => 'btn btn-success form-control closebtn']); ?>

        </div>
       <?php echo Form::close(); ?>


      </div>
    </div>
  </div>
</div>


             </div>
         
            </div> 
          </div>

        </div>


     
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>