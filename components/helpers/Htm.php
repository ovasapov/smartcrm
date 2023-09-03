<?php
namespace app\components\helpers;
class Htm
{
    public static function logo($text = NULL){
        if ($text == NULL){
            $logo = '<div class="logo-main">';
                $logo .= (iApp::params('logo.part1')) ? '<span class="logo-part1">'. iApp::params('logo.part1') . '</span>' : '';
                $logo .= (iApp::params('logo.part2')) ? '<span class="logo-part2">'. iApp::params('logo.part2') . '</span>' : '';
                $logo .= (iApp::params('logo.part3')) ? '<span class="logo-part3">'. iApp::params('logo.part3') . '</span>' : '';
            $logo .= '</div>';
        }else{
            $logo = '<div class="logo-main logo-main-text">';
                $logo .= ($text) ? '<span class="logo-part0">'. $text . '</span>' : '';
            $logo .= '</div>';
        }

        return $logo;
    }

    public static function glyphicon($icon, $tag = "span"){
        return "<$tag class='glyphicon glyphicon-$icon'></$tag>";
    }
    
    public static function fa($icon, $class = "fa", $tag = "i"){
        return "<$tag class='$class fa-$icon'></$tag>";
    }
    
    public static function isReadMore($str){
        $str = str_replace(['<!-- read more -->', '&lt;!-- read more --&gt;'], '<!-- read more -->', $str);
        $isReadMore = strpos($str, '<!-- read more -->');
        if ($isReadMore !== false){
            return $isReadMore;
        }else{
            return false;
        }
    }
    
    public static function explodeReadMore($str){
        $str = str_replace(['<!-- read more -->', '&lt;!-- read more --&gt;'], '<!-- read more -->', $str);
        $str = str_replace(['<div><!-- read more --></div>', '<div><!-- read more --><br></div>', '<div><!-- read more --></br></div>'], '<!-- read more -->', $str);
        $mssgs = iApp::explode($str, '<!-- read more -->');
        if (count($mssgs) < 2){
            return false;
        }else{
            return $mssgs;
        }
    }
    
    public static function loadingFas(){
        return '<span class="loading d-none"><i class="fas fa-circle-notch fa-spin-fast"></i><span>';
    }
    
    
}