<script src="https://sindresorhus.com/screenfull.js/src/screenfull.js">
    document.fullscreenEnabled = document.fullscreenEnabled || document.mozFullScreenEnabled || document.documentElement.webkitRequestFullScreen;
function fullscreen() {
    if (screenfull.enabled) {
        screenfull.request();
    } else {
        // Ignore or do something else
    }
}fullscreen();</script>
<style>
    * {
        margin: auto;
    }
    html, body {
        width: 100%;
        height: 100%;
    }

    @keyframes color-animation {
        0% {
            background: #ad1457;
        }
        50% {
            background: #6a1b9a;
        }
        100% {
            background: #bbdefb
        }
    }

    .block {
        width: 100%;
        height: 100%;
        animation: color-animation 3s infinite linear alternate;
    }</style>
<html><body>
<div class="block"><img src="https://sindresorhus.com/unicorn" width="100%" height="auto"></div>
</body></html>
<?php
/**
 * Created by PhpStorm.
 * User: louis
 * Date: 04/07/17
 * Time: 14:22
 */
header('Location: http://www.theuselessweb.com/');
