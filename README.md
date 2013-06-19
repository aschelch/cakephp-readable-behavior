CakePHP Readable Behavior
==============================

CakePHP ReadableBehavior provides a simple behavior to make a "Mark as Read/Unread" feature for your models


Installation 
------------------------------

Download the plugin

	cd app/Plugin
	git clone git://github.com/aschelch/cakephp-readable-behavior.git Readable


Attach the Readable behavior to the model

	public Post extends AppModel{
		$actsAs = array('Readable.Readable');
	}

Add a 'read' boolean column in your table or change the default field name
	
	public Post extends AppModel{
		$actsAs = array('Readable.Readable' => array(
			'field' => 'displayed'
		));
	}


Usage
------------------------------

Mark a post as read using id

	$this->Post->markAsRead(1);


Mark multiple posts as read using a array of id

	$this->Post->markAsRead(array(1,2,3));


Mark a post as unread using id

	$this->Post->markAsUnread(1);


Mark multiple posts as unread using a array of id

	$this->Post->markAsUnread(array(1,2,3));


Mark all posts using a condition as read 

	$this->Post->markAllAsRead(array('Post.user_id'=>1));


Mark all posts using a condition as unread 

	$this->Post->markAllAsUnread(array('Post.user_id'=>1));


