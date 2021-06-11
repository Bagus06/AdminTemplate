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
<li class="nav-item dropdown">
    <a title="Go To" id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
        class="nav-link"><i class="fas fa-bars"></i></a>
    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
        <?php foreach ($menu as $key => $value): ?>
        <?php if(!empty($get_permission['group'])): ?>
        <?php if($value['to_link'] == 0): ?>
        <?php if((!in_array($value['id'], @$array_menu)) && (in_array($value['id'], json_decode($get_permission['group'])))): ?>
        <li><a href="<?= base_url() . $value['link'] ?>" class="dropdown-item"><i
                    class="nav-icon <?= $value['icon'] ?>"></i><?= ' ' . $value['title'] ?></a></li>
        <?php elseif((in_array($value['id'], $array_menu)) && (in_array($value['id'], json_decode($get_permission['group'])))): ?>
        <li class="dropdown-submenu dropdown-hover">
            <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false" class="dropdown-item dropdown-toggle"><i
                    class="nav-icon <?= $value['icon'] ?>"></i><?= ' ' . $value['title'] ?></a>
            <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                <?php foreach($menu as $key_submenu => $submenu): ?>
                <?php if(($submenu['to_link'] == $value['id']) && (in_array($submenu['id'], json_decode($get_permission['group'])))): ?>
                <?php $link_onview[] = $submenu['id'] ?>
                <li><a href="<?= base_url() . $submenu['link'] ?>" class="dropdown-item"><i
                            class="<?php if(!empty($submenu['icon'])){ echo $submenu['icon'] . ' nav-icon'; }else{ echo 'far fa-circle nav-icon'; } ?>"></i><?= ' ' . $submenu['title'] ?></a>
                </li>
                <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </li>
        <?php endif; ?>
        <?php endif; ?>
        <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</li>