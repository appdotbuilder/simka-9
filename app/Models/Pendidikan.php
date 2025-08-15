<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Pendidikan
 *
 * @property int $id
 * @property string $kode
 * @property string $nama_pendidikan
 * @property int $urut
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|Pendidikan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pendidikan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pendidikan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pendidikan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pendidikan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pendidikan whereKode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pendidikan whereNamaPendidikan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pendidikan whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pendidikan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pendidikan whereUrut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pendidikan aktif()

 * 
 * @mixin \Eloquent
 */
class Pendidikan extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pendidikans';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'kode',
        'nama_pendidikan',
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