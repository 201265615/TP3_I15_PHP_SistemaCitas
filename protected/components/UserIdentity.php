<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;

	/**
	 * Authenticates a user.
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$user=Usuarios::model()->find('LOWER(CorreoElectronico)=?',array(strtolower($this->username)));
                //$user = array(
                //    'admin' => 'admin'
                //);
		if($user===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if(!$user->validatePassword($this->password))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
		{
			$this->_id=$user->idUsuario;
			$this->username=$user->CorreoElectronico;
                        $this->setState('name', $user->NombreCompleto);
                        $this->setState('correoElectronico', $user->CorreoElectronico);
                        $this->setState('telefono', $user->Telefono);
                        $this->setState('idIdioma', $user->Idiomas_idIdioma);
                        
			$this->errorCode=self::ERROR_NONE;
		}
		return $this->errorCode==self::ERROR_NONE;
	}

	/**
	 * @return integer the ID of the user record
	 */
	public function getId()
	{
		return $this->_id;
	}
}