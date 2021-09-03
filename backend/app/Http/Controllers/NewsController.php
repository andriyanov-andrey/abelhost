<?php

namespace App\Http\Controllers;

use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function all() {
        return NewsResource::collection(News::all());
    }

    public function show($id) {
        return new NewsResource(News::find($id));
    }

    public function create(Request $request) {
        return News::create($request->all());
    }

    public function update(Request $request, $id) {
        $article = News::findOrFail($id);
        $article->update($request->all());
        return $article;
    }

    public function delete(Request $request, $id) {
        $article = News::findOrFail($id);
        $article->delete();
        return 204;
    }
}
