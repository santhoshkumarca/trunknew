<?php


namespace Echidna\Custompayment\Controller\Index;

use Magento\Checkout\Model\Session as CartSession;
use Magento\Framework\Controller\ResultFactory;
use Magento\Store\Model\StoreManagerInterface;


class Telephonepost extends \Magento\Framework\App\Action\Action
{
    /**
     * @var StoreManagerInterface
     */
    private $_storeManager;
    private $session;

    protected $resultPageFactory;

    /**
     * Constructor
     *
     * @param \Magento\Framework\App\Action\Context  $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        ResultFactory $resultFactory,
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        CartSession $session,
        StoreManagerInterface $storeManager
    ) {
        $this->resultFactory = $resultFactory;
        $this->resultPageFactory = $resultPageFactory;
        $this->_storeManager = $storeManager;
        $this->session = $session;
        parent::__construct($context);
    }

    /**
     * Execute view action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $quote = $this->session->getQuote();
        $quoteShippingAddress = $quote->getShippingAddress();
        $telephone = $this->getRequest()->getParam('telephone');
        $quoteShippingAddress->setTelephone($telephone);
        $quoteShippingAddress->save();

        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $baseUrl = $this->_storeManager->getStore()->getBaseUrl();
            $resultRedirect->setUrl($baseUrl . 'checkout/#shipping');
            return $resultRedirect;

    }
}
