<?php
	
		class User{
			private $name;
			private $email;
			private $date;
			private $exam;
			private $gender;
			private $bloodGroup;
		
		
			function __construct(){
				$name="";
				$email="";
				$date="";
				
				$exam="";
				$gender="";
				$bloodGroup="";
			}
			function set_name($nam){
				$this->name=$nam;
			}
			function get_name(){
				return $this->name;
			}
			
			function set_email($email){
				$this->email=$email;
			}
			function get_email(){
				return $this->email;
			}
			
			function set_date($date){
				$this->date=$date;
			}
			function get_date(){
				return $this->date;
			}
			
			function set_exam($exam){
				$this->exam=$exam;
			}
			function get_exam(){
				return $this->exam;
			}
			
			function set_gender($gender){
				$this->gender=$gender;
			}
			function get_gender(){
				return $this->gender;
			}
			
			function set_bloodGroup($bloodGroup){
				$this->bloodGroup=$bloodGroup;
			}
			function get_bloodGroup(){
				return $this->bloodGroup;
			}
			
			
		
		}
?>