<?php $__env->startSection('heading'); ?>

<h1>Edting</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<?php echo Form::model($user, [
        'method' => 'PATCH',
        'route' => ['users.update', $user->id],
        'files'=>true,
        'enctype' => 'multipart/form-data'
        ]); ?>

        
<div class="form-group">
    <?php echo Form::label('image_path', 'Choose an image:', ['class' => 'control-label']); ?>

    <?php echo Form::file('image_path',  null, ['class' => 'form-control']); ?>

</div>  


<div class="form-group">
    <?php echo Form::label('name', 'Name:', ['class' => 'control-label']); ?>

    <?php echo Form::text('name', null, ['class' => 'form-control']); ?>

</div>

<div class="form-group">
    <?php echo Form::label('email', 'Email:', ['class' => 'control-label']); ?>

    <?php echo Form::email('email', null, ['class' => 'form-control']); ?>

</div>

<div class="form-group">
    <?php echo Form::label('address', 'Address:', ['class' => 'control-label']); ?>

    <?php echo Form::text('address', null, ['class' => 'form-control']); ?>

</div>

<div class="form-group">
    <?php echo Form::label('work_number', 'Work Number:', ['class' => 'control-label']); ?>

    <?php echo Form::text('work_number',  null, ['class' => 'form-control']); ?>

</div>

<div class="form-group">
    <?php echo Form::label('personal_number', 'Personal Number:', ['class' => 'control-label']); ?>

    <?php echo Form::text('personal_number',  null, ['class' => 'form-control']); ?>

</div>  

<div class="form-group">
    <?php echo Form::label('password', 'Password:', ['class' => 'control-label']); ?>

    <?php echo Form::password('password', ['class' => 'form-control']); ?>    
</div>
<div class="form-group">
    <?php echo Form::label('password_confirmation', 'Password Confirmation:', ['class' => 'control-label']); ?>

    <?php echo Form::password('password_confirmation', ['class' => 'form-control']); ?>    
</div>
   <div class="form-group form-inline">
<?php echo Form::label('roles', ' Assign Role:', ['class' => 'control-label']); ?>

<?php echo Form::select('roles', $roles, $user->userRole->role_id, ['class' => 'form-control']); ?>


<?php echo Form::label('department', ' Assign Department:', ['class' => 'control-label']); ?>

<?php echo Form::select('department', $department, $user->departmentOne->first()->id, ['class' => 'form-control']); ?>

</div>

<?php echo Form::submit('Update User', ['class' => 'btn btn-primary']); ?>


<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>