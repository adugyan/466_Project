<html>
    <head>
        <title>Karaoke Kings</title>
        <link rel='stylesheet' href='selection.css'>
    </head>
    <body background="Cybertruck.png">

    <div class='topnav'>
        <h1 class='pageTitle'>Karaoke Kings</h1>
        <a href='http://students.cs.niu.edu/~z1723260/466GroupProject/index.php'>Home</a>
    </div>

        <?php
         try {
            $username = "z1723260";
            $password = "1995Mar10";
            $dsn = "mysql:host=courses;dbname=z1723260";
            $pdo = new PDO($dsn, $username, $password);
            }
        catch(PDOexception $e) { 
            echo "Connection to database failed: " . $e->getMessage();
            }    
            
        //print_r($_POST);

        if (isset($_POST['artist'])) {

            $artist = $_POST['artist'];

            $sql = "SELECT * FROM Songs WHERE artist = '$artist';";
            $sth = $pdo->prepare($sql);
            $sth->execute();
            $res = $sth->fetchAll(PDO::FETCH_ASSOC);
            //print_r($res);

            $sql = "SELECT * FROM Songs inner join KaraokeFiles on Songs.artist = '$artist' AND Songs.SID = KaraokeFiles.SID";
            //SELECT * FROM Songs inner join KaraokeFiles on Songs.Artist = 'Red Hot Chili Peppers' AND Songs.SID = KaraokeFiles.SID;
            $result = $pdo->query($sql);
            echo "<div class='formHeader'>";
            echo "<h1>Choose a Song</h1>";
        
            echo "<div class='selectBox'>";
            echo "<form action='' method='post'>";
            echo "<input type='text' placeholder='Your Name' name='name' class='selForm'>
                  <input type='text' placeholder='Your Phone Number' name='phnNum' class='selForm'>
                  <input type='text' placeholder='Amount to pay (this will effect your queue position)' name='qty' class='selForm'>";
            echo "<div class='tableBox'>";
            echo "<table class='fileSelect' >";
            echo "<tr class='tHeader'>";
			echo "<th class='tHeader'> Title </th>";
			echo "<th class='tHeader'> Artist </th>";
            echo "<th class='tHeader'> SID </th>";
            echo "<th class='tHeader'> KID </th>";
            echo "<th class='tHeader'> File Name </th>";
            echo "<th class='tHeader'> Select </th>";
            echo "</tr>";
            
            foreach($pdo->query($sql) as $row) {
                $title= $row['title'];
                $artist = $row['artist'];
				$SID= $row['SID'];
				$KID = $row['KID'];
				$name=$row['name'];
			echo"<tr><td class='tdata'>".$title."</td><td class='tdata'>".$artist."</td><td class='tdata'>".$SID."</td><td class='tdata'>".$KID."</td><td class='tdata'>".$name."</td><td class='tdata'><input type='radio' class='rButton' name='selection' value='$KID'></td></tr>";
            }
            
            echo "</table>";
            echo "</div>";
            echo "<div class='tSubmit'><input type='submit' value='Submit' class='tButton'></div>";
            echo "</div>";
            echo "</form>";
            echo "</div>";
     
        }
        else if(isset($_POST['title'])) {

            $title = $_POST['title'];

            $sql = "SELECT * FROM Songs inner join KaraokeFiles on Songs.title = '$title' AND Songs.SID = KaraokeFiles.SID";
            //SELECT * FROM Songs inner join KaraokeFiles on Songs.Artist = 'Red Hot Chili Peppers' AND Songs.SID = KaraokeFiles.SID;
            $result = $pdo->query($sql);
            echo "<div class='formHeader'>";
            echo "<h1>Choose a Song</h1>";

            echo "<div class='selectBox'>";
            echo "<form action='' method='post'>";
            echo "<input type='text' placeholder='Your Name' name='name' class='selForm'>
                  <input type='text' placeholder='Your Phone Number' name='phnNum' class='selForm'>
                  <input type='text' placeholder='Amount to pay (this will effect your queue position)' name='qty' class='selForm'>";
            echo "<div class='tableBox'>";
            echo "<table class='fileSelect' >";
            echo "<tr class='tHeader'>";
			echo "<th class='tHeader'> Title </th>";
			echo "<th class='tHeader'> Artist </th>";
            echo "<th class='tHeader'> SID </th>";
            echo "<th class='tHeader'> KID </th>";
            echo "<th class='tHeader'> File Name </th>";
            echo "<th class='tHeader'> Select </th>";
            echo "</tr>";
            foreach($pdo->query($sql) as $row) {
                $title= $row['title'];
                $artist = $row['artist'];
				$SID= $row['SID'];
				$KID = $row['KID'];
				$name=$row['name'];
			echo"<tr align='center'><td class='tdata'>".$title."</td><td class='tdata'>".$artist."</td><td class='tdata'>".$SID."</td><td class='tdata'>".$KID."</td><td class='tdata'>".$name."</td><td class='tdata'><input type='radio' class='rButton' name='selection' value='$KID'></td></tr>";
            }
            
            echo "</table>";
            echo "</div>";
            echo "<div class='tSubmit'><input type='submit' value='Submit' class='tButton'></div>";
            echo "</div>";
            echo "</form>";
            echo "</div>";
        }
        else if(isset($_POST['contributor'])) {
            //**********************************************THIS DOES NOT WORK PROPERLY POSSIBLY AN ERROR IN DB DATA (i.e. contributes data is bad)*************************************************************** */
            $contributor = $_POST['contributor'];
            //$sql = "SELECT * FROM Songs INNER JOIN Contributes on Contributes.SID = Songs.SID and Contributes.CID = '$contributor';";
            //$sql = "Select * from Songs inner join Contributors on Contibrutes.CID = '$Contributor' inner join KaraokeFiles on Songs.SID = KaraokeFiles.SID;";
            $sql = "Select * from Songs inner join Contributes on Contributes.CID = '$contributor' and Songs.SID = Contributes.SID inner join KaraokeFiles on Songs.SID = KaraokeFiles.SID;";

            $result = $pdo->query($sql);
            echo "<div class='formHeader'>";
            echo "<h1>Choose a Song</h1>";

            echo "<div class='selectBox'>";
            echo "<form action='' method='post'>";
            echo "<input type='text' placeholder='Your Name' name='name' class='selForm'>
                  <input type='text' placeholder='Your Phone Number' name='phnNum' class='selForm'>
                  <input type='text' placeholder='Amount to pay (this will effect your queue position)' name='qty' class='selForm'>";
            echo "<div class='tableBox'>";
            echo "<table class='fileSelect' >";
            echo "<tr class='tHeader'>";
			echo "<th class='tHeader'> Title </th>";
			echo "<th class='tHeader'> Artist </th>";
            echo "<th class='tHeader'> SID </th>";
            echo "<th class='tHeader'> KID </th>";
            echo "<th class='tHeader'> File Name </th>";
            echo "<th class='tHeader'> Select </th>";
            echo "</tr>";
            foreach($pdo->query($sql) as $row) {
                $title= $row['title'];
                $artist = $row['artist'];
				$SID= $row['SID'];
				$KID = $row['KID'];
				$name=$row['name'];
                echo"<tr align='center'><td class='tdata'>".$title."</td><td class='tdata'>".$artist."</td><td class='tdata'>".$SID."</td><td class='tdata'>".$KID."</td><td class='tdata'>".$name."</td><td class='tdata'><input type='radio' class='rButton' name='selection' value='$KID'></td></tr>";
            }
            
            echo "</table>";
            echo "</div>";
            echo "<div class='tSubmit'><input type='submit' value='Submit' class='tButton'></div>";
            echo "</div>";
            echo "</form>";
            echo "</div>";
        }
        else if(isset($_POST['selection'])) {
            $name = $_POST['name'];
            $file = $_POST['selection'];
            $phnNum = $_POST['phnNum'];
            $pay = $_POST['qty'];
           
          
            if ($name == NULL || $file == NULL || $phnNum == NULL) {
                echo "<p>Submission Failed. You must fill all fields.</p>";
            }
            else {
                $sql = "INSERT INTO Clients(phoneNum, name) VALUES ('$phnNum', '$name');";
                try {
                    $result = $pdo->query($sql);
                    echo "<p> Submission Successful! </p>";
                }
                catch (PDOexception $err) {
                    echo "Query Failed: " . $err;
                }
                $dtandtm = date('m/d/y') . ' ' . date('H:i:s');
                echo "<p>'$dtandtm'</p>";
                $sql = "INSERT INTO Selects(KID, phoneNum, dtandtm, amountPaid) VALUES ('$file', '$phnNum', '$dtandtm', '$pay');";
                try {
                    $result = $pdo->query($sql);
                }
                catch (PDOexception $err) {
                    echo "Query Failed: " . $err;
                }
            }
        }

        else {
            echo "<p>Submission Failed. You must fill all fields.</p>";
        }

        ?>
    </body>
</html>

