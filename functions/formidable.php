<?php

//keep full screen
add_filter( 'frm_admin_full_screen_class', 'frm_keep_full_screen' );
function frm_keep_full_screen(){
  return '';
}
