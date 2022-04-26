<?php

require 'common.php';

$p_id = $_GET['p_id'];

$refer_to = $_POST['select_hospital'];

$search_patient = "SELECT h_name from hospitals WHERE h_id = '$_SESSION[id]'";
$patient_search_query = mysqli_query($connect, $search_patient) or die(mysqli_error($connect));   
$row = mysqli_fetch_array($patient_search_query);

$refer_from = $row['h_name'];

$update_status = "UPDATE patients SET critical= 'true' WHERE p_id = '$p_id'";
$update_status_query = mysqli_query($connect, $update_status) or die(mysqli_error($connect));

$patient = "SELECT * from patients WHERE p_id = '$p_id'";
$patient_query = mysqli_query($connect, $patient) or die(mysqli_error($connect));   
$patient_details = mysqli_fetch_array($patient_query);

$search_record = "SELECT test_file from p_records WHERE p_id = '$p_id'";
$record_search_query = mysqli_query($connect, $search_record) or die(mysqli_error($connect));   

$insert_query = "INSERT into referrals (h_id,p_id,r_to,r_from) VALUES ('$_SESSION[id]','$p_id','$refer_to','$refer_from')";
$query_result = mysqli_query($connect, $insert_query) or die(mysqli_error($connect));

$insert_query_1 = "INSERT into r_hospitals (h_id,p_id,r_to,r_from) VALUES ('$_SESSION[id]','$p_id','$refer_to','$refer_from')";
$query_result_1 = mysqli_query($connect, $insert_query_1) or die(mysqli_error($connect));
$id = mysqli_insert_id($connect);

$refer_to_email_query = "SELECT h_email from hospitals WHERE h_name = '$refer_to'";
$email_query = mysqli_query($connect, $refer_to_email_query) or die(mysqli_error($connect));  
$rows = mysqli_fetch_array($email_query);


//Sending email to the referred hospital
$subject = "Referral Request"; 

//Sending email to the referred hospital
$subject = "Referral Request"; 
 
    $htmlContent = '
    <html>

<body>
    <div style="margin: auto; border:5px solid #E49B0F; border-radius: 10px; width:500px; text-align: center">  

        <div style="background: #FFD700; padding: 5px 0px;">
            <p><span style="background: whitesmoke; font-size:45px; font-weight: 500; border-radius: 8px; padding: 0px 5px">Need your help</span></p>    
            <p>
                <span style="background: whitesmoke;font-size:15px; border-radius: 8px; padding: 0px 5px">
                    To help a patient which is currently in severe condition. <br>Your support is truly needed
                </span>
            </p>     
        </div>

        <h2>Referral Request</h2>

        <p>Have a look at the details associated <br> with the patient referred by<br>
        <b>'.$refer_from.'</b></p>
        
        <div style="margin: 5px 0px; width:350px; margin: auto">

        <table style="width:100%;border: 3px solid #FFD700; border-radius: 10px">
            <tr>
                <th style="border: 3px solid #FFD700; width:80px;">Field</th>
                <th style="border: 3px solid #FFD700;">Value</th>
            </tr>
            <tr>
                <td style="border: 3px solid #FFD700; width:100px;">Patient Name</td>
                <td style="border: 3px solid #FFD700;">'.$patient_details['name'].'</td>
            </tr>
            <tr>
                <td style="border: 3px solid #FFD700; width:100px;">Email Id</td>
                <td style="border: 3px solid #FFD700;">'.$patient_details['email'].'</td>
            </tr>
            <tr>
                <td style="border: 3px solid #FFD700;">Phone Number</td>
                <td style="border: 3px solid #FFD700;">'.$patient_details['phone'].'</td>
            </tr>
            <tr>
                <td style="border: 3px solid #FFD700;">Disease Category</td>
                <td style="border: 3px solid #FFD700;">'.$patient_details['d_category'].'</td>
            </tr>
            <tr>
                <td style="border: 3px solid #FFD700;">Note</td>
                <td style="border: 3px solid #FFD700;">'.$patient_details['note'].'</td>
            </tr>
            
        </table>
        </div>

        <button style="padding: 6px; margin: 10px; background: green; border-radius: 10px;">
            <a href="https://wheels4water.me/medibuddy/utilities/final_script.php?status=accept&r_id='.$id.'&refer_to='.$refer_to.'&refer_from='.$refer_from.'&p_id='.$p_id.'" target="blank" style="text-decoration: none; color: white ; font-weight: bold;">Accept</a>
        </button>
        <button style="padding: 6px; margin: 10px; background: red; border-radius: 10px;">
            <a href="https://wheels4water.me/medibuddy/utilities/final_script.php?status=reason&r_id='.$id.'&refer_to='.$refer_to.'&refer_from='.$refer_from.'&p_id='.$p_id.'" target="blank" style="text-decoration: none; color: white ; font-weight: bold;">Decline</a>
        </button>
        
    </div>
</body>

</html>'; 
 
   function multi_attach_mail($to, $subject, $message, $senderEmail, $senderName, $files = array()){ 
    // Sender info  
    $from = $senderName." <".$senderEmail.">";  
    $headers = "From: $from"; 
 
    // Boundary  
    $semi_rand = md5(time());  
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";  
 
    // Headers for attachment  
    $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";  
 
    // Multipart boundary  
    $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" . 
    "Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n";  
 
    // Preparing attachment 
    if(!empty($files)){ 
        for($i=0;$i<count($files);$i++){ 
            if(is_file($files[$i])){ 
                $file_name = basename($files[$i]); 
                $file_size = filesize($files[$i]); 
                 
                $message .= "--{$mime_boundary}\n"; 
                $fp =    @fopen($files[$i], "rb"); 
                $data =  @fread($fp, $file_size); 
                @fclose($fp); 
                $data = chunk_split(base64_encode($data)); 
                $message .= "Content-Type: application/octet-stream; name=\"".$file_name."\"\n" .  
                "Content-Description: ".$file_name."\n" . 
                "Content-Disposition: attachment;\n" . " filename=\"".$file_name."\"; size=".$file_size.";\n" .  
                "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n"; 
            } 
        } 
    } 
     
    $message .= "--{$mime_boundary}--"; 
    $returnpath = "-f" . $senderEmail; 
     
    // Send email 
    $mail = mail($to, $subject, $message, $headers, $returnpath);  
     
    // Return true if email sent, otherwise return false 
    if($mail){ 
        return true; 
    }else{ 
        return false; 
    } 
}
    
 $to = $rows['h_email']; 
 $from = 'vishalsproject@wheels4water.me'; 
 $fromName = 'Vishal'; 

$files = array();

while($response = mysqli_fetch_array($record_search_query)) {
    $str = $response['test_file'];
    $str = explode("/",$str);
    $str= $str[1].'/'.$str[2];
    array_push($files,$str);
}

// Call function and pass the required arguments 
$sendEmail = multi_attach_mail($to, $subject, $htmlContent, $from, $fromName, $files); 

header("location: ./../index.php");
?>