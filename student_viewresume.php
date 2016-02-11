<?php
session_start();
$resume  = $_REQUEST['resumelink'];
?>
<html>
<body>
<embed src="<?php echo $resume;?>" width="100%" height="95%" alt="pdf" pluginspage="http://www.adobe.com/products/acrobat/readstep2.html">
</body>
</html>