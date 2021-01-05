<?php
/*
 * Created by AYKh
 * Please contact before making any changes
 *
 * Tashkent, Uzbekistan
 */


namespace App\Cards;


class UZCARD extends Card implements Cards
{
    public function register($number, $expire)
    {
        //search db for number and expire
        //get token

        //if token not available
        //register and get token

        //from token return card instance
    }

    public function block($cardId)
    {
        //if token available
        //block it
        // TODO: Implement block() method.
    }

    public function cancelTransaction($number, $expire)
    {
        // TODO: Implement cancelTransaction() method.
    }

    public function changeStatus($number, $expire)
    {
        // TODO: Implement changeStatus() method.
    }

    public function getInfo($cardId)
    {
        // TODO: Implement getInfo() method.
    }

    public function getRenewed($number, $expire)
    {
        // TODO: Implement getRenewed() method.
    }

    public function remove($cardId)
    {
        //if token available
        //remove it form user_card table
        // TODO: Implement remove() method.
    }

    public function unblock($cardId)
    {
        //if token available
        //unblock it
        // TODO: Implement unblock() method.
    }
}
