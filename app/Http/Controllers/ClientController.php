<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Resources\Client as ClientResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
    
        return ClientResource::collection($clients);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'name' => 'required',
            'email' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $client = Client::create($input);
   
        return $client;
  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return $client;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $input = $request->all();
   
        if ($request->has('name')) {
            $client->name = $input['name'];
        }
        if ($request->has('email')) {
            $client->email = $input['email'];
        }
        if ($request->has('cellphone')) {
            $client->cellphone = $input['cellphone'];
        }
        if ($request->has('client_id')) {
            $client->client_id = $input['client_id'];
        }
        $client->save();
   
        return new ClientResource($client);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
   
        return 'Client deleted successfully.';
    }
}
