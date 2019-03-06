<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US">
<head>
    <title>{{@$title}} &mdash; {{@APP_NAME}}</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="{{@$keywords}}">
    <meta name="description" content="{{@$description}}">
    <meta name="author" content="{{@$author}}">
    <link rel="stylesheet" href="/css/core.css">
    <link rel="stylesheet" href="/cms/css/cms.css">
    <link rel="stylesheet" href="/css/fontawesome.css">
    <link rel="stylesheet" href="/cms/tools/datatables/css/datatables.css">
</head>
<body>

<nav class="navbar navbar-inverse nbr">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">TUP App</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="/app/docs"><i class="fa fa-file"></i> Documents</a></li>
                <li><a href="/app/docs/upload"><i class="fa fa-upload"></i> Upload a file</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-newspaper-o"></i> Personal Data Sheet <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/app/pds">View Personal Data Sheet</a></li>
                        <li><a href="/app/pds/create/1">Edit my information</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="/app/pds/create/2">I have another Achievement!</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="/app/pds/evaluations">My Evaluations</a></li>
                        <li><a target="_blank" href="/app/pds/print">Print my PDS</a></li>
                    </ul>
                </li>
                <li><a href="/app/cce/guidelines"><i class="fa fa-info-circle"></i> CCE Guidelines</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><b>{{Session::get('client')->firstname}} {{Session::get('client')->lastname}}</b> ({{Session::get('client')->username}})</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cogs"></i> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="/logout">Sign me out</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<!--container-->
<div class="container">
    <span id="loader" class="hidden pull-right" style="font-size:12px;margin-top:20px">Loading
        <img class="npm" src="/cms/img/loading.gif" height="25" width="25"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </span>