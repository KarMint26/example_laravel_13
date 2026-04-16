<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TicketController extends Controller
{
    public function index(Request $request)
    {
        $ticket_list = Ticket::latest()->get();
        return view('employee_v.tickets.tickets', compact('ticket_list'));
    }

    public function create_g(Request $request)
    {
        return view('employee_v.tickets.create_tickets');
    }

    public function create_p(Request $request)
    {
        $request->validate([
            'work_image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'title' => 'required|string|max:255',
            'desc' => 'nullable|string',
            'status' => 'required|string',
            'priority' => 'required|string',
            'tgl_sla' => 'required|date',
        ]);

        // Upload gambar ke storage/app/public/work_image
        $imagePath = $request->file('work_image')->store('work_image', 'public');

        Ticket::create([
            'work_image' => $imagePath,
            'title' => $request->title,
            'desc' => $request->desc,
            'status' => $request->status,
            'priority' => $request->priority,
            'tgl_sla' => $request->tgl_sla,
            'employee_id' => auth()->id(),
            'engineer_id' => null,
        ]);

        return redirect()->route('employee.ticket.index')->with('success', 'Tiket berhasil dibuat');
    }

    public function edit_g($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('employee_v.tickets.edit_tickets', compact('ticket'));
    }

    public function edit_p(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);

        $request->validate([
            'work_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'title' => 'required|string|max:255',
            'desc' => 'nullable|string',
            'status' => 'required|string',
            'priority' => 'required|string',
            'tgl_sla' => 'required|date',
        ]);

        // Jika upload gambar baru
        if ($request->hasFile('work_image')) {
            // Hapus gambar lama
            if ($ticket->work_image && Storage::disk('public')->exists($ticket->work_image)) {
                Storage::disk('public')->delete($ticket->work_image);
            }

            // Upload baru
            $imagePath = $request->file('work_image')->store('work_image', 'public');
            $ticket->work_image = $imagePath;
        }

        $ticket->update([
            'title' => $request->title,
            'desc' => $request->desc,
            'status' => $request->status,
            'priority' => $request->priority,
            'tgl_sla' => $request->tgl_sla,
        ]);

        return redirect()->route('employee.ticket.index')->with('success', 'Tiket berhasil diupdate');
    }

    public function delete(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);

        // Hapus gambar
        if ($ticket->work_image && Storage::disk('public')->exists($ticket->work_image)) {
            Storage::disk('public')->delete($ticket->work_image);
        }

        $ticket->delete();

        return redirect()->route('employee.ticket.index')->with('success', 'Tiket berhasil dihapus');
    }
}
