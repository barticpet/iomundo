<?php
//include_once "model/globals.php";

class Records 
{
	protected $noPerPage;
	protected $currentPage;
	protected $totalRecords;
	protected $totalPages;
	protected $db;

	public function __construct($db,$config)  
    {  

		$this->db =$db;
		
		$this->noPerPage=$config['noPerPage'];
		$this->totalRecords=0;
		$sql="SELECT COUNT(*) AS total FROM records";
		$ret=$this->db->execute($sql);
		if (count($ret))
			$this->totalRecords=$ret[0]['total'];
		$this->totalPages=ceil($this->totalRecords/$this->noPerPage);

    } 

		public function list()
    {
			$sql="SELECT * FROM records ORDER BY records_id DESC ";
			return $this->db->execute($sql);
		}


		public function get()
    {
			$sql="select * from records order by title";
			return $this->database->execute($sql);
		}


}
?>
