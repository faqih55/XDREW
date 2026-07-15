<div id="gemini-chat-widget" class="fixed bottom-6 right-6 z-50 font-body-md">
    <!-- Chat Button -->
    <button id="gemini-chat-toggle" class="w-14 h-14 bg-gradient-to-tr from-[#10b981] to-[#4edea3] text-white rounded-full flex items-center justify-center shadow-lg hover:shadow-xl transition-transform hover:scale-105 active:scale-95">
        <span class="material-symbols-outlined text-[28px]" id="gemini-chat-icon">smart_toy</span>
    </button>

    <!-- Chat Box -->
    <div id="gemini-chat-box" class="hidden absolute bottom-16 right-0 w-[350px] h-[500px] bg-white rounded-2xl shadow-[0_10px_40px_rgba(0,0,0,0.15)] flex flex-col overflow-hidden border border-gray-100 transition-opacity duration-300 opacity-0 transform translate-y-4">
        
        <!-- Header -->
        <div class="bg-gradient-to-r from-[#1A2E26] to-[#2c4c3f] p-4 flex justify-between items-center text-white">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center">
                    <span class="material-symbols-outlined text-[20px]">smart_toy</span>
                </div>
                <div>
                    <h3 class="font-bold text-sm font-heading tracking-wider">XDrew Assistant</h3>
                    <p class="text-[10px] text-green-300">Online & Ready</p>
                </div>
            </div>
            <button id="gemini-chat-close" class="text-white/70 hover:text-white transition-colors">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>

        <!-- Messages Area -->
        <div id="gemini-chat-messages" class="flex-grow p-4 overflow-y-auto bg-gray-50 flex flex-col gap-3">
            <!-- Welcome Message -->
            <div class="flex items-end gap-2">
                <div class="w-6 h-6 rounded-full bg-[#1A2E26] flex items-center justify-center flex-shrink-0">
                    <span class="material-symbols-outlined text-[12px] text-white">smart_toy</span>
                </div>
                <div class="bg-white p-3 rounded-2xl rounded-bl-none text-xs text-gray-700 shadow-sm border border-gray-100 max-w-[80%]">
                    Halo! Saya Asisten Belanja XDrew Fashion. Ada yang bisa saya bantu carikan hari ini? 😊
                </div>
            </div>
        </div>

        <!-- Input Area -->
        <div class="p-3 bg-white border-t border-gray-100">
            <form id="gemini-chat-form" class="flex items-center gap-2 relative">
                <input type="text" id="gemini-chat-input" placeholder="Tanya tentang produk..." class="w-full bg-gray-100 text-xs px-4 py-3 rounded-full outline-none focus:ring-2 focus:ring-[#10b981]/30 transition-all border border-transparent">
                <button type="submit" id="gemini-chat-send" class="absolute right-1 w-8 h-8 bg-[#10b981] hover:bg-[#059669] text-white rounded-full flex items-center justify-center transition-colors">
                    <span class="material-symbols-outlined text-[16px]">send</span>
                </button>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const toggleBtn = document.getElementById('gemini-chat-toggle');
    const closeBtn = document.getElementById('gemini-chat-close');
    const chatBox = document.getElementById('gemini-chat-box');
    const toggleIcon = document.getElementById('gemini-chat-icon');
    const chatForm = document.getElementById('gemini-chat-form');
    const chatInput = document.getElementById('gemini-chat-input');
    const messagesContainer = document.getElementById('gemini-chat-messages');

    let chatHistory = [];
    let isChatOpen = false;

    function toggleChat() {
        isChatOpen = !isChatOpen;
        if (isChatOpen) {
            chatBox.classList.remove('hidden');
            // Allow display block to apply before animating opacity
            setTimeout(() => {
                chatBox.classList.remove('opacity-0', 'translate-y-4');
                chatBox.classList.add('opacity-100', 'translate-y-0');
            }, 10);
            toggleIcon.innerText = 'close';
            chatInput.focus();
        } else {
            chatBox.classList.remove('opacity-100', 'translate-y-0');
            chatBox.classList.add('opacity-0', 'translate-y-4');
            setTimeout(() => {
                chatBox.classList.add('hidden');
            }, 300);
            toggleIcon.innerText = 'smart_toy';
        }
    }

    toggleBtn.addEventListener('click', toggleChat);
    closeBtn.addEventListener('click', toggleChat);

    function appendMessage(text, isUser = false) {
        const msgDiv = document.createElement('div');
        msgDiv.className = `flex items-end gap-2 ${isUser ? 'justify-end' : ''} animate-fade-in`;
        
        let avatarHTML = '';
        if (!isUser) {
            avatarHTML = `
                <div class="w-6 h-6 rounded-full bg-[#1A2E26] flex items-center justify-center flex-shrink-0">
                    <span class="material-symbols-outlined text-[12px] text-white">smart_toy</span>
                </div>
            `;
        }

        const bubbleHTML = `
            <div class="${isUser ? 'bg-[#10b981] text-white rounded-br-none' : 'bg-white text-gray-700 rounded-bl-none border border-gray-100'} p-3 rounded-2xl text-xs shadow-sm max-w-[80%] whitespace-pre-wrap leading-relaxed">
                ${text}
            </div>
        `;

        msgDiv.innerHTML = isUser ? bubbleHTML : avatarHTML + bubbleHTML;
        messagesContainer.appendChild(msgDiv);
        scrollToBottom();
    }

    function showTypingIndicator() {
        const indicator = document.createElement('div');
        indicator.id = 'gemini-typing-indicator';
        indicator.className = 'flex items-end gap-2';
        indicator.innerHTML = `
            <div class="w-6 h-6 rounded-full bg-[#1A2E26] flex items-center justify-center flex-shrink-0">
                <span class="material-symbols-outlined text-[12px] text-white">smart_toy</span>
            </div>
            <div class="bg-white p-3 rounded-2xl rounded-bl-none border border-gray-100 flex gap-1 items-center h-9">
                <div class="w-1.5 h-1.5 bg-gray-400 rounded-full animate-bounce"></div>
                <div class="w-1.5 h-1.5 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                <div class="w-1.5 h-1.5 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.4s"></div>
            </div>
        `;
        messagesContainer.appendChild(indicator);
        scrollToBottom();
    }

    function removeTypingIndicator() {
        const indicator = document.getElementById('gemini-typing-indicator');
        if (indicator) indicator.remove();
    }

    function scrollToBottom() {
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
    }

    chatForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        const message = chatInput.value.trim();
        if (!message) return;

        // Tampilkan pesan user
        appendMessage(message, true);
        chatInput.value = '';
        
        // Munculkan efek mengetik
        showTypingIndicator();

        try {
            const response = await fetch('/api/chat', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                },
                body: JSON.stringify({
                    message: message,
                    history: chatHistory
                })
            });

            const data = await response.json();
            removeTypingIndicator();

            if (response.ok) {
                appendMessage(data.reply);
                // Simpan ke history
                chatHistory.push({ role: 'user', parts: [{ text: message }] });
                chatHistory.push({ role: 'model', parts: [{ text: data.reply }] });
            } else {
                appendMessage(data.error || 'Terjadi kesalahan saat menghubungi AI.');
            }
        } catch (error) {
            removeTypingIndicator();
            appendMessage('Terjadi kesalahan jaringan.');
        }
    });

});
</script>

<style>
@keyframes fade-in {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}
.animate-fade-in {
    animation: fade-in 0.3s ease-out forwards;
}
</style>
