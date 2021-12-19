<?php

namespace App\Services;

use App\Traits\RequestService;

class UserService
{
    use RequestService;

    public $baseUri;
    public $token;

    public function __construct()
    {
        $this->baseUri = config('services.microservices.user.base_uri');
        $this->token = config('services.microservices.user.base_uri.token');
    }

    /**
     * Student
     */
    public function fetchReadUserAll()
    {
        return $this->request('GET', '/student');
    }

    public function logout()
    {
        return $this->request('GET', '/logout');
    }

    public function createStudent($data)
    {
        return $this->request('POST', '/student/register', $data);
    }

    public function createStudentAdmin($data)
    {
        return $this->request('POST', '/student/admin/register', $data);
    }

    public function forgotPassword($data)
    {
        return $this->request('POST', '/send/password', $data);
    }

    public function resetPassword($data)
    {
        return $this->request('POST', '/reset/password', $data);
    }

    public function findDetailUser($data)
    {
        return $this->request('POST', '/user/show', $data);
    }

    public function findDetailStudent($data)
    {
        return $this->request('POST', '/student/show', $data);
    }

    public function login($data)
    {
        return $this->request('POST', '/login/google', $data);
    }

    public function updateUser($id, $data)
    {
        return $this->request('PUT', "/student/admin/edit/{$id}", $data);
    }

    public function deleteStudent($id)
    {
        return $this->request('DELETE', "/student/admin/delete/{$id}");
    }

    /**
     * Role
     */
    public function fetchReadRoleAll()
    {
        return $this->request('GET', '/rol/list');
    }

    public function fetchReadRole($data)
    {
        return $this->request('GET', "/rol/show", $data);
    }

    public function createRole($data)
    {
        return $this->request('POST', '/rol/register', $data);
    }

    public function updateRole($data)
    {
        return $this->request('PUT', "/rol/update", $data);
    }

    public function deleteRole($id)
    {
        return $this->request('DELETE', "/rol/delete/{$id}");
    }

    /**
     * Student and Role
     */
    public function createRoleUser($data)
    {
        return $this->request('POST', '/student/rol/add', $data);
    }

    public function deleteRoleUser($data)
    {
        return $this->request('DELETE', "/student/rol/delete", $data);
    }
}