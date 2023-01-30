<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ url('css/task.css') }}" rel="stylesheet" />
    <link href="{{ url('css/site.css') }}" rel="stylesheet" />
    <title>@yield('title')</title>
    @yield('in_head')
</head>
<script>
function get_late_tasks()
{
    const current_time = Date.now()
    const required_delta = 10*60*1000 // 10 minutes in milliseconds

    let tasks_times_tags = [];
    [].push.apply(tasks_times_tags, document.getElementsByClassName("end-time"));

    let tasks_ids = [];
    [].push.apply(tasks_ids, document.getElementsByClassName("task-id"));

    let late_tasks = [];

    for (let i = 0; i < tasks_times_tags.length; i++) {
        if (!tasks_ids[i] || !tasks_times_tags[i])
            continue;

        const end_time = Date.parse(tasks_times_tags[i].innerHTML.substr(10))
        const task_id = tasks_ids[i].innerHTML

        if (end_time - current_time <= required_delta)
            late_tasks.push(task_id)
    }

    if(!late_tasks.length)
        return;

    message = "Hurry up for following tasks\n" + late_tasks[0];

    for (let i = 1; i < late_tasks.length; i++)
        message += ", " + late_tasks[i];

    alert(message)
}

setInterval(() => {
    get_late_tasks();
}, 10000);

</script>
<body>
    <nav class="nav navbar  navbar-light bg-light" style="background-color:gray">
    <div class="nav-flex-main" id="navbarText">
        <span class="nav-flex">
        <div class="navbar-brand" style="margin-right: 30px;">To do list</div>
        <ul class="navbar-nav " style="margin-right:auto">
        <li class="nav-item active"style="display:flex; align-items:center">
            <a class="nav-link" href="{{ route('task.index') }}" style="margin-right: 10px;"><button class="btn btn-primary" >Tasks</button><span class="sr-only"></a>
            <a class="nav-link" href="{{ route('task.create') }}"><button class="btn btn-primary">New task</button><span class="sr-only"></a>
        </li>
        </ul>
        </span>
        <span class="navbar-text" style="display: flex">
            <a class="nav-link" href="{{ route('user.edit', ['request' => $request, 'user' => $request->session()->get('user_id')]) }}">Profile</a>
            <a href="{{ route('user.logout') }}" class="btn btn-primary">Logout</a>
        </span>
    </div>
    </nav>
    <div id="content" class="content">
        @yield('content')
    </div>
    @yield('message')
</body>
</html>