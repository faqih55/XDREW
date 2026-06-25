const path = require('path');

module.exports = {
    mode: 'production',
    entry: './resources/js/ai-chat/index.jsx',
    output: {
        path: path.resolve(__dirname, 'public/js'),
        filename: 'ai-chat.js',
    },
    module: {
        rules: [
            {
                test: /\.(js|jsx)$/,
                exclude: /node_modules/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: [
                            ['@babel/preset-env', { targets: '> 0.5%, last 2 versions, not dead' }],
                            ['@babel/preset-react', { runtime: 'automatic' }],
                        ],
                    },
                },
            },
        ],
    },
    resolve: {
        extensions: ['.js', '.jsx'],
    },
};
