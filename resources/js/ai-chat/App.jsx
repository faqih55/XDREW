import React, { useState, useRef, useEffect } from 'react';
import { useChat } from '@ai-sdk/react';

// ─── Styles injected via JS ───────────────────────────────────────────────────
const injectStyles = () => {
    if (document.getElementById('xdrew-ai-chat-styles')) return;
    const style = document.createElement('style');
    style.id = 'xdrew-ai-chat-styles';
    style.textContent = `
        :root {
            --ai-green: #4edea3;
            --ai-bg: rgba(8, 12, 10, 0.97);
            --ai-border: rgba(78, 222, 163, 0.15);
            --ai-glass: rgba(15, 22, 17, 0.95);
        }

        #xdrew-ai-chat-root * { box-sizing: border-box; }

        .xdrew-fab {
            position: fixed;
            bottom: 28px;
            right: 28px;
            z-index: 9999;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #4edea3 0%, #2db87c 100%);
            box-shadow: 0 8px 32px rgba(78,222,163,0.4), 0 2px 8px rgba(0,0,0,0.4);
            transition: all 0.35s cubic-bezier(0.34,1.56,0.64,1);
            font-family: 'Material Symbols Outlined', sans-serif;
            font-size: 26px;
            color: #003824;
        }
        .xdrew-fab:hover {
            transform: scale(1.12);
            box-shadow: 0 12px 40px rgba(78,222,163,0.55), 0 4px 12px rgba(0,0,0,0.5);
        }
        .xdrew-fab:active { transform: scale(0.96); }
        .xdrew-fab .fab-label {
            position: absolute;
            right: 70px;
            white-space: nowrap;
            background: rgba(8,12,10,0.9);
            color: #4edea3;
            font-family: 'Outfit', sans-serif;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            padding: 5px 12px;
            border-radius: 20px;
            border: 1px solid rgba(78,222,163,0.25);
            opacity: 0;
            transform: translateX(10px);
            transition: all 0.2s ease;
            pointer-events: none;
        }
        .xdrew-fab:hover .fab-label {
            opacity: 1;
            transform: translateX(0);
        }

        .xdrew-panel {
            position: fixed;
            bottom: 100px;
            right: 28px;
            z-index: 9998;
            width: 380px;
            max-width: calc(100vw - 32px);
            height: 520px;
            max-height: calc(100vh - 140px);
            background: var(--ai-glass);
            border: 1px solid var(--ai-border);
            border-radius: 28px;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            box-shadow:
                0 32px 80px rgba(0,0,0,0.7),
                0 0 0 1px rgba(78,222,163,0.08),
                inset 0 1px 0 rgba(255,255,255,0.06);
            backdrop-filter: blur(40px);
            -webkit-backdrop-filter: blur(40px);
            transform-origin: bottom right;
            transition: all 0.4s cubic-bezier(0.34,1.56,0.64,1);
        }
        .xdrew-panel.hidden {
            opacity: 0;
            transform: scale(0.85) translateY(20px);
            pointer-events: none;
        }
        .xdrew-panel.visible {
            opacity: 1;
            transform: scale(1) translateY(0);
        }

        .xdrew-header {
            padding: 16px 20px;
            background: linear-gradient(135deg,rgba(78,222,163,0.1) 0%,rgba(0,0,0,0) 100%);
            border-bottom: 1px solid rgba(78,222,163,0.1);
            display: flex;
            align-items: center;
            gap: 12px;
            flex-shrink: 0;
        }
        .xdrew-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #4edea3, #2db87c);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
            box-shadow: 0 0 16px rgba(78,222,163,0.4);
        }
        .xdrew-header-info { flex: 1; }
        .xdrew-header-name {
            font-family: 'Outfit', sans-serif;
            font-weight: 800;
            font-size: 13px;
            color: #fff;
            letter-spacing: 0.05em;
        }
        .xdrew-header-status {
            font-size: 10px;
            color: #4edea3;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 4px;
            margin-top: 1px;
        }
        .status-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #4edea3;
            animation: pulse-dot 2s infinite;
        }
        @keyframes pulse-dot {
            0%,100% { box-shadow: 0 0 0 0 rgba(78,222,163,0.6); }
            50% { box-shadow: 0 0 0 4px rgba(78,222,163,0); }
        }
        .xdrew-close-btn {
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 50%;
            width: 30px;
            height: 30px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            color: rgba(255,255,255,0.5);
            font-family: 'Material Symbols Outlined', sans-serif;
            font-size: 18px;
            transition: all 0.2s;
            flex-shrink: 0;
        }
        .xdrew-close-btn:hover { background: rgba(255,100,100,0.15); color: #ff7676; border-color: rgba(255,100,100,0.3); }

        .xdrew-messages {
            flex: 1;
            overflow-y: auto;
            padding: 16px;
            display: flex;
            flex-direction: column;
            gap: 12px;
            scrollbar-width: thin;
            scrollbar-color: rgba(78,222,163,0.2) transparent;
        }
        .xdrew-messages::-webkit-scrollbar { width: 4px; }
        .xdrew-messages::-webkit-scrollbar-thumb { background: rgba(78,222,163,0.2); border-radius: 4px; }

        .xdrew-welcome {
            text-align: center;
            padding: 20px 12px;
        }
        .xdrew-welcome-emoji { font-size: 36px; margin-bottom: 8px; }
        .xdrew-welcome h4 {
            color: #fff;
            font-family: 'Outfit', sans-serif;
            font-weight: 800;
            font-size: 15px;
            margin: 0 0 6px;
        }
        .xdrew-welcome p {
            color: rgba(255,255,255,0.45);
            font-size: 12px;
            line-height: 1.6;
            margin: 0;
        }
        .xdrew-quick-btns {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            justify-content: center;
            margin-top: 14px;
        }
        .xdrew-quick-btn {
            background: rgba(78,222,163,0.08);
            border: 1px solid rgba(78,222,163,0.2);
            border-radius: 20px;
            padding: 6px 14px;
            font-size: 11px;
            font-family: 'Outfit', sans-serif;
            font-weight: 700;
            color: #4edea3;
            cursor: pointer;
            transition: all 0.2s;
        }
        .xdrew-quick-btn:hover { background: rgba(78,222,163,0.18); border-color: rgba(78,222,163,0.4); transform: translateY(-1px); }

        .msg-row {
            display: flex;
            gap: 8px;
            align-items: flex-end;
        }
        .msg-row.user { flex-direction: row-reverse; }

        .msg-ai-avatar {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: linear-gradient(135deg,#4edea3,#2db87c);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            flex-shrink: 0;
            align-self: flex-end;
        }

        .msg-bubble {
            max-width: 78%;
            padding: 10px 14px;
            border-radius: 18px;
            font-size: 13px;
            line-height: 1.55;
            word-break: break-word;
        }
        .msg-bubble.ai {
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.08);
            color: rgba(255,255,255,0.9);
            border-bottom-left-radius: 4px;
        }
        .msg-bubble.user {
            background: linear-gradient(135deg,#4edea3,#2db87c);
            color: #003824;
            font-weight: 600;
            border-bottom-right-radius: 4px;
        }
        .msg-time {
            font-size: 9px;
            color: rgba(255,255,255,0.25);
            margin-top: 3px;
            text-align: right;
        }
        .msg-row.user .msg-time { text-align: right; }

        .typing-bubble {
            display: flex;
            align-items: center;
            gap: 4px;
            padding: 12px 16px;
        }
        .typing-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #4edea3;
            opacity: 0.5;
            animation: typing 1.2s infinite;
        }
        .typing-dot:nth-child(2) { animation-delay: 0.2s; }
        .typing-dot:nth-child(3) { animation-delay: 0.4s; }
        @keyframes typing {
            0%,60%,100% { transform: translateY(0); opacity: 0.5; }
            30% { transform: translateY(-5px); opacity: 1; }
        }

        .xdrew-input-area {
            padding: 12px 16px;
            background: rgba(0,0,0,0.3);
            border-top: 1px solid rgba(78,222,163,0.08);
            display: flex;
            gap: 8px;
            align-items: flex-end;
            flex-shrink: 0;
        }
        .xdrew-input {
            flex: 1;
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 16px;
            padding: 10px 14px;
            font-size: 13px;
            font-family: 'Poppins', sans-serif;
            color: #fff;
            resize: none;
            outline: none;
            max-height: 90px;
            min-height: 40px;
            line-height: 1.5;
            transition: border-color 0.2s;
        }
        .xdrew-input::placeholder { color: rgba(255,255,255,0.25); }
        .xdrew-input:focus { border-color: rgba(78,222,163,0.4); }

        .xdrew-send-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: none;
            cursor: pointer;
            background: linear-gradient(135deg,#4edea3,#2db87c);
            color: #003824;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Material Symbols Outlined', sans-serif;
            font-size: 20px;
            flex-shrink: 0;
            transition: all 0.2s;
            box-shadow: 0 4px 12px rgba(78,222,163,0.3);
        }
        .xdrew-send-btn:hover { transform: scale(1.08); box-shadow: 0 6px 18px rgba(78,222,163,0.45); }
        .xdrew-send-btn:active { transform: scale(0.95); }
        .xdrew-send-btn:disabled { opacity: 0.5; cursor: not-allowed; transform: none; }

        .xdrew-footer-note {
            text-align: center;
            font-size: 9px;
            color: rgba(255,255,255,0.2);
            padding: 0 16px 8px;
            flex-shrink: 0;
        }

        @media (max-width: 480px) {
            .xdrew-panel { right: 12px; bottom: 88px; width: calc(100vw - 24px); }
            .xdrew-fab { right: 16px; bottom: 20px; }
        }
    `;
    document.head.appendChild(style);
};

// ─── Helpers ──────────────────────────────────────────────────────────────────
const getTime = () => new Date().toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });
const getMsgTime = (msg) => {
    const date = msg.createdAt ? new Date(msg.createdAt) : new Date();
    return date.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });
};

const QUICK_QUESTIONS = [
    '🌿 Ceritain soal XDrew dong',
    '👕 Ada koleksi apa aja?',
    '💚 Rekomendasi buat sehari-hari?',
    '📦 Info ukuran & warna?',
];

// ─── Main Component ───────────────────────────────────────────────────────────
export default function XDrewAiChat() {
    const [open, setOpen] = useState(false);
    const messagesEndRef = useRef(null);
    const inputRef = useRef(null);

    useEffect(() => { injectStyles(); }, []);

    const getCsrfToken = () => {
        return document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
    };

    const {
        messages,
        input = '',
        setInput,
        isLoading: loading,
        append
    } = useChat({
        api: '/api/ai-chat',
        headers: {
            'X-CSRF-TOKEN': getCsrfToken(),
            'Accept': 'application/json',
        },
    });

    useEffect(() => {
        messagesEndRef.current?.scrollIntoView({ behavior: 'smooth' });
    }, [messages, loading]);

    useEffect(() => {
        if (open) setTimeout(() => inputRef.current?.focus(), 300);
    }, [open]);

    const sendMessage = (text) => {
        const trimmed = (text || input).trim();
        if (!trimmed || loading) return;

        append({ role: 'user', content: trimmed });
        if (!text) {
            setInput('');
        }
    };

    const handleKey = (e) => {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            sendMessage();
        }
    };

    return (
        <>
            {/* Floating Action Button */}
            <button className="xdrew-fab" onClick={() => setOpen(o => !o)} aria-label="XDrew AI Chat">
                <span className="fab-label">XDrew AI</span>
                <span style={{ fontVariationSettings: "'FILL' 1" }}>
                    {open ? 'close' : 'auto_awesome'}
                </span>
            </button>

            {/* Chat Panel */}
            <div className={`xdrew-panel ${open ? 'visible' : 'hidden'}`} role="dialog" aria-label="XDrew AI Assistant">

                {/* Header */}
                <div className="xdrew-header">
                    <div className="xdrew-avatar">✨</div>
                    <div className="xdrew-header-info">
                        <div className="xdrew-header-name">XDrew AI</div>
                        <div className="xdrew-header-status">
                            <span className="status-dot" />
                            Fashion Assistant · Online
                        </div>
                    </div>
                    <button className="xdrew-close-btn" onClick={() => setOpen(false)}>
                        close
                    </button>
                </div>

                {/* Messages */}
                <div className="xdrew-messages">
                    {messages.length === 0 ? (
                        <div className="xdrew-welcome">
                            <div className="xdrew-welcome-emoji">🌿</div>
                            <h4>Halo! Saya XDrew AI</h4>
                            <p>Tanyakan apa saja soal koleksi, ukuran, rekomendasi outfit, atau filosofi brand XDrew.</p>
                            <div className="xdrew-quick-btns">
                                {QUICK_QUESTIONS.map((q) => (
                                    <button key={q} className="xdrew-quick-btn" onClick={() => sendMessage(q)}>
                                        {q}
                                    </button>
                                ))}
                            </div>
                        </div>
                    ) : (
                        messages.map((msg, i) => {
                            const roleClass = msg.role === 'assistant' ? 'ai' : msg.role;
                            return (
                                <div key={msg.id || i} className={`msg-row ${roleClass}`}>
                                    {msg.role === 'assistant' && (
                                        <div className="msg-ai-avatar">✨</div>
                                    )}
                                    <div>
                                        <div className={`msg-bubble ${roleClass}`}>
                                            {msg.content}
                                        </div>
                                        <div className="msg-time">{getMsgTime(msg)}</div>
                                    </div>
                                </div>
                            );
                        })
                    )}

                    {loading && messages.length > 0 && messages[messages.length - 1].role !== 'assistant' && (
                        <div className="msg-row ai">
                            <div className="msg-ai-avatar">✨</div>
                            <div className="msg-bubble ai typing-bubble">
                                <span className="typing-dot" />
                                <span className="typing-dot" />
                                <span className="typing-dot" />
                            </div>
                        </div>
                    )}
                    <div ref={messagesEndRef} />
                </div>

                {/* Input */}
                <div className="xdrew-input-area">
                    <textarea
                        ref={inputRef}
                        className="xdrew-input"
                        placeholder="Tanya seputar koleksi XDrew..."
                        value={input}
                        onChange={e => setInput(e.target.value)}
                        onKeyDown={handleKey}
                        rows={1}
                        disabled={loading}
                    />
                    <button className="xdrew-send-btn" onClick={() => sendMessage()} disabled={loading || !input.trim()}>
                        send
                    </button>
                </div>
                <div className="xdrew-footer-note">Powered by Gemini AI · XDrew Fashion</div>
            </div>
        </>
    );
}
