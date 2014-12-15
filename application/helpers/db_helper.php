<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('my_process_db_request'))
{
    function my_process_db_request( $param = array(), $target = null, $is_mandatory = false)
    {
    	$type_default_mapping = array(
    			'int' => 0,
    			'string'=> ''
    	);
    	if($target){
    		$request = array();
		
		    foreach($target as $key => $attr){
		    			//set in param
		    			if(isset($param[$key])){
		    				$request[$key] = $param[$key];
		    			}
		    			else{
		    				//has default
		    			   if(isset($attr['default']))
		    			   {
		    			   		$request[$key] = $attr['default'];
		    			   }
		    			   else{
			    			   	//has type default
			    			   	if(isset($attr['type']) && isset($type_default_mapping[$attr['type']])){
			    			   		$request[$key] = $type_default_mapping[$attr['type']];
			    			   }
		    			   else
		    			   {
		    			   	$request[$key] = null;
		    			   	if($is_mandatory){
		    			   		return false;
		    			   	}
		    			   }
		    			}
		    			}
		    }
	    	return $request;
    	}
    	else
    	{
    		return null;
    	}
       
    }   
}