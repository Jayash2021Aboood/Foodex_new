<?php
// ====================================================
// ====================================================
// ======================= Start Donator Part ===========

class Donator
{
	public $id;
	public $type;
	public $name;
	public $corporate_field;
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
			$this->type = $row[1];
			$this->name = $row[2];
			$this->corporate_field = $row[3];
			$this->phone = $row[4];
			$this->email = $row[5];
			$this->password = $row[6];
			$this->active = $row[7];
		}
	}

}

function getAllDonators()
{
	return selectAndOrder("select * from donator","id","desc");
}

function getDonatorById($id)
{
	return selectById("*","donator", $id);
}

function getDonatorByName($search)
{
	return select("SELECT * FROM donator WHERE name like '%$search%' and active = 1");
}

function addDonator( $type, $name, $corporate_field, $phone, $email, $password, $active)
{
    $sql = 
		"INSERT INTO donator VALUES(null,
'$type','$name','$corporate_field','$phone','$email','$password',$active)";	return query($sql);
}

function updateDonator( $id, $type, $name, $corporate_field, $phone, $email, $password, $active)
{
    $sql = 
		"UPDATE donator SET 
		type = '$type'
,		name = '$name'
,		corporate_field = '$corporate_field'
,		phone = '$phone'
,		email = '$email'
,		password = '$password'
,		active = $active
		WHERE id = $id ";
    return query($sql);
}

function deleteDonator($id)
{   
     return query("DELETE FROM donator WHERE id = $id");
}
?>


