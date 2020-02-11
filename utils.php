<?php 
    function rinse($input) {
        return filter_var($input, FILTER_SANITIZE_STRING);
    }
?>