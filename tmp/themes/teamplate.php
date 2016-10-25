<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php echo ($this->_title!='') ? $this->_title : '<title>'.$_web['settings']['seo_title'].'</title>'."\n";?>
	<?php echo ($this->_description!='') ? $this->_description : '<meta name="description" content="'.$_web['settings']['seo_description'].'">'."\n";?>
	<?php echo ($this->_keywords!='') ? $this->_keywords : '<meta name="keywords" content="'.$_web['settings']['seo_keywords'].'">'."\n";?>
	<?php echo ($this->_author!='') ? $this->_author : ''."\n";?>
	<link rel="shortcut icon" href="<?php echo (isset($_web['settings']['icon']) && $_web['settings']['icon']) ? $_web['base_url_cdn'].$_web['settings']['icon'] : '';?>" type="image/x-icon" />

	
	<!-- Load CSS -->
	<link rel="stylesheet" href="<?php echo base_url()."tmp/public/root/";?>css/bootstrap.min.css">
	<?php echo ($this->_appendPluginsModCss!='') ? $this->_appendPluginsModCss : '';?>
	<link rel="stylesheet" href="<?php echo base_url()."tmp/public/";?>css/style.min.css">

	<?php echo ($this->_appendCss!='') ? $this->_appendCss : '';?>
	
  	<script type="text/javascript">
    	var baseUrl =  '<?php echo base_url();?>';
  	</script>
  	<!-- TRACKING GOOGLE -->
 	<?php 
  	if (isset($_web['settings']['google_analytics']) && $_web['settings']['google_analytics']!="") {
	  	echo "<script>
				  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
				  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
				 
				  ga('create','".$_web['settings']['google_analytics']."', 'auto');
				 
			</script>";
  	}
   	?>
   <!-- END TRACKING GOOGLE -->
</head>

<body>

	<?php require_once "header.php"; ?>

    <!-- Page Content -->
    <div class="container">

			<?php require_once DIR_MODULES . $_web['uri']['mod'] . "/view/" . $this->_fileView . ".php";?>
			
			<?php require_once "footer.php"; ?>

	</div>
    <!-- /.container -->
	<script type="text/javascript" src="<?php echo base_url()."tmp/public/root/";?>js/jquery-2.2.4.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()."tmp/public/root/";?>js/bootstrap.min.js"></script>
	<?php echo ($this->_appendPluginsModJs!='') ? $this->_appendPluginsModJs : '';?>
	<script type="text/javascript" src="<?php echo base_url()."tmp/public/";?>js/script.js"></script>
	<?php echo ($this->_appendJs!='') ? $this->_appendJs : '';?>
	

</body>
</html>

