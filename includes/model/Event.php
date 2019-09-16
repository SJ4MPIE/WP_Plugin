<?php 
/**
* Description of Event 
* @author gthoogendoorn  
*/ 
require_once MY_EVENT_ORGANISER_PLUGIN_MODEL_DIR.'/EventCategory.php'; 
 
 
class Event {          
    /**      
    * @var type EventCategory      
    */     
    private $event_category = null;          
    public function __construct() {                  
        // Init the category and type         
        $this->event_category   = new EventCategory();     
    }
      /**
        * @return type array of EventCategorie      
        */     
        public function getEventCategoryList(){
            return $this->event_category->getEventCategoryList(); 
      } 
 }     
 ?>