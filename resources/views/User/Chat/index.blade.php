<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script>
    // Replace with the actual user ID you want to chat with
    let chatUserId = null;

    function fetchMessages(userId) {
        $.post({
            url: '{{ route('chat') }}',
            data: {
                user_id: userId,
                _token: '{{ csrf_token() }}'
            },
            success: function (messages) {
                // Render messages in your chat window
                let html = '';
                messages.forEach(function (msg) {
                    html += `<div class="chat-message ${msg.sender_id == {{ auth()->id() }} ? 'sent' : 'received'}">
                    <span>${msg.message}</span>
                    <small>${msg.created_at}</small>
                </div>`;
                });
                $('#chatMessages').html(html);
            }
        });
    }

    $('#sendMessageBtn').on('click', function () {
        var userId = chatUserId || $('#chatUserId').val();
        var message = $('#chatInput').val();
        if (!userId || !message) return;
        $.post({
            url: '{{ route('chat.send') }}',
            data: {
                user_id: userId,
                message: message,
                _token: '{{ csrf_token() }}'
            },
            success: function (msg) {
                fetchMessages(userId);
                $('#chatInput').val('');
            }
        });
    });

    // Example: set chatUserId and fetch messages when a user is selected
    // $('.user-list-item').on('click', function() {
    //     chatUserId = $(this).data('userid');
    //     fetchMessages(chatUserId);
    // });
</script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerConnect | Chat</title>
    <link rel="stylesheet" href="{{ asset('css/seeker/profile.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        :root {
            --primary-blue: #0a66c2;
            --dark-blue: #084482;
            --light-blue: #e6f0ff;
            --white: #ffffff;
            --dark-gray: #333333;
            --medium-gray: #666666;
            --light-gray: #f5f5f5;
            --chat-green: #dcf8c6;
        }

        body {
            background-color: #f8f9fa;
            color: var(--dark-gray);
            line-height: 1.6;
        }

        /* Header Styles */


        /* Chat Page Styles */
        .chat-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
            display: flex;
            gap: 20px;
            height: calc(100vh - 200px);
        }

        .page-header {
            margin-bottom: 30px;
        }

        .page-title {
            font-size: 32px;
            color: var(--primary-blue);
        }

        /* Chat sidebar */
        .chat-sidebar {
            width: 35%;
            background-color: var(--white);
            border: 1px solid #eee;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .sidebar-header {
            padding: 20px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .search-bar {
            display: flex;
            align-items: center;
            background-color: var(--light-gray);
            border-radius: 20px;
            padding: 8px 15px;
            width: 100%;
        }

        .search-bar input {
            background: transparent;
            border: none;
            outline: none;
            padding: 5px;
            width: 100%;
            font-size: 14px;
        }

        .new-chat-btn {
            background-color: var(--primary-blue);
            color: white;
            border: none;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            margin-left: 10px;
        }

        .chat-list {
            overflow-y: auto;
            flex: 1;
        }

        .chat-item {
            display: flex;
            padding: 15px 20px;
            border-bottom: 1px solid #eee;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .chat-item:hover,
        .chat-item.active {
            background-color: var(--light-blue);
        }

        .chat-item.active {
            border-left: 4px solid var(--primary-blue);
        }

        .chat-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 15px;
            object-fit: cover;
        }

        .chat-info {
            flex: 1;
            overflow: hidden;
        }

        .chat-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }

        .chat-name {
            font-weight: 600;
            font-size: 16px;
            color: var(--dark-gray);
        }

        .chat-time {
            font-size: 12px;
            color: var(--medium-gray);
        }

        .chat-preview {
            font-size: 14px;
            color: var(--medium-gray);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .unread-count {
            background-color: var(--primary-blue);
            color: white;
            font-size: 12px;
            min-width: 20px;
            height: 20px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 5px;
        }

        /* Chat main area */
        .chat-main {
            flex: 1;
            display: flex;
            flex-direction: column;
            background-color: var(--white);
            border: 1px solid #eee;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            overflow: hidden;
        }

        .chat-header-bar {
            padding: 15px 20px;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
        }

        .chat-header-info {
            flex: 1;
            margin-left: 15px;
        }

        .chat-header-name {
            font-weight: 600;
            font-size: 18px;
            margin-bottom: 3px;
        }

        .chat-header-status {
            font-size: 13px;
            color: var(--medium-gray);
        }

        .chat-header-actions {
            display: flex;
            gap: 15px;
        }

        .action-icon {
            color: var(--medium-gray);
            cursor: pointer;
            font-size: 18px;
        }

        .action-icon:hover {
            color: var(--primary-blue);
        }

        .chat-messages {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            background-color: #f0f2f5;
            background-image: url("data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23d0d0d0' fill-opacity='0.15' fill-rule='evenodd'%3E%3Cpath d='M0 40L40 0H20L0 20M40 40V20L20 40'/%3E%3C/g%3E%3C/svg%3E");
        }

        .message {
            max-width: 70%;
            padding: 12px 16px;
            margin-bottom: 15px;
            border-radius: 18px;
            position: relative;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .incoming {
            align-self: flex-start;
            background-color: var(--white);
            border-top-left-radius: 4px;
        }

        .outgoing {
            align-self: flex-end;
            background-color: var(--chat-green);
            border-top-right-radius: 4px;
        }

        .message-text {
            font-size: 15px;
            line-height: 1.4;
        }

        .message-time {
            font-size: 11px;
            color: var(--medium-gray);
            text-align: right;
            margin-top: 5px;
        }

        .chat-input-area {
            padding: 15px 20px;
            border-top: 1px solid #eee;
            background-color: var(--white);
            display: flex;
            align-items: center;
        }

        .input-attach {
            color: var(--medium-gray);
            font-size: 20px;
            margin-right: 15px;
            cursor: pointer;
        }

        .message-input {
            flex: 1;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 24px;
            outline: none;
            font-size: 15px;
            resize: none;
            height: 46px;
            max-height: 120px;
        }

        .message-input:focus {
            border-color: var(--primary-blue);
        }

        .send-btn {
            background-color: var(--primary-blue);
            color: white;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: 15px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .send-btn:hover {
            background-color: var(--dark-blue);
        }

        .no-chat-selected {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
            padding: 30px;
            text-align: center;
        }

        .no-chat-selected i {
            font-size: 60px;
            color: var(--light-gray);
            margin-bottom: 20px;
        }

        .no-chat-selected h3 {
            font-size: 22px;
            margin-bottom: 15px;
            color: var(--dark-gray);
        }

        .no-chat-selected p {
            color: var(--medium-gray);
            margin-bottom: 30px;
            max-width: 400px;
        }

        /* Footer */
        footer {
            background-color: var(--dark-gray);
            color: var(--white);
            padding: 70px 20px 30px;
            margin-top: 50px;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 50px;
        }

        .footer-col h3 {
            font-size: 20px;
            margin-bottom: 25px;
            position: relative;
        }

        .footer-col h3::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 40px;
            height: 2px;
            background-color: var(--primary-blue);
        }

        .footer-col ul {
            list-style: none;
        }

        .footer-col ul li {
            margin-bottom: 15px;
        }

        .footer-col ul li a {
            color: #aaa;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-col ul li a:hover {
            color: var(--white);
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.1);
            color: var(--white);
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .social-links a:hover {
            background-color: var(--primary-blue);
        }

        .copyright {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #aaa;
            font-size: 14px;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            nav {
                display: none;
            }

            .chat-container {
                flex-direction: column;
                height: auto;
            }

            .chat-sidebar,
            .chat-main {
                width: 100%;
                height: 50vh;
            }

            .chat-main {
                height: 60vh;
            }

            .chat-item {
                padding: 12px 15px;
            }

            .chat-avatar {
                width: 40px;
                height: 40px;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    @include('user.layout.navbar')

    <!-- Chat Page Content -->
    <main class="chat-container">
        <!-- Chat sidebar with conversations -->
        <div class="chat-sidebar">
            <div class="sidebar-header">
                <div class="search-bar">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search conversations...">
                </div>
                <button class="new-chat-btn">
                    <i class="fas fa-plus"></i>
                </button>
            </div>

            <div class="chat-list">
                {{-- Loop through conversations if available --}}
                @if(isset($conversations))
                    @foreach($conversations as $userId => $msgs)
                        @php
                            $lastMsg = $msgs->last();
                            $user = \App\Models\User::find($userId);
                            $unread = $msgs->where('receiver_id', auth()->id())->where('is_read', false)->count();
                        @endphp
                        <div class="chat-item {{ $receiver_id == $userId ? 'active' : '' }}"
                            onclick="window.location='{{ url('chat/' . $userId) }}'">
                            <img src="{{ $user && $user->avatar ? asset('avatars/' . $user->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($user?->name) }}"
                                class="chat-avatar" alt="{{ $user?->name }}">
                            <div class="chat-info">
                                <div class="chat-header">
                                    <div class="chat-name">{{ $user?->name }}</div>
                                    <div class="chat-time">
                                        {{ $lastMsg ? \Carbon\Carbon::parse($lastMsg->created_at)->format('h:i A') : '' }}</div>
                                </div>
                                <div class="chat-preview">{{ $lastMsg?->message }}</div>
                                @if($unread > 0)
                                    <div class="unread-count">{{ $unread }}</div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="no-chat-selected">
                        <i class="fas fa-comments"></i>
                        <h3>No conversations yet</h3>
                        <p>Start a new chat to connect with others.</p>
                    </div>
                @endif
            </div>
        </div>

        <div class="chat-main">
            <div class="chat-header-bar">
                @php
                    $receiver = \App\Models\User::find($receiver_id ?? 1);
                @endphp
                <img src="{{ $receiver && $receiver->avatar ? asset('avatars/' . $receiver->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($receiver?->name) }}"
                    class="chat-avatar" alt="{{ $receiver?->name }}">
                <div class="chat-header-info">
                    <div class="chat-header-name">{{ $receiver?->name }}</div>
                    <div class="chat-header-status">{{ $receiver?->email }}</div>
                </div>
                <div class="chat-header-actions">
                    <i class="fas fa-phone-alt action-icon"></i>
                    <i class="fas fa-video action-icon"></i>
                    <i class="fas fa-info-circle action-icon"></i>
                </div>
            </div>



            <div class="chat-messages" id="chatMessages">
                @foreach ($messages as $m)
                    <div class="message {{ $m->sender_id == auth()->id() ? 'outgoing' : 'incoming' }}">
                        <div class="message-text">{{ $m->message }}</div>
                        <div class="message-time">{{ \Carbon\Carbon::parse($m->created_at)->format('h:i A') }}</div>
                    </div>
                @endforeach
            </div>

            <!-- ✅ Hidden Inputs -->
            <form id="chatForm">
                @csrf
                <input type="hidden" name="receiver_id" id="receiver_id" value="{{ $receiver_id }}">
                <div class="chat-input-area">
                    <i class="fas fa-paperclip input-attach"></i>
                    <textarea class="message-input" id="messageInput" name="message" placeholder="Type a message..."
                        rows="1"></textarea>
                    <button class="send-btn" type="submit">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
            </form>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                // Auto-scroll to bottom on load
                $(document).ready(function () {
                    var chatMessages = document.getElementById('chatMessages');
                    if (chatMessages) chatMessages.scrollTop = chatMessages.scrollHeight;
                });

                $('#chatForm').on('submit', function (e) {
                    e.preventDefault();
                    let message = $('#messageInput').val().trim();
                    if (message === '') return;
                    $.ajax({
                        url: "{{ route('chat.send') }}",
                        method: "POST",
                        data: $(this).serialize(),
                        success: function (res) {
                            const messageHTML = `
                                <div class="message outgoing">
                                    <div class="message-text">${res.message}</div>
                                    <div class="message-time">Just now</div>
                                </div>
                            `;
                            $('#chatMessages').append(messageHTML);
                            $('#messageInput').val('').css('height', '46px');
                            var chatMessages = document.getElementById('chatMessages');
                            if (chatMessages) chatMessages.scrollTop = chatMessages.scrollHeight;
                        },
                        error: function () {
                            alert('Message failed to send.');
                        }
                    });
                });

                // Send on Enter without Shift
                $('#messageInput').on('keydown', function (e) {
                    if (e.key === 'Enter' && !e.shiftKey) {
                        e.preventDefault();
                        $('#chatForm').submit();
                    }
                });
            </script>


        </div>
    </main>
</body>

</html>