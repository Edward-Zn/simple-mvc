<?php
require_once 'Sender.php';

class SmsSender implements Sender
{
    public function send($record)
    {
        echo "SMS would be sent with the following data: <br>";
        print_r($record['title']);
        echo '<br>';
        print_r($record['info']);
        echo '<br>';

        return true;
    }
}