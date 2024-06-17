<script>
function logAction(user_id, action, details) {
    // Get device information
    var device = navigator.userAgent;
    
    // Get browser information
    var browser = navigator.userAgent;
    var browser_version = '';

    // Detect browser name and version
    if (browser.indexOf("Chrome") != -1) {
        browser = "Chrome";
        browser_version = navigator.userAgent.match(/Chrome\/(\S+)/)[1];
    } else if (browser.indexOf("Safari") != -1) {
        browser = "Safari";
        browser_version = navigator.userAgent.match(/Version\/(\S+)/)[1];
    } else if (browser.indexOf("Firefox") != -1) {
        browser = "Firefox";
        browser_version = navigator.userAgent.match(/Firefox\/(\S+)/)[1];
    } else if (browser.indexOf("MSIE") != -1 || browser.indexOf("Trident") != -1) {
        browser = "Internet Explorer";
        browser_version = navigator.userAgent.match(/(?:MSIE |rv:)(\S+)/)[1];
    } else {
        browser = "Unknown";
    }

    // Make AJAX request to create_log.php
    $.ajax({
        type: 'POST',
        url: '../logs/create_log.php',
        data: {
            user_id: user_id,
            action: action,
            details: details,
            device: device,
            browser: browser + ' ' + browser_version  // Concatenate browser name and version
        },
        success: function(response) {
            console.log('Log action success:', response);
            // Handle success if needed
        },
        error: function(xhr, status, error) {
            console.error('Log action error:', error);
            // Handle error if needed
        }
    });
}

</script>