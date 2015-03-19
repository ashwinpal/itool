<?php

global $error;

$error= [];


function onsubmitCheck($field) {
    
    
    $obj= new GeneralValidation();
    $result=$obj->validateSubmit($field);
    
//    if(!$result) 
//        {echo 'error in post method';}
    return $result;
}


function showError($field){
    
    global $error;
    
    foreach($error as $index => $msg)
    {
        if(($index === $field) && ($msg!=""))
            {
                echo '<span style="color:red"><strong>'.$msg.'</strong></span><br>';
            }
        
    }
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

function validation($validator,$field,$value,$err_msg,$value2=NULL,$min_val=NULL,$max_val=NULL)
{
   
    
    global $error;
    $result=0;
    $obj = NULL;
    
    $value = test_input($value);
    $value2 = test_input($value2);
    
    switch ($validator) {
        
        case 'checkSubmit'    : $obj= new GeneralValidation();
                                $result=$obj->validateSubmit($value);
                                break;
        
        case 'checkNull'    :   $obj= new GeneralValidation();
                                $result = $obj->validateNull($value);
                                break;
                            
        case 'checkEmail'   :   $obj= new RegularExpValidation();
                                $result = $obj->validateEmail($value); 
                                break;
        
        case 'checkNumber'  :	$obj= new RegularExpValidation();
				$result = $obj->validationNumber($value);
				break;
                            
        case 'checkPC'      :	$obj= new RegularExpValidation();
				$result = $obj->validationPC($value);
                                break;	
								
        case 'checkChar'    :	$obj= new RegularExpValidation();
				$result = $obj->validationLetters($value);
                                break;
							
        case 'checkRange'     :	$obj= new GeneralValidation();
                                if($min_val == NULL || $max_val == NULL)
                                {
                                  lineofDeath($validator);
                                  
                                }
				$result = $obj->validationRange($value,$min_val,$max_val);
				break;
        
        case 'checkValue'   :   $obj= new GeneralValidation();
                                if($value2 == NULL)
                                {
                                  lineofDeath($validator);
                                  
                                }
                                $result = $obj->compareValue($value, $value2);
                                break;                
        
        default             : lineofDeath($validator);
                                
    }
    
    //validationSummary();
    if(!$result) 
        {$error[$field]="*".$err_msg;}
    else
        {$error[$field]="";}
    return $result;
}



class GeneralValidation
{   
    public function validateSubmit($value)
    {
        if(isset($_POST[$value]))
            {
             return 1;
            }
        else
            {return 0;}
	}
    
    public function validateNull($value)
    {
       
        
        if(empty($value))
        {return 0;}
        else
        {return 1;}
    }
    
    public function compareValue($value1,$value2)
    {
        if($value1 === $value2)
        {return 1;}
        else {
            return 0;
        }
    }
    
    
    
    public function validationRange($value,$min_val,$max_val){
        
        if($value <= $max_val && $value >= $min_val){
            return 1;
        }
        else{
            return 0;
   
        }
    
     }
    
}

class RegularExpValidation{    
    
    public function validateEmail($value)
        {
            if(filter_var($value, FILTER_VALIDATE_EMAIL)){         
               return 1;
            }    
            else{
                return 0;
            }
        }  
		
    public function validationNumber($value)
	{
            if(filter_var($value, FILTER_VALIDATE_INT)){				
                return 1;				
            }
            else{				
		return 0;
            }			
	}
			
    public function validationPC($value)
	{				
            $regex="/d{5}-\d{4}|\d{5}|[A-Z]\d[A-Z] \d[A-Z]/";
            
            if(preg_match($regex, $value)){
		return 1;				
            }
            else{				
		return 0;
            }			
	}  
	
	public function validationLetters($value)
	{
            if (preg_match("/^[a-zA-Z ]*$/",$value))
			{   				
                return 1;				
            }
            else{				
		return 0;
            }			
	}


                
}


function lineofDeath($validator)
{
    exit("<span style='color:red'>validation call error, check argument : <strong>".$validator."</strong></span>");
}



function validationSummary() {
    
    global $error;

 //   echo var_dump($error);
    
//   echo '<p>Validation Summary <br></p>';
    
    echo '<br><br><div style="color:red">';
    
    foreach($error as $msg)
    {
        if($msg!="")
            {
                echo '<strong>'.$msg.'</strong><br>';
            }
        
    }
    
    echo '</div>';
}

