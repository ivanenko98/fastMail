<?php

namespace App\Http\Controllers;

use App\Bunch;
use App\Http\Requests\BunchRequest;
use App\Observers\BunchObserver;
use App\User;
use Illuminate\Http\Request;

class BunchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['bunches'] = Bunch::owned()->get();
        return view('bunch.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bunch.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Bunch $bunch
     * @param BunchRequest|Request $request
     * @return \Illuminate\Http\Response
     * @internal param User $user
     */
    public function store(Bunch $bunch, BunchRequest $request)
    {
        if (!empty($request->name)&&!empty($request->description)) {
            $bunch->name = $request->name;
            $bunch->description = $request->description;
        }else{
            return redirect()->route('bunches.create');
        }
        $bunch->save();

        return redirect()->route('bunches.index')->withMessage('Bunch has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param Bunch $bunch
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function show(Bunch $bunch, User $user)
    {
        if ($user->can('view', $bunch)) {
            return view('bunch.show', compact('bunch'));
        }else{
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Bunch $bunch
     * @param User $user
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(Bunch $bunch, User $user)
    {
        if ($user->can('view', $bunch)) {
            return view('bunch.edit', compact('bunch'));
        }else{
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Bunch $bunch
     * @param BunchRequest|Request $request
     * @return \Illuminate\Http\Response
     * @internal param User $user
     * @internal param int $id
     */
    public function update(BunchRequest $request, Bunch $bunch)
    {
        $bunch->update($request->all());

        return redirect()->route('bunches.index')->withMessage('Bunch has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Bunch $bunch
     * @param User $user
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(Bunch $bunch, User $user)
    {
        if ($user->can('delete', $bunch)) {
            $bunch->delete();
            return redirect()->route('bunches.index')->withMessage('Bunch has been deleted');
        }else{
            abort(404);
        }
    }


    public static function boot()
    {
        parent::boot();
        parent::observe(new BunchObserver());
    }
}
