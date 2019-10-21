<?php
function setTicket($maxValue){
    $ticket = rand(1,$maxValue);
    if(is_null($ticket)){
        echo("Ticket Validation Error..");
    }
    return($ticket);
}


?>