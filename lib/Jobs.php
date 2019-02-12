<?php 
 
class Jobs  
{
    private  $db;

    public function __construct()
    {
       $this->db = new Database;    
    }

    public function getAllJobs()
    {
    	$this->db->query("SELECT `jobs`.*, `categories`.`name` AS cname FROM `jobs` INNER JOIN `categories`   ON `jobs`.`category_id` = `categories`.`id` ORDER  BY `jobs`.`post_date` DESC");

    	// assignn reset set
    	$result = $this->db->resultSet();

    	return $result;
    } 


    public function getCategories()
    {
    	$this->db->query("SELECT * FROM `categories` ");

    	$result = $this->db->resultSet();

    	return $result;


    }

      
     public function getJobByCategory($category)
     {
           $this->db->query("SELECT jobs.*, categories.name AS cname FROM jobs INNER JOIN categories ON jobs.category_id = categories.id WHERE jobs.category_id = ". $category . " ORDER BY jobs.post_date DESC");    
           $result = $this->db->resultSet();

           return $result;
     }




     public function getCategoryName($category_id)
     {
     	 $this->db->query(" SELECT * FROM categories WHERE categories.id = :category_id");    
           $result = $this->db->bind(":category_id", $category_id);

           $row = $this->db->singleResultSet();

           return $row;
     }





     public function getSingleJob($job_id)
     {
     	$this->db->query(" SELECT * FROM `jobs` WHERE `jobs`.`id` = :job_id ");
     	$this->db->bind(":job_id", $job_id);
     	   $row = $this->db->singleResultSet();

           return $row;


     }

     // joob creation
     public function jobCreation($data)
     {
     	$this->db->query("INSERT INTO `jobs`( `category_id`, `company`, `title`, `description`, `salary`, `location`, `contact_user`, `contact_email`) VALUES ( :category_id, :company, :title, :description, :salary, :location, :contact_user, :contact_email)  ");
        
       

     	$this->db->bind(':title' ,  $data['title']);
     	$this->db->bind( ':description' ,   $data['description'] );
     	$this->db->bind(':location' ,   $data['location']);
     	$this->db->bind(	':salary' ,   $data['salary']  );
     	$this->db->bind(	':company' ,   $data['company'] );
     	$this->db->bind(':contact_email' ,   $data['contact_email']);
     	$this->db->bind(':contact_user' ,   $data['contact_user'] );
     	$this->db->bind( ':category_id'  ,   $data['category_id'] );
     
         if ($this->db->execute()) {
         	return true;
         } else {
         	return false;
         }
     }



     public function deletionOfJob($delete_id)
     {
             // print_r($delete_id);exit;
            $this->db->query("DELETE FROM `jobs` WHERE `jobs`.`id` = :delete_id ");
            $this->db->bind(":delete_id", $delete_id);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        
         
     }

 

  public  function jobUpdation($id, $data)
  {
           
            $this->db->query("UPDATE jobs
                 SET 
                category_id= :category_id,
                company= :company,
                title=:title,
                description= :description,
                salary= :salary,
                location= :location,
                contact_user=:contact_user,
                contact_email= :contact_email
                WHERE id =  $id ");
        
       

        $this->db->bind(':title' ,  $data['title']);
        $this->db->bind( ':description' ,   $data['description'] );
        $this->db->bind(':location' ,   $data['location']);
        $this->db->bind(    ':salary' ,   $data['salary']  );
        $this->db->bind(    ':company' ,   $data['company'] );
        $this->db->bind(':contact_email' ,   $data['contact_email']);
        $this->db->bind(':contact_user' ,   $data['contact_user'] );
        $this->db->bind( ':category_id'  ,   $data['category_id'] );
             
         if ($this->db->execute()) {
            return true;
         } else {
            return false;
         }
  }


}

 ?>