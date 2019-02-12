<?php 

function redirect($page=false,$message=null,$messageType=null)
{
	if (is_string($page)) {
		$location = $page;
	} else {
		$location = $_SERVER['SCRIPT_NAME'];
	}

	if (is_string($message) && ! empty($message)) {
		$_SESSION['message'] = $message; 
	} 

	if ( is_string($messageType)  && $messageType !=null) {
		$_SESSION['messageType'] = $messageType;
	}

	header('Location:'. $location);die;
} 






function displayMessage()
{
	if (!empty($_SESSION['message'])) {
		$message = $_SESSION['message'];

		if (! empty($_SESSION['messageType'])) {
			$messageType = $_SESSION['messageType'];

			if ( $messageType == 'success' ) {
				echo ' <div class="alert alert-success"> '. $message  .' </div>';
			} else {
				echo ' <div class="alert alert-danger"> '. $message  .' </div>';
				
			}
		} 

		unset($_SESSION['message']);
		unset($_SESSION['messageType']);
	} else {
		echo '';
	}
}

 ?>