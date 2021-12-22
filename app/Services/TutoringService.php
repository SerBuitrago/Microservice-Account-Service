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
    public function temaList()
    {
        return $this->request('GET', $this->baseUri . '/tutoriaServicio/tema/list');
    }

    public function searchByName($nombre)
    {
        return $this->request('GET', $this->baseUri . "/tutoriaServicio/tema/busquedaNombre/{$nombre}");
    }

    public function storeTema($data)
    {
        return $this->request('POST', $this->baseUri . '/tutoriaServicio/tema/save', $data);
    }

    public function updateTema($data)
    {
        return $this->request('PUT', $this->baseUri . "/tutoriaServicio/tema", $data);
    }

    public function deleteTema($id, $nombre)
    {
        return $this->request('DELETE', $this->baseUri . "/tutoriaServicio/tema/{$id}/{$nombre}");
    }

    /**
     * Tutoria
     */
    public function searchTutoriaByNombre($nombre)
    {
        return $this->request('GET', $this->baseUri . "/tutoriaServicio/tutoria/busquedaNombre/{$nombre}");
    }

    public function tutoriaNotificationsAll()
    {
        return $this->request('GET', $this->baseUri . '/tutoriaServicio/tutoria/notificacionesall');
    }

    public function tutoriaList()
    {
        return $this->request('GET', $this->baseUri . '/tutoriaServicio/tutoria/list');
    }

    public function activeTutoriaList()
    {
        return $this->request('GET', $this->baseUri . '/tutoriaServicio/tutoria/activas');
    }

    public function finishedTutoriaList()
    {
        return $this->request('GET', $this->baseUri . '/tutoriaServicio/tutoria/terminadas');
    }

    public function subscribeInTutoria($id, $idusuario)
    {
        return $this->request('GET', $this->baseUri . "/tutoriaServicio/tutoria/inscribirse/{$id}/{$idusuario}");
    }

    public function createTutoria($data)
    {
        return $this->request('POST', $this->baseUri . '/tutoriaServicio/tutoria/save', $data);
    }

    public function updateTutoria($data)
    {
        return $this->request('PUT', $this->baseUri . "/tutoriaServicio/tutoria", $data);
    }

    public function deleteTutoria($id, $nombre)
    {
        return $this->request('DELETE', $this->baseUri . "/tutoriaServicio/tutoria/{$id}/{$nombre}");
    }

    /**
     * Usuario
     */
    public function createRol($id, $rol)
    {
        return $this->request('POST', $this->baseUri . "/usuario/{$id}/rol/{$rol}");
    }
}
