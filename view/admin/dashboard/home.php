        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Dashboard
                    <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?= base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3><?= $data['news_number'] ?></h3>

                                <p>Total News</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-ios-paper"></i>
                            </div>
                            <a href="<?= site_url("admin/news") ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3><?= $data['products_number'] ?></h3>

                                <p>Total Products</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-ios-box"></i>
                            </div>
                            <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3><?= $data['customers_number'] ?></h3>

                                <p>Total Customers</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-android-people"></i>
                            </div>
                            <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3><?= $data['orders_number'] ?></h3>

                                <p>Total Orders</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-ios-albums"></i>
                            </div>
                            <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>