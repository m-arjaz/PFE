    function toggleDateTime() {
      const fields = document.getElementById("date-time-fields");
      fields.style.display = fields.style.display === "none" ? "block" : "none";
    }
    const inputs = document.querySelectorAll('.input');
    inputs.forEach((input)=> {

      input.addEventListener('input', () => {
      if (input.value.trim() === '') {
        input.classList.remove('green-shadow');
        input.classList.add('red-shadow');
      } else {
        input.classList.remove('red-shadow');
        input.classList.add('green-shadow');
      }
    });
    

    window.addEventListener('load', () => {
      if (input.value.trim() === '') {
      }
    });
    });
    
