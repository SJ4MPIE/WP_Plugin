<?php 
    echo 'event_add.php'; // xxx = pagina naam (e.g event_add) 
    // Include the Event class from the model. 
    require_once MY_EVENT_ORGANISER_PLUGIN_MODEL_DIR.'\Event.php'; 

    $event = new Event(); 
    // Get the list with the event categories 
    $event_cat_list = $event->getEventCategoryList();

?>
<h2><?php echo __('Evenement aanmaken')?></h2>
<p/> <h3><?php echo __('Menu')?></h3> <form action="<?php echo $file_base_url; ?>" method="post">     
<table>
<tr><td><?php echo __('Titel:');?></td><td><input type="text" name="title" value="<?php echo $post_inputs['title']?>"/></td></tr>
<tr><td><?php echo __('Selecteer evenement categorie:');?></td><td><select name="cat">
<?php // Create the category drop down
foreach ($event_cat_list as $event_cat_obj){
?>
<option value="<?php echo $event_cat_obj->getId();?>">
<?php echo $event_cat_obj->getName();?></option> 
<?php
var_dump( $event_cat_obj->getId());
var_dump( $event_cat_obj);
}
?>
</select></td></tr>
<tr><td><?php echo __('Selecteer inschrijvingstype:');?></td><td><select name="type"></select></td></tr>
<tr><td><?php echo __('Evenement datum:<br />');?></td><td><input type="text" name="event_date" /></td></tr>         
<tr>             
<td><?php echo __('Eind datum: <br />');?></td><td><input type="text" name="end_date" /></td>
</tr>
<tr><td><?php echo __('Uiterlijke inschrijfdatum');?></td><td><input type="text" name="due_date"/></td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td><?php echo __('Extra informatie:');?></td><td><textarea name="info" rows="4" cols="5" ><?php echo $post_inputs['info'];?></textarea></td></tr> 
<tr><td>&nbsp;</td><td><input type="submit" name="add_event" value="<?php echo __('Aanmaken');?>" /></td></tr>
<tr><td colspan="2">&nbsp;</td></tr>     </table> </form>