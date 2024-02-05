<?php

namespace App\Http\Controllers;

use App\Models\posts;
use App\Models\profiles;
use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    // show the users from the database
    public function view()
    {
        $user = User::orderBy('id','asc')->get();
        return view('users', ['users' => $user]);
    }

    // add user form
    public function addUser(){
        return view('adduser');
    }

    // store new user
    public function saveNewUser(Request $request){
        // $name = request('name');
        // $phone = request('phone');
        // $email = request('email');

        $name = $request->get('name');
        $phone = $request->get('phone');
        $email = $request->get('email');

        $validatedData = $request->validate([
            'name' => ['required'],
            'phone' => ['required'],
            'email' => ['required']
        ]);

        $data = ['name' => $name, 'phone' => $phone, 'email' => $email];

        $newUser = User::create($data);

        return to_route('Users.table');
    }

    // show profiles from the database
    public function viewProfile($id)
    {
        $user = User::where('id', $id)->with('profile')->first();

        return view('profiles.profile', ['user' => $user]);
    }

    // show profile form
    public function makeProfile($user_id){
        return view('profiles.makeprofile',['user_id' => $user_id]);
    }

    // save the profile to database
    public function saveProfile($user_id){
        $picture = request('picture');
        $about = request('about');

        $newProfile = profiles::create(['picture' => $picture, 'about' => $about , 'user_id' => $user_id]);

        return redirect('profile/' . $user_id);
    }

    // show posts from the database
    public function viewPosts($id)
    {
        $user = User::where('id', $id)->with('posts')->first();

        return view('posts.posts', ['user' => $user]);
    }

        // add new post
    public function addposts($id)
    {
        return view('posts.addPost', ['user_id' => $id]);
    }

    // store the new post in the database
    public function storePosts(Request $request)
    {
        $post_description = $request->get('post_description');
        $user_id = $request->get('user_id');

        $validatedData = $request->validate([
            'post_description' => ['required', 'min:30'],
        ]);

        $data = [
            'post_description' => $post_description,
            'user_id' => $user_id
        ];

        $newPost = posts::create($data);

        return redirect('posts/'.$user_id);
    }

    // show the edit user form
    public function editUser($id){
        return view('editUser', ['user_id' => $id]);
    }

    // save the update to the database
    public function storeUser(Request $request){
        $name = $request->get('name');
        $phone = $request->get('phone');
        $email = $request->get('email');
        $user_id = $request->get('user_id');

        $user = User::whereid($user_id)->update(['name' => $name, 'phone' => $phone, 'email' => $email]);

        return redirect('usersTable');
    }

    // show the edit post form
    public function editPost($user_id, $post_id){
        return view('posts.editPost', ['user_id' => $user_id, 'post_id' => $post_id]);
    }

    // save the updated post to the database
    public function postSave(Request $request){
        $post_description = $request->get('post_description');
        $post_id = $request->get('post_id');
        $user_id = $request->get('user_id');

        $newPost = posts::whereid($post_id)->update(['post_description' => $post_description]);

        return redirect('posts/' . $user_id );
    }

    // delete post
    public function deletePost($user_id, $post_id){
        $delpost = posts::whereid($post_id)->delete();
        return redirect('posts/' . $user_id);
    }

    // delete user
    public function deleteUser($user_id){
        $delUser = User::whereid($user_id)->delete();
        $delpost = posts::where('user_id', $user_id)->delete();    

        return redirect('usersTable');
    }
}
