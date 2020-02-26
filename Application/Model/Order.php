<?php

namespace Pflaesterer\StornOxid\Application\Model;

class Order extends Order_parent
{
    /**
     * Performs order continue process
     */
    public function continueOrder()
    {
        $this->oxorder__oxstorno = new \OxidEsales\Eshop\Core\Field(0);
        if ($this->save()) {
            // continuing ordered products
            foreach ($this->getOrderArticles() as $oOrderArticle) {
                $oOrderArticle->continueOrderArticle();
            }
        }
    }
}