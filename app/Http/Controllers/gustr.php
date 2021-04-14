<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;

class gustr extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = user::get();

        return view('test.display',['users'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        // return view('adduser',['title'=> ' Sky Walker']);
        return view('test.add',['title' => 'Add User']);
      
}

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $data =  $this->validate(request(),[
            'name'     => 'required|min:5|max:15',
            'email'    => 'required|email',
            'password' => 'required|min:6',
     ]);

     $data['password'] = bcrypt($data['password']);

     $op =  user::create($data);

      if($op){

               $message = "data inserted";
      }else{
               $mesage = "Error"; 
           }
           echo $message;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $data = User::findOrFail($id);
        return view('test.edit',['data' => $data,'title' => 'Edit gusts']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $data =  $this->validate(request(),[
            'name'     => 'required|min:5|max:10',
            'email'    => 'required|email',
        ]);
      
        $op = User::where('id',$id)->update($data);
      
           if($op){
           $message =  'updated';
           }else{
           $message =  'error in update';
           }
      
           session()->flash('Message',$message);

           return redirect('test');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //


        $op =   User::where('id',$id)->delete();

        if($op){
            $message = "user Deleted";
        }else{
            $message = "error in deleting user";
        }
        session()->flash('Message',$message);
   
   
            return redirect(url('test'));
       }
   
    
  public function login(){

    return view('test.login',['title' => 'Login']);

}



public function doLogin(Request $request){

  // logic


  $data = $this->validate(request(),[
    'email'    => 'required|email',
    'password' => 'required|min:6',
  ]);

   // Login

    $check = auth()->attempt($data,true);
if($check){
    return redirect(url('test'));
}else{

    session()->flash('Message','Password || email Invalid');
    return redirect(url('Login'));
}
}





public function logout(){

     auth()->logout();

     return redirect(url('Login'));

}


}
