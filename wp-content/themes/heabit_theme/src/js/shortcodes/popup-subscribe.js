const subscriptionPopup = {
  init: function() {
    const popup = document.getElementById('subscription-popup');
    const closeButton = document.querySelector('.popup-subscribe-close');
    const subscriptionForm = document.getElementById('subscription-form');
    const emailInput = document.getElementById('subscriber_email');

    popup.style.display = 'flex';

    closeButton.addEventListener('click', () => {
      popup.style.display = 'none';
    });

    window.addEventListener('click', (event) => {
      if (event.target === popup) {
        popup.style.display = 'none';
      }
    });

    subscriptionForm.addEventListener('submit', (event) => {
      event.preventDefault();

      const email = emailInput.value.trim();
      const formData = new FormData();
      formData.append('action', 'save_subscriber');
      formData.append('email', email);

      fetch(ajax_object.ajax_url, {
        method: 'POST',
        body: formData,
      })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            popup.querySelector('.step-1').style.display = 'none';
            popup.querySelector('.step-2').style.display = 'flex';
          }
        })
        .catch(error => {
          console.error(error);
        });
    });
  }
};

export default subscriptionPopup;
