$(document).ready(function(){
    var interval = null;
    var time = 0;
    get_tasks();
    get_today_time();

    $('#start-btn').click(function(){
        var task_name = $('#task-name').val();
        if(task_name.length > 0){
        
            $('#start-btn').prop('disabled', true);
            $('#stop-btn').prop('disabled', false);
            $('#task-name').prop('disabled', true);

            $.ajax({
                url:'start',
                method: 'POST',
                data:{
                    name:task_name
                }
            });

            interval = setInterval(function(){ 
                time++;
                $('#time').text(secondsToTime(time));
            }, 1000);
        }else{
            alert("Please set a task name");
        }
    });

    $('#stop-btn').click(function(){
        clearInterval(interval);
        var task_name = $('#task-name').val();
        var task_time =  $('#time').text();
        $('#start-btn').prop('disabled', false);
        $('#stop-btn').prop('disabled', true);
        $('#task-name').prop('disabled', false);
        $('#task-name').val("");
        $('#time').text("00:00:00");
        $.ajax({
            url:'stop',
            method: 'POST',
            data:{
                name:task_name,
                time:time
            }
        });
        time = 0;
        get_tasks();
        get_today_time();
        alert("You have worked "+task_time+" on "+task_name);
    });

    function secondsToTime(timeInSeconds){
        var hours = Math.floor(timeInSeconds/3600);
        hours = (hours < 10)? '0' + hours : hours;
        var minutes = Math.floor((timeInSeconds / 60) % 60);
        minutes = (minutes < 10)? '0' + minutes : minutes;
        var seconds = timeInSeconds % 60;
        seconds = (seconds < 10)? '0' + seconds : seconds;

        return hours+":"+minutes+":"+seconds;
    }

    function get_tasks(){
        $.ajax({
            url:'get_all',
            method:'GET'
        }).done(function(response){
            $('tbody').remove();
            var task_list = jQuery.parseJSON(response);
            var html_tbody = '<tbody>';
            task_list.forEach(function(task){
                html_tbody += "<tr><td>"+task.name+"</td><td>"+secondsToTime(task.elapsed_time)+"</td>";
            });
            html_tbody += '</tbody>';
            $('#tasks_table').append(html_tbody);
        });
    }

    function get_today_time(){
        $.ajax({
            url:'todays_work',
            method:'GET'
        }).done(function(response){
            $('#today-time').text(secondsToTime(response));
        });
    }
});
