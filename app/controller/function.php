<?php

function checkDataSecurity($data)
{
    return htmlspecialchars(trim($data));
}

function checkDataEmpty($data, $name, $message)
{
    global $errors;
    if ($data == '') {
        $errors[$name] = $message;
    }
}

function setErrorMessage($name, $message)
{
    global $errors;
    $errors[$name] = $message;
}


function checkDataErrorExist($name)
{
    global $errors;
    if (isset($errors[$name]) and $errors[$name] != '')
        return $errors[$name];
}

function checkInputDataValue($name)
{
    return isset($_POST[$name]) ? checkDataSecurity($_POST[$name]) : "";
}


function status($type, $value)
{
    if ($type == 'active') {
        switch ($value) {
            case 0: ?>
                <span class="badge rounded-pill bg-danger">غیر فعال</span>
                <?php break;
            case 1: ?>
                <span class="badge rounded-pill bg-success">فعال</span>
                <?php break;
        }
    } elseif ($type == 'read') {
        switch ($value) {
            case 0: ?>
                <span class="badge rounded-pill bg-warning">درحال بررسی</span>
                <?php break;
            case 1: ?>
                <span class="badge rounded-pill bg-success">تایید شده</span>
                <?php break;
            case 2: ?>
                <span class="badge rounded-pill bg-danger">تایید نشده</span>
                <?php break;
        }
    } elseif ($type == 'log') {
        switch ($value) {
            case 0: ?>
                <span class="badge rounded-pill bg-success">insert</span>
                <?php break;
            case 1: ?>
                <span class="badge rounded-pill bg-danger">delete</span>
                <?php break;
            case 2: ?>
                <span class="badge rounded-pill bg-info">update</span>
                <?php break;
        }
    }
}

function getMaxSort($table)
{
    global $db;
    $sort = $db->getValue($table, 'MAX(sort)');
    return empty($sort) ? 1 : $sort + 1;
}


function showMessage($value)
{ ?>
    <?php if ($value == 0) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
            <strong>فیلد با موفقیت اضافه شد</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } elseif ($value == 1) { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert">
            <strong>فیلد حذف گردید</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } elseif ($value == 2) { ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert" id="alert">
            <strong>فیلد با موفقیت آپدیت گردید</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } elseif ($value == 3) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
            <strong>شما با موفقیت وارد شدید</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } elseif ($value == 4) { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert">
            <strong>نام کاربری یا رمز عبور شما نادرست است</strong>
            <button type="button" class="btn-close close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } elseif ($value == 5) { ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert" id="alert">
            <strong>رمز عبور با موفقیت بروزرسانی گردید.</strong>
            <button type="button" class="btn-close close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?> 
<?php }


function checkUniqData($data, $name, $table, $message)
{
    global $db;
    if ($data != '') {
        $checkExist = $db->where($name, $data)
            ->getValue($table, 'COUNT(*)');
        if ($checkExist == 1)
            setErrorMessage($name, $message);
    }
}


function filter($data, $name, $type, $priority){
    global $db;
    global $prefix;

    if($data != ''){
        $_SESSION[$prefix."_".$name] = $data;
        if($type == "like"){
            $_SESSION[$prefix."_filter"][$priority] = "$prefix.$name LIKE '%$data%'";
            $db->where($_SESSION[$prefix."_filter"][$priority]);
        } 
        elseif($type == '='){
            $_SESSION[$prefix."_filter"][$priority] = "$prefix.$name = $data";
            $db->where($_SESSION[$prefix."_filter"][$priority]);
        }
    }
}

?>