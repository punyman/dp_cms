<div id="docuemnt" class="tab-pane fade">
  <table class="table">
    <h4>All Documents</h4>
    <div class="col-xs-10">
      <div class="form-group">
        <form method="POST" action="<?php echo e(url('/clients/upload', $client->id)); ?>" class="dropzone" id="dropzone" files="true" data-dz-removea
          enctype="multipart/form-data"
          >
          <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        </form>
        <p><b>max 5MB pr. file</b></p>
      </div>
    </div>
    <thead>
      <thead>
        <tr>
          <th>File</th>
          <th>Size</th>
          <th>Created at</th>
          
        </tr>
      </thead>
      <tbody>
        <?php foreach($client->documents as $document): ?>
        <tr>
          <td><a href="../files/<?php echo e($companyname); ?>/<?php echo e($document->path); ?>"  target="_blank"><?php echo e($document->file_display); ?></a></td>
          <td><?php echo e($document->size); ?> <span class="moveright"> MB</span></td>
          <td><?php echo e($document->created_at); ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    
  </div>