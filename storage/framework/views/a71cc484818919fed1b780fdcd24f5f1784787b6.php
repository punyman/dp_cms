<?php $__env->startSection('content'); ?>
                <div class="col-lg-12 currenttask">
          
                    <table class="table table-hover">
         <h3>All Departments</h3>
            <thead>
    <thead>
      <tr>
        <th>Title</th>
        <th>Description</th>
        <?php if(Auth::check() && Auth::user()->hasRole('administrator')): ?> 
		<th>Action</th>
    <?php endif; ?>
      </tr>
    </thead>
    <tbody>

<?php foreach($department as $dep): ?>

       <tr>
<td><?php echo e($dep->name); ?></td>
<td><?php echo e(Str_limit($dep->description, 50)); ?></td>
<?php if(Auth::check() && Auth::user()->hasRole('administrator')): ?> 
<td>   <?php echo Form::open([
            'method' => 'DELETE',
            'route' => ['departments.destroy', $dep->id]
        ]);; ?>


            <?php echo Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => 'return confirm("Are you sure?")']);; ?>


        <?php echo Form::close();; ?></td></td>
        <?php endif; ?>
</tr>
<?php endforeach; ?>

              </tbody>
              </table>

          </div>
         
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>