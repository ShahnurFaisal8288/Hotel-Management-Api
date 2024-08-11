<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommunityCenterController;
use App\Http\Controllers\CreateAdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\InvestorController;
use App\Http\Controllers\InvestorPayController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PermissionAssignController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\SubModuleController;
use App\Http\Controllers\TaskController;
use App\Models\CommunityCenter;
use App\Models\InvestorPay;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;




Route::redirect('/', 'dashboard');
Route::match(['get', 'post'], '/register', [AdminAuthController::class, 'register'])->name('register');
Route::match(['get', 'post'], '/login', [AdminAuthController::class, 'login'])->name('login');
Route::match('get', '/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
Route::match(['get', 'post'], '/my-profile/{id}', [AdminAuthController::class, 'myProfile'])->name('my.profile');
Route::match(['get', 'post'], '/change/password/{id}', [AdminAuthController::class, 'changePassword'])->name('change.password');


Route::group(['middleware' => ['adminAuth']], function () {
    Route::match(['get'], '/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
    ///investor
    Route::match(['get', 'post'], '/investor_create', [InvestorController::class, 'investor_create'])->name('investor_create');
    Route::match(['get','post'], '/investorApprove', [InvestorController::class, 'investorApprove'])->name('investorApprove');
    Route::post('/comment/{id}', [InvestorController::class, 'comment'])->name('commentPost');
    Route::match(['get'], '/approve/{id}', [InvestorController::class, 'approve'])->name('approve');
    Route::match(['get'], '/investorList', [InvestorController::class, 'investorList'])->name('investorList');
    Route::match(['get'], '/investor_delete/{id}', [InvestorController::class, 'investor_delete'])->name('investor_delete');
    Route::match(['get','post'], '/investor_show/{id}', [InvestorController::class, 'investorShow'])->name('investor_show');
    Route::match(['get','post'], '/investor_admin_show/{id}', [InvestorController::class, 'investorAdminShow'])->name('investor_admin_show');
    //investor_org_show
    Route::match(['get','post'], '/investor_org_show/{id}', [InvestorController::class, 'investor_org_show'])->name('investor_org_show');
    Route::get('/investor_edit/{id}',[InvestorController::class,'investor_edit'])->name('investor_edit');
    Route::match(['get'], '/unpaidInvestor', [InvestorController::class, 'unpaidInvestor'])->name('unpaidInvestor');

    //investor_pay
    Route::match(['get', 'post'], '/investor_pay', [InvestorPayController::class, 'investor_pay'])->name('investor_pay');
    Route::match(['get'], '/payment/list', [InvestorPayController::class, 'paymentList'])->name('payment.list');
    Route::match(['get'], '/investorPay_delete/{id}', [InvestorPayController::class, 'investorPayDelete'])->name('investorPay_delete');
    //employee
    Route::match(['get', 'post'], '/employee', [EmployeeController::class, 'employee'])->name('employee');
    Route::match(['get'], '/employeeDelete/{id}', [EmployeeController::class, 'employeeDelete'])->name('employeeDelete');
    Route::match(['get', 'post'], '/employeeEdit/{id}', [EmployeeController::class, 'employeeEdit'])->name('employeeEdit');

    //tasks
    Route::resource('tasks', TaskController::class);
    //ajax route getName
    Route::match(['get'], '/getName', [AjaxController::class, 'getName'])->name('getName');
    Route::match(['get'], '/getAssist', [AjaxController::class, 'getAssist'])->name('getAssist');
    Route::match(['get'], '/getTeamLeader', [AjaxController::class, 'getTeamLeader'])->name('getTeamLeader');
    Route::match(['get'], '/ratio', [AjaxController::class, 'ratio'])->name('ratio');

    //ajax-role
    Route::post('/get-permission', [AjaxController::class, 'getPermission'])->name('get-permission');
    //lead management
    Route::match(['get', 'post'], '/lead', [LeadController::class, 'Lead'])->name('lead');
    Route::match(['get', 'post'], '/leadEdit/{id}', [LeadController::class, 'leadEdit'])->name('leadEdit');
    Route::match(['get'], '/leadDelete/{id}', [LeadController::class, 'leadDelete'])->name('leadDelete');
    Route::match(['get'], '/lead/process', [LeadController::class, 'leadProcess'])->name('lead.process');
    Route::match(['get', 'post'], '/lead/to/investor/{id}', [LeadController::class, 'leadToInvestor'])->name('lead.to.investor');
    Route::match(['get', 'post'], '/lead/review/{id}', [LeadController::class, 'leadReview'])->name('lead.review');
    Route::match(['get', 'post'], '/review/lead/{id}', [LeadController::class, 'reviewLead'])->name('review.lead');
    //report
    Route::match(['get'], '/work/report', [ReportController::class, 'workReport'])->name('work.report');
    Route::match(['get'], '/task/report', [ReportController::class, 'taskReport'])->name('task_report');
    Route::match(['get'], '/expense/report', [ReportController::class, 'expenseReport'])->name('expenseReport');
    //investor report
    Route::get('investorReport',[ReportController::class,'investorReport'])->name('investorReport');
    Route::get('postInvestorReport',[ReportController::class,'postInvestorReport'])->name('postInvestorReport');
    //Due report
    Route::get('dueReport',[ReportController::class,'dueReport'])->name('dueReport');
    Route::get('/postDueReport',[ReportController::class,'postDueReport'])->name('postDueReport');
    //categoryGet
    Route::get('/category',[CategoryController::class,'categoryGet'])->name('categoryGet');
    Route::get('/categoryList',[CategoryController::class,'categoryList'])->name('categoryList');
    Route::get('/categoryDelete/{id}',[CategoryController::class,'categoryDelete'])->name('categoryDelete');
    Route::post('/category',[CategoryController::class,'categoryPost'])->name('categoryPost');
    //expense
    Route::match(['get','post'],'/expense',[ExpenseController::class,'expense'])->name('expense');
    Route::match(['get'],'/expenseList',[ExpenseController::class,'expenseList'])->name('expenseList');
    // Route::match(['get'],'/expenseView/{id?}',[ExpenseController::class,'expenseView'])->name('expenseView');
    //pdf
     //bookingPdf.list
     Route::match(['get'], '/bookingPdf/{id}', [PdfController::class, 'bookingPdf'])->name('bookingPdf');
    //investor.list
    Route::match(['get'], '/investorPdf/{id}', [PdfController::class, 'investorPdf'])->name('investor.list');
    //investorPay_view
    Route::match(['get'], '/investorPay_view/{id}', [InvestorPayController::class, 'investorPay_view'])->name('investorPay_view');
    //investorPay_print
    Route::match(['get'], '/investorPay_print/{id}', [PdfController::class, 'investorPay_print'])->name('investorPay_print');
    //unpaid.pdf
    Route::match(['get'], '/unpaid/pdf', [PdfController::class, 'unpaidPdf'])->name('unpaid.pdf');
    // module route
    Route::get('/module', [ModuleController::class, 'module'])->name('module');
    Route::get('/add-module', [ModuleController::class, 'addModule'])->name('add.module');
    Route::post('/store-module', [ModuleController::class, 'storeModule'])->name('store.module');
    Route::get('/edit-module/{id}', [ModuleController::class, 'editModule'])->name('edit.module');
    Route::post('/update-module', [ModuleController::class, 'updateModule'])->name('update.module');
    Route::get('/delete-module/{id}', [ModuleController::class, 'deleteModule'])->name('delete.module');
    // sub Module route
    Route::get('/subModule', [SubModuleController::class, 'subModule'])->name('subModule');
    Route::get('/add-subModule', [SubModuleController::class, 'addSubModule'])->name('add.subModule');
    Route::post('/store-subModule', [SubModuleController::class, 'storeSubModule'])->name('store.subModule');
    Route::get('/edit-subModule/{id}', [SubModuleController::class, 'editSubModule'])->name('edit.subModule');
    Route::post('/update-subModule', [SubModuleController::class, 'updateSubModule'])->name('update.subModule');
    Route::get('/delete-subModule/{id}', [SubModuleController::class, 'deleteSubModule'])->name('delete.subModule');
    //role

    // role route
    Route::get('/role', [RoleController::class, 'role'])->name('role');
    Route::get('/add-role', [RoleController::class, 'addRole'])->name('add.role');
    Route::post('/store-role', [RoleController::class, 'storeRole'])->name('store.role');
    Route::get('/edit-role/{id}', [RoleController::class, 'editRole'])->name('edit.role');
    Route::post('/update-role', [RoleController::class, 'updateRole'])->name('update.role');
    Route::get('/delete-role/{id}', [RoleController::class, 'deleteRole'])->name('delete.role');

    //creating admin

    Route::get('/admin-list', [CreateAdminController::class, 'adminList'])->name('adminList');
    Route::post('/admin-list', [CreateAdminController::class, 'list'])->name('list');

    Route::get('/create-admin', [CreateAdminController::class, 'createAdmin'])->name('create-admin');
    Route::post('/create-admin', [CreateAdminController::class, 'adminCreate'])->name('adminCreate');

    Route::get('/edit-admin/{id}', [CreateAdminController::class, 'showEditAdmin'])->name('showEditAdmin');
    Route::post('/edit-admin/{id}', [CreateAdminController::class, 'editAdmin'])->name('editAdmin');

    Route::get('/delete-admin/{id}', [CreateAdminController::class, 'deleteAdmin'])->name('deleteAdmin');

    // Permission Route
    Route::get('/permission', [RolePermissionController::class, 'permission'])->name('permission');
    Route::get('/add-permission', [RolePermissionController::class, 'addPermission'])->name('add-permission');
    Route::post('/store-permission', [RolePermissionController::class, 'storePermission'])->name('store.permission');
    Route::get('/edit-permission/{id}', [RolePermissionController::class, 'editPermission'])->name('edit.permission');
    Route::post('/update-permission', [RolePermissionController::class, 'updatePermission'])->name('update.permission');
    Route::get('/delete-permission/{id}', [RolePermissionController::class, 'deletePermission'])->name('delete.permission');

    //access-control
    Route::get('/access-control', [PermissionAssignController::class, 'showAccessControl'])->name('access-control');
    Route::post('/access-control', [PermissionAssignController::class, 'accessControl'])->name('accessControl');
    Route::get('/add-assign-permission', [PermissionAssignController::class, 'addAssignPermission'])->name('add-assign-permission');
    Route::get('/edit-assign-permission/{id}', [PermissionAssignController::class, 'showEditAssignPermission'])->name('showEdit-assign-permission');
    Route::post('/edit-assign-permission', [PermissionAssignController::class, 'editAssignPermission'])->name('edit-assign-permission');
    Route::get('/delete-assign-permission/{id}', [PermissionAssignController::class, 'deleteAssignPermission'])->name('delete-assign-permission');

    //communityList

    Route::get('/communityList/{id?}', [CommunityCenterController::class, 'communityList'])->name('community.list');
    Route::post('/communityCreate',[CommunityCenterController::class,'communityCreate'])->name('community.create');
    Route::get('/communityDelete/{id}',[CommunityCenterController::class,'communityDelete'])->name('community.delete');
   
    Route::post('/communityEdit/{id}', [CommunityCenterController::class, 'communityEditPost'])->name('community.editPost');
    Route::get('/communityPrint/{id}',[CommunityCenterController::class,'communityPrint'])->name('community.print');
    //onlineBooking
    Route::get('/onlineBooking',[CommunityCenterController::class,'onlineBooking'])->name('community.onlineBooking');
    //offlineBooking
    Route::get('/offlineBooking',[CommunityCenterController::class,'offlineBooking'])->name('community.offlineBooking');
    //rules and permission
    Route::get('create-role',function(){
        // $permission = Permission::create(['name' => 'edit articles']);
        $user = auth('admin')->user();
        $access = $user->can('edit articles');
        if($access){
            return 'has permitted';
        }else{
            return 'has not permitted';
        }
        // $user->givePermissionTo('edit articles');
        return $user->can('delete articles');

    });
});
