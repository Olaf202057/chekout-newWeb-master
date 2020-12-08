<?php

namespace App\Repositories\Users;

interface UsersRepositoryInterface
{

    public function getAuthUsers();

    public function getAuthUserById($id);

    public function createAuthUser($id);

    public function deleteAuthUserById($id);

    public function getFirestoreUsers();

    public function getFirestoreUserByEmail($email);

    public function getFirestoreUserById($id);

    public function getStripeCustomerByUserId($id);

    public function createNewPaymentMethod($fullStripeToken);

    public function getPaymentMethodByOwnerId($ownerId);

    public function getAllPaymentMethodsByOwnerId($ownerId);

    public function deletePaymentMethod($id);

    public function deleteAddress($id);

    public function createFirestoreUser($authId, $email);

    public function updateFirestoreUser($id, $data);

    public function deleteFirestoreUserById($id);

    public function createOrder($userObj, $dataArray, $fees);

    public function getOrderById($id);

    public function getOrdersByUserId($id);

    public function addUserAddress($user, $data);

    public function getUserAddresses($id);

    public function updateOrder($orderRecord, $chargeId, $status);

}
