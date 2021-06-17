<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="col-md-12" style="padding-bottom: 150px;">
    <div class="card mb-3">
        <div class="card-header">
            Table <?= @capital_letters($this->uri->rsegments[1]) ?>
            <a title="Back to <?= @capital_letters($this->uri->rsegments[1]) ?> Main" class="btn btn-link disabled"
                href="<?= $this->uri->rsegments[1] . '/main' ?>"><i class="fas fa-lg fa-long-arrow-alt-left"></i></a>
            <a title="New <?= @capital_letters($this->uri->rsegments[1]) ?>" class="btn btn-link disabled"
                href="<?= $this->uri->rsegments[1] . '/edit' ?>"><i class="fas fa-lg fa-plus-circle"></i></a>
            <button title="Save Form"
                onclick="document.input.action = ''; document.input.method='post'; document.input.submit(); return false;"
                class="btn btn-link"><i class="fas fa-lg fa-save"></i></button>
            <a title="Recyclebin <?= @capital_letters($this->uri->rsegments[1]) ?>"
                class="btn btn-link <?php if(checkPermission('permission/main_history', get_user()['id']) == FALSE){ echo 'disabled'; } ?>"
                href="<?= base_url() . $this->uri->rsegments[1] . '/main_history' ?>"><i
                    class="fas fa-lg fa-recycle"></i></a>
        </div>
    </div>
    <div class="card">
        <form action="" id="input" name="input">
            <div class="card-body" style="padding-top: 20px;">
                <div class="form-group col-md-3">
                    <label for="title">Group Name</label><label class="text-danger">*</label>
                    <input title="Group Name" name="title" type="text" style="text-transform:uppercase" id="title"
                        class="form-control form-control-border" placeholder="Group Name">
                </div>
            </div>
        </form>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="table-permission" class="table table-sm table-striped table-hover" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Group</th>
                            <th>List</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Group</th>
                            <th>List</th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>