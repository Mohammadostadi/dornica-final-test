<?php 

function checkDataSecurity($data){
    return htmlspecialchars(trim($data));
}

function checkDataEmpty($data, $name, $message){
    global $errors;
    if($data == ''){
        $errors[$name] = $message;
    }
}

function setErrorMessage($name, $message){
    global $errors;
    $errors[$name] = $message;
}


function checkDataErrorExist($name){
    global $errors;
    if(isset($errors[$name]) and $errors[$name] != '')
        return $errors[$name];
}

function checkInputDataValue($name){
    return isset($_POST[$name])?checkDataSecurity($_POST[$name]):"";
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
    }
}

function getMaxSort($table){
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
    <?php } ?>
<?php } 

?>