<?php

namespace App\Http\Controllers;

use App\MyClasses\MyServiceInterface;
use Illuminate\Http\Request;
use App\Facades\MyService;
use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;

class HelloController extends Controller
{
    function __construct()
    {
    }

    public function index(MyServiceInterface $myservice, int $id = -1)
    {
        $myservice->setId($id);
        $data = [
            'msg' => $myservice->say($id),
            'data' => $myservice->alldata()
        ];
        return view('hello.index', $data);

        //return Excel::download(new UserExport(['name', 'id']), 'users.csv');
    }
}
