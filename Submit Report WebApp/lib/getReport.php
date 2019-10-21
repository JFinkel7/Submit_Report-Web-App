<?php
    
    function getReport($name){
        if(isset($_POST['submit'])){
            $ticketNumber = ($_POST[$name]);
            $file = '../Reports/report_'.$ticketNumber.'.txt';
            if(!file_exists($file)){return(null);}
            $fileHandler = fopen($file,'r') or die('<script>console.log("FILE ERROR");</script>');
            $contents = fread($fileHandler,filesize($file));
            printf('
            <br/><h2>Your Reports Are: <br/> (1)  %s</h2>',$contents);
        }
    }



?>