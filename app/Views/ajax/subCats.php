<?php 
    foreach($subCats as $row)
    { ?>
        <option value="<?php echo $row->cat_id; ?>"><?php echo $row->cat_name; ?></option>
    <?php 
    }
    
?>