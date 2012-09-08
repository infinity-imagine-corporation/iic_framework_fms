<?php 
if(! isset($id))
{
	$id = '';
	$file_name = '';
	$file_type = '';
	$file_path = '';
	$raw_name = '';
	$full_path= '';
	$orig_name = '';
	$client_name = '';
	$file_ext = '';
	$file_size = '';
	$is_image = '';
	$image_width = '';
	$image_height = '';
	$image_type = '';
	$image_size_str = '';
	
} 
?>

<form>
	<label for="file_name"><?php echo $this->lang->line('file_name') ?></label>
	<input type="text" name="file_name" value="<?php echo $file_name ?>" id="file_name" class="required" />
	<label for="file_type"><?php echo $this->lang->line('file_type') ?></label>
	<input type="text" name="file_type" value="<?php echo $file_type ?>" id="file_type"/>
	<label for="file_path"><?php echo $this->lang->line('file_path') ?></label>
	<input type="text" name="file_path" value="<?php echo $file_path ?>" id="file_path"/>
	<label for="raw_name"><?php echo $this->lang->line('raw_name') ?></label>
	<input type="text" name="raw_name" value="<?php echo $raw_name ?>" id="raw_name"/>
	<label for="full_path"><?php echo $this->lang->line('full_path') ?></label>
	<input type="text" name="full_path" value="<?php echo $full_path ?>" id="full_path"/>
	<label for="orig_name"><?php echo $this->lang->line('orig_name') ?></label>
	<input type="text" name="orig_name" value="<?php echo $orig_name ?>" id="orig_name"/>
	<label for="client_name"><?php echo $this->lang->line('client_name') ?></label>
	<input type="text" name="client_name" value="<?php echo $client_name ?>" id="client_name"/>
	<label for="file_ext"><?php echo $this->lang->line('file_ext') ?></label>
	<input type="text" name="file_ext" value="<?php echo $file_ext ?>" id="file_ext"/>
	<label for="file_size"><?php echo $this->lang->line('file_size') ?></label>
	<input type="text" name="file_size" value="<?php echo $file_size ?>" id="file_size"/>
	<label for="is_image"><?php echo $this->lang->line('is_image') ?></label>
	<input type="text" name="is_image" value="<?php echo $is_image ?>" id="is_image"/>
	<label for="image_width"><?php echo $this->lang->line('image_width') ?></label>
	<input type="text" name="image_width" value="<?php echo $image_width ?>" id="image_width"/>
	<label for="image_height"><?php echo $this->lang->line('image_height') ?></label>
	<input type="text" name="image_height" value="<?php echo $image_height ?>" id="image_height"/>
	<label for="image_type"><?php echo $this->lang->line('image_type') ?></label>
	<input type="text" name="image_type" value="<?php echo $image_type ?>" id="image_type"/>
	<label for="image_size_str"><?php echo $this->lang->line('image_size_str') ?></label>
	<input type="text" name="image_size_str" value="<?php echo $image_size_str ?>" id="image_size_str"/>
	
	<input id="id" name="id" type="hidden" value="<?php echo $id ?>" />
</form>