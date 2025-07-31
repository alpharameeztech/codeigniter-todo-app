# 📝 CodeIgniter 4 Todo App

A clean and modern Todo app built with [CodeIgniter 4](https://codeigniter.com/) — showcasing CRUD functionality, charts, pagination, dark/light mode toggle, unit tests, and a sleek UI.

![Todo App - Light Mode](/public/screenshots/todo-light.png)

---

## 🚀 Features

- ✅ CRUD (Create, Read, Update, Delete) for todos
- 📊 Chart.js dashboards (Doughnut, Bar, Horizontal Bar)
- 🌙 Dark / ☀️ Light mode with localStorage support
- 🧪 Unit Testing using PHPUnit + SQLite memory
- 🧰 Server-side validation with CodeIgniter's validator
- 📄 Pagination with custom Bootstrap UI
- 📱 Responsive layout using Bootstrap 5

---

## 📦 Tech Stack

- PHP 8+
- CodeIgniter 4
- Bootstrap 5
- Chart.js
- PHPUnit

---

## 📂 Project Structure

```
codeigniter-project/
├── app/
│   ├── Controllers/
│   ├── Models/
│   ├── Services/
│   ├── Views/
├── public/
│   └── screenshots/
├── tests/
│   └── app/Models/
├── writable/
├── .env
└── README.md
```

---

## ⚙️ Installation

```bash
git clone https://github.com/your-username/codeigniter-todo-app.git
cd codeigniter-todo-app
composer install
cp env .env
php spark key:generate
```

Update `.env`:

```
CI_ENVIRONMENT = development

database.default.hostname = 127.0.0.1
database.default.database = your_db_name
database.default.username = your_db_user
database.default.password = your_db_pass
```

Run migrations:

```bash
php spark migrate
```

Start local dev server:

```bash
php spark serve
```

Open: [http://localhost:8080/todo](http://localhost:8080/todo)

---

## 🧪 Run Unit Tests

```bash
CI_ENVIRONMENT=testing ./vendor/bin/phpunit
```

Tests will run using an in-memory SQLite database.

---

## 🌗 Dark & Light Mode

Easily toggle between light and dark themes using the 🌙 / ☀️ button in the top right. The theme preference is saved in your browser.

![Theme Toggle Preview](public/screenshots/theme-toggle.gif)

---

## ✅ Feature Checklist

- [x] Task creation & validation
- [x] Editable task with is_done toggle
- [x] Delete with confirmation
- [x] Statistics with Chart.js
- [x] Server-side validation
- [x] Pagination with Bootstrap styling
- [x] Dark/Light mode toggle
- [x] Footer & human-readable timestamps

---

## 🙌 Credits

Developed by [**Rameez Israr**](https://github.com/krameez56) with 💙 and 🏇.

---

## 📄 License

Open source under the [MIT License](LICENSE).
