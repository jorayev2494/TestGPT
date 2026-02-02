<!doctype html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>AI Chat</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap 5 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

        <style>
            body {
                height: 100vh;
                overflow: hidden;
            }

            .sidebar {
                height: 100vh;
                border-right: 1px solid #dee2e6;
            }

            .chat-container {
                height: calc(100vh - 70px);
                overflow-y: auto;
                padding: 20px;
                background: #f8f9fa;
            }

            .message {
                max-width: 70%;
                padding: 10px 14px;
                border-radius: 12px;
                margin-bottom: 12px;
                word-wrap: break-word;
            }

            .message.user {
                margin-left: auto;
                background: #0d6efd;
                color: #fff;
                border-bottom-right-radius: 0;
            }

            .message.ai {
                margin-right: auto;
                background: #e9ecef;
                color: #000;
                border-bottom-left-radius: 0;
            }

            .chat-input {
                height: 70px;
                border-top: 1px solid #dee2e6;
                background: #fff;
            }
        </style>
    </head>

    <body>
        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar -->
                @include('layouts.partials.sidebar')

                <!-- Chat -->
                @yield('content')
            </div>
        </div>
    </body>
</html>