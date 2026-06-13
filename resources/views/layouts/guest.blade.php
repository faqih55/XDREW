<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield('title', 'XDrew Fashion')</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&family=Inter:wght@400;500&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-tertiary": "#650911",
                        "on-secondary": "#213145",
                        "on-surface-variant": "#bbcabf",
                        "inverse-surface": "#dde4dd",
                        "surface-container": "#1a211d",
                        "surface-container-highest": "#2f3632",
                        "surface-variant": "#2f3632",
                        "surface-bright": "#343b36",
                        "on-surface": "#dde4dd",
                        "secondary": "#b7c8e1",
                        "background": "#0e1511",
                        "surface-dim": "#0e1511",
                        "error-container": "#93000a",
                        "primary-container": "#10b981",
                        "on-secondary-container": "#a9bad3",
                        "outline": "#86948a",
                        "surface-container-high": "#242c27",
                        "on-background": "#dde4dd",
                        "on-primary-fixed-variant": "#005236",
                        "on-tertiary-fixed-variant": "#842225",
                        "on-tertiary-fixed": "#410005",
                        "surface-tint": "#4edea3",
                        "tertiary-fixed-dim": "#ffb3af",
                        "secondary-container": "#3a4a5f",
                        "primary-fixed-dim": "#4edea3",
                        "on-tertiary-container": "#711419",
                        "surface-container-low": "#161d19",
                        "tertiary-fixed": "#ffdad7",
                        "on-error": "#690005",
                        "tertiary": "#ffb3af",
                        "secondary-fixed": "#d3e4fe",
                        "on-secondary-fixed": "#0b1c30",
                        "surface-container-lowest": "#09100c",
                        "inverse-on-surface": "#2b322d",
                        "surface": "#0e1511",
                        "on-secondary-fixed-variant": "#38485d",
                        "on-error-container": "#ffdad6",
                        "primary": "#4edea3",
                        "on-primary-fixed": "#002113",
                        "primary-fixed": "#6ffbbe",
                        "inverse-primary": "#006c49",
                        "on-primary": "#003824",
                        "tertiary-container": "#fc7c78",
                        "outline-variant": "#3c4a42",
                        "on-primary-container": "#00422b",
                        "secondary-fixed-dim": "#b7c8e1",
                        "error": "#ffb4ab"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "base": "4px",
                        "xs": "8px",
                        "sm": "16px",
                        "margin-mobile": "16px",
                        "lg": "48px",
                        "xl": "80px",
                        "gutter": "24px",
                        "margin-desktop": "64px",
                        "md": "24px"
                    },
                    "fontFamily": {
                        "body-md": ["Inter"],
                        "headline-sm": ["Montserrat"],
                        "display-lg": ["Montserrat"],
                        "caption": ["Inter"],
                        "body-lg": ["Inter"],
                        "headline-md": ["Montserrat"],
                        "label-md": ["Inter"],
                        "display-lg-mobile": ["Montserrat"]
                    },
                    "fontSize": {
                        "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
                        "headline-sm": ["24px", {"lineHeight": "32px", "fontWeight": "600"}],
                        "display-lg": ["48px", {"lineHeight": "56px", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                        "caption": ["12px", {"lineHeight": "16px", "fontWeight": "400"}],
                        "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "400"}],
                        "headline-md": ["32px", {"lineHeight": "40px", "fontWeight": "600"}],
                        "label-md": ["14px", {"lineHeight": "20px", "letterSpacing": "0.05em", "fontWeight": "500"}],
                        "display-lg-mobile": ["36px", {"lineHeight": "42px", "letterSpacing": "-0.02em", "fontWeight": "700"}]
                    }
                },
            },
        }
    </script>
    <style>
        .glass-card {
            background: rgba(30, 41, 59, 0.6);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .glow-hover:hover {
            box-shadow: 0 0 20px rgba(16, 185, 129, 0.2);
        }
        .auth-bg-overlay {
            background: linear-gradient(to right, rgba(14, 21, 17, 0.9) 0%, rgba(14, 21, 17, 0.2) 100%);
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            vertical-align: middle;
        }
    </style>
</head>
<body class="bg-background text-on-background min-h-screen flex font-body-md selection:bg-primary/30 selection:text-primary">
    @yield('content')
</body>
</html>