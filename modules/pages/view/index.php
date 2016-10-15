<main id="main" class="col-xs-12 noPadding main">
		<div class="container">
			<div class="row">
				<section class="single-content col-xs-12 col-md-12">
					<ol class="breadcrumb">
						<li>
							<a href="#"><i class="fa fa-home" aria-hidden="true"></i></a>
						</li>
						<li class="active"><?php echo $this->data['title'];?></li>
					</ol>
					<div class="clearfix"></div>
					<?php 
                    if (isset($this->flash['flash_success'])) {
                        echo '<div class="alert alert-success">
                                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                  <strong>'.lang('success').'</strong> '.$this->flash['flash_success'].'
                                </div>';
                    }
                    ?>
					<?php 
					echo $this->data['content'];

					if($this->data['contact_form']!="") echo $this->data['contact_form'];
					 ?>
				</section>
				
			</div>
		</div>
</main>

