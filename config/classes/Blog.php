<?php
   class Blog extends Generic {
        protected $pdo;

        function __construct($pdo){
            
            $this->pdo = $pdo;
    
        
        }


        public function url_slug($url)
        {
            $slug = trim($url);
            $slug = preg_replace('/[^a-zA-Z0-9 -]/','',$slug);
            $slug = str_replace(' ','-', $slug);
            $slug = strtolower($slug);

            return $slug;
        }
        public function get_blog_posts($term){
            $stmt = $this->pdo->prepare("SELECT * FROM blog_post where title LIKE '%$term%' or descs LIKE '%$term%'  or body LIKE '%$term%' ");
            $stmt->execute();
            $search = $stmt->fetchAll(PDO::FETCH_OBJ);
          
            return $search; 
        } 
        public function count_cats($limit)        
        {
            $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM blog_post WHERE category = $limit");
            $stmt->execute();
            $count = $stmt->fetchColumn();
          
            return $count; 
        }

        public function pagination_blog($offset, $limit)
        
        {
            $stmt = $this->pdo->prepare("SELECT * FROM blog_post  ORDER BY id DESC LIMIT $offset, $limit");
            $stmt->execute();
            $pagination = $stmt->fetchAll(PDO::FETCH_OBJ);
          
            return $pagination; 
        }

        public function pagination_lower_blog($offset, $limit)
        
        {
            $stmt = $this->pdo->prepare("SELECT * FROM blog_post  LIMIT $offset, $limit");
            $stmt->execute();
            $pagination = $stmt->rowCount();
          
            return $pagination; 
        }
        public function pagination_count_blog()
        {
               $stmt = $this->pdo->prepare("SELECT * FROM blog_post  ");
            $stmt->execute();
            $pagination = $stmt->rowCount();
          
            return $pagination; 
        } 



        public function get_comment_list($id)
        {
            $stmt = $this->pdo->prepare("SELECT * FROM blog_comments WHERE post_id = $id");
            $stmt->execute();
            $pagination = $stmt->fetchAll(PDO::FETCH_OBJ);
          
            return $pagination; 
        } 

        public function get_slug_from_post($slug)
        {
           

               $stmt = $this->pdo->prepare("SELECT * FROM blog_post WHERE url_slug = :slug");
           $stmt->bindParam(":slug", $slug, PDO::PARAM_STR);
            $stmt->execute();
            $single = $stmt->fetch(PDO::FETCH_OBJ);
          
            return $single;  
        } 

       

        public function pagination_blog_main($offset, $limit)
        
        {
            $stmt = $this->pdo->prepare("SELECT * FROM blog_post WHERE post_status = 1  ORDER BY id DESC LIMIT $offset, $limit");
            $stmt->execute();
            $pagination = $stmt->fetchAll(PDO::FETCH_OBJ);
          
            return $pagination; 
        }

        public function pagination_lower_blog_main($offset, $limit)
        
        {
            $stmt = $this->pdo->prepare("SELECT * FROM blog_post  WHERE post_status = 1   LIMIT $offset, $limit");
            $stmt->execute();
            $pagination = $stmt->rowCount();
          
            return $pagination; 
        }
        public function pagination_count_blog_main()
        {
               $stmt = $this->pdo->prepare("SELECT * FROM blog_post  WHERE post_status = 1   ");
            $stmt->execute();
            $pagination = $stmt->rowCount();
          
            return $pagination; 
        } 


       

      
    }
?>