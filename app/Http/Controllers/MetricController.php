<?php

namespace App\Http\Controllers;

use App\Models\Metric;
use Illuminate\Http\Request;

class MetricController extends Controller
{

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'sometimes|nullable|integer',
            'company_id' => 'sometimes|nullable|integer',
            'request_id' => 'required|uuid',
            'parent_request_id' => 'sometimes|nullable|uuid',
            'started_at' => 'required|integer',
            'ended_at' => 'required|integer|gte:started_at',
            'request' => 'required|array:request,cookies,headers,query,method,host,uri',
            'response' => 'required|array:status,headers,first_100_bytes,last_100_bytes',
        ]);

        $m = new Metric($data);
        $m->saveOrFail();
        logger()->info(sprintf("Request %s executed in %.5f seconds.", $m->request_id, $m->timeInSeconds()), [
            'class' => __CLASS__,
            'function' => __FUNCTION__,
            'request_uri' => $m->request['uri'],
            'request_host' => $m->request['host'],
        ]);
    }

}
