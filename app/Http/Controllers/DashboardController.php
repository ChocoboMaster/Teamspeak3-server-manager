<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Server;
use Illuminate\Http\Request;

use Kordy\Ticketit\Models\Ticket;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()){

          $servers = Server::all();
          $servers_user = Server::ownedBy(Auth::user()->id)->get();;
          $server_count = Server::count();
          $server_count_user = (is_string(Server::countUser(Auth::user()->id)) ? Server::countUser(Auth::user()->id) : 0);

          $open_tickets_count = Ticket::whereNull('completed_at')->count();
          $closed_tickets_count = Ticket::whereNotNull('completed_at')->count();

          return view('pages.dashboard', compact('server_count', 'server_count_user', 'servers', 'servers_user', 'open_tickets_count', 'closed_tickets_count'));
        }

    }
}
