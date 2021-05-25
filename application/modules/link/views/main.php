<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="col-md-12" style="padding-bottom: 150px;">
    <div class="card mb-3">
        <div class="card-header">
            <a class="btn btn-sm btn-outline-primary" href="<?= $this->uri->rsegments[1] ?>/edit"><i
                    class="fas fa-plus"></i> Add
                <?= capital_letters($this->uri->rsegments[1]) ?></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="table-link" class="table table-bordered" style="width: 100%;">
                    <thead>
                        <tr id="th" data-thd="1">
                            <th>No.</th>
                            <th>Menu</th>
                            <th>Link</th>
                            <th>To</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Menu</th>
                            <th>Link</th>
                            <th>To</th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Support by : </div>
    </div>
</div>