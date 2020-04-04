<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/styles.css">
    <title>Timer</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-4 text-center">
                <input class="form-control" type="text"  id="task-name">
            </div>
            <div class="col-xs-12 col-md-2 text-center" id="button-row">
                <input id="start-btn" class="btn btn-success" type="button" value="Start">
                <input id="stop-btn" class="btn btn-danger" type="button" value="Stop" disabled>
            </div>
            <div class="text-center col-xs-12 col-md-6">
                <h1 id="time">00:00:00</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-6 text-center">
                <h2>Tasks</h2>
                <table class="table" id="tasks_table">
                    <thead>
                        <th scope="col">Task</th>
                        <th scope="col">Total time</th>
                    </thead>
                </table>
                
            </div>
            <div class="col-xs-12 col-md-6 text-center">
                <h2>Todays time worked <span id="today-time">00:00:00<span></h2>
            </div>
        </div>
    </div>
    <script
			  src="https://code.jquery.com/jquery-3.4.1.min.js"
			  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			  crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script type='text/javascript' src="<?php echo base_url(); ?>js/scripts.js"></script>
</body>
</html>