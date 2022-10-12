<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use App\UserResources;
use Illuminate\Support\Facades\View;
use App\Nav;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
	
	public static function resourceInfo($currentResource = '')
	{
		$loggedUser			=	Auth::id();
		
		if($currentResource != "")
		{
			$resourcesCurrentPermission 	= 	UserResources::select('user_resources.*','user_resources_permission.action_view as permission_view','user_resources_permission.action_add as permission_add','user_resources_permission.action_edit as permission_edit','user_resources_permission.action_delete as permission_delete')
											->leftJoin('user_resources_permission',function ($join) use($loggedUser) {
												$join->on('user_resources_permission.resource', '=' , 'user_resources.resource_name') ;
												$join->where('user_resources_permission.user_id','=',$loggedUser);
												})
											->where('user_resources.resource_name',$currentResource)
											->first();
		
			return $resourcesCurrentPermission;
		}
		
		$resources 			= 	UserResources::select('user_resources.*','user_resources_permission.action_view as permission_view','user_resources_permission.action_add as permission_add','user_resources_permission.action_edit as permission_edit','user_resources_permission.action_delete as permission_delete')
								   ->leftJoin('user_resources_permission',function ($join) use($loggedUser) {
												$join->on('user_resources_permission.resource', '=' , 'user_resources.resource_name') ;
												$join->where('user_resources_permission.user_id','=',$loggedUser) ;
											})
								   ->orderBy('user_resources.sort_order','ASC')->get();
		
		$resourceAllArray	=	array();
		foreach($resources as $resource){
				$resourceAllArray[$resource['resource_name']]['view'] 		= $resource['permission_view'];
				$resourceAllArray[$resource['resource_name']]['add'] 		= $resource['permission_add'];
				$resourceAllArray[$resource['resource_name']]['edit'] 		= $resource['permission_edit'];
				$resourceAllArray[$resource['resource_name']]['delete'] 	= $resource['permission_delete'];
			}
		/*
		View::composer('layouts.left', function ($view) use($resourceAllArray) {
            $view->with(array('userPermission' => $resourceAllArray));
        });
		*/
		return $resourceAllArray;
	}
	
}
