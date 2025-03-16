<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLoginController;




Route::get('/', function () {
    return view('home.homepage');
});


// Login routes (only accessible to guests)
Route::middleware('guest')->group(function () {
    Route::get('/login', [App\Http\Controllers\Auth\AuthController::class, 'showLoginForm'])->name('login.page');
    Route::post('/login', [App\Http\Controllers\Auth\AuthController::class, 'login'])->name('login');
});

// Registration routes (only accessible to guests)
Route::middleware('guest')->group(function () {
    Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register.submit');
});

// Referral signup route (only accessible to guests)
Route::middleware('guest')->group(function () {
    Route::get('/signup/{referral_code}', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('referral.signup');
});





// Forgot Password routes
Route::get('/forgot-password', [App\Http\Controllers\Auth\AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [App\Http\Controllers\Auth\AuthController::class, 'sendResetLinkEmail'])->name('password.email');

// Password Reset routes
Route::get('/reset-password/{token}', [App\Http\Controllers\Auth\AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [App\Http\Controllers\Auth\AuthController::class, 'reset'])->name('password.update');
Route::post('/logout', [App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('logout');

// Email & User Verification
Route::get('user/v', [App\Http\Controllers\Auth\EmailVerificationController::class, 'emailVerify'])->name('email_verify');
Route::get('user/ver', [App\Http\Controllers\Auth\EmailVerificationController::class, 'userVerify'])->name('user_verify');
Route::get('/verify/{id}', [App\Http\Controllers\Auth\EmailVerificationController::class, 'verify'])->name('verify');
Route::post('/verify-code', [App\Http\Controllers\Auth\EmailVerificationController::class, 'verifyCode'])->name('verify.code');
Route::get('/resend-verification-code', [App\Http\Controllers\Auth\EmailVerificationController::class, 'resendVerificationCode'])->name('resend.verification.code');
Route::post('/skip-code', [App\Http\Controllers\Auth\EmailVerificationController::class, 'skipCode'])->name('skip.code');


Route::prefix('user')->middleware('user')->group(function () {
    Route::get('/home', [App\Http\Controllers\User\UserController::class, 'index'])->name('home');
    Route::prefix('accounts')->name('account.')->group(function () {
        Route::get('/', [App\Http\Controllers\User\ProfileController::class, 'index'])->name('index');
        Route::get('/transfer', [App\Http\Controllers\User\ProfileController::class, 'transfer'])->name('transfer');
        Route::post('/transfer-to-holding', [App\Http\Controllers\User\ProfileController::class, 'transferToHolding'])->name('transfer.to.holding');
        Route::post('/transfer-to-trading', [App\Http\Controllers\User\ProfileController::class, 'transferToTrading'])->name('transfer.to.trading');
        Route::get('/email', [App\Http\Controllers\User\ProfileController::class, 'email'])->name('email');
        Route::post('/email', [App\Http\Controllers\User\ProfileController::class, 'updateEmail'])->name('update.email');
        Route::get('/referrals', [App\Http\Controllers\User\ProfileController::class, 'referrals'])->name('referrals');
        Route::get('/password', [App\Http\Controllers\User\ProfileController::class, 'password'])->name('password');
        Route::post('/password', [App\Http\Controllers\User\ProfileController::class, 'updatePassword'])->name('update.password');
        Route::get('/notifications', [App\Http\Controllers\User\ProfileController::class, 'notifications'])->name('notification');
        Route::get('/address', [App\Http\Controllers\User\ProfileController::class, 'address'])->name('address');
        Route::post('/address', [App\Http\Controllers\User\ProfileController::class, 'updateContactInfo'])->name('update.contact');
        Route::get('/photo', [App\Http\Controllers\User\ProfileController::class, 'photo'])->name('photo');
        Route::post('/photo', [App\Http\Controllers\User\ProfileController::class, 'updatePhoto'])->name('upload.photo');
    });

    Route::prefix('verifications')->name('verifications.')->group(function () {
        Route::get('/', [App\Http\Controllers\User\VerificationController::class, 'index'])->name('index');
    });

    Route::get('/plans', [App\Http\Controllers\User\PlanController::class, 'index'])->name('plans');
    Route::post('/fund-trading', [App\Http\Controllers\User\PlanController::class, 'fundTrading'])->name('fund.trading');
    Route::get('/holding', [App\Http\Controllers\User\UserController::class, 'holding'])->name('holding');
    Route::get('/trading', [App\Http\Controllers\User\UserController::class, 'trading'])->name('trading');
    Route::get('/staking', [App\Http\Controllers\User\UserController::class, 'staking'])->name('staking');
    Route::get('/copy-trade', [App\Http\Controllers\User\CopyTradeController::class, 'index'])->name('copy.trade');
    Route::get('/withdrawal', [App\Http\Controllers\User\WithdrawalController::class, 'index'])->name('withdrawal');
    Route::get('/crypto-withdrawal', [App\Http\Controllers\User\WithdrawalController::class, 'cryptoWithdrawal'])->name('crypto.withdrawal');
    Route::post('/submit', [App\Http\Controllers\User\WithdrawalController::class, 'submit'])->name('withdraw.submit');
    Route::get('/deposit', [App\Http\Controllers\User\DepositController::class, 'index'])->name('deposit.page');
    Route::get('fund/step-one', [App\Http\Controllers\User\DepositController::class, 'stepOne'])->name('deposit.one');
    Route::post('fund/step-one', [App\Http\Controllers\User\DepositController::class, 'stepOneSubmit'])->name('deposit.one.submit');
    Route::get('fund/step-two', [App\Http\Controllers\User\DepositController::class, 'stepTwo'])->name('deposit.two');
    Route::post('fund/step-two', [App\Http\Controllers\User\DepositController::class, 'stepTwoSubmit'])->name('deposit.two.submit');
    Route::get('fund/step-three', [App\Http\Controllers\User\DepositController::class, 'stepThree'])->name('deposit.three');
    Route::post('fund/step-three', [App\Http\Controllers\User\DepositController::class, 'stepThreeSubmit'])->name('deposit.three.submit');
    Route::get('fund/pay-crypto', [App\Http\Controllers\User\DepositController::class, 'payCrypto'])->name('pay.crypto');
});

Route::get('admin/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'adminLoginForm'])->name('admin.login');
Route::post('admin/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'login'])->name('login.submit');



// Admin Routes
Route::prefix('admin')->group(function () {
    Route::post('logout', [App\Http\Controllers\Auth\AdminLoginController::class, 'logout'])->name('logout');

    // Protecting admin routes using the 'admin' middleware
    Route::middleware(['admin'])->group(function () { // Admin Profile Routes

        Route::get('/profile', [App\Http\Controllers\Admin\AdminController::class, 'editProfile'])->name('admin.profile');
        Route::post('/profile/update', [App\Http\Controllers\Admin\AdminController::class, 'updateProfile'])->name('admin.profile.update');
        Route::post('/profile/password', [App\Http\Controllers\Admin\AdminController::class, 'updatePassword'])->name('admin.profile.password.update');
        Route::put('/admin/user/{id}', [App\Http\Controllers\Admin\AdminController::class, 'updateUser'])->name('admin.updateUser');

        Route::get('/change/user/password/page/{id}', [App\Http\Controllers\Admin\AdminController::class, 'showResetPasswordForm'])->name('admin.change.user.password.page');
        Route::post('/user-password-reset', [App\Http\Controllers\Admin\AdminController::class, 'resetPassword'])->name('admin.user.password_reset');


        Route::get('/home', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.home');
        Route::get('/manage-users', [App\Http\Controllers\Admin\AdminController::class, 'manageUsersPage'])->name('manage.users.page');
        Route::get('getusers', [App\Http\Controllers\Admin\AdminController::class, 'getUsers'])->name('admin.getusers');
        Route::get('/manage-deposit', [App\Http\Controllers\Admin\AdminController::class, 'manageDepositsPage'])->name('manage.deposits.page');
        Route::get('/manage-withdrawals', [App\Http\Controllers\Admin\AdminController::class, 'manageWithdrawalsPage'])->name('manage.withdrawals.page');
        Route::get('/view-deposit/{id}/', [App\Http\Controllers\Admin\AdminController::class, 'viewDeposit']);
        Route::get('process-deposit/{id}', [App\Http\Controllers\Admin\AdminController::class, 'processDeposit'])->name('admin.process-deposit');
        Route::get('delete-deposit/{id}', [App\Http\Controllers\Admin\AdminController::class, 'deleteDeposit'])->name('admin.delete-deposit');
        Route::get('/view-withdrawal/{user_id}/{withdrawal_id}', [App\Http\Controllers\Admin\AdminController::class, 'viewWithdrawal']);
        Route::get('/manage-kyc', [App\Http\Controllers\Admin\AdminController::class, 'manageKycPage'])->name('manage.kyc.page');
        Route::get('/accept-kyc/{id}/', [App\Http\Controllers\Admin\AdminController::class, 'acceptKyc']);
        Route::get('/reject-kyc/{id}/', [App\Http\Controllers\Admin\AdminController::class, 'rejectKyc']);
        Route::get('/reset-password/{user}', [App\Http\Controllers\Admin\AdminController::class, 'resetUserPassword'])->name('reset.password');
        Route::get('/clear-account/{id}', [App\Http\Controllers\Admin\AdminController::class, 'clearAccount'])->name('clear.account');

        Route::get('/{user}/impersonate',  [App\Http\Controllers\Admin\AdminController::class, 'impersonate'])->name('users.impersonate');
        Route::get('/leave-impersonate',  [App\Http\Controllers\Admin\AdminController::class, 'leaveImpersonate'])->name('users.leave-impersonate');

        Route::post('/edit-user/{user}', [App\Http\Controllers\Admin\AdminController::class, 'editUser'])->name('edit.user');
        Route::post('/add-new-user',  [App\Http\Controllers\Admin\AdminController::class, 'newUser'])->name('add.user');
        Route::get('/delete-user/{user}',  [App\Http\Controllers\Admin\AdminController::class, 'deleteUser'])->name('delete.user');
        Route::match(['get', 'post'], '/send-mail', [App\Http\Controllers\Admin\AdminController::class, 'sendMail'])->name('admin.send.mail');
        // Route for viewing user details
        Route::get('/user/{id}', [App\Http\Controllers\Admin\AdminController::class, 'viewUser'])->name('admin.user.view');
        Route::post('/transfer/suspend/{id}', [App\Http\Controllers\Admin\AdminController::class, 'suspendTransfer'])->name('transfer.suspend');
        Route::post('/transfer/unblock/{id}', [App\Http\Controllers\Admin\AdminController::class, 'unblockTransfer'])->name('transfer.unblock');
        Route::post('/account/suspend/{id}', [App\Http\Controllers\Admin\AdminController::class, 'suspendAccount'])->name('account.suspend');
        Route::post('/account/unblock/{id}', [App\Http\Controllers\Admin\AdminController::class, 'unblockAccount'])->name('account.unblock');

        // Define the route for opening an account
        Route::get('/user/open', [App\Http\Controllers\Admin\AdminController::class, 'openAccount'])->name('admin.user.open');



        // Route for viewing user details
        Route::get('/credit-user/{id}', [App\Http\Controllers\Admin\AdminController::class, 'creditUserPage'])->name('admin.credit.user.page');

        Route::post('credit-debit', [App\Http\Controllers\Admin\AdminController::class, 'creditDebit'])->name('credit-debit');


        // Route::post('/credit-user', [AdminController::class, 'creditUser'])->name('credit_user');


        // Route for updating user details
        Route::post('/user/update/{id}', [App\Http\Controllers\Admin\AdminController::class, 'updateUserDetail'])->name('update_user_detail');

        // Route for updating bank details
        Route::post('/user/update/bank/{id}', [App\Http\Controllers\Admin\AdminController::class, 'updateBankDetail'])->name('update_bank_detail');

        // Route for fund user
        Route::get('/user/fund/{accountnumber}/{id}', [App\Http\Controllers\Admin\AdminController::class, 'fundUser'])->name('fund_user');

        // Route for user transaction history
        Route::get('/user/transaction/{id}', [App\Http\Controllers\Admin\AdminController::class, 'userTransaction'])->name('user_transaction');

        // Route for user transfer tracking
        Route::get('/user/transfer/tracking/{id}', [App\Http\Controllers\Admin\AdminController::class, 'userTransferTracking'])->name('user_transfer_tracking');

        // Route for debit user
        Route::get('/user/debit/{accountnumber}/{id}', [App\Http\Controllers\Admin\AdminController::class, 'debitUser'])->name('debit_user');

        // Route for changing user photo
        Route::get('/user/photo/{id}', [App\Http\Controllers\Admin\AdminController::class, 'updatePhoto'])->name('update_photo');

        // Route for user activity
        Route::get('/user/activity/{id}', [App\Http\Controllers\Admin\AdminController::class, 'userActivity'])->name('user_activity');

        // Route for user password reset
        Route::get('/user/password/reset/{userid}', [App\Http\Controllers\Admin\AdminController::class, 'userPasswordReset'])->name('user_password_reset');


        // Route for changing email user
        Route::get('/send/email', [App\Http\Controllers\Admin\AdminController::class, 'sendEmailPage'])->name('send.email');
        Route::post('/send/email', [App\Http\Controllers\Admin\AdminController::class, 'sendEmail'])->name('send.mail');

        // logo favicon settings
        Route::get('/branding', [App\Http\Controllers\Admin\BrandingController::class, 'index'])->name('branding.index');
        Route::post('/branding/update', [App\Http\Controllers\Admin\BrandingController::class, 'update'])->name('branding.update');

        Route::get('/smtp-settings', [App\Http\Controllers\Admin\SmtpSettingController::class, 'index'])->name('smtp.settings');
        Route::post('/smtp-settings', [App\Http\Controllers\Admin\SmtpSettingController::class, 'update'])->name('smtp.update');

        // Wallet resource routes
        Route::resource('wallets', App\Http\Controllers\Admin\WalletController::class);
        // Deposit resource routes
        Route::resource('deposits', App\Http\Controllers\Admin\DepositController::class);
        Route::patch('deposits/{deposit}/approve', [App\Http\Controllers\Admin\DepositController::class, 'approve'])->name('deposits.approve');

        // Withdrawal resource routes
        Route::resource('withdrawals', App\Http\Controllers\Admin\WithdrawalController::class);
        Route::patch('withdrawals/{withdrawal}/approve', [App\Http\Controllers\Admin\WithdrawalController::class, 'approve'])->name('withdrawals.approve');

        //kyc resource routes
        Route::resource('kyc', App\Http\Controllers\Admin\KycController::class);
        Route::get('kyc/{id}/approve', [App\Http\Controllers\Admin\KycController::class, 'approve'])->name('kyc.approve');

        //trade resource routes
        // Resource routes for Stock
        Route::resource('stock', App\Http\Controllers\Admin\StockController::class);
        Route::resource('traders', App\Http\Controllers\Admin\TraderController::class);
        Route::resource('payment', App\Http\Controllers\Admin\PaymentSettingController::class);

        // Route::get('admin/stock/{stock}/edit', [StockController::class, 'edit'])->name('stock.edit');

        // Route::get('/stock/{stock}/edit', [StockController::class, 'edit'])->name('stock.edit'); // Edit route
        // Route::delete('/stock/{stock}', [StockController::class, 'destroy'])->name('stock.destroy'); // Destroy route

        Route::get('/stock-history', [App\Http\Controllers\Admin\AdminController::class, 'viewStockHistory'])->name('admin.stock.history');

        Route::get('/trade-histories', [App\Http\Controllers\Admin\AdminController::class, 'viewTradeHistory'])->name('admin.trade_histories');

        Route::get('/trading-plans/create', [App\Http\Controllers\Admin\TradingPlanController::class, 'create'])->name('admin.create-trading-plan');
        Route::post('/trading-plans/store', [App\Http\Controllers\Admin\TradingPlanController::class, 'store'])->name('admin.store-trading-plan');
        Route::get('/trading-plans', [App\Http\Controllers\Admin\TradingPlanController::class, 'index'])->name('admin.view-trading-plans');
        Route::get('/trading-plans/edit/{id}', [App\Http\Controllers\Admin\TradingPlanController::class, 'edit'])->name('admin.edit-trading-plan');
        Route::post('/trading-plans/update/{id}', [App\Http\Controllers\Admin\TradingPlanController::class, 'update'])->name('admin.update-trading-plan');
        Route::delete('/trading-plans/delete/{id}', [App\Http\Controllers\Admin\TradingPlanController::class, 'destroy'])->name('admin.delete-trading-plan');
        Route::post('/add-signal-strength', [App\Http\Controllers\Admin\AdminController::class, 'addSignalStrength'])->name('admin.add_signal_strength');
        Route::get('/user/{id}/trades', [App\Http\Controllers\Admin\TradeController::class, 'index'])->name('admin.user.trades');
        Route::post('/trades', [App\Http\Controllers\Admin\TradeController::class, 'store'])->name('admin.trades.store');
        Route::put('/trades/{trade}', [App\Http\Controllers\Admin\TradeController::class, 'update'])->name('admin.trades.update');
        Route::delete('/trades/{trade}', [App\Http\Controllers\Admin\TradeController::class, 'destroy'])->name('admin.trades.destroy');
    });
});
