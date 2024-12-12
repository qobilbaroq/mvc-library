<?php

require_once 'config/database.php';

class Book{
    private $id, $title, $author, $year;

    public function getTitle()
    {
        return $this->title;
    }
    public function getAuthor()
    {
        return $this->author;
    }
    public function getYear()
    {
        return $this->year;
    }

    static function filter($search)
    {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM books WHERE title  LIKE '%$search%' ");
        return $stmt->fetchALL(PDO::FETCH_CLASS, 'Book');
    }

    static function get()
    {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM books");
        return $stmt->fetchALL(PDO::FETCH_CLASS, 'Book');
    }
}