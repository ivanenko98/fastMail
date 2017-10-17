<?php

namespace App\Http\Controllers;

use App\Bunch;
use App\subscriber;
use App\Http\Requests\SubscriberRequest;
use App\Observers\SubscriberObserver;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $bunch_id
     * @param User $user
     * @param subscriber $subscriber
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function index($bunch_id, User $user, Subscriber $subscriber)
    {
        $bunches = Bunch::all()->where('id', $bunch_id);

        if(sizeof($bunches)){
            foreach ($bunches as $bunch){
                if (Auth::user()->id === $bunch->created_by) {
                    $data['subscribers'] = Subscriber::owned()->where('bunch_id', $bunch_id)->get();
                    $data['bunches'] = $bunches;
                    return view('subscriber.index', $data)->with('bunch_id', $bunch_id);
                }else{
                    abort(404);
                }
            }
        }else{
            abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('subscriber.create')->with('id', $id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param $bunch_id
     * @param Subscriber $subscriber
     * @param SubscriberRequest|Request $request
     * @return \Illuminate\Http\Response
     * @internal param $id
     * @internal param Auth $auth
     */
    public function store($bunch_id, Subscriber $subscriber, SubscriberRequest $request)
    {
        if (!empty($request->name)&&!empty($request->email)) {
            $subscriber->name = $request->name;
            $subscriber->surname = $request->surname;
            $subscriber->email = $request->email;
            $subscriber->bunch_id = $bunch_id;
        }else{
            return redirect()->route('subscribers.create');
        }

        $subscriber->save();

        return redirect()->route('bunches::subscribers.index', $bunch_id)->withMessage('Subscriber has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param $bunch_id
     * @param Subscriber $subscriber
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function show($bunch_id, Subscriber $subscriber, User $user)
    {
        if ($user->can('view', $subscriber)) {
            return view('subscriber.show', compact('subscriber'))->with('bunch_id', $bunch_id);
        }else{
            abort(404);
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param $bunch_id
     * @param Subscriber $subscriber
     * @param User $user
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit($bunch_id, Subscriber $subscriber, User $user)
    {
        if ($user->can('view', $subscriber)) {
            return view('subscriber.edit', compact('subscriber'))->with('bunch_id', $bunch_id);
        }else{
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $bunch_id
     * @param SubscriberRequest|Request $request
     * @param Subscriber $subscriber
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update($bunch_id, SubscriberRequest $request, Subscriber $subscriber)
    {
        if (!empty($request->name)&&!empty($request->surname)&&!empty($request->email)) {
            $subscriber->name = $request->name;
            $subscriber->surname = $request->surname;
            $subscriber->email = $request->email;
        }else{
            return redirect()->route('bunches::subscribers.create', $bunch_id);
        }
        $subscriber->save();

        return redirect()->route('bunches::subscribers.index', $bunch_id)->withMessage('Subscriber has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $bunch_id
     * @param Subscriber $subscriber
     * @param User $user
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy($bunch_id, Subscriber $subscriber, User $user)
    {
        if ($user->can('delete', $subscriber)) {
            $subscriber->delete();
            return redirect()->route('bunches::subscribers.index', $bunch_id)->withMessage('Subscriber has been deleted');
        }else{
            abort(404);
        }
    }
    
    public static function boot()
    {
        parent::boot();
        parent::observe(new SubscriberObserver());
    }
}
