<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 01-Nov-19
 * Time: 8:04 PM
 */

namespace App\Model;

use PDO,PDOException;
class DatabaseConnection
{
    public $conn;
    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=localhost;dbname=hiring_engineer_and_lawyer_system","root","");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $event)
        {
            echo "Connection failed: " . $event->getMessage();
        }
    }
}