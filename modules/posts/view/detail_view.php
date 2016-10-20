<div class="row">
<!-- Blog Post Content Column -->
    <div class="col-lg-8">


        <!-- Blog Post -->

        <!-- Title -->
        <h1><?php echo $this->data['data_posts']['title'];?></h1>

        <!-- Author -->
        <p class="lead">
            by <a href="#"><?php echo $this->data['data_posts']['username'];?></a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo date('H:i:s d-m-Y',$this->data['data_posts']['create_time']);?></p>

        <hr>

        <!-- Preview Image -->
        <img class="img-responsive" src="http://placehold.it/900x300" alt="">

        <hr>

        <!-- Post Content -->
        <p class="lead"><?php echo $this->data['data_posts']['content']?></p>


        <hr>

        <?php 
        if ($_web['options']['comment']!=0) { ?>
            <!-- Blog Comments -->

            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form method="post">
                    <div class="form-group">
                        <label>Username:</label>
                        <input class="form-control" type="text" name="username" />
                        <input type="hidden" name="_token" value="<?php echo $this->data['_token'];?>">
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input class="form-control" type="email" name="email" />
                    </div>
                    <div class="form-group">
                        <label>Bình luận:</label>
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
            </div>

            <hr>

            <!-- Posted Comments -->
        <?php 
        }
         ?>

        

    </div>

    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">

        <!-- Blog Search Well -->
        <div class="well">
            <h4>Blog Search</h4>
            <div class="input-group">
                <input type="text" class="form-control">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <span class="glyphicon glyphicon-search"></span>
                </button>
                </span>
            </div>
            <!-- /.input-group -->
        </div>

        <!-- Blog Categories Well -->
        <div class="well">
            <h4>Blog Categories</h4>
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-unstyled">
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul class="list-unstyled">
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.row -->
        </div>

        <!-- Side Widget Well -->
        <div class="well">
            <h4>Side Widget Well</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
        </div>

    </div>
</div>