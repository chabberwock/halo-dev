<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/

function formatPhone($phone)
{
    $clean = preg_replace('/[^0-9]/','', $phone);
    if (strlen($clean) != 10) {
        return false;
    }
    return '(' . substr($clean, 0, 3) . ') ' . substr($clean, 3, 3) . '-' . substr($clean, 6, 4);
}

echo formatPhone('961-505 846 07');


?>
