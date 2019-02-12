<?php include_once './includes/header.php'; ?>

<div class="jumbotron">
	<h3>India's first Jobs listing web site </h3>
	<p class="lead">let's get started with Jaswant Singh Bisht</p> 

        <form action="<?= htmlspecialchars( $_SERVER['PHP_SELF'] , ENT_QUOTES );    ?>" method="GET">
        	   <select name="category" class="form-control" id="">
                	<option value="">choose gategory</option>
           		<?php foreach($categories as $category): ?>
                  	<option value="<?= $category->id;  ?>">   <?= strtoupper($category->name );  ?>   </option>
           		<?php endforeach; ?>
           </select>
           <br><hr>
           <button type="submit" class="btn btn-info btn-sm">Get Jobs </button>
        </form>

</div>
  
<h2>  <?= strtoupper($title); ?></h2>



<!--  -->
     <?php  if ( count($jobs) > 0 &&  isset($jobs)   ) :   ?>
               <?php foreach ($jobs as $job): ?>
					<div class="row marketing">
						<!-- 3rd list -->
						<div class="col-md-10">
							<h4><?= strtoupper($job->title) ?></h4>
						    <p> <?= substr($job->description, 0, 250) ?> ... </p>
						    <p class="badge badge-info"> <?= $job->company ?></p>
						 </div>
						<div class="col-md-2">
							<a href="job.php?id=<?= $job->id; ?>" class="btn btn-info pull-right">  detail</a>
						</div>
					</div>
					<?php endforeach; ?>

     	<?php else: ?>
                   <div class="row marketing">
                   	     <div class="col-md-10">
                   	     	<p class="text-danger text-center" style="font-size: 20px;text-transform: capitalize;">there are not available jobs </p>
                   	     </div>
                   </div>
     	<?php endif; ?>

<!--  -->

<?php include_once './includes/footer.php'; ?>