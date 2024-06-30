<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Agenda;
use App\Models\Anggota;
use App\Models\ProgramKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\DashboardRepository;

class DashboardController extends Controller
{
    private $dashboardRepository;
    public function __construct(DashboardRepository $dashboardRepo)
    {
        $this->dashboardRepository = $dashboardRepo;
        $this->middleware('auth');
    }

    public function index()
    {
        return view('dashboard.anggota.dashboard-anggota');
    }

    public function admin()
    {
        $user = User::count();
        $anggota = Anggota::count();
        $agenda = Agenda::count();
        // $programKerja = ProgramKerja::count();
        return view('dashboard.admin.dashboard-admin', compact('user', 'anggota', 'agenda'));
    }
}
