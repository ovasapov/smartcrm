<?php
namespace app\components\helpers;

class Js
{
    const void0 =  "javascript:void(0);";

    const textareaEnableTabOnKeydown = "if(event.keyCode===9){var v=this.value,s=this.selectionStart,e=this.selectionEnd;this.value=v.substring(0, s)+'\t'+v.substring(e);this.selectionStart=this.selectionEnd=s+1;return false;}";
}