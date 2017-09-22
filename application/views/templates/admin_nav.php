

<li class="list-group-item"><a class="menu" href="index.php?page=account">
        <span class="glyphicon glyphicon-cog"></span>&nbsp; &nbsp; Account Settings</a></li>

<div class="row">
    <div class="col-md-2 side-bar-menu hidden-print">
        <div class="collapse navbar-collapse">
            <div class="panel-heading">
                <div style="margin: 0 auto">
                    <img src="/assets/images/<?= $this->session->userdata('img') ?>" alt="" class="border_image">
                    <label class="name_label" for=""><?= $this->session->userdata('name') ?></label>
                </div>

            </div>
            <li class="list-group-item"><a class="menu" href="/products">
                    <span class="glyphicon glyphicon-shopping-cart"></span>&nbsp; &nbsp; Products Management</a></li>
            <li class="list-group-item"><a class="menu" href="/store">
                    <span class="glyphicon glyphicon-tasks"></span>&nbsp; &nbsp; Store</a></li>
            <li class="list-group-item"><a class="menu" href="/my_cart">
                    <span class="glyphicon glyphicon-briefcase"></span>&nbsp; &nbsp; My Cart</a></li>
            <li class="list-group-item"><a class="menu" href="/userManagement">
                    <span class="glyphicon glyphicon-user"></span>&nbsp; &nbsp; User Management</a></li>
            <li class="list-group-item"><a class="menu" href="/account_settings">
                    <span class="glyphicon glyphicon-cog"></span>&nbsp; &nbsp; Account Settings</a></li>
            <li class="list-group-item"><a class="menu" href="/logout">
                    <span class="glyphicon glyphicon-log-out"></span>&nbsp; &nbsp; Logout</a></li>
        </div>
    </div>
</div>