<!doctype html>
<html lang="it">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Contatto — Form Semplice</title>
    <link rel="stylesheet" href="styles/index.css">
</head>

<body>
    <main class="card">
        <h1 id="form-title">Ciao, sono un form</h1>

        <form id="contactForm" action="target.php" method="POST">
            <div class="row">
                <label for="name">Nome *</label>
                <input id="name" name="name" type="text" inputmode="text" required />
                <div id="nameErr" class="error" hidden></div>
            </div>

            <div class="row">
                <label for="email">Email *</label>
                <input id="email" name="email" type="email" required />
                <div id="emailErr" class="error" hidden></div>
            </div>

            <div class="row">
                <label for="message">Messaggio <span class="hint">(opzionale)</span>
                    <span class="counter" id="counter">0 / 300</span>
                </label>
                <textarea id="message" name="message" maxlength="300"></textarea>
                <div id="messageErr" class="error" hidden></div>
            </div>

            <div style="display:flex;gap:10px;align-items:center">
                <button id="submitBtn" type="submit">Invia</button>
            </div>

            <div id="feedback"></div>
        </form>
    </main>

    <script src="script.js"></script>
</body>

</html>