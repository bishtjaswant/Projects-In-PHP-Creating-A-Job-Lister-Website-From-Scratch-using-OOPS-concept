<?php 
 require_once 'config/init.php';
// job class
$job = new Jobs;

// updation
$job_id =  ( isset($_GET['edit_id'])  ) ? $_GET['edit_id'] : null;

// grap all data
if ( isset( $_POST['post_job'] ) ) {
	$data = array();

	$data['title'] = htmlspecialchars(   strip_tags(  $_POST['title']  ) );
	$data['description'] = htmlspecialchars(   strip_tags(  $_POST['description']  ) );
	$data['location'] = htmlspecialchars(   strip_tags(  $_POST['location']  ) );
	$data['salary'] = htmlspecialchars(   strip_tags(  $_POST['salary']  ) );
	$data['company'] = htmlspecialchars(   strip_tags(  $_POST['company']  ) );
	$data['contact_email'] = htmlspecialchars(   strip_tags(  $_POST['contact_email']  ) );
	$data['contact_user'] = htmlspecialchars(   strip_tags(  $_POST['contact_user']  ) );
	$data['category_id'] = htmlspecialchars(   strip_tags(  $_POST['category_id']  ) );


// print_r($data);die;
	 if ($job->jobUpdation($job_id, $data)) {
	 	redirect("index.php","job updated","success");
	 } else {
	 	redirect("index.php","something went wrong","error");
	 	
	 }
}  

// templates class
$template = new Template('templates/update-job.php'); 
$template->job = $job->getSingleJob($job_id);
$template->categories = $job->getCategories();
echo $template; 


 ?>