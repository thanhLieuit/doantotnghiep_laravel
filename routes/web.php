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

Route::get('/', function () {
    return view('welcome');
});
Route::get('index','IndexController@getindex')->name('/index');

Route::get('search','IndexController@getsearch')->name('/search');


Route::get('gioithieu','IndexController@getgt')->name('/gioithieu');

Route::get('lienhe','IndexController@getlh')->name('/lienhe');
Route::post('lienhe','IndexController@postlh')->name('/lienhe');
/*sản phẩm*/
Route::get('product-type/{id}','IndexController@getproducttype')->name('/product-type');

Route::get('product-type-all/{id}','IndexController@getproducttypeall')->name('/product-type-all');

Route::get('product-detail/{id}','IndexController@getproductdetail')->name('/product-detail');
/*Giỏ hàng */
Route::post('comment/{id}','IndexController@postcomment')->name('/comment');

Route::get('cart','CartController@getcart')->name('/cart');
Route::post('cart','CartController@postcart')->name('/cart');

Route::get('addcart/{id}','CartController@getaddcart')->name('/addcart');

Route::get('/delcart/{id}',[
'as' => 'delete',
'uses' => 'CartController@getdelcart']);

Route::post('search/name', 'CartController@getSearchAjax')->name('search');

Auth::routes();


Route::middleware(['auth'])->group(function() {

	Route::prefix('admin')->group(function () {
		Route::get('quanly', 'HomeController@index')->name('admin/quanly');

		Route::post('logout','HomeController@postLogout');

		Route::get('/banner',[
			'as' =>'admin/banner',
			'uses' =>'IndexController@getbanner',
			'middleware' =>'Checkacl:banner-add'
		]);
	

		Route::post('/banner',[
			'as' =>'admin/banner',
			'uses' =>'IndexController@postbanner',
			'middleware' =>'Checkacl:banner-add'
		]);
		Route::get('/banner-delete/{id}', 'IndexController@getbannerdelete')->name('admin/banner-delete');

		Route::get('/product-menu',[
			'as' =>'admin/product-menu',
			'uses' =>'AdminController@getproductmenu',
			'middleware' =>'Checkacl:menu-add'
		]);

		Route::post('/product-menu',[
			'as' =>'admin/product-menu',
			'uses' =>'AdminController@postproductmenu',
			'middleware' =>'Checkacl:menu-add'
		]);

		Route::get('/product-type',[
			'as' =>'admin/product-type',
			'uses' =>'AdminController@getproducttype',
			'middleware' =>'Checkacl:loaiproduct_add'
		]);

		Route::post('/product-type',[
			'as' =>'admin/product-type',
			'uses' =>'AdminController@postproducttype',
			'middleware' =>'Checkacl:loaiproduct_add'
		]);

		Route::get('/product',[
			'as' =>'admin/product',
			'uses' =>'AdminController@getproduct',
			'middleware' =>'Checkacl:product_add'
		]);
		Route::post('/product',[
			'as' =>'admin/product',
			'uses' =>'AdminController@postproduct',
			'middleware' =>'Checkacl:product_add'
		]);

		Route::get('/product-table',[
			'as' =>'admin/product-table',
			'uses' =>'AdminController@getproducttable',
			'middleware' =>'Checkacl:product_list'
		]);

		Route::get('/product-edit/{id}',[
			'as' =>'admin/product-edit',
			'uses' =>'AdminController@getproductedit',
			'middleware' =>'Checkacl:product_edit'
		]);
		Route::post('/product-edit/{id}',[
			'as' =>'admin/product-edit',
			'uses' =>'AdminController@postproductedit',
			'middleware' =>'Checkacl:product_edit'
		]);
		Route::get('/product-edit-image/{id}','AdminController@getproducteditimage')->name('admin/product-edit-image');
		Route::post('/product-edit-image/{id}','AdminController@postproducteditimage')->name('admin/product-edit-image');

		Route::get('/product-delete/{id}',[
			'as' =>'admin/product-delete',
			'uses' =>'AdminController@getdeleteproduct',
			'middleware' =>'Checkacl:product_delete'
		]);
		Route::get('/order',[
			'as' =>'admin/order',
			'uses' =>'AdminController@getorder',
			'middleware' =>'Checkacl:hoa-don'
		]);
		Route::get('/order-detail/{id}',[
			'as' =>'admin/order-detail',
			'uses' =>'AdminController@getorderdetail'
			
		]);
		Route::get('/order-detail-update/{id}',[
			'as' =>'admin/order-detail-update',
			'uses' =>'AdminController@getorderdetailupdate'
		]);
		Route::get('/comment',[
			'as' =>'admin/comment',
			'uses' =>'AdminController@getcomment',
			'middleware' =>'Checkacl:comment'
		]);
		Route::get('/comment-delete/{id}',[
			'as' =>'admin/comment-delete',
			'uses' =>'AdminController@getcommentdelete'
		]);
		Route::get('/giao-hang',[
			'as' =>'admin/giaohang',
			'uses' =>'AdminController@getgiaohang',
			'middleware' =>'Checkacl:giao-hang'
		]);
		Route::get('/giao-hang-delete/{id}',[
			'as' =>'admin/giaohang-delete',
			'uses' =>'AdminController@getgiaohangdelete'
		]);
		Route::get('/cap-nhat/{id}',[
	        'as' => 'admin/capnhat',
	        'uses' => 'AdminController@getcapnhat'
	    ]);
	    Route::post('/cap-nhat/{id}',[
	        'as' => 'admin/capnhat',
	        'uses' => 'AdminController@postcapnhat'
	    ]);


	    Route::get('/cap-nhat-edit/{id}',[
			'as' =>'admin/cap-nhat-edit',
			'uses' =>'AdminController@getcapnhatedit'
		]);
		Route::post('/cap-nhat-edit/{id}',[
			'as' =>'admin/cap-nhat-edit',
			'uses' =>'AdminController@postcapnhatedit'
		]);


	    Route::get('/giao-hang-update/{id}',[
			'as' =>'admin/giao-hang-update',
			'uses' =>'AdminController@getgiaohangupdate'
		]);

		Route::get('/product-table-search',[
			'as' =>'admin/product-table-search',
			'uses' =>'AdminController@getproducttablesearch'
		]);

		Route::get('/kho',[
			'as' =>'admin/kho',
			'uses' =>'AdminController@getkho',
			'middleware' =>'Checkacl:kho'
		]);

		
		Route::get('/hoadon/{id}',[
			'as'=> 'admin/hoadon',
			'uses'=>'AdminController@gethoadon'
		]);
		Route::get('/themncc',[
			'as' =>'admin/themncc',
			'uses' =>'AdminController@getncc',
			'middleware' =>'Checkacl:ncc'
		]);
		Route::post('/themncc',[
			'as' =>'admin/themncc',
			'uses' =>'AdminController@postncc',
			'middleware' =>'Checkacl:ncc'
		]);
	});
	Route::prefix('admin')->group(function () {
		Route::get('/adduser',[
			'as' =>'admin/adduser',
			'uses' =>'UserAdminController@getadduser',
	        'middleware' =>'Checkacl:user-add'
		]);
		Route::post('/adduser',[
			'as' =>'admin/adduser',
			'uses' =>'UserAdminController@postadduser',
	        'middleware' =>'Checkacl:user-add'
		]);
		Route::get('/listinfo',[
	        'as' => 'admin/listinfo',
	        'uses' => 'UserAdminController@getListInfo',
	        'middleware' =>'Checkacl:user-list'
	    ]);
	    // cập nhật thông tin user
	    Route::get('/editinfo/{id}',[
	        'as' => 'admin/editinfo',
	        'uses' => 'UserAdminController@geteditinfo',
	        'middleware' =>'Checkacl:user-edit'
	    ]);
	    Route::post('/editinfo/{id}',[
	        'as' => 'admin/editinfo',
	        'uses' => 'UserAdminController@posteditinfo',
	        'middleware' =>'Checkacl:user-edit' 
	    ]);
	    Route::get('/deleteinfo/{id}',[
	        'as' => 'admin/deleteinfo',
	        'uses' => 'UserAdminController@getdeleteinfo',
	        'middleware' =>'Checkacl:user-delete'
	    ]);

	    Route::get('/thong-ke',[
	        'as' => 'admin/thongke',
	        'uses' => 'UserAdminController@getthongke'
	    ]);

	    Route::get('/lien-he',[
	    	'as' =>'admin/lien-he',
	    	'uses' =>'UserAdminController@getlienhe'
	    ]);
	   	
	   	Route::get('/lien-he-update/{id}',[
	   		'as'=>'admin/lien-he-update',
	   		'uses'=>'UserAdminController@getlienheupdate'
	   	]);

	});
	Route::prefix('admin/role')->group(function () {
		Route::get('/listrole',[
	        'as' => 'admin/role/listrole',
	        'uses' => 'RoleController@getListInfo',
	        'middleware' =>'Checkacl:role-list'
	    ]);
	    Route::get('/addrole',[
	        'as' => 'admin/role/addrole',
	        'uses' => 'RoleController@getaddinfo',
	        'middleware' =>'Checkacl:role-add'
	        
	    ]);
	    Route::post('/addrole',[
	        'as' => 'admin/role/addrole',
	        'uses' => 'RoleController@postaddinfo',
	        'middleware' =>'Checkacl:role-add'
	    ]);
	    Route::get('/edit/{id}',[
	    	'as' => 'admin/role/editrole',
	    	'uses'=> 'RoleController@geteditrole',
	    	'middleware' =>'Checkacl:role-edit'
	    ]);

	    Route::post('/edit/{id}',[
	        'as' => 'admin/role/editrole',
	        'uses' => 'RoleController@posteditrole',
	        'middleware' =>'Checkacl:role-edit'
	    ]);
	  
	    Route::get('/delete/{id}',[
	        'as' => 'admin/role/deleterole',
	        'uses' => 'RoleController@getdeleterole',
	        'middleware' =>'Checkacl:role-delete'
	    ]);

	    Route::get('/addpermission',[
	        'as' => 'admin/role/addpermission',
	        'uses' => 'RoleController@getaddpermission',
	        'middleware' =>'Checkacl:permission-add'
	        
	    ]);
	 
	    Route::post('/addpermission',[
	        'as' => 'admin/role/addpermission',
	        'uses' => 'RoleController@postaddpermission',
	        'middleware' =>'Checkacl:permission-add'
	    ]);
	});

});