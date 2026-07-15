<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield('title', 'XDrew Fashion')</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
    
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#4edea3",
                        "on-background": "#dde4dd",
                        "background": "#0e1511",
                        "surface-container-low": "#161d19",
                        "outline-variant": "#3c4a42",
                        "on-surface-variant": "#bbcabf",
                        "error": "#ffb4ab",
                        "on-primary-container": "#00422b"
                    },
                    fontFamily: {
                        "body-md": ["Poppins", "sans-serif"],
                        "headline-sm": ["Outfit", "sans-serif"],
                        "display-lg": ["Outfit", "sans-serif"]
                    }
                },
            },
        }
    </script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #0e1511;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Outfit', sans-serif;
        }
        
        .bg-slide {
            position: fixed;
            inset: 0;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            z-index: 0;
            transition: opacity 2.5s ease-in-out;
        }
        
        .bg-slide-1 {
            background-image: url('{{ asset("images/login-bg.png") }}');
        }
        
        .bg-slide-2 {
            background-image: url('{{ asset("images/login-bg-2.png") }}');
        }
        
        .overlay {
            background: radial-gradient(circle, rgba(0, 0, 0, 0.2) 0%, rgba(0, 0, 0, 0.65) 100%);
            z-index: 1;
        }

        .liquid-glass-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(28px) saturate(140%);
            -webkit-backdrop-filter: blur(28px) saturate(140%);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 40px;
            box-shadow: 
                0 25px 50px -12px rgba(0, 0, 0, 0.6),
                inset 0 1px 1px rgba(255, 255, 255, 0.25),
                inset 0 10px 20px rgba(255, 255, 255, 0.05),
                inset 0 -15px 30px rgba(0, 0, 0, 0.35);
            position: relative;
            overflow: hidden;
        }

        /* Top shine to simulate physical curved glass reflection */
        .liquid-glass-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 38%;
            background: linear-gradient(
                135deg,
                rgba(255, 255, 255, 0.18) 0%,
                rgba(255, 255, 255, 0.05) 50%,
                rgba(255, 255, 255, 0) 100%
            );
            border-radius: 40px 40px 100% 100% / 40px 40px 30px 30px;
            pointer-events: none;
            border-top: 1.5px solid rgba(255, 255, 255, 0.3);
            border-left: 1.5px solid rgba(255, 255, 255, 0.2);
        }

        .glass-input {
            background: rgba(255, 255, 255, 0.07) !important;
            border: 1.5px solid rgba(255, 255, 255, 0.12) !important;
            border-radius: 16px !important;
            color: #ffffff !important;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }
        
        .glass-input::placeholder {
            color: rgba(255, 255, 255, 0.45) !important;
        }

        .glass-input:focus {
            background: rgba(255, 255, 255, 0.12) !important;
            border-color: rgba(255, 255, 255, 0.35) !important;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.1) !important;
            outline: none !important;
            --tw-ring-color: transparent !important;
        }

        /* Checkbox styling */
        .glass-checkbox {
            background-color: rgba(255, 255, 255, 0.07) !important;
            border: 1.5px solid rgba(255, 255, 255, 0.15) !important;
            border-radius: 4px !important;
            color: rgba(255, 255, 255, 0.8) !important;
            cursor: pointer;
        }
        
        .glass-checkbox:checked {
            background-color: rgba(255, 255, 255, 0.2) !important;
            border-color: rgba(255, 255, 255, 0.4) !important;
        }
        
        .glass-checkbox:focus {
            --tw-ring-color: transparent !important;
            outline: none !important;
        }

        /* Pill Log In Button - Green Liquid Glass Hover */
        .glass-btn {
            background: rgba(255, 255, 255, 0.05);
            border: 1.5px solid rgba(255, 255, 255, 0.4);
            border-radius: 9999px;
            color: #ffffff;
            font-weight: 500;
            letter-spacing: 0.05em;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            width: 140px;
            display: block;
            margin: 0 auto;
        }

        .glass-btn:hover {
            background: rgba(78, 222, 163, 0.12);
            border-color: rgba(78, 222, 163, 0.5);
            color: #4edea3;
            transform: translateY(-1px);
            box-shadow: 
                0 8px 25px rgba(78, 222, 163, 0.25),
                inset 0 0 10px rgba(78, 222, 163, 0.1);
            text-shadow: 0 0 8px rgba(78, 222, 163, 0.3);
            width: 260px;
        }

        .glass-btn:active {
            transform: translateY(1px);
        }

        /* Social Login Buttons */
        .glass-social-btn {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.05);
            border: 1.5px solid rgba(255, 255, 255, 0.12);
            border-radius: 9999px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            overflow: hidden;
            white-space: nowrap;
            padding: 0 10px;
        }

        .glass-social-text {
            max-width: 0;
            opacity: 0;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            font-size: 0.75rem;
            font-weight: 500;
            color: #ffffff;
            margin-left: 0;
            overflow: hidden;
        }

        .glass-social-btn:hover {
            width: 120px;
            justify-content: flex-start;
            padding-left: 12px;
            padding-right: 12px;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 255, 255, 0.08);
        }

        .glass-social-btn:hover .glass-social-text {
            max-width: 80px;
            opacity: 1;
            margin-left: 6px;
        }

        .logo-text {
            font-family: 'Outfit', sans-serif;
            font-size: 1.75rem;
            font-weight: 900;
            letter-spacing: -0.025em;
            color: #ffffff;
            transition: all 0.3s ease;
            text-shadow: 0 0 30px rgba(78, 222, 163, 0);
            line-height: 1;
        }

        .logo-text:hover {
            color: #4edea3;
            text-shadow: 0 0 20px rgba(78, 222, 163, 0.5);
        }

        @keyframes liquid-glow {
            0% {
                transform: translate(0, 0) scale(1);
            }
            50% {
                transform: translate(40px, -30px) scale(1.1);
            }
            100% {
                transform: translate(-20px, 30px) scale(0.95);
            }
        }
        
        .liquid-glow-1 {
            position: fixed;
            width: 350px;
            height: 350px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(78, 222, 163, 0.22) 0%, rgba(78, 222, 163, 0) 70%);
            filter: blur(60px);
            z-index: 2;
            pointer-events: none;
            animation: liquid-glow 12s infinite alternate ease-in-out;
            top: 25%;
            left: 20%;
        }
        
        .liquid-glow-2 {
            position: fixed;
            width: 380px;
            height: 380px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(234, 179, 8, 0.15) 0%, rgba(234, 179, 8, 0) 70%);
            filter: blur(70px);
            z-index: 2;
            pointer-events: none;
            animation: liquid-glow 15s infinite alternate-reverse ease-in-out;
            bottom: 25%;
            right: 20%;
        }
    </style>
</head>
<body class="@yield('body_class', 'min-h-screen font-body-md relative overflow-y-auto select-none')">
    @yield('content')
    @stack('scripts')
</body>
</html>
