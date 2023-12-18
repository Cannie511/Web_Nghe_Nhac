<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <button type="button" class="btn btn-primary"  id="liveToastBtn">Show live toast</button>

    <div class='toast-container position-fixed bottom-0 end-0 p-3' >
        <div id='liveToast'style="background-color: green;" class='toast fade show' role='alert' aria-live='ssertive' aria-atomic='true'>
            <div class='toast-header'>
                <strong class='me-auto'>Thông báo</strong>
                <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
            </div>
            <div class='toast-body' style=" color: white">
                Hello, world! This is a toast message.
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const toastTrigger = document.getElementById('liveToastBtn')
    const toastLiveExample = document.getElementById('liveToast');

    if (toastTrigger) {
        const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
        toastTrigger.addEventListener('click', () => {
            toastBootstrap.show()
        })
    }
    setInterval(function(){
        toastLiveExample.style.display = "none";
    }, 3000);
</script>

</html>