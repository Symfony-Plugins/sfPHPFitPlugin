
<h1>All Tests</h1>

<ul>
  <?php foreach($index as $in): ?>
  <?php if(is_null($in->type) || is_null($in->name)) continue; ?>
  <li><a href="/fit/process?in=<?php echo $in->name; ?>&type=<?php echo $in->type; ?>"><?php echo $in->name; ?></a></li>
  <?php endforeach; ?>
</ul>
