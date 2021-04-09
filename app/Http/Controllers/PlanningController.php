<?php

namespace App\Http\Controllers;

use App\Repositories\Agents\AgentsRepositoryInterface;
use Illuminate\Http\Request;

class PlanningController extends Controller
{
    protected $data = [];
    protected $view = 'planning';

    public function __construct(AgentsRepositoryInterface $repo){
        $this->repo = $repo;

    }

    public function index(Request $request)
    {
        return view($this->view.'.index');
    }
}
