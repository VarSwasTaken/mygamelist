<?php
function validate($required_params = []) {
    foreach($required_params as $param) {
        if(!isset($_POST[$param]) || empty($_POST[$param]))
            return false;
    }
    return true;
};

function sanitize($input) {
    $good_input = htmlspecialchars(strip_tags(trim($input)));
    if($good_input)
        return $good_input;
    
    throw new Exception("Bad input");
}
?>