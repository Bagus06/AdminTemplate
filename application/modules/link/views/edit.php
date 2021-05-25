<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div class="col-md-5">
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
                    <label for="title">Title</label>
                    <input type="text" class="form-control <?php if (form_error('title')){ echo 'is-invalid'; } ?>"
                        name="title" placeholder="title"
                        value="<?php if(!empty(set_value('title')) && !empty($data['data']['title'])){ echo set_value('title'); }elseif(!empty($data['data']['title'])){ echo $data['data']['title']; }elseif($this->form_validation->run() == false){ echo set_value('title'); } ?>">
                    <?= form_error('title', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="link">Link</label>
                    <textarea type="text" class="form-control <?php if (form_error('link')){ echo 'is-invalid'; } ?>"
                        name="link" placeholder="class/function"
                        value="<?php if(!empty(set_value('link')) && !empty($data['data']['link'])){ echo set_value('link'); }elseif(!empty($data['data']['link'])){ echo $data['data']['link']; }elseif($this->form_validation->run() == false){ echo set_value('link'); } ?>"><?php if(!empty(set_value('link')) && !empty($data['data']['link'])){ echo set_value('link'); }elseif(!empty($data['data']['link'])){ echo $data['data']['link']; }elseif($this->form_validation->run() == false){ echo set_value('link'); } ?></textarea>
                    <?= form_error('link', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="icon">Icon</label>
                    <input type="text" class="form-control <?php if (form_error('icon')){ echo 'is-invalid'; } ?>"
                        name="icon" placeholder="icon"
                        value="<?php if(!empty(set_value('icon')) && !empty($data['data']['icon'])){ echo set_value('icon'); }elseif(!empty($data['data']['icon'])){ echo $data['data']['icon']; }elseif($this->form_validation->run() == false){ echo set_value('icon'); } ?>">
                    <?= form_error('icon', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label>Type link</label>
                    <select class="form-control" type="select" class="form-control" name="to_link">
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
                    <label>Link mode</label>
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