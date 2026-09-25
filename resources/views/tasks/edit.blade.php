<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Task</title>

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
            max-width: 700px;
            margin: 40px auto;
        }

        .card {
            background: white;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        h2 {
            margin-bottom: 25px;
            color: #1e293b;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
            color: #374151;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 7px;
            font-size: 15px;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #2563eb;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        button,
        .back {
            padding: 12px 18px;
            border-radius: 7px;
            border: none;
            font-weight: bold;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
        }

        button {
            background: #2563eb;
            color: white;
        }

        button:hover {
            background: #1d4ed8;
        }

        .back {
            background: #e5e7eb;
            color: #374151;
        }

        .error {
            background: #fee2e2;
            color: #b91c1c;
            padding: 12px;
            border-radius: 7px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <h1>📋 Personal Task Manager</h1>
    </nav>

    <div class="container">

        <div class="card">

            <h2>✏️ Edit Task</h2>

            @if($errors->any())
                <div class="error">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/tasks/{{ $task->id }}" method="POST">

                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="task_name">Task Name</label>

                    <input
                        type="text"
                        id="task_name"
                        name="task_name"
                        value="{{ $task->task_name }}"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="description">Description</label>

                    <textarea
                        id="description"
                        name="description"
                    >{{ $task->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>

                    <select id="status" name="status" required>

                        <option
                            value="Pending"
                            {{ $task->status === 'Pending' ? 'selected' : '' }}
                        >
                            Pending
                        </option>

                        <option
                            value="Completed"
                            {{ $task->status === 'Completed' ? 'selected' : '' }}
                        >
                            Completed
                        </option>

                    </select>
                </div>

                <div class="form-group">
                    <label for="due_date">Due Date</label>

                    <input
                        type="date"
                        id="due_date"
                        name="due_date"
                        value="{{ $task->due_date ? $task->due_date->format('Y-m-d') : '' }}"
                    >
                </div>

                <div class="buttons">

                    <a href="/tasks" class="back">
                        ← Cancel
                    </a>

                    <button type="submit">
                        Update Task
                    </button>

                </div>

            </form>

        </div>

    </div>

</body>
</html>