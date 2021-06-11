<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="col-md-12" style="padding-bottom: 150px;">
    <div class="card mb-3">
        <div class="card-header">
            Table <?= @capital_letters($this->uri->rsegments[1]) ?>
            <a title="Back to <?= @capital_letters($this->uri->rsegments[1]) ?> Main" class="btn btn-link disabled"
                href="<?= $this->uri->rsegments[1] . '/main' ?>"><i class="fas fa-lg fa-long-arrow-alt-left"></i></a>
            <a title="New <?= @capital_letters($this->uri->rsegments[1]) ?>" class="btn btn-link"
                href="<?= $this->uri->rsegments[1] . '/edit' ?>"><i class="fas fa-lg fa-plus-circle"></i></a>
            <button title="Save Form"
                onclick="document.input.action = ''; document.input.method='post'; document.input.submit(); return false;"
                class="btn btn-link disabled"><i class="fas fa-lg fa-save"></i></button>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="table-link" class="table table-sm table-striped table-hover" style="width: 100%;">
                    <thead>
                        <tr id="th" data-thd="1">
                            <th>Menu</th>
                            <th>Mode</th>
                            <th>Link</th>
                            <th>Menu To</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Menu</th>
                            <th>Mode</th>
                            <th>Link</th>
                            <th>Menu To</th>
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