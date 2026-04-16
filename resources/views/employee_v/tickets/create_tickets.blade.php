@extends('layouts.dashboard')
@section('subtitle', 'Create Ticket Employee')
@section('title_dash', 'Create Ticket Employee')

@section('content')
    <div class="row">
        <div class="card">
            <div class="card-header">BUAT TIKET</div>
            <div class="card-body">
                <form action="{{ route('employee.ticket.create_p') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Upload Gambar --}}
                    <div class="mb-3">
                        <label class="form-label">Work Image</label>
                        <input type="file" name="work_image" class="form-control" accept="image/*" required>
                    </div>

                    {{-- Title --}}
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Masukkan judul tiket"
                            required>
                    </div>

                    {{-- Description --}}
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="desc" class="form-control" rows="4" placeholder="Masukkan deskripsi"></textarea>
                    </div>

                    {{-- Priority --}}
                    <div class="mb-3">
                        <label class="form-label">Priority</label>
                        <select name="priority" class="form-select" required>
                            <option value="">-- Pilih Priority --</option>
                            <option value="Low">Low</option>
                            <option value="Medium">Medium</option>
                            <option value="High">High</option>
                        </select>
                    </div>

                    {{-- Status --}}
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select" required>
                            <option value="Open">Open</option>
                            <option value="On Progress">On Progress</option>
                            <option value="Done">Done</option>
                        </select>
                    </div>

                    {{-- SLA --}}
                    <div class="mb-3">
                        <label class="form-label">Tanggal SLA</label>
                        <input type="datetime-local" name="tgl_sla" class="form-control" required>
                    </div>

                    {{-- Submit --}}
                    <button type="submit" class="btn btn-primary">Simpan Tiket</button>
                    <a href="{{ route('employee.ticket.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection
