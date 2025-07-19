<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\User;


class OrderController extends Controller
{

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();

        $token = $user->createToken('auth_token')->plainTextToken;
        // Auth::login($user);

        return response()->json([
            'status' => true,
            'message' => "login success",
            'data' => [
                'token' => $token,
                'data' => $user

            ]
        ]);
    }
    //
    public function index()
    {

        $orders = Order::whereIn('status', ['Accept', 'Packed'])
            ->whereNotIn('status', ['Delivered'])
            ->whereNotIn('assigned_status', ['Accept', 'Reached Pickup', 'Picked Order', 'Reached Dropoff', 'Delivered'])

            ->where(function ($query) {
                $query->whereNull('assigned_status')
                    ->orWhere('assigned_status', 'Pending');
            })

            ->where(function ($query) {

                $query->whereNull('assigned_at')
                    ->orWhere('assigned_at', '<=', Carbon::now()->subMinutes(1));
            })

            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'pending order Received successfully',
            'data' => $orders
        ], 201);

    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'status' => 'nullable|string',
            'assigned_status' => 'nullable|string',
            'assigned_at' => 'nullable|date',
        ]);

        $created = Order::create($validated);
        return response()->json([
            'success' => true,
            'message' => 'order created successfully',
            'data' => $created
        ], 201);
    }

    public function completeOrder()
    {
        $completeOrder = Order::where('status', 'Delivered')->get();

        return response()->json([
            'success' => true,
            'message' => 'All Completed Order',
            'data' => $completeOrder
        ]);
    }

    public function getdatabyuserid($id)
    {
        $users = Order::where('user_id', $id)->get();

        return response()->json([
            'success' => true,
            'message' => 'All Completed Order',
            'data' => $users
        ]);
    }

    public function destroy($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        $order->delete();

        return response()->json(['message' => 'Order deleted successfully']);
    }
}