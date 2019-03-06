<?php

/**
 * List of route paths
 */

assign('homepage.index ->> /', '/cms/WelcomeCtrl::index');
assign('registration.index  ->> /register', 'RegistrationCtrl::index');
post  ('registration.store  ->> /register/store', 'RegistrationCtrl::store');



/** Routes for App **/
assign('app.home.dash   ->> /app', 'AppCtrl::index');

assign('app.docs.index  ->> /app/docs', 'DocsCtrl::index');
assign('app.docs.fetch  ->> /app/docs/fetch', 'DocsCtrl::fetch');
assign('app.docs.upload ->> /app/docs/upload', 'DocsCtrl::upload');
post  ('app.docs.store  ->> /app/docs/store', 'DocsCtrl::store');
assign('app.docs.download->> /app/docs/download/:id', 'DocsCtrl::download');
assign('app.docs.destroy ->> /app/docs/destroy/:id', 'DocsCtrl::destroy');

assign('app.pds.index   ->> /app/pds', 'PdsCtrl::index');
assign('app.pds.create  ->> /app/pds/create/:page', 'PdsCtrl::create');
assign('app.pds.guide   ->> /app/cce/guidelines', 'PdsCtrl::guide');
post  ('app.pds.store   ->> /app/pds/store/:page', 'PdsCtrl::store');
post  ('app.pds.ajax    ->> /app/pds/ajax', 'PdsCtrl::ajax');
assign('app.pds.destroy ->> /app/pds/destroy/:model/:id', 'PdsCtrl::destroy');
assign('app.pds.print   ->> /app/pds/print', 'PdsCtrl::information');
assign('app.pds.eval    ->> /app/pds/evaluations', 'PdsCtrl::evaluations');
assign('app.pds.showEval->> /app/pds/evaluations/:id', 'PdsCtrl::showEval');
assign('app.pds.printeval->> /app/pds/evaluations/print/:id', 'PdsCtrl::printEval');












/** Administrator Routes **/
assign('admin.home.index   ->> /admin', '/admin/AdminCtrl::index');

assign('admin.docs.index   ->> /admin/docs', '/admin/DocsCtrl::index');
assign('admin.docs.fetch   ->> /admin/docs/fetch', '/admin/DocsCtrl::fetch');
assign('admin.docs.fetchID ->> /admin/docs/fetchID/:id', '/admin/DocsCtrl::fetchID');
assign('admin.docs.upload  ->> /admin/docs/upload', '/admin/DocsCtrl::upload');
post  ('admin.docs.store   ->> /admin/docs/store', '/admin/DocsCtrl::store');
assign('admin.docs.download->> /admin/docs/download/:id', '/admin/DocsCtrl::download');
assign('admin.docs.destroy ->> /admin/docs/destroy/:id', '/admin/DocsCtrl::destroy');



/************ PDS ***************/
assign('admin.pds.index   ->> /admin/pds', '/admin/PdsCtrl::index');
assign('admin.pds.fetch   ->> /admin/pds/fetch', '/admin/PdsCtrl::fetch');
assign('admin.pds.guide   ->> /admin/cce/guidelines', '/admin/PdsCtrl::guide');
assign('admin.pds.print   ->> /admin/pds/print/:id', '/admin/PdsCtrl::information');
assign('admin.pds.search  ->> /admin/pds/search/:id', '/admin/PdsCtrl::search');
assign('admin.pds.toggle  ->> /admin/pds/toggle/:model/:id/:returnId', '/admin/PdsCtrl::toggle');
post  ('admin.pds.rate    ->> /admin/pds/rate', '/admin/PdsCtrl::rate');
assign('admin.pds.evaluate->> /admin/pds/evaluate/:id', '/admin/PdsCtrl::evaluate');
assign('admin.pds.ratings ->> /admin/pds/rating/:id', '/admin/PdsCtrl::showRating');
assign('admin.pds.rateprnt->> /admin/pds/rating/print/:id', '/admin/PdsCtrl::printRating');
assign('admin.pds.showcce ->> /admin/pds/pasuc/cce/:id', '/admin/PdsCtrl::showCCE');
assign('admin.pds.cceprnt ->> /admin/pds/pasuc/cce/:id/:print', '/admin/PdsCtrl::printCCE');
assign('admin.pds.report  ->> /admin/pds/report', '/admin/PdsCtrl::report');
assign('admin.pds.reportPr->> /admin/pds/report/print', '/admin/PdsCtrl::printReport');




/************ Logs ***************/
assign('admin.logs.index ->> /admin/activity', '/admin/ActivityCtrl::index()');
assign('admin.logs.fetch ->> /admin/activity/fetch', '/admin/ActivityCtrl::fetch()');



/************ Users ***************/

assign('admin.users.index    ->> /admin/users', '/admin/UsersCtrl::index()');
assign('admin.users.fetch    ->> /admin/users/fetch', '/admin/UsersCtrl::fetch()');
assign('admin.users.create   ->> /admin/users/new', '/admin/UsersCtrl::create()');
assign('admin.users.store    ->> /admin/users/store', '/admin/UsersCtrl::store()');
assign('admin.users.edit     ->> /admin/users/edit-profile', '/admin/UsersCtrl::edit()');
assign('admin.users.update   ->> /admin/users/update', '/admin/UsersCtrl::update()');
assign('admin.users.activate ->> /admin/users/activate/:id', '/admin/UsersCtrl::activate()');
assign('admin.users.password ->> /admin/users/change-my-password', '/admin/UsersCtrl::changePassword()');
assign('admin.users.savePass ->> /admin/users/save-password', '/admin/UsersCtrl::savePassword()');













/**
 * Authentication routes
 */
assign('auth.login  ->> /login', 'AuthCtrl::index');
post('auth.attempt  ->> /attempt', 'AuthCtrl::attempt');
assign('auth.logout ->> /logout', 'AuthCtrl::logout');
