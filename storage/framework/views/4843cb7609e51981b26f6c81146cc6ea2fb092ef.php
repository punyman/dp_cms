<?php $__env->startSection('heading'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

   <table class="table table-hover " id="clients-table">
        <thead>
            <tr>
                
                <th>Name</th>
                <th>Company</th>
                <th>Email</th>
                <th>Number</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
    </table>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
$(function() {
    $('#clients-table').DataTable({
        processing: true,
        serverSide: true,
       
        ajax: '<?php echo route('clients.data'); ?>',
        columns: [
            
            { data: 'namelink', name: 'name' },
            { data: 'company_name', name: 'company_name' },
            { data: 'email', name: 'email' },
            { data: 'primary_number', name: 'primary_number' },
             <?php if(Auth::check() && Auth::user()->canDo('client.update')): ?> 
             { data: 'edit', name: 'edit', orderable: false, searchable: false},
             <?php endif; ?>
              <?php if(Auth::check() && Auth::user()->canDo('client.delete')): ?> 
             { data: 'delete', name: 'delete', orderable: false, searchable: false},
             <?php endif; ?>
           
        ]
    });
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>