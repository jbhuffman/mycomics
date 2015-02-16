<?php

class PublishersController extends \BaseController
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
        $publishers = Publisher::select('*')
            ->orderby('name', 'asc')
            ->with('titles')
            ->get();

        // load the view and pass the books
        return View::make('publishers.index')
            ->with('publishers', $publishers);
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
            ->get();

        // load the create form (app/views/mybooks/create.blade.php)
        return View::make('publishers.create')
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
            'name' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('publishers/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $publisher = new Publisher;
            $publisher->name = Input::get('name');
            $publisher->save();

            // redirect
            Session::flash('message', 'Successfully added publisher!');
            return Redirect::route('publishers.index');
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
        $publisher = Publisher::find($id);
        $titles = Title::select('*')
            ->where('publisher_id', '=', $id)
            ->where('is_deleted', '!=', '1')
            ->with('mybooks')
            ->get();

        // show the view and pass the publisher to it
        return View::make('publishers.show')
            ->with('publisher', $publisher)
            ->with('titles', $titles);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        // get the publisher
        $publisher = Publisher::find($id);

        // show the edit form and pass the publisher
        return View::make('publishers.edit')
            ->with('publisher', $publisher);
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
            'name' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the update
        if ($validator->fails()) {
            return Redirect::to('publishers/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $publisher = Publisher::find($id);
            $publisher->name = Input::get('name');
            $publisher->save();

            // redirect
            Session::flash('message', 'Successfully updated publisher!');
            return Redirect::route('publishers.index');
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
        $publisher = Publisher::find($id);
        $publisher->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the publisher!');
        return Redirect::route('publishers.index');
    }

}
