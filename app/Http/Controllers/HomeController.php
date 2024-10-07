<?php

namespace App\Http\Controllers;

use App\Models\Travel;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $travelController;
    protected $userController;

    public function __construct(TravelController $travelController, UserController $userController)
    {
        $this->travelController = $travelController;
        $this->userController = $userController;
    }

    public function index()

    {
        $userData = $this->userController->index();
        $travelData = $this->travelController->getPublicTravelsData();
        $months = $this->travelController->getMonths();

        return view('welcome', ['createdTravels' => $travelData['count'], 'registeredUsers' => $userData['count'], 'allTravels' => $travelData['travels'], 'allUsers' => $userData['users'], 'months' => $months]);
    }
}
