<div id="invoice" class="tab-pane fade">
  <div class="boxspace">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Hours</th>
          <th>Total amount</th>
          <th>Invoice sent</th>
          <th>Payment received</th>
        </tr>
      </thead>
      <tbody>
        <?php $total = 0; ?>
        <?php foreach($invoices as $invoice): ?>
        <tr>
          <td>
            <a href="<?php echo e(route('invoices.show', $invoice->id)); ?>">
            <?php echo e($invoice->id); ?>

            </a>
          </td>
          <td>
            <?php $total = 0; ?>
            <?php foreach($invoice->tasktime as $tasktime): ?>
            <?php $total += $tasktime->time; ?>
            
            <?php endforeach; ?>
            <?php echo e($total); ?>

          </td>
          <td>
            <?php $totalAmount = 0; ?>
            <?php foreach($invoice->tasktime as $payment): ?>
            <?php $totalAmount += $payment->value; ?>
            <?php endforeach; ?>
            <?php echo e($totalAmount); ?>,-
          </td>
          <td>
            <?php if($invoice->sent == 0): ?>
            <?php $color = "red"; ?>
            <?php else: ?>
            <?php $color = "green"; ?>
            <?php endif; ?>
            <p style=" color:<?php echo e($color); ?>"><?php echo e($invoice->sent ? 'yes' : 'no'); ?></p>
          </td>
          <td>
            <?php if($invoice->received == 0): ?>
            <?php $color = "red"; ?>
            <?php else: ?>
            <?php $color = "green"; ?>
            <?php endif; ?>
            <p style=" color:<?php echo e($color); ?>"><?php echo e($invoice->received ? 'yes' : 'no'); ?></p>
            
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>