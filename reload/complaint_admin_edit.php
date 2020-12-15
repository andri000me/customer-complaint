<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title2; ?></h1>

    <div class="row card p-4">
        <div class="col-lg-8">
            <form action="" method="post">
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form0label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form0label">Type</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <select name="type_id" id="type" class="form-control">
                                <?php foreach ($type as $tc) : ?>
                                    <?php if ($tc['type'] == $list['type']) : ?>
                                        <option value="<?= $tc['id']; ?>" selected><?= $tc['type']; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $tc['id']; ?>"><?= $tc['type']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">Description</div>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" style="resize: none;"><?= $list['description']; ?></textarea>

                        <?= form_error('description', '<small class="text-danger ">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <a href="<?= base_url('admin/customerComplaint'); ?>" class="btn btn-primary">Back</a>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </div>

            </form>

        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->