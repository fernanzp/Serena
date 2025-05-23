<?php

namespace models;

class Usuario extends Model {
    protected $table;
    protected $fillable = [
        'nombre',
        'correo',
        'contraseña',
        'rol'
    ];

    public function __construct() {
        parent::__construct();
        $this->table = 'usuarios'; // Nombre real de tu tabla
    }

    public $values = [];

    // Crear nuevo usuario (para cuando implementes registro)
    public function nuevoUsuario($data = []) {
        $this->values = [
            $data['nombre'],
            $data['correo'],
            password_hash($data['contraseña'], PASSWORD_DEFAULT), // Seguridad
            $data['rol'] ?? 'psicologo' // Rol por defecto si no se especifica
        ];
        return $this->create();
    }
}
