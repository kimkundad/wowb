<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\category;
use App\Models\game;
use App\Models\room;
use App\Models\setting;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }

    // public function welcome(){

    //     $objs = category::where('status', 1)->get();
    //     $data['objs'] = $objs;
        
    //     return view('welcome', compact('objs'));
    // }

    // public function games($id){

    //     $objs = DB::table('games')->select(
    //         'games.*',
    //         'games.id as id_q',
    //         'games.status as status1',
    //         'categories.*',
    //         )
    //         ->leftjoin('categories', 'categories.id',  'games.cat_id')
    //         ->where('games.cat_id', $id)
    //         ->get();
        
    //     return view('games', compact('objs'));

    // }

    public function how_to_play(){

        return view('how_to_play');
    }

    public function welcome(){

        $objs = game::where('cat_id', 1)->orderBy('sort', 'asc')->get();
                
        return view('games', compact('objs'));

    }

    public function game_room(Request $request){

      //  dd($request->id);
      $formula = $request->formula;
      
        $objs = room::where('casino', $request->id)->where('room', $request->room)->first();
       
        $game = game::where('game_name_short', $request->id)->first();
     
        $rooms = room::where('casino', $request->id)->get();

        return view('game-room', compact('objs', 'game', 'rooms', 'formula'));

    }

    public function rooms(Request $request){

        $formula = $request->formula;

        $game = game::where('game_name_short', $request->casino)->first();
        $objs = room::where('casino', $request->casino)->get();

        return view('rooms', compact('objs', 'game', 'formula'));
    }

    public function rooms_slot(Request $request){

        $game = game::where('game_name_short', $request->casino)->first();
        $objs = room::where('casino', $request->casino)->get();
  
        return view('rooms-slot', compact('objs', 'game'));
    }

    public function call_percent(){

        $room = room::where('room_status', 1)->get();
        if(isset($room)){
            foreach($room as $u){

                // $per = rand(75,100);

                room::where('id', $u->id)
                ->update([
                    'percent' => rand(75,100)
                    ]);

            }
        }
        

        return response()->json([
            'data' => [
              'msg' => 'success'
            ]
          ]);


    }



    public function online_user(){
        

        return response()->json([
            'count' => rand(2500,3500)
          ]);

    }


    public function room_percents(Request $request){

     //   $request->casino

     $objs = room::where('casino', $request->casino)->get();

     return response()->json(
        $objs
      );

    }
}
