<?php $__env->startSection('heading'); ?>
Edit Client (<?php echo e($client->name); ?>)
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo Form::model($client, [
        'method' => 'PATCH',
        'route' => ['clients.update', $client->id],
        ]); ?>


<div class="form-group">
    <?php echo Form::label('name', 'Name:', ['class' => 'control-label']); ?>

    <?php echo Form::text('name', null, ['class' => 'form-control']); ?>

</div>

<div class="form-group">
    <?php echo Form::label('vat', 'Vat:', ['class' => 'control-label']); ?>

    <?php echo Form::text('vat',  null, ['class' => 'form-control']); ?>

</div>  

<div class="form-group">
    <?php echo Form::label('company_name', 'Company name:', ['class' => 'control-label']); ?>

    <?php echo Form::text('company_name',  null, ['class' => 'form-control']); ?>

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
    <?php echo Form::label('zipcode', 'Zipcode:', ['class' => 'control-label']); ?>

    <?php echo Form::text('zipcode', null, ['class' => 'form-control']); ?>

</div>

<div class="form-group">
    <?php echo Form::label('city', 'City:', ['class' => 'control-label']); ?>

    <?php echo Form::text('city', null, ['class' => 'form-control']); ?>

</div>

<div class="form-group">
    <?php echo Form::label('primary_number', 'Primary Number:', ['class' => 'control-label']); ?>

    <?php echo Form::text('primary_number',  null, ['class' => 'form-control']); ?>

</div>

<div class="form-group">
    <?php echo Form::label('secondary_number', 'Secondary Number:', ['class' => 'control-label']); ?>

    <?php echo Form::text('secondary_number',  null, ['class' => 'form-control']); ?>

</div>  

<div class="form-group">
    <?php echo Form::label('industry', 'Industry:', ['class' => 'control-label']); ?> 
<?php echo Form::select('industry_id', $industries, null, ['class' => 'form-control ui search selection top right pointing search-select', 'id' => 'search-select']); ?> 
</div>  


<div class="form-group">
    <?php echo Form::label('company_type', 'Company type:', ['class' => 'control-label']); ?>

    <?php echo Form::text('company_type',  null, ['class' => 'form-control']); ?>

</div>  
<?php echo Form::label('fk_user_id', 'Assign user:', ['class' => 'control-label']); ?> 
<?php echo Form::select('fk_user_id', $users, null, ['class' => 'form-control']); ?><br />

<?php echo Form::submit('Update Client', ['class' => 'btn btn-primary']); ?>


<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>