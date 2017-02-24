<?php $__env->startSection('heading'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<script>
$(document).ready(function(){
$('[data-toggle="tooltip"]').tooltip(); //Tooltip on icons top
  $('.popoverOption').each(function() {
    var $this = $(this);
    $this.popover({
    trigger: 'hover',
    placement: 'left',
    container: $this,
    html: true,
    content: $this.find('#popover_content_wrapper').html()
   });
  });
});
</script>
<div class="row">
  <?php echo $__env->make('partials.clientheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php echo $__env->make('partials.userheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
<div class="row">
  <div class="col-md-8 currenttask">
    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#task">Tasks</a></li>
      <li><a data-toggle="tab" href="#lead">Leads</a></li>
      <li><a data-toggle="tab" href="#docuemnt">Documents</a></li>
      <li><a data-toggle="tab" href="#invoice">Invoices</a></li>
      
    </ul>
    <div class="tab-content">
      <?php echo $__env->make('clients.tabs.tasktab', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
    <?php echo $__env->make('clients.tabs.leadtab', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('clients.tabs.documenttab', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('clients.tabs.invoicetab', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </div>
</div>
<div class="col-md-4 currenttask">
  <div class="boxspace">
    <!--Tasks stats at some point-->
  </div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>