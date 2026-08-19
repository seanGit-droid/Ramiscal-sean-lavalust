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

        .page-wrapper {
            max-width: 860px;
            margin: 48px auto 80px;
            padding: 0 2rem;
        }

        .profile-header {
            background: linear-gradient(135deg, var(--blue-600) 0%, var(--blue-500) 60%, var(--blue-400) 100%);
            border-radius: 20px;
            padding: 2.5rem;
            display: flex;
            align-items: center;
            gap: 2rem;
            margin-bottom: 2rem;
            color: #fff;
            box-shadow: 0 8px 32px rgba(37,99,235,0.25);
        }

        .avatar {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            background: rgba(255,255,255,0.25);
            border: 3px solid rgba(255,255,255,0.6);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            flex-shrink: 0;
        }

        .profile-header h1 {
            font-size: 1.75rem;
            font-weight: 800;
            letter-spacing: -0.02em;
            margin-bottom: 0.25rem;
        }

        .profile-header p {
            opacity: 0.85;
            font-size: 0.95rem;
            margin-bottom: 0.25rem;
        }

        .id-badge {
            display: inline-block;
            background: rgba(255,255,255,0.2);
            border: 1px solid rgba(255,255,255,0.4);
            border-radius: 999px;
            padding: 0.2rem 0.85rem;
            font-size: 0.8rem;
            font-weight: 600;
            margin-top: 0.5rem;
        }

        .bio-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 1.5rem 1.75rem;
            margin-bottom: 1.5rem;
            font-size: 0.975rem;
            line-height: 1.7;
            color: var(--muted);
            font-style: italic;
            border-left: 4px solid var(--blue-400);
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.25rem;
            margin-bottom: 1.5rem;
        }

        .section-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 1.5rem 1.75rem;
        }

        .section-card.full {
            grid-column: 1 / -1;
        }

        .section-label {
            font-size: 0.72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--blue-600);
            margin-bottom: 1rem;
        }

        .info-row {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            padding: 0.55rem 0;
            border-bottom: 1px solid var(--blue-50);
        }

        .info-row:last-child { border-bottom: none; }

        .info-label {
            font-size: 0.82rem;
            font-weight: 600;
            color: var(--muted);
            min-width: 110px;
            flex-shrink: 0;
        }

        .info-value {
            font-size: 0.9rem;
            font-weight: 500;
            color: var(--text);
        }

        .tag-list {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-top: 0.5rem;
        }

        .tag {
            background: var(--blue-50);
            border: 1px solid var(--blue-200);
            color: var(--blue-700);
            font-size: 0.8rem;
            font-weight: 600;
            padding: 0.3rem 0.85rem;
            border-radius: 999px;
        }

        .social-links {
            display: flex;
            gap: 0.75rem;
            flex-wrap: wrap;
            margin-top: 0.5rem;
        }

        .social-link {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--blue-600);
            background: var(--blue-50);
            border: 1px solid var(--blue-200);
            padding: 0.4rem 1rem;
            border-radius: 8px;
            transition: background 0.18s;
        }

        .social-link:hover { background: var(--blue-100); }

        footer {
            text-align: center;
            padding: 2rem;
            font-size: 0.82rem;
            color: var(--muted);
            border-top: 1px solid var(--blue-100);
        }

        @media (max-width: 600px) {
            .grid { grid-template-columns: 1fr; }
            .profile-header { flex-direction: column; text-align: center; }
            nav { padding: 0 1rem; }
            .page-wrapper { padding: 0 1rem; }
        }
    </style>
</head>
<body>

<nav>
    <a class="nav-brand" href="<?= site_url('student') ?>">📘 StudentHub</a>
    <div class="nav-links">
        <a href="<?= site_url('student') ?>">Home</a>
        <a href="<?= site_url('student/profile') ?>" class="active">Student Profile</a>
    </div>
</nav>

<div class="page-wrapper">

    <div class="profile-header">
        <div class="avatar">👤</div>
        <div>
            <h1><?= htmlspecialchars($student['name']) ?></h1>
            <p><?= htmlspecialchars($student['course']) ?></p>
            <p><?= htmlspecialchars($student['section']) ?> &nbsp;·&nbsp; <?= htmlspecialchars($student['year']) ?></p>
            <span class="id-badge"><?= htmlspecialchars($student['student_id']) ?></span>
        </div>
    </div>

    <div class="bio-card">
        "<?= htmlspecialchars($student['bio']) ?>"
    </div>

    <div class="grid">

        <div class="section-card">
            <div class="section-label">🎓 Academic Information</div>
            <div class="info-row">
                <span class="info-label">Student ID</span>
                <span class="info-value"><?= htmlspecialchars($student['student_id']) ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">Name</span>
                <span class="info-value"><?= htmlspecialchars($student['name']) ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">Course</span>
                <span class="info-value"><?= htmlspecialchars($student['course']) ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">Year Level</span>
                <span class="info-value"><?= htmlspecialchars($student['year']) ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">Section</span>
                <span class="info-value"><?= htmlspecialchars($student['section']) ?></span>
            </div>
        </div>

        <div class="section-card">
            <div class="section-label">📞 Contact Details</div>
            <div class="info-row">
                <span class="info-label">Email</span>
                <span class="info-value"><?= htmlspecialchars($student['email']) ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">Contact No.</span>
                <span class="info-value"><?= htmlspecialchars($student['contact']) ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">Address</span>
                <span class="info-value"><?= htmlspecialchars($student['address']) ?></span>
            </div>
        </div>

        <div class="section-card">
            <div class="section-label">⚡ Skills</div>
            <div class="tag-list">
                <?php foreach (explode(',', $student['skills']) as $skill): ?>
                    <span class="tag"><?= htmlspecialchars(trim($skill)) ?></span>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="section-card">
            <div class="section-label">🎮 Hobbies</div>
            <div class="tag-list">
                <?php foreach (explode(',', $student['hobbies']) as $hobby): ?>
                    <span class="tag"><?= htmlspecialchars(trim($hobby)) ?></span>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="section-card full">
            <div class="section-label">🌐 Social Media</div>
            <div class="social-links">
                <a class="social-link" href="https://www.tiktok.com/@<?= htmlspecialchars($student['tiktok']) ?>" target="_blank">
                    🎵 TikTok: @<?= htmlspecialchars($student['tiktok']) ?>
                </a>
                <a class="social-link" href="https://www.facebook.com/<?= urlencode($student['facebook']) ?>" target="_blank">
                    📘 Facebook: <?= htmlspecialchars($student['facebook']) ?>
                </a>
            </div>
        </div>

    </div>
</div>

<footer>
    Sean Ivan Ramiscal &nbsp;·&nbsp; MCC2024-00146 &nbsp;·&nbsp; BSIT 3-F2 &nbsp;·&nbsp; MinSU
</footer>

</body>
</html>
