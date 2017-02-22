<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="dashboard-breadcrumb">
        <div class="pull-left">
            <ol class="breadcrumb">
						<li><a href="<?php echo base_url().'home/home/index'; ?>"><i class="fa fa-home" aria-hidden="true"></i> <?php echo lang('dashboard'); ?></a></li>
						<li class="active"><?php echo lang('dashboard'); ?></li>
			</ol>

        </div>
        <div class="pull-right">
            <a class="btn-main with-icon" data-toggle="modal" data-target="#widget_manager" href="#"></a>
        </div>
        <div class="clearfix"></div>
    </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo isset($this->data['new_order']) ? $this->data['new_order'] : 0; ?></h3>

              <p><?php echo lang('neworders'); ?></p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer"><?php echo lang('moreinfo');?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo isset($this->data['total_order']) ? $this->data['total_order'] : 0; ?></h3>

              <p><?php echo lang('countorders'); ?></p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer"><?php echo lang('moreinfo');?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>44</h3>

              <p><?php echo lang('userregistrations'); ?></p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer"><?php echo lang('moreinfo');?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $this->data['session_month'][0][0];?></h3>

              <p><?php echo lang('uniquevisitors').lang('inmonth'); ?></p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer"><?php echo lang('moreinfo');?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-6 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
              <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 400px;">
                <script type="text/javascript" src="https://www.google.com/jsapi"></script>
                <script type="text/javascript">
                  google.load("visualization", "1", {packages:["corechart"]});
                  google.setOnLoadCallback(drawChart);
                  function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                      ['<?php echo lang('time');?>', '<?php echo lang('guest');?>', '<?php echo lang('pageview');?>'],
                      <?php foreach($this->data['stats'] as $key => $value) { ?>
                      ['<?php echo $key%4==0?$key:'';?>', <?php echo $value[1].','.$value[2]; ?>],
                      <?php } ?>
                    ]);
                     
                    var options = {
                      title: '<?php echo lang('statistics_month');?>',
                      hAxis: {title: '<?php echo lang('time');?>', titleTextStyle: {color: '#333'}},
                      vAxis: {minValue: 0}
                    };
                     
                    var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
                    chart.draw(data, options);
                  }
                </script>
                <div id="chart_div" style="width: 100%; height: 400px;"></div>
              </div>
            </div>
          </div>
          <!-- /.nav-tabs-custom -->

          

          

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-6 connectedSortable">


          <!-- solid sales graph -->
          <div class="box box-solid bg-teal-gradient" style="height: 400px;overflow-y: scroll;">
             <!-- Custom tabs (Charts with tabs)-->
              <div class="nav-tabs-custom">
                <div class="tab-content no-padding">
                  <div class="chart tab-pane active" id="revenue-chart-table"  >
                    <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Full Referrer</th>
                          <th>Country</th>
                          <th>Page</th>
                          <th>Sessions</th>
                          <th>Pageviews</th>
                          <th>Avg. Time on Page</th>
                          <th width="140">Hour of Day</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        if (!empty($this->data['stats_pages'])) {
                          $i=1;
                          foreach ($this->data['stats_pages'] as $key => $value) { ?>
                              <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $value[0];?></td>
                                <td><?php echo $value[2];?></td>
                                <td><a href="<?php echo replaceAdmin(base_url()).$value[1];?>" target="_blank"><?php echo $value[1];?></a></td>
                                <td><?php echo $value[4];?></td>
                                <td><?php echo $value[5];?></td>
                                <td><?php echo $value[6];?></td>
                                <td><?php 
                                $arr = slowerDateAnalytics($value[3]);
                                echo $arr;?></td>
                              </tr>
                            <?php 
                            $i++;
                          }
                        }
                        
                         ?>
                        
                      </tbody>
                    </table>

                    </div>
                    
                  </div>
                  <p class="view_chart_table"><i class="fa fa-angle-double-down" aria-hidden="true"></i>&nbsp; Xem tất cả</p>
                </div>
              </div>

              <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.box -->

        </section>
        <!-- right col -->








      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>