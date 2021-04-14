<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\blog;

class blogcontroller extends Controller
{
    //


    // public function createblog(){
    //     echo 'this is my first controller page';
    // }
    
    
    // public function createblog(){
    //     return view('profile',['title'=> ' Sky Walker', 'name'=>' USER']);
    // }



    public function createuser(){
        return view('adduser',['title'=> ' Sky Walker']);
        
    }

    public function store(Request $request){

        // VALIDATE 
          
          $data =  $this->validate(request(),[
                   'name'     => 'required|min:5|max:15',
                   'email'    => 'required|email',
                   'password' => 'required|min:6',
            ]);
      
            $data['password'] = bcrypt($data['password']);

            $op =  blog::create($data);

             if($op){

                      $message = "data inserted";
             }else{
                      $mesage = "Error"; 
                  }
                  return view('adduser',['title'=> 'create user','message'=>$message]);
}

                public function display(){

                             $data = blog::get();
                      return view ('display',['userData'=> $data]);
}




                public function delete(Request $request){
    

                             $id = $request->id;

                        $op =  blog::where('id',$id)->delete();

                         return redirect('displayUsers');


}



public function edit(Request $request)
{
    // code . . . 

     // where('id',$request->id)->get()->first();
     // find
    $data = blog::findOrFail($request->id);

    return view('edit',['userData' => $data , 'title' => 'Edit user']);

}




public function update(Request $request){

   // code 

       
   $data =  $this->validate(request(),[
      'name'     => 'required|min:5|max:10',
      'email'    => 'required|email',
  ]);


     // ['name' => $request->name,'email' => $request->email]
    $op = blog::where('id',$request->id)->update($data);

     if($op){
     $message =  'updated';
     }else{
     $message =  'error in update';
     }

     return redirect('displayUsers');


}



}







