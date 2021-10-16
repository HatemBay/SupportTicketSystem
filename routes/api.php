<?php

use App\Http\Controllers\Api\CannedMessageController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\FAQController;
use App\Http\Controllers\Api\FAQCategoryController;
use App\Http\Controllers\Api\KnowledgeBaseController;
use App\Http\Controllers\Api\KnowledgeBaseDataController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\PriorityController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\SubCategoryController;
use App\Http\Controllers\Api\SubCategoryDataController;
use App\Http\Controllers\Api\TicketController;
use App\Http\Controllers\Api\UserDataController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Backend\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/tickets/count-all', [TicketController::class, 'countAll']);

//Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    $role = $request->user()->role;
    if (!$request->user()->hasRole($role)) {
        $request->user()->roles()->detach();
    }
    $request->user()->assignRole($role);
    return $request->user();
});

Route::get('/users/departments', [UserDataController::class, 'departments']);

Route::get('/users/giveRole/{role}/{email}', [UserController::class, 'giveRole']);

Route::get('/sub-categories/categories', [SubCategoryDataController::class, 'categories']);
Route::get('/knowledge-bases/sub-categories', [KnowledgeBaseDataController::class, 'subCategories']);
Route::get('/sub-categories/categories/{id}', [SubCategoryDataController::class, 'show']);
Route::get('/messages/ticket/{id}', [MessageController::class, 'getByTicketId']);
/************************** Stats *****************************/
Route::get('/tickets/count/{month}', [TicketController::class, 'countMonth']);
Route::get('/tickets/count-open', [TicketController::class, 'countOpen']);
Route::get('/knowledge-bases/count-open', [KnowledgeBaseController::class, 'countOpen']);
Route::get('/knowledge-bases/count-by-cat/{nb}', [KnowledgeBaseController::class, 'countBySubCat']);
/************************** Stats *****************************/

Route::apiResource('/roles', RoleController::class);

Route::apiResource('/permissions', PermissionController::class);

Route::apiResource('/users', UserController::class);

Route::apiResource('/departments', DepartmentController::class);

Route::apiResource('/priorities', PriorityController::class);

Route::apiResource('/tickets', TicketController::class);

Route::get('/dept', [TicketDataController::class, 'departments']);

Route::apiResource('/knowledge-bases', KnowledgeBaseController::class);

Route::apiResource('/sub-categories', SubCategoryController::class);

Route::apiResource('/categories', CategoryController::class);

Route::apiResource('/faqs', FAQController::class);

Route::apiResource('/faq-categories', FAQCategoryController::class);

Route::apiResource('/canned-messages', CannedMessageController::class);

Route::apiResource('/messages', MessageController::class);

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/users/{department}/tickets', [UserDataController::class, 'tickets']);
    Route::get('/users/priorities', [UserDataController::class, 'priorities']);
});
