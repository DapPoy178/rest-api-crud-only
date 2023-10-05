<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $available = Item::where('status', 'available')->count();
        $inUse = Item::where('status', 'In Use')->count();
        $total = Item::count();
        $user = User::count();
        return response()->json([
            'status' => true,
            'message' => 'data found',
            'user' => $user,
            'available' => $available,
            'inUse' => $inUse,
            'item' => $total,
        ], 200);
    }
}
