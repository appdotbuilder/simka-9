<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Agama
 *
 * @property int $id
 * @property string $kode
 * @property string $nama_agama
 * @property int $urut
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|Agama newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Agama newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Agama query()
 * @method static \Illuminate\Database\Eloquent\Builder|Agama whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agama whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agama whereKode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agama whereNamaAgama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agama whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agama whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agama whereUrut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agama aktif()

 * 
 * @mixin \Eloquent
 */
class Agama extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'agamas';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'kode',
        'nama_agama',
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