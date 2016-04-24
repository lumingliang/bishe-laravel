<?php

namespace App\Http\Controllers\Iot;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Auth;
use App\Edison;

class manageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('iot.manage')->withTitle('系统管理')->with('user', session('user') )->with('sensors', session('sensors')); 
    }

    public function edisonData( Request $request ) {

        //echo  'your data'.$request->userId;
        //$edison = new Edison();
        $edison = Edison::where('userId', '=', $request->userId)->get()->toJson();
        echo $edison;
        //var_dump($edison);
    }
        
    public function gatherGap() {
        $edison = Auth::user()->edison;

        if(!$edison) {
            $edison = new Edison;
            $edison->userId = Auth::user()->id;
            $edison->save();
        }


        return view('iot.gatherGap')->withTitle('修改采集间隔')->with('sensors', session('sensors'))->with('edison', $edison);
    }

    public function save(Request $request) {
        $edison = Auth::user()->edison;
        $edison->excel = $request->excel; 
        $edison->db = $request->db;
        $edison->sendEmailTime = $request->sendEmailTime;
        $edison->save();
        echo 1;
    }



}
