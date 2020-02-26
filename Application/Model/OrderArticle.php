<?php

namespace Pflaesterer\StornOxid\Application\Model;

class OrderArticle extends OrderArticle_parent
{
    /**
     * Sets order article storno value to 0 and if stock control is on -
     * restores previous oxarticle stock state
     */
    public function continueOrderArticle()
    {
        if ($this->oxorderarticles__oxstorno->value == 1) {
            $myConfig = $this->getConfig();
            $this->oxorderarticles__oxstorno = new \OxidEsales\Eshop\Core\Field(0);
            if ($this->save()) {
                $this->updateArticleStock($this->oxorderarticles__oxamount->value, $myConfig->getConfigParam('blAllowNegativeStock'));
            }
        }
    }
}