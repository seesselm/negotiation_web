<?php

function checkCookie($cookie_name)
{
    if (! isset($_COOKIE[$cookie_name])) {
        $info = 0;
    } else {
        $info = $_COOKIE[$cookie_name];
    }
    return $info;
}

function createRow($kid, $table)
{
    include ("dbconfig.php");
    $con = mysqli_connect($server, $serverlogin, $pswd, $dbname) or die("Connection fail");
    $query = "Insert into $dbname.$table (KID) values ($kid)";
    mysqli_query($con, $query) or die("Error in query: $query");
    // echo "Done create";
}

function getRow($kid, $table, $employment)
{
    include ("dbconfig.php");
    // echo "in get<br>";
    $con = mysqli_connect($server, $serverlogin, $pswd, $dbname) or die("Connection fail");
    if ($employment == 1)
        $query = "Select MAX(employee_id) as id from $dbname.$table where KID=$kid";
    elseif ($employment == 2)
        $query = "Select MAX(employer_id) as id from $dbname.$table where KID=$kid";
    // echo $query;
    $result = mysqli_query($con, $query);
    $emp_id = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $emp_id = $row['id'];
    }
    // echo $emp_id;
    return $emp_id;
}

function getTable($emp)
{
    if ($emp == 1)
        return "employee";
    elseif ($emp == 2)
        return "employer";
}

function updateRow($partner, $id, $table)
{
    include ("dbconfig.php");
    if (is_int(intval($id))) {

        $con = mysqli_connect($server, $serverlogin, $pswd, $dbname) or die("Connection fail");
        if ($table == "employee")
            $query = "update $dbname.$table set employer_id=$partner where employee_id=$id";
        elseif ($table == "employer")
            $query = "update $dbname.$table set employee_id=$partner where employer_id=$id";
        mysqli_query($con, $query) or die("Error in query: $query"); // Change error message
                                                                     // echo "Done create";
    }
}

function checkStatus($id, $table)
{
    include ("dbconfig.php");
    if (is_int(intval($id))) {
        $con = mysqli_connect($server, $serverlogin, $pswd, $dbname) or die("Connection fail");
        if ($table == "employee") {
            $query = "Select employer_id as partner from $dbname.$table where employee_id=$id";
        } elseif ($table == "employer") {
            $query = "Select employee_id as partner from $dbname.$table where employer_id=$id";
        }
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $status = $row['partner'];
        }
        if ($status == NULL)
            return FALSE;
        // elseif($staus!=NULL)
        else
            return TRUE;
    }
}

function updateRowForm($form, $i, $select, $id, $table)
{
    include ("dbconfig.php");
    if (is_int(intval($id))) {
        $con = mysqli_connect($server, $serverlogin, $pswd, $dbname) or die("Connection fail");
        $table_id = $table . "_id";
        if ($form == 1) {
            $col = "salary";
            $col_pts = "sal_pts";
            $col_order = "sal_order";
        } elseif ($form == 2) {
            $col = "vacation";
            $col_pts = "vac_pts";
            $col_order = "vac_order";
        } elseif ($form == 3) {
            $col = "annual_raise";
            $col_pts = "ann_pts";
            $col_order = "ann_order";
        } elseif ($form == 4) {
            $col = "start_date";
            $col_pts = "sta_pts";
            $col_order = "sta_order";
        } elseif ($form == 5) {
            $col = "medical";
            $col_pts = "med_pts";
            $col_order = "med_order";
        }
        $val = explode("|", $select);
        $query = "Update $dbname.$table set $col='$val[0]',$col_pts='$val[1]',$col_order=$i where $table_id=$id";
        //echo $query;
        mysqli_query($con, $query) or die("Error in query: $query");
    }
}

function getInfo($id, $table)
{
    include ("dbconfig.php");
    if (is_int(intval($id))) {
        $table_id = $table . "_id";
        if ($table == "employee")
            $partner = "employer_id";
        elseif ($table == "employer")
            $partner = "employee_id";
        $con = mysqli_connect($server, $serverlogin, $pswd, $dbname) or die("Connection fail");
        $query = "SELECT salary,sal_pts,sal_order,vacation,vac_pts,vac_order,annual_raise,ann_pts,ann_order,start_date,sta_pts,
         sta_order,medical,med_pts,med_order,$partner as partner FROM $dbname.$table where $table_id=$id";
        // echo $query;
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $return = $row['salary'] . "|" . $row['sal_pts'] . "|" . $row['sal_order'] . "|" . $row['vacation'] . "|" . $row['vac_pts'] . "|" . $row['vac_order'] . "|" . $row['annual_raise'] . "|" . $row['ann_pts'] . "|" . $row['ann_order'] . "|" . $row['start_date'] . "|" . $row['sta_pts'] . "|" . $row['sta_order'] . "|" . $row['medical'] . "|" . $row['med_pts'] . "|" . $row['med_order'] . "|" . $row['partner'];
        }
        return $return;
    }
}

?>