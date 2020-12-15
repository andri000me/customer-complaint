<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <?= $this->session->flashdata('message'); ?>
    <div class="row card p-4">
        <div class="col-lg-9">
            <form action="<?= base_url('user/pass'); ?>" method="post">

                <div class="form-group row">
                    <label for="current_password" class="col-sm-3 col-form0label">Current Password</label>
                    <div class=" col-sm-6">
                        <input type="password" class="form-control" id="current_password" name="current_password">
                        <?= form_error('current_password', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>


                <div class="form-group row">
                    <label for="new_password1" class="col-sm-3 col-form0label">New Password</label>
                    <div class=" col-sm-6">
                        <input type="password" class="form-control" id="new_password1" name="new_password1">
                        <?= form_error('new_password1', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="new_password2" class="col-sm-3 col-form0label">Confirm Password</label>
                    <div class=" col-sm-6">
                        <input type="password" class="form-control" id="new_password2" name="new_password2">
                        <?= form_error('new_password2', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row justify-content-end">
                    <div class="col-sm-9">
                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                </div>



            </form>
        </div>
    </div>




</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->