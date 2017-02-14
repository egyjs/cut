<?php
namespace MVC\MODEL;
use MVC\MODEL\DBModel;
class UrlModel {
    private $conn;
    

     public function __construct()
     {
      $database = new DBModel();
      $db = $database->dbConnection();
      $this->conn = $db;
     }

     public function runQuery($sql){
      $stmt = $this->conn->prepare($sql);
      return $stmt;
     }  


                public function shortforUser($url_name,$url_code,$user_id) {
        try {

            
                $stmt = $this->conn->prepare("INSERT INTO links(l_name,u_id,l_code) 
                                                             VALUES(:urlName,:UsrID, :urlCode)");
                $stmt->bindparam(":urlName",$url_name);
                $stmt->bindparam(":UsrID",$user_id);
                $stmt->bindparam(":urlCode",$url_code);

                $stmt->execute();	
                return $stmt;
                


  } catch (Exception $ex) {
      echo $ex->getMessage();
  }
           
   }





        public function shortURL($url_name,$url_code) {
        try {

            
                $stmt = $this->conn->prepare("INSERT INTO links (l_name,l_code) 
                                                             VALUES(:urlName, :urlCode)");
                $stmt->bindparam(":urlName",$url_name);
                $stmt->bindparam(":urlCode",$url_code);

                $stmt->execute();	
                return $stmt;
                


  } catch (Exception $ex) {
      echo $ex->getMessage();
  }
           
   }
}  