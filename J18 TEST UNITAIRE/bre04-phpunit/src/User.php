<?php

class User {
    
    public function __construct(
        private string $firstName,
        private string $lastName,
        private string $email,
        private string $password,
        private array $roles = ["ANONYMOUS"]
        )
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setRoles($roles);
    }
    
    private function validateFirstName(string $firstName) : void{
        if(empty(trim($firstName))) {
            throw new InvalidArgumentException("Le prénom ne peut pas être vide.");
        }
    }
    
    private function validateLastName(string $lastName) : void{
        if(empty(trim($lastName))) {
            throw new InvalidArgumentException("Le nom ne peut pas être vide.");
        }
    }
    
    private function validateEmail(string $email): void {
        $pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
        if(!preg_match($pattern, $email)){
            throw new InvalidArgumentException("L'email n'est pas valable.");
        };
    }
    
    private function validatePassword(string $password): void {
        $pattern = "/^(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z0-9]).{8,}$/";
        if(!preg_match($pattern, $password)){
            throw new InvalidArgumentException("Le mot de passe doit contenir au minimum une majuscule, un mot de passe ,et un caractère spécial.");
        }
    }
    
    private function validateRoles(array $roles): void {
        $validRoles = ["ANONYMOUS","USER","ADMIN"];
        
        if (empty($roles)) {
            throw new InvalidArgumentException("Les roles ne peuvent pas être vide.");
        }
        //Validation des roles 
        foreach ($roles as $role){
            if(!in_array($role, $validRoles)){
                throw new InvalidArgumentException("Le rôle n'est pas valide.");
            }
        }
        //Verification que si pas de USER ou ADMIN , ANONYMOUS est present
        if(!in_array("ANONYMOUS", $roles) && !in_array("ADMIN", $roles) && !in_array("USER",$roles)){
            throw new InvalidArgumentException("Si 'USER' ou 'ADMIN' ne sont pas présent,'ANONYMOUS' doit être present.");
        }
        
        //Verification que ANONYMOUS n est pas present si USER ET/OU ADMIN le sont
        if((in_array("USER", $roles) || in_array("ADMIN", $roles)) && in_array("ANONYMOUS",$roles)){
            throw new InvalidArgumentException("Si 'USER' ou 'ADMIN' est présent,'ANONYMOUS' ne doit pas être present.");
        }
    }
    
    public function addRole(string $newRole) : array {
        $validRoles = ["ANONYMOUS", "USER", "ADMIN"];
        
        //Verification du nouveau role 
        if(!in_array($newRole, $validRoles)){
            throw new InvalidArgumentException("Le rôle $newRole n'est pas valide");
        }
        
        //role deja existant
        if(in_array($newRole,$this->roles)){
            return $this->roles;
        }
        
        //Si USER ou ADMIN, suppression de ANONYMOUS
        if(($newRole === "USER" || $newRole === "ADMIN") && in_array("ANONYMOUS",$this->roles)){
            $this->roles = array_diff($this->roles, ["ANONYMOUS"]);
        }
        
        //Si ajout de ANONYMOUS, on enleve USER et/ou ADMIN
        if($newRole === "ANONYMOUS"){
            $this->roles = array_diff($this->roles, ["USER", "ADMIN"]);
        }
        
        $this->roles[] = $newRole;
        
        return $this->roles;
    }
    
    public function removeRole(string $role) : array{
        
        if(in_array($role, $this->roles)){
            $this->roles = array_diff($this->roles,[$role]);
            $this->roles = array_values($this->roles);
        }
        
        if(empty($this->roles)){
            $this->roles[] = "ANONYMOUS";
        }
        return $this->roles;
    }
    
    public function getFirstName(): string {
        return $this->firstName;
    }
    public function setFirstName($firstName): void {
        $this->validateFirstName($firstName);
        $this-> firstName = $firstName;
    }
    
    public function getLastName(): string {
        return $this->lastName;
    }
    public function setLastName($lastName): void {
        $this->validateLastName($lastName);
        $this-> lastName = $lastName;
    }
    
    public function getEmail(): string {
        return $this-> email;
    }
    public function setEmail($email): void {
        $this->validateEmail($email);
        $this-> email = $email;
    }
    
    public function getPassword(): string {
        return $this-> password;
    }
    public function setPassword($password): void {
        $this->validatePassword($password);
        $this-> password = $password;
    }
    
    public function getRoles(): array {
        return $this-> roles;
    }
    public function setRoles($roles): void {
        $this->validateRoles($roles);
        $this-> roles = $roles;
    }
}

?>