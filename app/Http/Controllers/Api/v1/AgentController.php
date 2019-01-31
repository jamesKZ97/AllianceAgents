<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Services\Api\v1\AgentsService;

use App\Agent;
use App\Http\Controllers\Controller;
use Validator;


class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $agentsService;

    function __construct(AgentsService $agentsService){
            $this->agentsService = $agentsService;
    }

    public function index()
    {
    
        $agent = Agent::all();

        return $this->agentsService->transformCollection($agent);
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
           'agent_id'            => 'required|string|max:255',
           'name'                => 'required|string|max:255',
           'location'            => 'required|string|max:255',
           'phone_num_1'         => 'required|string|max:255',
           'email'               => 'required|string|max:255',
           'company_name'        => 'required|string|max:255',
           'company_address'     => 'required|string|max:255',
           'client_testimonial'  => 'required|string',
           'year_of_exp'         => 'required|integer|max:255',
           'person_recommended'  => 'required|string|max:255',
           'pos_of_person_recommended' => 'required|string|max:255',
           'personal_description'=>'required|string'
         ]);

         if ($validator->fails()) {
             return respondWithValidationError($validator);
         }

        $agent = new Agent();

        $agent->agent_id = $request->input('agent_id');
        $agent->name = $request->input('name');
        $agent->logo = $request->input('logo');
        $agent->location = $request->input('location');
        $agent->phone_num_1 = $request->input('phone_num_1');
        $agent->phone_num_2 = $request->input('phone_num_2');
        $agent->email = $request->input('email');
        $agent->company_name = $request->input('company_name');
        $agent->about_the_company = $request->input('about_the_company');
        $agent->company_address = $request->input('company_address');
        $agent->client_testimonial = $request->input('client_testimonial');
        $agent->year_of_exp = $request->input('year_of_exp');
        $agent->person_recommended = $request->input('person_recommended');
        $agent->pos_of_person_recommended = $request->input('pos_of_person_recommended');
        $agent->personal_description = $request->input('personal_description');
 
        $agent->save();

        return response()->json(['message' => 'Success!'],200);
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
    
        $agent = Agent::where('agent_id',$agentID)->get();
        

        return $this->agentsService->transformCollection($agent);
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

         $agent = Agent::find($id);
        
        $validator = Validator::make($request->all(),
         [
           'location'            => 'required|string|max:255',
           'phone_num_1'         => 'required|string|max:255',
           'email'               => 'required|string|max:255',
           'company_name'        => 'required|string|max:255',
           'company_address'     => 'required|string|max:255',
           'client_testimonial'  => 'required|string|max:255',
           'year_of_exp'         => 'required|int|max:255',
           'person_recommended'  => 'required|string|max:255',
           'pos_of_person_recommended' => 'required|string|max:255',
           'personal_description'=>'required|string|max:255'
         ]);
        if ($validator->fails()) {
            return respondWithValidationError($validator);
        }
         
        if($request->input('logo')!= null){
            $agent->logo = $request->input('logo');
        }
        
            $agent->location = $request->input('location');

            $agent->phone_num_1 = $request->input('phone_num_1');
        
         
        if($request->input('phone_num_2')!= null){
           $agent->phone_num_2 = $request->input('phone_num_2');
        }

           $agent->email = $request->input('email');
        
            $agent->company_name = $request->input('company_name');
        
        if($request->input('about_the_company') != null){
            $agent->about_the_company = $request->input('about_the_company');
        }

            $agent->company_address = $request->input('company_address');

            $agent->client_testimonial = $request->input('client_testimonial');

            $agent->year_of_exp = $request->input('year_of_exp');

            $agent->person_recommended = $request->input('person_recommended');

            $agent->pos_of_person_recommended = $request->input('pos_of_person_recommended');

            $agent->personal_description = $request->input('personal_description');

         $agent->save();

         return $this->agentsService->transform($agent);
     }

       

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agent = Agent::find($id);

        $agent->delete();

        return response()->json(['message' => 'Deleted Successfully!'],200);
    }
}
