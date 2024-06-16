<?php

// app/Helpers/NumberHelper.php

function formatNumberForDisplay($number)
{
    if ($number >= 10000000) { // 1 crore and above
        return number_format($number / 10000000, 1) . ' Cr';
    } elseif ($number >= 100000) { // 1 lakh and above
        return number_format($number / 100000, 1) . ' Lakh';
    } elseif ($number >= 1000) { // 1 k and above
        return number_format($number / 1000, 1) . ' K';
    }else {
        return number_format($number);
    }
}

