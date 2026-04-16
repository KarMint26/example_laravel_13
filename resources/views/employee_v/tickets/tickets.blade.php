@extends('layouts.dashboard')
@section('subtitle', 'Create Ticket Employee')
@section('title_dash', 'Create Ticket Employee')

@section('content')
    <div class="row">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>DAFTAR TIKET</h3>
                <a class="btn btn-primary" href="{{ route('employee.ticket.create_g') }}">
                    <i class="fas fa-plus"></i>
                    Buat Tiket
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="tickets" class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Gambar</th>
                                <th class="text-center">Judul</th>
                                <th class="text-center">Deskripsi</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Prioritas</th>
                                <th class="text-center">Teknisi</th>
                                <th class="text-center">Tgl. Selesai</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ticket_list as $ticket)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">
                                        <img class="w-50"
                                            src="{{ str_contains($ticket->work_image, 'work_image') ? asset('storage/' . $ticket->work_image) : $ticket->work_image }}">
                                    </td>
                                    <td class="text-center">{{ $ticket->title }}</td>
                                    <td class="text-center">{{ $ticket->desc }}</td>
                                    <td class="text-center">
                                        <div
                                            class="badge bg-{{ $ticket->status == 'Done' ? 'success' : ($ticket->status == 'On Progress' ? 'primary' : 'warning') }}">
                                            {{ $ticket->status }}</div>
                                    </td>
                                    <td class="text-center">
                                        <div
                                            class="badge bg-{{ $ticket->priority == 'High' ? 'danger' : ($ticket->priority == 'Medium' ? 'warning' : 'success') }}">
                                            {{ $ticket->priority }}</div>
                                    </td>
                                    <td class="text-center">
                                        @if ($ticket->engineer_id != null)
                                            {{ $ticket->engineer->name }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $ticket->tgl_sla }}</td>
                                    <td class="d-flex justify-content-center align-items-center gap-2">
                                        <a href="{{ route('employee.ticket.edit_g', $ticket->id) }}"
                                            class="btn btn-warning">
                                            Edit
                                        </a>
                                        <form action="{{ route('employee.ticket.delete', $ticket->id) }}" method="post">
                                            @csrf
                                            <button class="btn btn-danger" type="submit">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_script')
    <script>
        new DataTable('#tickets');
    </script>
@endsection
