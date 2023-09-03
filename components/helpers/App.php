<?php

namespace app\components\helpers;

use Yii;
use \yii\web\Cookie;
use DateTime;
use yii\helpers\Url;

class App {
    
    public function __construct($config = array()) {
        
    }

    public function baseUrl($params = "") {
        return (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]" . $params;
    }

    public function currentUrl($params = "") {
        return (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" . $params;
    }

    public static function isGuest() {
        return Yii::$app->user->isGuest;
    }

    public static function userIdentity($key) {
        return Yii::$app->user->identity->$key;
    }

    public static function rand($min = null, $max = null) {
        return ($min && $max) ? rand($min, $max) : rand();
    }

    public $setFlashKey = [
        'success' => 'success',
        'error' => 'error',
        'info' => 'info',
        'danger' => 'danger',
        'warning' => 'warning',
    ];

    public function lanToLanguage($lan = NULL) {
        if ($lan == NULL)
            $lan = \Yii::$app->language;

        switch ($lan) {
            case 'ru':
                return "ru-RU";
                break;
            case 'en':
                return "us-EN";
                break;
            case 'hy':
                return "hy-AM";
                break;
            default:
                return "hy-AM";
        }
    }

    public static function language($lan = NULL) {
        return Yii::$app->language;
    }

    public function t($message, $params = NULL, $category = 'app', $lan = NULL) {
        return Yii::t($category, $message, $params, $this->lanToLanguage($lan));
    }

    public static function params($param) {
        return Yii::$app->params[$param];
    }

    public static function setFlash($key, $value) {
        Yii::$app->getSession()->setFlash( $key, self::t( $value ) );
    }

    public function get($param) {
        return Yii::$app->request->get($param);
    }
    
    public function post($param) {
        return Yii::$app->request->post($param);
    }

    public static function getCookie($value) {
        if (Yii::$app->getRequest()->getCookies()->has($value)) {
            return Yii::$app->getRequest()->getCookies()->getValue($value);
        } else {
            return NULL;
        }
    }

    public static function setCookie($name, $value, $expire = 2592000, $path = "/") {
        $expire = time() + $expire;
        Yii::$app->response->cookies->add(new Cookie([
            'name' => $name,
            'value' => $value,
            'expire' => $expire,
            'path' => $path
        ]));
    }

    public static function flag($flag, $tag = 'span', $squared = false, $options = []) {
        switch ($flag) {
            case 'hy':
                $flag = 'am';
                break;
            case 'en':
                $flag = 'us';
                break;
        }
        return Flag::widget([
                    'tag' => $tag, // flag tag
                    'country' => $flag, // where xx is the ISO 3166-1-alpha-2 code of a country,
                    'squared' => $squared, // set to true if you want to have a squared version flag
                    'options' => $options // tag html options
        ]);
    }

    public static function mailer($from, $to, $subject, $textBody = NULL, $textHtml = NULL) {
        if ($textHtml) {
            Yii::$app->mailer->compose()
                    ->setFrom($from)
                    ->setTo($to)
                    ->setSubject($subject)
                    ->setTextBody($textBody)
                    ->setHtmlBody($textHtml)
                    ->send();
        } else {
            Yii::$app->mailer->compose()
                    ->setFrom($from)
                    ->setTo($to)
                    ->setSubject($subject)
                    ->setTextBody($textBody)
                    ->send();
        }
    }

    public function dtNowUnix($datetime = NULL, $delta = 0) {
        $date = new DateTime($datetime);
        $now = $date->format('U');
        return $now + $delta * self::params('hourToSeconds');
    }
    
    public static function uNowUnix() {
        $now = (new DateTime())->format('U');
        $delta = (Yii::$app->user->identity && Yii::$app->user->identity->timezone_id) ? Yii::$app->user->identity->timezone->code : 0;
        return $now + $delta * self::params('hourToSeconds');
    }

    public static function unserialize($text) {
        return unserialize($text);
    }

    public function getJsonFromString($text) {
        $pattern = '
        /
        \{              # { character
            (?:         # non-capturing group
                [^{}]   # anything that is not a { or }
                |       # OR
                (?R)    # recurses the entire pattern
            )*          # previous group zero or more times
        \}              # } character
        /x
        ';

        preg_match_all($pattern, $text, $matches);
        return $matches[0][0];
    }

    public function getCookieFromJsonedString($text, $cookie) {
        $text = $this->getJsonFromString($text);
        $pattern = '/[a-zA-Z]{2,20}/';
        preg_match_all($pattern, $text, $match_arr);
        return $match_arr[0][1];
    }

    public static function getDns() {
        $url = $_SERVER['HTTP_HOST'];
        $url = str_replace('www.', '', $url);
        return $url;
    }

    public static function is_serialized($data, $strict = true) {
        // if it isn't a string, it isn't serialized.
        if (!is_string($data)) {
            return false;
        }
        $data = trim($data);
        if ('N;' == $data) {
            return true;
        }
        if (strlen($data) < 4) {
            return false;
        }
        if (':' !== $data[1]) {
            return false;
        }
        if ($strict) {
            $lastc = substr($data, -1);
            if (';' !== $lastc && '}' !== $lastc) {
                return false;
            }
        } else {
            $semicolon = strpos($data, ';');
            $brace = strpos($data, '}');
            // Either ; or } must exist.
            if (false === $semicolon && false === $brace)
                return false;
            // But neither must be in the first X characters.
            if (false !== $semicolon && $semicolon < 3)
                return false;
            if (false !== $brace && $brace < 4)
                return false;
        }
        $token = $data[0];
        switch ($token) {
            case 's' :
                if ($strict) {
                    if ('"' !== substr($data, -2, 1)) {
                        return false;
                    }
                } elseif (false === strpos($data, '"')) {
                    return false;
                }
            // or else fall through
            case 'a' :
            case 'O' :
                return (bool) preg_match("/^{$token}:[0-9]+:/s", $data);
            case 'b' :
            case 'i' :
            case 'd' :
                $end = $strict ? '$' : '';
                return (bool) preg_match("/^{$token}:[0-9.E-]+;$end/", $data);
        }
        return false;
    }

    public static function maybe_unserialize($original) {
        if (self::is_serialized($original)) // don't attempt to unserialize data that wasn't serialized going in
            return @unserialize($original);
        return $original;
    }

    public function date($format = "Y/m/d H:i:s", $timestamp = NULL) {
        if (!$timestamp) {
            $timestamp = time();
        }
        return date( $format, $timestamp );
    }

    public static function ip() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if (isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    public static function dayNight() {
        $hour = date('H');
        $dayTerm = ($hour > 6 && $hour < 19) ? "day" : "night";
        return $dayTerm;
    }

    public static function idEncode($id, $length = 16) {
        $arr = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15];
        $randarr = (strlen($id) == 1) ? [array_rand($arr, strlen($id))] : array_rand($arr, strlen($id));
        $sets = explode("|", "abcdfghjkmnpqrstvwxyz|ABCDFGHJKLMNPQRSTVWXYZ");
        $all = '';
        $randString = '';
        foreach ($sets as $key => $set) {
            $randString .= $set[array_rand(str_split($set))];
            $all .= $set;
        }
        $all = str_split($all);
        for ($i = 0; $i < $length - count($sets); $i++) {
            $randString .= $all[array_rand($all)];
        }
        $randString = str_shuffle($randString);
        $idarr = str_split($id);
        for ($i = 0; $i < count($randarr); $i++) {
            $randString = substr_replace($randString, $idarr[$i], $randarr[$i], 1);
        }
        return $randString;
    }
    
    public static function idDecode($string) {
        return $string ? preg_replace("/[^0-9]/", "", $string ) : null;
    }

    public static function controllerId() {
        return Yii::$app->controller->id;
    }

    public static function actionId() {
        return Yii::$app->controller->action->id;
    }

    public static function controllerAction() {
        return Yii::$app->controller->id . '/' . Yii::$app->controller->action->id;
    }

    public static function curl_get($url) {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);

        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }

    public static function curl_post($url, $post = []) {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }

    public function substr($string_name, $start_pos, $length_to_cut = null) {
        if ($length_to_cut) {
            return mb_substr($string_name, $start_pos, $length_to_cut);
        } else {
            return mb_substr($string_name, $start_pos);
        }
    }

    public static function getTagValues($tag, $str) {
        $re = sprintf("/\[(%s)\](.+?)\[\/\\1\]/s", preg_quote($tag));
        preg_match_all($re, $str, $matches);
        return ($matches) ? $matches[2] : null;
    }

    public static function getOneTagValue($tag, $str) {
        $re = sprintf("/\[(%s)\](.+?)\[\/\\1\]/s", preg_quote($tag));
        preg_match_all($re, $str, $matches);
        return ($matches && count($matches) > 1 && isset($matches[2][0])) ? $matches[2][0] : null;
    }

    public static function strReplacePreCodeTags($str) {
        return str_replace(
                [
            '<code html>',
            '<pre html>',
                ], [
            '<code class="brush: html">',
            '<pre class="brush: html">',
                ], $str);
    }

    public static function nl2br($str, $is_xhtml = true) {
        return nl2br($str, $is_xhtml);
    }

    public static function strReplaceBaseTagsLtGt($str) {
        return str_replace(
                [
            '<!DOCTYPE html>',
            '<html>',
            '<head>',
            '<title>',
            '</title>',
            '</head>',
            '<body>',
            '</body>',
            '</html>',
            '<code><p></code>',
            '<code></p></code>',
            '<code><h1></code>',
            '<code><h2></code>',
            '<code><h3></code>',
            '<code><h4></code>',
            '<code><h5></code>',
            '<code><h6></code>',
            '<code></h1></code>',
            '<code></h2></code>',
            '<code></h3></code>',
            '<code></h4></code>',
            '<code></h5></code>',
            '<code></h6></code>',
            '<table>',
                ], [
            '&lt;!DOCTYPE html&gt;',
            '&lt;html&gt;',
            '&lt;head&gt;',
            '&lt;title&gt;',
            '&lt;/title&gt;',
            '&lt;/head&gt;',
            '&lt;body&gt;',
            '&lt;/body&gt;',
            '&lt;/html&gt;',
            '<code>&lt;p&gt;</code>',
            '<code>&lt;/p&gt;</code>',
            '<code>&lt;h1&gt;</code>',
            '<code>&lt;h2&gt;</code>',
            '<code>&lt;h3&gt;</code>',
            '<code>&lt;h4&gt;</code>',
            '<code>&lt;h5&gt;</code>',
            '<code>&lt;h6&gt;</code>',
            '<code>&lt;/h1&gt;</code>',
            '<code>&lt;/h2&gt;</code>',
            '<code>&lt;/h3&gt;</code>',
            '<code>&lt;/h4&gt;</code>',
            '<code>&lt;/h5&gt;</code>',
            '<code>&lt;/h6&gt;</code>',
            '<table class="table table-striped nomargin">',
                ], $str);
    }

    public static function number_format($number, $decimals = 0, $dec_point = ".", $thousands_sep = ",") {
        return number_format($number, $decimals, $dec_point, $thousands_sep);
    }

    public function price_rubl($number, $space = "") {
        return self::number_format($number) . $space . "₽";
    }

    public static function sale_price($price, $sale) {
        return $price * (1 - $sale / 100);
    }

    public static function strip_tags($str, $allowable_tags = null) {
        return ($allowable_tags) ? strip_tags($str, $allowable_tags) : strip_tags($str);
    }

    public function array_key_exists($key, $array) {
        return array_key_exists($key, $array);
    }

    public static function arrayToCommaString($array) {
        return ($array) ? implode(",", $array) : NULL;
    }

    public static function multipleArrayToCommaString($multiple_array, $field = 'id') {
        $array = array();
        foreach ($multiple_array as $value)
            $array[] = $value[$field];
        return ($array) ? implode(",", $array) : NULL;
    }

    public static function implode($pieces, $glue = ',') {
        return implode($glue, $pieces);
    }

    public function explode($string, $delimiter = ',', $limit = null) {
        return ($limit) ? explode($delimiter, $string, $limit) : explode($delimiter, $string);
    }

    public static function shuffle($array) {
        shuffle($array);
        return $array;
    }

    public static function array_filter($array) {
        return array_filter($array);
    }

    public static function array_sum($array) {
        return array_sum($array);
    }

    public static function time() {
        return time();
    }

    public static function str_split($string, $split_length = null) {
        if ($split_length) {
            return str_split($string, $split_length);
        } else {
            return str_split($string);
        }
    }

    public static function arrayT($array) {
        if ($array) {
            $tArray = [];
            foreach ($array as $key => $value) {
                $tArray[$key] = self::t($value);
            }
            return $tArray;
        } else {
            return null;
        }
    }

    public static function json_encode($value, $options = JSON_UNESCAPED_UNICODE, $depth = 512) {
        return json_encode($value, $options, $depth);
    }

    public static function strpos($haystack, $needle, $offset = 0) {
        return strpos($haystack, $needle, $offset);
    }

    public static function guestEmails() {
        $dns = self::getDns();
        return [
            'administrator@' . $dns => self::t('Administrator'),
            'franchise@' . $dns => self::t('Franchise'),
            'client@' . $dns => self::t('Client'),
            'account@' . $dns => self::t('Account'),
            'manager@' . $dns => self::t('Manager'),
            'support@' . $dns => self::t('Support'),
            'techsupport@' . $dns => self::t('Technical support'),
        ];
    }

    public static function datePretty($timestamp, $dateFormat = 'd/m/Y H:i') {
        $ufdate = '';
        $now = time();
        $elapsed = $now - $timestamp;
        if ($elapsed <= 0)
            $ufdate = date('H:i', $timestamp);
        else 
            if ($elapsed == 1)
                $ufdate = "1 " . self::t("Sec.") . " " . self::t("ago");
            else 
                if ($elapsed < 60)
                    $ufdate = "{$elapsed} " . self::t("Sec.") . " " . self::t("ago");
                else 
                    if ($elapsed < 3600) { //One hour in seconds
                        $mins = floor($elapsed / 60);
                        $secs = $elapsed % 60;
                        $disp = min(($secs <= 30 ? $mins : $mins + 1), 59);
                        $ufdate = "{$disp} " . ($disp == 1 ? self::t('Min.') : self::t('Min.')) . " " . self::t("ago");
                    } else 
                        if ($elapsed < 86400) { //One day in seconds
                            $hours = floor($elapsed / 3600);
                            $mins = floor(($elapsed % 3600) / 60);
                            $disp = min(($mins <= 30 ? $hours : $hours + 1), 23);
                            $ufdate = "{$disp} " . ($disp == 1 ? self::t('Hour') : self::t('Hours')) . " " . self::t("ago");
                        } else 
                            if ($elapsed < 604800) { //One week in seconds
                                $days = floor($elapsed / 86400);
                                $hours = floor(($elapsed % 86400) / 3600);
                                $disp = min(($hours <= 12 ? $days : $days + 1), 6);
                                $ufdate = "{$disp} " . ($disp == 1 ? self::t('Day') : self::t('Days')) . " " . self::t("ago");

        } else
            $ufdate = date($dateFormat, $timestamp);
        return $ufdate;
    }
    
    public static function workDaysArray(){
        $wd['1'] = self::t('Monday');
        $wd['2'] = self::t('Tuesday');
        $wd['3'] = self::t('Wednesday');
        $wd['4'] = self::t('Thursday');
        $wd['5'] = self::t('Friday');
        $wd['6'] = self::t('Saturday');
        $wd['7'] = self::t('Sunday');
        return $wd;
    }
    
    public static function idn_to_utf8($punycode){
        return idn_to_utf8($punycode);
    }
    
    public static function idn_to_ascii($dns){
        return idn_to_ascii($dns);
    }
    
    public function array_except($array, $keys) {
        return array_diff_key($array, array_flip((array) $keys));   
    } 
    
    public function identity($key, $param = null){
        if (Yii::$app->user->identity){
            switch ($key){
                case 'image':
                    $image = Yii::$app->user->identity->$key;
                    $id = Yii::$app->user->identity->id;
                    if ($image){
                        switch ($param){
                            case 'icon':
                            case 'small':
                            case 'medium':
                            case 'large':
                                return '@web/../../backend/web/images/user/' . $id . '/' . $param . '_' . $image;
                            default :
                                return '@web/../../backend/web/images/user/' . $id . '/' . $image;
                        }
                    }else{
                        return '@web/../../backend/web/images/user/' . $param . '_user.png';
                    }
                default :
                   return Yii::$app->user->identity->$key; 
            }
        }else{
            switch ($key){
                case 'image':
                    return '@web/../../backend/web/images/user/' . $param . '_user.png';
                case 'name':
                    return $this->t(($param) ? $param : 'Guest');
                case 'role':
                    return $this->t(($param) ? $param : 'Guest');
                default :
                   return null; 
            }
        }
    }
    
    public static function strip_param_from_url( $url, $param ) {
        $base_url = strtok($url, '?');              // Get the base url
        $parsed_url = parse_url($url);              // Parse it 
        $query = $parsed_url['query'];              // Get the query string
        parse_str( $query, $parameters );           // Convert Parameters into array
        unset( $parameters[$param] );               // Delete the one you want
        $new_query = http_build_query($parameters); // Rebuilt query string
        return $base_url.'?'.urldecode($new_query);            // Finally url is ready
    }
}