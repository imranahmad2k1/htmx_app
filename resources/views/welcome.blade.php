<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HTMX App</title>

    <script src="https://unpkg.com/htmx.org@1.9.9"
        integrity="sha384-QFjmbokDn2DjBjq+fM+8LUIVrAgqcNW2s0PjAxHETgRn9l4fvX31ZxDxvwQnyMOX" crossorigin="anonymous">
    </script>

    <style>
        .htmx-indicator {
            font-size: 16px;
            font-weight: normal;
        }
    </style>
</head>

<body>
    <h2>Create News</h2>

    <div class="create-news">
        <input type="text" name="news" 
            hx-post="/news" 
            hx-trigger="keyup[key=='Enter']"
            hx-confirm="Are you sure you want to save this News?"
        />
        
        <p style="display:inline">Press Enter to Save News</p>
    </div>
    
    <hr>
    <h2>All News</h2>

    <div hx-get="/news" hx-trigger="every 2s"></div>



    {{-- <div id="response">Show me here</div> --}}




    <script>
        document.body.addEventListener('htmx:configRequest', (event) => {
            event.detail.headers['X-CSRF-Token'] = '{{ csrf_token() }}';
        })
    </script>

</body>

</html>
