<?php
   class Course extends Generic {
        protected $pdo;

        function __construct($pdo){
            
            $this->pdo = $pdo;
    
        
        }

        public function get_schedule_likes($term)
        {
            $stmt = $this->pdo->prepare("SELECT * FROM schedule_final INNER JOIN courses on courses.id = schedule_final.course_id where course_name LIKE '%$term%' or course_abrev LIKE '%$term%'");
             $stmt->execute();
             $single = $stmt->fetchAll(PDO::FETCH_OBJ);
           
             return $single; 
        }


        public function search_course_stud($std_id, $term){

            $stmt = $this->pdo->prepare("SELECT * FROM courses INNER JOIN student_courses on courses.id = student_courses.course_id where course_name LIKE '%$term%' or course_abrev LIKE '%$term%' and student_courses.student_id = '$std_id'");
           // $stmt->bindParam(":ssid", $std_id, PDO::PARAM_INT);
           // $stmt->bindParam(":cid", $c_id, PDO::PARAM_INT);
            $stmt->execute();
            $single = $stmt->fetchAll(PDO::FETCH_OBJ);
          
            return $single; 
        }

        public function get_in_progress($std_id) {
            $stmt = $this->pdo->prepare("SELECT * FROM student_courses WHERE student_id = :ssid AND status = 1  ORDER BY id ASC limit 20 ");
            $stmt->bindParam(":ssid", $std_id, PDO::PARAM_INT);
                 $stmt->execute();
            $progress = $stmt->fetchAll(PDO::FETCH_OBJ);
          
            return $progress; 
        }

        public function get_in_progress_all() {
            $stmt = $this->pdo->prepare("SELECT DISTINCT(course_id) FROM student_courses limit 10");
            $stmt->execute();
            $progress = $stmt->fetchAll(PDO::FETCH_OBJ);
          
            return $progress; 
        }

        


        public function  search_course_by_cat_stud($std_id, $c_id) {
            $stmt = $this->pdo->prepare("SELECT * FROM student_courses WHERE student_id = :ssid and course_id = :cid ");
            $stmt->bindParam(":ssid", $std_id, PDO::PARAM_INT);
            $stmt->bindParam(":cid", $c_id, PDO::PARAM_INT);
            $stmt->execute();
            $single = $stmt->fetchAll(PDO::FETCH_OBJ);
          
            return $single; 
        }

        public function get_course_g($term){
            $stmt = $this->pdo->prepare("SELECT * FROM courses where course_name LIKE '%$term%' or course_abrev LIKE '%$term%' and publish =1 ");
            $stmt->execute();
            $search = $stmt->fetchAll(PDO::FETCH_OBJ);
          
            return $search; 
        } 

        public function get_student_g($term){
            $stmt = $this->pdo->prepare("SELECT * FROM user where firstname LIKE '%$term%' or surname LIKE '%$term%' or middle_name LIKE '%$term%'");
            $stmt->execute();
            $search = $stmt->fetchAll(PDO::FETCH_OBJ);
          
            return $search; 
        } 

        public function count_course_sales($id){
            $stmt = $this->pdo->prepare("SELECT * FROM `student_courses` WHERE `course_id`= $id ");
             $stmt->execute();    
            $count = $stmt->rowCount();            
                return $count;
            
        }

        public function count_courses($id){
            $stmt = $this->pdo->prepare("SELECT * FROM `student_courses` WHERE `course_id`= $id ");
             $stmt->execute();    
            $count = $stmt->rowCount();            
                return $count;
            
        }


        public function pagination_my($tables, $offset, $limit, $id){
            $stmt = $this->pdo->prepare("SELECT * FROM $tables where student_id = '$id' AND  status = 1 LIMIT $offset, $limit");
            $stmt->execute();
            $pagination = $stmt->fetchAll(PDO::FETCH_OBJ);
          
            return $pagination; 
        }

        public function pagination_my_lower($tables, $offset, $limit, $id){
            $stmt = $this->pdo->prepare("SELECT * FROM $tables where student_id = '$id'  AND  status = 1 LIMIT $offset, $limit");
            $stmt->execute();
            $pagination = $stmt->rowCount();
          
            return $pagination; 
        }
        public function pagination_my_count($tables, $id){
            $stmt = $this->pdo->prepare("SELECT * FROM $tables where student_id = '$id'  AND  status = 1  ");
            $stmt->execute();
            $pagination = $stmt->rowCount();
          
            return $pagination; 
        }

        public function get_single_g_six($table, $where, $id) {
            $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE `$where`= :id ORDER BY id DESC LIMIT 6");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $single = $stmt->fetchAll(PDO::FETCH_OBJ);
          
            return $single; 
        }

        public function get_exam_mock($exam_id, $student_id){
            $stmt = $this->pdo->prepare("SELECT * FROM student_exam_re WHERE `exam_id`= :exam_id and  `student_id`= :student_id ORDER BY id DESC");
            $stmt->bindParam(":exam_id", $exam_id, PDO::PARAM_INT);
            $stmt->bindParam(":student_id", $student_id, PDO::PARAM_INT);
            $stmt->execute();
            $single = $stmt->fetchAll(PDO::FETCH_OBJ);
          
            return $single; 
        }

        public function get_sum_payment($student_id, $course_id){
            $stmt = $this->pdo->prepare("SELECT tranche_1 + tranche_2 + tranche_3 as Totals  FROM payment WHERE   `user_id`= :student_id and `course_id` = :course_id");
            $stmt->bindParam(":course_id", $course_id, PDO::PARAM_INT);
            $stmt->bindParam(":student_id", $student_id, PDO::PARAM_INT);

            $stmt->execute();
            $single = $stmt->fetchColumn();
          
            return $single;
        }

        public function get_sum_result($student_id, $exam_id, $round){
            $stmt = $this->pdo->prepare("SELECT SUM(mark) FROM marking_up WHERE `exam_id`= :exam_id and  `student_id`= :student_id and `round` = :rounds ORDER BY id DESC");
            $stmt->bindParam(":exam_id", $exam_id, PDO::PARAM_INT);
            $stmt->bindParam(":rounds", $round, PDO::PARAM_INT);           
            $stmt->bindParam(":student_id", $student_id, PDO::PARAM_INT);

            $stmt->execute();
            $single = $stmt->fetchColumn();
          
            return $single; 
        }

        public function assignment_table($std_id)
        {
            $stmt = $this->pdo->prepare("SELECT `assignment`.`id` as id, `assignment`.`title` as title, `assignment`.`question` as question, `assignment`.`due_date` as due_date, `assignment`.`status`  as status, `assignment`.`course_id` as course_id  FROM assignment inner join student_courses on `assignment`.`course_id` = `student_courses`.`course_id` WHERE `student_courses`.`student_id` = $std_id ORDER BY assignment.id DESC");
            $stmt->bindParam(":std_id", $std_id, PDO::PARAM_INT);

            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_OBJ);
          
            return $data; 
        }


        public function assignment_sub_check($std_id, $assignment_id)
        {
            $stmt = $this->pdo->prepare("SELECT * FROM assignment_sub WHERE `student_id` = $std_id AND `assignment_id` = $assignment_id ");
            $stmt->bindParam(":std_id", $std_id, PDO::PARAM_INT);
            $stmt->bindParam(":assignment_id", $assignment_id, PDO::PARAM_INT);

            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_OBJ);
          
            return $data; 
        }

        public function check_payment_adf($student_id, $course_id){
            $stmt = $this->pdo->prepare("SELECT * FROM payment WHERE `user_id` = $student_id AND `course_id` = $course_id ");
            $stmt->bindParam(":std_id", $student_id, PDO::PARAM_INT);
            $stmt->bindParam(":course_id", $course_id, PDO::PARAM_INT);

            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_OBJ);
          
            return $data; 
        }

        public function course_progress($course_id)
        {
            $stmt = $this->pdo->prepare("SELECT SUM(duration) FROM course_content WHERE `course_id`= :course_id");
            $stmt->bindParam(":course_id", $course_id, PDO::PARAM_INT);
           
            $stmt->execute();
            $single = $stmt->fetchColumn();
          
            return $single; 
        }

        
        public function course_course_viewed($course_id, $student_id)
        {
            $stmt = $this->pdo->prepare("SELECT SUM(status) FROM student_course_progress WHERE `course_id`= :course_id AND  `student_id`= :student_id ");
            $stmt->bindParam(":course_id", $course_id, PDO::PARAM_INT);           
            $stmt->bindParam(":student_id", $student_id, PDO::PARAM_INT);           
            $stmt->execute();
            $single = $stmt->fetchColumn();
          
            return $single; 
        }


        

        public function update_course_progress($student_id, $course_id,$course_content_id){
            $stmt = $this->pdo->prepare("UPDATE student_course_progress SET `status` = `status` + 1  WHERE `student_id` = :student_id     AND `course_id`= :course_id    AND `course_content_id`= :course_content_id ");
            $stmt->bindParam(":course_id", $course_id, PDO::PARAM_INT);           
            $stmt->bindParam(":student_id", $student_id, PDO::PARAM_INT);           
            $stmt->bindParam(":course_content_id", $course_content_id, PDO::PARAM_INT);           
            
        if( $stmt->execute()){
            return true;
        }
        }

        
        public function check_student_course_prog($student_id, $course_id,$course_content_id)
        {
            $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM student_course_progress WHERE `student_id` = :student_id     AND `course_id`= :course_id    AND `course_content_id`= :course_content_id ");
            $stmt->bindParam(":course_id", $course_id, PDO::PARAM_INT);           
            $stmt->bindParam(":student_id", $student_id, PDO::PARAM_INT);           
            $stmt->bindParam(":course_content_id", $course_content_id, PDO::PARAM_INT);           
            $stmt->execute();
            $single = $stmt->fetchColumn();
          
            return $single; 
        }

        public function course_course_viewed_all($course_id)
        {
            $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM student_course_progress WHERE `course_id`= :course_id ");
            $stmt->bindParam(":course_id", $course_id, PDO::PARAM_INT);           
            $stmt->execute();
            $single = $stmt->fetchColumn();
          
            return $single; 
        }

        public function course_course_viewed_all_std($course_id)
        {
            $stmt = $this->pdo->prepare("SELECT * FROM student_courses WHERE `course_id`= :course_id ");
            $stmt->bindParam(":course_id", $course_id, PDO::PARAM_INT);           
            $stmt->execute();
            $single = $stmt->rowCount();
          
            return $single; 
        }

    
    

      
    }
?>