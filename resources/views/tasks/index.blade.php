<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Personal Task Manager</title>

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
            background: #2d3952;
            color: white;
            padding: 20px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h1 {
            font-size: 24px;
        }

        .container {
            width: 84%;
            max-width: 1200px;
            margin: 40px auto;
        }

        .top-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .top-section h2 {
            font-size: 28px;
            color: #1e293b;
        }

        .add-btn {
            background: #14ac0f;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
        }

        .add-btn:hover {
            background: #1d4ed8;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .task-table {
            width: 100%;
            background: white;
            border-collapse: collapse;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .task-table th {
            background: #1e293b;
            color: white;
            padding: 15px;
            text-align: left;
        }

        .task-table td {
            padding: 15px;
            border-bottom: 1px solid #e5e7eb;
        }

        .task-table tr:hover {
            background: #f8fafc;
        }

        .status {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 13px;
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

        .actions {
            display: flex;
            gap: 8px;
        }

        .btn {
            padding: 7px 12px;
            border-radius: 6px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 13px;
        }

        .view-btn {
            background: #e0f2fe;
            color: #0369a1;
        }

        .edit-btn {
            background: #fef3c7;
            color: #92400e;
        }

        .delete-btn {
            background: #fee2e2;
            color: #b91c1c;
        }

        .empty {
            text-align: center;
            padding: 40px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        @media (max-width: 768px) {
            .container {
                width: 95%;
            }

            .top-section {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .task-table {
                font-size: 13px;
            }

            .task-table th,
            .task-table td {
                padding: 10px;
            }

            .actions {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <h1>📋 Personal Task Manager</h1>
        <span>Laravel Project</span>
    </nav>

    <div class="container">

        <div class="top-section">
            <h2>My Tasks</h2>

            <a href="/tasks/create" class="add-btn">
                 + Add Task
            </a>
        </div>

        @if(session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        @if($tasks->count() > 0)

            <table class="task-table">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Task</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Due Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($tasks as $task)

                        <tr>

                            <td>
                                {{ $task->id }}
                            </td>

                            <td>
                                <strong>{{ $task->task_name }}</strong>
                            </td>

                            <td>
                                {{ $task->description ?? 'No description' }}
                            </td>

                            <td>

                                @if($task->status === 'Completed')

                                    <span class="status completed">
                                        Completed
                                    </span>

                                @else

                                    <span class="status pending">
                                        Pending
                                    </span>

                                @endif

                            </td>

                            <td>
                                {{ $task->due_date ? $task->due_date->format('M d, Y') : 'No deadline' }}
                            </td>

                            <td>

                                <div class="actions">

                                    <a
                                        href="/tasks/{{ $task->id }}"
                                        class="btn view-btn"
                                    >   
                                        View
                                    </a>

                                    <a
                                        href="/tasks/{{ $task->id }}/edit"
                                        class="btn edit-btn"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="/tasks/{{ $task->id }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this task?');"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn delete-btn"
                                        >
                                            Delete
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        @else

            <div class="empty">

                <h3>No tasks yet 📭</h3>

                <p>
                    You haven't added any tasks.
                </p>

                <br>

               <a href="/tasks/create" class="add-btn">
                     Add Your First Task
                </a>

            </div>

        @endif

    </div>

</body>
</html>