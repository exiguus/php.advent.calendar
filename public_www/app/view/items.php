<?php
$today = (int) str_replace('-','',$today);
foreach ($items as $item)
  {
  $date = (int) str_replace('-','',$item['date']);
  if ($today >= $date)
    {
      if (isset($dateTranslate))
      {
        $headline = strtr(date('d. F Y',strtotime($date)),$dateTranslate);
      }
      else
      {
        $headline = date('d. F Y',strtotime($date));
      }
?>
<div id="<?php echo $item['date']; ?>" class="step"<?php if (!empty($item['data-x'])) { ?> data-x="<?php echo $item['data-x']; ?>"<?php } ?><?php if (!empty($item['data-y'])) { ?> data-y="<?php echo $item['data-y']; ?>"<?php } ?><?php if (!empty($item['data-z'])) { ?> data-z="<?php echo $item['data-z']; ?>"<?php } ?><?php if (!empty($item['data-rotate'])) { ?> data-rotate="<?php echo $item['data-rotate']; ?>"<?php } ?><?php if (!empty($item['data-rotate-x'])) { ?> data-rotate-x="<?php echo $item['data-rotate-x']; ?>"<?php } ?><?php if (!empty($item['data-rotate-y'])) { ?> data-rotate-y="<?php echo $item['data-rotate-y']; ?>"<?php } ?><?php if (!empty($item['data-rotate-z'])) { ?> data-rotate-z="<?php echo $item['data-rotate-z']; ?>"<?php } ?><?php if (!empty($item['data-scale'])) { ?> data-scale="<?php echo $item['data-scale']; ?>"<?php } ?>>
  <h1><time datetime="<?php echo $item['date']; ?>"><?php echo $headline; ?></time></h1>
<?php echo $item['content']; ?>

</div>
<?php
    }
  }
?>
