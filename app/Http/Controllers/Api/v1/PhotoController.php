<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Services\Api\v1\PhotoService;
use App\Photo;
use App\Http\Controllers\Controller;
use Validator;


class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


      protected $photoService;

      function __construct(PhotoService $photoService){
            $this->photoService = $photoService;
      }

    public function index()
    {
        $photo = Photo::all();

        return $this->photoService->transformCollection($photo);
       
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
         $validator = Validator::make($request->all(),
        [ 
            'agent_id'           => 'required|string|max:255',
            'photo'        => 'required|string|max:255',
        
         ]);


         if ($validator->fails()) {
             return respondWithValidationError($validator);
         }

        $photo = new Photo();

        $photo->agent_id = $request->input('agent_id');
        $photo->photo = $request->input('photo');

        $photo->save();
       
        return response()->json(['message' => 'Success!'],200);
        //return $this->photoService->transform($photo);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if ($request->has('agent_id')) {
            $agentID = $request->agent_id;
        }
    
        $photo = Photo::where('agent_id',$agentID)->get();
        

        return $this->photoService->transformCollection($photo);   
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
    public function update(Request $request, $id)
    {


        $photo = Photo::find($id);

       
         $validator = Validator::make($request->all(),
        [ 
            'photo'        => 'required|string|max:255',
        
         ]);


         if ($validator->fails()) {
             return respondWithValidationError($validator);
         }

        $photo->photo = $request->input('photo');
        $photo->save();

        return $this->photoService->transform($photo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = Photo::find($id);

        $photo->delete();

        return response()->json(['message' => 'Deleted Successfully!'],200);
    }
}
