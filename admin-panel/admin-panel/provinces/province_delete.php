<?php

require_once('../../../app/connection/DB.php');

require_once('../../../app/controller/function.php');
require_once('../../../app/controller/access.php');

if (isset($_POST['btn_delete'])) {
    $id = checkDataSecurity($_GET['id']);
    $checkProvinceExist = $db->where('id', $id)
        ->getValue('provinces', 'COUNT(id)');
    if ($checkProvinceExist == 1) {
        $db->where('id', $id)
            ->delete('provinces');
        $query = $db->getLastQuery();
        $db->insert('logs', [
            'admin_id' => $_SESSION['user'],
            'table_name' => 'provinces',
            'changes' => $query,
            'type' => 1,
            'date' => $date
        ]);
        header('Location:provinces_list.php?ok=1');
    }
}

?>