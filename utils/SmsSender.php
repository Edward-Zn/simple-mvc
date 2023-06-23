<?php
require_once 'Sender.php';

class SmsSender implements Sender
{
    public function send($record)
    {
        return $record;
    }
}