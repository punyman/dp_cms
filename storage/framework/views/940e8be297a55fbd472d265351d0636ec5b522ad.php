<?php $__env->startSection('heading'); ?>
<h1>Create Lead</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php echo Form::open([
        'route' => 'leads.store'
        ]); ?>


<div class="form-group">
    <?php echo Form::label('title', 'Title:', ['class' => 'control-label']); ?>

    <?php echo Form::text('title', null, ['class' => 'form-control']); ?>

</div>

<div class="form-group">
    <?php echo Form::label('note', 'Note:', ['class' => 'control-label']); ?>

    <?php echo Form::textarea('note', null, ['class' => 'form-control']); ?>

</div>

<div class="form-inline">
<div class="form-group col-lg-3 removeleft">
    <?php echo Form::label('status', 'Status:', ['class' => 'control-label']); ?>

    <?php echo Form::select('status', array(
    '1' => 'Contact Client', '2' => 'Completed'), null, ['class' => 'form-control'] ); ?>

 </div>
 <div class="form-group col-lg-4 removeleft">
        <?php echo Form::label('contact_date', 'Next follow up:', ['class' => 'control-label']); ?>

    <?php echo Form::date('contact_date', \Carbon\Carbon::now()->addDays(7), ['class' => 'form-control']); ?>

    </div>
    <div class="form-group col-lg-5 removeleft removeright">
      <?php echo Form::label('contact_time', 'Time:', ['class' => 'control-label']); ?>

     <?php echo Form::time('contact_time', '11:00', ['class' => 'form-control']); ?>

     </div>

</div>

   
    <div class="form-group">
<?php echo Form::label('fk_user_id_assign', ' Assign User:', ['class' => 'control-label']); ?>

<?php echo Form::select('fk_user_id_assign', $users, null, ['class' => 'form-control']); ?>

</div>
 <div class="form-group">
 <?php if(Request::get('client') != ""): ?>
 <?php echo Form::hidden('fk_client_id', Request::get('client')); ?>

 <?php else: ?>
<?php echo Form::label('fk_client_id', 'Assign Client:', ['class' => 'control-label']); ?>

<?php echo Form::select('fk_client_id', $clients, null, ['class' => 'form-control']); ?>

<?php endif; ?>
</div>


  
    

</div>

<?php echo Form::submit('Create New Task', ['class' => 'btn btn-primary']); ?>


<?php echo Form::close(); ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>