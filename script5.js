  window.addEventListener('DOMContentLoaded', function() {
    var backgrounds = [

      'https://i.gifer.com/2RNf.gif',
      'https://i.gifer.com/Cwgf.gif',
      'https://i.gifer.com/9B9p.gif'

    ];

    var randomIndex = Math.floor(Math.random() * backgrounds.length);
    var randomBackground = backgrounds[randomIndex];
    var modalContent = document.querySelector('.modal-content');
    modalContent.style.backgroundImage = 'url("' + randomBackground + '")';
  });






