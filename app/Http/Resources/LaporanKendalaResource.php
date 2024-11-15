<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LaporanKendalaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'pelapor' => $this->user->nama,
            'ruangan' => $this->ruangan->nama_ruang,
            'jenisKendala' => $this->jenis_kendala->nama_jenis_kendala,
            'bentukKendala' => $this->bentuk_kendala->nama_bentuk_kendala,
            'deskripsiKerusakan' => $this->deskripsi_kendala,
            'status' => $this->status
        ];
    }
}
