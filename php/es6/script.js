const form = document.querySelector('#contactForm');
const nameInput = document.querySelector('#name');
const emailInput = document.querySelector('#email');
const messageInput = document.querySelector('#message');
const submitBtn = document.querySelector('#submitBtn');
const counter = document.querySelector('#counter');
const nameErr = document.querySelector('#nameErr');
const emailErr = document.querySelector('#emailErr');
const messageErr = document.querySelector('#messageErr');
const feedback = document.querySelector('#feedback');

function validateName() {
  const v = nameInput.value.trim();
  if (!v) {
    nameErr.textContent = 'Nome obbligatorio.';
    nameErr.hidden = false;
    return false;
  }
  const namePattern = /^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/u;
  if (!namePattern.test(v)) {
    nameErr.textContent = 'Usa solo lettere e spazi (nessun numero o simbolo).';
    nameErr.hidden = false;
    return false;
  }
  nameErr.hidden = true;
  return true;
}

function validateEmail() {
  const v = emailInput.value.trim();
  if (!v) {
    emailErr.textContent = "L'email è obbligatoria.";
    emailErr.hidden = false;
    return false;
  }
  const emailRe = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRe.test(v)) {
    emailErr.textContent = 'Formato email non valido.';
    emailErr.hidden = false;
    return false;
  }
  emailErr.hidden = true;
  return true;
}

function updateCounter() {
  counter.textContent = `${messageInput.value.length} / 300`;
}

function validateMessage() {
  const v = messageInput.value;
  if (v.length > 300) {
    messageErr.textContent = 'Il messaggio non può superare 300 caratteri.';
    messageErr.hidden = false;
    return false;
  }
  messageErr.hidden = true;
  return true;
}

function updateSubmitState() {
  submitBtn.disabled = !(validateName() && validateEmail() && validateMessage());
}

// Event listeners
nameInput.addEventListener('input', () => { validateName(); updateSubmitState(); });
emailInput.addEventListener('input', () => { validateEmail(); updateSubmitState(); });
messageInput.addEventListener('input', () => { updateCounter(); validateMessage(); updateSubmitState(); });