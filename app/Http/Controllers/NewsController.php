<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\News;
use App\Models\Shop;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Shop $shop)
    {
        $news = News::latest()
            ->with(['shop'])
            ->where('shop_id', $shop->id)
            ->get();

        return inertia('News/Index', [
            'news' => $news,
            'count' => $news->count(),
            'shop' => $shop->id,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Shop $shop)
    {
        return inertia('News/Create', [
            'shop' => $shop->id,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewsRequest $request, Shop $shop)
    {
        News::create([
            'title' => $request->validated()['title'],
            'body' => $request->validated()['body'],
            'shop_id' => $shop->id,
        ]);

        $request->session()->flash('flash.banner', __('crud-messages.store'));

        return redirect()->route('shops.news.index', [$shop->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        return inertia('News/Show', [
            'news' => $news,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shop $shop, News $news)
    {
        return inertia('News/Edit', [
            'news' => $news,
            'shop' => $shop->id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewsRequest $request, Shop $shop, News $news)
    {
        $news->update([
            'title' => $request->validated()['title'],
            'body' => $request->validated()['body'],
        ]);

        $request->session()->flash('flash.banner', __('crud-messages.update'));

        return redirect()->route('shops.news.index', [$shop->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Shop $shop, News $news)
    {
        // TODO: Check if news article from right shop before delete.

        $news->delete();

        $request->session()->flash('flash.banner', __('crud-messages.delete'));

        return redirect()->route('shops.news.index', [$shop->id]);
    }
}
