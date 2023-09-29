<?php

namespace Vendor\Package;

class DiscountCalculator
{
    /**
     * Рассчитать процентную скидку на товар.
     *
     * @param float $originalPrice Оригинальная цена товара.
     * @param float $discountPercentage Процент скидки.
     * @return float Цена с учетом скидки.
     */
    public function calculatePercentageDiscount($originalPrice, $discountPercentage)
    {
        return $originalPrice - ($originalPrice * ($discountPercentage / 100));
    }

    /**
     * Рассчитать фиксированную скидку на товар.
     *
     * @param float $originalPrice Оригинальная цена товара.
     * @param float $discountAmount Фиксированная сумма скидки.
     * @return float Цена с учетом скидки.
     */
    public function calculateFixedDiscount($originalPrice, $discountAmount)
    {
        return $originalPrice - $discountAmount;
    }

    /**
     * Рассчитать скидку на более дешевый товар в чеке.
     *
     * @param array $orderItems Массив товаров в чеке.
     * @return float Сумма скидки на более дешевый товар.
     */
    public function calculateCheaperItemDiscount($orderItems)
    {
        $cheapestItemPrice = null;

        foreach ($orderItems as $item) {
            if ($cheapestItemPrice === null || $item['price'] < $cheapestItemPrice) {
                $cheapestItemPrice = $item['price'];
            }
        }

        $discount = 0;
        if ($cheapestItemPrice !== null) {
            $discount = $cheapestItemPrice * 0.10; // Пример: скидка 10% от цены самого дешевого товара.
        }

        return $discount;
    }
}

//примеры для процентной и фикс скидки:

$calculator = new \Vendor\Package\DiscountCalculator();
$originalPrice = 100; // ориг цена товар
$discountPercentage = 20; //проц скидки
$discountedPrice = $calculator->calculatePercentageDiscount($originalPrice, $discountPercentage);//рассчет цены с учетом скидки
echo "Цена с учетом {$discountPercentage}% скидки: $discountedPrice";

$originalPrice = 50;    // ориг цена товара
$discountAmount = 10;    // фикс сумма скидки
$discountedPrice = $calculator->calculateFixedDiscount($originalPrice, $discountAmount); //рассчет цены с учетом скидки
echo "Цена с учетом фиксированной скидки: $discountedPrice";

$orderItems = [
    ['name' => 'Товар A', 'price' => 100],
    ['name' => 'Товар B', 'price' => 80],
    ['name' => 'Товар C', 'price' => 120],
];

$cheaperItemDiscount = $calculator->calculateCheaperItemDiscount($orderItems);
echo "Скидка на более дешевый товар: $cheaperItemDiscount";
