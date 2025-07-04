<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
            public function admindashboard()
    {
        $jumlahPending = \App\Models\Pengajuan::where('status', 'pending')->count();
        $jumlahAccepted = \App\Models\Pengajuan::where('status', 'accepted')->count();
        $jumlahRejected = \App\Models\Pengajuan::where('status', 'rejected')->count();

        return view('admin.homeadmin', compact('jumlahPending', 'jumlahAccepted', 'jumlahRejected'));
    }

    

}
