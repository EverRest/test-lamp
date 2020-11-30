<?php $users = $this->params; ?>
<div class="table-container table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $k => $user): ?>
            <tr>
                <th scope="row"><?= ++$k; ?></th>
                <td><?= $user['id'] ?></td>
                <td><?= $user['name']; ?></td>
                <td><?= $user['email']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="btn-container">
    <a href="/get" class="btn btn-primary">+</a>
</div>
