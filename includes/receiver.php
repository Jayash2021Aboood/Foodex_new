<?php
// ====================================================
// ====================================================
// ======================= Start Receiver Part ===========

class Receiver
{
	public $id;
	public $name;
	public $location;
	public $phone;
	public $email;
	public $password;
	public $active;

	function __construct($row)
	{
		$this->setData($row);
	}
	
	function setData($row)
	{
		if(is_array($row))
		{
			$this->id = $row[0];
			$this->name = $row[1];
			$this->location = $row[2];
			$this->phone = $row[3];
			$this->email = $row[4];
			$this->password = $row[5];
			$this->active = $row[6];
		}
	}

}

function getAllReceivers()
{
	return selectAndOrder("select * from receiver","id","desc");
}

function getReceiverById($id)
{
	return selectById("*","receiver", $id);
}

function getReceiverByName($search)
{
	return select("SELECT * FROM receiver WHERE name like '%$search%' and active = 1");
}

function addReceiver( $name, $location, $phone, $email, $password, $active)
{
    $sql = 
		"INSERT INTO receiver VALUES(null,
'$name','$location','$phone','$email','$password',$active)";	return query($sql);
}

function updateReceiver( $id, $name, $location, $phone, $email, $password, $active)
{
    $sql = 
		"UPDATE receiver SET 
		name = '$name'
,		location = '$location'
,		phone = '$phone'
,		email = '$email'
,		password = '$password'
,		active = $active
		WHERE id = $id ";
    return query($sql);
}

function deleteReceiver($id)
{   
     return query("DELETE FROM receiver WHERE id = $id");
}
?>


