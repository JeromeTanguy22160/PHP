<?php

declare(strict_types=1);

class Guard {

    public static function giveAccess(Post $post, User $user) : User{
        
        $isPostPrivate = $post->isPrivate();
        $userRoles = $user->getRoles();
        
        if ($isPostPrivate) {
            if (in_array('ANONYMOUS', $userRoles)) {
                throw new InvalidArgumentException("Les anonymes n ont pas les acces");
            }
            if (in_array('USER', $userRoles) && !in_array('ADMIN', $userRoles)) {
                $user->addRole('ADMIN');
            }
        }
        else{
           if (in_array('ANONYMOUS', $userRoles)) {
                $user->addRole('USER');
            } 
        }
        return $user;
    }

    public static function removeAccess(Post $post, User $user) : User{
       
        $isPostPrivate = $post->isPrivate();
        $userRoles = $user->getRoles();

        if ($isPostPrivate) {
            if (in_array('ADMIN', $userRoles)) {
                $user->setRoles(['USER']);
            } elseif (in_array('USER', $userRoles)) {
                $user->setRoles(['ANONYMOUS']);
            }
        } else {
            if (in_array('ADMIN', $userRoles)) {
                $user->setRoles(['USER']);
            } elseif (in_array('USER', $userRoles)) {
                $user->setRoles(['ANONYMOUS']);
            }
        }
        
        return $user;
    } 
}

?>