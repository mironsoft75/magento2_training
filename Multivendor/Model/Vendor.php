<?php
/**
 * Created by PhpStorm.
 * User: ntxbaraka
 * Date: 4/9/2018
 * Time: 2:00 PM
 */
namespace  Magestore\Multivendor\Model;
/**
 * *class Vendor
 * @package Magestore\Multivendor\Model
 */
class Vendor extends \Magento\Framework\Model\AbstractModel{
    /**
     * Vendor constructor.
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param ResourceModel\Vendor $resource
     * @param ResourceModel\Vendor\Collection $resourceCollection
     */
    protected $_dateFactory;
    public function __construct(
    \Magento\Framework\Model\Context $context,
    \Magento\Framework\Registry $registry,
    \Magestore\Multivendor\Model\ResourceModel\Vendor $resource,
    \Magestore\Multivendor\Model\ResourceModel\Vendor\Collection $resourceCollection,
    \Magento\Framework\Stdlib\DateTime\DateTimeFactory $dateFactory
){
        $this->_dateFactory = $dateFactory;
    parent::__construct(
        $context,
        $registry,
        $resource,
        $resourceCollection
    );
    }

    public function beforeSave()
    {

        if(!$this->getId()){
            $this->setCreatedAt($this->_dateFactory->create()->gmtDate());
        }else{
            $this->setUpdateAt($this->_dateFactory->create()->gmtDate());
        }
        return parent::beforeSave(); // TODO: Change the autogenerated stub
    }
}