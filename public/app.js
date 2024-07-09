document.addEventListener('DOMContentLoaded', function () {

    //Toggle mobile menu
    function toggleMenu(){
        console.log('toggling');
        var mobileMenu = document.querySelector('.mobile-menu');
        mobileMenu.classList.toggle("hidden")
    }
    
    var mobileMenuToggles = document.querySelectorAll('.toggle-mobile-menu');
    console.log(mobileMenuToggles);
    mobileMenuToggles.forEach(function(btn){
        btn.addEventListener('click', toggleMenu);
    });

    var body = document.querySelector('body');
    if (body.classList.contains('admin')) {

        var playersCanvas = document.getElementById('playersChart');
        var messagesCanvas = document.getElementById('messagesChart');

        var playersCtx = playersCanvas.getContext('2d');
        var messagesCtx = messagesCanvas.getContext('2d');

        var activePlayers = playersCanvas.getAttribute('data-active');
        var totalPlayers = playersCanvas.getAttribute('data-total');
        var unreadMessages = messagesCanvas.getAttribute('data-unread');
        var totalMessages = messagesCanvas.getAttribute('data-total');

        // Players Chart
        new Chart(playersCtx, {
            type: 'doughnut',
            data: {
                labels: ['Active Players', 'Inactive Players'],
                datasets: [{
                    label: 'Player Statistics',
                    data: [activePlayers, totalPlayers - activePlayers],
                    backgroundColor: ['#55c57a', 'rgb(201, 203, 207)'],
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                }
            }
        });

        // Messages Chart
        new Chart(messagesCtx, {
            type: 'doughnut',
            data: {
                labels: ['Unread Messages', 'Read Messages'],
                datasets: [{
                    label: 'Message Statistics',
                    data: [unreadMessages, totalMessages - unreadMessages],
                    backgroundColor: ['#55c57a', 'rgb(201, 203, 207)'],
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                }
            }
        });
    }

});

