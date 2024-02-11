<?php  if (count($adding_errors) > 0) : ?>
  <div class="errors" style="color:red;font-size:15px;">
  	<?php foreach ($adding_errors as $adding_error) : ?>
  	  <p><?php echo $adding_error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>