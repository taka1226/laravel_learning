<?php

namespace App\Http\Controllers;

use App\MyClasses\MyServiceInterface;
use Illuminate\Http\Request;
use App\Facades\MyService;
use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Models\Person;
use App\Jobs\MyJob;
use Maatwebsite\Excel\Validators\ValidationException;
use App\Imports\PeopleImport;


class HelloController extends Controller
{
    function __construct()
    {
    }

    public function index(int $id = -1)
    {
        MyService::setId($id);
        //dd(MyService->id);
        $data = [
            'msg' => MyService::say(),
            'data' => MyService::alldata()
        ];

        // $model = Person::find(1);
        // $model->update([
        //     'name' => 'ccc'
        // ]);
        // $person = Person::create([
        //    'name' => 'ddd',
        //     'mail' => 'ddd@example.com',
        //     'age' => 14
        // ]);
        DB::table('people')->insert([
            'name' => 'ee',
            'mail' => 'eee@example.com',
            'age' => 20
        ]);
        //$person->save();
        return view('hello.index', $data);

        //return Excel::download(new UserExport(['name', 'id']), 'users.csv');
    }

    public function send(Request $request)
    {
        $input = $request->input('find');
        $msg = 'search: '.$input;
        Person::get(['*'])->searchable();
        $result = Person::search($input)->get();

        $data = [
            'input' => $input,
            'msg' => $msg,
            'data' => $result,
        ];

        return view('hello.index', $data);
    }


    public function upload(Request $request)
    {
        if ($request->isMethod('get')){
            return view('hello.upload');
        }
        // アップロードされたCSVファイル
        $file = request()->file('csv_file');

        try {
            $import = new PeopleImport();
            Excel::import($import, $file);
        } catch (ValidationException $e) {
            Log::alert($e->errors());
        }
    }

    public function save($id, $name)
    {
        //dd(Person::find($id));
        $record = Person::find($id);
        $record->name = $name;
        //dd($record);
        $record->save();
        //return redirect()->route('hello');
    }

    public function json($id = -1)
    {
        if ($id == -1){
            return Person::get()->toJson();
        }else{
            return Person::find($id)->toJson();
        }
    }
}
