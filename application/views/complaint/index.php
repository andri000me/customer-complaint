<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row card p-4">
        <div class="row">
            <div class="col-lg-8">
                <form action="" method="post">
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form0label">Email</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="type" class="col-sm-3 col-form0label">Type Complaint</label>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <select name="type_id" id="type" class="form-control">
                                    <?php foreach ($type as $tc) : ?>
                                        <option value="<?= $tc['id']; ?>"><?= $tc['type']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                    </div>


                    <div class="form-group row">
                        <div class="col-sm-3">Description</div>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" style="resize: none;"></textarea>
                            <?= form_error('description', '<small class="text-danger ">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row justify-content-end">
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->