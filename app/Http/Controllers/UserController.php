<?php

namespace App\Http\Controllers;

use App\Helpers\TeamspeakHelper;
use App\Models\Server;
use App\Models\Token;
use Illuminate\Http\Request;
use Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    protected $teamspeak;
    protected $user;

    public function __construct(TeamspeakHelper $teamspeak){
        $this->middleware('role:user');
        $this->teamspeak = $teamspeak;


    }

    public function index()
    {
        if(Auth::user()){
          $servers = Server::ownedBy(Auth::user()->id)->get();
          return view('pages.users.index', compact('servers'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::user()){
            $server = Server::findOrFail($id);
            $userid = Auth::user()->id;
            if($userid == $server->owner){
              $virtualServer = (new TeamspeakHelper())->getServer($server);
              $viewer = $virtualServer->getViewer(new \TeamSpeak3_Viewer_Html("/images/viewer/", "/images/flags/", "data:image"));
              $clientCount = $virtualServer->clientCount();

              return view('pages.users.show', compact('server', 'viewer', 'clientCount'));
            }else{
                abort(404);
            }
        }else{
            abort(404);
        }
    }


    public function start($id)
    {
        if(Auth::user()){
            $server = Server::findOrFail($id);
            $userid = Auth::user()->id;
            if($userid == $server->owner){
                if($server->status){
                    return redirect()->back()->with('error', 'Can\'t start a running server');
                }

                (new TeamspeakHelper())->startServer($server);

                return redirect()->back()->with('success', 'Server has been started');
            }else{
              abort(404);
            }
        }else{
            abort(404);
        }
    }

    public function restart($id)
    {
      if(Auth::user()){
          $server = Server::findOrFail($id);
          $userid = Auth::user()->id;
          if($userid == $server->owner){
              $teamspeak = new TeamspeakHelper();

              if($server->status){
                  $teamspeak->stopServer($server);
              }

              $teamspeak->startServer($server);


              return redirect()->back()->with('success', 'Server has been started');
          }else{
              abort(404);
          }
        }else{
            abort(404);
        }
    }

    public function stop($id)
    {
        if(Auth::user()){
            $server = Server::findOrFail($id);
            $userid = Auth::user()->id;
            if($userid == $server->owner){

                if(!$server->status){
                    return redirect()->back()->with('error', 'Can\'t stop a server that isn\'t running');
                }

                (new TeamspeakHelper())->stopServer($server);

                return redirect()->back()->with('success', 'Server has been stopped');
            }else{
                abort(404);
            }
        }else{
            abort(404);
        }
    }

    public function resetToken($id)
    {
        if(Auth::user()){
            $server = Server::findOrFail($id);
            $userid = Auth::user()->id;
            if($userid == $server->owner){

                $token = (new TeamspeakHelper())->resetToken($server);
                $data = [
                    'server_id' => $server->id,
                    'token'     => $token
                ];
                $token = Token::create($data);

                return redirect()->action('UserController@showTokens', $server)->with('success', 'Token has been created');
            }else{
                abort(404);
            }
        }else{
            abort(404);
        }
    }

    public function showTokens($id)
    {
        if(Auth::user()){
            $server = Server::findOrFail($id);
            $userid = Auth::user()->id;
            if($userid == $server->owner){
                $tokens = $server->tokens;

                return view('pages.users.tokens', compact('tokens', 'server'));
            }else{
                abort(404);
            }
        }else{
            abort(404);
        }
    }

    public function deleteToken($id, $token_id)
    {
        if(Auth::user()){
            $server = Server::findOrFail($id);
            $userid = Auth::user()->id;
            if($userid == $server->owner){
                  $token  = Token::findOrFail($token_id);
                  (new TeamspeakHelper())->deleteToken($server, $token);
                  $token->delete();

                  return redirect()->back()->with('success', 'Token has been deleted');
            }else{
                abort(404);
            }
        }else{
            abort(404);
        }
    }
}
