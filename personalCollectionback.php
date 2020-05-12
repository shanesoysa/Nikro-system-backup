<?php
//
//	$db = mysqli_connect('localhost', 'root', '', 'user_db');
//
//
//	if (isset($_POST['office_information_submit'])) {
//
//		$designation =$_POST['designation'];
//		$effectivedate=$_POST['effectivedate'];
//		$ourref=$_POST['ourref'];
//		$epfetfno=$_POST['epfetfno'];
//		$fullname=$_POST['fullname'];
//		$initialname=$_POST['initialname'];
//		$nic=$_POST['nic'];
//		$nicissuedate=$_POST['nicissuedate'];
//		$dob=$_POST['dob'];
//		$maritalstatus=$_POST['maritalstatus'];
//		$bloodgroup=$_POST['bloodgroup'];
//		$permermant_address=$_POST['permermant_address'];
//		$current_address=$_POST['current_address'];
//		$hometelephone=$_POST['hometelephone'];
//		$permermant_address=$_POST['permermant_address'];
//		$mobile1=$_POST['mobile1'];
//		$mobile2=$_POST['mobile2'];
//		$email=$_POST['email'];
//
//		$office_information = mysqli_query($db, "INSERT INTO personal_information_form( designation, Effective_date, our_ref, epf_etf_no, full_name, name_with_initials, national_id_no, nic_issue_date, date_of_birth, marital_status, blood_group, permernant_address, current_address, current_address, home_telephone, mobile1, mobile2, email) VALUES ('$designation','$effectivedate','$ourref','$epfetfno','$fullname','$initialname','$nic','$nicissuedate','$dob','$maritalstatus','$bloodgroup','$permermant_address','$current_address','$hometelephone','$permermant_address','$mobile1','$mobile2','$email')");
//
//
//
//		if($office_information){
//
//			header('location: personalCollection2.php');
//
//		}
//		else{
//			echo "not inserted";
//			header('location: personalCollection.php');
//
//		}
//
//?>