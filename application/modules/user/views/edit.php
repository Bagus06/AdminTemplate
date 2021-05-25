<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div class="col-md-5">
    <div class="alert" data-type='danger' data-message='coba dulu'></div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="panel panel-default card card-default">
            <div class="panel-heading card-header">
                <a href="<?= base_url($this->uri->rsegments[1] . '/main') ?>" class="btn btn-sm btn-warning"><i
                        class="fas fa-home"></i> Home</a>
                <?php if (empty($data['data'])): ?>
                Add
                <?php else: ?>
                Edit
                <?php endif ?> <?= capital_letters($this->uri->rsegments[1]) ?>
            </div>
            <div class="panel-body card-body">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control <?php if (form_error('username')){ echo 'is-invalid'; } ?>"
                        name="username" placeholder="username"
                        value="<?php if(!empty(set_value('username')) && !empty($data['data']['username'])){ echo set_value('username'); }elseif(!empty($data['data']['username'])){ echo $data['data']['username']; }elseif($this->form_validation->run() == false){ echo set_value('username'); } ?>">
                    <?= form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="password">
                </div>
                <div class="form-group">
                  <label>Group permission</label>
                  <select class="form-control select2" name="permission_id" style="width: 100%;" required>
                    <option value="">--Select--</option>
                    <?php if(!empty($data['permission'])): ?>
                        <?php foreach($data['permission'] as $ket => $value): ?>
                        <?php
                            $selected = '';
                            if($data['data']['permission_id'] == $value['id']){
                                $selected = 'selected';
                            }
                        ?>
                            <option value="<?= $value['id'] ?>" <?= $selected ?>><?= $value['title'] ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                  </select>
                </div>
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" class="form-control" placeholder="photo" name="photo">
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control <?php if (form_error('name')){ echo 'is-invalid'; } ?>"
                        name="name" placeholder="name"
                        value="<?php if(!empty(set_value('name')) && !empty($data['data']['name'])){ echo set_value('name'); }elseif(!empty($data['data']['name'])){ echo $data['data']['name']; }elseif($this->form_validation->run() == false){ echo set_value('name'); } ?>">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control <?php if (form_error('email')){ echo 'is-invalid'; } ?>"
                        name="email" placeholder="email"
                        value="<?php if(!empty(set_value('email')) && !empty($data['data']['email'])){ echo set_value('email'); }elseif(!empty($data['data']['email'])){ echo $data['data']['email']; }elseif($this->form_validation->run() == false){ echo set_value('email'); } ?>">
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
            </div>
            <div class="panel-footer card-footer">
                <div class="col-md-12">
                    <div align="right">
                        <a href="<?= base_url($this->uri->rsegments[1] . '/main') ?>"
                            class="btn btn-default btn-sm">Cancel</a>
                        <button class="btn btn-success btn-sm" type="submit"><i class="fa fa-save"></i>
                            Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>