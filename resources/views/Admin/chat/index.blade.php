<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerConnect | Messages</title>
    <link rel="stylesheet" href="{{ asset('css/admin/chat.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <!-- Sidebar -->
    {{-- <div class="sidebar">
        <div class="sidebar-header">
            <h2><i class="fas fa-briefcase"></i> <span>CareerConnect</span></h2>
        </div>
        <div class="sidebar-menu">
            <a href="#" class="menu-item">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
            <a href="#" class="menu-item">
                <i class="fas fa-users"></i>
                <span>Job Seekers</span>
            </a>
            <a href="#" class="menu-item">
                <i class="fas fa-building"></i>
                <span>Companies</span>
            </a>
            <a href="#" class="menu-item">
                <i class="fas fa-briefcase"></i>
                <span>Jobs</span>
            </a>
            <a href="#" class="menu-item active">
                <i class="fas fa-comments"></i>
                <span>Messages</span>
            </a>
            <a href="#" class="menu-item">
                <i class="fas fa-chart-bar"></i>
                <span>Reports</span>
            </a>
            <a href="#" class="menu-item">
                <i class="fas fa-cog"></i>
                <span>Settings</span>
            </a>
        </div>
    </div> --}}
    @include('admin.layout.sidebar')
    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navigation -->
        {{-- <div class="top-nav">
            <div class="search-bar">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Search...">
            </div>
            <div class="user-menu">
                <div class="notification-btn">
                    <i class="fas fa-bell"></i>
                    <span class="notification-badge">3</span>
                </div>
                <div class="user-profile">
                    <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=100&h=100&q=80"
                        alt="Admin">
                    <div class="user-info">
                        <div class="user-name">Alex Morgan</div>
                        <div class="user-role">Recruiter</div>
                    </div>
                </div>
            </div>
        </div> --}}
        @include('admin.layout.topnav')
        <!-- Chat Container -->
        <div class="chat-container">
            <!-- Left Side: Chat List -->
            <div class="chat-list">
                <div class="chat-list-header">
                    <h2><i class="fas fa-comments"></i> Messages</h2>
                    <div class="chat-search">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Search conversations...">
                    </div>
                </div>
                <div class="conversations">
                    <!-- Conversation 1 -->
                    <div class="conversation active">
                        <div class="conversation-avatar">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=100&h=100&q=80"
                                alt="Michael Chen">
                            <div class="online-status"></div>
                        </div>
                        <div class="conversation-info">
                            <div class="conversation-top">
                                <div class="conversation-name">Michael Chen</div>
                                <div class="conversation-time">10:45 AM</div>
                            </div>
                            <div class="conversation-preview">Thanks for the interview opportunity! When can I expect to
                                hear back?</div>
                        </div>
                        <div class="unread-count">3</div>
                    </div>

                    <!-- Conversation 2 -->
                    <div class="conversation">
                        <div class="conversation-avatar">
                            <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=100&h=100&q=80"
                                alt="Priya Sharma">
                        </div>
                        <div class="conversation-info">
                            <div class="conversation-top">
                                <div class="conversation-name">Priya Sharma</div>
                                <div class="conversation-time">Yesterday</div>
                            </div>
                            <div class="conversation-preview">I've completed the assignment. Please let me know if you
                                need anything else.</div>
                        </div>
                    </div>

                    <!-- Conversation 3 -->
                    <div class="conversation">
                        <div class="conversation-avatar">
                            <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?auto=format&fit=crop&w=100&h=100&q=80"
                                alt="Sarah Johnson">
                            <div class="online-status"></div>
                        </div>
                        <div class="conversation-info">
                            <div class="conversation-top">
                                <div class="conversation-name">Sarah Johnson</div>
                                <div class="conversation-time">9:15 AM</div>
                            </div>
                            <div class="conversation-preview">Can we schedule the second interview for next week?</div>
                        </div>
                    </div>

                    <!-- Conversation 4 -->
                    <div class="conversation">
                        <div class="conversation-avatar">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&w=100&h=100&q=80"
                                alt="Robert Kim">
                        </div>
                        <div class="conversation-info">
                            <div class="conversation-top">
                                <div class="conversation-name">Robert Kim</div>
                                <div class="conversation-time">Jun 28</div>
                            </div>
                            <div class="conversation-preview">I'm interested in the Senior Developer position. Can you
                                share more details?</div>
                        </div>
                        <div class="unread-count">1</div>
                    </div>

                    <!-- Conversation 5 -->
                    <div class="conversation">
                        <div class="conversation-avatar">
                            <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&w=100&h=100&q=80"
                                alt="Sophia Martinez">
                        </div>
                        <div class="conversation-info">
                            <div class="conversation-top">
                                <div class="conversation-name">Sophia Martinez</div>
                                <div class="conversation-time">Jun 27</div>
                            </div>
                            <div class="conversation-preview">Thank you for considering my application!</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side: Chat Window -->
            <div class="chat-window">
                <div class="chat-header">
                    <div class="chat-header-avatar">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=100&h=100&q=80"
                            alt="Michael Chen">
                        <div class="online-status"></div>
                    </div>
                    <div class="chat-header-info">
                        <div class="chat-header-name">Michael Chen</div>
                        <div class="chat-header-status">Online - Senior UX Designer at TechVision</div>
                    </div>
                    <div class="chat-header-actions">
                        <i class="fas fa-phone-alt"></i>
                        <i class="fas fa-video"></i>
                        <i class="fas fa-info-circle"></i>
                    </div>
                </div>

                <div class="chat-messages">
                    <!-- Received Message -->
                    <div class="message received">
                        <div class="message-bubble">
                            Hi Alex, thanks for the interview opportunity yesterday. I really enjoyed learning more
                            about the role and your company.
                        </div>
                        <div class="message-time">10:30 AM</div>
                    </div>

                    <!-- Sent Message -->
                    <div class="message sent">
                        <div class="message-bubble">
                            You're welcome, Michael! We were very impressed with your portfolio and experience. The team
                            is discussing next steps.
                        </div>
                        <div class="message-time">10:32 AM</div>
                    </div>

                    <!-- Received Message -->
                    <div class="message received">
                        <div class="message-bubble">
                            That's great to hear! Do you have an approximate timeline for when I might hear back about
                            next steps?
                        </div>
                        <div class="message-time">10:35 AM</div>
                    </div>

                    <!-- Sent Message -->
                    <div class="message sent">
                        <div class="message-bubble">
                            We're aiming to make a decision by the end of this week. We have a few more candidates to
                            interview tomorrow.
                        </div>
                        <div class="message-time">10:37 AM</div>
                    </div>

                    <!-- Received Message -->
                    <div class="message received">
                        <div class="message-bubble">
                            Understood. I'm very interested in this opportunity and look forward to hearing from you.
                            Please let me know if you need any additional information from me.
                        </div>
                        <div class="message-time">10:40 AM</div>
                    </div>

                    <!-- Sent Message -->
                    <div class="message sent">
                        <div class="message-bubble">
                            Will do! Your references were excellent, by the way. We'll be in touch soon.
                        </div>
                        <div class="message-time">10:42 AM</div>
                    </div>

                    <!-- Received Message -->
                    <div class="message received">
                        <div class="message-bubble">
                            Thank you, I appreciate that. Have a great day!
                        </div>
                        <div class="message-time">10:45 AM</div>
                    </div>
                </div>

                <div class="chat-input">
                    <i class="fas fa-paperclip"></i>
                    <div class="message-input">
                        <input type="text" placeholder="Type a message...">
                        <i class="far fa-smile"></i>
                    </div>
                    <div class="send-button">
                        <i class="fas fa-paper-plane"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // JavaScript for chat functionality
        document.addEventListener('DOMContentLoaded', function () {
            // Conversation switching
            const conversations = document.querySelectorAll('.conversation');
            conversations.forEach(conversation => {
                conversation.addEventListener('click', function () {
                    conversations.forEach(c => c.classList.remove('active'));
                    this.classList.add('active');

                    // In a real app, this would load the conversation
                    const userName = this.querySelector('.conversation-name').textContent;
                    document.querySelector('.chat-header-name').textContent = userName;

                    // Reset unread count
                    const unreadCount = this.querySelector('.unread-count');
                    if (unreadCount) unreadCount.style.display = 'none';
                });
            });

            // Send message functionality
            const sendButton = document.querySelector('.send-button');
            const messageInput = document.querySelector('.message-input input');

            function sendMessage() {
                const message = messageInput.value.trim();
                if (message) {
                    const messagesContainer = document.querySelector('.chat-messages');

                    // Create new message element
                    const messageDiv = document.createElement('div');
                    messageDiv.className = 'message sent';
                    messageDiv.innerHTML = `
                        <div class="message-bubble">${message}</div>
                        <div class="message-time">Just now</div>
                    `;

                    // Add to messages container
                    messagesContainer.appendChild(messageDiv);

                    // Clear input
                    messageInput.value = '';

                    // Scroll to bottom
                    messagesContainer.scrollTop = messagesContainer.scrollHeight;

                    // Simulate reply after delay
                    setTimeout(() => {
                        const replyDiv = document.createElement('div');
                        replyDiv.className = 'message received';
                        replyDiv.innerHTML = `
                            <div class="message-bubble">Thanks for your message! I'll get back to you shortly.</div>
                            <div class="message-time">Just now</div>
                        `;
                        messagesContainer.appendChild(replyDiv);

                        // Scroll to bottom again
                        messagesContainer.scrollTop = messagesContainer.scrollHeight;
                    }, 2000);
                }
            }

            sendButton.addEventListener('click', sendMessage);

            messageInput.addEventListener('keypress', function (e) {
                if (e.key === 'Enter') {
                    sendMessage();
                }
            });

            // Scroll to bottom of messages on load
            const messagesContainer = document.querySelector('.chat-messages');
            messagesContainer.scrollTop = messagesContainer.scrollHeight;
        });
    </script>
</body>

</html>
