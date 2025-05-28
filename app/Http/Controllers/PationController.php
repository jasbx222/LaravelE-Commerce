<?php

namespace App\Http\Controllers;

use App\Models\Pation;
use App\Http\Requests\StorePationRequest;
use App\Http\Requests\UpdatePationRequest;
use App\Traits\ApiResponse;
use GuzzleHttp\Psr7\Request;

class PationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pations = Pation::all();
        return response()->json($pations, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    use ApiResponse;
    public function store(StorePationRequest $request)
    {
        $validate = $request->validated();

        $pation = Pation::create($validate);
        return $this->success('pation added sucessfully', $pation, 200);
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pation  $pation
     * @return \Illuminate\Http\Response
     */
    use ApiResponse;
    public function show(Pation $pation)
    {
        return $this->success('pation data :', $pation, 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePationRequest  $request
     * @param  \App\Models\Pation  $pation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePationRequest $request, Pation $pation)
    {
        $validateRequest = $request->validated();
        $pation->update($validateRequest);
        return $this->success('Updated successfully', $pation, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pation  $pation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pation $pation)
    {



        $pation->delete();
        return response()->json('deleted success', 200);
    }
}
