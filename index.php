<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles.css" type="text/css">
    
    <title>Week 04</title>
</head>

<?php
    $newtitle = filter_input(INPUT_POST, "newtitle", FILTER_SANITIZE_STRING);
    $newdescription = filter_input(INPUT_POST, "newdescription", FILTER_SANITIZE_STRING);
?>


<body>
    <main>
        <header>
            <h1>To Do List:</h1>
        </header>

 
        <?php require_once('database.php'); ?>

        <!-- Call everything from database -->
        <?php 
            $query = 'SELECT * FROM todoitems';

            $statement = $db->prepare($query); 
            $statement->execute();
            $results = $statement->fetchAll();
            $statement->closeCursor();
        ?>   

        <!-- Display all data from above query -->
        <?php
            if (!empty($results)) { ?>
            <section>
                <?php foreach ($results as $result) {
                    $title = $result['Title'];
                    $description = $result['Description'];

                    ?>
                    
                    <div class="todoitem">
                        <h3> <?php echo $title ?> </h2>
                        <p> <?php echo $description ?> </p>

                        <form action="delete.php" method="post">
                            <input type="hidden" name="id"
                                value="<?php echo $result['ItemNum']; ?>">
                            <input type="submit" value="Delete">
                        </form>

                    </div>
                    <?php
                }
                ?>

            </section>     

        <!-- Else display the following p tag -->        
        <?php } else { ?>
            <p>No to do list items exist yet</p>
        <?php } ?>
        

        <section>
            <h2>Add New Item:</h2>
            <form action="add.php" method="post">
                <label for="newtitle">Title</label>
                <input type="text" id="newtitle" name="newtitle" required>
                <label for="newdescription">Description</label>
                <input type="text" id="newdescription" name="newdescription" required>
                <button>Submit</button>
            </form>
        </section>         


    </main>
</body>
</html>





