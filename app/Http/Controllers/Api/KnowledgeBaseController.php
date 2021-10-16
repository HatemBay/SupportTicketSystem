<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\KnowledgeBaseResource;
use Illuminate\Http\Request;
use App\Models\KnowledgeBase;
use Ramsey\Uuid\Type\Integer;

class KnowledgeBaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return KnowledgeBaseResource::collection(KnowledgeBase::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        KnowledgeBase::create($request->all());

        return response()->json('Knowledge Base created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(KnowledgeBase $knowledgeBase)
    {
        return new KnowledgeBaseResource($knowledgeBase);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KnowledgeBase $knowledgeBase)
    {
        $knowledgeBase->update($request->all());

        return response()->json('Knowledge Base updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(KnowledgeBase $knowledgeBase)
    {
        $knowledgeBase->delete();
        return response()->json('Knowledge Base deleted successfully');
    }

    /*stats*/
    public function countBySubCat(int $nb)
    {
        //
        $knowledgeBases = KnowledgeBase::where('sub_category_id', '=', $nb);
        return response()->json($knowledgeBases->count());
    }

    public function countOpen()
    {
        //
        $tickets = KnowledgeBase::where('status', 'like', 'Published');
        return response()->json($tickets->count());
    }
}
