<?php

namespace App\Http\Controllers;

use App\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends BaseController
{


    public function indexMarketplace(Request $request)
    {
        $where = [];
        if(!empty($request->type)){
            $where[] = ['type' => $request->type];
        }

        $this->addData('equipment', Equipment::where($where)->paginate(10));
        return $this->buildView('equipment.index');

    }

    public function viewMarketplace($type, $id)
    {
        $equipment = Equipment::where('id', $id)->first();
        $this->addData($type, $equipment);
        return $this->buildView('equipment.type.'.$type);
    }
}
