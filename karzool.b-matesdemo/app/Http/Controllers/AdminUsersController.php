<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash; 
use Intervention\Image\Facades\Image;

use App\AdminUsers;
use App\Branch;
use App\UserResources;
use App\AdminUsersPermissions;


class AdminUsersController extends Controller
{
    public function index()
	{
		parent::resourceInfo();
		$allInput = AdminUsers::select('users.*','branch.name as bname')
							->leftjoin('branch', 'users.branch_id', '=', 'branch.id')
							->orderBy('users.name','ASC')->get();
		
							
		return view("adminusers.index")->with(array('allInput'=>$allInput));
	}
	
	public function add(Request $request)
	{
		if ($request->isMethod('post')) {
				$data 				= $request->all();
				$data['password']	= Hash::make($data['password']);
				
				AdminUsers::create($data);
			 return redirect("AdminUsers")->with('message', 'User Successfully Added');
		}
		
		$branch = Branch::select('id','name')
		->where('status','1')
		->orderBy('name','ASC')->get();
		
		return view("adminusers.add")->with(array('branch'=>$branch));;

	}
	
	public function edit($id,Request $request)
	{
		
		if ($request->isMethod('post')) {
			
			$admin 				= AdminUsers::find($id);
			$data 				= $request->all();
			
			if($data['password'] != ""){
				$data['password']	= Hash::make($data['password']);
			}else unset($data['password']);
			$admin->update($data);
			return redirect("AdminUsers")->with('message', 'User Successfully Edited');
		}
		
		$branch = Branch::select('id','name')
		->where('status','1')
		->orderBy('name','ASC')->get();
		
		$editInfo = AdminUsers::findOrFail($id);
		return view("adminusers.edit")->with(array('branch'=>$branch,'editInfo'=>$editInfo));
	}
	
	public function delete($id)
	{
		$admin = AdminUsers::find($id);
        $admin->delete();
		return redirect("AdminUsers")->with('message', 'User Successfully Deleted');
	}
	
	public function ajaxEmailValidate(Request $request)
	{
		$data 					= 	$request->all();
		$email 					= 	$data['email'];
		$emailInfo 				= 	AdminUsers::where('email',$email)->first();
		$success['email']		=	$emailInfo['email'];;
		$success['message'] 	= 	'Success';
		return response()->json($success); 
	}
	
	public function userPermission($id,Request $request)
	{
		parent::resourceInfo();
		if ($request->isMethod('post')) {
			
			$data 		= $request->all();
			$permission = @$data['permission'];
			AdminUsersPermissions::where('user_id',$id)->delete();
			if(!empty($permission))
			{
				foreach($permission as $resource => $actions)
				{
					$data['resource']			=	$resource;
					$data['user_id']			=	$id;
					$data['action_view']		=	@$actions['action_view'];
					$data['action_add']			=	@$actions['action_add'];
					$data['action_edit']		=	@$actions['action_edit'];
					$data['action_delete']		=	@$actions['action_delete'];
					AdminUsersPermissions::create($data);
				}
			}
			return redirect("AdminUsers")->with('message', 'Permission Successfully Updated');
		}
		
		$resources = UserResources::select('user_resources.*','user_resources_permission.action_view as permission_view','user_resources_permission.action_add as permission_add','user_resources_permission.action_edit as permission_edit','user_resources_permission.action_delete as permission_delete')
								   ->leftJoin('user_resources_permission',function ($join) use($id) {
												$join->on('user_resources_permission.resource', '=' , 'user_resources.resource_name') ;
												$join->where('user_resources_permission.user_id','=',$id) ;
											})
								   ->orderBy('user_resources.sort_order','ASC')->get();
								   
		return view("adminusers.userpermission")->with(array('resources'=>$resources,'id'=>$id));;
	}
	
	

}
