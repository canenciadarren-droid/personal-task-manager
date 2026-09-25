<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>View Task</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            color: #333;
        }

        .navbar {
            background: #2563eb;
            color: white;
            padding: 20px 8%;
        }

        .navbar h1 {
            font-size: 24px;
        }

        .container {
            width: 84%;
            max-width: 800px;
            margin: 50px auto;
        }

        .card {
            background: white;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .card h2 {
            font-size: 30px;
            color: #1e293b;
            margin-bottom: 25px;
        }

        .info {
            margin-bottom: 20px;
        }

        .info strong {
            display: block;
            color: #64748b;
            font-size: 14px;
            margin-bottom: 6px;
        }

        .info p {
            font-size: 18px;
            color: #1e293b;
        }

        .status {
            display: inline-block;
            padding: 7px 14px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
        }

        .pending {
            background: #fef3c7;
            color: #92400e;
        }

        .completed {
            background: #dcfce7;
            color: #166534;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 30px;
        }

        .btn {
            padding: 11px 18px;
            border-radius: 7px;
            text-decoration: none;
            font-weight: bold;
        }

        .back {
            background: #e5e7eb;
            color: #374151;
        }

        .edit {
            background: #2563eb;
            color: white;
        }

        .back:hover {
            background: #d1d5db;
        }

        .edit:hover {
            background: #1d4ed8;
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <h1>📋 Personal Task Manager</h1>
    </nav>

    <div class="container">

        <div class="card">

            <h2>{{ $task->task_name }}</h2>

            <div class="info">
                <strong>Description</strong>

                <p>
                    {{ $task->description ?? 'No description provided.' }}
                </p>
            </div>

            <div class="info">
                <strong>Status</strong>

                @if($task->status === 'Completed')
                    <span class="status completed">
                        Completed
                    </span>
                @else
                    <span class="status pending">
                        Pending
                    </span>
                @endif
            </div>

            <div class="info">
                <strong>Due Date</strong>

                <p>
                    {{ $task->due_date ? $task->due_date->format('F d, Y') : 'No deadline' }}
                </p>
            </div>

            <div class="buttons">

                <a href="/tasks" class="btn back">
                    ← Back to Tasks
                </a>

                <a href="/tasks/{{ $task->id }}/edit" class="btn edit">
                    Edit Task
                </a>

            </div>

        </div>

    </div>

</body>
</html>