<?php $__env->startSection('heading'); ?>
<h1>All Users</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

   <table class="table table-hover " id="users-table">
        <thead>
            <tr>
                
                <th>Name</th>
                <th>Email</th>
                <th>Work number</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
    </table>
  
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '<?php echo route('users.data'); ?>',
        columns: [
            
            { data: 'namelink', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'work_number', name: 'work_number' },
           <?php if(Auth::check() && Auth::user()->canDo('user.update')): ?> 
            {data: 'edit', name: 'edit', orderable: false, searchable: false  },
            <?php endif; ?>
          <?php if(Auth::check() && Auth::user()->canDo('user.delete')): ?> 
            {data: 'delete', name: 'delete', orderable: false, searchable: false  },
            <?php endif; ?>
        ]
    });
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>