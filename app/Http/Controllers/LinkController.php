<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLinkRequest;
use App\Http\Requests\UpdateLinkRequest;
use App\Models\Link;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('links.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLinkRequest $request)
    {
        /** @var User $user */

        $user = Auth::user();

        $user->links()->create($request->validated());

        // Link::query()->create(
        //     array_merge(
        //         $request->validated(),
        //         ['user_id' => Auth::id()]
        //     )
        // );

        return to_route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Link $link)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Link $link)
    {

        //$link = Link::query()->findOrFail($id);

        return view('links.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLinkRequest $request, Link $link)
    {
        //dd($request->all(), $link);

        /** Update with object */
        // $link->link = $request->link;
        // $link->name = $request->name;
        // $link->save();

        /** Simple update */
        $link->fill($request->validated())->save();

        return to_route('dashboard')->with('message', "Link $link->name foi atualizado com sucesso");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Link $link)
    {
        $link->delete();

        return to_route('dashboard')->with('message', "Link $link->name foi deletado com sucesso");
    }

    public function down(Link $link)
    {
        $order = $link->sort;
        $newOrder = $order + 1;

        /** @var User $user */
        $user = Auth::user();

        $swapWith = $user->links()->where('sort', '=', $newOrder)->first();

        $link->fill(['sort' => $newOrder])->save();
        $swapWith->fill(['sort' => $order])->save();


        return back();
    }

    public function up(Link $link)
    {

        $order = $link->sort;
        $newOrder = $order - 1;

        /** @var User $user */
        $user = Auth::user();

        $swapWith = $user->links()->where('sort', '=', $newOrder)->first();

        $link->fill(['sort' => $newOrder])->save();
        $swapWith->fill(['sort' => $order])->save();


        return back();
    }
}
