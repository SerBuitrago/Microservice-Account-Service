<?php

namespace App\Http\Controllers;

use App\Services\TutoringService;
use Illuminate\Http\Request;

class TutoringGatewayController extends Controller
{
    private $tutoringService;

    public function __construct(TutoringService $tutoringService){
        $this->tutoringService = $tutoringService;
    }

    public function index(){
    }

    /**
     * Tema
     */
    public function fetchReadTemaAll()
    {
        return $this->successResponse($this->tutoringService->fetchReadTemaAll());
    }

    public function fetchReadTemaNombre($name)
    {
        return $this->successResponse($this->tutoringService->fetchReadTemaNombre($name));
    }

    public function createTema(Request $request){
        return $this->successResponse($this->tutoringService->createTema($request->all()));
    }

    public function updateTema(Request $request)
    {
        return $this->successResponse($this->tutoringService->updateTema($request->all()));
    }

    public function deleteTema($id, $nombre)
    {
        return $this->successResponse($this->tutoringService->deleteTema($id, $nombre));
    }

    /**
     * Tutoria
     */
    public function fetchReadTutoriaNombre($name)
    {
        return $this->successResponse($this->tutoringService->fetchReadTutoriaNombre($name));
    }

    public function fetchReadTutoriaNotificacionesAll()
    {
        return $this->successResponse($this->tutoringService->fetchReadTutoriaNotificacionesAll());
    }

    public function fetchReadTutoriaAll()
    {
        return $this->successResponse($this->tutoringService->fetchReadTutoriaAll());
    }

    public function fetchReadTutoriaActivasAll()
    {
        return $this->successResponse($this->tutoringService->fetchReadTutoriaActivasAll());
    }

    public function fetchReadTutoriaTerminadasAll()
    {
        return $this->successResponse($this->tutoringService->fetchReadTutoriaTerminadasAll());
    }

    public function fetchTutoriaInscribirse($id, $idusuario)
    {
        return $this->successResponse($this->tutoringService->fetchTutoriaInscribirse($id, $idusuario));
    }

    public function createTutoria(Request $request){
        return $this->successResponse($this->tutoringService->createTutoria($request->all()));
    }

    public function updateTutoria(Request $request)
    {
        return $this->successResponse($this->tutoringService->updateTutoria($request->all()));
    }

    public function deleteTutoria($id, $nombre)
    {
        return $this->successResponse($this->tutoringService->deleteTutoria($id, $nombre));
    }

    /**
     * Usuario
     */
    public function createRol($id, $rol)
    {
        return $this->successResponse($this->tutoringService->createRol($id, $rol));
    }
}