<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use DB;

class ProjectsController extends Controller
{

    public function getProjects(){
        return DB::table('projects')->get();
    }

    public function addProject(Request $request){
        
        //Insert new row in DB
        response()->json(DB::table('projects')->insert([
            'project_name' => $request->header('project_name'),
            'project_date' => $request->header('project_date'),
            'active'       => $request->header('active')
        ]), 201);

        // Get latest (new added) row
        return DB::table('projects')->orderBy('project_date', 'desc')->first();
    }

    public function updateActive(Request $request, $id){
        response()->json(DB::table('projects')->where('project_id', $id)->update([
            'active' => $request->header('active') == 1 ? 1 : 0
        ]), 200);

        // Get updated row
        return DB::table('projects')->where('project_id', $id)->get();
    }

    public function deleteProject(Request $request, $id){
        return DB::table('projects')->where('project_id', $id)->delete();
    }
    
}
