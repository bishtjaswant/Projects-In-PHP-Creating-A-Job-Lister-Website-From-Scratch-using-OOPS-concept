<?php include_once("includes/header.php"); ?>

<div class="page-header">
	<h1><?= strtoupper($job->title); ?>  At  <?= ucfirst($job->location); ?></h1>
	<small class="text-danger" style="font-size: 18px;"> Job Posted By <?= ucwords($job->contact_user) ?> On <?= $job->post_date ?>    </small>
     <hr>
     <p class="lead"> <?= $job->description ?> </p>
     <ul class="list-group">
     	<li class="list-group-item"><strong>Company</strong> <?= $job->company; ?></li>
     	<li class="list-group-item"><strong>Salary</strong>  <?= $job->salary; ?></li>
          <li class="list-group-item"><strong>Contact Email  </strong><?= $job->contact_email; ?></li>
     	<li class="list-group-item"><strong>Contact User  </strong><?= $job->contact_user; ?></li>
     </ul>

     <br>
     <div class="wel">
          
               <a href="index.php" class="btn-primary btn btn-sm">Go to Home page</a>
               <a href="edit.php?edit_id=<?= $job->id; ?>" class="btn btn-sm btn-success" >Edit</a>
              <form method="POST" action="job.php" style="display: inline;">
                   <input type="hidden" name="delete_id" value="<?=$job->id;?>" >
                   <input type="submit" name="delete_query" value="Delete" class="btn btn-sm btn-danger">
              </form>
     </div>
</div>








<?php include_once("includes/footer.php"); ?>
