<?php
namespace MVC\MODEL;
use MVC\MODEL\DBModel;
/**
 * Description of sign
 *
 * @author el3zahaby
 */
class SignModel {

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

     public function lasdID()
     {
      $stmt = $this->conn->lastInsertId();
      return $stmt;
     }
    public function security_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    function get_gravatar( $email, $d = 'mm', $s = 256, $r = 'g', $img = false, $atts = array() ) {
    $url = 'https://www.gravatar.com/avatar/';
    $url .= md5( strtolower( trim( $email ) ) );
    $url .= "?s=$s&d=$d&r=$r";
    if ( $img ) {
        $url = '<img src="' . $url . '"';
        foreach ( $atts as $key => $val )
            $url .= ' ' . $key . '="' . $val . '"';
        $url .= ' />';
    }
    return $url;
    }

     public function register($name,$username,$email,$pass,$country,$loc)
             // ,$email,$upass,$code
            // ,user_email,user_pass,token_code
           // , :user_mail, :user_pass, :active_code
     {
      try
      {       
       $password = md5($pass);
       $stmt = $this->conn->prepare("INSERT INTO users(u_name,u_username,u_pass,u_email,u_country,u_loc) 
                                                    VALUES(:uname,:uusername,:upass,:uemail,:ucntry,:uloc)");
       $stmt->bindparam(":uname",$name);
       $stmt->bindparam(":uusername",$username);
       $stmt->bindparam(":upass",$password);
       $stmt->bindparam(":uemail",$email);
       $stmt->bindparam(":ucntry",$country);
       $stmt->bindparam(":uloc",$loc);
       $stmt->execute(); 
       return $stmt;
      }
      catch(\PDOException $ex)
      {
       echo $ex->getMessage();
      }
     }

     public function login($uemail,$upass)
     {
      try{
       $stmt = $this->conn->prepare("SELECT * FROM users WHERE u_email=:email_id");
       $stmt->execute(array(":email_id"=>$uemail));
       $userRow = $stmt->fetch(\PDO::FETCH_ASSOC);

       if($stmt->rowCount() == 1){
        if($userRow['u_pass'] == md5($upass)){
          $_SESSION['userSession'] = $userRow['u_id'];
          return true;
         }
         else{
          header("Location: /signin/default/wrongP");
          exit;
         }
       }else{
        header("Location: /signin/default/exist");
        exit;
       }  
      }
      catch(\PDOException $ex){
       echo $ex->getMessage();
      }
     }


     public function is_logged_in()
     {
      if(isset($_SESSION['userSession']))
      {
       return true;
      }
     }

     public function redirect($url)
     {
      header("Location: $url");
     }

     public function logout()
     {
      session_destroy();
      $_SESSION['userSession'] = false;
     }

     function send_mail($email,$message,$subject)
     {      
        require_once('mailer/class.phpmailer.php');
        $mail = new PHPMailer();
        $mail->IsSMTP(); 
        $mail->SMTPDebug  = 0;                     
        $mail->SMTPAuth   = true;                  
        $mail->SMTPSecure = "ssl";                 
        $mail->Host       = "smtp.gmail.com";      
        $mail->Port       = 465;             
        $mail->AddAddress($email);
        $mail->Username= "el0zahaby@gmail.com";  
        $mail->Password="abu123123123";            
        $mail->SetFrom('el0zahaby@gmail.com','  Cutter');
        $mail->AddReplyTo("el0zahaby@gmail.com","Cutter");
        $mail->Subject    = $subject;
        $mail->MsgHTML($message);
        $mail->Send();
     } 
    
}
