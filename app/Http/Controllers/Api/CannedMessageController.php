<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CannedMessageResource;
use Illuminate\Http\Request;
use App\Models\CannedMessage;

class CannedMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CannedMessageResource::collection(CannedMessage::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        CannedMessage::create($request->all());

        return response()->json('Canned Message created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CannedMessage $cannedMessage)
    {
        return new CannedMessageResource($cannedMessage);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CannedMessage $cannedMessage)
    {
        $cannedMessage->update($request->all());

        return response()->json('Canned Message updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CannedMessage $cannedMessage)
    {
        $cannedMessage->delete();
        return response()->json('Canned Message deleted successfully');
    }
}
