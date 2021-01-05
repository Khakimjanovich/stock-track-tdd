<?php
/*
 * Created by AYKh
 * Please contact before making any changes
 *
 * Tashkent, Uzbekistan
 */


namespace App\Cards;


interface Cards
{
    public function register($number, $expire);

    public function remove($cardId);

    public function getInfo($cardId);

    public function getRenewed($number, $expire);

    public function block($cardId);

    public function unblock($cardId);

    public function changeStatus($number, $expire);

    public function cancelTransaction($number, $expire);

}
