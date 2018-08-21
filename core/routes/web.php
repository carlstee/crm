<?php

Auth::routes();

Route::get('/', 'AdminAuth\LoginController@showLoginForm')->name('login');
Route::get('/admin', 'AdminAuth\LoginController@showLoginForm')->name('login');
Route::get('admin/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'AdminAuth\LoginController@login')->name('admin.login');

Route::group(['prefix' => 'admin'], function () {

    Route::get('/add/knowledge/based', 'KnowledgeController@addKnow')->name('knowledge.add.admin')->middleware('admin');
    Route::post('/add/knowledge/category', 'KnowledgeController@categoryStore')->name('knowledge.category.store')->middleware('admin');
    Route::get('/delete/knowledge/category/{id}', 'KnowledgeController@categoryDelete')->name('knowledge.delete.category')->middleware('admin');
    Route::post('/store/knowledge', 'KnowledgeController@storeKnowledge')->name('knowledge.store')->middleware('admin');
    Route::get('/knowledge/based', 'KnowledgeController@indexKnowledge')->name('knowledge.index')->middleware('admin');
    Route::get('/knowledge/delete/{id}', 'KnowledgeController@deleteKnowledge')->name('knowledge.delete')->middleware('admin');
    Route::get('/knowledge/based/edit/{id}', 'KnowledgeController@editKnowledge')->name('knowledge.edit')->middleware('admin');
    Route::put('/knowledge/based/update/{id}', 'KnowledgeController@updateKnowledge')->name('knowledge.update')->middleware('admin');

    Route::get('/supports', 'TicketController@indexSupport')->name('support.admin.index')->middleware('admin');
    Route::get('/support/reply/{ticket}', 'TicketController@adminSupport')->name('ticket.admin.reply')->middleware('admin');
    Route::post('/reply/{ticket}', 'TicketController@adminReply')->name('store.admin.reply')->middleware('admin');

    Route::get('/send/proposal', 'ProposalController@sendPropsal')->name('send.proposal')->middleware('admin');
    Route::post('/send/proposal/customer', 'ProposalController@sendProposalCustomer')->name('send.proposal.customer')->middleware('admin');
    Route::get('/proposal/history', 'ProposalController@proposalHistory')->name('proposal.history')->middleware('admin');

    Route::get('/create/project', 'ProjectController@createProject')->name('project.create')->middleware('admin');
    Route::post('/store/project', 'ProjectController@storeProject')->name('project.store')->middleware('admin');
    Route::get('/projects', 'ProjectController@indexProject')->name('project.index')->middleware('admin');
    Route::get('/project/delete/{id}', 'ProjectController@deleteProject')->name('project.delete')->middleware('admin');
    Route::get('/project/edit/{id}', 'ProjectController@editProject')->name('project.edit')->middleware('admin');
    Route::get('/project/document', 'ProjectController@delDocProject')->name('project.document.delete')->middleware('admin');
    Route::put('/project/update/{id}', 'ProjectController@updateProject')->name('project.update')->middleware('admin');

    Route::get('/note', 'NoteController@addNote')->name('note.add')->middleware('admin');
    Route::post('/note/store', 'NoteController@storeNote')->name('note.store')->middleware('admin');
    Route::get('/note/list', 'NoteController@noteIndex')->name('note.index')->middleware('admin');
    Route::get('/note/delete/{id}', 'NoteController@noteDelete')->name('note.delete')->middleware('admin');
    Route::get('/note/edit/{id}', 'NoteController@noteEdit')->name('note.edit')->middleware('admin');
    Route::put('/note/update/{id}', 'NoteController@noteUpdate')->name('note.update')->middleware('admin');

    Route::get('/contact', 'ContactController@contactIndex')->name('contact.index')->middleware('admin');
    Route::post('/contact/store', 'ContactController@contactStore')->name('contact.store')->middleware('admin');
    Route::get('/contact/delete/{id}', 'ContactController@contactDelete')->name('contact.delete')->middleware('admin');
    Route::get('/contact/edit/{id}', 'ContactController@contactEdit')->name('contact.edit')->middleware('admin');
    Route::put('/contact/update/{id}', 'ContactController@contactUpdate')->name('contact.update')->middleware('admin');

    Route::get('/news', 'NewsLetterController@newsIndex')->name('send.news.email')->middleware('admin');
    Route::post('/news', 'NewsLetterController@newsStore')->name('letter.store')->middleware('admin');
    Route::get('/newsletter/history', 'NewsLetterController@newsHistory')->name('news.letter.history')->middleware('admin');

    Route::post('/logout', 'AdminAuth\LoginController@logout')->name('admin.logout');

    Route::get('/sale',"SalePointController@indexSale")->name('product.sale.index')->middleware('admin');
    Route::post('/get/product',"SalePointController@product_pass")->name('product.pass')->middleware('admin');
    Route::post('/get/product/detail',"SalePointController@productGet")->name('product.element.pass')->middleware('admin');
    Route::post('/sale/product',"SalePointController@saleProduct")->name('sale.product')->middleware('admin');

    Route::get('/stock/product/history', 'SalePointController@soldProductHistory')->name('sold.index')->middleware('admin');
    Route::get('/print/history/{invoice_id}', 'SalePointController@printHistory')->name('print.history.soldproduct')->middleware('admin');

    Route::get('/bank', 'BankAccountController@bankIndex')->name('bank.account.index')->middleware('admin');
    Route::post('/bank/store', 'BankAccountController@bankStore')->name('bank.account.store')->middleware('admin');
    Route::get('/bank/edit/{id}', 'BankAccountController@bankEdit')->name('edit.bank.account')->middleware('admin');
    Route::put('/bank/update/{id}', 'BankAccountController@bankUpdate')->name('bank.account.update')->middleware('admin');
    Route::get('/bank/delete/{id}', 'BankAccountController@bankDelete')->name('bank.acount.delete')->middleware('admin');

    Route::get('/bank/transaction', 'BankTransactionController@transactionIndex')->name('transaction.index')->middleware('admin');
    Route::post('/bank/balance/store', 'BankTransactionController@storeBalance')->name('save.bank.balance')->middleware('admin');
    Route::get('/transaction', 'BankTransactionController@indexTransaction')->name('expanse.transaction.index')->middleware('admin');
    Route::get('/add/transaction', 'BankTransactionController@createTransaction')->name('add.expense')->middleware('admin');
    Route::post('/expense/transaction', 'BankTransactionController@storeTransaction')->name('store.expense.transaction')->middleware('admin');
    Route::get('/expense/history', 'BankTransactionController@expenseHistory')->name('expense.history')->middleware('admin');
    Route::get('/transaction/{id}', 'BankTransactionController@transactionReport')->name('report.bank.wise.transaction')->middleware('admin');

    Route::get('/supplier', 'SupplyManagmentController@indexSupplier')->name('supplier.index')->middleware('admin');
    Route::post('/supplier/store', 'SupplyManagmentController@supplierStore')->name('store.supplier')->middleware('admin');
    Route::get('/supplier/delete/{id}', 'SupplyManagmentController@supplierDelete')->name('supplier.delete')->middleware('admin');
    Route::get('/supplier/edit/{id}', 'SupplyManagmentController@supplierEdit')->name('supplier.edit')->middleware('admin');
    Route::get('/supplier/item', 'SupplyManagmentController@supplierEditItemDelete')->name('supply.item.delete')->middleware('admin');
    Route::put('/supplier/update/{id}', 'SupplyManagmentController@supplierUpdate')->name('supplier.update')->middleware('admin');
    Route::get('/supply/management', 'SupplyManagmentController@suplyManIndex')->name('supply.management')->middleware('admin');
    Route::post('/item/pass', 'SupplyManagmentController@product_pass')->name('item.pass')->middleware('admin');
    Route::post('/supply/store', 'SupplyManagmentController@supplyStore')->name('store.supply.manage')->middleware('admin');
    Route::get('/supply/reports', 'SupplyManagmentController@supplyReports')->name('supply.reports')->middleware('admin');
    Route::get('/supply/supplier/{id}', 'SupplyManagmentController@supplyReportsWithSupplier')->name('supply.report.supplier')->middleware('admin');
    Route::get('/supply/{date}/{id}', 'SupplyManagmentController@supplyReportsWithDate')->name('supply.report.date')->middleware('admin');

    Route::get('add/personal/loan', 'PersonalManagementController@personalIndex')->name('personal.loan.index')->middleware('admin');
    Route::post('/personal/store', 'PersonalManagementController@personalLoanStore')->name('personal.loan.store')->middleware('admin');
    Route::get('/personal/loan', 'PersonalManagementController@personalLoanManage')->name('manage.loan')->middleware('admin');
    Route::get('/personal/loan/{id}', 'PersonalManagementController@personalEdit')->name('personal.loan.edit')->middleware('admin');
    Route::put('/personal/update/{id}', 'PersonalManagementController@personalUpdate')->name('update.personal.loan')->middleware('admin');

    Route::get('add/office/loan', 'OfficeLoanController@officeLoanAdd')->name('add.office.loan')->middleware('admin');
    Route::post('office/loan/store', 'OfficeLoanController@officeLoanStore')->name('office.loan.store')->middleware('admin');
    Route::get('office/loan/', 'OfficeLoanController@officeLoanIndex')->name('office.loan.manange')->middleware('admin');
    Route::get('office/loan/{id}', 'OfficeLoanController@officeLoanEdit')->name('office.loan.edit')->middleware('admin');
    Route::put('office/loan/update/{id}', 'OfficeLoanController@officeLoanUpdate')->name('update.office.loan')->middleware('admin');

    Route::get('add/purchase', 'PurchaseController@addPurchase')->name('add.purchase')->middleware('admin');
    Route::post('purchase/store', 'PurchaseController@storePurchase')->name('purchase.store')->middleware('admin');
    Route::get('purchase', 'PurchaseController@indexPurchase')->name('purchase.reports')->middleware('admin');
    Route::get('purchase/edit/{id}', 'PurchaseController@editPurchase')->name('purchase.edit')->middleware('admin');
    Route::put('purchase/update/{id}', 'PurchaseController@updatePurchase')->name('update.purchase')->middleware('admin');

    Route::get('/category',"CategoryController@indexCaregory")->name('product.catagory.index');
    Route::post('/category/store',"CategoryController@storeCaregory")->name('category.store');
    Route::put('/category/update/{id}',"CategoryController@updateCaregory")->name('category.update');
    Route::get('/category/delete/{id}',"CategoryController@deleteCaregory")->name('category.delete');

    Route::get('/customer/management', 'CutomerController@cuctomerIndex')->name('customer.index')->middleware('admin');
    Route::post('/customer/store', 'CutomerController@cuctomerStore')->name('customer.detail.store')->middleware('admin');
    Route::get('/customer/edit/{id}', 'CutomerController@cuctomerEdit')->name('customer.detail.edit')->middleware('admin');
    Route::put('/customer/update/{id}', 'CutomerController@cuctomerUpdate')->name('customer.update')->middleware('admin');
    Route::get('/customer/delete/{id}', 'CutomerController@cuctomerDelete')->name('customer.delete')->middleware('admin');

    Route::get('/customer/balance', 'CustomerBalanceController@customerBalanceIndex')->name('balance.index')->middleware('admin');
    Route::post('/customer/balance/store', 'CustomerBalanceController@customerBalanceStore')->name('customer.balance.store')->middleware('admin');

    Route::post('/store/warehouse', 'ProductController@storeWarehouse')->name('warehouse.store')->middleware('admin');
    Route::get('/delete/warehouse/{id}', 'ProductController@deleteWarehouse')->name('warehouse.delete')->middleware('admin');
    Route::put('/update/warehouse/{id}', 'ProductController@updateWarehouse')->name('warehouse.update')->middleware('admin');

    Route::post('/stock/product/store', 'ProductController@stockStoreProduct')->name('product.stock.store')->middleware('admin');
    Route::get('/stock/product/detail/{id}', 'ProductController@stockProductDetail')->name('product.detail.warehouse')->middleware('admin');

    Route::get('/products', 'ProductController@productIndex')->name('product.index')->middleware('admin');
    Route::post('/product/store', 'ProductController@productStore')->name('product.store')->middleware('admin');
    Route::get('/product/edit/{id}', 'ProductController@productEdit')->name('product.edit')->middleware('admin');
    Route::put('/product/update/{id}', 'ProductController@productUpdate')->name('product.update')->middleware('admin');
    Route::get('/product/delete/{id}', 'ProductController@productDelete')->name('product.delete')->middleware('admin');
    Route::get('/product/stock', 'ProductController@productStock')->name('product.stock')->middleware('admin');

    Route::get('office', 'OfficeDetailController@indexOffice')->name('office.index')->middleware('admin');
    Route::post('office/store', 'OfficeDetailController@storeOffice')->name('office.store')->middleware('admin');
    Route::get('office/edit/{id}', 'OfficeDetailController@editOffice')->name('office.update')->middleware('admin');
    Route::put('office/update/{id}', 'OfficeDetailController@updateOffice')->name('office.upadate')->middleware('admin');
    Route::get('office/delete/{id}', 'OfficeDetailController@destroyOffice')->name('office.delete')->middleware('admin');

    Route::get('delete/shift/{id}', 'FoodMillController@deleteShift')->name('delete.shift')->middleware('admin');

    Route::get('food/mill', 'FoodMillController@indexMill')->name('food.mill.index')->middleware('admin');
    Route::post('shift/store', 'FoodMillController@storeShift')->name('shift.store')->middleware('admin');
    Route::post('meal/store', 'FoodMillController@storeMeal')->name('meal.package.store')->middleware('admin');
    Route::get('package/edit/{id}', 'FoodMillController@editMeal')->name('meal.package.update')->middleware('admin');
    Route::put('package/update/{id}', 'FoodMillController@updateMeal')->name('package.meal.upadate')->middleware('admin');
    Route::get('package/delete/{id}', 'FoodMillController@destroyMeal')->name('meal.package.delete')->middleware('admin');
    Route::get('item/delete', 'FoodMillController@deleteItemMeal')->name('item.delete')->middleware('admin');

    Route::get('/catering/system', 'CateringController@cateringIndex')->name('catering.index')->middleware('admin');
    Route::get('/catering/view/{id}', 'CateringController@cateringEdit')->name('catering.edit')->middleware('admin');
    Route::get('/catering/add', 'CateringController@cateringCreate')->name('add.food.comapny')->middleware('admin');
    Route::put('/catering/update/{id}', 'CateringController@cateringUpdate')->name('catering.update')->middleware('admin');
    Route::get('/catering/report/{date}', 'CateringController@cateringReport')->name('show.detail.catring')->middleware('admin');

    Route::post('/send/invoice', 'CateringController@sendinvoice')->name('send.food,company')->middleware('admin');
    Route::get('/print/invoice/{id}', 'CateringController@printInvoice')->name('print.invoice')->middleware('admin');


    Route::get('/general',"GeneralController@index" )->name('general.index')->middleware('admin');
    Route::put('/general-update/{id}',"GeneralController@update" )->name('general.update')->middleware('admin');



    Route::get('auto/attendance','CronController@autoAttendance')->name('auto.attendance')->middleware('admin');
    Route::get('/dashboard',"AdminController@index" )->name('admin.dashboard')->middleware('admin');
    Route::post('change-password','AdminController@saveResetPassword')->name('change.password');
   Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
   Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
   Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
   Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});

Route::get('pagenotfound', 'HomeController@pageNotFound')->name('pagenot.found');
Route::get('/customer', 'CustomerAuth\LoginController@showLoginForm');
Route::get('customer/login', 'CustomerAuth\LoginController@showLoginForm');
Route::group(['prefix' => 'customer'], function () {

  Route::post('/login', 'CustomerAuth\LoginController@login');
  Route::post('/logout', 'CustomerAuth\LoginController@logout')->name('customer.logout');
  Route::get('/invoice/history', 'SalePointController@customerSaleHistory')->name('customer.invoice.history')->middleware('customer');
  Route::get('/profile', 'CutomerController@customerProfile')->name('customer.profile')->middleware('customer');
  Route::put('/profile/update/{id}', 'CutomerController@customerProfileUpdate')->name('customer.profile.update')->middleware('customer');
  Route::get('/get/support', 'TicketController@ticketIndex')->name('support.index')->middleware('customer');
  Route::get('/create/ticket', 'TicketController@ticketCreate')->name('create.new.ticket')->middleware('customer');
  Route::post('/store/ticket', 'TicketController@ticketStore')->name('ticket.store')->middleware('customer');
  Route::get('/comment/close/{ticket}', 'TicketController@ticketClose')->name('ticket.close')->middleware('customer');
  Route::get('/support/reply/{ticket}', 'TicketController@ticketReply')->name('ticket.customer.reply')->middleware('customer');
  Route::post('/support/store/{ticket}', 'TicketController@ticketReplyStore')->name('store.customer.reply')->middleware('customer');
  Route::get('/knowledge/based', 'KnowledgeController@customerIndex')->name('customer.knowledge')->middleware('customer');

});
