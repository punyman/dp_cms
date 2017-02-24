<?php $__env->startSection('heading'); ?>
<h1>All tasks</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <table class="table table-hover" id="leads-table">
        <thead>
            <tr>
                
                <th>Name</th>
                <th>Created by</th>
                <th>Deadline</th>
                <th>Assigned</th>
               
            </tr>
        </thead>
    </table>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
$(function() {
    $('#leads-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '<?php echo route('leads.data'); ?>',
        columns: [
            
            { data: 'titlelink', name: 'title' },
            { data: 'fk_user_id_created', name: 'fk_user_id_created'},
             {data: 'contact_date', name: 'contact_date', },
            { data: 'fk_user_id_assign', name: 'fk_user_id_assign' },
           
        
        ]
    });
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>