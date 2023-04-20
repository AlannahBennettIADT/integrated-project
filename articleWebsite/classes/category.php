<?php

require_once "./classes/db.php";

class Category {

    public $id;
    public $type;

    public function __construct($props = null) {
        if ($props != null) {
            $this->id       = $props["id"];
            $this->type       = $props["type"];
        }
    }

  
    public function save() {
        // not yet written
    }

    public function delete() {
       // not yet written
    
    }

    public static function findByCategory($id) {
        $categories = null;

        try {
            $db = new DB();
            $db->open();
            $conn = $db->getConnection();

            $sql = "SELECT * FROM categories WHERE id = " . $id;

            
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
                    $category = new Category($row);
                    $categories[] = $category;

                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                }
            }
        }

        finally {
            if ($db !== null && $db->isOpen()) {
                $db->close();
            }
        }

        return $categories;
    }
}
?>