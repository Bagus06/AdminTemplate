<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="col-md-12" style="padding-bottom: 150px;">
    <div class="card">
        <div class="card-header">
            Table <?= @capital_letters($this->uri->rsegments[1]) ?>
            <a title="Back to <?= @capital_letters($this->uri->rsegments[1]) ?> Main" class="btn btn-link disabled"
                href="<?= base_url() . $this->uri->rsegments[1] . '/main' ?>"><i
                    class="fas fa-lg fa-long-arrow-alt-left"></i></a>
            <a title="New <?= @capital_letters($this->uri->rsegments[1]) ?>" class="btn btn-link"
                href="<?= base_url() . $this->uri->rsegments[1] . '/edit' ?>"><i
                    class="fas fa-lg fa-plus-circle"></i></a>
            <button title="Save Form"
                onclick="document.input.action = ''; document.input.method='post'; document.input.submit(); return false;"
                class="btn btn-link disabled"><i class="fas fa-lg fa-save"></i></button>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-body">
            <div class="tabel-responsive">
                <table id="table-user" class="table table-sm table-striped table-hover" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
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