<div id="lead" class="tab-pane fade">
  <div class="boxspace">
    <table class="table table-hover">
      <h4>All Leads</h4>
      <thead>
        <thead>
          <tr>
            <th>Title</th>
            <th>Assigned user</th>
            <th>Created date</th>
            <th>Contact at</th>
            
            <th><a href="<?php echo e(route('leads.create', ['client' => $client->id])); ?>"><button class="btn btn-success">Add new lead</button> </a></th>
            
          </tr>
        </thead>
        <tbody>
          <?php  $tr =""; ?>
          <?php foreach($client->allleads as $lead): ?>
          <?php if($lead->status == 1): ?>
          <?php  $tr = '#adebad'; ?>
          <?php elseif($lead->status == 2): ?>
          <?php $tr = '#ff6666'; ?>
          <?php endif; ?>
          <tr style="background-color:<?php echo $tr ;?>">
            
            <td > <a href="<?php echo e(route('leads.show', $lead->id)); ?>"><?php echo e($lead->title); ?> </a></td>
            <td > <div class="popoverOption"
              rel="popover"
              data-placement="left"
              data-html="true"
              data-original-title="<span class='glyphicon glyphicon-user' aria-hidden='true'> </span> <?php echo e($lead->assignee->name); ?>">
              <div id="popover_content_wrapper" style="display:none; width:250px;">
                <img src='http://placehold.it/350x150' height='80px' width='80px' style="float:left; margin-bottom:5px;"/>
                <p class="popovertext">
                  <span class="glyphicon glyphicon-envelope" aria-hidden="true"> </span>
                  <a href="mailto:<?php echo e($lead->assignee->email); ?>">
                    <?php echo e($lead->assignee->email); ?><br />
                  </a>
                  <span class="glyphicon glyphicon-headphones" aria-hidden="true"> </span>
                  <a href="mailto:<?php echo e($lead->assignee->work_number); ?>">
                  <?php echo e($lead->assignee->work_number); ?></p>
                </a>
                
              </div>
              <a href="<?php echo e(route('users.show', $lead->assignee->id)); ?>"> <?php echo e($lead->assignee->name); ?></a>
              
              </div> <!--Shows users assigned to lead -->
            </td>
            <td><?php echo e(date('d, M Y, H:i', strTotime($lead->cotact_date))); ?>  </td>
            <td><?php echo e(date('d, M Y', strTotime($lead->contact_date))); ?>

            <?php if($lead->status == 1): ?>(<?php echo e($lead->days_until_contact); ?>)<?php endif; ?> </td>
            <td></td>
          </tr>
          
          <?php endforeach; ?>
          
        </tbody>
      </table>
    </div>
  </div>