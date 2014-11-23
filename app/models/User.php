<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

    protected $fillable = array('email', 'full_name', 'password');

    protected $perPage = 2;

    public $errors;

    public function isValid($data)
    {
        $rules = array(
            'email'     => 'required|email|unique:users',
            'full_name' => 'required|min:4|max:40',
            'password'  => 'min:8|confirmed'
        );

        // Si el usuario existe:
        if ($this->exists)
        {
            //Evitamos que la regla “unique” tome en cuenta el email del usuario actual
            $rules['email'] .= ',email,' . $this->id;
        }
        else // Si no existe...
        {
            // La clave es obligatoria:
            $rules['password'] .= '|required';
        }

        $validator = Validator::make($data, $rules);

        if ($validator->passes())
        {
            return true;
        }

        $this->errors = $validator->errors();

        return false;
    }

    public function setPasswordAttribute($value)
    {
        if ( ! empty ($value))
        {
            $this->attributes['password'] = Hash::make($value);
        }
    }

    public function validAndSave($data)
    {
        // Revisamos si la data es válida
        if ($this->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $this->fill($data);
            // Guardamos el usuario
            $this->save();

            return true;
        }

        return false;
    }

}
