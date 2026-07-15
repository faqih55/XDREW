    {{-- ═══════════════════════════════════════════════
         NOTIFICATION JAVASCRIPT
    ═══════════════════════════════════════════════ --}}
    @auth('admin')
    <script>
        const NOTIF_URL      = "{{ route('admin.notifications.index') }}";
        const MARK_ALL_URL   = "{{ route('admin.notifications.markAll') }}";
        const CSRF           = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        let notifOpen    = false;
        let notifLoaded  = false;

        /* ── Spin keyframe ── */
        const style = document.createElement('style');
        style.textContent = `@keyframes spin { from{transform:rotate(0deg)} to{transform:rotate(360deg)} }`;
        document.head.appendChild(style);

        /* ── Toggle dropdown ── */
        function toggleNotif() {
            notifOpen = !notifOpen;
            const drop = document.getElementById('adminNotifDropdown');
            drop.classList.toggle('open', notifOpen);

            if (notifOpen && !notifLoaded) {
                loadNotifications();
            }
        }

        /* ── Close when clicking outside ── */
        document.addEventListener('click', function(e) {
            if (notifOpen && !document.getElementById('adminNotifWrap').contains(e.target)) {
                notifOpen = false;
                document.getElementById('adminNotifDropdown').classList.remove('open');
            }
        });

        /* ── Load notifications via AJAX ── */
        async function loadNotifications() {
            try {
                const res  = await fetch(NOTIF_URL, { headers: { 'X-Requested-With': 'XMLHttpRequest' } });
                const data = await res.json();
                renderNotifications(data);
                notifLoaded = true;
            } catch(err) {
                document.getElementById('adminNotifList').innerHTML = `
                    <div class="notif-empty">
                        <div class="notif-empty-icon"><span class="material-symbols-outlined" style="font-size:22px;color:rgba(255,255,255,.25);">wifi_off</span></div>
                        <p>Gagal memuat notifikasi</p>
                    </div>`;
            }
        }

        /* ── Render notifications ── */
        function renderNotifications(data) {
            const list   = document.getElementById('adminNotifList');
            const dot    = document.getElementById('adminNotifDot');
            const btn    = document.getElementById('adminNotifBtn');
            const count  = document.getElementById('adminNotifCount');
            const footer = document.getElementById('adminNotifFooter');

            const { notifications, unread_count } = data;

            /* Update badge */
            if (unread_count > 0) {
                dot.style.display = 'block';
                btn.classList.add('has-unread');
                count.textContent = unread_count + ' baru';
                count.style.display = 'inline';
                footer.style.display = 'none';
            } else {
                dot.style.display = 'none';
                btn.classList.remove('has-unread');
                count.style.display = 'none';
                if (notifications.length > 0) footer.style.display = 'flex';
            }

            if (notifications.length === 0) {
                list.innerHTML = `
                    <div class="notif-empty">
                        <div class="notif-empty-icon"><span class="material-symbols-outlined" style="font-size:24px;color:rgba(255,255,255,.2);">notifications_none</span></div>
                        <p>Belum ada notifikasi</p>
                        <span>Notifikasi akan muncul di sini</span>
                    </div>`;
                return;
            }

            list.innerHTML = notifications.map(n => `
                <div class="notif-item ${n.is_unread ? 'unread' : 'read'}"
                     onclick="markOneRead('${n.id}', '${n.url || ''}', this)">
                    <div class="notif-icon-wrap" style="background:${n.color}18;border:1px solid ${n.color}28;">
                        <span class="material-symbols-outlined" style="font-size:17px;color:${n.color};font-variation-settings:'FILL' 1">${n.icon}</span>
                    </div>
                    <div class="notif-content">
                        <p class="notif-title">${n.title}</p>
                        <p class="notif-msg">${n.message}</p>
                        <p class="notif-time" style="color:${n.color}88;">${n.time}</p>
                    </div>
                    ${n.is_unread ? `<span class="notif-unread-dot" style="background:${n.color};box-shadow:0 0 5px ${n.color};"></span>` : ''}
                </div>
            `).join('');
        }

        /* ── Mark one as read ── */
        async function markOneRead(id, url, el) {
            const markUrl = `{{ url('/admin/notifications') }}/${id}/read`;
            try {
                await fetch(markUrl, {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': CSRF, 'X-Requested-With': 'XMLHttpRequest' }
                });
                el.classList.remove('unread');
                el.classList.add('read');
                /* remove dot */
                const dot = el.querySelector('.notif-unread-dot');
                if (dot) dot.remove();

                /* update badge count */
                const curCount = parseInt(document.getElementById('adminNotifCount').textContent) || 0;
                if (curCount > 0) {
                    const newCount = curCount - 1;
                    if (newCount <= 0) {
                        document.getElementById('adminNotifDot').style.display = 'none';
                        document.getElementById('adminNotifBtn').classList.remove('has-unread');
                        document.getElementById('adminNotifCount').style.display = 'none';
                        document.getElementById('adminNotifFooter').style.display = 'flex';
                    } else {
                        document.getElementById('adminNotifCount').textContent = newCount + ' baru';
                    }
                }
            } catch(e) {}

            if (url && url !== '') {
                setTimeout(() => { window.location.href = url; }, 300);
            }
        }

        /* ── Mark ALL as read ── */
        async function markAllRead() {
            try {
                await fetch(MARK_ALL_URL, {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': CSRF, 'X-Requested-With': 'XMLHttpRequest' }
                });
                /* Update UI */
                document.querySelectorAll('.notif-item.unread').forEach(el => {
                    el.classList.remove('unread'); el.classList.add('read');
                    const dot = el.querySelector('.notif-unread-dot');
                    if (dot) dot.remove();
                });
                document.getElementById('adminNotifDot').style.display = 'none';
                document.getElementById('adminNotifBtn').classList.remove('has-unread');
                document.getElementById('adminNotifCount').style.display = 'none';
                document.getElementById('adminNotifFooter').style.display = 'flex';
            } catch(e) {}
        }

        /* ── Auto-load badge count on page load ── */
        window.addEventListener('DOMContentLoaded', async function() {
            try {
                const res  = await fetch(NOTIF_URL, { headers: { 'X-Requested-With': 'XMLHttpRequest' } });
                const data = await res.json();
                if (data.unread_count > 0) {
                    document.getElementById('adminNotifDot').style.display = 'block';
                    document.getElementById('adminNotifBtn').classList.add('has-unread');
                }
            } catch(e) {}
        });
    </script>
    @endauth
