<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\layouts\CalismaEkle;
use App\Http\Controllers\layouts\Calismalar;
use App\Http\Controllers\layouts\Denemeler;
use App\Http\Controllers\layouts\Gorevlerim;
use App\Http\Controllers\layouts\HaftalikPlan;
use App\Http\Controllers\layouts\Kitaplar;
use App\Http\Controllers\layouts\Konular;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\layouts\WithoutMenu;
use App\Http\Controllers\layouts\WithoutNavbar;
use App\Http\Controllers\layouts\Fluid;
use App\Http\Controllers\layouts\Container;
use App\Http\Controllers\layouts\Blank;
use App\Http\Controllers\layouts\Ders;
use App\Http\Controllers\pages\AccountSettingsAccount;
use App\Http\Controllers\pages\AccountSettingsNotifications;
use App\Http\Controllers\pages\AccountSettingsConnections;
use App\Http\Controllers\pages\MiscError;
use App\Http\Controllers\pages\MiscUnderMaintenance;
use App\Http\Controllers\authentications\giris;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\authentications\ForgotPasswordBasic;
use App\Http\Controllers\cards\CardBasic;
use App\Http\Controllers\user_interface\Accordion;
use App\Http\Controllers\user_interface\Alerts;
use App\Http\Controllers\user_interface\Badges;
use App\Http\Controllers\user_interface\Buttons;
use App\Http\Controllers\user_interface\Carousel;
use App\Http\Controllers\user_interface\Collapse;
use App\Http\Controllers\user_interface\Dropdowns;
use App\Http\Controllers\user_interface\Footer;
use App\Http\Controllers\user_interface\ListGroups;
use App\Http\Controllers\user_interface\Modals;
use App\Http\Controllers\user_interface\Navbar;
use App\Http\Controllers\user_interface\Offcanvas;
use App\Http\Controllers\user_interface\PaginationBreadcrumbs;
use App\Http\Controllers\user_interface\Progress;
use App\Http\Controllers\user_interface\Spinners;
use App\Http\Controllers\user_interface\TabsPills;
use App\Http\Controllers\user_interface\Toasts;
use App\Http\Controllers\user_interface\TooltipsPopovers;
use App\Http\Controllers\user_interface\Typography;
use App\Http\Controllers\extended_ui\PerfectScrollbar;
use App\Http\Controllers\extended_ui\TextDivider;
use App\Http\Controllers\icons\MdiIcons;
use App\Http\Controllers\form_elements\BasicInput;
use App\Http\Controllers\form_elements\InputGroups;
use App\Http\Controllers\form_layouts\VerticalForm;
use App\Http\Controllers\form_layouts\HorizontalForm;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\tables\Basic as TablesBasic;

// Main Page Route
Route::get('/', [Analytics::class, 'index'])->name('dashboard-analytics');



// pages
Route::get('/pages/account-settings-account', [AccountSettingsAccount::class, 'index'])->name('pages-account-settings-account');
Route::get('/pages/account-settings-notifications', [AccountSettingsNotifications::class, 'index'])->name('pages-account-settings-notifications');
Route::get('/pages/account-settings-connections', [AccountSettingsConnections::class, 'index'])->name('pages-account-settings-connections');
Route::get('/pages/misc-error', [MiscError::class, 'index'])->name('pages-misc-error');
Route::get('/pages/misc-under-maintenance', [MiscUnderMaintenance::class, 'index'])->name('pages-misc-under-maintenance');

// cards
Route::get('/cards/basic', [CardBasic::class, 'index'])->name('cards-basic');

// User Interface
Route::get('/ui/accordion', [Accordion::class, 'index'])->name('ui-accordion');
Route::get('/ui/alerts', [Alerts::class, 'index'])->name('ui-alerts');
Route::get('/ui/badges', [Badges::class, 'index'])->name('ui-badges');
Route::get('/ui/buttons', [Buttons::class, 'index'])->name('ui-buttons');
Route::get('/ui/carousel', [Carousel::class, 'index'])->name('ui-carousel');
Route::get('/ui/collapse', [Collapse::class, 'index'])->name('ui-collapse');
Route::get('/ui/dropdowns', [Dropdowns::class, 'index'])->name('ui-dropdowns');
Route::get('/ui/footer', [Footer::class, 'index'])->name('ui-footer');
Route::get('/ui/list-groups', [ListGroups::class, 'index'])->name('ui-list-groups');
Route::get('/ui/modals', [Modals::class, 'index'])->name('ui-modals');
Route::get('/ui/navbar', [Navbar::class, 'index'])->name('ui-navbar');
Route::get('/ui/offcanvas', [Offcanvas::class, 'index'])->name('ui-offcanvas');
Route::get('/ui/pagination-breadcrumbs', [PaginationBreadcrumbs::class, 'index'])->name('ui-pagination-breadcrumbs');
Route::get('/ui/progress', [Progress::class, 'index'])->name('ui-progress');
Route::get('/ui/spinners', [Spinners::class, 'index'])->name('ui-spinners');
Route::get('/ui/tabs-pills', [TabsPills::class, 'index'])->name('ui-tabs-pills');
Route::get('/ui/toasts', [Toasts::class, 'index'])->name('ui-toasts');
Route::get('/ui/tooltips-popovers', [TooltipsPopovers::class, 'index'])->name('ui-tooltips-popovers');
Route::get('/ui/typography', [Typography::class, 'index'])->name('ui-typography');

// extended ui
Route::get('/extended/ui-perfect-scrollbar', [PerfectScrollbar::class, 'index'])->name('extended-ui-perfect-scrollbar');
Route::get('/extended/ui-text-divider', [TextDivider::class, 'index'])->name('extended-ui-text-divider');

// icons
Route::get('/icons/icons-mdi', [MdiIcons::class, 'index'])->name('icons-mdi');

// form elements
Route::get('/forms/basic-inputs', [BasicInput::class, 'index'])->name('forms-basic-inputs');
Route::get('/forms/input-groups', [InputGroups::class, 'index'])->name('forms-input-groups');

// form layouts
Route::get('/form/layouts-vertical', [VerticalForm::class, 'index'])->name('form-layouts-vertical');
Route::get('/form/layouts-horizontal', [HorizontalForm::class, 'index'])->name('form-layouts-horizontal');


//Anasayfa ekranı
Route::get('/',[HomeController::class, 'index']);

//Kayıt ol ekranı
Route::get('register',[AuthController::class, 'register']);
Route::post('register_post',[AuthController::class, 'register_post']);

//Giriş ekranı
Route::get('login',[AuthController::class, 'login']);
Route::post('login_post',[AuthController::class, 'login_post']);

//Şifremi unuttum ekranı
Route::get('forgot',[AuthController::class, 'forgot']);

//Admin Anasayfa Ekranı
Route::group(['middlewareAliases' => 'admin'], function(){
    Route::get('admin/dashboard',[DashboardController::class,'dashboard']);
});

//Koç Anasayfa ekranı
Route::group(['middlewareAliases' => 'coach'], function(){
    Route::get('coach/dashboard',[DashboardController::class,'dashboard']);
    Route::get('/students/{id}/plans', [PlanController::class, 'studentPlans'])->name('coach.students.plans'); // Belirli bir öğrencinin planlarını listele
    Route::post('/students/{id}/plans', [PlanController::class, 'store'])->name('coach.students.plans.store'); // Öğrenci için plan oluştur
    Route::put('/students/{id}/plans/{planId}', [PlanController::class, 'update'])->name('coach.students.plans.update'); // Plan güncelle
    Route::delete('/students/{id}/plans/{planId}', [PlanController::class, 'destroy'])->name('coach.students.plans.destroy'); // Plan sil
});

//Öğrenci anasayfa ekranı
Route::group(['middlewareAliases' => 'student'], function(){
    Route::get('student/dashboard',[DashboardController::class,'dashboard']);
    Route::get('/plans', [PlanController::class, 'index'])->name('student.plans.index'); // Öğrencinin kendi planlarını listele
    Route::post('/plans', [PlanController::class, 'store'])->name('student.plans.store'); // Plan oluştur
    Route::put('/plans/{id}', [PlanController::class, 'update'])->name('student.plans.update'); // Plan güncelle
    Route::delete('/plans/{id}', [PlanController::class, 'destroy'])->name('student.plans.destroy'); // Plan sil
});


// layout
Route::get('/layouts/without-menu', [WithoutMenu::class, 'index'])->name('layouts-without-menu');
Route::get('/layouts/without-navbar', [WithoutNavbar::class, 'index'])->name('layouts-without-navbar');
Route::get('/layouts/fluid', [Fluid::class, 'index'])->name('layouts-fluid');
Route::get('/layouts/container', [Container::class, 'index'])->name('layouts-container');
Route::get('/layouts/blank', [Blank::class, 'index'])->name('layouts-blank');
Route::get('/layouts/ders', [Ders::class, 'index'])->name('layouts-ders');
Route::get('/layouts/HaftalikPlan', [HaftalikPlan::class, 'index'])->name('layouts-ders');
Route::get('/layouts/Calismalar', [Calismalar::class, 'index'])->name('layouts-ders');
Route::get('/layouts/CalismaEkle', [CalismaEkle::class, 'index'])->name('layouts-ders');
Route::get('/layouts/Gorevlerim', [Gorevlerim::class, 'index'])->name('layouts-ders');
Route::get('/layouts/Konular', [Konular::class, 'index'])->name('layouts-ders');
Route::get('/layouts/Kitaplar', [Kitaplar::class, 'index'])->name('layouts-ders');
Route::get('/layouts/Denemeler', [Denemeler::class, 'index'])->name('layouts-ders');