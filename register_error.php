<?php  if (count($register_errors) > 0) : ?>
  <div class="errors" style="text-align: center;color:red;font-size:15px;">
  	<?php foreach ($register_errors as $register_error) : ?>
  	  <p><?php echo $register_error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>