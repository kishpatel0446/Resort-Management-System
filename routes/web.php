<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\AdminRegistrationController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\AdminBookingController;
use App\Http\Controllers\ViewBookingController;
use App\Http\Controllers\AgentBookingController;
use App\Http\Controllers\SchoolBookingController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\WithdrawalController;
use App\Http\Controllers\KitchenPurchaseController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\RoomBookingController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\OccupiedRoomController;
use App\Http\Controllers\InvestmentController;
use App\Http\Controllers\DailyIncomeController;
use App\Http\Controllers\DailyExpenseController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PackageController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/perks', function () {
    return view('perks');
});

Route::get('/gallary', [GalleryController::class, 'index'])->name('gallery.index');

Route::get('/school', function () {
    return view('school');
});

Route::get('/contact', [EnquiryController::class, 'showEnquiryForm'])->name('enquiry');
Route::post('/submit-enquiry', [EnquiryController::class, 'store'])->name('submit.enquiry');
Route::get('/inquiries', [EnquiryController::class, 'index'])->name('inquiries.index');
Route::put('/inquiries/{id}/handled', [EnquiryController::class, 'markHandled'])->name('inquiries.markHandled');


Route::get('/bookings', [BookingController::class, 'showBookingForm'])->name('bookings');
Route::post('submit-booking', [BookingController::class, 'store'])->name('submit.booking');

Route::get('/schoolbooking', [SchoolBookingController::class, 'showBookingForm'])->name('schoolbooking');
Route::post('submit-schoolbooking', [SchoolBookingController::class, 'store'])->name('submit.schoolbooking');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

Route::get('admin/register', [AdminRegistrationController::class, 'showRegistrationForm'])->name('admin.register');
Route::post('admin/register', [AdminRegistrationController::class, 'register']);

Route::middleware(['auth:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('bookings/create', [AdminBookingController::class, 'create'])->name('bookings.create');
    Route::post('bookings/store', [AdminBookingController::class, 'store'])->name('bookings.store');
    Route::get('bookings/schoolcreate', [AdminBookingController::class, 'schoolcreate'])->name('bookings.schoolcreate');
    Route::post('bookings/schoolstore', [AdminBookingController::class, 'schoolstore'])->name('bookings.schoolstore');
});

Route::get('/admin/viewbooking', [ViewBookingController::class, 'index'])->name('admin.viewbooking');
Route::get('/agent-booking', [AgentBookingController::class, 'create'])->name('agent.booking.create');
Route::post('/agent-booking', [AgentBookingController::class, 'store'])->name('agent.booking.store');
Route::get('/admin/viewschool', [ViewBookingController::class, 'school'])->name('admin.viewschool');
Route::get('/admin/viewadmin', [ViewBookingController::class, 'admin'])->name('admin.viewadmin');
Route::get('/admin/viewagent', [ViewBookingController::class, 'agent'])->name('admin.viewagent');

Route::get('/bills', [BillController::class, 'index'])->name('bills.index');
Route::post('/bills', [BillController::class, 'store'])->name('bills.store');


Route::get('/bills/generate', [BillController::class, 'generateBill'])->name('generatebill');
Route::get('/bills/{bill}', [BillController::class, 'show'])->name('bills.show');

Route::get('/invoice/{bill}', [InvoiceController::class, 'showInvoice'])->name('invoice.show');
Route::get('/invoice/create/{bookingId}', [InvoiceController::class, 'createInvoice'])->name('invoice.create');

Route::get('/staff', [StaffController::class, 'index'])->name('staff.index');
Route::get('/staff/create', [StaffController::class, 'create'])->name('staff.addstaff');
Route::post('/staff/store', [StaffController::class, 'store'])->name('staff.store');
Route::delete('/staff/remove/{staffId}', [StaffController::class, 'remove'])->name('staff.remove');

Route::get('attendance', [AttendanceController::class, 'index'])->name('attendance.index');
Route::post('attendance', [AttendanceController::class, 'store'])->name('attendance.store');
Route::get('/attendance/view', [AttendanceController::class, 'view'])->name('attendance.view');

Route::get('/salary/pay-salary', [SalaryController::class, 'showStaffList'])->name('salary.paylist');
Route::get('/salary/pay-salary/{staffId}', [SalaryController::class, 'create'])->name('salary.create');
Route::post('/salary/pay-salary', [SalaryController::class, 'store'])->name('salary.store');
Route::get('/view-salary/{staffId}', [SalaryController::class, 'view'])->name('salary.view');

Route::prefix('withdrawal')->group(function () {
    Route::get('/add/{staffId}', [WithdrawalController::class, 'create'])->name('withdrawal.create');
    Route::post('/add', [WithdrawalController::class, 'store'])->name('withdrawal.store');
});
Route::get('/staff-list', [SalaryController::class, 'showStaffList'])->name('staff.list');

Route::get('kitchen_purchases', [KitchenPurchaseController::class, 'index'])->name('kitchen_purchases.index');
Route::get('kitchen_purchases/create', [KitchenPurchaseController::class, 'create'])->name('kitchen_purchases.create');
Route::post('kitchen_purchases', [KitchenPurchaseController::class, 'store'])->name('kitchen_purchases.store');
Route::get('kitchen_purchases/{id}', [KitchenPurchaseController::class, 'show'])->name('kitchen_purchases.show');

Route::get('purchases', [PurchaseController::class, 'index'])->name('purchases.index');
Route::get('purchases/create', [PurchaseController::class, 'create'])->name('purchases.create');
Route::post('purchases', [PurchaseController::class, 'store'])->name('purchases.store');
Route::get('purchases/{id}', [PurchaseController::class, 'show'])->name('purchases.show');

Route::get('/generate-bill-from-website/{id}', [BillController::class, 'generateBillFromWebsite'])->name('generate-bill-from-website');
Route::get('/generate-bill-from-admin/{id}', [BillController::class, 'generateBillFromAdmin'])->name('generate-bill-from-admin');
Route::get('/generate-bill-from-agent/{id}', [BillController::class, 'generateBillFromAgent'])->name('generate-bill-from-agent');
Route::get('/generate-bill', [BillController::class, 'create'])->name('generatebill');





Route::prefix('rooms')->group(function () {

    Route::get('online-booking', [RoomBookingController::class, 'showOnlineBookingForm'])->name('roombooking');
    Route::post('online-booking', [RoomBookingController::class, 'createOnlineBooking'])->name('rooms.create-online-booking');
    Route::get('offline-booking', [RoomBookingController::class, 'showOfflineBookingForm'])->name('rooms.offline-booking-form');
    Route::post('offline-booking', [RoomBookingController::class, 'createOfflineBooking'])->name('rooms.create-offline-booking');
    Route::get('online-bookings', [RoomBookingController::class, 'indexOnlineBookings'])->name('rooms.online-booking');
    Route::get('offline-bookings', [RoomBookingController::class, 'indexOfflineBookings'])->name('rooms.offline-bookings');
    Route::post('/rooms/allot/{room_id}', [RoomBookingController::class, 'createOfflineBooking'])->name('rooms.createOfflineBooking');
    Route::get('rooms/bookings', [RoomBookingController::class, 'showAllBookings'])->name('rooms.booking_details');
    Route::get('rooms/booking', [RoomBookingController::class, 'showOnlineBookings'])->name('rooms.online_booking');
    Route::post('/book-room/review', [RoomBookingController::class, 'review'])->name('book-room.review');
    Route::post('/rooms/confirmBooking', [RoomBookingController::class, 'createOnlineBooking'])->name('rooms.confirmBooking');
    Route::get('checkout/{bookingId}', [RoomBookingController::class, 'checkoutBooking'])->name('rooms.checkout-booking');
    Route::get('allot-room/{bookingId}', [RoomBookingController::class, 'allotRoom'])->name('rooms.allot-room');
    Route::post('confirm-room-allotment/{bookingId}', [RoomBookingController::class, 'confirmRoomAllotment'])->name('rooms.confirm-room-allotment');
    Route::post('/rooms/checkout/{id}', [RoomBookingController::class, 'checkoutBooking'])->name('rooms.checkout');
    Route::post('/online-bookings/{bookingId}/allot', [RoomBookingController::class, 'allotRoomToBooking'])->name('online.bookings.allot');



    Route::get('/', [RoomController::class, 'index'])->name('rooms.index');
    Route::get('create', [RoomController::class, 'create'])->name('rooms.create');
    Route::post('create', [RoomController::class, 'store'])->name('rooms.store');
    Route::get('{roomId}/edit', [RoomController::class, 'edit'])->name('rooms.edit');
    Route::post('{roomId}/edit', [RoomController::class, 'update'])->name('rooms.update');
    Route::get('{roomId}/delete', [RoomController::class, 'destroy'])->name('rooms.delete');
    Route::post('update-availability/{roomId}', [RoomController::class, 'updateAvailability'])->name('rooms.update-availability');
    Route::get('rooms/details', [RoomController::class, 'roomDetails'])->name('rooms.details');
    Route::post('{roomId}/maintenance', [RoomController::class, 'maintenance'])->name('rooms.maintenance');
    Route::post('rooms/{roomId}/available', [RoomController::class, 'available'])->name('rooms.available');
    Route::post('/rooms/{room}/allot', [RoomController::class, 'allotRoom'])->name('rooms.allot');
    Route::get('/rooms/occupied', [RoomController::class, 'occupiedRooms'])->name('rooms.occupied');
});




Route::resource('investments', InvestmentController::class);
Route::resource('daily-income', DailyIncomeController::class);
Route::resource('daily-expenses', DailyExpenseController::class);



Route::prefix('reports')->group(function () {
    
    Route::get('/school-picnic', [ReportsController::class, 'schoolPicnic'])->name('reports.school_picnic');
    Route::get('/daily-booking', [ReportsController::class, 'dailyBooking'])->name('reports.daily_booking');
    Route::get('/agent-booking', [ReportsController::class, 'agentBooking'])->name('reports.agent_booking');
    Route::get('/staff', [ReportsController::class, 'staffReport'])->name('reports.staff');
    Route::get('/account', [ReportsController::class, 'accountReport'])->name('reports.account');
});
Route::get('/reports/account', [ReportsController::class, 'accountReport'])->name('reports.account');
Route::get('/reports/income', [ReportsController::class, 'incomeReport'])->name('reports.income');
Route::get('/reports/expense', [ReportsController::class, 'expenseReport'])->name('reports.expense');
Route::get('/reports/investment', [ReportsController::class, 'investmentReport'])->name('reports.investment');

Route::get('/reports/investment/filter', [ReportsController::class, 'filterInvestmentReport'])->name('reports.investment.filter');

Route::get('/reports/expense/filter', [ReportsController::class, 'filterExpenseReport'])->name('reports.expense.filter');
Route::get('reports/school-picnic/filter', [ReportsController::class, 'filterSchoolPicnic'])->name('reports.school.picnic.filter');
Route::get('/reports/daily-booking/filter', [ReportsController::class, 'filterDailyBookings'])->name('reports.daily_booking.filter');

Route::get('/daily-booking', [ReportsController::class, 'dailyBooking'])->name('reports.daily_booking');
Route::get('/reports/admin-booking', [ReportsController::class, 'adminBooking'])->name('reports.admin_booking');
Route::get('/reports/website-booking', [ReportsController::class, 'websiteBooking'])->name('reports.website_booking');
Route::get('/reports/agent-booking', [ReportsController::class, 'agentBooking'])->name('reports.agent_booking');
Route::get('reports/filteradminBooking', [ReportsController::class, 'filteradminBooking'])->name('reports.filteradminBooking');

Route::get('/daily', [ReportsController::class, 'dailyReport'])->name('reports.daily');
Route::post('/check-in/{table}/{id}', [ReportsController::class, 'checkIn'])->name('booking.checkin');

Route::get('/admin/gallery', [GalleryController::class, 'showform'])->name('gallery.show');
Route::post('/admin/gallery', [GalleryController::class, 'store'])->name('gallery.store');
Route::delete('/admin/gallery/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('packages', PackageController::class);
});

Route::get('/perks', [PackageController::class, 'showPackages']);
Route::get('/', [PackageController::class, 'showHome'])->name('welcome');