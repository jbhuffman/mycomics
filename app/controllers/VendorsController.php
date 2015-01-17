<?php

class VendorsController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // get all of my vendors
        $vendors = Vendor::select('id', 'name', 'url')
            ->orderby('name', 'asc')
            ->get();

        // load the view and pass the vendors
        return View::make('vendors.index', array('title' => 'My Comics :: Vendors'))
            ->with('vendors', $vendors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $vendors = Vendor::select('name', 'id', 'url')
            ->where('is_deleted', '=', 0)
            ->orderby('name', 'asc')
            ->get();

        // load the create form (app/views/vendors/create.blade.php)
        return View::make('vendors.create')
            ->with('vendors', $vendors);
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
            return Redirect::to('vendors/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $vendor = new Vendor;
            $vendor->name = Input::get('name');
            $vendor->url = Input::get('url');
            $vendor->save();

            // redirect
            Session::flash('message', 'Successfully added vendor!');
            return Redirect::route('vendors.index');
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
        // get the vendor
        $vendor = Vendor::find($id);

        // show the view and pass the vendor to it
        return View::make('vendors.show')
            ->with('vendor', $vendor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        // get the vendor
        $vendor = Vendor::find($id);

        // show the edit form and pass the vendor
        return View::make('vendors.edit')
            ->with('vendor', $vendor);
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
            return Redirect::to('vendors/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $vendor = Vendor::find($id);
            $vendor->name = Input::get('name');
            $vendor->save();

            // redirect
            Session::flash('message', 'Successfully updated vendor!');
            return Redirect::route('vendors.index');
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
        $vendor = Vendor::find($id);
        $vendor->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the vendor!');
        return Redirect::route('vendors.index');
    }

}
