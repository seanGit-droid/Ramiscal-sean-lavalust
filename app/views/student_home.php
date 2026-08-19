<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --blue-50:  #eff6ff;
            --blue-100: #dbeafe;
            --blue-200: #bfdbfe;
            --blue-400: #60a5fa;
            --blue-500: #3b82f6;
            --blue-600: #2563eb;
            --blue-700: #1d4ed8;
            --bg:       #f0f7ff;
            --surface:  #ffffff;
            --border:   #bfdbfe;
            --text:     #0f172a;
            --muted:    #475569;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
        }

        nav {
            background: var(--surface);
            border-bottom: 2px solid var(--blue-200);
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 64px;
            box-shadow: 0 1px 8px rgba(59,130,246,0.08);
        }

        .nav-brand {
            font-weight: 800;
            font-size: 1.15rem;
            color: var(--blue-600);
            letter-spacing: -0.02em;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }

        .nav-links a {
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            color: var(--muted);
            padding: 0.4rem 1rem;
            border-radius: 8px;
            transition: background 0.18s, color 0.18s;
        }

        .nav-links a:hover,
        .nav-links a.active {
            background: var(--blue-100);
            color: var(--blue-700);
        }

        .hero {
            max-width: 800px;
            margin: 80px auto 0;
            padding: 0 2rem;
            text-align: center;
        }

        .badge {
            display: inline-block;
            background: var(--blue-100);
            color: var(--blue-700);
            font-size: 0.78rem;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            padding: 0.35rem 1rem;
            border-radius: 999px;
            border: 1px solid var(--blue-200);
            margin-bottom: 1.5rem;
        }

        .hero h1 {
            font-size: clamp(2.2rem, 6vw, 3.8rem);
            font-weight: 800;
            letter-spacing: -0.04em;
            line-height: 1.1;
            margin-bottom: 1rem;
            color: var(--text);
        }

        .hero h1 span {
            color: var(--blue-600);
        }

        .hero p {
            font-size: 1.1rem;
            color: var(--muted);
            max-width: 520px;
            margin: 0 auto 2.5rem;
            line-height: 1.7;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.75rem 1.75rem;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.95rem;
            text-decoration: none;
            transition: all 0.18s;
        }

        .btn-primary {
            background: var(--blue-600);
            color: #fff;
            box-shadow: 0 4px 16px rgba(37,99,235,0.25);
        }

        .btn-primary:hover {
            background: var(--blue-700);
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(37,99,235,0.35);
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1.25rem;
            max-width: 900px;
            margin: 56px auto 80px;
            padding: 0 2rem;
        }

        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 1.75rem;
            transition: box-shadow 0.18s, transform 0.18s;
        }

        .card:hover {
            box-shadow: 0 8px 30px rgba(59,130,246,0.12);
            transform: translateY(-3px);
        }

        .card-icon {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .card h3 {
            font-size: 1rem;
            font-weight: 700;
            margin-bottom: 0.4rem;
            color: var(--text);
        }

        .card p {
            font-size: 0.875rem;
            color: var(--muted);
            line-height: 1.6;
        }

        footer {
            text-align: center;
            padding: 2rem;
            font-size: 0.82rem;
            color: var(--muted);
            border-top: 1px solid var(--blue-100);
        }

        @media (max-width: 600px) {
            nav { padding: 0 1rem; }
            .cards { padding: 0 1rem; }
        }
    </style>
</head>
<body>

<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
<?php if (!empty($_SESSION['access_error'])): ?>
<div style="background:#fef2f2;border-bottom:2px solid #fecaca;padding:1rem 2rem;display:flex;align-items:flex-start;gap:1rem;font-family:'Inter',sans-serif;">
    <span style="font-size:1.4rem;line-height:1;">🚫</span>
    <div>
        <strong style="display:block;color:#dc2626;font-size:0.8rem;text-transform:uppercase;letter-spacing:0.08em;margin-bottom:0.2rem;">Middleware Blocked — Access Denied</strong>
        <span style="color:#b91c1c;font-size:0.9rem;"><?= htmlspecialchars($_SESSION['access_error']) ?></span>
    </div>
</div>
<?php unset($_SESSION['access_error']); ?>
<?php endif; ?>

<nav>
    <a class="nav-brand" href="<?= site_url('student') ?>">📘 StudentHub</a>
    <div class="nav-links">
        <a href="<?= site_url('student') ?>" class="active">Home</a>
        <a href="<?= site_url('student/profile') ?>">Student Profile</a>
    </div>
</nav>

<div class="hero">
    <div class="badge">BSIT 3-F2 &nbsp;·&nbsp; MCC 2024</div>
    <h1>Welcome to <span>Student</span>Hub</h1>
    <p>Your personal information portal — built with LavaLust MVC framework. Clean, modern, and made by Sean Ivan Ramiscal.</p>
    <a href="<?= site_url('student/profile') ?>" class="btn btn-primary">View My Profile →</a>
</div>

<div class="cards">
    <div class="card">
        <div class="card-icon">🎓</div>
        <h3>Academic Info</h3>
        <p>View student ID, course, year level, and section details at a glance.</p>
    </div>
    <div class="card">
        <div class="card-icon">👤</div>
        <h3>Personal Profile</h3>
        <p>Name, contact number, address, and a short bio in one page.</p>
    </div>
    <div class="card">
        <div class="card-icon">✨</div>
        <h3>Interests & Skills</h3>
        <p>Hobbies, technical skills, and social media all listed clearly.</p>
    </div>
    <div class="card">
        <div class="card-icon">🔒</div>
        <h3>Protected Route</h3>
        <p>The profile page is secured with StudentMiddleware before access is granted.</p>
    </div>
</div>

<footer>
    Sean Ivan Ramiscal &nbsp;·&nbsp; MCC2024-00146 &nbsp;·&nbsp; BSIT 3-F2 &nbsp;·&nbsp; MinSU
</footer>

</body>
</html>
