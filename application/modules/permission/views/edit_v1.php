<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

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
    <form action="" name="input" id="input">
        <div class="card-body">
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="title">Group Name</label><label class="text-danger">*</label>
                        <input title="Group Name" style="text-transform:uppercase" type="text"
                            class="form-control form-control-border <?php if (form_error('title')){ echo 'is-invalid'; } ?>"
                            name="title" placeholder="Group Name"
                            value="<?php if(!empty(set_value('title')) && !empty($data['data']['title'])){ echo set_value('title'); }elseif(!empty($data['data']['title'])){ echo $data['data']['title']; }elseif($this->form_validation->run() == false){ echo set_value('title'); } ?>">
                        <?= form_error('title', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-8">
                        <label>Group</label>
                        <table class="table table-hover">
                            <thead>
                                <th>
                                    <div align="right">
                                        <form action="" name="search" id="search">
                                            <div class="input-group col-md-3">
                                                <input type="text" name="search"
                                                    value="<?php if(!empty($this->input->get('search'))){ echo $this->input->get('search'); } ?>"
                                                    class="form-control form-control-border" placeholder="Search">
                                                <span class="input-group-append">
                                                    <button title="search"
                                                        onclick="document.search.action = ''; document.search.method='get'; document.search.submit(); return false;"
                                                        class="btn btn-link" style="padding: 0px"><i
                                                            class="fas fa-search"></i></button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                </th>
                            </thead>
                            <tbody>
                                <?php if(!empty($data['link'])): ?>
                                <?php foreach($data['link'] as  $key => $value): ?>
                                <?php if($value['to_link'] == 0): ?>
                                <?php
                            $widget = '';
                            $icon = '';
                            if(in_array($value['id'], @$data['array_child'])){
                                $widget = 'expandable-table';
                                $icon = 'expandable-table-caret fas fa-caret-right fa-fw';
                            }
                            
                            $data_chield = [];
                            foreach($data['link'] as $key => $array_chield){
                                if($array_chield['to_link'] == $value['id']){
                                    $data_chield[] = $array_chield['id'];
                                }
                            }
                            $json = json_encode($data_chield);
                            $checked = '';
                            if (!empty($data['data']['group'])) {
                                if (in_array($value['id'], $data['data']['group'])) {
                                    $checked = 'checked';
                                } 
                            }
                            ?>
                                <tr data-widget="<?= @$widget; ?>" aria-expanded="false">
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input master" type="checkbox" name="group[]"
                                                value="<?= $value['id'] ?>" data-id="<?= $value['id'] ?>"
                                                id="master_<?= $value['id'] ?>" data-child='<?= $json; ?>'
                                                <?= @$checked; ?>>
                                            <label class="form-check-label"><i
                                                    class="<?= @$icon; ?>"></i><?= $value['title'] ?></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="expandable-body">
                                    <td>
                                        <div class="p-0">
                                            <table class="table table-hover">
                                                <tbody>
                                                    <?php foreach($data['link'] as  $key => $sub): ?>
                                                    <?php if($sub['to_link'] == $value['id']): ?>
                                                    <?php
                                                    $checked = '';
                                                    if (!empty($data['data']['group'])) {
                                                        if (in_array($sub['id'], $data['data']['group'])) {
                                                            $checked = 'checked';
                                                        } 
                                                    }   
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input child" type="checkbox"
                                                                    name="group[]" value="<?= $sub['id'] ?>"
                                                                    data-master="<?= $sub['to_link'] ?>"
                                                                    id="child_<?= $sub['id'] ?>" <?= $checked ?>>
                                                                <label
                                                                    class="form-check-label"><?= $sub['title'] ?></label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                                <?php endif; ?>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>