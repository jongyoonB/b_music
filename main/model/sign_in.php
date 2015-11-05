<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-04
 * Time: ���� 2:30
 */


function login($argID, $argPD)
{

    $query = "select * from member where id = '" . $argID . "'";
    //echo $query."<br>";
    if($DBvalue = mysqli_fetch_array(mysqli_query(DB_CONN(), $query))){;
        //echo $DBvalue['id'];
        //echo $DBvalue['password'];
        if ($DBvalue['id'] == $argID) {

            if ($DBvalue['password'] == $argPD) {
                return 0;
            } else {
                return 1;
            }
        }
    }

    else{
        return -1;
    }

}