<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserGatewayController extends Controller
{
    private $userService;

    public function __construct(UserService $userService){
        $this->userService = $userService;
    }

    public function index(){
        // TODO
    }

    /**
     * Student
     */
    public function fetchReadUserAll()
    {
        return $this->successResponse($this->userService->fetchReadUserAll());
    }

    public function logout()
    {
        return $this->successResponse($this->userService->logout());
    }

    public function createUser(Request $request){
        return $this->successResponse($this->userService->createStudent($request->all()));
    }

    public function createUserAdmin(Request $request){
        return $this->successResponse($this->userService->createStudentAdmin($request->all()));
    }

    public function forgotPassword(Request $request){
        return $this->successResponse($this->userService->forgotPassword($request->all()));
    }

    public function resetPassword(Request $request){
        return $this->successResponse($this->userService->resetPassword($request->all()));
    }

    public function findDetailUser(Request $request){
        return $this->successResponse($this->userService->findDetailUser($request->all()));
    }

    public function findDetailStudent(Request $request){
        return $this->successResponse($this->userService->findDetailStudent($request->all()));
    }

    public function login(Request $request){
        return $this->successResponse($this->userService->login($request->all()));
    }

    public function updateUser(Request $request, $user)
    {
        return $this->successResponse($this->userService->updateUser($user, $request->all()));
    }

    public function deleteStudent($user)
    {
        return $this->successResponse($this->userService->deleteStudent($user));
    }

    /**
     * Role
     */

    public function fetchReadRoleAll()
    {
        return $this->successResponse($this->userService->fetchReadRoleAll());
    }

    public function fetchReadRole(Request $request){
        return $this->successResponse($this->userService->fetchReadRole($request->all()));
    }

    public function createRole(Request $request){
        return $this->successResponse($this->userService->createRole($request->all()));
    }

    public function updateRole(Request $request)
    {
        return $this->successResponse($this->userService->updateRole($request->all()));
    }

    public function deleteRole($role)
    {
        return $this->successResponse($this->userService->deleteRole($role));
    }

    /**
     * Student and Role
     */

    public function createRoleUser(Request $request){
        return $this->successResponse($this->userService->createRoleUser($request->all()));
    }

    public function deleteRoleUser(Request $request)
    {
        return $this->successResponse($this->userService->deleteRoleUser($request->all()));
    }
}