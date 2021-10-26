<?php
   class Generic {
        protected $pdo;

        function __construct($pdo){
            
            $this->pdo = $pdo;
    
        
        }

        

        

    public function checkInput($var){
        $var = htmlspecialchars($var);
        $var = trim($var);
        $var = stripcslashes($var);
        return $var;
    }



        
 /*  public function uploadImage_old($file){
        $filename = basename($file['name']);
        $fileTmp = $file['tmp_name'];
        $fileSize = $file['size'];
        $error = $file['error'];
      
        $usename = $filename. mt_rand(1111, 9999);

        $ext = explode('.', $filename);
        //$ext = strtolower($ext);
        $allowed_ext = array('jpg','png','jpeg','JPG','PNG','JPEG');

        if(in_array($ext, $allowed_ext) === false){
            if($error === 0){
              //  if($fileSize <= 209272152){
                        $fileRoot ='../admin/img/'. $filename;
                        $fileRoots = 'img/'. $filename;
                        move_uploaded_file($fileTmp, $fileRoot);
                        return $fileRoots;

               // }
            }
        }
    }

    public function uploadImage($file) {
        $filename = basename($file['name']);
        $fileTmp = $file['tmp_name'];
         $folderName = '../course_imgs/';
        $newName = mt_rand(1111, 9999).mt_rand(1111, 9999).".png";
        $joinFile = $folderName.$newName;
        $myTime = date("D j F, Y; h:i a");
        $array_allow = array('jpg','png','jpeg','JPG','PNG','JPEG');
        $file_ext = strtolower(pathinfo($filename)['extension']);

                if($_FILES['image']['size'] > 10485760) {
                    return false;
                } elseif(!in_array($file_ext, $array_allow)) {
                    return false;
                } else {
                    if(move_uploaded_file($fileTmp, $joinFile)) {
                        return $joinFile;
                    }
                }
    }*/

    
        
    public function uploadImage($file){

        $filename = basename($file['name']);
        
        $fileTmp = $file['tmp_name'];

        $fileSize = $file['size'];
        $error = $file['error'];
       
        $original =  mt_rand(1111, 9999).$filename;

        $ext = explode('.', $filename);
        //$ext = strtolower($ext);
        $allowed_ext = array('jpg','png','jpeg','JPG','PNG','JPEG');

        if(in_array($ext, $allowed_ext) === false){
            if($error === 0){
              //  if($fileSize <= 209272152){
                        $fileRoot ='../admin/img/'. $original;
                        $fileRoots = 'img/'. $original;
                        move_uploaded_file($fileTmp, $fileRoot);
                        return $fileRoots;

               // }
            }
        }
    }

    public function uploadDoc($file){
        $filename = basename($file['name']);
        $fileTmp = $file['tmp_name'];
        $fileSize = $file['size'];
        $error = $file['error'];
        $original = mt_rand(1111, 9999).$filename;

        $ext = explode('.', $filename);
        //$ext = strtolower($ext);
        $allowed_ext = array('pdf','doc', 'docx', 'txt');

        if(in_array($ext, $allowed_ext) === false){
            if($error === 0){
              //  if($fileSize <= 209272152){
                        $fileRoot ='../../admin/doc/'. $original;
                        $fileRoots = 'doc/'. $original;
                        move_uploaded_file($fileTmp, $fileRoot);
                        return $fileRoots;

               // }
            }
        }
    }
    public function uploadDoc_main($file){
        $filename = basename($file['name']);
        $fileTmp = $file['tmp_name'];
        $fileSize = $file['size'];
        $error = $file['error'];
        $original = mt_rand(1111, 9999).$filename;

        $ext = explode('.', $filename);
        //$ext = strtolower($ext);
        $allowed_ext = array('pdf','doc', 'docx', 'txt');

        if(in_array($ext, $allowed_ext) === false){
            if($error === 0){
              //  if($fileSize <= 209272152){
                        $fileRoot ='../document/doc/'. $original;
                        $fileRoots = 'doc/'. $original;
                        move_uploaded_file($fileTmp, $fileRoot);
                        return $fileRoots;

               // }
            }
        }
    }

    function sendmail($to,$subject,$body){
       // include("class.phpmailer.php"); //you have to upload class files "class.phpmailer.php" and "class.smtp.php"
     
        $mail = new PHPMailer();
    
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
    
        $mail->Host = "mail.globaltradetutor.com";
    
        $mail->Username = "info@globaltradetutor.com";
        $mail->Password = "GlobalTrade$1"; 
    
        $mail->From = "info@globaltradetutor.com";
        $mail->FromName = "Global Trade Tutor";
    
        $mail->AddAddress($to);
        $mail->AddCC("info@3timpex.com");
        $mail->AddCC("ali@chroniclesoft.com");
        $mail->AddCC("tradeacademy@3timpex.com");
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->WordWrap = 50;
        $mail->IsHTML(true);
        //$mail->SMTPSecure = 'tls';
        $mail->Port = 25;
        //$mail->SetLanguage('en', 'language/');
        $success=$mail->Send(); 
        return $success;
    }

    public function send_login_mail($to, $password, $firstname){
       
        $subject = "Global Trade Tutor";
        
        $message = "
        <html>
        <head>
        <title>Global Trade Tutor Login Details</title>
        </head>
        <body>
        <h2>Welcome <strong>".$firstname."</strong> to Global Trade Tutor</h2>
        <p> Click here to login to you <a href='http://globaltradetutor.com'>Portal</a> </p>
        <table>
        <tr>
        <th>Email</th>
        <th>Password</th>
        </tr>
        <tr>
        <td>".$to."</td>
        <td>".$password."</td>
        </tr>
        </table>
        </body>
        </html>
        ";
        
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
        // More headers
        $from = 'info@globaltradetutor.com';
        $copy_one = 'ali@chroniclesoft.com';
        $copy_two = 'solomon@chroniclesoft.com';


        $headers .= 'From: <'.$from.'>' . "\r\n";
        $headers .= 'Cc: '.copy_one.'' . "\r\n";
        $headers .= 'Cc: '.copy_two.'' . "\r\n";
        
       $send =  mail($to,$subject,$message,$headers);

       if($send){
           return true;
       }else{
           return false;
       }
    }


        
        public function get_single($table, $id) {
            $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE `id`= :id");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $single = $stmt->fetch(PDO::FETCH_OBJ);
          
            return $single; 
        }

        public function timeAgo($datetime){
            if($datetime == '0000-00-00 00:00:00'){
               return 'Has Never Login';
            }
            $time       = strtotime($datetime);
            $current    = time();
            $seconds    = $current - $time;
            $minutes    = round($seconds / 60);
            $hours      = round($seconds / 3600);
            $months     = round($seconds / 2600640);

            if($seconds <= 60){
                if($seconds == 0){
                    return 'now';

                }else {
                    return $seconds. 's ago';
                }
            }else if($minutes <= 60){
                return $minutes. 'm ago';

            }else if($hours <= 24){
                return $hours.'h ago';
            }else if($months <= 12){
                return date('M j', $time);

            }else{
                return date('j M Y', $time);
            }
        }


        public function get_singles($table, $id) {
            $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE `id`= :id");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $single = $stmt->fetchAll(PDO::FETCH_OBJ);
          
            return $single; 
        }

        public function check_student_course($std_id, $course_id) {
            $stmt = $this->pdo->prepare("SELECT * FROM student_courses WHERE `student_id`= :std_id AND `course_id` = :course_id  ");
            $stmt->bindParam(":course_id", $course_id, PDO::PARAM_INT);
            $stmt->bindParam(":std_id", $std_id, PDO::PARAM_INT);
            $stmt->execute();
            $single = $stmt->fetch(PDO::FETCH_OBJ);
          
            return $single; 
        }



        public function get_payment_std($student_id, $course_id)
        {
            $stmt = $this->pdo->prepare("SELECT * FROM payment WHERE `user_id`= $student_id AND `course_id`= $course_id ");
            //$stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $single = $stmt->fetch(PDO::FETCH_OBJ);
          
            return $single; 
        }



        public function get_single_g($table, $where, $id) {
            $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE `$where`= :id");
            $stmt->bindParam(":id", $id, PDO::PARAM_STR);
            $stmt->execute();
            $single = $stmt->fetchAll(PDO::FETCH_OBJ);
          
            return $single; 
        }

        public function get_payment_multi($year) {
            $stmt = $this->pdo->prepare("SELECT * FROM student_courses WHERE YEAR(date_created)= :year");
            $stmt->bindParam(":year", $year, PDO::PARAM_INT);
            $stmt->execute();
            $single = $stmt->fetchAll(PDO::FETCH_OBJ);
          
            return $single; 
        }


        public function get_schedule_year($id){
            $stmt = $this->pdo->prepare("SELECT YEAR(exam_date) as years FROM schedule_final WHERE `id`= :id");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $single = $stmt->fetch(PDO::FETCH_OBJ);
          
            return $single; 
        }

        public function get_schedule_month($id){
            $stmt = $this->pdo->prepare("SELECT MONTH(exam_date) as months FROM schedule_final WHERE `id`= :id");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $single = $stmt->fetch(PDO::FETCH_OBJ);
          
            return $single; 
        }

        public function get_schedule_day($id){
            $stmt = $this->pdo->prepare("SELECT DAY(exam_date) as days FROM schedule_final WHERE `id`= :id");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $single = $stmt->fetch(PDO::FETCH_OBJ);
          
            return $single; 
        }


        public function get_single_g_course($table, $where, $id) {
            $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE `$where`= :id and publish = 1");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $single = $stmt->fetchAll(PDO::FETCH_OBJ);
          
            return $single; 
        }

      


        public function get_singly_g($table, $where, $id) {
            $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE `$where`= :id");
            $stmt->bindParam(":id", $id, PDO::PARAM_STR);
            $stmt->execute();
            $single = $stmt->fetch(PDO::FETCH_OBJ);
          
            return $single; 
        }

        public function get_files_query($table, $course_id, $std_id ){
            $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE `student_id`= $std_id AND `course_id` = $course_id ");
            $stmt->execute();
            $single = $stmt->fetch(PDO::FETCH_OBJ);
          
            return $single; 
        }

        public function get_question_file($id){
            $stmt = $this->pdo->prepare("SELECT * FROM question_upload WHERE `exam_id`= :id ORDER BY id DESC LIMIT 1");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $single = $stmt->fetch(PDO::FETCH_OBJ);
          
            return $single; 
        }

        public function get_singly_g_str($table, $where, $id) {
            $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE $where= :id");
           $stmt->bindParam(":id", $id, PDO::PARAM_STR);
            $stmt->execute();
            $single = $stmt->fetch(PDO::FETCH_OBJ);
          
            return $single; 
        }

       

        

        public function get_multi($tables){
            $stmt = $this->pdo->prepare("SELECT * FROM $tables ORDER BY `id` DESC");
            $stmt->execute();
            $multi = $stmt->fetchAll(PDO::FETCH_OBJ);
          
            return $multi; 
        }


        public function get_courses(){
            $stmt = $this->pdo->prepare("SELECT * FROM courses ORDER BY `course_name` ASC");
            $stmt->execute();
            $multi = $stmt->fetchAll(PDO::FETCH_OBJ);
          
            return $multi; 
        }

        public function get_student_courses($id){
            $stmt = $this->pdo->prepare("SELECT * FROM student_courses  inner join courses  on student_courses.course_id = courses.id WHERE student_courses.student_id = $id ORDER BY `courses`.`course_name` ASC");
            $stmt->execute();
            $multi = $stmt->fetchAll(PDO::FETCH_OBJ);
          
            return $multi; 
        }

        public function get_mult_students (){
            $stmt = $this->pdo->prepare("SELECT * FROM user ORDER BY firstname");
            $stmt->execute();
            $multi = $stmt->fetchAll(PDO::FETCH_OBJ);
          
            return $multi; 
        }

        public function get_count_where($tables, $where, $id){
            $stmt = $this->pdo->prepare("SELECT * FROM $tables where $where = $id ");
            $stmt->execute();
           $count = $stmt->rowCount();
          
            return $count; 
        }

        public function get_count_course_where(){
            $stmt = $this->pdo->prepare("SELECT * FROM user where type = 'student' ");
            $stmt->execute();
           $count = $stmt->rowCount();
          
            return $count; 
        }

       


        public function get_sum_where($tables, $field, $where, $id){
            $stmt = $this->pdo->prepare("SELECT SUM($field) FROM $tables where $where = $id ");
            $stmt->execute();
           $count = $stmt->fetchColumn();
          
            return $count; 
        }

        

        

        public function get_sum_payments_month($year, $month){
            $stmt = $this->pdo->prepare("SELECT SUM(amount) FROM payment where YEAR(date_created) = $year  AND MONTH(date_created) = $month ");
            $stmt->execute();
           $sum = $stmt->fetchColumn();
          
            return $sum; 
        }


        public function get_sum_part_payments($year){
            $stmt = $this->pdo->prepare("SELECT SUM(amount_paid) FROM payment where YEAR(date_created) = $year ");
            $stmt->execute();
           $sum = $stmt->fetchColumn();
          
            return $sum; 
        }

        public function get_sum_payments($year){
            $stmt = $this->pdo->prepare("SELECT SUM(tranche_1 + tranche_2 + tranche_3) FROM payment where YEAR(date_created) = $year ");
            $stmt->execute();
           $sum = $stmt->fetchColumn();
          
            return $sum; 
        }

        public function get_sum_payment_band_1($year){
            $stmt = $this->pdo->prepare("SELECT SUM(band_1) FROM payment where YEAR(date_created) = $year ");
            $stmt->execute();
           $sum = $stmt->fetchColumn();
          
            return $sum; 
        }

        public function get_sum_payment_band_2($year){
            $stmt = $this->pdo->prepare("SELECT SUM(band_2) FROM payment where YEAR(date_created) = $year ");
            $stmt->execute();
           $sum = $stmt->fetchColumn();
          
            return $sum; 
        }

      

    /*    public function get_payment_multi_month($year, $month) {
            $stmt = $this->pdo->prepare("SELECT * FROM student_courses WHERE YEAR(date_created)= $year   AND MONTH(date_created) = $month ");
            $stmt->execute();
            $single = $stmt->fetchAll(PDO::FETCH_OBJ);
          
            return $single; 
        }
        */
        public function get_payment_full_month($year, $month) {
            $stmt = $this->pdo->prepare("SELECT SUM(tranche_1 + tranche_2 + tranche_3) FROM payment WHERE YEAR(date_created)= $year   AND MONTH(date_created) = $month ");
            $stmt->execute();
            $single = $stmt->fetchColumn();
        
            return $single; 
        }


        public function get_courses_g($term){
            $stmt = $this->pdo->prepare("SELECT * FROM courses where course_abrev LIKE '%$term%' or course_name LIKE '%$term%'  ");
            $stmt->execute();
            $search = $stmt->fetch(PDO::FETCH_OBJ);
          
            return $search; 
        } 



        public function get_payment_part_month($year, $month) {
            $stmt = $this->pdo->prepare("SELECT SUM(amount_paid) FROM payment WHERE YEAR(date_created)= $year   AND MONTH(date_created) = $month ");
            $stmt->execute();
            $single = $stmt->fetchColumn();
        
            return $single; 
        }

        public function get_payment_band_1_month($year, $month) {
            $stmt = $this->pdo->prepare("SELECT SUM(band_1) FROM payment WHERE YEAR(date_created)= $year   AND MONTH(date_created) = $month ");
            $stmt->execute();
            $single = $stmt->fetchColumn();
        
            return $single; 
        }
        public function get_payment_band_2_month($year, $month) {
            $stmt = $this->pdo->prepare("SELECT SUM(band_2) FROM payment WHERE YEAR(date_created)= $year   AND MONTH(date_created) = $month ");
            $stmt->execute();
            $single = $stmt->fetchColumn();
        
            return $single; 
        }


        public function get_count($tables){
            $stmt = $this->pdo->prepare("SELECT * FROM $tables");
            $stmt->execute();
           $count = $stmt->rowCount();
          
            return $count; 
        }


        public function pagination($tables, $offset, $limit, $order){
            $stmt = $this->pdo->prepare("SELECT * FROM $tables ORDER BY $order LIMIT $offset, $limit");
            $stmt->execute();
            $pagination = $stmt->fetchAll(PDO::FETCH_OBJ);
          
            return $pagination; 
        }

        public function pagination_lower($tables, $offset, $limit){
            $stmt = $this->pdo->prepare("SELECT * FROM $tables LIMIT $offset, $limit");
            $stmt->execute();
            $pagination = $stmt->rowCount();
          
            return $pagination; 
        }
        public function pagination_count($tables){
            $stmt = $this->pdo->prepare("SELECT * FROM $tables ");
            $stmt->execute();
            $pagination = $stmt->rowCount();
          
            return $pagination; 
        } 







        public function pagination_ad($tables, $offset, $limit){
            $stmt = $this->pdo->prepare("SELECT * FROM $tables WHERE type = 'teacher' ORDER BY firstname ASC LIMIT $offset, $limit");
            $stmt->execute();
            $pagination = $stmt->fetchAll(PDO::FETCH_OBJ);
          
            return $pagination; 
        }

        public function pagination_lower_ad($tables, $offset, $limit){
            $stmt = $this->pdo->prepare("SELECT * FROM $tables  WHERE type = 'teacher' LIMIT $offset, $limit");
            $stmt->execute();
            $pagination = $stmt->rowCount();
          
            return $pagination; 
        }
        public function pagination_count_ad($tables){
            $stmt = $this->pdo->prepare("SELECT * FROM $tables  WHERE type = 'teacher' ");
            $stmt->execute();
            $pagination = $stmt->rowCount();
          
            return $pagination; 
        } 



        public function pagination_st($tables, $offset, $limit){
            $stmt = $this->pdo->prepare("SELECT * FROM $tables WHERE type = 'student' ORDER BY FIRSTNAME ASC LIMIT $offset, $limit");
            $stmt->execute();
            $pagination = $stmt->fetchAll(PDO::FETCH_OBJ);
          
            return $pagination; 
        }

        public function pagination_lower_st($tables, $offset, $limit){
            $stmt = $this->pdo->prepare("SELECT * FROM $tables  WHERE type = 'student' LIMIT $offset, $limit");
            $stmt->execute();
            $pagination = $stmt->rowCount();
          
            return $pagination; 
        }
        public function pagination_count_st($tables){
            $stmt = $this->pdo->prepare("SELECT * FROM $tables  WHERE type = 'student' ");
            $stmt->execute();
            $pagination = $stmt->rowCount();
          
            return $pagination; 
        } 





         public function pagination_course($tables, $offset, $limit){
            $stmt = $this->pdo->prepare("SELECT * FROM $tables  WHERE publish = 1 LIMIT $offset, $limit");
            $stmt->execute();
            $pagination = $stmt->fetchAll(PDO::FETCH_OBJ);
          
            return $pagination; 
        }

        public function pagination_lower_course($tables, $offset, $limit){
            $stmt = $this->pdo->prepare("SELECT * FROM $tables  WHERE publish = 1 LIMIT $offset, $limit");
            $stmt->execute();
            $pagination = $stmt->rowCount();
          
            return $pagination; 
        }
        public function pagination_count_course($tables){
            $stmt = $this->pdo->prepare("SELECT * FROM $tables WHERE publish = 1");
            $stmt->execute();
            $pagination = $stmt->rowCount();
          
            return $pagination; 
        }



        
        public function pagination_schedule_exam($std, $offset, $limit){
            $stmt = $this->pdo->prepare("SELECT * FROM schedule_final  WHERE student_id = $std LIMIT $offset, $limit");
            $stmt->execute();
            $pagination = $stmt->fetchAll(PDO::FETCH_OBJ);
          
            return $pagination; 
        }

        public function pagination_lower_schedule_exam($std, $offset, $limit){
            $stmt = $this->pdo->prepare("SELECT * FROM schedule_final  WHERE student_id = $std LIMIT $offset, $limit");
            $stmt->execute();
            $pagination = $stmt->rowCount();
          
            return $pagination; 
        }
        public function pagination_count_schedule_exam($std){
            $stmt = $this->pdo->prepare("SELECT * FROM schedule_final  WHERE student_id = $std");
            $stmt->execute();
            $pagination = $stmt->rowCount();
          
            return $pagination; 
        }

        public function get_reviews(){
            $stmt = $this->pdo->prepare("SELECT * FROM reviews WHERE course_content_id = 0  ORDER BY `id` DESC LIMIT 8");
            $stmt->execute();
            $multi = $stmt->fetchAll(PDO::FETCH_OBJ);
          
            return $multi; 
        }



            
        public function get_multi_asc($tables){
            $stmt = $this->pdo->prepare("SELECT * FROM $tables ORDER BY `id` ASC");
            $stmt->execute();
            $multi = $stmt->fetchAll(PDO::FETCH_OBJ);
        
            return $multi; 
        }

    

            
            public function get_multi_sort($tables, $sort){
                $stmt = $this->pdo->prepare("SELECT * FROM $tables ORDER BY $sort ASC");
                $stmt->execute();
                $multi = $stmt->fetchAll(PDO::FETCH_OBJ);
            
                return $multi; 
            }

        

        public function create($table, $fields = array()){
            $columns = implode(',', array_keys($fields));
            $values  = ':'.implode(', :', array_keys($fields));
            $sql     = "INSERT INTO {$table} ({$columns}) VALUES ({$values})";
            if($stmt = $this->pdo->prepare($sql)){
                foreach ($fields as $key => $data){
                    $stmt->bindValue(':'.$key, $data);
                }
                $stmt->execute();
                return $this->pdo->lastInsertId();
            }
        }
    
    
        



    public function update($table, $id, $fields = array()){
        $columns = '';
        $i       = 1;

        foreach($fields as $name => $value){
            $columns .= "`{$name}` = :{$name}";
             if($i < count($fields)){
                $columns .= ', ';
            }
            $i++;
        }
    $sql = "UPDATE {$table} SET {$columns} WHERE `id` = {$id}";
        if($stmt = $this->pdo->prepare($sql)){
            foreach($fields as $key => $value){
                $stmt->bindValue(':'.$key, $value);
            }
            //var_dump($sql);
          if($stmt->execute()){
            return true;
          }else{
              return false;
          }
        }
    }


    

    public function update_where($table, $where, $id, $fields = array()){
        $columns = '';
        $i       = 1;

        foreach($fields as $name => $value){
            $columns .= "`{$name}` = :{$name}";
             if($i < count($fields)){
                $columns .= ', ';
            }
            $i++;
        }
    $sql = "UPDATE {$table} SET {$columns} WHERE {$where} = {$id}";
        if($stmt = $this->pdo->prepare($sql)){
            foreach($fields as $key => $value){
                $stmt->bindValue(':'.$key, $value);
            }
            //var_dump($sql);
          if($stmt->execute()){
            return true;
          }else{
              return false;
          }
        }
    }

   
function time_Ago($time_ago) {
    $time = strtotime($time_ago);
    $cur_time = time();
    $time_elapsed = $cur_time - $time;
    $seconds = $time_elapsed;
    $minutes = round($time_elapsed / 60);
    $hours = round($time_elapsed / 3600);
    $days = round($time_elapsed / 86400);
    $weeks = round($time_elapsed / 604800);
    $months = round($time_elapsed / 2600640);
    $years = round($time_elapsed / 31207680);
    //seconds
    if($seconds <= 60) {
            return "just now";
    } else if($minutes <= 60) {
        if($minutes == 1) {
            return "one minute ago";
        }
    } else if($hours <= 24) {
        if($hours == 1) {
            return "an hour ago";
        } else {
            return "$days days ago";
        }
    } else if($weeks <= 4.3) {
        if($weeks == 1) {
            return "a week ago";
        } else {
            return "$weeks weeks ago";
        }
    } else if($months <= 12) {
        if($months == 1) {
            return "a month ago";
        } else {
            return "$months months ago";
        }
    } else {
        if($years == 1) {
            return "a year ago";
        } else {
            return "$years years ago";
        }
    }
}


    public function delete($table, $array) {
        $sql = "DELETE FROM `{$table}`";
        $where = "WHERE ";
        foreach($array as $name=>$value){
            $sql.="{$where} `{$name}` = :{$name}";
            $where = " AND ";
        }
        if($stmt = $this->pdo->prepare($sql)){
            foreach($array as $name => $value){
                $stmt->bindvalue(':'.$name, $value);
            }
            $excex = $stmt->execute();
            if($excex){
                return true;
            }
        }
         
      }

      
   
      
    public function login($email,$password){
        $stmt = $this->pdo->prepare("SELECT * FROM `user` WHERE `email`=:email AND `password`= :password AND `statu` = 1");
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(":password", $password, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_OBJ);
        $count = $stmt->rowCount();


        if($count>0){

          //  session_start();
          
             $_SESSION['sname'] = $user->surname;
            $_SESSION['fname'] = $user->firstname;
            $_SESSION['email'] = $user->email;
               return $user;
        }else{
            return false;
        }
        
    }
     

  

    public function logout(){
        session_start();
        $_SESSION = array();
        session_destroy();
        header('Location: ../login.php');
    } 
    

    }
?>