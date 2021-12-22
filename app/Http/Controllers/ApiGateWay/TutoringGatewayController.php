<?php

namespace App\Http\Controllers\ApiGateWay;

use App\Http\Controllers\Controller;
use App\Services\TutoringService;
use Illuminate\Http\Request;

class TutoringGatewayController extends Controller
{
    private $tutoringService;

    public function __construct(TutoringService $tutoringService)
    {
        $this->tutoringService = $tutoringService;
    }

    /**
     * Temas
     */

    public function temaList()
    {
        try {
            return $this->successResponse($this->tutoringService->temaList());
        } catch (\Exception $error) {
            return response()->json(['response' => $error->getMessage()], 500);
        }
    }

    public function searchTemaByName($name)
    {
        try {
            return $this->successResponse($this->tutoringService->searchTemaByName($name));
        } catch (\Exception $error) {
            return response()->json(['response' => $error->getMessage()], 500);
        }
    }

    public function storeTema(Request $request)
    {
        $rules = [
            'id' => ['required'],
            'name' => ['required', 'string']
        ];
        $this->validate($request, $rules);
        try {
            return $this->successResponse($this->tutoringService->storeTema($request->all()));
        } catch (\Exception $error) {
            return response()->json(['response' => $error->getMessage()], 500);
        }
    }

    public function updateTema(Request $request)
    {
        $rules = [
            'id' => ['required'],
            'name' => ['required', 'string']
        ];
        $this->validate($request, $rules);
        try {
            return $this->successResponse($this->tutoringService->updateTema($request->all()));
        } catch (\Exception $error) {
            return response()->json(['response' => $error->getMessage()], 500);
        }
    }

    public function deleteTema($id, $nombre)
    {
        try {
            return $this->successResponse($this->tutoringService->deleteTema($id, $nombre));
        } catch (\Exception $error) {
            return response()->json(['response' => $error->getMessage()], 500);
        }
    }

    /**
     * Tutorias
     */

    public function searchTutoriaByNombre($name)
    {
        try {
            return $this->successResponse($this->tutoringService->searchTutoriaByNombre($name));
        } catch (\Exception $error) {
            return response()->json(['response' => $error->getMessage()], 500);
        }
    }

    public function tutoriaNotificationsAll()
    {
        try {
            return $this->successResponse($this->tutoringService->tutoriaNotificationsAll());
        } catch (\Exception $error) {
            return response()->json(['response' => $error->getMessage()], 500);
        }
    }

    public function tutoriaList()
    {
        try {
            return $this->successResponse($this->tutoringService->tutoriaList());
        } catch (\Exception $error) {
            return response()->json(['response' => $error->getMessage()], 500);
        }
    }

    public function activeTutoriaList()
    {
        try {
            return $this->successResponse($this->tutoringService->activeTutoriaList());
        } catch (\Exception $error) {
            return response()->json(['response' => $error->getMessage()], 500);
        }
    }

    public function finishedTutoriaList()
    {
        try {
            //code...
            return $this->successResponse($this->tutoringService->finishedTutoriaList());
        } catch (\Exception $th) {
            return response()->json(['response' => $th->getMessage()], 500);
        }
    }

    public function subscribeInTutoria($id, $idusuario)
    {
        try {
            //code...
            return $this->successResponse($this->tutoringService->subscribeInTutoria($id, $idusuario));
        } catch (\Exception $th) {
            return response()->json(['response' => $th->getMessage()], 500);
        }
    }

    public function storeTutoria(Request $request)
    {
        $rules = [
            'dateEnd' => ['required', 'date'],
            'dateStrat' => ['required', 'date'],
            'description' => ['required', 'string'],
            'id' => ['required', 'numeric'],
            'idcategory' => ['required', 'numeric'],
            'lissubjets' => ['required', 'array'],
            'reason' => ['required', 'string'],
            'state' => ['required', 'boolean'],
            'userCreator' => ['required', 'numeric'],
            'userTutor' => ['required', 'numeric'],
        ];

        $this->validate($request, $rules);
        try {
            //code...
            return $this->successResponse($this->tutoringService->createTutoria($request->all()));
        } catch (\Exception $th) {
            return response()->json(['response' => $th->getMessage()], 500);
        }
    }

    public function updateTutoria(Request $request)
    {
        try {
            //code...
            return $this->successResponse($this->tutoringService->updateTutoria($request->all()));
        } catch (\Exception $th) {
            return response()->json(['response' => $th->getMessage()], 500);
        }
    }

    public function deleteTutoria($id, $nombre)
    {
        try {
            return $this->successResponse($this->tutoringService->deleteTutoria($id, $nombre));
        } catch (\Exception $th) {
            return response()->json(['response' => $th->getMessage()], 500);
        }
    }

    /**
     * Usuarios
     */

    public function createRol($id, $rol)
    {
        try {
            return $this->successResponse($this->tutoringService->createRol($id, $rol));
        } catch (\Exception $th) {
            return response()->json(['response' => $th->getMessage()], 500);
        }
    }

    /**
     * Categorias
     */

    public function categoriaList()
    {
        try {
            return $this->successResponse($this->tutoringService->temaList());
        } catch (\Exception $error) {
            return response()->json(['response' => $error->getMessage()], 500);
        }
    }

    public function searchCategoriaByName($name)
    {
        try {
            return $this->successResponse($this->tutoringService->searchCategoriaByName($name));
        } catch (\Exception $error) {
            return response()->json(['response' => $error->getMessage()], 500);
        }
    }

    public function storeCategoria(Request $request)
    {
        $rules = [
            'id' => ['required'],
            'name' => ['required', 'string']
        ];
        $this->validate($request, $rules);
        try {
            return $this->successResponse($this->tutoringService->storeTema($request->all()));
        } catch (\Exception $error) {
            return response()->json(['response' => $error->getMessage()], 500);
        }
    }

    public function updateCategoria(Request $request)
    {
        $rules = [
            'id' => ['required'],
            'name' => ['required', 'string']
        ];
        $this->validate($request, $rules);
        try {
            return $this->successResponse($this->tutoringService->updateTema($request->all()));
        } catch (\Exception $error) {
            return response()->json(['response' => $error->getMessage()], 500);
        }
    }

    public function deleteCategoria($id, $nombre)
    {
        try {
            return $this->successResponse($this->tutoringService->deleteTema($id, $nombre));
        } catch (\Exception $error) {
            return response()->json(['response' => $error->getMessage()], 500);
        }
    }
}
