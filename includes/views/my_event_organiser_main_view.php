<?php
    // Set base url and add page specific vars 
    $base_url = get_permalink();
    // Include the Event class from the VIEW. 
    require_once MY_EVENT_ORGANISER_PLUGIN_INCLUDES_VIEWS_DIR.'/EventView.php'; 
    $event_view = new EventView(); 
    // Get the getters 
    $get_inputs = $event_view->getGetValues();
    // If provided set current file based on the provided link 
    $current_file = (!empty($get_inputs['link']) ? MY_EVENT_ORGANISER_PLUGIN_INCLUDES_VIEWS_DIR. '/'. $get_inputs['link'].'.php' : ''); 
    // Add the current page link get param. 
    if (!empty($get_inputs['link'])){     
        $params = array( 'link' => $get_inputs['link']);     
        $file_base_url = add_query_arg( $params, $base_url );      
    } 
    else {     
        // Or stick to base url     
        $file_base_url = $base_url; 
    }
    
    if (!empty($current_file) && file_exists( $current_file)){
        // Include the link file and show that page.
        include $current_file;
    } //* 
    else if (!empty($current_file) && !file_exists($current_file)){ 
        // Linked file not found!     
        // @todo: Change error     
        echo '<span style="color:red">Main view error: FILE NOT FOUND ['. $current_file .']</span>';     
    } //*/  
    else {
 
    echo '<span style="color:blue">Test main view</span>'; 
 ?> 
 <div>This is the main view content</div>
 <?php     
    // Create add link
    $params = array( 'link' => 'event_add'); 
    // Add params to base url update link     
    $link = add_query_arg( $params, $base_url ); 
?> 
<a href="<?php echo $link;?>">Evenementen toevoegen </a><p /> 
<?php
    // Create event_list link
    $params = array( 'link' => 'event_list'); 
    // Add params to base url link
    $link = add_query_arg( $params, $base_url );  
?> 
<a href="<?php echo $link;?>">Evenementen lijst </a><p /> 
<?php     
    // Create sign on link     
    $params = array( 'link' => 'event_apply'); 
    // Add params to base url update link
    $link = add_query_arg( $params, $base_url );  
?> 
<a href="<?php echo $link;?>">Inschrijven op evenement </a><p />
<?php 
} 
?>