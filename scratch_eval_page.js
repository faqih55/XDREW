const http = require('http');
const WebSocket = require('ws');

http.get('http://127.0.0.1:9222/json', (res) => {
    let data = '';
    res.on('data', (chunk) => data += chunk);
    res.on('end', () => {
        try {
            const targets = JSON.parse(data);
            const pageTarget = targets.find(t => t.type === 'page' && t.webSocketDebuggerUrl);
            if (!pageTarget) {
                console.error('No active page targets found!');
                process.exit(1);
            }
            
            connectToPage(pageTarget.webSocketDebuggerUrl);
        } catch (e) {
            console.error('Failed to parse targets JSON:', e);
            process.exit(1);
        }
    });
}).on('error', (err) => {
    console.error('Error fetching targets:', err.message);
    process.exit(1);
});

function connectToPage(wsUrl) {
    console.log('Connecting to DevTools:', wsUrl);
    const ws = new WebSocket(wsUrl);
    let id = 1;

    function send(method, params = {}) {
        const msgId = id++;
        ws.send(JSON.stringify({ id: msgId, method, params }));
        return msgId;
    }

    ws.on('open', () => {
        console.log('Connected. Enabling Runtime and Page...');
        send('Runtime.enable');
        send('Page.enable');
        
        console.log('Navigating to http://127.0.0.1:8000/produk...');
        send('Page.navigate', { url: 'http://127.0.0.1:8000/produk' });
    });

    ws.on('message', (data) => {
        const response = JSON.parse(data.toString());
        
        // Listen for unhandled exceptions
        if (response.method === 'Runtime.exceptionThrown') {
            console.error('CRITICAL PAGE EXCEPTION:', JSON.stringify(response.params.exceptionDetails, null, 2));
        }
        
        if (response.method === 'Page.loadEventFired' || response.method === 'Page.frameStoppedLoading') {
            console.log('Page loaded. Waiting 3 seconds...');
            setTimeout(() => {
                send('Runtime.evaluate', {
                    expression: `
                        (function() {
                            const el = document.getElementById('xdrew-ai-chat');
                            if (!el) return 'Element #xdrew-ai-chat not found';
                            return {
                                outerHTML: el.outerHTML,
                                childrenCount: el.children.length
                            };
                        })()
                    `,
                    returnByValue: true
                });
            }, 3000);
        }
        
        if (response.result && response.result.result) {
            const result = response.result.result;
            if (result.value) {
                console.log('DOM STATE:', JSON.stringify(result.value, null, 2));
                // Wait a bit more to catch any late exceptions before exiting
                setTimeout(() => {
                    ws.close();
                    process.exit(0);
                }, 1000);
            }
        }
    });

    ws.on('error', (err) => {
        console.error('WebSocket Error:', err);
        process.exit(1);
    });
}
