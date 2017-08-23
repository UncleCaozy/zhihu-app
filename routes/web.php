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

Route::get('/', 'QuestionsController@index');


Route::get('/another/login', 'LoginController@github');
Route::get('/github/login', 'LoginController@githubLogin');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('email/verify/{token}',['as'=>'email.verify','uses'=>'EmailController@verify'] );
Route::resource('questions', 'QuestionsController',['name'=>[
    'create'=>'questions.make',
    'show'=>'questions.show',
]]);

Route::post('questions/{question}/close','QuestionsController@close_comment');
Route::post('questions/{question}/open','QuestionsController@open_comment');

Route::post('questions/{question}/question_hidden','QuestionsController@question_hidden');
Route::post('questions/{question}/question_open','QuestionsController@question_open');


Route::get('users/my_questions','UsersController@my_questions');
Route::get('users/my_followed_questions','UsersController@questions_followed');

Route::post('questions/{question}/answer','AnswersController@store');
Route::post('answers/{answer}/answer/update','AnswersController@update');
Route::get('answers/{answer}/edit','AnswersController@edit');
Route::post('answers/{answer}/hidden','AnswersController@hidden');
Route::post('answers/{answer}/close_comment','AnswersController@close_comment');
Route::post('answers/{answer}/open_comment','AnswersController@open_comment');

Route::get('question/{question}/follow','QuestionFollowController@follow');
Route::get('question/{question}/unfollow','QuestionFollowController@unfollow');

Route::get('notifications','NotificationsController@index');
Route::get('notifications/{notification}','NotificationsController@show');

Route::get('avatar','UsersController@avatar');
Route::post('avatar','UsersController@changeAvatar');


Route::get('password','PasswordController@password');
Route::post('password/update','PasswordController@update');

Route::get('setting','SettingController@index');
Route::get('page','SettingController@page');
Route::post('setting','SettingController@store');


Route::get('publish_ad','PublishAdController@index');
Route::post('publish_ad','PublishAdController@publish_ad');

Route::get('inbox','InboxController@index');
Route::get('inbox/{dialogId}','InboxController@show');
Route::post('inbox/{dialogId}/store','InboxController@store');

Route::get('topics','TopicsController@index');
Route::get('{topic}/questions/','QuestionsController@get_q_by_t');

