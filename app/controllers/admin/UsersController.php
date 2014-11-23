<?php

class Admin_UsersController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::paginate();
        return View::make('admin/users/list')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // Creamos un nuevo objeto User para ser usado por el helper Form::model
        $user = new User;
        $form_data = array('route' => 'admin.users.store', 'method' => 'POST');
        $action    = 'Crear..';

        return View::make('admin/users/form', compact('user', 'form_data', 'action'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //Creamos un nuevo objeto para nuestro nuevo usuario
        $user = new User;
        //Obtenemos la data enviada por el usuario
        $data = Input::all();

        //Revisamos si la data es válido
        if ($user->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $user->fill($data);
            // Guardamos el usuario
            $user->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('admin.users.show', array($user->id));
        }
        else
        {
            // En caso de error regresa a la acción create con los datos y los errores encontrados
            return Redirect::route('admin.users.create')->withInput()->withErrors($user->errors);
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
        return 'Aqui mostramos la info del usuario: '.$id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        if (is_null ($user))
        {
            App::abort(404);
        }

        $form_data = array('route' => array('admin.users.update', $user->id), 'method' => 'PATCH');
        $action    = 'Editar';

        return View::make('admin/users/form', compact('user', 'form_data', 'action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        // Creamos un nuevo objeto para nuestro nuevo usuario
        $user = User::find($id);

        // Si el usuario no existe entonces lanzamos un error 404 :(
        if (is_null ($user))
        {
            App::abort(404);
        }

        // Obtenemos la data enviada por el usuario
        $data = Input::all();

        // Revisamos si la data es válida y guardamos en ese caso
        if ($user->validAndSave($data))
        {
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('admin.users.show', array($user->id));
        }
        else
        {
            // En caso de error regresa a la acción create con los datos y los errores encontrados
            return Redirect::route('admin.users.edit', $user->id)->withInput()->withErrors($user->errors);
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
        //
    }

}