<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePendidikanRequest;
use App\Http\Requests\UpdatePendidikanRequest;
use App\Models\Pendidikan;
use Inertia\Inertia;

class PendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pendidikans = Pendidikan::orderBy('urut', 'asc')->orderBy('nama_pendidikan', 'asc')->paginate(10);
        
        return Inertia::render('pendidikan/index', [
            'pendidikans' => $pendidikans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('pendidikan/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePendidikanRequest $request)
    {
        $pendidikan = Pendidikan::create($request->validated());

        return redirect()->route('pendidikan.index')
            ->with('success', 'Data pendidikan berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pendidikan $pendidikan)
    {
        return Inertia::render('pendidikan/show', [
            'pendidikan' => $pendidikan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pendidikan $pendidikan)
    {
        return Inertia::render('pendidikan/edit', [
            'pendidikan' => $pendidikan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePendidikanRequest $request, Pendidikan $pendidikan)
    {
        $pendidikan->update($request->validated());

        return redirect()->route('pendidikan.index')
            ->with('success', 'Data pendidikan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pendidikan $pendidikan)
    {
        $pendidikan->delete();

        return redirect()->route('pendidikan.index')
            ->with('success', 'Data pendidikan berhasil dihapus.');
    }
}