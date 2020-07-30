<?php

namespace Sample\Helloworld\Controller\Adminhtml\Posts;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Sample\Helloworld\Model\PostsFactory;
use Magento\Ui\Component\MassAction\Filter;
use Sample\Helloworld\Model\ResourceModel\Posts\CollectionFactory;

class Delete extends Action
{
    protected $_pageFactory;
    protected $_postsFactory;
    protected $_filter;
    protected $_collectionFactory;

    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        Filter $filter,
        PostsFactory $postsFactory,
        CollectionFactory $collectionFactory
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->_postsFactory = $postsFactory;
        $this->_filter = $filter;
        $this->_collectionFactory = $collectionFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $collection = $this->_filter->getCollection($this->_collectionFactory->create());
        // var_dump($collection); exit;
        $collectionSize = $collection->getSize();
   		foreach ($collection as $item) {
   			$item->delete();	
   		}
    
        $this->messageManager->addSuccess(__('A total of %1 record(s) have been deleted.',$collectionSize));
   		// die("abc");
        return $this->_redirect('hello/posts/index');
    }
}