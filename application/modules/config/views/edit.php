<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="col-12">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Application Setting</h3>
                </div>
                <form action="<?= base_url('config/edit') . encrypt_url($data['data']['application']['title']) ?>"
                    method="post" enctype='multipart/form-data'>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">App Name</label>
                            <input type="text"
                                class="form-control <?php if (form_error('title')){ echo 'is-invalid'; } ?>"
                                name="title" placeholder="title"
                                value="<?php if(!empty(set_value('title')) && !empty($data['data']['application']['value']->title)){ echo set_value('title'); }elseif(!empty($data['data']['application']['value']->title)){ echo $data['data']['application']['value']->title; }elseif($this->form_validation->run() == false){ echo set_value('title'); } ?>">
                            <?= form_error('title', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="desc">App Description</label>
                            <input type="text"
                                class="form-control <?php if (form_error('desc')){ echo 'is-invalid'; } ?>" name="desc"
                                placeholder="desc"
                                value="<?php if(!empty(set_value('desc')) && !empty($data['data']['application']['value']->desc)){ echo set_value('desc'); }elseif(!empty($data['data']['application']['value']->desc)){ echo $data['data']['application']['value']->desc; }elseif($this->form_validation->run() == false){ echo set_value('desc'); } ?>">
                            <?= form_error('desc', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="showLogo">App Logo</label><br>
                            <img src="<?= base_url('assets/images/logo/') . $data['data']['application']['value']->logo ?>"
                                style="width: 200px;" id="showLogo" align="left"><br>
                            <input class="form-control" name="logo" type="file" id="loadLogo">
                        </div>
                        <div class="form-group">
                            <label for="showBg">App Background</label><br>
                            <img src="<?= base_url('assets/images/background/') . $data['data']['application']['value']->background ?>"
                                style="width: 200px;" id="showBg" align="left"><br>
                            <input class="form-control" name="background" type="file" id="loadBg">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-sm btn-block btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>