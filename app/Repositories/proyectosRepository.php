<?php

namespace App\Repositories;

use App\Models\proyectos;
use App\Repositories\BaseRepository;

/**
 * Class proyectosRepository
 * @package App\Repositories
 * @version July 6, 2020, 5:50 pm UTC
*/

class proyectosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'nombre_corto',
        'direccion',
        'geolocalizacion',
        'rfc',
        'cp',
        'municipio',
        'estado',
        'pais',
        'correo_due o',
        'telefono',
        'arquitecto_correo',
        'tel_arq',
        'comprador_correo',
        'tel_comprador',
        'tipo',
        'comentarios',
        'estatus'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return proyectos::class;
    }
}
