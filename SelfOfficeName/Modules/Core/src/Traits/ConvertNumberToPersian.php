<?php

namespace Selfofficename\Modules\Core\Traits;

trait ConvertNumberToPersian
{
    public function convertToPersian($data)
    {
        $persian = ['۰', '۱', '۲', '۳', '۴', '٤', '۵', '٥', '٦', '۶', '۷', '۸', '۹'];
        $english = [ 0 ,  1 ,  2 ,  3 ,  4 ,  4 ,  5 ,  5 ,  6 ,  6 ,  7 ,  8 ,  9 ];
        return str_replace($english, $persian, $data);
    }
}
