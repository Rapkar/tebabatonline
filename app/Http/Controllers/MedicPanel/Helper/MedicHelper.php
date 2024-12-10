<?php
namespace App\Http\Controllers\MedicPanel\Helper;
trait MedicHelper
{
    public function validateType($type)
    {
        $title = '';
        switch ($type) {
            case 'recomendation':
                $type = 'recomendation';
                $title = "توصیه ها";
                break;
            case 'problems':
                $type = 'problems';
                $title = "مشکلات";
                break;
            case 'medicinerecomendation':
                $type = 'medicinerecomendation';
                $title = "توصیه های دارویی";
                break;
            default:
                $type = 'recomendation';
                break;
        }
        return ['type' => $type, 'title' => $title];
    }
}
