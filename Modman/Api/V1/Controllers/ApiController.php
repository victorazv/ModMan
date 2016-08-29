<?php 

namespace Modman\Api\V1\Controllers;

use App\Http\Controllers\Controller;

class ApiController extends Controller {

    protected $statusCode = 200;

    public function respond($data = [] ) {
        return response()->json($data, $this->statusCode);
    }

    public function respondCreated($data){
        return $this->setStatusCode(201)->respond($data);
    }

    public function setStatusCode($code){
        $this->statusCode = $code;
        return $this;
    }

    public function respondDeleted(){
        return $this->setStatusCode(204)->respond();
    }

    public function respondUpdated($data){
        return $this->setStatusCode(200)->respond($data);
    }
}