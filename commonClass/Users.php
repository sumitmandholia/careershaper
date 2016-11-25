<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of users
 *
 * @author smandhol
 */
class users
{
    private $users_id;
    private $logon_Id;
    private $users_type;
    
    function setUsers_id($users_id)
    {
        $this->users_id = $users_id;
    }
    function getUsers_id()
    {
        return $this->users_id;
    }
    function setLogon_Id($logon_Id)
    {
        $this->logon_Id = $logon_Id;
    }
    function getLogon_Id()
    {
        return $this->logon_Id;
    }
    function setUsers_type($users_type)
    {
        $this->users_type = $users_type;
    }
    function getUsers_type()
    {
        return $this->users_type;
    }
    
}
