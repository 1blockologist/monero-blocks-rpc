<div id="wide-header" class="row">
  <div class="col-xs-12 col-lg-12 text-left">
    <h5><span class="page-header large"><i class="fa fa-users fa-fw"></i> mixins used in transactions (%) </span></h5>
  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<div class="row">
  <div class="col-xs-12 col-lg-12">
    <div class="panel panel-default panel-table">
      <div class="panel-heading">
        <div class="row ">
          <div class="col-xs-3 col-sm-1 col-md-2">mixin: </div>
          <div class="col-xs-2 col-sm-1 col-md-1">none :(</div>
          <div class="col-xs-2 col-sm-1 col-md-1">1 - 2</div>
          <div class="col-xs-5 col-sm-3 col-md-1">3 - 9</div>
          <div class="col-xs-12 col-sm-6 col-md-1">9 - 99 </div>
          <div class="col-xs-12 col-sm-6 col-md-1"> > 99 </div>
          <div class="col-xs-12 col-sm-6 col-md-1"> highest </div>
          <div class="col-xs-12 col-sm-6 col-md-1"> lowest </div>
          <div class="col-xs-12 col-sm-6 col-md-1"> total tx </div>
        </div>
      </div>
<?php 

$mixins = $data['mixins']; 

//var_dump($mixins[0]);

?>
      <div class="panel-body">
        <div class="row show-grid top-row">
          <div class="col-xs-3 col-sm-1 col-md-2">last day</strong></div>
          <div class="col-xs-2 col-sm-3 col-md-1"><?php echo $mixins[0]->group1 ?></div>
          <div class="col-xs-2 col-sm-3 col-md-1"><?php echo $mixins[0]->group2 ?></div>
          <div class="col-xs-5 col-sm-3 col-md-1"><?php echo $mixins[0]->group3 ?></div>
          <div class="col-xs-5 col-sm-3 col-md-1"><?php echo $mixins[0]->group4 ?></div>
          <div class="col-xs-5 col-sm-3 col-md-1"><?php echo $mixins[0]->group5 ?></div>
          <div class="col-xs-5 col-sm-3 col-md-1"><?php echo $mixins[0]->highest ?></div>
          <div class="col-xs-5 col-sm-3 col-md-1"><?php echo $mixins[0]->lowest ?></div>
          <div class="col-xs-5 col-sm-3 col-md-1"><?php echo $mixins[0]->tx_count ?></div>
        </div>
        <div class="row show-grid top-row">
          <div class="col-xs-3 col-sm-1 col-md-2">last week</strong></div>
          <div class="col-xs-2 col-sm-3 col-md-1"><?php echo $mixins[1]->group1 ?></div>
          <div class="col-xs-2 col-sm-3 col-md-1"><?php echo $mixins[1]->group2 ?></div>
          <div class="col-xs-5 col-sm-3 col-md-1"><?php echo $mixins[1]->group3 ?></div>
          <div class="col-xs-5 col-sm-3 col-md-1"><?php echo $mixins[1]->group4 ?></div>
          <div class="col-xs-5 col-sm-3 col-md-1"><?php echo $mixins[1]->group5 ?></div>
          <div class="col-xs-5 col-sm-3 col-md-1"><?php echo $mixins[1]->highest ?></div>
          <div class="col-xs-5 col-sm-3 col-md-1"><?php echo $mixins[1]->lowest ?></div>
          <div class="col-xs-5 col-sm-3 col-md-1"><?php echo $mixins[1]->tx_count ?></div>
        </div>
        <div class="row show-grid top-row">
          <div class="col-xs-3 col-sm-1 col-md-2">last month</strong></div>
          <div class="col-xs-2 col-sm-3 col-md-1"><?php echo $mixins[2]->group1 ?></div>
          <div class="col-xs-2 col-sm-3 col-md-1"><?php echo $mixins[2]->group2 ?></div>
          <div class="col-xs-5 col-sm-3 col-md-1"><?php echo $mixins[2]->group3 ?></div>
          <div class="col-xs-5 col-sm-3 col-md-1"><?php echo $mixins[2]->group4 ?></div>
          <div class="col-xs-5 col-sm-3 col-md-1"><?php echo $mixins[2]->group5 ?></div>
          <div class="col-xs-5 col-sm-3 col-md-1"><?php echo $mixins[2]->highest ?></div>
          <div class="col-xs-5 col-sm-3 col-md-1"><?php echo $mixins[2]->lowest ?></div>
          <div class="col-xs-5 col-sm-3 col-md-1"><?php echo $mixins[2]->tx_count ?></div>
        </div>
        <div class="row show-grid top-row">
          <div class="col-xs-3 col-sm-1 col-md-2">last year</strong></div>
          <div class="col-xs-2 col-sm-3 col-md-1"><?php echo $mixins[3]->group1 ?></div>
          <div class="col-xs-2 col-sm-3 col-md-1"><?php echo $mixins[3]->group2 ?></div>
          <div class="col-xs-5 col-sm-3 col-md-1"><?php echo $mixins[3]->group3 ?></div>
          <div class="col-xs-5 col-sm-3 col-md-1"><?php echo $mixins[3]->group4 ?></div>
          <div class="col-xs-5 col-sm-3 col-md-1"><?php echo $mixins[3]->group5 ?></div>
          <div class="col-xs-5 col-sm-3 col-md-1"><?php echo $mixins[3]->highest ?></div>
          <div class="col-xs-5 col-sm-3 col-md-1"><?php echo $mixins[3]->lowest ?></div>
          <div class="col-xs-5 col-sm-3 col-md-1"><?php echo $mixins[3]->tx_count ?></div>
        </div>
      </div>
      <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
  </div>
  <!-- /.col-lg-4 -->

</div>
<!-- /.row -->
