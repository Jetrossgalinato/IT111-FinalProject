use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\MealPlanController;
use App\Http\Controllers\Api\SubscriptionController;
use App\Http\Controllers\Api\OrderController;

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

// Authenticated user route
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
return $request->user();
});

// Public routes
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
// Meal Plans
Route::apiResource('meal-plans', MealPlanController::class);

// Subscriptions
Route::apiResource('subscriptions', SubscriptionController::class);

// Orders
Route::apiResource('orders', OrderController::class);

// Stripe Webhook
Route::post('/stripe/webhook', [SubscriptionController::class, 'handleStripeWebhook']);
});