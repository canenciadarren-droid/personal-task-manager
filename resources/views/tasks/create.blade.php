<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create Task</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            margin: 0;
            padding: 0;
        }

        .header {
            background: #2d3952;
            color: white;
            padding: 20px 8%;
            font-size: 24px;
            font-weight: bold;
        }

        .container {
            max-width: 700px;
            margin: 50px auto;
            background: white;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        h1 {
            margin-top: 0;
            color: #1e293b;
        }

        label {
            display: block;
            margin-top: 20px;
            margin-bottom: 8px;
            font-weight: bold;
            color: #334155;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 16px;
        }

        textarea {
            height: 120px;
            resize: vertical;
        }

        .buttons {
            margin-top: 25px;
            display: flex;
            gap: 10px;
        }

        button,
        .back {
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
        }

        button {
            background: #14ac0f;
            color: white;
        }

        .back {
            background: #e2e8f0;
            color: #1e293b;
        }

        button:hover {
            background: #1d4ed8;
        }
    </style>
</head>

<body>

    <div class="header">
        📋 Personal Task Manager
    </div>

    <div class="container">

        <h1>Create New Task</h1>

        <form action="/tasks" method="POST">

            @csrf

            <label for="task_name">Task Name</label>

            <input
                type="text"
                id="task_name"
                name="task_name"
                placeholder="Enter task name"
                required
            >

            <label for="description">Description</label>

            <textarea
                id="description"
                name="description"
                placeholder="Enter task description"
            ></textarea>

            <label for="status">Status</label>

            <select id="status" name="status">

                <option value="Pending">Pending</option>
                <option value="Completed">Completed</option>

            </select>

            <label for="due_date">Due Date</label>

            <input
                type="date"
                id="due_date"
                name="due_date"
            >

            <div class="buttons">

                <button type="submit">
                    Create Task
                </button>

                <a href="/tasks" class="back">
                    Cancel
                </a>

            </div>

        </form>

    </div>

</body>
</html>