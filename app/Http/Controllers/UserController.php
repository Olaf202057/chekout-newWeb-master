<?php

namespace App\Http\Controllers;

use App\Repositories\Users\UsersRepositoryInterface;
use App\Repositories\Vendors\VendorsRepositoryInterface;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Kreait\Firebase\Auth\SignIn\FailedToSignIn;

class UserController extends Controller
{
    public function showPastOrders(VendorsRepositoryInterface $repository, UsersRepositoryInterface $usersRepository)
    {
        if (session()->has('firestore_user')) {
            $fs_user = session()->get('firestore_user');
            $orders = $usersRepository->getOrdersByUserId($fs_user->user_id);
            $orderWithVendor = [];

            foreach ($orders as $order) {
                $vendor = $repository->getVendorById($order['vendorID']);
                $order['vendor'] = (array)$vendor;
                try {
                    $order['created_at'] = Carbon::createFromTimestamp($order['createdAt']->get()->getTimestamp());
                } catch (Exception $e) {
                    $order['created_at'] = Carbon::now()->timestamp;
                }
                $order['created_at_time'] = $order['created_at']->format('g:i a');
                array_push($orderWithVendor, $order);
            }
            //return response()->json($orderWithVendor);
            $categories = $repository->getVendorCategories();
            return view('app.user.orders.all', [
                'orders' => $orderWithVendor,
                'categories' => $categories
            ]);
        } else {
            //return redirect('/');
        }
    }

    public function showOrder($id, VendorsRepositoryInterface $repository, UsersRepositoryInterface $usersRepository)
    {
        $order = $usersRepository->getOrderById($id);
        dd($order);
        if ($order->createdAt) {

            $order->created_at = Carbon::createFromTimestamp($order->created_at, 'EST');
            $order->created_at_time = $order->created_at->format('g:i a');
        }
        $vendor = $repository->getVendorById($order->vendorID);
        return view('app.user.orders.detail', [
            'order' => $order,
            'vendor' => $vendor
        ]);
    }

    private function getUserData()
    {
        $firestore = app('firebase.firestore');
        $database = $firestore->database();
        $usersRef = $database->collection('users');
        $snapshot = $usersRef->documents();
        $users = [];
        foreach ($snapshot as $item) {
            array_push($users, $item->data());
        }

        return collect($users);


        $database = app('firebase.database');
        $reference = $database->getReference('/');
        $value = $reference->getValue();
        return $value;
        $users = [];
        foreach ($value as $val) {
            array_push($users, $val);
        }
        return $users;
    }

    public function loginTest()
    {
        $auth = app('firebase.auth');
        $email = 'brandonjbegle@gmail.com';
        $password = 'testing1234';
        try {
            $signInResult = $auth->signInWithEmailAndPassword($email, $password);
            return $signInResult->data();
        } catch (FailedToSignIn $e) {
            return $e;
            return false;
        }
    }

    public function showAccount(UsersRepositoryInterface $usersRepository)
    {
        $fs_user = session()->get('firestore_user');
        // Todo: Create a new collection on each users object
        $addresses = $usersRepository->getUserAddresses($fs_user->user_id);
        $cards = $usersRepository->getAllPaymentMethodsByOwnerId($fs_user->user_id);
        return isset($fs_user->user_id) ? view('app.user.accounts.profile', [
            'fs_user' => $fs_user,
            'addresses' => $addresses,
            'cards' => $cards
        ]) : redirect('login');
    }

    public function addAddress(Request $request, UsersRepositoryInterface $usersRepository)
    {
        $fs_user = session()->get('firestore_user');
        $data = [
            'city' => $request->city,
            'country' => 'United States',
            'line1' => $request->address1,
            'line2' => $request->address2,
            'state' => 'New York',
            'postalCode' => $request->zip,
            'title' => $request->title
        ];
        try {
            $usersRepository->addUserAddress($fs_user, $data);
        } catch (Exception $e) {
            Log::Info($e);
            session()->flash('message', 'There was an error updating your account. Please contact support.');
        }
        return redirect('/user/account');
    }

    public function deleteAddress(Request $request, UsersRepositoryInterface $usersRepository){
        try {
            $usersRepository->deleteAddress($request->id);
        } catch (Exception $e) {
            Log::Info($e);
            session()->flash('message', 'There was an error updating your account. Please contact support.');
        }
        return redirect('/user/account');
    }

    public function deleteCard(Request $request, UsersRepositoryInterface $usersRepository){
        try {
            $usersRepository->deletePaymentMethod($request->id);
        } catch (Exception $e) {
            Log::Info($e);
            session()->flash('message', 'There was an error updating your account. Please contact support.');
        }
        return redirect('/user/account');
    }

    public function storeCard(Request $request, UsersRepositoryInterface $usersRepository){
        $fullStripeToken = json_decode(base64_decode($request->fulltoken), false);
        $fullStripeToken->card->title = $request->title;
        try{
            $usersRepository->createNewPaymentMethod($fullStripeToken);
        }catch (Exception $e) {
            Log::Info($e);
            session()->flash('message', 'There was an error updating your account. Please contact support.');
        }
        return redirect('/user/account');

    }

    public function showWallet()
    {
        return view('app.user.accounts.wallet.index');
    }

    public function editWallet()
    {
        return view('app.user.accounts.wallet.edit');
    }

    public function showFavorite()
    {
        $favorites = ['aa', 'bb', 'cc'];
        return view('app.user.accounts.favorite', compact('favorites'));
    }


}
