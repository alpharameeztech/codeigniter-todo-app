<!DOCTYPE html>
<html>
<head><title>Todo List</title></head>
<body>
    <h1>Todo List</h1>
    <a href="/todo/create">+ Add Task</a>
    <hr>
    <?php if (!empty($todos)): ?>
        <ul>
            <?php foreach ($todos as $todo): ?>
                <li>
                    <?= $todo['task'] ?> <?= $todo['is_done'] ? '(Done)' : '' ?>
                    <a href="/todo/edit/<?= $todo['id'] ?>">[Edit]</a>
                    <a href="/todo/delete/<?= $todo['id'] ?>" onclick="return confirm('Delete this task?')">[Delete]</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No tasks found.</p>
    <?php endif; ?>
</body>
</html>
