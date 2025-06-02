<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ActivityLogController extends Controller
{
    public function index()
    {
        logActivity('Admin mengakses halaman Depend/Extensions');
        return view('securelogger.extensions');
    }
}
