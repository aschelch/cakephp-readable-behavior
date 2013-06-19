<?php

class ReadablePostFixture extends CakeTestFixture {

    var $fields = array(
        'id' => array('type' => 'integer', 'key' => 'primary', 'extra'=> 'auto_increment'),
        'title' => array('type' => 'string', 'null' => false),
        'body' => 'text',
        'read' => 'boolean',
        'created' => 'datetime',
        'updated' => 'datetime'
    );

    var $records = array(
        array ('id' => 1, 'title' => 'First Article', 'body' => 'First Article Body', 'read'=>true, 'created' => '2007-03-18 10:39:23', 'updated' => '2007-03-18 10:41:31'),
        array ('id' => 2, 'title' => 'Second Article', 'body' => 'Second Article Body', 'read'=>true, 'created' => '2007-03-18 10:41:23', 'updated' => '2007-03-18 10:43:31'),
        array ('id' => 3, 'title' => 'Third Article', 'body' => 'Third Article Body', 'read'=>false, 'created' => '2007-03-18 10:43:23', 'updated' => '2007-03-18 10:45:31'),
        array ('id' => 4, 'title' => 'Fourth Article', 'body' => 'Fourth Article Body', 'read'=>false, 'created' => '2007-03-18 10:44:23', 'updated' => '2007-03-18 10:45:31'),
        array ('id' => 5, 'title' => 'Fifth Article', 'body' => 'Fifth Article Body', 'read'=>false, 'created' => '2007-03-18 10:45:23', 'updated' => '2007-03-18 10:45:31'),
    );

}