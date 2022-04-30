<?php 

$JobRole = $_POST['JobRole'];
        $JobDescription = $_POST['JobDescription'];
        $JobLocation = $_POST['JobLocation'];
        $workPlace = $_POST['workPlace'];
        $email = $_POST['email'];
        $number = $_POST['number'];

        // Database connection
        $conn = new mysqli('localhost','root','','test');
        if($conn->connect_error){
            echo "$conn->connect_error";
            die("Connection Failed : ". $conn->connect_error);
        } else {
            $stmt = $conn->prepare("insert into jobOpenings(JobRole, JobDescription, JobLocation, workPlace, email, number) values(?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssi", $JobRole, $JobDescription, $JobLocation, $workPlace, $email, $number);
            $execval = $stmt->execute();
            echo $execval;
            echo "Job Opening posted successfully...";
            $stmt->close();
            $conn->close();
        }
        
?>