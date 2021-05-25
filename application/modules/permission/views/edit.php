<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="card-body">
    <div class="row">
        <div class="col-12">
            <form action="" method="post">
            <div class="form-group">
                <label for="title">Group name</label>
                <input style="text-transform:uppercase" type="text" class="form-control <?php if (form_error('title')){ echo 'is-invalid'; } ?>"
                    name="title" placeholder="title"
                    value="<?php if(!empty(set_value('title')) && !empty($data['data']['title'])){ echo set_value('title'); }elseif(!empty($data['data']['title'])){ echo $data['data']['title']; }elseif($this->form_validation->run() == false){ echo set_value('title'); } ?>">
                <?= form_error('title', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
            <div class="form-group">
                <label>Group</label>
                <select class="duallistbox" name="group[]" multiple="multiple" required>
                    <?php if(!empty($data['link'])): ?>
                        <?php foreach($data['link'] as  $key => $value): ?>
                            <?php
                                $selectd = '';
                                if (in_array($value['id'], $data['data']['group'])) {
                                    $selectd = 'selected';
                                }    
                            ?>
                            <option value="<?= $value['id'] ?>" <?= $selectd; ?>><?= $value['title'] ?><?php if($value['to_link'] == 0){ echo ' (master)'; } ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-sm btn-success">Save</button>
            </form>
        </div>
    </div>
</div>