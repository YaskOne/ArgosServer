<?php

namespace App\Http\Controllers;

use App\Classes\GroupFunctions;
use Illuminate\Http\Request;


use App\Http\Requests;

class GroupController extends Controller
{
    //
    public function fetchGroups($groupId){

        $func = new GroupFunctions;
        return $func->fetch($groupId);

    }

    public function fetchUsersGroups($userId){

        $func = new GroupFunctions;
        return $func->getUserGroups($userId);

    }

    public function add(Request $request){

        $user = User::find(Auth::user()->id);
        $public = request->input('public');
        $name = request->input('name');
        return GroupFunctions::add($user, $public, $name);

    }

    public function inviteCreate(Requests\GroupInviteRequest $request){

        $data = $request->all();
        $func = new GroupFunctions;
        return $func->inviteToGroup($data["groupId"], $data["userId"]);
    }

    public function inviteAccept(Requests\GroupInviteRequest $request){

        $data = $request->all();
        $func = new GroupFunctions;
        return $func->accept($data["groupId"], $data["userId"]);

    }

    public function inviteDecline(Requests\GroupInviteRequest $request){

        $data = $request->all();
        $func = new GroupFunctions;
        return $func->decline($data["groupId"], $data["userId"]);

    }

}
