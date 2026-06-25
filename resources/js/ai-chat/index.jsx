import React from 'react';
import { createRoot } from 'react-dom/client';
import App from './App';

const container = document.getElementById('xdrew-ai-chat');
console.log('[XDrew AI] Mounting container:', container);

if (container) {
    const root = createRoot(container);
    root.render(
        <React.StrictMode>
            <div id="xdrew-ai-chat-root">
                <App />
            </div>
        </React.StrictMode>
    );
    console.log('[XDrew AI] React mounted successfully.');
} else {
    console.error('[XDrew AI] Mounting container #xdrew-ai-chat not found!');
}
