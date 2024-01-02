<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function create(Request $request){
        
        // return Response()->json($request, 400); 
        $inputs = $request->only([
            'title',
            'cover',
            'category',
            'author',
            'content',
            'keyword',
            'caption',
            'isComentOn'
        ]);

        try {
            Post::create($inputs);
            return Response()->json(['status'=> 200, 'message'=> 'اطلاعات با موفقیت ثبت شد'], 200);
        } catch (Exception $error) {
            return Response()->json(['status'=> 401, 'message'=> 'اطلاعات این دانشجو قبلا ثبت شده است'], 401);
        }

    }

    public function update(Request $request, $id){
        //return Response()->json($request, 400); 
        $inputs = $request->only([
            'title',
            'cover',
            'category',
            'author',
            'content',
            'keyword',
            'caption',
            'isComentOn'
        ]);;

        try {
            //$post = Post::where(['id' => $id]) -> update($inputs);
            $post = Post::findOrFail($id) -> update($inputs);

            if($post){
                return Response()->json('the post updated successfuly', 200); 
            }else{
                return Response()->json('Updating the post ins failed!',401);
            }
        } catch (Exception $error) {
            return Response()->json($error, 400);
        }
    }

    public function delete($id){
        try {
            $status = Post::where(['id' => $id]) -> delete();

            if($status){
                $result = "the post id : $id delete successfuly";
                return Response()->json( $result , 200); 
            }else{
                $result = "Delteing the post id : $id is failed!";
                return Response()->json( $result ,401);
            }
        } catch (Exception $error) {
            return Response()->json($error, 400);
        }
    }

}
