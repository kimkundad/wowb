<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\game;
use App\Models\room;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $objs = DB::table('games')->select(
            'games.*',
            'games.id as id_q',
            'games.status as status1',
            'categories.*',
            )
            ->leftjoin('categories', 'categories.id',  'games.cat_id')
            ->orderBy('sort', 'asc')
            ->paginate(15);

        $room = [];

        if(isset($objs)){
            foreach($objs as $u){
                 $count = room::where('game_id', $u->id_q)->count();
                 $u->options = $count;
                // $u->option = 0;
            }
        }
        $objs->setPath('');
        $data['objs'] = $objs;
        return view('admin.games.index', compact('objs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cat = category::where('status', 1)->get();
        $data['cat'] = $cat;
        $data['method'] = "post";
        $data['url'] = url('admin/games');
        return view('admin.games.create', $data);
    }

    public function api_post_status_games(Request $request){

        $user = game::findOrFail($request->user_id);

              if($user->status == 1){
                  $user->status = 0;
              } else {
                  $user->status = 1;
              }


      return response()->json([
      'data' => [
        'success' => $user->save(),
      ]
    ]);

     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'game_name' => 'required',
            'cat_id' => 'required',
            'game_name_short' => 'required',
            'image' => 'required',
            'image2' => 'required',
           ]);

           $status = 0;
            if(isset($request['status'])){
                if($request['status'] == 1){
                    $status = 1;
                }
            }
           
           $image = $request->file('image');
           $image2 = $request->file('image2');
           $image3 = $request->file('image3');
           $image4 = $request->file('image4');

           $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $img = Image::make($image->getRealPath());
            $img->resize(950, 950, function ($constraint) {
            $constraint->aspectRatio();
            });
            $img->stream();
            Storage::disk('do_spaces')->put('game/game/'.$image->hashName(), $img, 'public');

            $input['imagename'] = time().'.'.$image2->getClientOriginalExtension();
            $img2 = Image::make($image2->getRealPath());
            $img2->resize(400, 400, function ($constraint2) {
            $constraint2->aspectRatio();
            });
            $img2->stream();
            Storage::disk('do_spaces')->put('game/room/'.$image2->hashName(), $img2, 'public');


            $objs = new game();
           $objs->game_name = $request['game_name'];
           $objs->game_name_short = $request['game_name_short'];
           $objs->cat_id = $request['cat_id'];
           $objs->game_image = $image->hashName();
           $objs->status = $status;
           $objs->sort = $request['sort'];
           $objs->room_image = $image2->hashName();
           $objs->save();
           $objs->id;
           $id = $objs->id;

            if($image3 !== null) {

                $input['imagename'] = time().'.'.$image3->getClientOriginalExtension();
                $img3 = Image::make($image3->getRealPath());
                $img3->resize(400, 400, function ($constraint3) {
                $constraint3->aspectRatio();
                });
                $img3->stream();
                Storage::disk('do_spaces')->put('game/room/'.$image3->hashName(), $img3, 'public');


                $objs3 = game::find($id);
                $objs3->room_image2 = $image3->hashName();
                $objs3->save();

                }

            


            if($image4 !== null) {

                $input['imagename'] = time().'.'.$image4->getClientOriginalExtension();
                $img4 = Image::make($image4->getRealPath());
                $img4->resize(400, 400, function ($constraint4) {
                $constraint4->aspectRatio();
                });
                $img4->stream();
                Storage::disk('do_spaces')->put('game/room/'.$image4->hashName(), $img4, 'public');

                $objs3 = game::find($id);
                $objs3->room_image3 = $image4->hashName();
                $objs3->save();
                
            }     
           


           return redirect(url('admin/games'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $room = room::where('game_id', $id)->get();
        $data['room'] = $room;


        $objs = game::find($id);
        $cat = category::where('status', 1)->get();
        $data['cat'] = $cat;
        $data['url'] = url('admin/games/'.$id);
        $data['method'] = "put";
        $data['objs'] = $objs;
        return view('admin.games.edit', $data);
    }

    public function create_new($id){

        
        $objs = game::find($id);
        $data['objs'] = $objs;
        $data['id'] = $id;

        $data['method'] = "post";
        $data['url'] = url('admin/rooms');

        return view('admin.games.create_new', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $this->validate($request, [
            'game_name' => 'required',
            'game_name_short' => 'required',
            'cat_id' => 'required'
        ]);

        $image = $request->file('image');
        $image2 = $request->file('image2');
        $image3 = $request->file('image3');
        $image4 = $request->file('image4');

        $status = 0;
        if(isset($request['status'])){
            if($request['status'] == 1){
                $status = 1;
            }
        }

        if($image == NULL){

            $objs = game::find($id);
           $objs->game_name = $request['game_name'];
           $objs->cat_id = $request['cat_id'];
           $objs->sort = $request['sort'];
           $objs->status = $status;
           $objs->game_name_short = $request['game_name_short'];
           $objs->save();

        }

        $img = DB::table('games')
          ->where('id', $id)
          ->first();
        
        if($image !== NULL){

          $storage = Storage::disk('do_spaces');
          $storage->delete('game/game/' . $img->game_image, 'public');

          $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

          $img = Image::make($image->getRealPath());
          $img->resize(400, 400, function ($constraint) {
          $constraint->aspectRatio();
        });
        $img->stream();
        Storage::disk('do_spaces')->put('game/game/'.$image->hashName(), $img, 'public');

             $objs = game::find($id);
           $objs->game_name = $request['game_name'];
           $objs->cat_id = $request['cat_id'];
           $objs->game_image = $image->hashName();
           $objs->game_name_short = $request['game_name_short'];
           $objs->status = $status;
           $objs->sort = $request['sort'];
           $objs->save();

        }


        if($image2 !== NULL){


          $storage2 = Storage::disk('do_spaces');
          $storage2->delete('game/room/' . $img->room_image, 'public');

          $input['imagename'] = time().'.'.$image2->getClientOriginalExtension();

          $img2 = Image::make($image2->getRealPath());
          $img2->resize(400, 400, function ($constraint2) {
          $constraint2->aspectRatio();
        });
        $img2->stream();
        Storage::disk('do_spaces')->put('game/room/'.$image2->hashName(), $img2, 'public');

             $objs = game::find($id);
           $objs->game_name = $request['game_name'];
           $objs->cat_id = $request['cat_id'];
           $objs->room_image = $image2->hashName();
           $objs->game_name_short = $request['game_name_short'];
           $objs->status = $status;
           $objs->sort = $request['sort'];
           $objs->save();
        }

        if($image3 !== NULL){


            $storage3 = Storage::disk('do_spaces');
            $storage3->delete('game/room/' . $img->room_image2, 'public');
  
            $input['imagename'] = time().'.'.$image3->getClientOriginalExtension();
  
            $img3 = Image::make($image3->getRealPath());
            $img3->resize(400, 400, function ($constraint3) {
            $constraint3->aspectRatio();
          });
          $img3->stream();
          Storage::disk('do_spaces')->put('game/room/'.$image3->hashName(), $img3, 'public');
  
               $objs = game::find($id);
             $objs->game_name = $request['game_name'];
             $objs->cat_id = $request['cat_id'];
             $objs->room_image2 = $image3->hashName();
             $objs->game_name_short = $request['game_name_short'];
             $objs->status = $status;
             $objs->sort = $request['sort'];
             $objs->save();
          }


          if($image4 !== NULL){

           //  dd($image4->getRealPath());
            $storage4 = Storage::disk('do_spaces');
            $storage4->delete('game/room/' . $img->room_image3, 'public');
  
            $input['imagename'] = time().'.'.$image4->getClientOriginalExtension();
 
            $img4 = Image::make($image4->getRealPath());
            $img4->resize(400, 400, function ($constraint4) {
            $constraint4->aspectRatio();
          });
          $img4->stream();
          Storage::disk('do_spaces')->put('game/room/'.$image4->hashName(), $img4, 'public');
  
               $objs = game::find($id);
             $objs->game_name = $request['game_name'];
             $objs->cat_id = $request['cat_id'];
             $objs->room_image3 = $image4->hashName();
             $objs->game_name_short = $request['game_name_short'];
             $objs->status = $status;
             $objs->sort = $request['sort'];
             $objs->save();
          }

        return redirect(url('admin/games/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function del_games($id)
    {
        //
        $objs = DB::table('games')
            ->where('id', $id)
            ->first();

            if(isset($objs->image_pro)){
                $storage = Storage::disk('do_spaces');
                $storage->delete('game/game/' . $objs->game_image, 'public');
            }

            DB::table('rooms')
            ->where('game_id', $id)
            ->delete();

        $obj = game::find($id);
        $obj->delete();

        return redirect(url('admin/games/'))->with('del_success','คุณทำการลบอสังหา สำเร็จ');
    }
}
