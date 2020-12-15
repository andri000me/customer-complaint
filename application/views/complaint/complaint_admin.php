<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->userdata('message'); ?>
    <div class="row">
        <div class="col-sm mb-3">
            <form class="form-inline" action="" method="post">
                <input class="form-control mr-sm-2" name="keyword" type="search" placeholder="Search" aria-label="Search" style="width: 300px;">
                <button class="btn btn-outline-success my-2 my-sm-0" name="search" value="search-complaint" type="submit">Search</button>
            </form>
        </div>
    </div>
    <div class="row card p-4">
        <table class="table table-hover table-responsive-sm text-left">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col" width='170px'>Created</th>
                    <th scope="col">Email</th>
                    <th scope="col">Type</th>
                    <th scope="col" width="200px">Description</th>
                    <th scope="col" class="text-center">Status</th>
                    <th scope="col" width="150px" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($list as $l) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= date('d F Y', $l['created']); ?></td>
                        <td><?= $l['email']; ?></td>
                        <td><?= $l['type']; ?></td>
                        <td>
                            <?= substr($l['description'], 0, 20);  ?>
                            <?php if (strlen($l['description']) >= 40) : ?>
                                ...
                            <?php endif; ?>
                        </td>
                        <?php if ($l['status'] == 0) : ?>
                            <td class="text-center">
                                <a href="<?= base_url('admin/complaintDone/') . $l['id']; ?>" class="badge badge-warning">Pending</a>
                            </td>
                        <?php elseif ($l['status'] == 1) : ?>
                            <td class="text-center">
                                <a href="<?= base_url('admin/complaintDone/') . $l['id']; ?>" class="badge badge-success">Done</a>
                            </td>
                        <?php endif; ?>
                        <td class="text-center">
                            <a href="<?= base_url('admin/complaintDetail/') . $l['id']; ?>" class="badge badge-info">detail</a>
                            <a href="<?= base_url('admin/complaintEdit/') . $l['id']; ?>" class="badge badge-primary">edit</a>
                            <a href="<?= base_url('admin/complaintDelete/') . $l['id']; ?>" class="badge badge-danger" onclick="return confirm('Sure?');">hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->