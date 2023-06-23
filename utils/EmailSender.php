<?php
require_once 'Sender.php';

class EmailSender implements Sender
{
    public function send($record)
    {
        echo "Email would be sent with the following data: <br>";
        print_r($record['title']);
        echo '<br>';
        print_r($record['info']);
        echo '<br>';

        return true;
    }
}