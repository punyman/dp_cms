<?php $__env->startSection('heading'); ?>
<h1>All tasks</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
   <table class="table table-hover" id="tasks-table">
        <thead>
            <tr>
                
                <th>Name</th>
                <th>Created at</th>
                <th>Deadline</th>
                <th>Assigned</th>
               
            </tr>
        </thead>
    </table>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
$(function() {
    $('#tasks-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '<?php echo route('tasks.data'); ?>',
        columns: [
            
            { data: 'titlelink', name: 'title' },
            { data: 'created_at', name: 'created_at'},
            { data: 'deadline', name: 'deadline' },
            {data: 'fk_user_id_assign', name: 'fk_user_id_assign', },
        
        ]
    });
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>