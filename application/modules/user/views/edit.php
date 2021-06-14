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
                                value="<?php if((empty($data['status'])) && ($this->form_validation->run() === FALSE)){if((!empty(set_value('username'))) && (set_value('username') != @$data['data']['username'])){ echo set_value('username'); }else{ echo @$data['data']['username']; }}else{ echo @$data['data']['username']; } ?>">
                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label><label class="text-danger">*</label>
                            <input type="password"
                                class="form-control form-control-border <?php if (form_error('password')){ echo 'is-invalid'; } ?>"
                                name="password" placeholder="password">
                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
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
                                    $permission = '';
                                    if((empty($data['status'])) && ($this->form_validation->run() === FALSE)){
                                        if((!empty(set_value('permission_id'))) && (set_value('permission_id') != @$data['data']['permission_id'])){
                                            $permission = set_value('permission_id');
                                        }else{
                                            $permission = @$data['data']['permission_id'];
                                        }
                                    }else{
                                        $permission = @$data['data']['permission_id'];
                                    }

                                    if(@$permission == $value['id']){
                                        $selected = 'selected';
                                    }
                                ?>
                                <option value="<?= $value['id'] ?>" <?= $selected ?>><?= $value['title'] ?></option>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <?= form_error('permission_id', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label><label class="text-danger">*</label>
                            <input type="text"
                                class="form-control form-control-border <?php if (form_error('email')){ echo 'is-invalid'; } ?>"
                                name="email" placeholder="email"
                                value="<?php if((empty($data['status'])) && ($this->form_validation->run() === FALSE)){if((!empty(set_value('email'))) && (set_value('email') != @$data['data']['email'])){ echo set_value('email'); }else{ echo @$data['data']['email']; }}else{ echo @$data['data']['email']; } ?>">
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="hp">Hp</label><label class="text-danger">*</label>
                            <input type="text"
                                class="form-control form-control-border <?php if (form_error('hp')){ echo 'is-invalid'; } ?>"
                                name="hp" placeholder="08xx xxxx xxx" maxlength="12"
                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                value="<?php if((empty($data['status'])) && ($this->form_validation->run() === FALSE)){if((!empty(set_value('hp'))) && (set_value('hp') != @$data['data']['hp'])){ echo set_value('hp'); }else{ echo @$data['data']['hp']; }}else{ echo @$data['data']['hp']; } ?>">
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
                                value="<?php if((empty($data['status'])) && ($this->form_validation->run() === FALSE)){if((!empty(set_value('name'))) && (set_value('name') != @$data['data']['name'])){ echo set_value('name'); }else{ echo @$data['data']['name']; }}else{ echo @$data['data']['name']; } ?>">
                            <?= form_error('name', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="nik">Nik</label><label class="text-danger">*</label>
                            <input type="text"
                                class="form-control form-control-border <?php if (form_error('nik')){ echo 'is-invalid'; } ?>"
                                name="nik" placeholder="xxxx xxxx xxxx xxxx" maxlength="16"
                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                value="<?php if((empty($data['status'])) && ($this->form_validation->run() === FALSE)){if((!empty(set_value('nik'))) && (set_value('nik') != @$data['data']['nik'])){ echo set_value('nik'); }else{ echo @$data['data']['nik']; }}else{ echo @$data['data']['nik']; } ?>">
                            <?= form_error('nik', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="date_of_birth">Date of birth</label><label class="text-danger">*</label>
                            <input type="date"
                                class="form-control form-control-border <?php if (form_error('date_of_birth')){ echo 'is-invalid'; } ?>"
                                name="date_of_birth" placeholder="date_of_birth"
                                value="<?php if((empty($data['status'])) && ($this->form_validation->run() === FALSE)){if((!empty(set_value('date_of_birth'))) && (set_value('date_of_birth') != @$data['data']['date_of_birth'])){ echo set_value('date_of_birth'); }else{ echo @$data['data']['date_of_birth']; }}else{ echo @$data['data']['date_of_birth']; } ?>">
                            <?= form_error('date_of_birth', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <input type="file" class="custom-select form-control-border" placeholder="photo"
                                name="photo">
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <?php if(!empty($data['gender'])): ?>
                            <?php foreach($data['gender'] as $ket => $value): ?>
                            <?php
                            $checked = '';
                            $gender = '';
                            if((empty($data['status'])) && ($this->form_validation->run() === FALSE)){
                                if((!empty(set_value('gender'))) && (set_value('gender') != @$data['data']['gender'])){
                                    $gender = set_value('gender');
                                }else{
                                    $gender = @$data['data']['gender'];
                                }
                            }else{
                                $gender = @$data['data']['gender'];
                            }

                            if(@$gender == $value['id']){
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
                        <div class="form-group">
                            <input type="hidden" id="getProvincePob"
                                value="<?php $province = @json_decode($data['data']['place_of_birth']); echo @$province->province; ?>">
                            <input type="hidden" id="getRegencyPob"
                                value="<?php $regency = @json_decode($data['data']['place_of_birth']); echo @$regency->regency; ?>">
                            <input type="hidden" id="getDistrictsPob"
                                value="<?php $districts = @json_decode($data['data']['place_of_birth']); echo @$districts->districts; ?>">
                            <input type="hidden" id="getVillagePob"
                                value="<?php $village = @json_decode($data['data']['place_of_birth']); echo @$village->village; ?>">
                            <label class="control-label">Place of birth</label><label class="text-danger">*</label>
                            <div class="form-group">
                                <!-- <label class="control-label">Province</label> -->
                                <select class="form-control" name="provincePob" id="provincePob">
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
                                <img src="<?= base_url() ?>assets/images/logo/loading.gif" width="35" id="load1Pob"
                                    style="display:none;" />
                            </div>
                            <div class="form-group">
                                <!-- <label class="control-label">Regency</label> -->
                                <select class="form-control" name="regencyPob" id="regencyPob" required>
                                    <option></option>
                                </select>
                                <img src="<?= base_url() ?>assets/images/logo/loading.gif" width="35" id="load2Pob"
                                    style="display:none;" />
                            </div>
                            <div class="form-group">
                                <!-- <label class="control-label">Districts</label> -->
                                <select class="form-control" name="districtsPob" id="districtsPob" required>
                                    <option></option>
                                </select>
                                <img src="<?= base_url() ?>assets/images/logo/loading.gif" width="35" id="load3Pob"
                                    style="display:none;" />
                            </div>
                            <div class="form-group">
                                <!-- <label class="control-label">Village</label> -->
                                <select class="form-control" name="villagePob" id="villagePob" required>
                                    <option></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" id="getProvinceResidence"
                                value="<?php $province = @json_decode($data['data']['residence']); echo @$province->province; ?>">
                            <input type="hidden" id="getRegencyResidence"
                                value="<?php $regency = @json_decode($data['data']['residence']); echo @$regency->regency; ?>">
                            <input type="hidden" id="getDistrictsResidence"
                                value="<?php $districts = @json_decode($data['data']['residence']); echo @$districts->districts; ?>">
                            <input type="hidden" id="getVillageResidence"
                                value="<?php $village = @json_decode($data['data']['residence']); echo @$village->village; ?>">
                            <label class="control-label">Residence</label><label class="text-danger">*</label>
                            <div class="form-group">
                                <!-- <label class="control-label">Province</label> -->
                                <select class="form-control" name="provinceResidence" id="provinceResidence" required>
                                    <option></option>
                                    <?php if(!empty($data['province'])): ?>
                                    <?php foreach($data['province'] as $key => $value): ?>
                                    <?php
                                    $selected = '';
                                    $province = @json_decode($data['data']['residence']);
                                    if ($value['id'] == @$province->province) {
                                        $selected = 'selected';
                                    }    
                                ?>
                                    <option value="<?= $value['id'] ?>" <?= $selected ?>><?= $value['name'] ?></option>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                                <img src="<?= base_url() ?>assets/images/logo/loading.gif" width="35"
                                    id="load1Residence" style="display:none;" />
                            </div>
                            <div class="form-group">
                                <!-- <label class="control-label">Regency</label> -->
                                <select class="form-control" name="regencyResidence" id="regencyResidence" required>
                                    <option></option>
                                </select>
                                <img src="<?= base_url() ?>assets/images/logo/loading.gif" width="35"
                                    id="load2Residence" style="display:none;" />
                            </div>
                            <div class="form-group">
                                <!-- <label class="control-label">Districts</label> -->
                                <select class="form-control" name="districtsResidence" id="districtsResidence" required>
                                    <option></option>
                                </select>
                                <img src="<?= base_url() ?>assets/images/logo/loading.gif" width="35"
                                    id="load3Residence" style="display:none;" />
                            </div>
                            <div class="form-group">
                                <!-- <label class="control-label">Village</label> -->
                                <select class="form-control" name="villageResidence" id="villageResidence" required>
                                    <option></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea
                                    class="form-control form-control-border <?php if (form_error('address')){ echo 'is-invalid'; } ?>"
                                    rows="3" placeholder="Jl.Example No.99 RT000 RW000" name="address"
                                    value="<?php if((empty($data['status'])) && ($this->form_validation->run() === FALSE)){ if((!empty(set_value('address'))) && (set_value('address') != @$data['data']['address'])){ echo set_value('address'); }else{ echo @$data['data']['address']; }}else{ echo @$data['data']['address']; } ?>"><?php if((empty($data['status'])) && ($this->form_validation->run() === FALSE)){if((!empty(set_value('address'))) && (set_value('address') != @$data['data']['address'])){ echo set_value('address'); }else{ echo @$data['data']['address']; }}else{ echo @$data['data']['address']; } ?></textarea>
                                <?= form_error('address', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>