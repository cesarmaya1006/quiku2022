<?php

namespace App\Models\SolicitudesDocInfo;

use App\Models\Empresas\Empresa;
use App\Models\Personas\Persona;
use App\Models\Empleados\Empleado;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\SolicitudesDocInfo\SolicitudDocInfoAnexo;
use App\Models\SolicitudesDocInfo\SolicitudDocInfoPeticion;

class SolicitudDocInfo extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'solicitudDocInfo';
    protected $guarded = [];

    //----------------------------------------------------------------------------------
    public function persona()
    {
        return $this->belongsTo(Persona::class, 'persona_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function peticiones()
    {
        return $this->hasMany(SolicitudDocInfoPeticion::class, 'solicitudDocInfoPeticion_id', 'id');
    }

}