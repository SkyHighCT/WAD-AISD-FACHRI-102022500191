<?php

namespace App\Http\Controllers;

use App\Models\Penghuni;
use Illuminate\Http\Request;

class PenghuniController extends Controller
{
    private array $daftarKamar = ['A-01', 'A-02', 'A-04', 'A-05', 'B-02', 'B-03', 'B-04'];

    private function rules(): array
    {
        return [
            'nama'           => 'required|string|max:100',
            'no_ktp'         => 'required|digits_between:1,20',
            'pekerjaan'      => 'required|string|max:50',
            'no_kamar'       => 'required|in:' . implode(',', $this->daftarKamar),
            'kontak_darurat' => 'required|string|max:100',
        ];
    }

    private function messages(): array
    {
        return [
            'nama.required'           => 'Nama wajib diisi',
            'no_ktp.required'         => 'No. KTP wajib diisi',
            'no_ktp.digits_between'   => 'No. KTP hanya boleh angka',
            'pekerjaan.required'      => 'Pekerjaan wajib diisi',
            'no_kamar.required'       => 'Pilih No. Kamar',
            'no_kamar.in'             => 'No. Kamar tidak valid',
            'kontak_darurat.required' => 'Kontak darurat wajib diisi',
        ];
    }

    // READ: daftar penghuni
    public function index()
    {
        $penghuni = Penghuni::orderBy('id')->get();
        return view('penghuni.index', compact('penghuni'));
    }

    // CREATE: tampilkan form kosong
    public function create()
    {
        return view('penghuni.form', ['daftarKamar' => $this->daftarKamar]);
    }

    // CREATE: simpan ke database
    public function store(Request $request)
    {
        $data = $request->validate($this->rules(), $this->messages());
        Penghuni::create($data);

        return redirect()->route('penghuni.index')
            ->with('success', 'Data penghuni berhasil ditambahkan.');
    }

    // UPDATE: tampilkan form terisi
    public function edit(Penghuni $penghuni)
    {
        return view('penghuni.form', [
            'penghuni'    => $penghuni,
            'daftarKamar' => $this->daftarKamar,
        ]);
    }

    // UPDATE: simpan perubahan
    public function update(Request $request, Penghuni $penghuni)
    {
        $data = $request->validate($this->rules(), $this->messages());
        $penghuni->update($data);

        return redirect()->route('penghuni.index')
            ->with('success', 'Data penghuni berhasil diperbarui.');
    }

    // DELETE
    public function destroy(Penghuni $penghuni)
    {
        $penghuni->delete();

        return redirect()->route('penghuni.index')
            ->with('success', 'Data penghuni berhasil dihapus.');
    }
}
