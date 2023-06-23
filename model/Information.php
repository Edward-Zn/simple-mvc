<?php

namespace model;

require_once dirname(__DIR__) . '/config.php';

class Information
{
    const EMPTY_TITLE = 1;
    const TEXT_LIMIT = 2;

    public static $errors = [
        self::EMPTY_TITLE => 'Title cannot be empty',
    ];

    private $pdo;

    public $title;
    public $info;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function insertData($information)
    {
        $stmt = $this->pdo->prepare('INSERT INTO information (`title`, `info`) VALUES (:title, :info)');
        $stmt->bindValue(':title', $information->title);
        $stmt->bindValue(':info', $information->info);
        $stmt->execute();

        return $this->pdo->lastInsertId();
    }

    public function getData($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM information WHERE id = :id');
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        return $stmt->fetch();
    }
}