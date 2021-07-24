<?php

if (!function_exists('get_arabic_day')) {
    /*طباعة اسم اليوم بالعربي اذا مررت قيمة اليوم بالرقم*/
    function get_arabic_day($day)
    {
        //date("w")
        switch ($day) {
            case 0:
                $day = "الأحد";
                break;
            case 1:
                $day = "الإثنين";
                break;
            case 2:
                $day = "الثلاثاء";
                break;
            case 3:
                $day = "الأربعاء";
                break;
            case 4:
                $day = "الخميس";
                break;
            case 5:
                $day = "الجمعة";
                break;
            case 6:
                $day = "السبت";
                break;
        }
        return $day;
    }
}
/*طباعة اسم الشهر بالعربي اذا مررت له قيمة الشهر بالرقم*/
if (!function_exists('get_arabic_month')) {
    function get_arabic_month($month)
    {
        switch ($month) {
            case 1:
                $month = "كانون الثاني";
                break;
            case 2:
                $month = "شباط";
                break;
            case 3:
                $month = "آذار";
                break;
            case 4:
                $month = "نيسان";
                break;
            case 5:
                $month = "أيار";
                break;
            case 6:
                $month = "حزيران";
                break;
            case 7:
                $month = "تموز";
                break;
            case 8:
                $month = "آب";
                break;
            case 9:
                $month = "أيلول";
                break;
            case 10:
                $month = "تشرين الأول";
                break;
            case 11:
                $month = "تشرين الثاني";
                break;
            case 12:
                $month = "كانون الأول";
                break;
        }
        return $month;
    }
}

if (!function_exists('get_html_date_time')) {
    function get_html_date_time($time)
    {
        return get_arabic_day(date("w",$time)).' '.date("j",$time).' '.get_arabic_month(date("n",$time)).' '.date("Y",$time);
        //' || '.date('H:i:s',$time);
    }
}