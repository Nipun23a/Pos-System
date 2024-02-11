<?php  if (count($function_errors) > 0) : ?>
    <div class="errors" style="color:red;font-size:15px;">
  	<?php foreach ($function_errors as $function_error) : ?>
  	  <p><?php echo $function_error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>

<?php  if (count($success_messages) > 0) : ?>
    <div class="errors" style="color:green;font-size:15px;">
  	<?php foreach ($success_messages as $sucess_message) : ?>
  	  <p><?php echo $sucess_message ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>