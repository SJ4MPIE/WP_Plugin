<?php
// Include model:
include MY_EVENT_ORGANISER_PLUGIN_MODEL_DIR. "/EventCategory.php";

// Declare class variable:
$event_categories = new EventCategory();
// Set base url to current file and add page specific vars
$base_url = get_admin_url().'admin.php'; $params = array( 'page'    => basename(__FILE__,".php"));
// Add params to base url
$base_url = add_query_arg( $params, $base_url );
// Get the GET data in filtered array 
$get_array = $event_categories->getGetValues(); 
echo '<pre>'; 
echo __FILE__.__LINE__.'<br />';
var_dump($get_array); echo '</pre>'; 
 // Keep track of current action.
$action = FALSE; 
 if (!empty($get_array)){
     // Check actions
     if (isset($get_array['action'])){
         $action = $event_categories->handleGetAction($get_array);
    }
} 
// Get the POST data in filtered array 
$post_array = $event_categories->getPostValues();
// Check the POST data 

// Collect Errors 
$error = FALSE; 
 // Check the POST data 
 if (!empty($post_array)){          
    // Check the add form:     
    $add = FALSE;     
    if (isset($post_array['add']) ){         
            // Save event categorie        
            $result = $event_categories->save($post_array);        
        if ($result){            
            // Save was succesfull            
            $add = TRUE;         
        } 
        else {             
            // Indicate error            
            $error = TRUE;         
        }     
    } 
} 
    if (!empty($post_array)){          
        // Check the add form:     
        $add = FALSE;     
        if (isset($post_array['add']) ) {         
            // Save event categorie         
            $event_categories->save($post_array);         
            $add = TRUE;
        } 
    } 
echo '<pre>'; 

echo __FILE__.__LINE__.'<br />';

var_dump($post_array);

echo '</pre>'; //*/
 ?> 
<div class="wrap">
    Admin event categorie CRUD.<br />
    ( Uitje, excursie, etc)
     <?php
        echo ($add ? "<p>Added a new event</p>" : "");
    ?>
    <table>
        <caption>Event type categories</caption>
        <thead>
            <tr>
                <th width="10">Id</th>
                <th width="150">Name</th>
                <th width="200">Description</th>
            </tr>
        </thead>
     <!-- <tr><td colspan="3">Event types rij 1</td></tr> -->
     <?php 
     //*                
        if( $event_categories->getNrOfEventCategories() < 1){ ?>
        <tr><td colspan="3">Start adding Event Categories</tr> 
        <?php               
            } else {                     
                $cat_list = $event_categories->getEventCategoryList();                                       
                   //** Show all event categories in the tabel                    
                    foreach( $cat_list as $event_cat_obj){ 
                    
                        // Create update link
                        $params = array( 'action' => 'update', 'id' => $event_cat_obj->getId()); 
                        // Add params to base url update link
                        $upd_link = add_query_arg( $params, $base_url );   
                        ?>
                        <tr><td width="10"><?php echo $event_cat_obj->getId(); ?></td>                    
                            <td width="180"><?php echo $event_cat_obj->getName(); ?></td>                    
                            <td width="200"><?php echo $event_cat_obj->getDescription();?></td>
                            <td><a href="<?php echo $upd_link; ?>">Update</a></td>                    
                            <td><button onclick="myFunction(<?php echo $event_cat_obj->getId();?>)">Click me</button></td>           
                        </tr> 
                    <?php } ?> 
            <?php } ?> 
    </table>
    <form action="<?php echo $base_url; ?>" method="post"><tr>       
        <table>            
            <tr><td colspan="2"><input type="text" name="name"></td>
            <td><input type="text" name="description"></td></tr>
            <tr><td colspan="2"><input type="submit" name="add" value="Toevoegen"/>
            </td></tr>       
        </table>    
    </form>   
</div>