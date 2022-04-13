<?php
    require_once('db_connection.php');
    $sql = 'SELECT * FROM `table_projects`';
    $query = $db->prepare($sql);
    $query->execute();
    $projects = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include 'header.php' ?>

<div>
    <?php foreach($projects as $project){ ?>
        <div>
            <?= $project['project_title'] ?> 
        </div>
    <?php } ?>
</div>

<div>
    <a href="form_project-add.php">
        <button>Add project</button>
    </a>
</div>
<?php include 'footer.php' ?>
    
