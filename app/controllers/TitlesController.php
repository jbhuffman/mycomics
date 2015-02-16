<?php

class TitlesController extends \BaseController
{

    public function __construct()
    {
        $this->beforeFilter('auth', array('except' => array('index', 'show')));

        $this->beforeFilter('csrf', array('on' => array('post', 'put', 'delete')));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // get all titles
        $titles = Title::select('*')->orderby('title')->with('mybooks')->get();

        // load the view and pass the titles
        return View::make('titles.index')
            ->with('titles', $titles);
    }

    /**
     * Search, AJAX style
     */
    public function searchAjax()
    {
        $result = Title::select('id','title','publisher_id')->with('publisher');

        return Datatables::of($result)->make();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $publishers = Publisher::select('name', 'id')
            ->where('is_deleted', '=', 0)
            ->orderby('name', 'asc')
            ->remember(5)
            ->get();

        $temp = array();
        foreach ($publishers as $publisher) {
            $temp[$publisher->id] = $publisher->name;
        }
        $publishers = $temp;
		// load the create form (app/views/titles/create.blade.php)
        return View::make('titles.create')
            ->with('publishers', $publishers);
    }


    /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */
    public function store()
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'title' => 'required',
            'publisher_id' => 'required|numeric',
            'time_frame' => 'required',
            'series_type' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('titles/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $title = new Title;
            $title->title = Input::get('title');
            $title->publisher_id = Input::get('publisher_id');
            $title->time_frame = Input::get('time_frame');
            $title->series_type = Input::get('series_type');
            $title->main_issues = Input::get('main_issues');
            $title->annuals = Input::get('annuals');
            $title->specials = Input::get('specials');
            $title->missing_issues = Input::get('missing_issues');
            $title->comments = Input::get('comments');
            $title->is_active = Input::get('is_active') ?: 1;
            $title->is_complete = Input::get('is_complete') ?: 0;
            $title->is_subscribed = Input::get('is_subscribed') ?: 1;
            $title->is_deleted = Input::get('is_deleted') ?: 0;

            $title->save();

            // redirect
            Session::flash('message', 'Successfully added title!');
            return Redirect::to('titles');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        // get the title
        $title = Title::find($id);
        $issues = MyBook::select('id','issue', 'printing', 'condition', 'released')
            ->where('titleid', '=', $id)
            ->orderby('released', 'asc')
            ->orderby('issue', 'asc')
            ->orderby('printing', 'asc')
            ->get();

        // show the view and pass the title to it
        return View::make('titles.show')
            ->with('title', $title)
            ->with('issues', $issues);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        // get the title
        $title = Title::find($id);

        $publishers = Publisher::select('name', 'id')
            ->where('is_deleted', '=', 0)
            ->orderby('name', 'asc')
            ->get();

        $temp = array();
        foreach ($publishers as $publisher) {
            $temp[$publisher->id] = $publisher->name;
        }
        $publishers = $temp;
        // show the edit form and pass the title
        return View::make('titles.edit')
            ->with('title', $title)
            ->with('publishers', $publishers);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'title' => 'required',
            'publisher_id' => 'required|numeric',
            'time_frame' => 'required',
            'series_type' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the update
        if ($validator->fails()) {
            return Redirect::to('titles/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $title = Title::find($id);
            $title->title = Input::get('title');
            $title->publisher_id = Input::get('publisher_id');
            $title->time_frame = Input::get('time_frame');
            $title->series_type = Input::get('series_type');
            $title->main_issues = Input::get('main_issues');
            $title->annuals = Input::get('annuals');
            $title->specials = Input::get('specials');
            $title->missing_issues = Input::get('missing_issues');
            $title->comments = Input::get('comments');
            $title->is_active = Input::get('is_active') ?: 1;
            $title->is_complete = Input::get('is_complete') ?: 0;
            $title->is_subscribed = Input::get('is_subscribed') ?: 1;
            $title->is_deleted = Input::get('is_deleted') ?: 0;

            $title->save();

            // redirect
            Session::flash('message', 'Successfully updated title!');
            return Redirect::to('titles');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        // delete
        $title = Title::find($id);
        $title->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the title!');
        return Redirect::to('titles');
    }

}
