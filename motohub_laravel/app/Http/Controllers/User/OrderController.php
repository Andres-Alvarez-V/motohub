<?php

namespace app\Http\Controllers\User;

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
    public function __construct()
    {
        $this->middleware(['auth', 'lang']);
    }

    public function index(Request $request): View
    {
        $orderData = $request->session()->get('orderData');
        $orderItems = $orderData['orderItems'] ?? [];

        $subTotal = 0;
        $orderItemsView = [];
        foreach($orderItems as $orderItem) {
            $motorcycle = Motorcycle::findOrFail($orderItem['motorcycleId']);
            $subTotal += $motorcycle->getPrice() * $orderItem['quantity'];

            $orderItemsView[] = [
                'motorcycle' => $motorcycle,
                'quantity' => $orderItem['quantity'],
            ];
        }

        $viewData['orderItems'] = $orderItemsView;
        $viewData['subTotal'] = $subTotal;
        $viewData['total'] = $subTotal + config('constants.SHIPPING_VALUE');
        $viewData['shippingValue'] = config('constants.SHIPPING_VALUE');

        return view('user.order.index')->with('viewData', $viewData);
    }

    public function add(Request $request): RedirectResponse
    {
        Order::validateAdd($request);

        $motorcycleId = $request->input('motorcycle_id');
        $quantity = $request->input('quantity');

        $orderData = $request->session()->get('orderData');
        $orderItems = $orderData['orderItems'] ?? [];

        $orderItems[] = [
            'motorcycleId' => $motorcycleId,
            'quantity' => $quantity,
        ];
        $orderData['orderItems'] = $orderItems;
        $request->session()->put('orderData', $orderData);

        return to_route('order.index');
    }

    public function delete(int $id, Request $request): RedirectResponse
    {
        $orderData = $request->session()->get('orderData');

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
        Order::validateSave($request);

        $orderData = $request->session()->get('orderData');
        $orderItems = $orderData['orderItems'] ?? [];

        $userId = auth()->user()->id;
        $user = User::findOrFail($userId);
        $userBalance = $user->getBalance();

        $subTotal = 0;
        foreach($orderItems as $orderItem) {
            $motorcycle = Motorcycle::findOrFail($orderItem['motorcycleId']);
            $motorcycle->update([
                'stock' => $motorcycle->getStock() - $orderItem['quantity'],
            ]);
            $subTotal += $motorcycle->getPrice() * $orderItem['quantity'];
        }
        $total = $subTotal + config('constants.SHIPPING_VALUE');

        if ($userBalance < $total) {
            return back()->withErrors(['message' => trans('messages.orderInsufficientFunds')]);
        }

        $user->update([
            'balance' => $userBalance - $total,
        ]);

        $order = Order::create([
            'user_id' => $userId,
            'payment' => 'approved',
            'shipping_address' => $request->input('shipping_address') ?? $user->getAddress(),
            'shipping_value' => config('constants.SHIPPING_VALUE'),
            'sub_total' => $subTotal,
            'total' => $total,
            'active' => false,
        ]);

        foreach ($orderItems as $orderItem) {
            OrderItem::create([
                'order_id' => $order->getId(),
                'motorcycle_id' => $orderItem['motorcycleId'],
                'quantity' => $orderItem['quantity'],
            ]);
        }
        $request->session()->forget('orderData');

        return view('user.order.save');
    }
}
