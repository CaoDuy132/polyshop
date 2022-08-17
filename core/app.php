<?php
    session_start();
    class app {
        public $Controller = 'trangchuController';
        public $Action = 'index';
        public $params = [];

        public function __construct()
        {
            $url = $this->getUrl();
            // Kiểm tra controller.
            if(isset($url[0])){
                if(file_exists('controller/' . $url[0] .'Controller.php')){
                    $this->Controller = $url[0] . 'Controller';  
                    unset($url[0]); 
                }
            }  
            require_once 'controller/'. $this->Controller . '.php';
            $this->Controller = new $this->Controller;

            // kiểm tra method.
            if(isset($url[1])){
                if(method_exists($this->Controller , $url[1])){
                    $this->Action = $url[1];
                    unset($url[1]);
                }
            }
            // gán giá trị cho params nếu có.
            $this->params = isset($url) ? array_values($url) : [];
            call_user_func_array([$this->Controller , $this->Action] , $this->params);
        }

        public function getUrl(){
            if(isset($_GET['url'])){       
               $url =  filter_var(trim($_GET['url'] , "/"));
               $url = explode('/' ,$url);
               return $url;
            }   
        }
    }


?>