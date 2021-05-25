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

    <form action="" method="post">
        <textarea id="nestable-output" class="form-control" name="order" readonly></textarea>
        <button type="submit" class="btn btn-sm btn-success" style="margin-top: 10px;">Save</button>
    </form>
</div>