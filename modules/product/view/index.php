<main id="main" class="col-xs-12 noPadding main">
		<div class="container">
			<div class="row">
				<section class="single-content col-xs-12 col-md-12">
					<ol class="breadcrumb">
						<li>
							<a href="#"><i class="fa fa-home" aria-hidden="true"></i></a>
						</li>
						<li class="active"><?php //echo $this->data['title'];?></li>
					</ol>
					<div class="clearfix"></div>
					<?php 
					if (!empty($this->data['data'])) {
						foreach ($this->data['data'] as $key => $value) {
							echo "<h2>".$value['title']."</h2><br />";
						}
					}
					if ($this->data['pagination']) {
                        echo $this->data['pagination'];
                    }
					 ?>
				</section>
				
			</div>
		</div>
</main>

