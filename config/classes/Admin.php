<?php
   class Admin extends Generic {
        protected $pdo;

        function __construct($pdo){
            
            $this->pdo = $pdo;
    
        
        }

        public function teacher_login($email, $password){
            $stmt = $this->pdo->prepare("SELECT * FROM `teacher` WHERE `email`=:email AND `password`= :passwords");
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->bindParam(":passwords", $password, PDO::PARAM_STR);
            $stmt->execute();
    
            $user = $stmt->fetch(PDO::FETCH_OBJ);
            $count = $stmt->rowCount();
    
    
            if($count>0){
              
                $_SESSION['staff_id'] = $user->id;
                $_SESSION['sname'] = $user->sname;
                $_SESSION['fname'] = $user->fname;
                $_SESSION['passport'] = $user->passport;
                $_SESSION['email'] = $user->email;
                header('Location: dashboard');
            }else{
                return false;
            }
            
        }

        public function get_students($term){
            $stmt = $this->pdo->prepare("SELECT * FROM user where firstname LIKE '%$term%' or surname LIKE '%$term%' ");
            $stmt->execute();
            $search = $stmt->fetchAll(PDO::FETCH_OBJ);
          
            return $search; 
        } 
    
        public function  search_student_by_course($c_id) {
            $stmt = $this->pdo->prepare("SELECT * FROM student_courses WHERE  course_id = :cid");
            $stmt->bindParam(":cid", $c_id, PDO::PARAM_INT);
            $stmt->execute();
            $single = $stmt->fetchAll(PDO::FETCH_OBJ);
          
            return $single; 
        }
    

        public function get_admin_single($id, $type) {
            $stmt = $this->pdo->prepare("SELECT * FROM user WHERE `id`= $id and `type` = $type");
           // $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $single = $stmt->fetch(PDO::FETCH_OBJ);
          
            return $single; 
        }

      
    }
?>