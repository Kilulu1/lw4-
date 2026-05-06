<?php

require_once __DIR__ . '/vendor/autoload.php';

use OrderManagerLib\OrderManager;

echo "=== OrderManager Test ===\n\n";
$manager = new OrderManager();
echo "Создаём заказы:\n";
$id1 = $manager->createOrder(100.50);
echo "Заказ #{$id1} на сумму 100.50 создан (статус: новый)\n";
$id2 = $manager->createOrder(250.00);
echo "Заказ #{$id2} на сумму 250.00 создан (статус: новый)\n";
$id3 = $manager->createOrder(75.30);
echo "Заказ #{$id3} на сумму 75.30 создан (статус: новый)\n";
echo "\n---\n";
echo "Меняем статусы:\n";
$manager->setStatus($id1, 'в работе');
echo "Заказ #{$id1} → статус 'в работе'\n";
$manager->setStatus($id2, 'завершенный');
echo "Заказ #{$id2} → статус 'завершенный'\n";
echo "\n---\n";
echo "Заказы со статусом 'новый':\n";
$newOrders = $manager->getOrdersByStatus('новый');
foreach ($newOrders as $order) {
    echo "  ID: {$order['id']}, Сумма: {$order['amount']}, Статус: {$order['status']}\n";
}
echo "\nЗаказы со статусом 'в работе':\n";
$inProgressOrders = $manager->getOrdersByStatus('в работе');
foreach ($inProgressOrders as $order) {
    echo "  ID: {$order['id']}, Сумма: {$order['amount']}, Статус: {$order['status']}\n";
}
echo "\nЗаказы со статусом 'завершенный':\n";
$completedOrders = $manager->getOrdersByStatus('завершенный');
foreach ($completedOrders as $order) {
    echo "  ID: {$order['id']}, Сумма: {$order['amount']}, Статус: {$order['status']}\n";
}

echo "\n---\n";

echo "Все заказы:\n";
foreach ($manager->getAllOrders() as $order) {
    echo "  ID: {$order['id']}, Сумма: {$order['amount']}, Статус: {$order['status']}\n";
}