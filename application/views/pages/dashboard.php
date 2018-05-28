                        <script>
window.onload = function() {

var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    title: {
        text: "Pie Chart Pengajuan KTM 2018"
    },
    data: [{
        type: "pie",
        startAngle: 240,
        yValueFormatString: "##0.00\"%\"",
        indexLabel: "{label} {y}",
        dataPoints: [
            {y: <?php echo $peng0 ?>, label: "Menunggu Validasi"},
            {y: <?php echo $peng1 ?>, label: "Data ada yang kurang atau salah"},
            {y: <?php echo $peng2 ?>, label: "Data Masih ditampung"},
            {y: <?php echo $peng3 ?>, label: "Proses Pembuatan"},
            {y: <?php echo $peng4 ?>, label: "KTM sudah jadi"}
        ]
    }]
});
chart.render();

}
</script>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="glyphicon glyphicon-folder-open fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $peng; ?></div>
                                    <div>Total Pengajuan!</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('pengajuan') ?>">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $sukses; ?></div>
                                    <div>Pengajuan Sukses!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="glyphicon glyphicon-education fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $mhs ?></div>
                                    <div>Jumlah Mahasiswa!</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('mahasiswa') ?>">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="glyphicon glyphicon-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $user; ?></div>
                                    <div>Jumlah User!</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('user') ?>">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row-lg-12">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa fa-bar-chart-o fa-fw"></i> Pie Chart Pengajuan
                                </div>
                                <div class="panel-body">
                                    <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                                </div>
                                <!-- /.panel-body -->
                    </div>
                </div>
                <div class="col-lg-6">
            
                </div>
            </div>
