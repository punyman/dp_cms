<?php $__env->startSection('content'); ?>
         
          <div class="row">
           <h3>All Integrations</h3>
       <div class="col-sm-4">
<?php foreach($check as $check): ?>
		<?php if($check->name == "Dinero"): ?>
				<?php $dinero = "Dinero OK" ?>

		<?php endif; ?>
<?php endforeach; ?>
 		<img src="imagesIntegration/dinero-logo.png" width="50%" align="center" alt="">
 	
 		<?php echo Form::open([
            'route' => 'integrations.store'
        ]); ?>

	<div class="form-group">
    <?php echo Form::label('api_key', 'Api Key:', ['class' => 'control-label']); ?>

    <?php echo Form::text('api_key', null, ['class' => 'form-control']); ?>

</div>


<div class="form-group">
    <?php echo Form::label('org_id', 'Orginatzion Id:', ['class' => 'control-label']); ?>

    <?php echo Form::text('org_id', null, ['class' => 'form-control']); ?>

</div>



 <?php echo Form::hidden('name', 'Dinero'); ?>

 <?php echo Form::hidden('api_type', 'billing'); ?>


        <?php echo Form::submit('Update', ['class' => 'btn btn-primary']); ?>


		<?php echo Form::close(); ?>

		     </div>

      <div class="col-sm-4">
 
 		<img src="imagesIntegration/billy-logo-final_blue.png" width="50%" align="center" alt="">
 		<?php echo Form::open([
 
        ]); ?>

	<div class="form-group">
    <?php echo Form::label('api_key', 'Api Key:', ['class' => 'control-label']); ?>

    <?php echo Form::text('api_key', null, ['class' => 'form-control']); ?>

</div>


 <?php echo Form::hidden('name', 'Billy'); ?>

<?php echo Form::hidden('api_type', 'billing'); ?>

        <?php echo Form::submit('Update', ['class' => 'btn btn-primary']); ?>


		<?php echo Form::close(); ?>

		     </div>
</div>

	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>