<?php


include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/GeneralClass.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/Interfaces.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Model/SearchModel.php';

class SearchController implements iAction{
    
    public function Action($view){
        
        switch ($view){
            
            case 'Index': GeneralClass::redirect('/project/itool/SearchResult', false);
                break;
            default : die('Error in action call ->'.$view);
                
        }
    }
    
    private $flag=0;
    
    private function result($msg,$ans,$link){
        
        echo'<div class="alert alert-success alert-dismissible text-center" role="alert">
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     '.$msg.'<strong>"'.$ans.'"</strong>
                      <span><a class="btn btn-success" href="'.$link.'">Go to link</a></span>
                     </div>';
    
        $this->flag=1;
    }
    
    public function retrieveValues($word){
        
        $sObj = new SearchFunctionality();
        $id = $sObj->GetProductId($word);
        
        if($id!=NULL)
        {
        
        $ans=$sObj->SearchImportProd($id);
        
        if($ans!=NULL)
            {
                $msg="Import Product : Recent Order Number -  ";
                $link="#";
                $this->result($msg,$ans,$link);
            }
            
        
        $ans=$sObj->SearchInvoicesProd($id);
        
        if($ans!=NULL)
            {   
                
                $msg="Product Invoices : Recent Invoice Number -  ";
                $link="#";
                $this->result($msg,$ans,$link);
            }
            
        $ans=$sObj->SearchInvoicesProd($id);
        
        if($ans!=NULL)
            {   
                
                $msg="Product Invoices : Recent Invoice Number -  ";
                $link="#";
                $this->result($msg,$ans,$link);
            }
            
            
        }
        else
        {
            echo'<div class="alert alert-danger alert-dismissible text-center" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 No such product <strong>"'.$word.'"</strong> exist!!
                 </div>';
            
        }
        if($this->flag==0)
        {
            echo'<div class="alert alert-danger alert-dismissible text-center" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 No records found for <strong>"'.$word.'"</strong> !!! Check Product List for more info...
                 </div>';
        }
    }
}
     



$controllerObj = new SearchController();

if(isset($_GET['action']))
    {
    $view = $_GET['action'];
    
    $controllerObj->Action($view);
    }
