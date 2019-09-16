<?php 
/**
* Description of EventView class  
* All program functionality for the EventView.  
*  
* @author gthoogendoorn  
*/ 
 class EventView {
    public function getGetValues(){         
        // Define the check for params         
        $get_check_array = array (             
            // submit action             
            'link'   => array('filter' => FILTER_SANITIZE_STRING )); 
        // Get filtered input:         
        return filter_input_array( INPUT_GET, $get_check_array );
    }
 } 
 
 ?>