<?php
// ====================================================
// ====================================================
// ======================= Start Receiver Order Part ===========

class Receiver Order
{
	public $id;
	public $donation_id;
	public $donator_id;
	public $receiver_id;
	public $order_date;

	function __construct($row)
	{
		$this->setData($row);
	}
	
	function setData($row)
	{
		if(is_array($row))
		{
			$this->id = $row[0];
			$this->donation_id = $row[1];
			$this->donator_id = $row[2];
			$this->receiver_id = $row[3];
			$this->order_date = $row[4];
		}
	}

}

function getAllReceiver Orders()
{
	return selectAndOrder("select * from receiver_order","id","desc");
}

function getReceiver OrderById($id)
{
	return selectById("*","receiver_order", $id);
}

function getReceiver OrderByName($search)
{
	return select("SELECT * FROM receiver_order WHERE name like '%$search%' and active = 1");
}

function addReceiver Order( $donation_id, $donator_id, $receiver_id, $order_date)
{
    $sql = 
		"INSERT INTO receiver_order VALUES(null,
$donation_id,$donator_id,$receiver_id,'$order_date')";	return query($sql);
}

function updateReceiver Order( $id, $donation_id, $donator_id, $receiver_id, $order_date)
{
    $sql = 
		"UPDATE receiver_order SET 
		donation_id = $donation_id
,		donator_id = $donator_id
,		receiver_id = $receiver_id
,		order_date = '$order_date'
		WHERE id = $id ";
    return query($sql);
}

function deleteReceiver Order($id)
{   
     return query("DELETE FROM receiver_order WHERE id = $id");
}
?>


