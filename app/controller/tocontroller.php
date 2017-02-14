<?php
namespace MVC\Controller;


class ToController extends abstractController {
    
    protected $row;
    protected $row1;
    public function defaultAction() {
        $stmt = $this->url->runQuery("SELECT * FROM links ORDER BY RAND() LIMIT 1");
        $stmt->execute();
        $this->row  = $stmt->fetch(\PDO::FETCH_ASSOC);
        
        
        $stmt1 = $this->url->runQuery("SELECT * FROM links WHERE l_code=:urlCode");
        $stmt1->execute(array(":urlCode"=>$this->_Lcode));
        $this->row1 = $stmt1->fetch(\PDO::FETCH_ASSOC);
        $this->_view();
     }
}
