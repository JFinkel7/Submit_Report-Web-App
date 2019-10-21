<?php
require("setTicketNumber.php");


    function setReport($name){
        if(isset($_POST['submit'])){
            $ticketNumber= strval(setTicket(10));
            $file = '../Reports/report_'.$ticketNumber.'.txt';
            $userReportedData = $_POST[$name];
            $fileHandler = fopen($file,'w')or die('<script>console.log("FILE ERROR");</script>');
            fwrite($fileHandler,$userReportedData);
            printf("<h2>Your Ticket Number Is %s</h2>",$ticketNumber);
            echo('<script>alert("Report Sent");</script>');
            fclose($fileHandler);
        }
    }



?>