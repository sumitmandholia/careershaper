<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of errorMessage
 *
 * @author smandhol
 */
final class CustomMessage
{
    /**
     * Call this method to get singleton
     *
     * @return UserFactory
     */
    private $msgArray = array();
    static $inst = null;
    
    /**
     * Private ctor so nobody else can instance it
     *
     */
    private function __construct() {}
    
    public static function Instance()
    {
       if ($inst === null) {
            $inst = new CustomMessage();
        }
        return $inst;
    }

    public static function setMessage($key, $message){
        if($key == NULL){
            $this->$msgArray[] = $message;
        } else {
            $this->$msgArray[$key] = $message;
        }
    }
    
    public function getMessageCount(){
        return count($this->$msgArray);
    }
    
    public function getMessage(){
        return $this->$msgArray;
    }
    
    public function resetMessages(){
        $this->msgArray = array();
    }
    
    /**
     *  THis method returns array of Keys.
     * @return type
     */
    public function keys() {
        return array_keys($this->msgArray);
    }
    
    /**
     * This
     *  THis method returns array of Keys.
     * @return type
     */
    public function values() {
        return array_values($this->msgArray);
    }
}
