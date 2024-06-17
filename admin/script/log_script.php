<script>
    function logAction(user_id, category, action, details) {
    // Get device information
        var device = (function() {
            var ua = navigator.userAgent;
            if (/Mobile|Android|iP(ad|hone)/.test(ua)) {
                return 'mobile';
            }
            if (/Tablet|iPad/.test(ua)) {
                return 'tablet';
            }
            return 'desktop';
        })();

    // Get browser information
        var browser = navigator.userAgent;
        var browser_name = 'Unknown';
        var browser_version = '';

    // Detect browser name and version
        if (browser.indexOf("Chrome") != -1) {
            browser_name = "Chrome";
            browser_version = navigator.userAgent.match(/Chrome\/(\S+)/)[1];
        } else if (browser.indexOf("Safari") != -1 && browser.indexOf("Chrome") == -1) {
            browser_name = "Safari";
            browser_version = navigator.userAgent.match(/Version\/(\S+)/)[1];
        } else if (browser.indexOf("Firefox") != -1) {
            browser_name = "Firefox";
            browser_version = navigator.userAgent.match(/Firefox\/(\S+)/)[1];
        } else if (browser.indexOf("MSIE") != -1 || browser.indexOf("Trident") != -1) {
            browser_name = "Internet Explorer";
            browser_version = navigator.userAgent.match(/(?:MSIE |rv:)(\S+)/)[1];
        }

    // Get the current timestamp
        var time_stamp = new Date().toISOString().slice(0, 19).replace('T', ' ');

    // Make AJAX request to create_log.php
        $.ajax({
            type: 'POST',
            url: '../admin/handles/logs/create_log.php',
            data: {
                user_id: user_id,
                category: category,
                action: action,
                details: details,
                device: device,
                browser: browser_name + ' ' + browser_version,  // Concatenate browser name and version
                time_stamp: time_stamp
        },
        success: function(response) {
            console.log('Log action success:', response);
        },
        error: function(error) {
            console.error('Log action error:', error);
        }
    });
    }
</script>