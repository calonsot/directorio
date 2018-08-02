<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $id;

	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$credenciales = $this->validaLogin($this->username);

		if($credenciales != NULL)
		{
			$users=array(
					$this->username => $credenciales->passwd
			);

			if(!isset($users[$this->username]))
				$this->errorCode=self::ERROR_USERNAME_INVALID;
			elseif($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
			else
				$this->errorCode=self::ERROR_NONE;
			return !$this->errorCode;

		} else {
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}
	}

	/**
	 *
	 * @param string $usr el usuario
	 */
	public function validaLogin($usr)
	{
		$model = Usuarios::model()->findByAttributes(array('usuario'=>$usr));
		return $model;
	}
}