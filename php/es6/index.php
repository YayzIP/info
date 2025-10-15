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
    <h1 id="form-title">Ciao sono un form</h1>

    <form id="contactForm" method="POST">
      <div class="row">
        <label for="name">Nome *</label>
        <input id="name" name="name" type="text" inputmode="text" />
      </div>

      <div class="row">
        <label for="email">Email *</label>
        <input id="email" name="email" type="email" />
      </div>

      <div class="row">
        <label for="message">Messaggio <span class="hint">(opzionale)</span>
          <span class="counter" id="counter">0 / 300</span>
        </label>
        <textarea id="message" name="message" maxlength="300"></textarea>
      </div>

      <div style="display:flex;gap:10px;align-items:center">
        <button id="submitBtn" type="submit">Invia</button>
        <div id="feedback" aria-live="polite"></div>
      </div>
    </form>
  </main>


  <script src="script.js"></script>
</body>
</html>
