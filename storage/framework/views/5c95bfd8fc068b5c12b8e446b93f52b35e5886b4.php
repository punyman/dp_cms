<?php $__env->startSection('heading'); ?>
<h1>Settings</h1>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>



<div class="row">
 <table class="table table-responsive table-hover table_wrapper" id="clients-table">
        <thead>
            <tr>
            <th></th>
            <?php foreach($permission as $perm): ?>
          
          <th><?php echo e($perm->name); ?></th>

            <?php endforeach; ?>  
  <th></th>
            </tr>
     
            
       </thead> 

 
  <?php foreach($roles as $role): ?> 
   <tr>
  <div class="col-lg-4"> 
  <?php echo Form::model($permission, [
  'method' => 'PATCH',
  'url'    => 'settings/permissionsUpdate',
  ]); ?>

       
  <th><?php echo e($role->name); ?></th>


   
    <input type="hidden" name="role_id" value="<?php echo e($role->id); ?>" />
          <?php foreach($permission as $perm): ?>
                <?php $isEnabled = !current(
            array_filter(
                    $role->permissions->toArray(), 
                    function($element) use($perm) { 
                        return $element['id'] === $perm->id; 
                    }
            )
        );  ?>

           <td> <input type="checkbox" <?php if (!$isEnabled) echo 'checked' ?> name="permissions[ <?php echo e($perm->id); ?> ]"  value="1" >
      <span class="perm-name"></span><br /></td>
        
              



      <?php endforeach; ?>

  </tr>
  </div>
    <td><?php echo Form::submit('Save Settings for Role', ['class' => 'btn btn-primary']); ?></td>  
  <?php echo Form::close(); ?>

  <?php endforeach; ?>



     
       
        </tbody>
    </table>
</div>



  
<div class="row">
    <div class="col-lg-12"><div class="sidebarheader movedown"><p>Overall settings</p></div>

     
     <?php echo Form::model($settings, [
        'method' => 'PATCH',
        'url' => 'settings/overall'
        ]); ?>

        
         <!-- *********************************************************************
     *                     Task complete       
     *********************************************************************-->
         <div class="panel panel-default movedown">
          <div class="panel-heading">Task completion</div>
          <div class="panel-body">

            If <b>Allowed</b> only user who are assigned the task &amp; the admin can complete the task. <br />
            If <b>Not allowed</b> anyone, can complete all tasks.
          </div>
        </div>
            <?php echo Form::select('task_complete_allowed', [1 => 'Allowed', 2 => 'Not Allowed'], $settings->task_complete_allowed, ['class' => 'form-control']); ?>

  <!-- *********************************************************************
     *                     Task assign       
     *********************************************************************-->
         <div class="panel panel-default movedown">
          <div class="panel-heading">Task Assigned user</div>
          <div class="panel-body">

            If <b>Allowed</b> only user who are assigned the task &amp; the admin can assign another user. <br />
            If <b>Not allowed</b> anyone, can assign another user.
          </div>
        </div>
            <?php echo Form::select('task_assign_allowed', [1 => 'Allowed', 2 => 'Not Allowed'], $settings->task_assign_allowed, ['class' => 'form-control']); ?>

  <!-- *********************************************************************
     *                     Lead complete       
     *********************************************************************-->

         <div class="panel panel-default movedown">
          <div class="panel-heading">Lead completion</div>
          <div class="panel-body">

            If <b>Allowed</b> only user who are assigned the task &amp; the admin can complete the Lead. <br />
            If <b>Not allowed</b> anyone, can complete all Leads.
          </div>
        </div>
            <?php echo Form::select('lead_complete_allowed', [1 => 'Allowed', 2 => 'Not Allowed'], $settings->lead_complete_allowed, ['class' => 'form-control']); ?>

  <!-- *********************************************************************
     *                     Lead assign       
     *********************************************************************-->
         <div class="panel panel-default movedown">
          <div class="panel-heading">Lead Assigned user</div>
          <div class="panel-body">

            If <b>Allowed</b> only user who are assigned the lead &amp; the admin can assign another user. <br />
            If <b>Not allowed</b> anyone, can assign another user.
          </div>
        </div>
         <?php echo Form::select('lead_assign_allowed', [1 => 'Allowed', 2 => 'Not Allowed'], $settings->lead_assign_allowed, ['class' => 'form-control']); ?>

         <br />
<?php echo Form::submit('Save Overall Settings', ['class' => 'btn btn-primary']); ?>

           <?php echo Form::close(); ?>

     </div>
</div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>