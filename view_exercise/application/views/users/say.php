<?php
    $SayTimes = $this->session->userdata('say_times');
    if(!isset($SayTimes))
    {
        echo $this->session->userdata('say');
    }
    else
    {
        if(!is_numeric($SayTimes))
        {
            echo "Sorry.  This url does not meet our requirement.";
        }
        else
        {
            for($i = 1; $i <= $SayTimes; $i++)
            {  
                echo $i . " " . $this->session->userdata('say')."<br>";
            }
        }
    }

?>