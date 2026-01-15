<!DOCTYPE html>
<html>
<head>
    <title>Login success</title>
</head>
<body>
<script>
    if (window.opener) {
        window.opener.postMessage({
            type: 'google-auth',
            status: '{{ $error ?? 'success' }}'
        }, '*');
        window.close();
    }
</script>

</body>
</html>
