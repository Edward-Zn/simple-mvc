<?php

echo '<h3>';
echo 'Simple MVC';
echo '</h3>';

use controller\IndexController;
use model\Information;

require_once 'config.php';

require_once 'model/Information.php';
require_once 'controller/IndexController.php';
require_once 'utils/EmailSender.php';
require_once 'utils/SmsSender.php';

$information = new Information($pdo);
$emailSender = new EmailSender();
$smsSender = new SmsSender();

$dbRes = null;

// Form handler
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] === 'index') {
    $controller = new IndexController();
    $dbRes = $controller->handleFormSubmission($information, $_POST);
}

require_once 'view/form.php';

if ($dbRes) {
    if (isset($dbRes['id'])) {
        $lastRecord = $information->getData($dbRes['id']);

        $emailSender->send($lastRecord);
        $smsSender->send($lastRecord);
        
        echo '<i style="color:DodgerBlue;">';
        echo 'Row saved: <br>';
        echo '</i>';

        echo '<strong>Title:</strong><br>' . $lastRecord['title'] . '<br>';
        echo '<strong>Text:</strong><br>' . ($lastRecord['info'] ?: '- No text -') . '<br>';
    } else {
        echo '<h5 style="color:Tomato;">';
        echo $dbRes['message'];
        echo '</h5>';
    }
}