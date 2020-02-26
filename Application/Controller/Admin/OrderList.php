<?php

namespace Pflaesterer\StornOxid\Application\Controller\Admin;

class OrderList extends OrderList_parent
{
    /**
     * Cancels or continues (if previously canceled) order and its order articles
     */
    public function storno()
    {
        $order = oxNew(\OxidEsales\Eshop\Application\Model\Order::class);
        if ($order->load($this->getEditObjectId())) {
            if ($order->oxorder__oxstorno->value == 0) {
                $order->cancelOrder();
            } else {
                $order->continueOrder();
            }
        }
    }


    /**
     * Continues order and its order articles
     * Calls init() to reload list items after cancellation.
     */
    public function continueOrder()
    {
        $order = oxNew(\OxidEsales\Eshop\Application\Model\Order::class);
        if ($order->load($this->getEditObjectId())) {
            $order->continueOrder();
        }

        $this->resetContentCache();

        $this->init();
    }
}
