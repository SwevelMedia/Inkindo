<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class AnggotaExcelImport implements ToCollection, WithHeadingRow, WithValidation, SkipsOnError,
SkipsOnFailure,WithChunkReading, ShouldQueue
{
    use Importable, SkipsErrors;
    public function collection(Collection $rows)
    {
        // dd($row8ps);
        foreach ($rows as $key) {
            $anggota = User::Create([
                'name' => $key['nama_direktur'],
                'email' => $key['email'],
                'role' => 'anggota',
                'password' => bcrypt('123456789'),
            ]);

            $anggota->anggota()->create([
                'no_anggota' => $key['nokta'],
                'perusahaan' => $key['nama_badan_usaha'],
                'penanggung_jawab' => $key['nama_direktur'],
                'alamat' => $key['alamat'],
                'no_telp' => $key['notelp'],
                'no_hp' => $key['nowa'],
                'alamat_kabupaten' => $key['alamat_kabupaten'],
                'user_id' => $anggota->id,
            ]);
        }

        return redirect()
            ->back()
            ->with('success', 'Data Anggota berhasil ditambahkan');
    }

    public function rules(): array
    {
        return [
            '*.email' => ['email' => 'required', 'unique:users,email'],
            '*.nama_direktur' => ['nama_direktur' => 'required'],
        ];
    }

    public function onFailure(Failure ...$failures)
    {
        return redirect()
            ->back()
            ->with('error', 'Terdapat beberapa data yang gagal ditambahkan');
    }

     public function chunkSize(): int
     {
     return 100;
     }
}
