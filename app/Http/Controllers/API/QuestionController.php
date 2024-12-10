<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        
        $questions = Question::latest()->paginate(5);
        return new PostResource(true, 'List Data Questions', $questions);
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title'     => 'required',
            'question'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/questions', $image->hashName());

        //create question
        $question = Question::create([
            'image'     => $image->hashName(),
            'title'     => $request->title,
            'question'   => $request->question,
            'pilihan'   => $request->pilihan,
        ]);

        //return response
        return new PostResource(true, 'Data Question Berhasil Ditambahkan!', $question);
    }

    public function show($id)
    {
        
        $question = Question::find($id);

        return new PostResource(true, 'Detail Data Question!', $question);
    }

    public function update(Request $request, $id)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'title'     => 'required',
            'question'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //find question by ID
        $question = Question::find($id);
        if(!$question){
             return new PostResource(false, 'Invalid ID', $question);
        }

        //check if image is not empty
        if ($request->hasFile('image')) {

            //upload image
            $image = $request->file('image');
            $image->storeAs('public/questions', $image->hashName());

            //delete old image
            Storage::delete('public/questions/'.basename($question->image));

            //update post with new image
            $question->update([
                'image'     => $image->hashName(),
                'title'     => $request->title,
                'question'   => $request->question,
                'pilihan'   => $request->pilihan,
            ]);

        } else {

            //update post without image
            $question->update([
                'title'     => $request->title,
                'question'   => $request->question,
                'pilihan'   => $request->pilihan,
            ]);
        }

        //return response
        return new PostResource(true, 'Data Question Berhasil Diubah!', $question);
    }


    public function destroy($id)
    {

        //find question by ID
        $question = Question::find($id);

        //delete image
        Storage::delete('public/questions/'.basename($question->image));

        //delete question
        $question->delete();

        //return response
        return new PostResource(true, 'Data Question Berhasil Dihapus!', null);
    }

}
