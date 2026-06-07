<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = \App\Models\MillingBooking::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('bookings.index', compact('bookings'));
    }

    public function create()
    {
        $machines = \App\Models\Machine::where('status', 'available')->get();
        return view('bookings.create', compact('machines'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'machine_id' => 'required|exists:machines,id',
            'quantity_kg' => 'required|numeric|min:10|max:10000',
            'notes' => 'nullable|string|max:500',
        ]);

        $booking = \App\Models\MillingBooking::create([
            'user_id' => Auth::id(),
            'machine_id' => $request->machine_id,
            'quantity_kg' => $request->quantity_kg,
            'status' => 'pending',
            'notes' => $request->notes,
        ]);

        // Create notification for admin
        \App\Models\Notification::create([
            'user_id' => 1, // Admin user ID
            'title' => 'New Booking Received',
            'message' => Auth::user()->name . ' booked ' . $request->quantity_kg . 'kg on Machine #' . $request->machine_id,
            'type' => 'info',
            'link_url' => route('admin.bookings'),
        ]);

        return redirect()->route('dashboard')->with('status', 'Booking submitted successfully! We will confirm shortly.');
    }
}