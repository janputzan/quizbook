<?php

Route::get('/', 'HomeController@showWelcome');

Route::get('404', 'HomeController@show404');

//Route::get('edit', 'UserController@edit');

Route::get('users/all', 'UserController@index');

Route::post('users/all', 'SearchController@searchUsers');

Route::post('users/{username}', 'UserController@update');

Route::get('register', 'UserController@create');

Route::resource('users', 'UserController');



Route::resource('quizzes', 'QuizController');

Route::get('login', 'SessionsController@create');

Route::get('logout', 'SessionsController@destroy');

Route::resource('sessions', 'SessionsController');

Route::get('leaderboards', 'LeaderboardsController@index');

Route::get('leaderboards/this-month', 'LeaderboardsController@thisMonth');

Route::get('leaderboards/this-year', 'LeaderboardsController@thisYear');

Route::get('leaderboards/all-times', 'LeaderboardsController@allTimes');

Route::get('login/fb', 'HomeController@fbLogin');

Route::get('search', 'SearchController@search');

Route::post('search', 'SearchController@searchResult');





//Route::get('create', 'CreateQuizController@title');

Route::get('create/title', 'CreateQuizController@title');

Route::post('create/title', 'CreateQuizController@titleStore');

//Route::post('create', 'CreateQuizController@titleStore');

Route::get('create/category', 'CreateQuizController@category');

Route::post('create/category', 'CreateQuizController@categoryStore');

Route::get('create/add-questions', 'CreateQuizController@addQuestions');

Route::post('create/add-questions', 'CreateQuizController@questionsStore');

Route::get('create/add-tags', 'CreateQuizController@addTags');

Route::post('create/add-tags', 'CreateQuizController@tagsStore');

Route::get('create/preview', 'CreateQuizController@preview');

Route::post('create/preview', 'QuizController@store');

Route::get('create/share', 'CreateQuizController@share');

// Route::post('create/share', 'QuizController@share');

Route::get('questions/edit/{id}', 'CreateQuizController@editQuestions');

Route::post('questions/edit/{id}', 'CreateQuizController@storeEditQuestions');

Route::get('questions/delete/{id}', 'CreateQuizController@deleteQuestions');


//
Route::get('social/{action?}', 'HybridAuthController@login');


//browse

Route::get('browse', 'BrowseController@categories');

Route::get('browse/categories/{name}', 'BrowseController@showCategory');

Route::get('browse/quizzes/all', 'BrowseController@allQuizzes');

Route::get('browse/quizzes/newest', 'BrowseController@newest');

Route::get('browse/quizzes/tags/{name}', 'BrowseController@byTags');

Route::get('browse/quizzes/most-dificult', 'BrowseController@dificult');

Route::get('browse/quizzes/easiest', 'BrowseController@easiest');

Route::get('browse/quizzes/{id}', 'BrowseController@showQuiz');

Route::post('browse/quizzes/{id}', 'TakeQuizController@takeQuiz');

Route::get('browse/tags', 'BrowseController@showTags');

Route::post('browse/tags', 'SearchController@searchTags');

Route::get('take/quiz', 'TakeQuizController@take');

Route::post('take/quiz', 'TakeQuizController@play');

Route::get('take/score', 'TakeQuizController@score');


Route::get('share', 'HybridAuthController@share');

Route::get('shareQuiz/{id}', 'HybridAuthController@shareQuiz');