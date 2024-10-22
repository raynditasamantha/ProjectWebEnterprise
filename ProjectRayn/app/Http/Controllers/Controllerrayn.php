<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Controllerrayn extends Controller
{
    public function TampilRayn()
    {
        $data = [
            'totalProducts' => 310,
            'salesToday'=> 110,
            'totalRevenue'=> 'Rp 50,000,000',
            'registeredUsers'=> 350
        ];
        return view('home',$data);
    }
}
