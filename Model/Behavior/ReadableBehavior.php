<?php

/**
 * 
 * 
 * 
 * @author Aurélien Schelcher <aurelien.schelcher@gmail.com>
 */
class ReadableBehavior extends ModelBehavior {


    /**
     * Default settings
     * 
     * @var array
     */
    public $default = array(
        'field'      => 'read',
        'foreignKey' => 'id'
    );


    public function setup(Model $Model, $settings = array()){
        $this->__initSettings($Model, $settings);
    }
    
    /**
     * Mark model instance(s) as 'read'
     * 
     * @param Model $Model Model 
     * @param mixed $id Instance ids to mark
     * @return bool True if success, false otherwise
    **/
    public function markAsRead(Model $Model, $id){
        return $this->markAllAsRead($Model, array($Model->alias.'.'.$this->__settings[$Model->alias]['foreignKey']=>$id));
    } 
       
    /**
     * Mark model instance(s) as 'unread'
     * 
     * @param Model $Model - Model 
     * @param mixed $id - Instance ids to mark
     * @return bool True if success, false otherwise
    **/
    public function markAsUnread(Model $Model, $id){
        return $this->markAllAsUnread($Model, array($Model->alias.'.'.$this->__settings[$Model->alias]['foreignKey']=>$id));
    } 


    /**
     * Mark model instance(s) selected with a condition as 'read'
     * 
     * @param Model $Model - Model 
     * @param mixed $conditions - Array of conditions or true for all records
     * @return bool True if success, false otherwise
    **/
    public function markAllAsRead(Model $Model, $conditions = true){
        return $this->_markAllAs($Model, $conditions, true); 
    }

    /**
     * Mark model instance(s) selected with a condition as 'runead'
     * 
     * @param Model $Model - Model 
     * @param mixed $conditions - Array of conditions or true for all records
     * @return bool True if success, false otherwise
    **/
    public function markAllAsUnread(Model $Model, $conditions = true){
        return $this->_markAllAs($Model, $conditions, false); 
    }

    /**
     * Mark model instance(s) selected with a condition as 'read'
     * 
     * @param Model $Model - Model 
     * @param array $conditions - Array of conditions
     * @param bool $bool - True for 'read', false for 'unread'
     * @return bool True if success, false otherwise
    **/
    protected function _markAllAs(Model $Model, $conditions = true, $bool = true){
        return $Model->updateAll(array(
            $Model->alias.'.'.$this->__settings[$Model->alias]['field'] => $bool
        ),$conditions); 
    }


    private function __initSettings(Model $Model, $settings){
        if (!isset($this->__settings[$Model->alias])) {
            $this->__settings[$Model->alias] = $this->default;
        }
        $this->__settings[$Model->alias] = array_merge($this->__settings[$Model->alias], is_array($settings) ? $settings : array());
    }

}