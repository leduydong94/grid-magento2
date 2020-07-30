<?php
namespace Sample\Helloworld\Controller\Adminhtml\Posts;
use Sample\Helloworld\Controller\Adminhtml\Posts;
 
class Edit extends Posts
{
    /**
     * @return void
     */
    public function execute()
    {
    	// die(__METHOD__);
        $postId = $this->getRequest()->getParam('id');
 
        $model = $this->_postsFactory->create();
 
        if ($postId) {
            $model->load($postId);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This news no longer exists.'));
                $this->_redirect('*/*/');
                return;
            }
        }
 
        // Restore previously entered form data from session
        $data = $this->_session->getNewsData(true);
        if (!empty($data)) {
            $model->setData($data);
        }
        $this->_coreRegistry->register('sample_hello', $model);
 
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('Sample_Helloworld::helloworld_id');
        $resultPage->getConfig()->getTitle()->prepend(__('Posts'));
 
        return $resultPage;
    }
}