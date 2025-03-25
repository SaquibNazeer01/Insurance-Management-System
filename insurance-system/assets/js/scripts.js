$(document).ready(function() {
    // Fetch notifications
    function fetchNotifications() {
        $.ajax({
            url: '../includes/fetch_notifications.php',
            method: 'GET',
            success: function(response) {
                const notifications = JSON.parse(response);
                const notificationList = $('.notification-list ul');
                notificationList.empty(); // Clear existing notifications

                if (notifications.length > 0) {
                    notifications.forEach(notification => {
                        const statusClass = notification.status === 'unread' ? 'unread' : 'read';
                        notificationList.append(`
                            <li class="notification ${statusClass}">
                                <p>${notification.message}</p>
                                <small>${notification.created_at}</small>
                                <a href="mark_notification_as_read.php?id=${notification.id}">Mark as Read</a>
                            </li>
                        `);
                    });
                    $('.notification-count').text(notifications.length); // Update notification count
                } else {
                    notificationList.append('<li>No new notifications.</li>');
                    $('.notification-count').text('0'); // Reset notification count
                }
            }
        });
    }

    // Fetch notifications every 5 seconds
    setInterval(fetchNotifications, 5000);

    // Toggle notification dropdown
    $('.notification-dropdown a').click(function(e) {
        e.preventDefault();
        $('.notification-list').toggle();
    });

    // Close dropdown when clicking outside
    $(document).click(function(e) {
        if (!$(e.target).closest('.notification-dropdown').length) {
            $('.notification-list').hide();
        }
    });

    // Fetch notifications on page load
    fetchNotifications();
});