<?php 

if(isset($_SESSION['member'])){
    $memberId = $db->where('username', $_SESSION['member'])
    ->getValue('members', 'id');
    $IP = $db->orderBy('setdate', 'DESC')
    ->getValue('view', 'ip');
    if(!is_null($IP) and $IP == $_SERVER["REMOTE_ADDR"]){
        $viewDate = $db->orderBy('setdate', 'DESC')
		->where('member_id', $memberId)
        ->getValue('view', 'setdate');
        if(!is_null($viewDate))
            $viewDate = strtotime($viewDate."+30min");
        if(is_null($viewDate) or ($viewDate <= strtotime($date))){
            $db->insert('view', [
                'ip'=>$_SERVER["REMOTE_ADDR"],
                'member_id'=>$memberId,
                'setdate'=>$date
            ]);
        }
    }else{
        $db->insert('view', [
            'ip'=>$_SERVER["REMOTE_ADDR"],
            'member_id'=>$memberId,
            'setdate'=>$date
        ]);
    }
}


if(!isset($_SESSION['member'])){
    $IP = $db->orderBy('setdate', 'DESC')
    ->getValue('view', 'ip');
    if(!is_null($IP) and $IP == $_SERVER["REMOTE_ADDR"]){
        $viewDate = $db->orderBy('setdate', 'DESC')
        ->where('ip', $_SERVER["REMOTE_ADDR"])
        ->getValue('view', 'setdate');
        if(!is_null($viewDate))
            $viewDate = strtotime($viewDate."+30min");
        if(is_null($viewDate) or ($viewDate <= strtotime($date))){
            $db->insert('view', [
                'ip'=>$_SERVER["REMOTE_ADDR"],
                'setdate'=>$date
            ]);
        }
    }else{
        $db->insert('view', [
            'ip'=>$_SERVER["REMOTE_ADDR"],
            'setdate'=>$date
        ]);
    }
}



?>