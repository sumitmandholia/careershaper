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
    private $user_name;
    private $users_status;
    private $phone1;
    private $email1;
    private $status;
    
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
    function setUser_name($user_name)
    {
        $this->user_name = $user_name;
    }
    function getUser_name()
    {
        return $this->user_name;
    }
    function setUsers_status($users_status)
    {
        $this->users_status = $users_status;
    }
    function getUsers_status()
    {
        return $this->users_status;
    }
    function setPhone1($phone1)
    {
        $this->phone1 = $phone1;
    }
    function getPhone1()
    {
        return $this->phone1;
    }
    function setEmail1($email1)
    {
        $this->email1 = $email1;
    }
    function getEmail1()
    {
        return $this->email1;
    }
    function setStatus($status)
    {
        $this->status = $status;
    }
    function getStatus()
    {
        return $this->status;
    }
}
