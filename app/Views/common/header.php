<?php

use Core\Helpers;

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>FAQ</title>
        <link rel="stylesheet" href="<?php echo Helpers::asset('css/style.css'); ?>">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
  $( function() {
    $( "#accordion" ).accordion();
  } );
  </script>
    </head>

    <body>
        <div id="wrapper">
            <header id="header">
                <h1 class="text-center">FAQ</h1>
                 
                 <div class="text-center">
 
                    <br/>
                    
                </div>
                <nav id="top-nav">
                    <ul class="main-menu fl">
                        <li><a href="<?php echo Helpers::path(); ?>" class="<?php echo Helpers::isCurrentURI() ? 'active' : ''; ?>">Home</a></li>
 
                        <li><a href="<?php echo Helpers::path('faq/list'); ?>" class="<?php echo Helpers::isCurrentURI('faq/list') ? 'active' : ''; ?>">FAQ</a></li>
                        
                    </ul>
                </nav>
            </header>

            <section id="content">



            
 
 
 
            

 
 
