<?php
namespace Sample\Helloworld\Controller\Adminhtml\Posts;
 
use Sample\Helloworld\Controller\Adminhtml\Posts;
 
class Create extends Posts
{
    /**
     * Create new news action
     *
     * @return void
     */
    public function execute()
    {
    	// die(__METHOD__);
        $this->_forward('edit');
    }
}