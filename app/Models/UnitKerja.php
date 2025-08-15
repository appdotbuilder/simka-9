<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\UnitKerja
 *
 * @property int $id
 * @property string $kode
 * @property string $nama_unit
 * @property int $urut
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Jabatan> $jabatans
 * @property-read int|null $jabatans_count
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|UnitKerja newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UnitKerja newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UnitKerja query()
 * @method static \Illuminate\Database\Eloquent\Builder|UnitKerja whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UnitKerja whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UnitKerja whereKode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UnitKerja whereNamaUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UnitKerja whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UnitKerja whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UnitKerja whereUrut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UnitKerja aktif()

 * 
 * @mixin \Eloquent
 */
class UnitKerja extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'unit_kerjas';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'kode',
        'nama_unit',
        'urut',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'urut' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the jabatans for the unit kerja.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jabatans(): HasMany
    {
        return $this->hasMany(Jabatan::class, 'kode_unit_kerja', 'kode');
    }

    /**
     * Scope a query to only include active records.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAktif($query)
    {
        return $query->where('status', 'aktif');
    }
}