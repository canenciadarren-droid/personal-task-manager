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
            font-family: Arial, Helvetica, sans-serif;
            background: #f1f5f9;
            color: #1e293b;
        }

        /* =========================
           NAVBAR
        ========================= */

        .navbar {
            background: #1e293b;
            color: white;
            padding: 18px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.15);
        }

        .navbar h1 {
            font-size: 24px;
        }

        .navbar span {
            color: #cbd5e1;
            font-size: 14px;
        }

        /* =========================
           MAIN CONTAINER
        ========================= */

        .container {
            width: 86%;
            max-width: 1250px;
            margin: 40px auto;
        }

        /* =========================
           HEADER
        ========================= */

        .top-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .top-section h2 {
            font-size: 30px;
            color: #0f172a;
        }

        .subtitle {
            color: #64748b;
            margin-top: 6px;
            font-size: 14px;
        }

        /* =========================
           ADD BUTTON
        ========================= */

        .add-btn {
            display: inline-block;
            background: #16a34a;
            color: white;
            padding: 13px 20px;
            text-decoration: none;
            border-radius: 9px;
            font-weight: bold;
            transition: 0.2s;
            box-shadow: 0 4px 10px rgba(22, 163, 74, 0.2);
        }

        .add-btn:hover {
            background: #15803d;
            transform: translateY(-2px);
        }

        /* =========================
           STATISTICS
        ========================= */

        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 22px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
            border-left: 5px solid #2563eb;
        }

        .stat-card.pending-card {
            border-left-color: #f59e0b;
        }

        .stat-card.completed-card {
            border-left-color: #16a34a;
        }

        .stat-title {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .stat-number {
            font-size: 30px;
            font-weight: bold;
            color: #0f172a;
        }

        /* =========================
           SUCCESS MESSAGE
        ========================= */

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 15px 18px;
            border-radius: 9px;
            margin-bottom: 20px;
            border: 1px solid #bbf7d0;
        }

        /* =========================
           TASK TABLE
        ========================= */

        .table-container {
            background: white;
            border-radius: 12px;
            overflow-x: auto;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.07);
        }

        .task-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 850px;
        }

        .task-table th {
            background: #1e293b;
            color: white;
            padding: 16px;
            text-align: left;
            font-size: 14px;
        }

        .task-table td {
            padding: 16px;
            border-bottom: 1px solid #e5e7eb;
            vertical-align: middle;
        }

        .task-table tbody tr {
            transition: 0.2s;
        }

        .task-table tbody tr:hover {
            background: #f8fafc;
        }

        .task-name {
            font-weight: bold;
            color: #0f172a;
        }

        .description {
            color: #64748b;
            max-width: 250px;
        }

        /* =========================
           STATUS
        ========================= */

        .status {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
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

        /* =========================
           ACTION BUTTONS
        ========================= */

        .actions {
            display: flex;
            gap: 7px;
            align-items: center;
        }

        .btn {
            padding: 8px 12px;
            border-radius: 7px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 12px;
            font-weight: bold;
            transition: 0.2s;
        }

        .btn:hover {
            transform: translateY(-1px);
        }

        .view-btn {
            background: #e0f2fe;
            color: #0369a1;
        }

        .view-btn:hover {
            background: #bae6fd;
        }

        .edit-btn {
            background: #fef3c7;
            color: #92400e;
        }

        .edit-btn:hover {
            background: #fde68a;
        }

        .delete-btn {
            background: #fee2e2;
            color: #b91c1c;
        }

        .delete-btn:hover {
            background: #fecaca;
        }

        /* =========================
           EMPTY STATE
        ========================= */

        .empty {
            text-align: center;
            padding: 70px 30px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.07);
        }

        .empty-icon {
            font-size: 55px;
            margin-bottom: 15px;
        }

        .empty h3 {
            font-size: 22px;
            margin-bottom: 8px;
            color: #0f172a;
        }

        .empty p {
            color: #64748b;
            margin-bottom: 25px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 768px) {

            .navbar {
                padding: 16px 5%;
            }

            .navbar h1 {
                font-size: 19px;
            }

            .navbar span {
                display: none;
            }

            .container {
                width: 92%;
                margin: 25px auto;
            }

            .top-section {
                flex-direction: column;
                align-items: flex-start;
                gap: 18px;
            }

            .top-section h2 {
                font-size: 26px;
            }

            .add-btn {
                width: 100%;
                text-align: center;
            }

            .stats {
                grid-template-columns: 1fr;
                gap: 12px;
            }

            .stat-card {
                padding: 18px;
            }

            .table-container {
                overflow-x: auto;
            }

            .actions {
                flex-wrap: wrap;
            }
        }
    </style>
</head>

<body>

    <!-- =========================
         NAVBAR
    ========================= -->

    <nav class="navbar">

        <h1>📋 Personal Task Manager</h1>

        <span>Laravel Project</span>

    </nav>


    <!-- =========================
         MAIN CONTENT
    ========================= -->

    <div class="container">

        <!-- PAGE HEADER -->

        <div class="top-section">

            <div>

                <h2>My Tasks</h2>

                <p class="subtitle">
                    Organize your work and keep track of your progress.
                </p>

            </div>

            <a href="/tasks/create" class="add-btn">
                + Add Task
            </a>

        </div>


        <!-- =========================
             STATISTICS
        ========================= -->

        @php
            $totalTasks = $tasks->count();
            $pendingTasks = $tasks->where('status', 'Pending')->count();
            $completedTasks = $tasks->where('status', 'Completed')->count();
        @endphp

        <div class="stats">

            <div class="stat-card">

                <div class="stat-title">
                    Total Tasks
                </div>

                <div class="stat-number">
                    {{ $totalTasks }}
                </div>

            </div>


            <div class="stat-card pending-card">

                <div class="stat-title">
                    Pending Tasks
                </div>

                <div class="stat-number">
                    {{ $pendingTasks }}
                </div>

            </div>


            <div class="stat-card completed-card">

                <div class="stat-title">
                    Completed Tasks
                </div>

                <div class="stat-number">
                    {{ $completedTasks }}
                </div>

            </div>

        </div>


        <!-- =========================
             SUCCESS MESSAGE
        ========================= -->

        @if(session('success'))

            <div class="success">
                ✅ {{ session('success') }}
            </div>

        @endif


        <!-- TASK LIST-->

        @if($tasks->count() > 0)

            <div class="table-container">

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

                                <!-- ID -->

                                <td>
                                    {{ $task->id }}
                                </td>


                                <!-- TASK NAME -->

                                <td>

                                    <div class="task-name">
                                        {{ $task->task_name }}
                                    </div>

                                </td>


                                <!-- DESCRIPTION -->

                                <td>

                                    <div class="description">
                                        {{ $task->description ?? 'No description' }}
                                    </div>

                                </td>


                                <!-- STATUS -->

                                <td>

                                    @if($task->status === 'Completed')

                                        <span class="status completed">
                                            ✓ Completed
                                        </span>

                                    @else

                                        <span class="status pending">
                                            ● Pending
                                        </span>

                                    @endif

                                </td>


                                <!-- DUE DATE -->

                                <td>

                                    {{ $task->due_date
                                        ? $task->due_date->format('M d, Y')
                                        : 'No deadline'
                                    }}

                                </td>


                                <!-- ACTIONS -->

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

            </div>

        @else

            <!-- EMPTY STATE-->

            <div class="empty">

                <div class="empty-icon">
                    📭
                </div>

                <h3>
                    No tasks yet
                </h3>

                <p>
                    You haven't added any tasks. Start by creating your first one!
                </p>

                <a href="/tasks/create" class="add-btn">
                    + Create Your First Task
                </a>

            </div>

        @endif

    </div>

</body>

</html>