<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>MDL | Security</title>
    <style>
        body { background: #0a0a0c; color: white; font-family: sans-serif; display: flex; height: 100vh; align-items: center; justify-content: center; margin: 0; }
        .login-card { background: #1a1a1c; padding: 40px; border-radius: 24px; border: 1px solid #2c2c2e; text-align: center; width: 300px; }
        input { width: 100%; padding: 12px; margin: 10px 0; border-radius: 10px; border: none; background: #252527; color: white; text-align: center; }
        button { width: 100%; padding: 15px; border-radius: 10px; border: none; background: #0052ff; color: white; font-weight: bold; cursor: pointer; }
    </style>
</head>
<body>
    <div class="login-card">
        <h2>MDL ACCESS</h2>
        <input type="text" id="login" placeholder="User">
        <input type="password" id="pass" placeholder="Password">
        <button onclick="verify()">Verify</button>
    </div>

    <script>
        // Функция превращения текста в нечитаемый хэш
        async function hash(string) {
            const utf8 = new TextEncoder().encode(string);
            const hashBuffer = await crypto.subtle.digest('SHA-256', utf8);
            const hashArray = Array.from(new Uint8Array(hashBuffer));
            return hashArray.map(b => b.toString(16).padStart(2, '0')).join('');
        }

        async function verify() {
            const userH = await hash(document.getElementById('login').value);
            const passH = await hash(document.getElementById('pass').value);

            const res = await fetch('db.json');
            const data = await res.json();

            const match = data.vault.find(v => v.u === userH && v.p === passH);

            if (match) {
                localStorage.setItem('auth_key', 'GRANTED_v13');
                window.location.href = 'index.html';
            } else {
                alert('Access Denied');
            }
        }
    </script>
</body>
</html>
