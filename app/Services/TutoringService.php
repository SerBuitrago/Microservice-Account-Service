<?php

namespace App\Services;

use App\Traits\RequestService;

class TutoringService
{
    use RequestService;

    public $baseUri;
    public $token;

    public function __construct()
    {
        $this->baseUri = config('services.microservices.tutoring.base_uri');
        $this->token = config('services.microservices.tutoring.base_uri.token');
    }

    /**
     * Tema
     */
    public function fetchReadTemaAll()
    {
        return $this->request('GET', '/tema/list');
    }

    public function fetchReadTemaNombre($nombre){
        return $this->request('GET', "/tema/busquedaNombre/{$nombre}");
    }

    public function createTema($data)
    {
        return $this->request('POST', '/tema/save', $data);
    }

    public function updateTema($data)
    {
        return $this->request('PUT', "/tema", $data);
    }

    public function deleteTema($id, $nombre)
    {
        return $this->request('DELETE', "/tema/{$id}/{$nombre}");
    }

    /**
     * Tutoria
     */
    public function fetchReadTutoriaNombre($nombre){
        return $this->request('GET', "/tutoria/busquedaNombre/{$nombre}");
    }

    public function fetchReadTutoriaNotificacionesAll()
    {
        return $this->request('GET', '/tutoria/notificacionesall');
    }

    public function fetchReadTutoriaAll()
    {
        return $this->request('GET', '/tutoria/list');
    }

    public function fetchReadTutoriaActivasAll()
    {
        return $this->request('GET', '/tutoria/activas');
    }

    public function fetchReadTutoriaTerminadasAll()
    {
        return $this->request('GET', '/tutoria/terminadas');
    }

    public function fetchTutoriaInscribirse($id, $idusuario){
        return $this->request('GET', "/tutoria/inscribirse/{$id}/{$idusuario}");
    }

    public function createTutoria($data)
    {
        return $this->request('POST', '/tutoria/save', $data);
    }

    public function updateTutoria($data)
    {
        return $this->request('PUT', "/tutoria", $data);
    }

    public function deleteTutoria($id, $nombre)
    {
        return $this->request('DELETE', "/tutoria/{$id}/{$nombre}");
    }

    /**
     * Usuario
     */
    public function createRol($id, $rol)
    {
        return $this->request('POST', "/usuario/{$id}/rol/{$rol}");
    }
}