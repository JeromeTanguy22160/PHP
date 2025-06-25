<?php


class Router{
    
    public function __construct()
    {
        
    }
    
     public function handleRequest(array $get) : void {
     
         if (!isset($get["route"])){
             
            $userControllerHome = new UserController();
            $userControllerHome -> list();
         }
         else if ($get["route"] ==="show_user"){
             
            $userControllerShow = new UserController();
            $userControllerShow -> show();
         }
         else if ($get["route"] === "create_user"){

            $userControllerCreate = new UserController();
            $userControllerCreate -> create();
         }
         else if ($get["route"] === "check_create_user"){
             
            $userControllerCheckCreate = new UserController();
            $userControllerCheckCreate -> checkCreate();
         }
         else if ($get["route"] === "update_user"){
            $userControlleurUpdate = new UserController();
            $userControlleurUpdate -> update();
         }
         else if ($get["route"] === "check_update_user"){
            $userControlleurCheckUpdate = new UserController();
            $userControlleurCheckUpdate -> checkUpdate();
         }
         else if ($get["route"] === "delete_user"){
            $userControlleurDelete = new UserController();
            $userControlleurDelete -> delete();
         }
     }
}
    
?>