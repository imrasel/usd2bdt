<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Category;

Route::get('/email', 'EmailController@index');
Route::post('/email/send', 'EmailController@send_email')->name('send_email');

Route::get('/changePassword','UsersController@showChangePasswordForm');
 
Route::post('/changePassword','UsersController@changePassword')->name('changePassword');


Route::get('/testimonials' ,function(){
    
    return view('testimonials')->with('scroll', Category::find(1));
});
Route::get('/contact' ,function(){
    
    return view('contact')->with('scroll', Category::find(1));
});
Route::get('/terms' ,function(){
    
    return view('terms')->with('scroll', Category::find(1));
});


Route::get('/', [
    'uses' => 'IndexController@index',
    'as' => 'index'
]);

Route::get('/users', [
    'uses' => 'UsersController@user_index',
    'as' => 'users'
])->middleware('user');



Auth::routes();



Route::group(['prefix' =>'user', 'middleware' => 'user'], function() {

    Route::get('/{id}', [
        'uses' => 'UsersController@user_index',
        'as'   => 'user.profile'
    ]);
    Route::get('/exchanges/{id}', [
        'uses' => 'UsersController@user_exchange',
        'as'   => 'user.exchange'
    ]);
    Route::post('/recieve-info', [
        'uses' => 'IndexController@rcvinfo',
        'as'   => 'rcvinfo'
    ]);
    Route::post('/exchange', [
        'uses' => 'IndexController@exchange',
        'as'   => 'exchange'
    ]);
    Route::post('/transaction/store', [
        'uses' => 'TransactionsController@store',
        'as'   => 'transaction.store'
    ]);
    Route::post('/transaction/confirm', [
        'uses' => 'TransactionsController@confirm',
        'as'   => 'confirm.transaction'
    ]);

    
    Route::get('/user/thanks', [
        'uses' => 'TransactionsController@thanks',
        'as'   => 'thanks'
    ]);

    Route::get('/exchange/update/{id}',[
        'uses' => 'TransactionsController@exchange_update',
        'name' => 'exchange_update'
    ]);

    Route::post('/exchange/update/{id}', [
        'uses' => 'TransactionsController@exchange_update_store',
        'as'   => 'exchange_update_store'
    ]);

});



Route::group(['prefix' =>'admin', 'middleware' => 'admin'], function() {

    Route::get('/home', [
        'uses' => 'HomeController@index',
        'as'   => 'home'
    ]);
    

    Route::get('/posts/create', [
        'uses' => 'PostsController@create',
        'as'   => 'post.create'
    ]);

    Route::post('/post/store', [
        'uses' =>'PostsController@store',
        'as'   => 'post.store'
    ]);
    Route::get('/posts', [
        'uses' => 'PostsController@index',
        'as' =>'posts'
    ]);


    Route::get('/post/delete/{id}', [

        'uses' => 'PostsController@destroy',
        'as' => 'post.delete'

    ]);


    Route::get('/posts/trashed', [
        'uses' => 'PostsController@trashed',
        'as' =>'posts.trashed'
    ]);

    Route::get('/posts/kill/{id}', [
        'uses' => 'PostsController@kill',
        'as' =>'posts.kill'
    ]);

    Route::get('/posts/restore/{id}', [
        'uses' => 'PostsController@restore',
        'as' =>'posts.restore'
    ]);

    Route::get('/posts/edit/{id}', [
        'uses' => 'PostsController@edit',
        'as' =>'post.edit'
    ]);


    Route::post('/posts/update/{id}', [

        'uses' => 'PostsController@update',
        'as' =>'post.update'
    ]);


    Route::get('/categories', [
        'uses' =>'CategoriesController@index',
        'as' => 'categories'
    ]);

    Route::get('/category/create', [
        'uses' =>'CategoriesController@create',
        'as' => 'category.create'
    ]);

    Route::post('/category/store', [
        'uses' => 'CategoriesController@store',
        'as' => 'category.store'
    ]);

    Route::get('/category/edit/{id}', [
        'uses' => 'CategoriesController@edit',
        'as' => 'category.edit'
    ]);

    Route::get('/category/delete/{id}', [
       'uses' => 'CategoriesCOntroller@destroy',
       'as' => 'category.delete'
    ]);

    Route::post('category/update/{id}', [
        'uses' => 'CategoriesController@update',
        'as' => 'category.update'
    ]);

    Route::get('/tags', [
        'uses' =>'CategoriesController@index',
        'as' => 'categories'
    ]);

    Route::get('/tags', [
        'uses' => 'TagsController@index',
        'as' => 'tags'
    ]);
    Route::get('/tags/create', [
        'uses' => 'TagsController@create',
        'as' => 'tag.create'
    ]);
    Route::post('/tags/store', [
        'uses' => 'TagsController@store',
        'as' => 'tag.store'
    ]);

    Route::get('tags/edit/{id}', [
        'uses' => 'TagsController@edit',
        'as' => 'tag.edit'
    ]);
    Route::post('tags/update/{id}', [
        'uses' => 'TagsController@update',
        'as' => 'tag.update'
    ]);
    Route::get('tags/delete/{id}', [
        'uses' => 'TagsController@destroy',
        'as' => 'tag.delete'
    ]);

    Route::get('/SendWallets', [
        'uses' => 'SendWalletController@index',
        'as' => 'send_wallets'
    ]);

    Route::get('/SendWallet/create', [
        'uses' => 'SendWalletController@create',
        'as' => 'send_wallet.create'
    ]);
    Route::get('/SendWallet/edit/{id}', [
        'uses' => 'SendWalletController@edit',
        'as' => 'send_wallet.edit'
    ]);
    Route::post('/sendWallet/store', [
        'uses' => 'SendWalletController@store',
        'as' => 'send_wallet.store'
    ]);
    Route::post('/sendWallet/update/{id}', [
        'uses' => 'SendWalletController@update',
        'as' => 'send_wallet.update'
    ]);
    Route::get('/SendWallet/delete/{id}', [
        'uses' => 'SendWalletController@destroy',
        'as' => 'send_wallet.delete'
    ]);

    Route::get('/ReceiveWallets', [
        'uses' => 'ReceiveWalletController@index',
        'as' => 'receive_wallets'
    ]);
    Route::get('/ReceiveWallet/create', [
        'uses' => 'ReceiveWalletController@create',
        'as' => 'receive_wallet.create'
    ]);
    Route::post('/ReceiveWallet/store', [
        'uses' => 'ReceiveWalletController@store',
        'as' => 'receive_wallet.store'
    ]);
    Route::get('/ReceiveWallet/edit/{id}', [
        'uses' => 'ReceiveWalletController@edit',
        'as' => 'receive_wallet.edit'
    ]);
    Route::post('/ReceiveWallet/update/{id}', [
        'uses' => 'ReceiveWalletController@update',
        'as' => 'receive_wallet.update'
    ]);
    Route::get('/ReceiveWallet/delete/{id}', [
        'uses' => 'ReceiveWalletController@destroy',
        'as' => 'receive_wallet.delete'
    ]);

    Route::get('/rates', [
        'uses' => 'RatesController@index',
        'as' => 'rates'
    ]);
    Route::get('/rate/create', [
        'uses' => 'RatesController@create',
        'as' => 'rate.create'
    ]);
    Route::post('/rate/store', [
        'uses' => 'RatesController@store',
        'as' => 'rate.store'
    ]);
    Route::get('/rate/edit/{id}', [
        'uses' => 'RatesController@edit',
        'as' => 'rate.edit'
    ]);
    Route::post('/rate/update/{id}', [
        'uses' => 'RatesController@update',
        'as' => 'rate.update'
    ]);
    Route::get('/rate/delete/{id}', [
        'uses' => 'RatesController@destroy',
        'as' => 'rate.delete'
    ]);


    Route::get('/reserve/create', [
        'uses' => 'ReserveController@create',
        'as' => 'reserve.create'
    ]);

    Route::get('/reserves', [
        'uses' => 'ReserveController@index',
        'as' => 'reserves'
    ]);
    Route::post('/reserve/store', [
        'uses' => 'ReserveController@store',
        'as' => 'reserve.store'
    ]);
    Route::get('/reserve/edit/{id}', [
        'uses' => 'ReserveController@edit',
        'as' => 'reserve.edit'
    ]);
    Route::post('/reserve/update/{id}', [
        'uses' => 'ReserveController@update',
        'as' => 'reserve.update'
    ]);
    Route::get('/reserve/delete/{id}', [
        'uses' => 'ReserveController@destroy',
        'as' => 'reserve.delete'
    ]);
    Route::get('/scrolltext', [
        'uses' => 'CategoriesController@scroll_text',
        'as' => 'scroll'
    ]);
    Route::post('/scrolltext/update', [
        'uses' => 'CategoriesController@scroll_text_update',
        'as' => 'scroll.update'
    ]);

    Route::get('/users', [
        'uses' => 'UsersController@index',
        'as' => 'users'
    ])->middleware('admin');

    Route::get('/admins', [
        'uses' => 'UsersController@admin',
        'as' => 'admins'
    ])->middleware('admin');

    Route::get('/user/create', [
        'uses' => 'UsersController@create',
        'as' => 'user.create'
    ]);
    Route::post('/user/store', [
        'uses' => 'UsersController@store',
        'as' => 'user.store'
    ]);
    Route::get('/transactions', [
        'uses' => 'TransactionsController@index',
        'as' => 'transactions'
    ]);
    Route::get('/transactions/edit/{id}', [
        'uses' => 'TransactionsController@edit',
        'as' => 'transaction.status'
    ]);
    Route::post('/transactions/update/{id}', [
        'uses' => 'TransactionsController@update',
        'as' => 'transaction.update'
    ]);
    Route::get('/transactions/delete/{id}', [
        'uses' => 'TransactionsController@destroy',
        'as' => 'transaction.delete'
    ]);
    Route::get('/permission/edit/{id}', [
        'uses' => 'UsersController@permission_edit',
        'as' => 'permission.edit'
    ]);
    Route::post('/permission/update/{id}', [
        'uses' => 'UsersController@permission_update',
        'as' => 'permission.update'
    ]);

    Route::get('/transactionrate', [
        'uses' => 'TrRatesController@index',
        'as' => 'trrate.index'
    ]);

    Route::get('/transactionrate/create', [
        'uses' => 'TrRatesController@create',
        'as' => 'trrate.create'
    ]);

    Route::post('/transactionrate/store', [
        'uses' => 'TrRatesController@store',
        'as' => 'trrate.store'
    ]);

    Route::get('/transactionrate/edit/{id}', [
        'uses' => 'TrRatesController@edit',
        'as' => 'trrate.edit'
    ]);

    Route::post('/transactionrate/update/{id}', [
        'uses' => 'TrRatesController@update',
        'as' => 'trrate.update'
    ]);
    Route::get('/transactionrate/delete/{id}', [
        'uses' => 'TrRatesController@destroy',
        'as' => 'trrate.delete'
    ]);


});


