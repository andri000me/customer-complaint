<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->userdata('message'); ?>
    <div class="row">
        <div class="col-sm mb-3">
            <form class="form-inline" action="" method="post">
                <input class="form-control mr-sm-2" name="keyword" type="search" placeholder="Search" aria-label="Search" style="width: 300px;">
                <button class="btn btn-outline-success my-2 my-sm-0" name="search" value="search-user" type="submit">Search</button>
            </form>
        </div>
    </div>
    <div class="row card p-4">
        <table class="table table-hover table-responsive-sm text-left">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col" width='170px'>Created</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col" width="200px">Image</th>
                    <th scope="col" class="text-center">Role</th>
                    <th scope="col" width="150px" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($list_user as $us) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= date('d F Y', $us['date_created']); ?></td>
                        <td><?= $us['name']; ?></td>
                        <td><?= $us['email']; ?></td>
                        <td>
                            <img src="<?= base_url('assets/img/profile/') . $us['image']; ?>" class="img-thumbnail" width="80px">
                        </td>
                        <td><?= $us['role']; ?></td>


                        <td class="text-center">
                            <a href="<?= base_url('admin/userDelete/') . $us['id']; ?>" class="badge badge-danger" onclick="return confirm('Sure?');">hapus</a>
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