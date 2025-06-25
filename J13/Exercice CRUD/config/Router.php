<?php

class Router{
    
    public function __construct()
    {
        
    }
    
     public function handleRequest(array $get) : void {
     
         if (!isset($get["route"])){
             
            $userControlleurHome = new UserController();
            $userControlleurHome -> list();
         }
         else if ($get["route"] ==="show_user"){
             
            $userControlleurHome = new UserController();
            $userControlleurHome -> show();
         }
         else if ($get["route"] === "create_user"){

            $userControlleurHome = new UserController();
            $userControlleurHome -> create();
         }
         else if ($get["route"] === "check_create_user"){
             
            $userControlleurHome = new UserController();
            $userControlleurHome -> checkCreate();
         }
         else if ($get["route"] === "update_user"){
            $userControlleurHome = new UserController();
            $userControlleurHome -> update();
         }
         else if ($get["route"] === "check_update_user"){
            $userControlleurHome = new UserController();
            $userControlleurHome -> checkUpdate();
         }
         else if ($get["route"] === "delete_user"){
            $userControlleurHome = new UserController();
            $userControlleurHome -> delete();
         }
     }
}
    
?>