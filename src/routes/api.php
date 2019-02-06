<?php

Route::get('/webhook', 'EventController@handle')->name('facebook.webhook.verify')->middleware('verifyToken');
Route::post('/webhook', 'EventController@handle')->name('facebook.webhook.handle')->middleware('verifySignature');
