<?php
use App\Timezone;
use App\General;

if (! function_exists('send_email')) {

    function send_email($to, $subject, $message)
    {
        $general = General::first();


        $headers = "From: $general->name <$general->email>\r\n";
        $headers .= "Reply-To: $general->name <$general->email>\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


        $msg = '<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>';
        $msg .= $message;
        $msg .= '</body>
</html>
';

        $a = mail($to, $subject, $msg, $headers);

        if ($a) {
            echo 'Your message has been sent.';
        } else {
            echo 'There was a problem sending the email.';
        }



    }
}

function Short_Text($data,$length){
    $first_part = explode(" ",$data);
    $main_part = strip_tags(implode(' ',array_splice($first_part,0, $length)));
    return $main_part ."...." ;
}



function ImageCheck($ext){
    if($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png' && $ext != 'gif' && $ext != 'bnp'){
        $ext = "";
    }
    return $ext;
}
function NewFile($name, $data){
    $fh = fopen($name, "w");
    fwrite($fh,$data);
    fclose($fh);
}
function ViewFile($name){
    $fh = fopen($name, "r");
    $data = fread($fh,filesize($name));
    fclose($fh);
    return $data;
}
function Find_fist_int($string){
    preg_match_all('!\d+!', $string, $matches);
    if($matches[0] != ""){
        foreach($matches[0] as $key => $value){
            $url = $value;
            return $url;
            break;
        }
    }


}




function Replace($data) {
    $data = str_replace("'", "", $data);
    $data = str_replace("!", "", $data);
    $data = str_replace("@", "", $data);
    $data = str_replace("#", "", $data);
    $data = str_replace("$", "", $data);
    $data = str_replace("%", "", $data);
    $data = str_replace("^", "", $data);
    $data = str_replace("&", "", $data);
    $data = str_replace("*", "", $data);
    $data = str_replace("(", "", $data);
    $data = str_replace(")", "", $data);
    $data = str_replace("+", "", $data);
    $data = str_replace("=", "", $data);
    $data = str_replace(",", "", $data);
    $data = str_replace(":", "", $data);
    $data = str_replace(";", "", $data);
    $data = str_replace("|", "", $data);
    $data = str_replace("'", "", $data);
    $data = str_replace('"', "", $data);
    $data = str_replace("?", "", $data);
    $data = str_replace("  ", "_", $data);
    $data = str_replace("'", "", $data);
    $data = str_replace(".", "-", $data);
    $data = strtolower(str_replace("  ", "-", $data));
    $data = strtolower(str_replace(" ", "-", $data));
    $data = strtolower(str_replace(" ", "-", $data));
    $data = strtolower(str_replace("__", "-", $data));
    return str_replace("_", "-", $data);
}

function TimeZoneManual(){
    $time =  Timezone::find(1);
    return $time->country;
}


//IP Tracker

//function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
//    $output = NULL;
//    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
//        $ip = $_SERVER["REMOTE_ADDR"];
//        if ($deep_detect) {
//            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
//                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
//            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
//                $ip = $_SERVER['HTTP_CLIENT_IP'];
//        }
//    }
//    $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
//    $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
//    $continents = array(
//        "AF" => "Africa",
//        "AN" => "Antarctica",
//        "AS" => "Asia",
//        "EU" => "Europe",
//        "OC" => "Australia (Oceania)",
//        "NA" => "North America",
//        "SA" => "South America"
//    );
//    if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
//        $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
//        if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
//            switch ($purpose) {
//                case "location":
//                    $output = array(
//                        "city"           => @$ipdat->geoplugin_city,
//                        "state"          => @$ipdat->geoplugin_regionName,
//                        "country"        => @$ipdat->geoplugin_countryName,
//                        "country_code"   => @$ipdat->geoplugin_countryCode,
//                        "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
//                        "continent_code" => @$ipdat->geoplugin_continentCode
//                    );
//                    break;
//                case "address":
//                    $address = array($ipdat->geoplugin_countryName);
//                    if (@strlen($ipdat->geoplugin_regionName) >= 1)
//                        $address[] = $ipdat->geoplugin_regionName;
//                    if (@strlen($ipdat->geoplugin_city) >= 1)
//                        $address[] = $ipdat->geoplugin_city;
//                    $output = implode(", ", array_reverse($address));
//                    break;
//                case "city":
//                    $output = @$ipdat->geoplugin_city;
//                    break;
//                case "state":
//                    $output = @$ipdat->geoplugin_regionName;
//                    break;
//                case "region":
//                    $output = @$ipdat->geoplugin_regionName;
//                    break;
//                case "country":
//                    $output = @$ipdat->geoplugin_countryName;
//                    break;
//                case "countrycode":
//                    $output = @$ipdat->geoplugin_countryCode;
//                    break;
//            }
//        }
//    }
//    return $output;
//}
//
//
//
//$user_agent     =   $_SERVER['HTTP_USER_AGENT'];
//
//function getOS() {
//
//    global $user_agent;
//
//    $os_platform    =   "Unknown OS Platform";
//
//    $os_array       =   array(
//        '/windows nt 10/i'     =>  'Windows 10',
//        '/windows nt 6.3/i'     =>  'Windows 8.1',
//        '/windows nt 6.2/i'     =>  'Windows 8',
//        '/windows nt 6.1/i'     =>  'Windows 7',
//        '/windows nt 6.0/i'     =>  'Windows Vista',
//        '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
//        '/windows nt 5.1/i'     =>  'Windows XP',
//        '/windows xp/i'         =>  'Windows XP',
//        '/windows nt 5.0/i'     =>  'Windows 2000',
//        '/windows me/i'         =>  'Windows ME',
//        '/win98/i'              =>  'Windows 98',
//        '/win95/i'              =>  'Windows 95',
//        '/win16/i'              =>  'Windows 3.11',
//        '/macintosh|mac os x/i' =>  'Mac OS X',
//        '/mac_powerpc/i'        =>  'Mac OS 9',
//        '/linux/i'              =>  'Linux',
//        '/ubuntu/i'             =>  'Ubuntu',
//        '/iphone/i'             =>  'iPhone',
//        '/ipod/i'               =>  'iPod',
//        '/ipad/i'               =>  'iPad',
//        '/android/i'            =>  'Android',
//        '/blackberry/i'         =>  'BlackBerry',
//        '/webos/i'              =>  'Mobile'
//    );
//
//    foreach ($os_array as $regex => $value) {
//
//        if (preg_match($regex, $user_agent)) {
//            $os_platform    =   $value;
//        }
//
//    }
//
//    return $os_platform;
//
//}
//
//function getBrowser() {
//
//    global $user_agent;
//
//    $browser        =   "Unknown Browser";
//
//    $browser_array  =   array(
//        '/msie/i'       =>  'Internet Explorer',
//        '/firefox/i'    =>  'Firefox',
//        '/safari/i'     =>  'Safari',
//        '/chrome/i'     =>  'Chrome',
//        '/edge/i'       =>  'Edge',
//        '/opera/i'      =>  'Opera',
//        '/netscape/i'   =>  'Netscape',
//        '/maxthon/i'    =>  'Maxthon',
//        '/konqueror/i'  =>  'Konqueror',
//        '/mobile/i'     =>  'Handheld Browser'
//    );
//
//    foreach ($browser_array as $regex => $value) {
//
//        if (preg_match($regex, $user_agent)) {
//            $browser    =   $value;
//        }
//
//    }
//
//    return $browser;
//
//}
//
//
//$user_os        =   getOS();
//$user_browser   =   getBrowser();
//
//$device_details =   "".$user_browser." on ".$user_os."";
//
//
//
//
//$co = ip_info("Visitor", "Country"); // India
//$cc = ip_info("Visitor", "Country Code"); // IN
//$ca = ip_info("Visitor", "Address"); // Proddatur, Andhra Pradesh, India
//$ip = $_SERVER['REMOTE_ADDR'];
//$ua = $_SERVER['HTTP_USER_AGENT'];
//$loc = "$ca ($cc)";