<?php

namespace controller;

use model\Information;

class IndexController
{
    private $pdo;

    public function handleFormSubmission($model, $post)
    {
        // Perform any necessary form validation or processing here
        if ($model instanceof Information) {
            $model->title = strip_tags($post['title']);
            $model->info = strip_tags($post['info']);
        }
        
        if ($model->title) {
            $id = $model->insertData($model);

            return [
                'errors' => 0,
                'id' => $id
            ];
        } else {
            return [
                'errors' => 1,
                'message' => $model::$errors[$model::EMPTY_TITLE]
            ];
        }

        // $emailSender = new EmailSender();
        // $emailSender->sendEmail($title, $text);

        // Send SMS (implement the logic in SmsSender class)
        // $smsSender = new SmsSender();
        // $smsSender->sendSms($title, $text);

        // Redirect to a success page or display a success message
        // header('Location: index.php');
    }

    public function list($model)
    {
        return $model->getInformation();
    }
}