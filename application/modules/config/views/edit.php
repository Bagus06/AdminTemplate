<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="col-12">
    <div class="card">
        <div class="card-header">
            Menu Order
            <a title="Back to <?= @capital_letters($this->uri->rsegments[1]) ?> Main" class="btn btn-link disabled"
                href="<?= base_url() . $this->uri->rsegments[1] . '/main' ?>"><i
                    class="fas fa-lg fa-long-arrow-alt-left"></i></a>
            <a title="New <?= @capital_letters($this->uri->rsegments[1]) ?>" class="btn btn-link disabled"
                class="disabled" href="<?= base_url() . $this->uri->rsegments[1] . '/edit' ?>"><i
                    class="fas fa-lg fa-plus-circle"></i></a>
            <button title="Save Form"
                onclick="document.input.action = ''; document.input.method='post'; document.input.submit(); return false;"
                class="btn btn-link"><i class="fas fa-lg fa-save"></i></button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form action="" id="input" name="input" enctype='multipart/form-data'>
                    <div class="card-body">
                        <div class="col-md-12 row">
                            <div class="col-md-3">
                                <h4>Application Config</h4>
                                <div class="form-group">
                                    <label for="title">App Name</label><label class="text-danger">*</label>
                                    <input type="text"
                                        class="form-control form-control-border <?php if (form_error('title')){ echo 'is-invalid'; } ?>"
                                        name="title" placeholder="title"
                                        value="<?php if(!empty(set_value('title')) && !empty($data['data']['application']['value']->title)){ echo set_value('title'); }elseif(!empty($data['data']['application']['value']->title)){ echo $data['data']['application']['value']->title; }elseif($this->form_validation->run() == false){ echo set_value('title'); } ?>">
                                    <?= form_error('title', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="desc">App Description</label>
                                    <input type="text"
                                        class="form-control form-control-border <?php if (form_error('desc')){ echo 'is-invalid'; } ?>"
                                        name="desc" placeholder="desc"
                                        value="<?php if(!empty(set_value('desc')) && !empty($data['data']['application']['value']->desc)){ echo set_value('desc'); }elseif(!empty($data['data']['application']['value']->desc)){ echo $data['data']['application']['value']->desc; }elseif($this->form_validation->run() == false){ echo set_value('desc'); } ?>">
                                    <?= form_error('desc', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="showLogo">App Logo</label><br>
                                    <a title="Detail VIew"
                                        href="<?= base_url('assets/images/logo/') . @$data['data']['application']['value']->logo ?>"
                                        target="_blank"><img
                                            src="<?= base_url('assets/images/logo/') . @$data['data']['application']['value']->logo ?>"
                                            style="width: 100px;" id="showLogo" align="left"></a><br>
                                    <input class="form-control form-control-border" name="logo" type="file"
                                        id="loadLogo">
                                </div>
                                <div class="form-group">
                                    <label for="showBg">App Background</label><br>
                                    <a title="Detail View"
                                        href="<?= base_url('assets/images/background/') . @$data['data']['application']['value']->background ?>"
                                        target="_blank"><img
                                            src="<?= base_url('assets/images/background/') . @$data['data']['application']['value']->background ?>"
                                            style="width: 100px;" id="showBg" align="left"></a><br>
                                    <input class="form-control form-control-border" name="background" type="file"
                                        id="loadBg">
                                </div>
                                <div class="form-group">
                                    <label for="showLoader">App Loader</label><br>
                                    <a title="Detail View"
                                        href="<?= base_url('assets/images/logo/') . @$data['data']['application']['value']->loading ?>"
                                        target="_blank"><img
                                            src="<?= base_url('assets/images/logo/') . @$data['data']['application']['value']->loading ?>"
                                            style="width: 100px;" id="showLoader" align="left"></a><br>
                                    <input class="form-control form-control-border" name="loading" type="file"
                                        id="loadLoader">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <h4>Application Status</h4>
                                <div class="form-group">
                                    <label for="app_status">Status</label>
                                    <select class="custom-select form-control-border" id="app_status" name="status">
                                        <option value="1"
                                            <?php if(@$data['data']['application']['value']->status == 1){ echo 'selected'; } ?>>
                                            Online</option>
                                        <option value="2"
                                            <?php if(@$data['data']['application']['value']->status == 2){ echo 'selected'; } ?>>
                                            Maintenance</option>
                                        <option value="3"
                                            <?php if(@$data['data']['application']['value']->status == 3){ echo 'selected'; } ?>>
                                            Shut Down</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>