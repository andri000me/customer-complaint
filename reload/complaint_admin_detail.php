<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title2; ?></h1>


    <div class="row card p-4" style="max-width: 840px;">
        <div class="col-lg-8">
            <form action="" method="post">
                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form0label"><strong>Email</strong></label>
                    <div class="col-sm-9">
                        <?= $user['email']; ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form0label"><strong>Type</strong></label>
                    <div class="col-sm-9">
                        <div class="form-group">
                            <?= $list['type']; ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="desc" class="col-sm-3 col-form0label"><strong>Description</strong></label>
                    <div class="col-sm-9">
                        <?= $list['description']; ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="desc" class="col-sm-3 col-form0label"><strong>Created</strong></label>
                    <div class="col-sm-9">
                        <?= date("d F Y", $list['created']); ?>
                    </div>
                </div>


                <div class="form-group row justify-content-end">
                    <div class="col-sm-9">
                        <a href="<?= base_url('admin/customerComplaint'); ?>" class="btn btn-primary">Back</a>

                    </div>
                </div>

            </form>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->