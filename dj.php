<html>

    <head>
        <title>Karaoke Kings</title>
        <link rel='stylesheet' href='dj.css'>
    </head>

    <body>

    <div class='topnav'>
        <h1 class='pageTitle'>Karaoke Kings</h1>
        <a href='http://students.cs.niu.edu/~z1723260/466GroupProject/dj.php'>Home</a>
    </div>
    
    <?php
    //include 'passwords.php';
    $username = 'z1723260';
    $password = '1995Mar10';
        try {
            $dsn = "mysql:host=courses;dbname=$username";
            $pdo = new PDO($dsn, $username, $password);
            $search=htmlspecialchars("SELECT * FROM Selects;");
            $stmt=$pdo->prepare($search);
            $stmt->execute();
            //echo "<h3>Current Queue</h3>";
            }
        catch(PDOexception $e) { 
            echo "Connection to database failed: " . $e->getMessage();
            }
    ?>
    <div class='outerBox'>
    <h1>Accelerated Queue</h1>
    <div class='formBox'>
    <?php
        $count = 0;
        $notPaid = false;
        $search=htmlspecialchars("select * from Selects order by amountPaid desc, dtandtm asc;");
        $stmt=$pdo->prepare($search);
        $stmt->execute();
        echo "<table style='width:100%'>";
        echo "<tr class='tHeader'><th class='tHeader'>Client Name</th><th class='tHeader'>Song Title</th><th class='tHeader'>Performer</th><th class='tHeader'>KID</th></tr>";
        foreach ($stmt as $val) {
            if ($count == 0) {
                $first = $val;
            }
            //Get Name of Client
            if ($val["amountPaid"] == 0 && $notPaid == false) {
                echo "</table></br>";
                echo "</div>";
                echo "<h1>Free Queue</h1>";
                echo "<div class='formBox'>";
                $notPaid = true;
                echo "<table style='width:100%'>";
                echo "<tr class='tHeader'><th class='tHeader'>Client Name</th><th class='tHeader'>Song Title</th><th class='tHeader'>Performer</th><th class='tHeader'>KID</th></tr>";
            }
            echo "<tr>";
            $search=htmlspecialchars("SELECT * from Clients WHERE phoneNum = '".$val["phoneNum"]."';");
            $stmt2=$pdo->prepare($search);
            $stmt2->execute();
            $result = $stmt2->fetch(PDO::FETCH_ASSOC);
            echo "<td class='tdata'>".$result["name"]."</td>";
            //Get Name of Song and Performer
            $search=htmlspecialchars("SELECT * from KaraokeFiles WHERE KID = '".$val["KID"]."';");
            $stmt2=$pdo->prepare($search);
            $stmt2->execute();
            $result = $stmt2->fetch(PDO::FETCH_ASSOC);
            $search=htmlspecialchars("SELECT * from Songs WHERE SID = '".$result["SID"]."';");
            $stmt2=$pdo->prepare($search);
            $stmt2->execute();
            $result = $stmt2->fetch(PDO::FETCH_ASSOC);
            echo "<td class='tdata'>".$result["title"]."</td>";
            echo "<td class='tdata'>".$result["artist"]."</td>";
            echo "<td class='tdata'>".$val["KID"]."</td>";
            echo "</tr>";
            $count++;
        }
        if ($count == 0) {
            echo "</table></br>";
            echo "</div>";
            echo "<h1>Free Queue</h1>";
            echo "<div class='formBox'>";
            $notPaid = true;
            echo "<table style='width:100%'>";
            echo "<tr class='tHeader'><th class='tHeader'>Client Name</th><th class='tHeader'>Song Title</th><th class='tHeader'>Performer</th><th class='tHeader'>KID</th></tr>";
        }
        echo "</table>";
    ?>
    </br>
    </div>
        <form action='./dj.php' method='post'>
                <input type="text" name="nxtEntry" value="delete" style="display: none">
                <input type='submit' value='Update List'>
        </form>
        <?php
            if (isset($_POST["nxtEntry"])) {
                if ($_POST["nxtEntry"] == "delete") {
        
                    $search=htmlspecialchars("DELETE FROM Selects WHERE KID = '".$first["KID"]."' AND phoneNum = '".$first["phoneNum"]."';");
                    $statement = $pdo->prepare($search);
                    $statement->execute();
                    header("Location: http://students.cs.niu.edu/~z1723260/466GroupProject/dj.php");
                    exit;
                }
            }
        ?>

    </body>

</html>
