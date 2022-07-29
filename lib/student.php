<?php
	$file = realpath(dirname(__FILE__));
	include_once $file."/Database.php";
	include_once $file."/Session.php";
?>
<?php
	
	class student{

		public $db;

		public function __construct(){
			$this->db = new Database();
		}

		public function getAdminLogin($data){
			$username 	= mysqli_real_escape_string($this->db->link, $data['username']);
			$password 	= mysqli_real_escape_string($this->db->link, $data['password']);
			if (empty($username) || empty($password)) {
				echo "empty";
			}else{
				$password = md5($password);
				$query = "SELECT * FROM tbl_admin WHERE username= '$username' AND password = '$password'";
				$result = $this->db->select($query);
				if ($result) {
					Session::init();
					$value = $result->fetch_assoc();
					Session::set("adminLogin",true);
					Session::set("username",$value['username']);
					echo "success";
				}else{
					echo "nomatch";
				}
			}

		}

		public function addStudent($data){
			$name 	= mysqli_real_escape_string($this->db->link, $data['name']);
			$roll 	= mysqli_real_escape_string($this->db->link, $data['roll']);

			$query = "SELECT * FROM tbl_student WHERE studentRoll  = '$roll'";
			$result = $this->db->select($query);

			if (empty($name) || empty($roll)) {
				echo "empty";
			}elseif($result){
				echo "exists";
			}else{
				$query = "INSERT INTO tbl_student(studentName,studentRoll) VALUES('$name','$roll')";
				$result = $this->db->insert($query);
				if ($result) {
					echo "success";
				}else{
					echo "error";
				}
			}

		}

		public function updatetAtt($data, $dt){
			$attend = $data['attend'];
			foreach ($attend as $att_roll => $att_value) {
					if ($att_value == "present") {
					$query = "UPDATE tbl_attendance SET attend = 'present', status = '1' WHERE att_date ='$dt' AND roll = '$att_roll'";
					$update_result = $this->db->update($query);

					}else if($att_value == "absent"){
						$query = "UPDATE tbl_attendance SET attend = 'absent', status = '0' WHERE att_date ='$dt' AND roll = '$att_roll'";
						$update_result = $this->db->update($query);
					}
			}

			if ($update_result) {
				return "<span class='success'>Student data update successfully.</span>";
			}else{
				return "<span class='error'>Update data something wrong.</span>";
			}

		}

		public function getStudentData(){
			$query	 	= "SELECT * FROM tbl_student ORDER BY studentRoll ASC";
			$result 	= $this->db->select($query);
			return $result;
		}

		public function removeStudentData($delId){
			$query	 	= "DELETE FROM tbl_student WHERE studentId='$delId'";
			$result 	= $this->db->delete($query);
			return $result;

		}

		public function deleteAttendanceData($delId){

			$select_query	= "SELECT * FROM tbl_student WHERE studentId ='$delId'";
			$select_result 	= $this->db->select($select_query);

			if ($select_result) {
				$data = $select_result->fetch_assoc();
				$studentRoll = $data['studentRoll'];
				$delete_query	= "DELETE FROM tbl_attendance WHERE roll='$studentRoll'";
				$delete_result 	= $this->db->delete($delete_query);
			}
			return $delete_result;
		}

		public function getAllStudentDataByUpdate($dt){
			$query	 	= "SELECT tbl_student.studentName , tbl_attendance.* FROM tbl_student INNER JOIN tbl_attendance ON tbl_student.studentRoll = tbl_attendance.roll WHERE tbl_attendance.att_date = '$dt' ORDER BY tbl_attendance.roll ASC";
			$result = $this->db->select($query);
			return $result;
		}

		public function getMonthByData($mt){

			$query	 	= "SELECT DISTINCT roll FROM tbl_attendance WHERE  current_month = '$mt'";
			$result 	= $this->db->select($query);
			return $result;
		}

// Someting

		public function getMonthRollByData($roll){
			$query	 	= "SELECT * FROM tbl_student WHERE studentRoll ='$roll'";
			$result 	= $this->db->select($query);
			return $result;
		}

		public function getPerAttendance($perRoll, $mt){

		$query	= "SELECT status FROM tbl_attendance WHERE roll ='$perRoll' AND current_month ='$mt'";
			$result 	= $this->db->select($query);
			return $result;
		}

		public function getViewDataByDate(){
			$query	 	= "SELECT DISTINCT att_date FROM tbl_attendance ORDER BY att_date DESC";
			$result 	= $this->db->select($query);
			return $result;
		}

		public function getViewDataByMonth(){
			$query	 	= "SELECT DISTINCT current_month FROM tbl_attendance ORDER BY current_month ASC";
			$result 	= $this->db->select($query);
			return $result;
		}

		public function getStudentDataById($editId){
			$query	 	= "SELECT * FROM tbl_student WHERE studentId ='$editId'";
			$result 	= $this->db->delete($query);
			return $result;
		}

		public function updateStudentData($data){

			$name 		= mysqli_real_escape_string($this->db->link, $data['name']);
			$roll 		= mysqli_real_escape_string($this->db->link, $data['roll']);

			$rollNumber = mysqli_real_escape_string($this->db->link, $data['rollNumber']);
			$sid 		= mysqli_real_escape_string($this->db->link, $data['sid']);

			$query = "SELECT * FROM tbl_student WHERE studentRoll  = '$roll'";
			$result = $this->db->select($query);

			if(empty($name) || empty($roll)) {
					echo "empty";
			}else if ($result) {

				$data = $result->fetch_assoc();
				if($data['studentRoll'] == $rollNumber){
					$query = "UPDATE tbl_student SET studentName ='$name' WHERE studentRoll='$rollNumber'";
					$result = $this->db->update($query);
					echo "success";
					exit();
				}elseif($result){
					echo "exists";
					exit();
				}


			}else{
				$update_query = "UPDATE tbl_student SET studentRoll ='$roll' WHERE studentId='$sid'";
				$result = $this->db->update($update_query);
				echo "success";
				exit();
			}

		}

		public function insertAtt($data, $cur_date, $cur_month){
			
			$attend = $data['attend'];
			$query	 	= "SELECT DISTINCT att_date FROM tbl_attendance";
			$result 	= $this->db->select($query);
			if ($result) {
				while ($data = $result->fetch_assoc()) {
					if ($data['att_date'] == $cur_date) {
						return "<span class='error'>Roll token already exist.</span>";
					}
				}
			}


			foreach ($attend as $att_roll => $att_value) {
				if ($att_value == "present") {
					$query = "INSERT INTO tbl_attendance(roll,attend,att_date,current_month,status) VALUES('$att_roll','present','$cur_date','$cur_month','1')";
					$get_result = $this->db->insert($query);
				}else if($att_value == "absent"){
					$query = "INSERT INTO tbl_attendance(roll,attend,att_date,current_month,status) VALUES('$att_roll','absent','$cur_date','$cur_month','0')";
					$get_result = $this->db->insert($query);
				}
			}

			if ($get_result) {
				return "<span class='success'>Student data insert successfully.</span>";
			}else{
				return "<span class='error'>Something wrong.</span>";
			}

			

			


		}


		









	}

?>