<?php 
require_once 'config/init.php';
// job class
$job = new Jobs;
// templates class
$template = new Template('templates/frontpage.php'); 

// get job by filter
$category =  ( isset($_GET['category'])  ) ? $_GET['category'] : null;
if ($category) {
	$template->jobs = $job->getJobByCategory($category);
	$template->title = "Jobs Available in ". $job->getCategoryName($category)->name;
    $template->categories = $job->getCategories();

} else {
	$template->title = 'latest job' ;
	$template->jobs = $job->getAllJobs();
    $template->categories = $job->getCategories();
}



echo $template; 
// print_r($template->categories);

 ?>