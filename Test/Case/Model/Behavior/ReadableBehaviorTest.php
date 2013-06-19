<?php

App::uses('ReadableBehavior', 'Readable.Model/Behavior');

class ReadablePost extends CakeTestModel{

	public $actsAs = array('Readable.Readable');

}


class ReadableBehaviorTest extends CakeTestCase{

	/**
     * Fixtures associated with this test case
     *
     * @var array
     */
    var $fixtures = array('plugin.readable.readable_post');


	/**
	 * Method executed before each test
	 *
	 */
	public function setUp() {
		parent::setUp();
		$this->ReadablePost = ClassRegistry::init('ReadablePost');
	}
	
	/**
	 * Method executed after each test
	 *
	 */
	public function tearDown() {
		unset($this->ReadablePost);
		parent::tearDown();
	}

	public function testMarkAsRead(){
		$this->assertEquals(2, count($this->ReadablePost->findAllByRead(true)));
		$this->ReadablePost->markAsRead(1); // Already read
		$this->assertEquals(2, count($this->ReadablePost->findAllByRead(true)));
		$this->ReadablePost->markAsRead(3); // Mark a  post as 'read'
		$this->assertEquals(3, count($this->ReadablePost->findAllByRead(true)));
		$this->ReadablePost->markAsRead(array(4,5)); // Mark 2 posts as 'read'
		$this->assertEquals(5, count($this->ReadablePost->findAllByRead(true)));
	}

	public function testMarkAsUnread(){
		$this->assertEquals(2, count($this->ReadablePost->findAllByRead(true)));
		$this->ReadablePost->markAsUnread(3);
		$this->assertEquals(2, count($this->ReadablePost->findAllByRead(true)));
		$this->ReadablePost->markAsUnread(1);
		$this->assertEquals(1, count($this->ReadablePost->findAllByRead(true)));
		$this->ReadablePost->markAsUnread(array(2));
		$this->assertEquals(0, count($this->ReadablePost->findAllByRead(true)));
	}

	public function testMarkAllAsRead(){
		$this->assertEquals(2, count($this->ReadablePost->findAllByRead(true)));
		$this->ReadablePost->markAllAsRead(array('ReadablePost.title LIKE' => 'F%'));
		$this->assertEquals(4, count($this->ReadablePost->findAllByRead(true)));
		$this->ReadablePost->markAllAsRead();
		$this->assertEquals(5, count($this->ReadablePost->findAllByRead(true)));
	}

	public function testMarkAllAsUnread(){
		$this->assertEquals(2, count($this->ReadablePost->findAllByRead(true)));
		$this->ReadablePost->markAllAsUnread(array('ReadablePost.title LIKE' => 'First%'));
		$this->assertEquals(1, count($this->ReadablePost->findAllByRead(true)));
		$this->ReadablePost->markAllAsUnread();
		$this->assertEquals(0, count($this->ReadablePost->findAllByRead(true)));
	}
}