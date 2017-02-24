<?php $__env->startSection('content'); ?>
                <div class="col-lg-12 currenttask">
          
                    <table class="table table-hover">
         <h3>All Departments</h3>
            <thead>
    <thead>
      <tr>
        <th>Title</th>
        <th>Description</th>
		<th>Action</th>
      </tr>
    </thead>
    <tbody>

<?php foreach($roles as $role): ?>



       <tr>
<td><?php echo e($role->name); ?></td>
<td><?php echo e(Str_limit($role->description, 50)); ?></td>

<td>   <?php echo Form::open([
            'method' => 'DELETE',
            'route' => ['roles.destroy', $role->id]
        ]);; ?>

<?php if($role->id !== 1): ?>
            <?php echo Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => 'return confirm("Are you sure?")']);; ?>

<?php endif; ?>
        <?php echo Form::close();; ?></td></td>
</tr>
<?php endforeach; ?>

              </tbody>
              </table>
             
             <a href="<?php echo e(route('roles.create')); ?>"><button class="btn btn-success">Add new role</button></a>

          </div>
         
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>