@extends('layouts.dashboard')
@section('subtitle', 'Edit Ticket Employee')
@section('title_dash', 'Edit Ticket Employee')

@section('content')
    <div class="row">
        <div class="card">
            <div class="card-header">BUAT TIKET</div>
            <div class="card-body">
                <form action="{{ route('employee.ticket.edit_p', $ticket->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Preview Gambar Lama --}}
                    <div class="mb-3">
                        <label class="form-label">Current Image</label><br>
                        <img src="{{ asset('storage/' . $ticket->work_image) }}" width="120" class="mb-2">
                    </div>

                    {{-- Upload Gambar Baru --}}
                    <div class="mb-3">
                        <label class="form-label">Ganti Gambar (Opsional)</label>
                        <input type="file" name="work_image" class="form-control" accept="image/*">
                    </div>

                    {{-- Title --}}
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" value="{{ $ticket->title }}" class="form-control" required>
                    </div>

                    {{-- Description --}}
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="desc" class="form-control" rows="4">{{ $ticket->desc }}</textarea>
                    </div>

                    {{-- Priority --}}
                    <div class="mb-3">
                        <label class="form-label">Priority</label>
                        <select name="priority" class="form-select">
                            <option {{ $ticket->priority == 'Low' ? 'selected' : '' }}>Low</option>
                            <option {{ $ticket->priority == 'Medium' ? 'selected' : '' }}>Medium</option>
                            <option {{ $ticket->priority == 'High' ? 'selected' : '' }}>High</option>
                        </select>
                    </div>

                    {{-- Status --}}
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option {{ $ticket->status == 'Open' ? 'selected' : '' }}>Open</option>
                            <option {{ $ticket->status == 'On Progress' ? 'selected' : '' }}>On Progress</option>
                            <option {{ $ticket->status == 'Done' ? 'selected' : '' }}>Done</option>
                        </select>
                    </div>

                    {{-- SLA --}}
                    <div class="mb-3">
                        <label class="form-label">Tanggal SLA</label>
                        <input type="datetime-local" name="tgl_sla"
                            value="{{ \Carbon\Carbon::parse($ticket->tgl_sla)->format('Y-m-d\TH:i') }}"
                            class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Update Tiket</button>
                    <a href="{{ route('employee.ticket.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection
