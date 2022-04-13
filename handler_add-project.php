<?php
    // Verifying form fields
    if(isset($_POST['data_title']) && !empty($_POST['data_title'])
    && isset($_POST['data_description']) && !empty($_POST['data_description'])){
        // cleaning and storing data in variables
        $project_title = strip_tags($_POST["data_title"]);
        $project_description = strip_tags($_POST["data_description"]);
        // insert data in database
        require_once("db_connection.php");
        $sql = 'INSERT INTO `table_projects` (`project_title`, `project_description`) VALUES (:project_title, :project_description);';
        $query =  $db->prepare($sql);
        $query->bindValue(':project_title', $project_title, PDO::PARAM_STR);
        $query->bindValue(':project_description', $project_description, PDO::PARAM_STR);
        $query -> execute();
        //redirection 
        echo '<div>Project added.</div>';
        echo '<div><a href="index.php"><button>Back</button></a></div>';

        //If the form fields are empty
    } else {
        echo "Complete all fields. ";
        echo '<div><a href="index.php"><button>Back</button></a></div>';
    }
