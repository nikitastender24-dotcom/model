<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>MDL | Login</title>
    <style>
        body { background: #0a0a0c; color: white; font-family: 'Inter', sans-serif; display: flex; height: 100vh; align-items: center; justify-content: center; margin: 0; }
        .box { background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.1); padding: 40px; border-radius: 30px; backdrop-filter: blur(15px); text-align: center; width: 300px; }
        input { width: 100%; padding: 12px; margin: 10px 0; border-radius: 12px; border: none; background: rgba(255,255,255,0.07); color: white; text-align: center; outline: none; }
        button { width: 100%; padding: 15px; border-radius: 12px; border: none; background: #0052ff; color: white; font-weight: bold; cursor: pointer; }
    </style>
</head>
<body>
    <div class="box">
        <h2 style="letter-spacing: -1px;">MDL ACCESS</h2>
        <input type="password" id="pass" placeholder="Password">
        <button onclick="check()">Enter System</button>
    </div>

    <script>
        function check() {
            // Простейшая проверка без сервера
            if (document.getElementById('pass').value === 'MDL') {
                localStorage.setItem('mdl_token', 'granted_2026'); // Ключ доступа
                window.location.href = 'index.html';
            } else {
                alert('Access Denied');
            }
        }
    </script>
</body>
</html>
