<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/class3/_3_FormAllControlles',[FormSubmitionController::class,'FormAllControlles']);
Route::POST('/class3/_3_FormAllControllesPost',[FormSubmitionController::class,'FormAllControllesPost']);
#endregion


/*________________________________ Class 4 ORM ___________________________________ */
#region ORM
    //________ ORM (object Relational Mapping) ____________
    //1. CRUD krnaa asaan hotaa haa
    //2. Eloquent is  Laravel  ORM
    //..
    //..

    //__________ Requireds for ORM _______________
    //Database
    //Modals
    //Migrations


    //_______________ Steps _____________________
    //1. Add Database Name in  ---> .env file  (default user  -- root ,  default pass --- .)
    //1.1 Add Same Database like name in   mySQL

    //2. There Default Migraton ---> in database   (users, password_reset_tokens,personalAccestoken,failed_jobs)
    //3. so Simple   Add   -> php artisan migrate  (stil  we no need to make migration)


    //_______________ Create Custom Migration _____________________
    //1. php artisan make:migration create_students_table
    //2. Add   name , email    files 
    //3.  run  php artisan  migrate

#endregion


/*________________________________ Class 5 Migration ___________________________________ */
#region Migration __ Modals
    //_________________________ Migration ______________________________
    //_______ Migration  Command ________
    //1. php artisan make:migration  create_NameTbl_table   ----> create migration
    //2. php artisan migrate                                ----> execute migration in database
    //3. php artisan migrate:reset                          ----> to  RollBack All migrations (delete all migration)
    //4. php artisan migrate:refersh                        ----> reset  All migration (delete , and again create)

    //__ refersh ____
    //jb  hum    table me  koi  change  krna ho to  hum ----> migration refersh krtaa han
    //Danger ::    if  there is Data in Table then it will also be  deleted

    //__ Creating New Migration with ----> Teacher <----- ____
    
    //_________________________ Models ______________________________
    //Jo Migration bnata han  us kaa
    //1. Model bna gaa
    //2. Controller to bna ga he bna gaa
    
    //run --> php artisan make:model Teacher

    //____ Steps ____
    //1. Connect  model with --> migration table
    //2. add  Primary key
    //3. Add controller 
    //4. add routing
    use App\Http\Controllers\TeacherController;
    Route::get("/Teachers/Get",[TeacherController::class,"Index"]);
    //5. View for action 
    
    //________ 1. Get __________
    //--> getting list of user  ---> adding dummy Records in Database
    
    //________ 2. Create __________
    Route::get("/Teachers/Create",[TeacherController::class,"Create"]);
    Route::post("/Teachers/CreatePost",[TeacherController::class,"CreatePost"]);

#endregion