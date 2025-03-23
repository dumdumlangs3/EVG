<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    PageController, LoginController, ProfileController,
    DashboardController, AppointmentController, ServiceController, PetController, InquiryController, GuestServiceController,
    AboutController,
};

use App\Http\Controllers\Customer\DashboardController as CustomerDashboard;
use App\Http\Controllers\Customer\CustomerDashboardController;
use App\Http\Controllers\Admin\AppointmentController as AdminAppointmentController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\AdminServiceController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ClosedDaysController;
use App\Http\Controllers\Admin\CRUDServiceController;
use App\Http\Controllers\Admin\AdminPetController;
use App\Http\Controllers\Admin\AdminPetTypeController;



Route::get('/', function () {
    return 'Landing page test without DB!';
});
