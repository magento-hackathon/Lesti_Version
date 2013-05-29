<?php
/**
 * Created by JetBrains PhpStorm.
 * User: gordon
 * Date: 20.05.13
 * Time: 14:09
 * To change this template use File | Settings | File Templates.
 */
class Lesti_Version_Adminhtml_Version_Cms_PageController extends Mage_Adminhtml_Controller_Action
{

    public function ajaxAction()
    {
        if(Mage::app()->getRequest()->isAjax()) {
            $old = (int) Mage::app()->getRequest()->getParam('old');
            $new = (int) Mage::app()->getRequest()->getParam('new');
            $old = Mage::getModel('version/cms_page')->load($old);
            $new = Mage::getModel('version/cms_page')->load($new);
            $diff = Mage::helper('version')->renderDiff($old->getContent(), $new->getContent());
            $result = array();
            $result['table'] = $diff;
            $this->getResponse()->setBody(Zend_Json::encode($result));
        }
    }

}