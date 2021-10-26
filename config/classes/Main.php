<?php
   class Main extends Generic {
        protected $pdo;

        function __construct($pdo){
            
            $this->pdo = $pdo;
    
        
        }
        
        public function most_popular_courses(){
            $stmt = $this->pdo->prepare("SELECT `courses`.`id` AS course_id, `courses`.`course_name` AS course_name,`courses`.`course_abrev` AS course_abrev, `courses`.`img_preview` AS img_preview,`courses`.`price` AS price,`courses`.`disc_price` AS disc_price   FROM `student_courses` INNER JOIN `courses` ON `courses`.`id` = `student_courses`.`course_id`  LIMIT 8");
            $stmt->execute();
            $popular = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $popular;  
        }


        public function most_popular_courses_five(){
            $stmt = $this->pdo->prepare("SELECT `courses`.`id` AS course_id, `courses`.`course_name` AS course_name,`courses`.`course_abrev` AS course_abrev, `courses`.`img_preview` AS img_preview,`courses`.`price` AS price,`courses`.`disc_price` AS disc_price   FROM `student_courses` INNER JOIN `courses` ON `courses`.`id` = `student_courses`.`course_id`  LIMIT 5");
            $stmt->execute();
            $popular = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $popular;  
        }

        public function latest_news_three(){
            $stmt = $this->pdo->prepare("SELECT *   FROM `blog_post` WHERE `post_status` = 1  LIMIT 3");
            $stmt->execute();
            $popular = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $popular; 
        }

        public function featured_new(){
            $stmt = $this->pdo->prepare("SELECT *   FROM `blog_post` WHERE `post_status` = 1  ORDER BY RAND() LIMIT 1");
            $stmt->execute();
            $popular = $stmt->fetch(PDO::FETCH_OBJ);
            return $popular; 
        }
    }


?>