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
            case 2: ?>
                <span class="badge rounded-pill bg-success">تایید شده</span>
                <?php break;
            case 1: ?>
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

function getMaxField($table, $field, $con = '')
{
    global $db;
    if ($con != '')
        $db->where('id', $con);
    $field = $db->getValue($table, "MAX($field)");
    return empty($field) ? 1 : $field + 1;
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
    <?php } elseif ($value == 6) { ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert" id="alert">
            <strong>بعد از تایید ادمین کامنت شما قابل نمایش است.</strong>
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


function filter($data, $name, $type, $priority)
{
    global $db;
    global $prefix;

    if ($data != '') {
        $_SESSION[$prefix . "_" . $name] = $data;
        if ($type == "like") {
            $_SESSION[$prefix . "_filter"][$priority] = "$prefix.$name LIKE '%$data%'";
            $db->where($_SESSION[$prefix . "_filter"][$priority]);
        } elseif ($type == '=') {
            $_SESSION[$prefix . "_filter"][$priority] = "$prefix.$name = $data";
            $db->where($_SESSION[$prefix . "_filter"][$priority]);
        }
    }
}


function chartData($num, $field, $table)
{
    global $db;
    $data = [];
    for ($i = --$num; $i >= 0; $i--) {
        $first_day_month = date('Y/m/01', strtotime("-$i month"));
        $last_day_month = date('Y/m/t', strtotime("$first_day_month"));
        $res = $db->where("DATE($field) BETWEEN '$first_day_month' AND '$last_day_month'")
            ->getValue($table, 'COUNT(*)');
        $data[] = $res;
    }
    return implode(', ', $data);
}


function pageLimit($tableName, $limit, $soft = true, $condition = null)
{
    global $db;
    global $page;
    global $pages;
    if (isset($_GET['page'])) {
        $page = checkDataSecurity($_GET['page']);
    }
    $db->pageLimit = $limit;
    if (!empty($condition)) {
        if (!empty($condition)) {
            if (gettype($condition) == 'array') {
                foreach ($condition as $conn) {
                    if (!empty($conn)) {
                        $db->where($conn);
                    }
                }
            } else {
                $db->where($condition);
            }
        }
    }
    $total = $soft ? $db->where("$tableName.deleted_at IS NULL")->getvalue($tableName, 'COUNT(*)') : $db->getvalue($tableName, 'COUNT(*)');
    $pages = ceil($total / $db->pageLimit);

}

function pagination($page, $pages)
{
    if ($page > 0) {
        $queryPrams = $_GET;
        unset($queryPrams['page']);
        $queryString = http_build_query($queryPrams);
    }
    if ($pages == 0) { ?>
        <div class="d-flex justify-content-center align-items-center">
            <p class="text-center py-2 opacity-75 rounded w-75">داده ای یافت نشد</p>
        </div>
    <?php } else { ?>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-start">
                <?php if ($page > 1) { ?>
                    <li class="page-item"><a class="page-link"
                            href="<?= '?page=1' . ($queryString ? '&' . $queryString : "") ?>">اول</a></li>
                    <li class="page-item"><a class="page-link"
                            href="<?= $page > 1 ? '?page=' . ($page - 1) . ($queryString ? '&' . $queryString : "") : '' ?>"><i
                                class="ti-angle-right"></i></a>
                    </li>
                <?php } ?>
                <?php if ($page == $pages) { ?>
                    <li class="page-item"><span class="page-link"><?= $page ?></span>
                    </li>
                <?php } ?>
                <?php if ($page < $pages) { ?>
                    <li class="page-item"><span class="page-link"><?= $page ?></span>
                    </li>
                    <li class="page-item"><a class="page-link" <?= ($page >= $pages) ? 'disabled' : '' ?>
                            href="<?= $page < $pages ? '?page=' . ($page + 1) . ($queryString ? '&' . $queryString : "") : '' ?>"><?= $page + 1 ?></a>
                    </li>
                    <?php if($page + 1 < $pages){ ?>
                    <li class="page-item"><a class="page-link" <?= ($page >= $pages) ? 'disabled' : '' ?>
                            href="<?= $page + 1 < $pages ? '?page=' . ($page + 2) . ($queryString ? '&' . $queryString : "") : '' ?>"><?= $page + 2 ?></a>
                    </li>
                    <?php } ?>
                    <li class="page-item"><a class="page-link" <?= ($page >= $pages) ? 'disabled' : '' ?>
                            href="<?= $page < $pages ? '?page=' . ($page + 1) . ($queryString ? '&' . $queryString : "") : '' ?>"><i
                                class="ti-angle-left"></i></a>
                    </li>
                    <li class="page-item"><a class="page-link"
                            href="<?= '?page=' . $pages . ($queryString ? '&' . $queryString : "") ?>">آخر</a></li>
                <?php } ?>
            </ul>
        </nav>
        <?php
    }
}

function persian_number($number)
{
    $pNumbers = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    $eNumbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
    return str_replace($pNumbers, $eNumbers, $number);
}

function admin_role($data){
    switch($data){
        case 0:
            echo "مدیر";
            break;
        case 1:
            echo "ادمین";
            break;
        case 2:
            echo "اپراتور";
            break;
    }
}
?>