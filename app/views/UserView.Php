<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Directory</title>
    <style>
        :root {
            --paper: #FAF7F0;
            --ink: #221F1A;
            --accent: #7A2E2E;
            --rule: #C9C0AC;
            --rule-faint: #E4DECD;
            --muted: #7A7566;
            --row-tint: #F2EDE1;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            padding: 56px 24px 80px;
            background: var(--paper);
            color: var(--ink);
            font-family: -apple-system, "Segoe UI", "Helvetica Neue", Arial, sans-serif;
            font-size: 15px;
            line-height: 1.5;
        }

        .sheet {
            max-width: 760px;
            margin: 0 auto;
        }

        /* Letterhead */
        .letterhead {
            display: flex;
            align-items: baseline;
            justify-content: space-between;
            padding-bottom: 18px;
            border-bottom: 3px double var(--rule);
        }

        .letterhead .mark {
            width: 34px;
            height: 34px;
            border: 1.5px solid var(--accent);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Georgia, "Iowan Old Style", "Times New Roman", serif;
            font-size: 15px;
            color: var(--accent);
            flex-shrink: 0;
        }

        .letterhead h1 {
            font-family: Georgia, "Iowan Old Style", "Times New Roman", serif;
            font-weight: 400;
            font-size: 30px;
            letter-spacing: 0.2px;
            margin: 0 0 0 16px;
            flex: 1;
        }

        .letterhead .count {
            font-size: 13px;
            color: var(--muted);
            white-space: nowrap;
            padding-left: 16px;
        }

        .letterhead .count strong {
            color: var(--accent);
            font-weight: 600;
        }

        .dek {
            margin: 14px 0 36px;
            color: var(--muted);
            font-size: 14px;
            max-width: 52ch;
        }

        /* Ledger table */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead th {
            text-align: left;
            font-weight: 600;
            font-size: 13px;
            color: var(--ink);
            padding: 0 14px 10px;
            border-bottom: 1.5px solid var(--ink);
        }

        thead th.num,
        tbody td.num {
            text-align: right;
        }

        tbody td {
            padding: 13px 14px;
            border-bottom: 1px solid var(--rule-faint);
            vertical-align: baseline;
        }

        tbody tr:nth-child(even) {
            background: var(--row-tint);
        }

        tbody td.num {
            color: var(--accent);
            font-variant-numeric: tabular-nums;
            width: 64px;
            white-space: nowrap;
        }

        tbody td.name {
            font-weight: 600;
        }

        tbody td.email,
        tbody td.username {
            color: var(--muted);
        }

        tbody td.username::before {
            content: "@";
            color: var(--rule);
        }

        .empty td {
            padding: 32px 14px;
            text-align: center;
            color: var(--muted);
            font-style: italic;
        }

        /* Footer */
        .colophon {
            margin-top: 40px;
            padding-top: 16px;
            border-top: 1px solid var(--rule);
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 13px;
            color: var(--muted);
        }

        .colophon a {
            color: var(--accent);
            text-decoration: none;
            border-bottom: 1px solid transparent;
        }

        .colophon a:hover,
        .colophon a:focus-visible {
            border-bottom-color: var(--accent);
        }

        a:focus-visible,
        .letterhead .mark:focus-visible {
            outline: 2px solid var(--accent);
            outline-offset: 2px;
        }

        @media (max-width: 520px) {
            body { padding: 36px 16px 60px; }
            .letterhead h1 { font-size: 24px; }
            .letterhead .count { display: none; }
            thead th.email, tbody td.email { display: none; }
        }

        @media (prefers-reduced-motion: reduce) {
            * { transition: none !important; }
        }
    </style>
</head>
<body>

    <div class="sheet">

        <header class="letterhead">
            <span class="mark" aria-hidden="true">U</span>
            <h1>User Directory</h1>
            <span class="count">
                <?php $total = !empty($users) ? count($users) : 0; ?>
                <strong><?= $total; ?></strong> record<?= $total === 1 ? '' : 's'; ?>
            </span>
        </header>

        <p class="dek">Every account currently on file, in the order it was registered.</p>

        <table>
            <thead>
                <tr>
                    <th class="num">No.</th>
                    <th>Name</th>
                    <th class="email">Email</th>
                    <th>Username</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($users)) : ?>
                    <?php foreach ($users as $i => $user) : ?>
                        <tr>
                            <td class="num"><?= str_pad($i + 1, 2, '0', STR_PAD_LEFT); ?></td>
                            <td class="name"><?= $user['firstname'] . ' ' . $user['lastname']; ?></td>
                            <td class="email"><?= $user['email']; ?></td>
                            <td class="username"><?= $user['username']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr class="empty">
                        <td colspan="4">No records yet. New accounts will appear here once added.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <footer class="colophon">
            <span>Generated from the users table</span>
            <a href="<?= site_url('/'); ?>">Back to home</a>
        </footer>

    </div>

</body>
</html>