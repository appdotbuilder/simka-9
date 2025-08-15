<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUnitKerjaRequest;
use App\Http\Requests\UpdateUnitKerjaRequest;
use App\Models\UnitKerja;
use Inertia\Inertia;

class UnitKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $unit_kerjas = UnitKerja::orderBy('urut', 'asc')->orderBy('nama_unit', 'asc')->paginate(10);
        
        return Inertia::render('unit-kerja/index', [
            'unit_kerjas' => $unit_kerjas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('unit-kerja/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUnitKerjaRequest $request)
    {
        $unit_kerja = UnitKerja::create($request->validated());

        return redirect()->route('unit-kerja.index')
            ->with('success', 'Data unit kerja berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(UnitKerja $unit_kerja)
    {
        $unit_kerja->load('jabatans');
        
        return Inertia::render('unit-kerja/show', [
            'unit_kerja' => $unit_kerja
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UnitKerja $unit_kerja)
    {
        return Inertia::render('unit-kerja/edit', [
            'unit_kerja' => $unit_kerja
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUnitKerjaRequest $request, UnitKerja $unit_kerja)
    {
        $unit_kerja->update($request->validated());

        return redirect()->route('unit-kerja.index')
            ->with('success', 'Data unit kerja berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UnitKerja $unit_kerja)
    {
        $unit_kerja->delete();

        return redirect()->route('unit-kerja.index')
            ->with('success', 'Data unit kerja berhasil dihapus.');
    }
}