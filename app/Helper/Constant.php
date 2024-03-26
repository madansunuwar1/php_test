<?php

namespace App\Helper;

class Constant
{
    public const HOME_PAGE = 1;
    public static function status($status)
    {
        $statusArray = ['publish' => 'Published', 'draft' => 'Draft', 'pending' => 'Pending Review'];
        if (is_int($status)) {
            $statusArray = [0 => 'Inactive', 1 => 'Active'];
        }
        if ($status) {
            return $statusArray[$status] ?: $status;
        }
        return $status;
    }

}
