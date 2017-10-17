<?php

namespace App\Http\Controllers;

use App\Http\Requests\TemplateRequest;
use App\Observers\TemplateObserver;
use App\User;
use Illuminate\Http\Request;
use App\Template;
use Illuminate\Support\Facades\Auth;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['templates'] = Template::owned()->get();
        return view('template.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('template.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Template $template
     * @param TemplateRequest|Request $request
     * @return \Illuminate\Http\Response
     * @internal param User $user
     */
    public function store(Template $template, TemplateRequest $request)
    {
        if (!empty($request->name)&&!empty($request->content)) {
            $template->name = $request->name;
            $template->content = $request->content;
        }else{
            return redirect()->route('templates.create');
        }

        $template->save();

        return redirect()->route('templates.index')->withMessage('Template has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param Template $template
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function show(Template $template, User $user)
    {
        if ($user->can('view', $template)) {
            return view('template.show', compact('template'));
        }else{
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Template $template
     * @param User $user
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(Template $template, User $user)
    {
        if ($user->can('view', $template)) {
            return view('template.edit', compact('template'));
        }else{
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TemplateRequest|Request $request
     * @param Template $template
     * @return \Illuminate\Http\Response
     * @internal param User $user
     * @internal param int $id
     */
    public function update(TemplateRequest $request, Template $template)
    {
        if (!empty($request->name)&&!empty($request->content)) {
            $template->name = $request->name;
            $template->content = $request->content;
        }else{
            return redirect()->route('templates.create');
        }
        $template->save();

        return redirect()->route('templates.index')->withMessage('Template has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Template $template
     * @param User $user
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(Template $template, User $user)
    {
        if ($user->can('delete', $template)) {
            $template->delete();
            return redirect()->route('templates.index')->withMessage('Template has been deleted');
        }else{
            abort(404);
        }
    }

    public static function boot()
    {
        parent::boot();
        parent::observe(new TemplateObserver());
    }
}
