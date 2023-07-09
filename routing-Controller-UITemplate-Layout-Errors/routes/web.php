<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::get('/', function () {
//     return view('welcome');
// });

/*________________________________ Class 1  ___________________________________ */
#region Class_1_View_Config_Data_Controller_Layout
    //__________________ 1. Simple View  ______________________
    Route::get('/class1/_1_SimpleView',function(){
        return view('Class_1_RouteWebFile_Works._1_File');
    });


    //__________________ 2. Passing Data  ______________________
    Route::get('/class1/_2_PassingData',function(){
        //________ 1. Key Pair Form (Asso_Array) ___________
        $a = 10;
        $b = 10;
        $sum = $a+$b;
        // return view(
            //     'Class_1_RouteWebFile_Works._2_PassingValueToView_inWebFile',
            //     ['sum'=>$sum,'name'=>'Saqib','email'=>'m43577535@gmail.com' , 'age' => 25],
        //     compact('sum')
        // );
        
        //_________ 2. By Compact __________
        //without key
        return view(
            'Class_1_RouteWebFile_Works._2_PassingValueToView_inWebFile',
            ['sum'=>$sum,'name'=>'Saqib','email'=>'m43577535@gmail.com' , 'age' => 25],
            compact('a')
        );
        
        //_________ 3. With __________
        // return view(
            //     'Class_1_RouteWebFile_Works._2_PassingValueToView_inWebFile',
            // )->with('xyz',$sum);
            
    });
        
        
    //__________________ 3. Adding Paramters  ______________________
    Route::get('/class1/_3_parametrize/{id}/{name}',function($id,$name){
        return View(
            "Class_1_RouteWebFile_Works._3_parameterizeValues",
            compact('id','name')
        );
    });


    //__________________ 4. Bladge Template Paramters  ______________________
    Route::get('/class1/_4_BladeTemplate_Directives',function(){
        $value = "bakend Values 12345";

        return View(
            "Class_1_RouteWebFile_Works._4_DirectivesBladeTemplate",
            compact("value")
        );
    });

    //__________________ 5. Dashboard Implementation Paramters  ______________________
    Route::get('/class1/AddingUI',function(){
        $value = "bakend Values 12345";

        return View(
            "Class_1_RouteWebFile_Works._5_Adding_UI_Layouts",
            compact("value")
        );
    });


    //____________________ 5. Controllers  +  Layout Setting_________________________
    use App\Http\Controllers\DashboardController;

    //_____________ 1. Dashboard ___________
    Route::get('/Dashboard/Index',[DashboardController::class,'Index']);

    //_____________ UI button , other things ___________
    use App\Http\Controllers\UIController;
    Route::get('/Ui/Button',[UIController::class,'Button']);
    Route::get('/Ui/Dropdown',[UIController::class,'Dropdown']);
    Route::get('/Ui/Typogrphi',[UIController::class,'Typogrphi']);

    //_____________ 2. Frontend ___________
    use App\Http\Controllers\ClientController;

    Route::get('/',[ClientController::class,'Index']);


    //____________________ 6. Convert Project On LocalHost _________________________
    Route::get('/class2/ConvertToLocalHost',function(){
        return View("Class_1_ConvertToLocalhost");
    });

#endregion

/*________________________________ Class 2  ___________________________________ */
#region Class_2_Form_Get_Post
//____________________ 1. FormsSubmit _________________________
use App\Http\Controllers\FormSubmitionController;

//_________ Get ______
Route::get('/class2/_1_getForm',[FormSubmitionController::class,'FormGet']);

//_________ Post ______
Route::get('/class2/_2_postForm',[FormSubmitionController::class,'FormPost']);
Route::POST('/class2/_2_postt',[FormSubmitionController::class,'Postt']);
#endregion

/*________________________________ Class 3 form all Controlles___________________________________ */
#region Class_3_
// Route::get('/class2/_2_postForm',[FormSubmitionController::class,'FormPost']);
// Route::POST('/class2/_2_postt',[FormSubmitionController::class,'Postt']);
#endregion
