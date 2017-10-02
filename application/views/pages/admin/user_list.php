<?php
$pos = $this->home->getPosition();
$getuserList = $this->home->getAllUsers();
?>
<div class="col-md-2">

</div>

<div class="col-md-10 body-container">
    <div class="panel p-body">
        <div class="panel-heading search">
            <div class="col-md-6">
                <h4>User Management</h4>
            </div>
        </div>
        <div class="panel-body">
            <div class="col-md-12">
                <?= $this->session->flashdata('message'); ?>
                <form action="/save_contact" class="form-horizontal" method="post">
                    <input type="hidden" name="record_id" value="<?= $member['id'] ?>" required>
                    <input type="hidden" name="type_of_registration" value="0">

                    <div class="col-md-6">


                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">First Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="firstname"
                                       value="<?= $member['first_name'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Date of Birth</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="dob" value="<?= $member['dob'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Work / Profession</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="work" value="<?= $member['work'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Contact Number</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="contact"
                                       value="<?= $member['contact'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Gender</label>
                            <div class="col-sm-9">
                                <select name="gender" class="form-control">
                                    <?php if ($member['gender'] == 'male') { ?>
                                        <option value="male" selected>Male</option>
                                    <?php } else if ($member['gender'] == 'female') { ?>
                                        <option value="female" selected>Female</option>
                                    <?php } else { ?>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    <?php } ?>

                                </select>
                            </div>
                        </div>
                        <?php if ($member['id'] == 0) { ?>

                            <div class="form-group">
                                <label for="" class="col-sm-3 control-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="username">
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Last Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="lastname"
                                       value="<?= $member['last_name'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Place of Birth</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="pob" value="<?= $member['pob'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Office Location</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="location"
                                       value="<?= $member['location'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Email Address</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="email" value="<?= $member['email'] ?>"
                                       pattern="[^@\s]+@[^@\s]+\.[^@\s]+" title="Invalid email address">
                            </div>
                        </div>
                        <?php if ($member['id'] == 0) { ?>
                            <div class="form-group">
                                <label for="" class="col-sm-3 control-label">Position</label>
                                <div class="col-sm-9">
                                    <select name="position" class="form-control">
                                        <?php foreach ($pos as $val) { ?>
                                            <option value="<?= $val['id'] ?>"><?= $val['description'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-sm-3 control-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>
                        <?php } ?>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <a href="/userManagement" class="btn btn-info" style="float:right;margin-left: 5px;">Cancel</a>
                                <button class="btn btn-primary" style="float:right;" type="submit">Save</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        User List
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-hover example_data" cellspacing="0"
                               width="100%">
                            <thead>

                            <tr>
                                <th style="background-image: linear-gradient(#8EB891, #799F7C, #698A6B);">Name</th>
                                <th style="background-image: linear-gradient(#8EB891, #799F7C, #698A6B);"> Contact</th>
                                <th style="background-image: linear-gradient(#8EB891, #799F7C, #698A6B);">Email
                                    Address
                                </th>
                                <th style="background-image: linear-gradient(#8EB891, #799F7C, #698A6B);">Work /
                                    Profession
                                </th>
                                <th style="background-image: linear-gradient(#8EB891, #799F7C, #698A6B);">Office
                                    Location
                                </th>
                                <th style="background-image: linear-gradient(#8EB891, #799F7C, #698A6B);">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($getuserList as $val) { ?>
                                <tr>
                                    <td><?= $val['first_name'] . '  ' . $val['last_name'] ?></td>
                                    <td><?= $val['contact'] ?></td>
                                    <td><?= $val['email'] ?></td>
                                    <td><?= $val['work'] ?></td>
                                    <td><?= $val['location'] ?></td>
                                    <td style="width: 150px">
                                        <a href="/userManagement/edit/<?= $val['id'] ?>" class="label label-info">Edit
                                            &nbsp;&nbsp;<span class="glyphicon glyphicon-pencil"></span></a>
                                        <a href="/userManagement/delete/<?= $val['id'] ?>" class="label label-danger"
                                           onclick="confirm('Are you sure you want to delete this contact?')">Delete
                                            &nbsp;&nbsp;<span class="glyphicon glyphicon-trash"></span></a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>