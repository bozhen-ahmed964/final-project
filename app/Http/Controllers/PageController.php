<?php

namespace App\Http\Controllers;

use App\Models\memberModel;
use Illuminate\Http\Request;

class PageController extends Controller
{
    // route to dashboard page
    public function index()
    {
        return view('admin.index');
    }
    // route to addMember page
    public function addMember()
    {
        return view('admin.addMember');
    }
    // adding new member
    public function insertMember(Request $request){
       $member = new memberModel();
       $member->Full_Name = $request->input('Full_Name');
       $member->Age = $request->input('Age');
       $member->Gender = $request->input('Gender');
       $member->Phone_Number = $request->input('Phone_Number');
       $member->Weight = $request->input('Weight');
       $member->Height = $request->input('Height');
       $member->Game_Type = $request->input('Game_Type');
       $member->Pay = $request->input('Pay');
       $member->Health_Issue = $request->input('Health_Issue');
       $member->save();
       return redirect('/addMember')->with('success', 'Member Added Successfully');
    }
    // for fetching all data in data base to table
    public function memberTable()
    {
        $memberTable = memberModel::all();
        return view('admin.memberTable', compact('memberTable'));
    }
    // edit button
    public function editMember($id){
        $member = memberModel::find($id);
        return view('admin.edit', compact('member'));
    }
    // updating member info
    public function updateFunction(Request $request, $id){
        $member = memberModel::find($id);
        $member->Full_Name = $request->input('Full_Name');
        $member->Age = $request->input('Age');
        $member->Gender = $request->input('Gender');
        $member->Phone_Number = $request->input('Phone_Number');
        $member->Weight = $request->input('Weight');
        $member->Height = $request->input('Height');
        $member->Game_Type = $request->input('Game_Type');
        $member->Pay = $request->input('Pay');
        $member->Health_Issue = $request->input('Health_Issue');
        $member->update();
        return redirect('memberTable')->with('status', "Member Updated Successfully");
    }
    // delete member button
    public function destroy($id){
        $member = memberModel::find($id);
        $member->delete();
        return redirect('memberTable')->with('status','Member Deleted Successfully');
    }





    // route to balling page
    public function billing()
    {
        return view('admin.billing');
    }
    // route to buildingCourse page
    public function buildingCourse()
    {
        return view('admin.buildingCourse');
    }
    // route to mealCourse page
    public function mealCourse()
    {
        return view('admin.mealCourse');
    }
    // route to calCalculator page
    public function calCalculator()
    {
        return view('admin.calCalculator');
    }
    // route to profile page
    public function profile()
    {
        return view('admin.profile');
    }
}
