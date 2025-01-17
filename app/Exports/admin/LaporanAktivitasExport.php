<?php

namespace App\Exports\admin;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class LaporanAktivitasExport implements FromCollection, WithHeadings
{
    protected $activities;

    public function __construct(Collection $activities)
    {
        $this->activities = $activities;
    }

    public function collection()
    {
        return $this->activities->map(function ($activity) {
            return [
                'Tanggal' => $activity->created_at->format('d-m-Y H:i:s'),
                'Nama User' => $activity->user->name ?? 'Unknown User',
                'Role' => $this->getRoleName($activity->user->role),
                'Aktivitas' => $activity->log,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Tanggal',
            'Nama User',
            'Role',
            'Aktivitas',
        ];
    }

    private function getRoleName($role)
    {
        switch ($role) {
            case 'admin':
                return 'Admin';
            case 'manajer_gudang':
                return 'Manajer Gudang';
            case 'staff_gudang':
                return 'Staff Gudang';
            default:
                return $role;
        }
    }
}
