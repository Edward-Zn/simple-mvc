<?php
require_once 'Sender.php';

class EmailSender implements Sender
{
    public function send($record)
    {
        return $record;
    }
}