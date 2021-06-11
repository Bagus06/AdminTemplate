<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="card">
    <div class="card-header">
        Menu Order
        <a title="Back to <?= @capital_letters($this->uri->rsegments[1]) ?> Main" class="btn btn-link"
            href="<?= base_url() . $this->uri->rsegments[1] . '/main' ?>"><i
                class="fas fa-lg fa-long-arrow-alt-left"></i></a>
        <a title="New <?= @capital_letters($this->uri->rsegments[1]) ?>" class="btn btn-link disabled" class="disabled"
            href="<?= base_url() . $this->uri->rsegments[1] . '/edit' ?>"><i class="fas fa-lg fa-plus-circle"></i></a>
        <button title="Save Form"
            onclick="document.input.action = ''; document.input.method='post'; document.input.submit(); return false;"
            class="btn btn-link"><i class="fas fa-lg fa-save"></i></button>
    </div>
</div>
<div class="col-md-12">
    <div class="cf nestable-lists">
        <div class="dd" id="nestable">
            <ol class="dd-list">
                <?php if (!empty($data['all'])): ?>
                <?php foreach($data['all'] as $key => $value): ?>
                <?php if ($value['to_link'] == 0): ?>
                <li class="dd-item" data-id="<?= $value['id'] ?>">
                    <div class="dd-handle"><?= $value['title'] ?></div>
                </li>
                <?php endif; ?>
                <?php endforeach; ?>
                <?php endif; ?>
            </ol>
        </div>
    </div>

    <p><strong>Serialised Output (per list)</strong></p>

    <form action="" id="input" name="input">
        <textarea id="nestable-output" class="form-control" name="order" readonly></textarea>
    </form>
</div>