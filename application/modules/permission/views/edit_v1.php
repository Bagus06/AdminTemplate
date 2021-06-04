<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="card-body">
    <div class="row">
        <div class="col-12">
            <form action="" method="post">
                <div class="form-group">
                    <label for="title">Group name</label>
                    <input style="text-transform:uppercase" type="text"
                        class="form-control <?php if (form_error('title')){ echo 'is-invalid'; } ?>" name="title"
                        placeholder="title"
                        value="<?php if(!empty(set_value('title')) && !empty($data['data']['title'])){ echo set_value('title'); }elseif(!empty($data['data']['title'])){ echo $data['data']['title']; }elseif($this->form_validation->run() == false){ echo set_value('title'); } ?>">
                    <?= form_error('title', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label>Group</label>
                    <table class="table table-hover">
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
                        ?>
                            <tr data-widget="<?= @$widget; ?>" aria-expanded="false">
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input master" type="checkbox" name="group[]"
                                            value="<?= $value['id'] ?>" data-id="<?= $value['id'] ?>"
                                            id="master_<?= $value['id'] ?>" data-child='<?= $json; ?>'>
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
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input child" type="checkbox"
                                                                name="group[]" value="<?= $sub['id'] ?>"
                                                                data-master="<?= $sub['to_link'] ?>"
                                                                id="child_<?= $sub['id'] ?>">
                                                            <label class="form-check-label"><?= $sub['title'] ?></label>
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
                <button type="submit" class="btn btn-sm btn-success">Save</button>
            </form>
        </div>
    </div>
</div>