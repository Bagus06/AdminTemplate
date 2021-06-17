<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="card">
    <div class="card-header">
        Table <?= @capital_letters($this->uri->rsegments[1]) ?>
        <a title="Back to <?= @capital_letters($this->uri->rsegments[1]) ?> Main" class="btn btn-link"
            href="<?= base_url() . $this->uri->rsegments[1] . '/main' ?>"><i
                class="fas fa-lg fa-long-arrow-alt-left"></i></a>
        <a title="New <?= @capital_letters($this->uri->rsegments[1]) ?>" class="btn btn-link disabled" class="disabled"
            href="<?= base_url() . $this->uri->rsegments[1] . '/edit' ?>"><i class="fas fa-lg fa-plus-circle"></i></a>
        <button title="Save Form"
            onclick="document.input.action = ''; document.input.method='post'; document.input.submit(); return false;"
            class="btn btn-link"><i class="fas fa-lg fa-save"></i></button>
        <a title="Recyclebin <?= @capital_letters($this->uri->rsegments[1]) ?>" class="btn btn-link disabled"
            href="<?= base_url() . $this->uri->rsegments[1] . '/main_history' ?>"><i
                class="fas fa-lg fa-recycle"></i></a>
    </div>
</div>
<div class="card">
    <form action="" id="input" name="input" enctype="multipart/form-data">
        <div class="card-body">
            <div class="col-md-12">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="title">Title</label><label class="text-danger">*</label>
                        <input type="text"
                            class="form-control form-control-border <?php if (form_error('title')){ echo 'is-invalid'; } ?>"
                            name="title"
                            value="<?php if(!empty(set_value('title')) && !empty($data['data']['title'])){ echo set_value('title'); }elseif(!empty($data['data']['title'])){ echo $data['data']['title']; }elseif($this->form_validation->run() == false){ echo set_value('title'); } ?>">
                        <?= form_error('title', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="link">Link</label>
                        <textarea type="text"
                            class="form-control form-control-border <?php if (form_error('link')){ echo 'is-invalid'; } ?>"
                            name="link"
                            value="<?php if(!empty(set_value('link')) && !empty($data['data']['link'])){ echo set_value('link'); }elseif(!empty($data['data']['link'])){ echo $data['data']['link']; }elseif($this->form_validation->run() == false){ echo set_value('link'); } ?>"><?php if(!empty(set_value('link')) && !empty($data['data']['link'])){ echo set_value('link'); }elseif(!empty($data['data']['link'])){ echo $data['data']['link']; }elseif($this->form_validation->run() == false){ echo set_value('link'); } ?></textarea>
                        <?= form_error('link', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="icon">Icon</label>
                        <input type="text"
                            class="form-control form-control-border <?php if (form_error('icon')){ echo 'is-invalid'; } ?>"
                            name="icon"
                            value="<?php if(!empty(set_value('icon')) && !empty($data['data']['icon'])){ echo set_value('icon'); }elseif(!empty($data['data']['icon'])){ echo $data['data']['icon']; }elseif($this->form_validation->run() == false){ echo set_value('icon'); } ?>">
                        <?= form_error('icon', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label>Type link</label><label class="text-danger">*</label>
                        <select class="form-control form-control-border" type="select"
                            class="form-control form-control-border" name="to_link">
                            <option value="0">master</option>
                            <?php foreach($data['all'] as $key => $value): ?>
                            <?php 
                            $selected = '';
                            if ($value['id'] == @$data['data']['to_link']) {
                                $selected = 'selected';
                            }    
                        ?>
                            <?php if($value['to_link'] == 0): ?>
                            <option value="<?= $value['id'] ?>" <?= @$selected; ?>><?= $value['title'] ?></option>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Link mode</label><label class="text-danger">*</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="mode" value="1"
                                <?php if(@$data['data']['mode'] == 1){ echo 'checked'; } ?>>
                            <label class="form-check-label">View</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="mode" value="2"
                                <?php if(@$data['data']['mode'] == 2){ echo 'checked'; } ?>>
                            <label class="form-check-label">Hidden</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>