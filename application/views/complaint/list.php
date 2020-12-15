<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row card p-4">
        <table class="table table-hover table-responsive-sm text-left">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col" width='200px'>Created</th>
                    <th scope="col">Type</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($list as $l) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= date('d F Y', $l['created']); ?></td>
                        <td><?= $l['type']; ?></td>
                        <td><?= $l['description']; ?></td>
                        <?php if ($l['status'] == 0) : ?>
                            <td>
                                <label for="" class="badge badge-warning">Pending</label>
                            </td>
                        <?php elseif ($l['status'] == 1) : ?>
                            <td>
                                <label for="" class="badge badge-success">Done</label>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->