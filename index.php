<html>

    <head>
        <title>Karaoke Kings</title>
        <link rel='stylesheet' href='styles.css'>
    </head>

    <body background="Cybertruck.png">
    
    <?php
        //include 'passwords.php';
        try {

            $username = "z1723260";
            $password = "1995Mar10";

            $dsn = "mysql:host=courses;dbname=z1723260";
            $pdo = new PDO($dsn, $username, $password);
            }
        catch(PDOexception $e) { 
            echo "Connection to database failed: " . $e->getMessage();
            }            
    ?>
    <div class='topnav'>
        <h1 class='pageTitle'>Karaoke Kings</h1>
        <a href='http://students.cs.niu.edu/~z1723260/466GroupProject/index.php'>Home</a>
    </div>
    <div class='bg'>
    <div class='outerBox'>
    <h1>Search Songs</h1>
    <div class='formBox'>
        <form action='./selection.php' method='post'>
            <label>Choose an Artist<label>
            <?php 
                        $sql = "SELECT DISTINCT artist FROM Songs;";
                        $selectArtist = $pdo -> query($sql);

                        echo "<select name='artist'>";
                                foreach ($selectArtist as $row){
                                    echo  '<option value ="';
                                    echo $row['artist'];
                                    echo  '" >';
                                    echo $row['artist'];
                                    echo  '</option>';
                                }
                                echo "</select>";
            ?>

            <input type='submit' value='Select Artist'>

        </form>
        <form action='./selection.php' method='post'>
            <label>Choose by Song Name<label>
            <?php
                $sql = "SELECT * FROM Songs;";
                $selectTitle = $pdo -> query($sql);
                
                echo "<select name='title'>";
                        foreach ($selectTitle as $row){
                            echo  '<option value ="';
                            echo $row['title'];
                            echo  '" >';
                            echo $row['title'];
                            echo  '</option>';
                        }
                        echo "</select>";
            ?>
        
            <input type='submit' value='Select Song'>

        </form>
        <form action='./selection.php' method='post'>
            <label>Choose a Contributor<label>
            <?php
                $sql = "SELECT * FROM Contributors;";
                $selectContributor = $pdo -> query($sql);

                echo "<select name='contributor'>";
                        foreach ($selectContributor as $row){
                            echo  '<option value ="';
                            echo $row['CID'];
                            echo  '" >';
                            echo $row['name'];
                            echo  '</option>';
                        }
                        echo "</select>";
            ?>

            <input type='submit' value='Select Contributor'>

        </form>
    </div>
    </div>
    </div> 
    </body>

</html>

