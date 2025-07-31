<!DOCTYPE html>
<html>
<head><title>Add Task</title></head>
<body>
    <h1>Add New Task</h1>
    <form action="/todo/store" method="post">
        <input type="text" name="task" placeholder="Enter task..." required>
        <button type="submit">Save</button>
    </form>
    <a href="/todo">Back to List</a>
</body>
</html>
