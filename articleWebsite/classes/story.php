<?php

require_once "./classes/db.php";

class Story {

    public $id;
    public $author;
    public $headline;
    public $short_headline;
    public $sub_heading;
    public $article;
    public $summary;
    public $pub_date;
    public $pub_time;
    public $location;
    public $img_url;
    public $category_id;

    public function __construct($props = null) {
        if ($props != null) {
            $this->id             = $props["id"];
            $this->author       = $props["author"];
            $this->headline       = $props["headline"];
            $this->short_headline       = $props["short_headline"];
            $this->sub_heading       = $props["sub_heading"];
            $this->article       = $props["article"];
            $this->summary       = $props["summary"];
            $this->pub_date       = $props["pub_date"];
            $this->pub_time       = $props["pub_time"];
            $this->location       = $props["location"];
            $this->img_url       = $props["img_url"];
            $this->category_id       = $props["category_id"];

        }
    }

  
    public function save() {
        // not yet written
    }

    public function delete() {
       // not yet written
    
    }

    public static function findAll() {
        $stories = array();

        try {
            $db = new DB();
            $db->open();
            $conn = $db->getConnection();

            $sql = "SELECT * FROM stories ";
            $stmt = $conn->prepare($sql);
            $status = $stmt->execute();

            if (!$status) {
                $error_info = $stmt->errorInfo();
                $message = "SQLSTATE error code = ".$error_info[0]."; error message = ".$error_info[2];
                throw new Exception("Database error executing database query: " . $message);
            }

            if ($stmt->rowCount() !== 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                while ($row !== FALSE) {
                    $story = new Story($row);
                    $stories[] = $story;

                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                }
            }
        }

        finally {
            if ($db !== null && $db->isOpen()) {
                $db->close();
            }
        }

        return $stories;
    }
    public static function findByCategory($category_id,$number,$offset=0) {
        $stories = array();

        try {
            $db = new DB();
            $db->open();
            $conn = $db->getConnection();

            $sql = "SELECT * FROM stories " ."WHERE category_id = " . $category_id . " LIMIT " . $number . " OFFSET " .$offset;
            $stmt = $conn->prepare($sql);
            $status = $stmt->execute();

            if (!$status) {
                $error_info = $stmt->errorInfo();
                $message = "SQLSTATE error code = ".$error_info[0]."; error message = ".$error_info[2];
                throw new Exception("Database error executing database query: " . $message);
            }

            if ($stmt->rowCount() !== 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                while ($row !== FALSE) {
                    $story = new Story($row);
                    $stories[] = $story;

                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                }
            }
        }

        finally {
            if ($db !== null && $db->isOpen()) {
                $db->close();
            }
        }

        return $stories;
    }
    
    public static function findById($id){
        $story = null;
        try{
          $db = new DB();
          $conn = $db->open();
          $conn = $db->getConnection();
        
          $sql = "SELECT * FROM article_website.stories WHERE id = :id";
    
          $params = [
            ":id" => $id
          ];
    
          $stmt = $conn->prepare($sql);
          $status = $stmt->execute($params);
        
          if(!$status){
            $error_info = $stmt->errorInfo();
            $message = 
            "SQLSTATE error code = " . $error_info[0] . 
            "; error message = ". $error_info[2];
             throw new Exception($message);
          }
    
    
          $row = $stmt->fetch(PDO::FETCH_ASSOC);
          if($row !== FALSE){
            $story = new Story($row);
          }
        }
    
        finally{
          if($db != null && $db->isOpen()){
            $db->close();
          }
        }
        return $story;
    }

    public static function findLatest($number) {
        $stories = array();

        try {
            $db = new DB();
            $db->open();
            $conn = $db->getConnection();

            $sql = "SELECT * FROM stories ORDER BY pub_date DESC LIMIT " . $number;
            $stmt = $conn->prepare($sql);
            $status = $stmt->execute();

            if (!$status) {
                $error_info = $stmt->errorInfo();
                $message = "SQLSTATE error code = ".$error_info[0]."; error message = ".$error_info[2];
                throw new Exception("Database error executing database query: " . $message);
            }

            if ($stmt->rowCount() !== 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                while ($row !== FALSE) {
                    $story = new Story($row);
                    $stories[] = $story;

                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                }
            }
        }

        finally {
            if ($db !== null && $db->isOpen()) {
                $db->close();
            }
        }

        return $stories;
    }
}
?>