<div class="row-lg-12">
    <?php foreach ($data as $key) { 
        if ($key['status'] == '0') {
        $prog = '20';
        }else if($key['status'] == '1'){
            $prog = '40';
        }else if ($key['status'] == '2'){
            $prog = '60';
        }else if ($key['status'] == '3'){
            $prog = '80';
        }else if ($key['status'] == '4'){
            $prog = '100';
        }

    ?>
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> Progres Pengajuan KTM
            </div>
            <div class="panel-body">
                <p>
                    <strong>Progres Bar</strong>
                    <span class="pull-right text-muted"><?php echo $prog; ?>% Complete</span>
                </p>
                <div class="progress progress-striped active">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $prog; ?>%">
                        <span class="sr-only"><?php echo $prog; ?>% Complete (success)</span>
                    </div>
                </div>
                    <strong>Note</strong>
                    <textarea style="width : 480px; height: 200px" disabled><?php echo $key['Note']; ?></textarea>
            </div>
        </div>
    </div>
    <?php } ?>        
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> Tampilan KTM
            </div>
            <div class="panel-body">
                <div class="container" id="tourpackages-carousel">
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                      <div class="thumbnail">
                          <div class="caption">
                            <div class='col-lg-12'>
                                <span class="glyphicon glyphicon-credit-card"></span>
                                <span class="glyphicon glyphicon-trash pull-right text-primary"></span>
                            </div>
                            <div class='col-lg-12 well well-add-card'>
                                <h4>John Deo Mobilel</h4>
                            </div>
                            <div class='col-lg-12'>
                                <p>4111xxxxxxxx3265</p>
                                <p class"text-muted">Exp: 12-08</p>
                            </div>
                            <button type="button" class="btn btn-primary btn-xs btn-update btn-add-card">Update</button>
                            <button type="button" class="btn btn-danger btn-xs btn-update btn-add-card">Vrify Now</button>
                            <span class='glyphicon glyphicon-exclamation-sign text-danger pull-right icon-style'></span>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
