const days = document.querySelectorAll('.day');
  const infos = document.querySelectorAll('.trip-info');

  days.forEach(day => {
    day.addEventListener('click', () => {
      // Remove 'active' from all
      days.forEach(d => d.classList.remove('active'));
      infos.forEach(info => info.classList.remove('active'));

      // Add 'active' to clicked
      day.classList.add('active');
      const index = day.getAttribute('data-day');
      document.querySelector(`.trip-info[data-content="${index}"]`).classList.add('active');
    });
  });
  const selectBtns = document.querySelectorAll('.select-button');
  const overlay = document.getElementById('overlay');
  const ticketCard = document.getElementById('ticket-card');
  const inputVoyageId = document.getElementById('voyage_id');

  selectBtns.forEach(selectBtn =>{
    selectBtn.addEventListener('click', () => {
      const voyageId = selectBtn.dataset.id;
      inputVoyageId.value = voyageId;
      overlay.classList.remove('hidden');
      ticketCard.classList.remove('hidden');
  });

  overlay.addEventListener('click', () => {
    overlay.classList.add('hidden');
    ticketCard.classList.add('hidden');
  });
  });
  document.getElementById('confirm-btn').addEventListener('click', function (e) {
    e.preventDefault();
  const voyageId = document.getElementById('voyage_id').value;
  const nbtickets = document.getElementById('ticket-count').value;
  const errorMsg = document.getElementById('error-msg');

  const form = document.getElementById('reservation-form');
  const formData = new FormData(form);
  formData.append('confirmer', '1');

  fetch('reserver.php', {
    method: 'POST',
    body: formData
  })
  .then(res => res.json())
  .then(data => {
    if (data.success) {
      window.location.href = "paiement.php?nbtickets"; 
    } else {
      errorMsg.innerText = data.message;
      errorMsg.style.display = 'block';
    }
  })
  .catch(err => {
    errorMsg.innerText = "Erreur de connexion.";
    errorMsg.style.display = 'block';
  });
});