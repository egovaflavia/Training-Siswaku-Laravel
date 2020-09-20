<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RahasiaController extends Controller
{
    public function halamanRahasia()
    {
        return 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid, veniam laudantium! Veritatis maiores quas quo rem. Itaque a quo quos amet nemo. Quasi blanditiis neque molestiae totam sequi enim aut.';
    }

    public function showMeSecret()
    {
        return redirect()->route('secret');
    }
}
