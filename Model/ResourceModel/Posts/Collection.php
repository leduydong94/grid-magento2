<?php

namespace Sample\Helloworld\Model\ResourceModel\Posts;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'id';
    protected function _construct()
    {
        $this->_init(
            'Sample\Helloworld\Model\Posts',
            'Sample\Helloworld\Model\ResourceModel\Posts'
        );
    }
}
