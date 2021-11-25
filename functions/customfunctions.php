<?php 
if (!function_exists('pre')):
    function pre($obj) {
        echo '<pre>';
        if (is_array($obj) || is_object($obj)):
            print_r($obj);
        else:
            print $obj;
        endif;
        echo '</pre>';
        return;
    }
endif;

add_filter('op_email', 'op_email');
function op_email($email){
    return '<a href="mailto:'.$email .'" >'.$email.'</a>';
     //apply_filters('op_email', $telefon); //call in template
}   

add_filter('op_telefon', 'op_telefon');
function op_telefon($telefon){
    if(strpos($telefon, '+45') === 0){
        $tel_url = $telefon;
    }else{
         $tel_url = '+45'.$telefon;
    }
    $tel_url = str_replace (" ", "", $tel_url);
    return '<a href="tel:'.$tel_url .'" >'.$telefon.'</a>';
     //apply_filters('op_telefon', $telefon); //call in template
}

?>