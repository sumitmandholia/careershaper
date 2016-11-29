<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MyCollection
 *
 * @author smandhol
 */
class MyCollection {
    
   private $items = array();
   
   /**
    * This method is used to add items to collection.
    * 
    * @param type $obj
    * @param type $key
    * @throws KeyHasUseException
    */
    public function addItem($key = null, $obj) {
        if ($key == null) {
            $this->items[] = $obj;
        }
        else {
            if (isset($this->items[$key])) {
              //  throw new KeyHasUseException("Key ". $key ." already in use.");
            }
            else {
                $this->items[$key] = $obj;
            }
        }
    }
    
    /**
     * This Method is used to delete item from collection.
     * 
     * @param type $key
     * @throws KeyInvalidException
     */
    public function deleteItem($key) {
        if (isset($this->items[$key])) {
            unset($this->items[$key]);
        }
        else {
           // throw new KeyInvalidException("Invalid key ".$key);
        }
    }

    /**
     * This Method is used to get Item List 
     * @param type $key
     * @return type
     * @throws KeyInvalidException
     */
    public function getItem($key) {
        if (isset($this->items[$key])) {
            return $this->items[$key];
        }
        else {
           //throw new KeyInvalidException("Invalid key ".$key);
        }
    }
    
    /**
     *  THis method returns array of Keys.
     * @return type
     */
    public function keys() {
        return array_keys($this->items);
    }
    
    /**
     * This
     *  THis method returns array of Keys.
     * @return type
     */
    public function values() {
        return array_values($this->items);
    }
    /**
     * THis Method returns the length of collection
     * @return type
     */
    public function length() {
        return count($this->items);
    }
    
    /**
     * This method is used to check weather key exist in collection or not.
     * @param type $key
     * @return type
     */
    public function keyExists($key) {
        return isset($this->items[$key]);
    }
}
