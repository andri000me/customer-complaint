<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-sm font-weight-bold text-success text-uppercase mb-1">
                                Customer Complaint</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">
                                <?= $customer_complaint; ?>
                            </div>

                            <div class="text-xs font-weight-bold mb-1 mt-2">
                                <a href="<?= base_url('admin/customerComplaint'); ?>" class="text-success" style="text-decoration: none;">Click to more <i class="fas fa-angle-double-right ml-2"></i> </a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-chalkboard-teacher fa-4x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-sm font-weight-bold text-info text-uppercase mb-1">
                                List Users</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">
                                <?= $users; ?>
                            </div>
                            <div class="text-xs font-weight-bold mb-1 mt-2">
                                <a href="<?= base_url('admin/listUser'); ?>" class="text-info" style="text-decoration: none;">Click to more <i class="fas fa-angle-double-right ml-2"></i> </a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-list fa-4x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>




</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->