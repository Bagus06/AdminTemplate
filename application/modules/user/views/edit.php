<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            Table <?= @capital_letters($this->uri->rsegments[1]) ?>
            <a title="Back to <?= @capital_letters($this->uri->rsegments[1]) ?> Main" class="btn btn-link"
                href="<?= base_url() . $this->uri->rsegments[1] . '/main' ?>"><i
                    class="fas fa-lg fa-long-arrow-alt-left"></i></a>
            <a title="New <?= @capital_letters($this->uri->rsegments[1]) ?>" class="btn btn-link disabled"
                href="<?= base_url() . $this->uri->rsegments[1] . '/edit' ?>"><i
                    class="fas fa-lg fa-plus-circle"></i></a>
            <button title="Save Form"
                onclick="document.input.action = ''; document.input.method='post'; document.input.submit(); return false;"
                class="btn btn-link"><i class="fas fa-lg fa-save"></i></button>
        </div>
    </div>
    <div class="panel panel-default card card-default">
        <div class="panel-body card-body">
            <form action="" id="input" name="input" enctype="multipart/form-data">
                <div class="col-md-12 row">
                    <div class="col-md-3">
                        <h3>User</h3>
                        <div class="form-group">
                            <label for="username">Username</label><label class="text-danger">*</label>
                            <input type="text"
                                class="form-control form-control-border <?php if (form_error('username')){ echo 'is-invalid'; } ?>"
                                name="username" placeholder="username"
                                value="<?php if(!empty(set_value('username')) && !empty($data['data']['username'])){ echo set_value('username'); }elseif(!empty($data['data']['username'])){ echo $data['data']['username']; }elseif($this->form_validation->run() == false){ echo set_value('username'); } ?>">
                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label><label class="text-danger">*</label>
                            <input type="password" class="form-control form-control-border" name="password"
                                placeholder="password">
                        </div>
                        <div class="form-group">
                            <label>Group permission</label>
                            <select class="form-control form-control-border select2" name="permission_id"
                                style="width: 100%;" required>
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
                            <label for="email">Email</label><label class="text-danger">*</label>
                            <input type="text"
                                class="form-control form-control-border <?php if (form_error('email')){ echo 'is-invalid'; } ?>"
                                name="email" placeholder="email"
                                value="<?php if(!empty(set_value('email')) && !empty($data['data']['email'])){ echo set_value('email'); }elseif(!empty($data['data']['email'])){ echo $data['data']['email']; }elseif($this->form_validation->run() == false){ echo set_value('email'); } ?>">
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="hp">Hp</label><label class="text-danger">*</label>
                            <input type="text"
                                class="form-control form-control-border <?php if (form_error('hp')){ echo 'is-invalid'; } ?>"
                                name="hp" placeholder="08xx xxxx xxx"
                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                value="<?php if(!empty(set_value('hp')) && !empty($data['data']['hp'])){ echo set_value('hp'); }elseif(!empty($data['data']['hp'])){ echo $data['data']['hp']; }elseif($this->form_validation->run() == false){ echo set_value('hp'); } ?>">
                            <?= form_error('hp', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h3>Profile</h3>
                        <div class="form-group">
                            <label for="name">Name</label><label class="text-danger">*</label>
                            <input type="text"
                                class="form-control form-control-border <?php if (form_error('name')){ echo 'is-invalid'; } ?>"
                                name="name" placeholder="name"
                                value="<?php if(!empty(set_value('name')) && !empty($data['data']['name'])){ echo set_value('name'); }elseif(!empty($data['data']['name'])){ echo $data['data']['name']; }elseif($this->form_validation->run() == false){ echo set_value('name'); } ?>">
                            <?= form_error('name', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <input type="file" class="form-control form-control-border" placeholder="photo"
                                name="photo">
                        </div>
                        <div class="form-group">
                            <?php if(!empty($data['gender'])): ?>
                            <?php foreach($data['gender'] as $ket => $value): ?>
                            <?php
                            $checked = '';
                            if(@$data['data']['gender'] == $value['id']){
                                $checked = 'checked';
                            }
                        ?>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="<?= $value['id'] ?>" name="gender"
                                    <?= $checked; ?>>
                                <label class="form-check-label"><?= $value['title'] ?></label>
                            </div>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <input type="hidden" id="getProvince"
                            value="<?php $province = @json_decode($data['data']['place_of_birth']); echo @$province->province; ?>">
                        <input type="hidden" id="getRegency"
                            value="<?php $regency = @json_decode($data['data']['place_of_birth']); echo @$regency->regency; ?>">
                        <input type="hidden" id="getDistricts"
                            value="<?php $districts = @json_decode($data['data']['place_of_birth']); echo @$districts->districts; ?>">
                        <input type="hidden" id="getVillage"
                            value="<?php $village = @json_decode($data['data']['place_of_birth']); echo @$village->village; ?>">
                        <div class="form-group">
                            <label class="control-label">Province</label>
                            <select class="form-control" name="province" id="province">
                                <option></option>
                                <?php if(!empty($data['province'])): ?>
                                <?php foreach($data['province'] as $key => $value): ?>
                                <?php
                                    $selected = '';
                                    $province = @json_decode($data['data']['place_of_birth']);
                                    if ($value['id'] == @$province->province) {
                                        $selected = 'selected';
                                    }    
                                ?>
                                <option value="<?= $value['id'] ?>" <?= $selected ?>><?= $value['name'] ?></option>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <img src="asset/img/loading.gif" width="35" id="load1" style="display:none;" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Regency</label>
                            <select class="form-control" name="regency" id="regency">
                                <option></option>
                            </select>
                            <img src="asset/img/loading.gif" width="35" id="load2" style="display:none;" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Districts</label>
                            <select class="form-control" name="districts" id="districts">
                                <option></option>
                            </select>
                            <img src="asset/img/loading.gif" width="35" id="load3" style="display:none;" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Village</label>
                            <select class="form-control" name="village" id="village">
                                <option></option>
                            </select>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>