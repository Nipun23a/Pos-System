<?php  if (count($adding_errors) > 0) : ?>
    <div class="errors" style="color:red;font-size:15px;">
  	<?php foreach ($adding_errors as $adding_error) : ?>
  	  <p><?php echo $adding_error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>

<?php  if (count($add_items) > 0) : ?>
    <div class="errors" style="color:green;font-size:15px;">
  	<?php foreach ($add_items as $add_item) : ?>
  	  <p><?php echo $add_item ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>