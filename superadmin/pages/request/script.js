var activeButton = document.querySelector('.active-button');
var deactiveButton = document.querySelector('.deactive-button');

activeButton.addEventListener('click', updateStatus.bind(null, 'active'));
deactiveButton.addEventListener('click', updateStatus.bind(null, 'deactive'));

