<?php
namespace MVC\LIB;

class MyFunction {
    public  $checkurl;

    public function security_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    
         public function getUrlRand($length = 6) {
            $validCharacters = "AbdoElzahaby".date("gis");
            $validCharNumber = strlen($validCharacters);

            $result = "";

            for ($i = 0; $i < $length; $i++) {
                $index = mt_rand(0, $validCharNumber - 1);
                $result .= $validCharacters[$index];
            }

            return $result;
        }
        public function addhttp($URL) {
            if (!preg_match("~^(?:f|ht)tps?://~i", $URL)) {
                $URL = "http://" . $URL;
            }
            return $URL;
        }
        
        function checkurl($url){
            $parse = parse_url($url);
            if ($parse['host'] != $_SERVER['HTTP_HOST']) {
                $file_headers = @get_headers($url);
                if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
                    $this->checkurl = "NOT VALID";
                }else{
                        $this->checkurl = "VALID";
                }
            }else{
                        $this->checkurl = "NOT VALID";
            } 
        }
        
       
        public function redirect($url)
	{
		header("Location: $url");
	}
        public function get_user_ip() {
            $ipaddress = '';
            if (isset($_SERVER['HTTP_CLIENT_IP']))
                $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
            else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
                $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
            else if(isset($_SERVER['HTTP_X_FORWARDED']))
                $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
            else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
                $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
            else if(isset($_SERVER['HTTP_FORWARDED']))
                $ipaddress = $_SERVER['HTTP_FORWARDED'];
            else if(isset($_SERVER['REMOTE_ADDR']))
                $ipaddress = $_SERVER['REMOTE_ADDR'];
            else
                $ipaddress = 'UNKNOWN';

        }
        
        public function ip_details($IPaddress) 
        {
            $json       = file_get_contents("http://ipinfo.io/{$IPaddress}/json");
            $details    = json_decode($json);
            return $details;
        }
        
        public function get_title($url){
            try {
                $str = file_get_contents($url);
                if(strlen($str)>0){
                  $str = trim(preg_replace('/\s+/', ' ', $str)); // supports line breaks inside <title>
                  preg_match("/\<title\>(.*)\<\/title\>/i",$str,$title); // ignore case
                  return $title[1];
                }
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }

        }
        
        public function get_icon($url,$url2) {
            $files =0;
            $files = glob('favicons/*');

            foreach($files as $file) { // iterate files
                // if file creation time is more than 5 minutes
                if ((time() - filectime($file)) >= 172800) {  
                    unlink($file);
                }
            }
            //Get the file
            $url = "https://www.google.com/s2/favicons?domain=$url";
            $url2 = $url2;
            $content = file_get_contents($url);


            //Store in the filesystem.
            $iconsPath = "favicons";
            $parse = parse_url($url2);
            
            $path = "$iconsPath/".$parse['host'].".png";
            $fp = fopen($path, "w");
            fwrite($fp, $content);
            fclose($fp);
            $icon = $path;
           return $icon;
        }
    
}