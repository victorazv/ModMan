<?php

namespace Modman\Api\V1\Controllers;

use Modman\Api\V1\Controllers\ApiController;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Modman\Api\V1\Models\Client_system;

class Client_systemController extends ApiController {

    public function index() {
        $client_system = DB::table('client_systems')
            ->select('clients.name AS client', 'systems.name AS system', 'client_systems.id')
            ->join('clients', 'client_systems.id_client', '=', 'clients.id')
            ->join('systems', 'client_systems.id_system', '=', 'systems.id')
            ->orderBy('clients.name', 'asc')
            ->get();//Passar para o model
        return response()->json($client_system, 200);
    }

    public function show(Client_system $client_system){
        return $this->respond($client_system);
    }

    public function store(Request $request){
        $client_system = Client_system::create($request->all());
        return $this->respondCreated($client_system);
    }

    public function destroy(Client_system $client_system){
        $client_system->delete();
        return $this->respondDeleted();
    }

    public function update(Client_system $client_system, Request $request){
        $client_system->update($request->all());
        return $this->respondUpdated($client_system);
    }

}