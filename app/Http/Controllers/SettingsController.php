<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    function index(){
        return view('settings/index');
    }

    //Flag functions
    function flags(){
        return view('settings/flagHome');
    }

    function editFlag($flag){
        return view('settings/flagModify');
    }

    function editFlagProcess($flag){
        //TODO: add some logic here
    }

    function viewFlag($flag){
        return view('settings/flagView');
    }

    function addFlag(){
        return view('settings/flagModify');
    }

    function addFlagProcess(){
        //TODO: add some logic here
    }

    //Category functions below
    function categories(){
        return view('settings/categoryHome');
    }

    function editCategory($cat){
        return view('settings/categoryModify');
    }

    function editCategoryProcess($cat){
        //TODO: add logic here
    }

    function viewCategory($cat){
        return view('settings/categoryView');
    }

    function addCategory(){
        return view('settings/categoryModify');
    }

    function addCategoryProcess(){
        //TODO: add some logic here
    }
}
