<?php
// ====================================================
// ====================================================
// ======================= Start Donation Part ===========

class Donation
{
	public $id;
	public $name;
	public $details;
	public $quantity;
	public $photo;
	public $state;
	public $added_date;
	public $donator_id;

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
			$this->details = $row[2];
			$this->quantity = $row[3];
			$this->photo = $row[4];
			$this->state = $row[5];
			$this->added_date = $row[6];
			$this->donator_id = $row[7];
		}
	}

}

function getAllDonations()
{
	return selectAndOrder("select * from donation","id","desc");
}

function getDonationById($id)
{
	return selectById("*","donation", $id);
}

function getDonationByName($search)
{
	return select("SELECT * FROM donation WHERE name like '%$search%' and active = 1");
}

function addDonation( $name, $details, $quantity, $photo, $state, $added_date, $donator_id)
{
    $sql = 
		"INSERT INTO donation VALUES(null,
'$name','$details',$quantity,'$photo','$state','$added_date',$donator_id)";	return query($sql);
}

function updateDonation( $id, $name, $details, $quantity, $photo, $state, $added_date, $donator_id)
{
    $sql = 
		"UPDATE donation SET 
		name = '$name'
,		details = '$details'
,		quantity = $quantity
,		photo = '$photo'
,		state = '$state'
,		added_date = '$added_date'
,		donator_id = $donator_id
		WHERE id = $id ";
    return query($sql);
}

function deleteDonation($id)
{   
     return query("DELETE FROM donation WHERE id = $id");
}
?>


