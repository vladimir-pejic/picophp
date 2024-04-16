<?php

function showHelp() {
    echo "Usage: php serve.php [options]\n";
    echo "Options:\n";
    echo "  --port <port>      Specify the port on which the server should run (default: 8000)\n";
    echo "  --create <type> <name> Create a new controller, model, or middleware with the given name.\n";
    echo "                         <type> can be --controller, --model, or --middleware\n";
    echo "  --help             Show this help message\n";
}

function createFile($type, $name) {
    $baseDir = __DIR__ . '/app/' . ucfirst($type) . 's/';
    $fileName = $baseDir . $name . '.php';

    if (!file_exists($fileName)) {
        $template = "<?php\n\nnamespace App\\" . ucfirst($type) . "s;\n\nclass $name {}\n";
        file_put_contents($fileName, $template);
        echo ucfirst($type) . " '$name' created successfully.\n";
    } else {
        echo ucfirst($type) . " '$name' already exists.\n";
    }
}

## Display help and exit
if (in_array('--help', $argv)) {
    showHelp();
    exit;
}

## Scaffolding
if (($createIndex = array_search('--create', $argv)) !== false) {
    $type = $argv[$createIndex + 1] ?? null;
    $name = $argv[$createIndex + 2] ?? null;

    if (in_array($type, ['--controller', '--model', '--middleware']) && $name) {
        createFile(substr($type, 2), $name);
        exit;
    } else {
        echo "Invalid arguments for --create. See --help for usage.\n";
        exit;
    }
}

## Custom port check
$portIndex = array_search('--port', $argv);
$port = $portIndex !== false && isset($argv[$portIndex + 1]) ? $argv[$portIndex + 1] : 8000;


$publicDir = __DIR__ . '/public';
$command = sprintf('php -S localhost:%d -t %s', $port, escapeshellarg($publicDir));

echo "Starting PHP server on http://localhost:$port\n";
echo "Document root is: $publicDir\n";
system($command);
