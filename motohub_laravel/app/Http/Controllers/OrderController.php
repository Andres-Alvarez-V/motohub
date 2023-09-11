<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Motorcycle;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(Request $request): View
    {
        $orderData = $request->session()->get('orderData');
        $orderItems = $orderData['orderItems'] ?? [];
        $subTotal = $orderData['subTotal'] ?? 0;

        $viewData['subTotal'] = $subTotal;
        $viewData['total'] = $subTotal + config('constants.SHIPPING_VALUE');
        $viewData['orderItems'] = $orderItems;
        $viewData['shippingValue'] = config('constants.SHIPPING_VALUE');

        return view('order.index')->with('viewData', $viewData);
    }

    public function add(Request $request): RedirectResponse
    {
        Order::validateAdd($request);

        $motorcycle_id = $request->input('motorcycle_id');
        $quantity = $request->input('quantity');

        $motorcycle = Motorcycle::findOrFail($motorcycle_id)->toArray();

        $orderData = $request->session()->get('orderData');
        $orderItems = $orderData['orderItems'] ?? [];
        $subTotal = $orderData['subTotal'] ?? 0;

        $orderItems[] = [
            'motorcycle' => $motorcycle,
            'quantity' => $quantity,
        ];

        $orderData['orderItems'] = $orderItems;
        $orderData['subTotal'] = $subTotal + $motorcycle['price'] * $quantity;

        $request->session()->put('orderData', $orderData);

        return to_route('order.index');
    }

    public function delete(int $id, Request $request): RedirectResponse
    {
        $orderData = $request->session()->get('orderData');
        $orderItems = $orderData['orderItems'] ?? [];
        $subTotal = $orderData['subTotal'] ?? 0;

        $orderData['subTotal'] = $subTotal - $orderItems[$id]['motorcycle']['price'] * $orderItems[$id]['quantity'];
        unset($orderData['orderItems'][$id]);

        $request->session()->put('orderData', $orderData);

        return back();
    }

    public function deleteAll(Request $request): RedirectResponse
    {
        $request->session()->forget('orderData');

        return back();
    }

    public function save(Request $request): RedirectResponse|View
    {
        $orderData = $request->session()->get('orderData');
        $orderItems = $orderData['orderItems'] ?? [];
        $subTotal = $orderData['subTotal'] ?? 0;

        Order::validateSave($request);

        $user_id = auth()->user()->id;
        $user = User::findOrFail($user_id);

        $userBalance = $user->getBalance();

        if ($userBalance < $subTotal + config('constants.SHIPPING_VALUE')) {
            return back()->withErrors(['message' => 'No tienes suficiente dinero para realizar esta compra']);
        }

        $user->update([
            'balance' => $userBalance - ($subTotal + config('constants.SHIPPING_VALUE')),
        ]);

        $order = Order::create([
            'user_id' => $user_id,
            'payment' => 'approved',
            'shipping_address' => $request->input('shipping_address') ?? $user->getAddress(),
            'shipping_value' => config('constants.SHIPPING_VALUE'),
            'sub_total' => $subTotal,
            'total' => $subTotal + config('constants.SHIPPING_VALUE'),
            'active' => false,
        ]);

        //Get all the order items stored in the session
        foreach ($orderItems as $orderItem) {
            OrderItem::create([
                'order_id' => $order->getId(),
                'motorcycle_id' => $orderItem['motorcycle']['id'],
                'quantity' => $orderItem['quantity'],
            ]);
        }
        $request->session()->forget('orderData');

        $viewData['message'] = 'Orden guardada con éxito';

        return view('order.save')->with('viewData', $viewData);
    }
}
