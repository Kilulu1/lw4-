<?php

namespace OrderManagerLib;

class OrderManager
{
    private array $orders = [];
    private int $nextId = 1;
    public function createOrder(float $amount): int
    {
        $id = $this->nextId++;
        
        $this->orders[$id] = [
            'id' => $id,
            'amount' => $amount,
            'status' => 'новый'
        ];
        
        return $id;
    }

    public function setStatus(int $id, string $status): bool
    {
        $allowedStatuses = ['новый', 'в работе', 'завершенный'];
        
        if (!in_array($status, $allowedStatuses, true)) {
            return false;
        }
        
        if (!isset($this->orders[$id])) {
            return false;
        }
        $this->orders[$id]['status'] = $status;
        return true;
    }

    public function getOrdersByStatus(string $status): array
    {
        $allowedStatuses = ['новый', 'в работе', 'завершенный'];
        
        if (!in_array($status, $allowedStatuses, true)) {
            return [];
        }
        
        return array_values(array_filter($this->orders, function (array $order) use ($status): bool {
            return $order['status'] === $status;
        }));
    }

    public function getAllOrders(): array
    {
        return array_values($this->orders);
    }
}