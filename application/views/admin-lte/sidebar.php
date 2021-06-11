<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php
    $this->db->order_by('nestable', 'ASC');
    $this->db->where('mode', 1);
    $menu = $this->db->get('link')->result_array();
    $this->db->select('permission.group');
	$this->db->from('user');
	$this->db->join('permission', 'permission.id=user.permission_id');
	$this->db->where('user.id', get_user()['id']);
	$get_permission = $this->db->get()->row_array();
    $array_menu = [];
    foreach ($menu as $key => $value) {
        if ($value['to_link'] != 0) {
            $array_menu[] = $value['to_link'];
        }
    }
?>
<?php $link_onview = []; ?>
<?php foreach ($menu as $key => $value): ?>
<?php if(!empty($get_permission['group'])): ?>
<?php if($value['to_link'] == 0): ?>
<?php if((!in_array($value['id'], @$array_menu)) && (in_array($value['id'], json_decode($get_permission['group'])))): ?>
<li class="nav-item">
    <a href="<?= base_url() . $value['link'] ?>" class="nav-link">
        <i class="nav-icon <?= $value['icon'] ?>"></i>
        <p>
            <?= $value['title'] ?>
        </p>
    </a>
</li>
<?php elseif((in_array($value['id'], $array_menu)) && (in_array($value['id'], json_decode($get_permission['group'])))): ?>
<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon <?= $value['icon'] ?>"></i>
        <p>
            <?= $value['title'] ?>
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <?php foreach($menu as $key_submenu => $submenu): ?>
        <?php if(($submenu['to_link'] == $value['id']) && (in_array($submenu['id'], json_decode($get_permission['group'])))): ?>
        <?php $link_onview[] = $submenu['id'] ?>
        <li class="nav-item">
            <a href="<?= base_url() . $submenu['link'] ?>" class="nav-link">
                <i
                    class="<?php if(!empty($submenu['icon'])){ echo $submenu['icon'] . ' nav-icon'; }else{ echo 'far fa-circle nav-icon'; } ?>"></i>
                <p><?= $submenu['title'] ?></p>
            </a>
        </li>
        <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</li>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
<?php endforeach; ?>