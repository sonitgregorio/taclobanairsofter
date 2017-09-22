<?php
$contacts = $this->home->getContactRecord($this->session->userdata('cid'));
//print_r($contacts);
?>
<div class="col-md-2">

</div>
<div class="col-md-10 body-container">
    <div class="panel p-body">
        <div class="panel-heading search">
            <div class="col-md-6">
                <h4>Account Settings</h4>
            </div>
        </div>
        <div class="panel-body">
            <div class="col-md-12" style="margin-top: 10px;">
                <?php echo $this->session->flashdata('message') ?>
                <form action="/save_account" class="form-horizontal" enctype="multipart/form-data" method="post">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">First Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="firstname"
                                       value="<?= $contacts['first_name'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Last Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="lastname"
                                       value="<?= $contacts['last_name'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Date of Birth</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="dob" value="<?= $contacts['dob'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Place of Birth</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="pob" value="<?= $contacts['pob'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Address</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="address"
                                       value="<?= $contacts['location'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Contact #</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="contact"
                                       value="<?= $contacts['contact'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">E-mail</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="email" value="<?= $contacts['email'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Work</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="work" value="<?= $contacts['work'] ?>">
                            </div>
                        </div>
                        <div style="float: right">
                            <button class="btn btn-primary">Save</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" style="margin-left: 50px;">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail" data-trigger="fileinput"
                                     style="width: 200px; height: 150px;">
                                    <img src="<?php echo "/assets/images/" . $contacts['image'] ?>" alt="" />
                                    <img src="" alt=""/>
                                </div>
                                <div>
                                    <span class="btn btn-info btn-file"><span
                                                class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input
                                                type="file" name="picture"></span>
                                    <a href="#" class="btn btn-default fileinput-exists"
                                       data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>
