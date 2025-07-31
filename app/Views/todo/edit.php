<!DOCTYPE html>
<html>
<head><title>Edit Task</title></head>
<body>
    <h1>Edit Task</h1>
    <form action="/todo/update/<?= $todo['id'] ?>" method="post">
        <input type="text" name="task" value="<?= esc($todo['task']) ?>" required>
        <label>
            <input type="checkbox" name="is_done" value="1" <?= $todo['is_done'] ? 'checked' : '' ?>> Done
        </label>
        <button type="submit">Update</button>
    </form>
    <a href="/todo">Back to List</a>
</body>
</html>
