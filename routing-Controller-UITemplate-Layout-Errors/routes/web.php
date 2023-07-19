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
#region Class_4 ORM
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
#region Class_5  (Select & Insert) Migration __ Modals _  
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


/*________________________________ Class 5 Migration / Model ___________________________________ */
#region Class_6 (Edit , Delete ) CRUD complete
Route::get("/Teachers/Edit/{id}",[TeacherController::class,"Edit"]);
Route::POST("/Teachers/EditPost/{id}",[TeacherController::class,"EditPost"]);

Route::get("/Teachers/delete/{id}",[TeacherController::class,"delete"]);
#endregion

/*________________________________ Class 6 DB Query ___________________________________ */
#region Class_7  DB Query CRUD  vs  Migraton/Model
    //____________ 1. DB Query ____________________
    /*
        1. DB Query refers to using the database query builder provided by Laravel to interact with the database directly.
        2. It allows you to write SQL queries in a more expressive and fluent manner using the Laravel query builder methods.
        3. With the DB query builder, you can perform various operations like selecting, inserting, updating, and deleting data from the database.
        4. It provides a way to work with databases without the need for creating model classes.
    */

    //____________ 2. Model Migration ____________________
    /*
        1. Model Migration refers to creating and modifying database tables and their structures using Laravel's migration feature.
        2. Migrations are like version control for your database schema. They allow you to define the structure of your database tables and keep them in sync with your codebase.
        3. Migrations are written in PHP and use Laravel's Schema Builder to define the tables, columns, indexes, and other database elements.
        4. Migrations are executed through the command line, and Laravel keeps track of which migrations have been run and allows you to roll back or re-run them as needed.
        5. Migrations are often used in conjunction with Eloquent models, as they provide a convenient way to create and modify the underlying database tables for your models.
    */

    //____________  Disadvantages of DB queyr ____________________
    /*
        1. SQL Knowledge:    bhot hona chya
        2. Limited Model Relationship Integration  :   The DB query builder is independent of Laravel's Eloquent ORM, which means it doesn't provide direct support for model relationships
        3. Complexity :   complex query likhnaee parin gee
        4. Potential for SQL Injection   :   Hacking  issue
        5. Query Optimization   :  Complex DB Query make application ,,,   laravel  ORM  provide   Query Optimization  which make Application  Faster . 
    */


    //_________________ Working ___________________
    //1. Create  student Table in  MYSQL
    //2. Create Controler
    use App\Http\Controllers\StudentController;

    Route::get('/Dashboard/Student/Index', [StudentController::class, 'index'])->name('students.index');

    //create
    Route::get('/Dashboard/Student/create', [StudentController::class, 'create'])->name('students.create');
    Route::post('/Dashboard/Student/store', [StudentController::class, 'store'])->name('students.store');

    //edit
        Route::get('/Dashboard/Student/edit/{id}', [StudentController::class, 'edit'])->name('students.edit');
        Route::put('/Dashboard/Student/{id}', [StudentController::class, 'update'])->name('students.update');

    //view signle
    // Route::get('/Dashboard/Student/{id}', [StudentController::class, 'show'])->name('students.show');

    //delete
    Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
#endregion


/*________________________________ Class 7 DB Query ___________________________________ */
#region class_8  Update_Migration
    //after create migration how to update migration

    //___ 1.  create migration 
    //php artisan make:migration create_roles_table

    //___ 2.  add column migration ___________
    //php artisan make:migration create_createdby_column_to_roles_table
    
    //___ 3.  delete column migration
    //php artisan make:migration remove_status_from_roles
    //$table->dropColumn('status');
#endregion

/*________________________________ Class 8 Converting Application on Local Server___________________________________ */
#region project
    //ager hum direct  localhost par run krain gaa to  PUblic  url dana paraa gaa
    //to humain  project ko public bnana hota ha


    //______  Remove Public File _______________
    //1. Remove Public from  URL 
        //Go to   vender/laravel/framework/src/iluminute/fundation/resources/
        //copy server.php file and past in project 
        //change name to  index.php
        //change directlroy   :/public/index.php
        //copy  .htacess  file form public and past to project folder

    //2.  Protect .Env  file from Project
    
    //3. Ready to go  --> after this you also can deply project
#endregion

