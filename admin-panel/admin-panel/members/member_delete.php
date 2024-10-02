<?php

require_once('../../../app/connection/DB.php');

require_once('../../../app/controller/function.php');
require_once('../../../app/controller/access.php');

if (isset($_POST['btn_delete'])) {
    $id = checkDataSecurity($_GET['id']);
    $checkProvinceExist = $db->where('id', $id)
        ->getValue('members', 'COUNT(id)');
    if ($checkProvinceExist == 1) {
        $path = $db->where('id', $id)
            ->getOne('members', 'image');
        if (file_exists('../../../attachment' . $path['image']))
            unlink('../../../attachment' . $path['image']);
        $db->where('member_id', $id)
            ->update('comments', [
                'member_id' => null
            ]);
        $db->where('member_id', $id)
            ->update('counter', [
                'member_id' => null
            ]);
        $db->where('member_id', $id)
            ->update('view', [
                'member_id' => null
            ]);

        $db->where('id', $id)
            ->delete('members');
        $query = $db->getLastQuery();
        $db->insert('logs', [
            'admin_id' => $_SESSION['user'],
            'table_name' => 'members',
            'changes' => $query,
            'type' => 1,
            'date' => $date
        ]);
        header('Location:members_list.php?ok=1');
    }
}

?>