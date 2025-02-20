<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\{
    UserController,FrontSportsController,FrontScoresController
    };

use App\Http\Controllers\Admin\{
    AdminController,LocationsController,SportsController,
    CoachesController,PositionsController,TeamsController,PlayersController,
    MatchesController,NewsController,PagesController,
    };



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [UserController::class, 'home']);
Route::get('/coachbio', [UserController::class, 'coachbio']);
Route::get('/player-bio', [UserController::class, 'player_bio']);
Route::get('/scoreboard', [UserController::class, 'scoreboard']);
// Route::get('/scores', [UserController::class, 'scores']);
Route::get('/sports', [UserController::class, 'sports']);

Route::get('/admin-login', [AdminController::class, 'login']);
Route::post('/login', [AdminController::class, 'adminLogin'])->name('login');




Route::get('/sports/{sport}/teams/{team}', [FrontSportsController::class, 'sportsTeam'])->name('sports-team');
Route::get('/sports/{sport}/teams/{team}/coaches/{coach}', [FrontSportsController::class, 'coachBio'])->name('coach-bio');
Route::get('/sports/{sport}/teams/{team}/players/{player}', [FrontSportsController::class, 'playerBio'])->name('player-bio');


// scrores :
Route::get('/scores', [FrontScoresController::class, 'index']);
Route::get('/fetch-matches-data', [FrontScoresController::class, 'fetchData'])->name('fetch.match.data');
Route::get('/fetch-favorite-matches-data', [FrontScoresController::class, 'fetchFavoriteMatchData'])->name('fetch.favorite.match.data');

Route::get('/scores/matches/{matchId}/teams/{team}', [FrontScoresController::class, 'scoreboard'])->name('scoreboard');


Route::middleware(['admin'])->group(function () {
    Route::get('/admin-dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');




/* location routes */
Route::get('/admin-dashboard/locations', [LocationsController::class,'index']);
Route::get('/admin-dashboard/locations/add', [LocationsController::class, 'add'])->name('location-add');
Route::post('/admin-dashboard/locations/addProcc/{id?}', [LocationsController::class, 'addProcc'])->name('location-addProcc');
Route::get('/admin-dashboard/locations/update/{locationId}', [LocationsController::class, 'update'])->name('location-update');
Route::get('/admin-dashboard/locations/remove/{id}', [LocationsController::class, 'remove']);

/* sports routes */
Route::get('/admin-dashboard/sports', [SportsController::class,'index']);
Route::get('/admin-dashboard/sports/add', [SportsController::class, 'add'])->name('sport-add');
Route::post('/admin-dashboard/sports/addProcc', [SportsController::class, 'addProcc'])->name('sport-addProcc');
Route::get('/admin-dashboard/sports/update/{sportId}', [SportsController::class, 'update'])->name('sport-update');
Route::get('/admin-dashboard/sports/remove/{id}', [SportsController::class, 'remove']);

Route::get('/admin-dashboard/sports/attributes/{sportId}', [SportsController::class, 'attributes'])->name('sport-attributes');
Route::post('/admin-dashboard/sports/addAttrProcc', [SportsController::class, 'storeAttributes'])->name('sport-attrProcc');


/* positions routes */
Route::get('/admin-dashboard/positions', [PositionsController::class,'index']);
Route::get('/admin-dashboard/positions/add', [PositionsController::class, 'add'])->name('positions-add');
Route::post('/admin-dashboard/positions/addProcc/{id?}', [PositionsController::class, 'addProcc'])->name('positions-addProcc');
Route::get('/admin-dashboard/positions/update/{positionId}', [PositionsController::class, 'update'])->name('positions-update');
Route::get('/admin-dashboard/positions/remove/{id}', [PositionsController::class, 'remove']);



/* sports routes */
Route::get('/admin-dashboard/coaches', [CoachesController::class,'index']);
Route::get('/admin-dashboard/coaches/add', [CoachesController::class, 'add'])->name('coache-add');
Route::post('/admin-dashboard/coaches/addProcc', [CoachesController::class, 'addProcc'])->name('coache-addProcc');
Route::get('/admin-dashboard/coaches/update/{coacheId}', [CoachesController::class, 'update'])->name('coache-update');
Route::get('/admin-dashboard/coaches/remove/{id}', [CoachesController::class, 'remove']);


/* players routes */
Route::get('/admin-dashboard/players', [PlayersController::class,'index']);
Route::get('/admin-dashboard/players/add', [PlayersController::class, 'add'])->name('player-add');
Route::post('/admin-dashboard/players/addProcc', [PlayersController::class, 'addProcc'])->name('player-addProcc');
Route::get('/admin-dashboard/players/update/{playerId}', [PlayersController::class, 'update'])->name('player-update');
Route::get('/admin-dashboard/players/remove/{id}', [PlayersController::class, 'remove']);


/* teams routes */
Route::get('/admin-dashboard/teams', [TeamsController::class,'index']);
Route::get('/admin-dashboard/teams/add', [TeamsController::class, 'add'])->name('team-add');
Route::post('/admin-dashboard/teams/addProcc', [TeamsController::class, 'addProcc'])->name('team-addProcc');
Route::get('/admin-dashboard/teams/update/{teamId}', [TeamsController::class, 'update'])->name('team-update');
Route::get('/admin-dashboard/teams/manage-players/{teamId}', [TeamsController::class, 'managePlayers'])->name('team-manage-player');
Route::post('/admin-dashboard/teams/manage-players/update-player-position', [TeamsController::class, 'updatePlayerPosition'])->name('update.player.position');
Route::post('/admin-dashboard/teams/manage-players/add-new-player', [TeamsController::class, 'addNewPlayer'])->name('add.new.player');


/* matches routes */
Route::get('/admin-dashboard/matches', [MatchesController::class,'index']);
Route::get('/admin-dashboard/matches/add', [MatchesController::class, 'add'])->name('match-add');
Route::post('/admin-dashboard/matches/addProcc', [MatchesController::class, 'addProcc'])->name('match-addProcc');
Route::get('/admin-dashboard/matches/update/{matchId}', [MatchesController::class, 'update'])->name('match-update');

Route::get('/admin-dashboard/matches/getTeams/{sportId}', [MatchesController::class, 'sportData'])->name('sport-data');
Route::get('/admin-dashboard/matches/getPlayers/{team1}/{team2}', [MatchesController::class, 'getPlayers'])->name('player-data');


Route::get('/admin-dashboard/news', [NewsController::class,'index'])->name('admin.news.index');
Route::get('/admin-dashboard/news/add', [NewsController::class, 'add'])->name('news-add');
Route::post('/admin-dashboard/news/addProcc', [NewsController::class, 'addProcc'])->name('news-addProcc');
Route::get('/admin-dashboard/news/update/{newsId}', [NewsController::class, 'update'])->name('news-update');
Route::post('/admin-dashboard/news/image/delete', [NewsController::class, 'deleteImage'])->name('admin.news.image.delete');
Route::get('/admin-dashboard/news/remove/{id}', [NewsController::class, 'remove']);

Route::get('/admin-dashboard/matches/update-match-record/{matchId}', [MatchesController::class, 'updateMatchRecord'])->name('match-record');
Route::get('/admin-dashboard/matches/update-attr/{matchId}/{playerId}', [MatchesController::class, 'updateMatchRecordAttr'])->name('match-record-attr');

Route::post('/admin-dashboard/matche/player-records/addProcc', [MatchesController::class, 'addMatchRecordProcc'])->name('match-record-addProcc');



// Pages PagesController
Route::get('/admin-dashboard/pages/home', [PagesController::class,'home'])->name('admin.pages.home');

Route::post('/admin-dashboard/pages/home/addProcc', [PagesController::class, 'homeAddProcc'])->name('home-add-procc');

Route::get('/admin-dashboard/pages/header', [PagesController::class,'header'])->name('admin.pages.header');
Route::post('/admin-dashboard/pages/header/addProcc', [PagesController::class, 'headerAddProcc'])->name('header-add-procc');

Route::get('/admin-dashboard/pages/footer', [PagesController::class,'footer'])->name('admin.pages.footer');
Route::post('/admin-dashboard/pages/footer/addProcc', [PagesController::class, 'footerAddProcc'])->name('footer-add-procc');


});
