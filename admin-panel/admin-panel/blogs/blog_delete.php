<?php

require_once('../../../app/connection/DB.php');
require_once('../../../app/controller/access.php');
require_once('../../../app/controller/function.php');

if (isset($_POST['btn_delete'])) {
    $id = checkDataSecurity($_GET['id']);
    $checkProvinceExist = $db->where('id', $id)
        ->getValue('blogs', 'COUNT(id)');
    if ($checkProvinceExist == 1) {
        $path = $db->where('id', $id)
            ->getOne('blogs', 'image');
        if (file_exists('../../../attachment' . $path['image']))
            unlink('../../../attachment' . $path['image']);
        $db->where('id', $id)
            ->delete('blogs');
        $query = $db->getLastQuery();
        $db->insert('logs', [
            'admin_id' => $_SESSION['user'],
            'table_name' => 'blogs',
            'changes' => $query,
            'type' => 1,
            'date' => $date
        ]);
        header('Location:blogs_list.php?ok=1');
    }
}

?>