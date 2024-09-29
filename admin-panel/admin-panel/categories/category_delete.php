<?php 

require_once('../../../app/connection/DB.php');
require_once('../../../app/controller/access.php');
require_once('../../../app/controller/function.php');

if(isset($_POST['btn_delete'])){
    $id = checkDataSecurity($_GET['id']);
    $checkProvinceExist = $db->where('id', $id)
    ->getValue('categories', 'COUNT(id)');
    if($checkProvinceExist == 1){
        $db->where('id', $id)
        ->delete('categories');
        $query = $db->getLastQuery();
        $db->insert('logs', [
            'admin_id'=>$_SESSION['user'],
            'table_name'=>'categories',
            'changes'=>$query,
            'type'=>1,
            'date'=>$date
        ]);
        header('Location:categories_list.php?ok=1');
    }
}

?>