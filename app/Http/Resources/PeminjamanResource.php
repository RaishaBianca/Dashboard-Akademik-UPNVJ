<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PeminjamanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'tanggal' => Carbon::parse($this->tgl_pinjam)->format('d/m/Y'),
            'nama' => $this->user->nama,
            'nim' => $this->user->id_user,
            'lab' => $this->ruangan->nama_ruang,
            'keterangan' => $this->keterangan,
            'konfirmasi' => $this->status
        ];
    }
}
