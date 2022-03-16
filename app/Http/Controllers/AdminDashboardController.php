<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource as UserResource;
use App\Http\Resources\TravelResource as TravelResource;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Repositories\UserRepository;
use App\Http\Repositories\TravelRepository;
class AdminDashboardController extends BaseController
{
    private $userRepository;
    private $travelRepository;
    public function __construct(UserRepository $userRepository, TravelRepository $travelRepository)
    {
        $this->userRepository = $userRepository;
        $this->travelRepository = $travelRepository;
    }

    public function index()
    {
        $users = $this->userRepository->all();
        return $this->sendResponse(UserResource::collection($users), 'succefully logged the necessary data!');
    }

    public function delete_user($id) 
    {
        $user = $this->userRepository->deleteById($id);
        if($user) {
            return $this->sendResponse(new UserResource($user), 'User deleted succefully');
        }else {
            return $this->sendError('User can not be found!');
        }
    }
    
    public function restore_user($id)
    {
        $user = $this->userRepository->restoreById($id);
        if($user) {
            return $this->sendResponse(new UserResource($user), 'User restored succefully');
        }else {
            return $this->sendError('User can not be found!');
        }
    }

    public function destory_user($id) 
    {
        $user = $this->userRepository->destoryById($id);
        if($user) {
            return $this->sendResponse(new UserResource($user), 'User permananly deleted succefully');
        }else {
            return $this->sendError('User can not be found!');
        }
    }


    public function travels()
    {
        $travels = $this->travelRepository->all();
        return $this->sendResponse(TravelResource::collection($travels), 'Travels succefully retreived!');
    }

    public function travel_create(Request $request)
    {
        $travel = $this->travelRepository->createByRequest($request);
        if($travel) {
            return $this->sendResponse(new TravelResource($travel), 'Succefully created the travel!');
        }else {
            return $this->sendError('Something went wrong!');
        }
    }

    public function travel_update(Request $request, $id)
    {
        
        $travel = $this->travelRepository->updateByRequest($request, $id);
        if($travel) {
            return $this->sendResponse(new TravelResource($travel), 'Travel succefully updated!');
        }else {
            return $this->sendError('Something went wrong!');
        }
    }

    public function travel_delete($id)
    {
        $travel = $this->travelRepository->deleteById($id);
        if($travel) {
            return $this->sendResponse(new TravelResource($travel), 'Travel succefully deleted!');
        }else {
            return $this->sendError('Something went wrong!');
        }
    }

}
