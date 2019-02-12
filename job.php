<?php require_once 'config/init.php'; ?>

<?php 

// job class
$job = new Jobs;
// templates class

// deletion
if (isset($_POST['delete_query'])) {
	$delete_id = $_POST['delete_id'];

	if ($job->deletionOfJob($delete_id)) {
		
	 	redirect("index.php","job deleted","success");
	} else {
	 	redirect("index.php","detetion query failed due to some reason","error");
		
	}
}  


$template = new Template('templates/single-job.php'); 

// get single job by id
$job_id =  ( isset($_GET['id'])  ) ? $_GET['id'] : null;
$template->job = $job->getSingleJob($job_id);
// print_r($template->job);die;
echo $template; 


 ?>