<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListContact;
use App\Models\Messages;

class DashboardController extends Controller
{
    public function index()
    {
        $data['nomor_tersimpan_count'] = ListContact::count();
        $data['send_msg'] = Messages::find(1)->count;
        return view('dashboard', compact('data'));
    }
}
