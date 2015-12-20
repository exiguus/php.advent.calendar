<div id="auth" class="step slide" data-x="-1000" data-y="-1500" data-rotate="180" data-scale="3">
  <h2><?php echo $auth['title']; ?></h2>
  <?php if (isset($_POST['auth'])) { ?><div class="error"><?php echo $config['webauthError']; ?></div><?php } ?>
  <form action="index.php<?php if (!empty($hash)) { ?><?php echo $hash; } ?>" method="post">
    <input type="hidden" name="hash" id="hash" value=""/>
    <input type="password" placeholder="<?php echo $auth['placeholder']; ?>" name="auth" id="auth" value="" required />
  </form>
</div>
