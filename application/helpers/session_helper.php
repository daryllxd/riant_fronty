<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @desc Made into a helper because of multiple uses
 * @param String $pageID
 * @param String $linkID
 * @return String/Null
 */
function isActive($pageID,$linkID){
    if($pageID == $linkID){
        return "active";
    }
}
?>