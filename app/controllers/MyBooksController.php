<?php

class MyBooksController extends \BaseController
{
    public function __construct()
    {
        $this->beforeFilter('auth', array('except' => array('index', 'show')));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // get all of my books
        $mybooks = MyBook::join('titles as t', 't.id', '=', 'mybooks.titleid')
            ->orderby('t.title', 'asc')
            ->orderby('issue', 'asc')
            ->select('mybooks.*')
            ->get();
        // load the view and pass the books
        return View::make('mybooks.index')
            ->with('mybooks', $mybooks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $titles = Title::select('title', 'id')
            ->where('is_deleted', '=', 0)
            ->orderby('title', 'asc')
            ->get();

        $temp = array();
        foreach ($titles as $title) {
            $temp[$title->id] = $title->title;
        }
        $titles = $temp;
        // load the create form (app/views/mybooks/create.blade.php)
        return View::make('mybooks.create')
            ->with('titles', $titles);
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
            'titleid' => 'required|numeric',
            'issue' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('mybooks/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $mybook = new MyBook;
            $mybook->titleid = Input::get('titleid');
            $mybook->issue = Input::get('issue');
            $mybook->printing = Input::get('printing');
            $mybook->condition = Input::get('condition');
            $mybook->comments = Input::get('comments');
            // $mybook->vendor = Input::get('vendor');
            $mybook->released = Input::get('released');
            $mybook->is_special = Input::get('is_special') ?: 0;
            $mybook->save();

            // redirect
            Session::flash('message', 'Successfully added mybook!');
            return Redirect::route('mybooks.index');
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
        // get the mybook
        $mybook = MyBook::find($id);

        // show the view and pass the mybook to it
        return View::make('mybooks.show')
            ->with('mybook', $mybook);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        // get the mybook
        $mybook = MyBook::find($id);

        $titles = Title::select('title', 'id')
            ->where('is_deleted', '=', 0)
            ->orderby('title', 'asc')
            ->get();

        $temp = array();
        foreach ($titles as $title) {
            $temp[$title->id] = $title->title;
        }
        $titles = $temp;
        // show the edit form and pass the mybook
        return View::make('mybooks.edit')
            ->with('mybook', $mybook)
            ->with('titles', $titles);
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
            'titleid' => 'required|numeric',
            'issue' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the update
        if ($validator->fails()) {
            return Redirect::to('mybooks/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $mybook = MyBook::find($id);
            $mybook->titleid = Input::get('titleid');
            $mybook->issue = Input::get('issue');
            $mybook->printing = Input::get('printing');
            $mybook->condition = Input::get('condition');
            $mybook->comments = Input::get('comments');
            $mybook->vendor = Input::get('vendor');
            $mybook->released = Input::get('released');
            $mybook->is_special = Input::get('is_special');
            $mybook->save();

            // redirect
            Session::flash('message', 'Successfully updated mybook!');
            return Redirect::route('mybooks.index');
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
        $mybook = MyBook::find($id);
        $mybook->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the mybook!');
        return Redirect::route('mybooks.index');
    }

}
