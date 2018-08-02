<?php
class EmptyToNull extends CFilterValidator
{
	public function emptyToNull($value)
	{
		// logic being applied before the action is executed
		return $value==='' ? null : $value;
	}
}