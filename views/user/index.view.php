<main class="container" style="margin-top:30px">
    <div class="row">
        <div class="col-sm-8">
            <h1>Usuaris <span><a class="btn btn-primary" href="/admin/users/create"><i class="fa fa-plus" aria-hidden="true"></i></a></span></h1>
            <table class="table">
                <tr>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Last login</th>
                    <th>Actions</th>
                </tr>
                <?php foreach ($users as $user) :?>
                <tr>
                    <td><?=$user->getUsername()?></td>
                    <td><?=$user->getRole()?></td>
                    <td><?=($user->getLastLogin() !== null)?$user->getLastLogin()->format('d-m-Y H:i:s'):"" ?></td>
                    <td><a href="/admin/users/<?=$user->getId()?>/edit"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
                </tr>
                <?php endforeach;?>

            </table>
        </div>
        <div class="col-sm-4">
        </div>
    </div>
</main>
