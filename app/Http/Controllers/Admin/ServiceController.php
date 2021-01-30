<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Fields;
use App\Models\Service;
use App\Models\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{

    public function index()
    {
        $listServices = Service::all();
        return view('admin.service.index', [
            'listServices' => $listServices
        ]);
    }

    public function create()
    {
        return view('admin.service.create');
    }

    public function save(Request $request)
    {

        DB::beginTransaction();
        try {
            $fields = $request->fields;

            $service = new Service();
            $service->name = $request->name;
            $service->fee = $request->fee;
            $service->save();

            foreach ($fields as $item) {

                $field = new Fields();
                $field->service_id = $service->id;
                $field->name = $item['name'];
                $field->type = $item['type'];
                $field->validate = $item['validate'];
                $field->value = array_key_exists('values', $item) ? json_encode($item['values']) : '';
                $field->save();
            }

            DB::commit();
            return redirect()->route('admin.service.index')->with('success', 'Success');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('admin.service.index')->with('error', 'Error');
        }
    }

    public function edit()
    {
        // todo editService
    }

    public function update()
    {
        // todo updateService
    }
//    public function configService(Request $request)
//    {
//        $service =Service::find($request->id);
//        $listFields =  $service->fields;
//        return view('admin..service.config-service',[
//            'service'=>$service,
//            'listFields'=>$listFields
//        ]);
//    }

    public function SaveConfig(Request $request)
    {
        //dd($request->all());
        $fields = new Fields();
        $fields->service_id = $request->id;
        $fields->name = $request->name;
        $fields->type = $request->type;
        if ($request->createGroup != null)
            $fields->group = $request->createGroup;
        else
            $fields->group = $request->group;
        $fields->save();
    }

//    public function printFields(Request $request)
//    {
//        $service = Service::find($request->id);
//        $listFields =  $service->fields;
//
//
//        foreach ($listFields as $fields)
//        {
//            $name = ($fields->group == null) ?"input-$fields->id" : "$fields->group";
//            echo "<label>{$fields->name}</label> <input type='{$fields->type}' name='$name'><br>";
//        }
//    }

    public function listStudentService()
    {
        $listStudentServices = UserService::orderBy('created_at', 'DESC')->get();
        return view('admin.service.list-student-service', [
            'listStudentServices' => $listStudentServices
        ]);
    }

//    public function detailStudentService(Request $request)
//    {
//        $service = new Service();
//        $service->name = $request->name;
//        $service->fee = $request->fee;
//        $service->save();
//    }

//    public function configService(Request $request)
//
//    {
//
//    }
}
