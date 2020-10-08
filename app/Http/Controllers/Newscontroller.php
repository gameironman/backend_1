<?php

namespace App\Http\Controllers;

use App\news;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class Newscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news_list = News::all();
        return view('admin.new', compact('news_list'));
        // $
        // return view('/admin/new',compact());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = $request->all();

        if ($request->hasFile('img_url')) {
            $file = $request->file('img_url');
            $path = $this->fileUpload($file, 'news');
            $requestData['img_url'] = $path;
        }

        news::create($requestData);
        return redirect('/admin/new');
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
        $list = DB::table('news')->where('id','=',$id)->first();
        // dd($list);
        return view('admin.edit', compact('list'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $new_id)
    {
        $news=news::find($new_id);
        $requestData=$request->all();

        if($request->hasFile('img_url')){
            $old_image=$news->image_url;
            File::delete(public_path() . $old_image);

            $file=$request->file('img_url');
            $path=$this->fileUpload($file,'new');

            $requestData['img_url']=$path;

        }

        $news->update($requestData);
        return redirect('/admin/new');




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($new_id)
    {
        $item = news::find($new_id);
        $old_image = $item->img_url;
        if (file_exists(public_path() . $old_image)) {
            File::delete(public_path() . $old_image);
        }
        $item->delete();

        return redirect('/admin/new');
    }


    private function fileUpload($file, $dir)
    {
        //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
        if (!is_dir('upload/')) {
            mkdir('upload/');
        }
        //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
        if (!is_dir('upload/' . $dir)) {
            mkdir('upload/' . $dir);
        }
        //取得檔案的副檔名
        $extension = $file->getClientOriginalExtension();
        //檔案名稱會被重新命名
        $filename = strval(time() . md5(rand(100, 200))) . '.' . $extension;
        //移動到指定路徑
        move_uploaded_file($file, public_path() . '/upload/' . $dir . '/' . $filename);
        //回傳 資料庫儲存用的路徑格式
        return '/upload/' . $dir . '/' . $filename;
    }
}
