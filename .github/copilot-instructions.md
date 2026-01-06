# Copilot / AI Agent Instructions for mini_project01

Purpose: Short, actionable guidance to get an AI agent productive in this repo (architecture, how to run locally, project conventions, and concrete examples).

## 🚀 Big picture
- Simple server-side PHP + static HTML/CSS project intended to run under XAMPP/Apache + MySQL (no framework). See `src/` for page sources and `public/` for static assets.
- Shared UI components live under `src/commons/` (e.g. `sidebar/`, `topbar/`). Pages are under `src/pages/<feature>/` (e.g. `src/pages/bookmark/`, `src/pages/main/`).
- Data persistence uses MySQL accessed directly via `mysqli` (see `src/pages/bookmark/bookmark.php`).

## 🧩 Key files & examples (use these as canonical examples)
- `src/pages/bookmark/bookmark.php`:
  - Handles file upload, SQL INSERT (raw string interpolation), image move to `public/images/`, and a redirect back to the same page.
  - DB connection: `mysqli_connect('localhost', 'root', '')` and `mysqli_select_db(..., 'book')` — the DB name `book` and table `bookmark` are expected.
  - Example SQL pattern: `INSERT INTO bookmark VALUES('$sitename', '$site', '$imagepath')` → indicates columns order: (sitename, site, image_path).
- `src/pages/main/main.html`:
  - Shows how shared CSS/JS are referenced relatively: `../../commons/global.css`, and images are referenced like `../../../public/images/imgPenguin.png`.

## ⚙️ How to run & test locally
1. Install XAMPP (Apache + MySQL) on your machine (Windows dev path used in this repo). Place project under XAMPP `htdocs` (this repo already assumes `c:\xampp\htdocs\project01\mini_project01`).
2. Start Apache and MySQL via XAMPP Control Panel.
3. Create the required database/table for bookmarks (quick SQL example):

```sql
CREATE DATABASE IF NOT EXISTS book;
USE book;
CREATE TABLE IF NOT EXISTS bookmark (
  sitename VARCHAR(255),
  site VARCHAR(255),
  image_path VARCHAR(512)
);
```

4. Open pages in browser (examples):
   - `http://localhost/mini_project01/src/pages/main/main.html`
   - `http://localhost/mini_project01/src/pages/bookmark/bookmark.php`

Notes: File upload moves files into `public/images/`, so ensure Apache has write permission to that folder.

## 🔧 Project conventions & gotchas (do not change without verification)
- Relative paths: many templates use relative paths with `..` segments. When moving files or refactoring, update these references (CSS/JS/image links) carefully.
- DB and auth: database is accessed directly from PHP files without prepared statements or sanitization — changes to these files should prioritize security (but document existing behavior if you are making an incremental change).
- Language/content: UI text and comments are in Korean; preserve UTF-8 encoding and existing Korean phrasing unless asked to translate.
- Common components: `src/commons/sidebar/sidebar.html` and `src/commons/sidebar/sidebar.css` are reusable building blocks—follow their structure when adding new pages.

## 🔎 Debugging tips
- If a PHP page shows a blank page, enable PHP error display in `php.ini` or check Apache error logs (XAMPP Control Panel → Logs) and enable `display_errors` for development.
- If image uploads don't appear, confirm `move_uploaded_file()` target (`public/images/`) exists and is writable, and verify the generated `image_path` in DB.
- SQL failures: check MySQL server is running and credentials (default in code: `root` / empty password) and that the `book` DB and `bookmark` table exist.

## 🧭 Branching & PR workflow (from `README.md`)
- Create local `dev` branch from `origin/dev`.
- Branch naming: `{type}/{yourname}-{what}` (e.g., `feature/lsg-login`, `fix/lsg-session`).
- PRs should target `dev` as base branch.

## ✅ What AI agents should do first (concrete tasks)
- Verify database creation script (add migration script if missing).
- Add a small README snippet for running the project locally (if you change environment assumptions).
- When editing SQL code: prefer using prepared statements and validate inputs; however, document existing SQL flow and test manually before replacing.

---
If anything above is unclear or you want more detail (e.g., more examples, tests, or recommendations to harden security), tell me which parts to expand and I will iterate. 💡