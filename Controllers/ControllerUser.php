<?php
    require_once("../../Config/config.php");
    require_once(ROOT_PATH.ROOT_APP.MODELS_VO_PATH."UserVO.php");
    require_once(ROOT_PATH.ROOT_APP.MODELS_DAO_PATH."UserDAO.php");

    class ControllerUser{
        //Atributo privado el que va invocar nuestra clase user
        private $user;
        
        public function __construct(){
            $this->user = new UserDAO();
        }
        public function authenticationUser($username){
            return $this->user->authenticationUser($username);
        }

        public function createUser($userVO){
            return $this->user->createUser($userVO);
        }

        public function listUser(){
            return $this->user->listUser();
        }

        public function listUserId($userid){
            return $this->user->listUserId($userid);
        }

        public function existsUser($username, $usercorreo){
            return $this->user->existsUser($username, $usercorreo);
        }

        public function existsUserEmail($usercorreo){
            return $this->user->existsUserEmail($usercorreo);
        }

        public function existsUserName($username){
            return $this->user->existsUserName($username);
        }

        public function updateUser($userVO){
            return $this->user->updateUser($userVO);
        }

        public function updateUserPassword($userVO){
            return $this->user->updateUserPassword($userVO);
        }

        public function deleteUser($userid){
            return $this->user->deleteUser($userid);
        }
        
    }

?>