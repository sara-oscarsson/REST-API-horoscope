<?php
require("calculateHoroscope.php");
try{
    session_start();
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        if(isset($_SESSION["date"])){
            if(isset($_POST["date"])){
                $month_and_day = $_POST["date"];
                $starSign = splitNumbers($month_and_day);
                $_SESSION["date"] = serialize($starSign); 
                echo json_encode(true);
                exit;
            }else{
                throw new Exception("No date was found in the body...");
                exit;
            }
        }else{
            throw new Exception("Nothing saved to update...");
            exit;
        }
    }else {
        throw new Exception("Not a valid request...");
        exit;
    }
}catch(Exception $error){
    echo json_encode(false);
}
?>