<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php echo ($this->_title!='') ? $this->_title : '<title>Demo</title>';?>
	<?php echo ($this->_description!='') ? $this->_description : '';?>
	<?php echo ($this->_keywords!='') ? $this->_keywords : '';?>
	<?php echo ($this->_author!='') ? $this->_author : '';?>
	
	<!-- Load CSS -->
	<link rel="stylesheet" href="<?php echo base_url()."tmp/public/root/";?>css/bootstrap.min.css">
	<?php echo ($this->_appendPluginsModCss!='') ? $this->_appendPluginsModCss : '';?>
	<link rel="stylesheet" href="<?php echo base_url()."tmp/public/";?>css/style.min.css">

	<?php echo ($this->_appendCss!='') ? $this->_appendCss : '';?>
	
	  <script type="text/javascript">
	    var baseUrl =  '<?php echo base_url();?>';
	  </script>
</head>

<body>

	<?php require_once "header.php"; ?>

	<section class="main-slider col-xs-12 noPadding">
		<div class="breadcrums col-xs-12 noPadding">
			<div class="breadcrums-wrapper col-xs-12 noPadding">
				<div class="container">
				</div>
			</div>
		</div><!-- /.breadcrums -->
		<div class="col-xs-12 no-Padding line-bar"></div>
	</section>

	<?php
	require_once DIR_MODULES . $_web['uri']['mod'] . "/view/" . $this->_fileView . ".php";
	 ?>

	<?php require_once "footer.php"; ?>
	<script type="text/javascript" src="<?php echo base_url()."tmp/public/root/";?>js/jquery-2.2.4.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()."tmp/public/root/";?>js/bootstrap.min.js"></script>
	<?php echo ($this->_appendPluginsModJs!='') ? $this->_appendPluginsModJs : '';?>
	<script type="text/javascript" src="<?php echo base_url()."tmp/public/";?>js/script.js"></script>
	<?php echo ($this->_appendJs!='') ? $this->_appendJs : '';?>
	

</body>
</html>

