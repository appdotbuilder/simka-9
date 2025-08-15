<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJabatanRequest;
use App\Http\Requests\UpdateJabatanRequest;
use App\Models\Jabatan;
use App\Models\UnitKerja;
use Inertia\Inertia;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jabatans = Jabatan::with('unitKerja')->orderBy('urut', 'asc')->orderBy('nama_jabatan', 'asc')->paginate(10);
        
        return Inertia::render('jabatan/index', [
            'jabatans' => $jabatans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unit_kerjas = UnitKerja::aktif()->orderBy('urut', 'asc')->orderBy('nama_unit', 'asc')->get(['kode', 'nama_unit']);
        
        return Inertia::render('jabatan/create', [
            'unit_kerjas' => $unit_kerjas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJabatanRequest $request)
    {
        $jabatan = Jabatan::create($request->validated());

        return redirect()->route('jabatan.index')
            ->with('success', 'Data jabatan berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jabatan $jabatan)
    {
        $jabatan->load('unitKerja');
        
        return Inertia::render('jabatan/show', [
            'jabatan' => $jabatan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jabatan $jabatan)
    {
        $unit_kerjas = UnitKerja::aktif()->orderBy('urut', 'asc')->orderBy('nama_unit', 'asc')->get(['kode', 'nama_unit']);
        
        return Inertia::render('jabatan/edit', [
            'jabatan' => $jabatan,
            'unit_kerjas' => $unit_kerjas
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJabatanRequest $request, Jabatan $jabatan)
    {
        $jabatan->update($request->validated());

        return redirect()->route('jabatan.index')
            ->with('success', 'Data jabatan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jabatan $jabatan)
    {
        $jabatan->delete();

        return redirect()->route('jabatan.index')
            ->with('success', 'Data jabatan berhasil dihapus.');
    }
}