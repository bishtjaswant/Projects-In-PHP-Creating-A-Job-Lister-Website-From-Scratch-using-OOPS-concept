<?php include_once 'includes/header.php'; ?>

<h2 class="page-header">update job listing</h2>

<form action="edit.php?edit_id=<?= $job->id; ?>" method="POST">
        	         
	         <div class="form-group">
					    <label for="title"><strong>Job title:</strong></label>
					    <input type="text" name="title" placeholder="type job title here....." class="form-control" id="title" value="<?= $job->title; ?>">
			  </div>

			    <div class="form-group">
					    <label for="description"><strong>Job description:</strong></label>
					    <textarea placeholder="type job description here....." class="form-control" id="description" cols="10" name="description" rows="5" style="resize: none;"><?= $job->description; ?></textarea>
			  </div>

			    <div class="form-group">
			         	<label for="location"><strong>Job location:</strong></label>

			         <select class="form-control" name="location" id="location">
			         	<option value="">select job location</option>
			         	<option value="delhi" >DELHI</option>
			         	<option value="uttrakhand">UTTRAKHAND</option>
			         	<option value="chandigarg">CHANDIGARG</option>
			         	<option value="assam">ASSAM</option>
			         	<option value="lucknow">LUCKNOW</option>
			         	<option value="mijoram">MIJORAM</option>
			         </select>
			  </div>


			  <div class="form-group">
			  	<label for="salary"> <strong>Job salary:</strong> </label>
			  	<input type="number" value="<?= $job->salary; ?>" name="salary" class="form-control" placeholder="please input salary" id="salary">
			  </div>


		   <div class="form-group">
			  	<label for="company"> <strong>Job company:</strong> </label>
			  	<input type="text" name="company" class="form-control" placeholder="type company's name " id="company" value="<?= $job->company; ?>">
			  </div>


		   <div class="form-group">
			  	<label for="contact_email"> <strong>Job contact email:</strong> </label>
			  	<input type="text" name="contact_email" value="<?= $job->contact_email ?>" class="form-control" placeholder="please enter email address " id="contact_email">
			  </div>



		   <div class="form-group">
			  	<label for="contact_user"> <strong>Job contact user:</strong> </label>
			  	<input type="text" name="contact_user" class="form-control" placeholder="user name " id="contact_user" value="<?= $job->contact_user;?>">
			  </div>




			    <div class="form-group">
			         	<label for="category_id"><strong>Category:</strong></label>

			         <select class="form-control" name="category_id" id="category_id">
			         	<option value="">select category</option>
			         	  	<option value="">choose gategory</option>
			           		<?php foreach($categories as $category): ?>
				                  <?php if ($category->id == $job->category_id ): ?>
				                  		<option value="<?= $category->id;  ?>" selected>   <?= strtoupper($category->name );  ?>   </option>
				                  	<?php else: ?>
				                  		 <option value="<?= $category->id;  ?>" >   <?= strtoupper($category->name );  ?>   </option>
				                  <?php endif ?>
			           		<?php endforeach; ?>
			         </select>
			  </div>

           <button type="submit" name="post_job" class="btn btn-success btn-sm">Update Job </button>
   </form>

<?php include_once 'includes/footer.php'; ?>