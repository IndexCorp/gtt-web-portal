<?php
   class Student extends Generic {
        protected $pdo;

        function __construct($pdo){
            
            $this->pdo = $pdo;
    
        
        }


        public function pagination_chat($std_id, $offset, $limit){
            $stmt = $this->pdo->prepare("SELECT * FROM chats where student_id = $std_id ORDER BY ID DESC LIMIT $offset, $limit");
            $stmt->execute();
            $pagination = $stmt->fetchAll(PDO::FETCH_OBJ);
          
            return $pagination; 
        }

        public function pagination_lower_chat($std_id, $offset, $limit){
            $stmt = $this->pdo->prepare("SELECT * FROM chats WHERE student_id = $std_id LIMIT $offset, $limit");
            $stmt->execute();
            $pagination = $stmt->rowCount();
          
            return $pagination; 
        }
        public function pagination_count_chat($std_id){
            $stmt = $this->pdo->prepare("SELECT * FROM chats WHERE student_id = $std_id ");
            $stmt->execute();
            $pagination = $stmt->rowCount();
          
            return $pagination; 
        } 






        
        public function pagination_admin_chat($offset, $limit){
            $stmt = $this->pdo->prepare("SELECT DISTINCT(student_id) FROM chats ORDER BY ID DESC LIMIT $offset, $limit");
            $stmt->execute();
            $pagination = $stmt->fetchAll(PDO::FETCH_OBJ);
          
            return $pagination; 
        }

        public function pagination_lower_admin_chat($offset, $limit){
            $stmt = $this->pdo->prepare("SELECT DISTINCT(student_id) FROM chats LIMIT $offset, $limit");
            $stmt->execute();
            $pagination = $stmt->rowCount();
          
            return $pagination; 
        }

        public function count_note($id)
        {
            $stmt = $this->pdo->prepare("SELECT * FROM chats WHERE student_id = $id AND status = 0");
            $stmt->execute();
            $count = $stmt->rowCount();
          
            return $count; 
        }
        public function pagination_count_admin_chat(){
            $stmt = $this->pdo->prepare("SELECT DISTINCT(student_id) FROM chats ");
            $stmt->execute();
            $pagination = $stmt->rowCount();
          
            return $pagination; 
        } 

        public function get_chats($std_id)
        {
            $stmt = $this->pdo->prepare("SELECT * FROM chats WHERE `student_id`= :id ORDER BY ID DESC ");
            $stmt->bindParam(":id", $std_id, PDO::PARAM_INT);
            $stmt->execute();
            $chats = $stmt->fetchAll(PDO::FETCH_OBJ);
          
            return $chats; 
        }

        public function get_students(){
            $stmt = $this->pdo->prepare("SELECT id,surname,firstname,middle_name,dob,address,tel,email,gender,nationality,title,company_name,bio,position,role,company_address,town,dept,country FROM user WHERE type='student' ORDER BY surname");
            $stmt->execute();
            $multi = $stmt->fetchAll(PDO::FETCH_OBJ);
          
            return $multi; 
        }



        public function get_students_by_school($school_id){
            $stmt = $this->pdo->prepare("SELECT * FROM school WHERE id='$school_id'");
            $stmt->execute();
            $multi = $stmt->fetchAll(PDO::FETCH_OBJ);
          
            return $multi; 
        }


        public function get_student_outstanding($std_id)
        {
            $stmt = $this->pdo->prepare("SELECT * FROM payment WHERE `user_id`= :id AND status = 'due' OR status = 'access' ");
            $stmt->bindParam(":id", $std_id, PDO::PARAM_INT);
            $stmt->execute();
            $outstanding = $stmt->fetchAll(PDO::FETCH_OBJ);
          
            return $outstanding; 
        }
        public function latest_payment($month)
        {
            $stmt = $this->pdo->prepare("SELECT  * FROM payment WHERE status != 'full_pay'  and status != 'free_access' and MONTH(date_created)='$month' ORDER BY id ASC LIMIT 20");
            $stmt->execute();
            $pagination = $stmt->fetchAll(PDO::FETCH_OBJ);
          
            return $pagination; 
        }



        public function pagination_st_billing($offset, $limit)
        {
            $stmt = $this->pdo->prepare("SELECT  * FROM payment WHERE status != 'full_pay'  and status != 'free_access' ORDER BY id DESC LIMIT $offset, $limit");
            $stmt->execute();
            $pagination = $stmt->fetchAll(PDO::FETCH_OBJ);
          
            return $pagination; 
        }

        public function pagination_payment_outstanding($offset, $limit)
        {
            $stmt = $this->pdo->prepare("SELECT  payment.id as id, payment.user_id as user_id, payment.amount as amount, payment.tranche_1 as tranche_1, payment.tranche_2 as tranche_2, payment.tranche_3 as tranche_3,payment.invoice_no as invoice_no, payment.status as status, payment.course_id as course_id,payment.date_created as date_created, payment.staff_id as staff_id FROM payment inner join courses on payment.course_id = courses.id  WHERE payment.tranche_1 + payment.tranche_2 + payment.tranche_3  < courses.disc_price  AND status != 'full_pay'  and status != 'free_access' ORDER BY payment.id ASC LIMIT $offset, $limit");
            $stmt->execute();
            $pagination = $stmt->fetchAll(PDO::FETCH_OBJ);
          
            return $pagination; 
        }

        

        public function pagination_lower_payment_outstanding($offset, $limit)
        {
            $stmt = $this->pdo->prepare("SELECT  * FROM payment inner join courses on payment.course_id = courses.id  WHERE payment.tranche_1 + payment.tranche_2 + payment.tranche_3  < courses.disc_price  AND status != 'full_pay'  and status != 'free_access' ORDER BY payment.id ASC LIMIT $offset, $limit");
            $stmt->execute();
            $pagination = $stmt->rowCount();
          
            return $pagination; 
        }
        public function pagination_count_payment_outstanding()
        {
            $stmt = $this->pdo->prepare("SELECT  * FROM payment inner join courses on payment.course_id = courses.id  WHERE payment.tranche_1 + payment.tranche_2 + payment.tranche_3  < courses.disc_price  AND status != 'full_pay'  and status != 'free_access'");
            $stmt->execute();
            $pagination = $stmt->rowCount();
          
            return $pagination; 
        } 





        public function pagination_lower_st_billing($offset, $limit)
        {
            $stmt = $this->pdo->prepare("SELECT * FROM payment  WHERE status != 'full_pay'   and status != 'free_access'  LIMIT $offset, $limit");
            $stmt->execute();
            $pagination = $stmt->rowCount();
          
            return $pagination; 
        }
        public function pagination_count_st_billing()
        {
            $stmt = $this->pdo->prepare("SELECT * FROM payment  WHERE status != 'full_pay'   and status != 'free_access' ");
            $stmt->execute();
            $pagination = $stmt->rowCount();
          
            return $pagination; 
        } 


        public function get_sum_payment($std_id, $value){
            $stmt = $this->pdo->prepare("SELECT SUM(amount) FROM payment where user_id = $std_id AND status = '$value' ");
            $stmt->execute();
           $count = $stmt->fetchColumn();
          
            return $count; 
        }

        public function check_std_courses($course_id, $student_id)
        {
            $stmt = $this->pdo->prepare("SELECT * FROM student_courses WHERE student_id= :student_id AND course_id = :course_id ");
            $stmt->bindParam(":course_id", $course_id, PDO::PARAM_INT);
            $stmt->bindParam(":student_id", $student_id, PDO::PARAM_INT);
            $stmt->execute();
            $check = $stmt->fetch(PDO::FETCH_OBJ);
          
            return $check; 
        }


        public function check_std_schools($school_id,$course_id, $student_id)
        {
            $stmt = $this->pdo->prepare("SELECT * FROM student_schools WHERE school_id= :school_id AND student_id= :student_id AND course_id = :course_id ");
            $stmt->bindParam(":school_id", $school_id, PDO::PARAM_INT);
            $stmt->bindParam(":course_id", $course_id, PDO::PARAM_INT);
            $stmt->bindParam(":student_id", $student_id, PDO::PARAM_INT);
            $stmt->execute();
            $check = $stmt->fetch(PDO::FETCH_OBJ);
          
            return $check; 
        }

        public function get_birthday($year1, $month, $day)
        {
            $stmt = $this->pdo->prepare("SELECT * FROM user WHERE YEAR(dob)='$year1' and MONTH(dob)='$month' and DAY(dob)='$day'");
             $stmt->execute();
            $birth = $stmt->fetchAll(PDO::FETCH_OBJ);
          
            return $birth; 
        }


      
    }
?>