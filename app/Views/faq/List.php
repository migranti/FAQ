<?php

use Core\Helpers;

?>
<?php   include('./app/Views/common/header.php'); ?>

<form action="" method="get">

<input type="text" name='keyword'>
 
<input type="submit">

</form>

<div id="accordion">
  <?php foreach ($data['faq'] as $faq) { ?>
        <?php echo '<h3>' .  $faq['title'] . '<h3> ';?>
  <div>
      <p>
        <?php echo '<p>' .  $faq['description'] . '<p> ';?>
      </p>
  </div>
  

  <?php } ?>
</div>
 
</body>
</html>

<?php  include('./app/Views/common/footer.php'); ?>


