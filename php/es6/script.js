 // RegEx: lettere (incl. accentate) e spazi.
 const namePattern = /^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/u;

 const form = document.getElementById('contactForm');
 const nameInput = document.getElementById('name');
 const emailInput = document.getElementById('email');
 const messageInput = document.getElementById('message');
 const submitBtn = document.getElementById('submitBtn');

 const nameErr = document.getElementById('name-err');
 const emailErr = document.getElementById('email-err');
 const messageErr = document.getElementById('message-err');
 const feedback = document.getElementById('feedback');
 const counter = document.getElementById('counter');

 function validateName() {
   const v = nameInput.value.trim();
   if (!v) {
     nameErr.textContent = 'Il nome è obbligatorio.'; nameErr.hidden = false; return false;
   }
   if (!namePattern.test(v)) {
     nameErr.textContent = 'Usa solo lettere e spazi (nessun numero o simbolo).'; nameErr.hidden = false; return false;
   }
   nameErr.textContent = '';
   nameErr.hidden = true;
   return true;
 }

 function validateEmail() {
   const v = emailInput.value.trim();
   if (!v) { emailErr.textContent = 'L\'email è obbligatoria.'; emailErr.hidden = false; return false; }
   // Affidiamoci anche al controllo HTML5 ma aggiungiamo una regex semplice per essere più robusti
   const emailRe = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
   if (!emailRe.test(v)) { emailErr.textContent = 'Formato email non valido.'; emailErr.hidden = false; return false; }
   emailErr.textContent = ''; emailErr.hidden = true; return true;
 }

 function validateMessage() {
   const v = messageInput.value;
   if (v.length > 300) { messageErr.textContent = 'Il messaggio non può superare 300 caratteri.'; messageErr.hidden = false; return false; }
   messageErr.textContent = ''; messageErr.hidden = true; return true;
 }

 function updateCounter() {
   counter.textContent = `${messageInput.value.length} / 300`;
 }

 // Abilita/disabilita il bottone di invio in base alla validità
 function updateSubmitState() {
   submitBtn.disabled = !(validateName() && validateEmail() && validateMessage());
 }

 nameInput.addEventListener('input', () => { validateName(); updateSubmitState(); });
 emailInput.addEventListener('input', () => { validateEmail(); updateSubmitState(); });
 messageInput.addEventListener('input', () => { updateCounter(); validateMessage(); updateSubmitState(); });

 // Prevent default submission: qui puoi collegare la chiamata fetch verso il tuo backend.
 form.addEventListener('submit', (e) => {
   e.preventDefault();
   // Validazione finale
   const ok = validateName() & validateEmail() & validateMessage();
   if (!ok) return;

   // Simulazione invio: qui metti la tua fetch('/api/contact', {method:'POST', body:...})
   submitBtn.disabled = true;
   feedback.innerHTML = '<div class="success">Messaggio inviato con successo. Grazie!</div>';

   // Se vuoi resettare il form dopo l'invio:
   form.reset();
   updateCounter();
   setTimeout(() => { submitBtn.disabled = false; }, 800);
 });

 // Inizializza stato
 updateCounter();
 updateSubmitState();