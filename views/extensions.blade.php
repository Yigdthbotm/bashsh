<!DOCTYPE html>
<html>
<head>
    <title>Secure Extensions</title>
</head>
<body>
    <h1>Halaman Extensions</h1>

    <audio id="notifySound" autoplay>
        <source src="{{ asset('audio/notify.mp3') }}" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const audio = document.getElementById('notifySound');
            audio.play().catch(function(e) {
                console.log('Autoplay mungkin diblokir oleh browser:', e);
            });
        });
    </script>
</body>
</html>
