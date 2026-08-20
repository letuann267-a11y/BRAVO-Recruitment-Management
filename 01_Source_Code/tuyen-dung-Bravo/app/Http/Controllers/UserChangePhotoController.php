<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserChangePhotoRequest;
use App\Models\Photo;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class UserChangePhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        return view ('user.changePhoto',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserChangePhotoRequest $request)
    {
        $user = auth()->user();
        $input= $request->all();

        if($file = $request->file('photo_id')){

            if ($user->photo_id !=1) {

                if (file_exists(public_path() .'/images/'. $user->photo->name)) {//kontrollo nese ekziston foto ne storage para se te fshihet
                    unlink(public_path()  .'/images/'. $user->photo->name);
                }

            }


            $name = time() . $file->getClientOriginalName();

//                $name = time().$file->getClientOriginalName();

            $image_resize = Image::make($file->getRealPath());
            $image_resize->fit(300, 300);
            $image_resize->save('images/'.$name);

//ME RESIZE
            //$file->move('images', $name);
            $photo = Photo::create(['name'=>$name]);
            $input['photo_id'] = $photo->id;
            if ($user->photo_id != 1) {
                $user->photo()->delete();
            }
            $user->update($input);
            session()->flash('updated_photo', 'Profile picture successfully changed.');
            return back();


        }
        else{//nese nuk ngarkon foto
            return back();
        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = auth()->user();
        if ($user->photo_id == 1){
            abort(403, 'Unauthorized action.');
        }
        else{
            if (file_exists(public_path().'/images/'.$user->photo->name)) {//kontrollo nese ekziston foto ne storage para se te fshihet

                unlink(public_path() .'/images/'.$user->photo->name);
            }
            $user->update(['photo_id'=>1]);
            session()->flash('deleted_photo', 'Profile picture deleted successfully.');
            return back();
        }
    }
}
