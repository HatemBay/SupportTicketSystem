<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DepartmentResource;
use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TicketResource::collection(Ticket::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Ticket::create($request->all());

        return response()->json('Ticket created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        return new TicketResource($ticket);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        $ticket->update($request->all());

        return response()->json('Ticket updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return response()->json('Ticket deleted successfully');
    }
    //**************************END CRUD*******************************
    //******************Queries with constraints***********************
    public function getByCustomerId()
    {
        //
        return Ticket::where('customer_id', '=', 11)->get();
    }

    public function getByDeptId()
    {
        //
        return Ticket::where('department_id', '=', 11)->get();
    }

    //******************Queries with constraints***********************
    //*************************Statistics******************************
    public function countAll()
    {
        //
        // $count = $this->index()->count();
        $count = Ticket::all()->count();
        return response()->json($count);
    }

    public function countMonth(int $month)
    {
        //
        // $count = $this->index()->count();
        $count = Ticket::whereMonth('created_at', '=', $month)->count();
        return response()->json($count);
    }

    public function countOpen()
    {
        //
        $tickets = Ticket::where('status', 'like', 'OPEN');
        return response()->json($tickets->count());
    }

    public function getLatest(int $nb)
    {
        //
        $tickets = Ticket::latest()->take($nb)->orderBy('id', 'desc')->get();
        return $tickets;
    }
    //*************************Statistics******************************

}
