<?php
header('Content-Type: application/xml; charset=utf-8');

// Configuração básica
$base_url = "http://amigumimo.com"; // Substitua pelo seu domínio
$directory = "."; // Diretório raiz do seu site

// Função para listar arquivos
function listFiles($dir) {
    $files = [];
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
    foreach ($iterator as $file) {
        if ($file->isFile() && preg_match('/\.(html|php)$/', $file->getFilename())) {
            $files[] = $file->getPathname();
        }
    }
    return $files;
}

// Gerar lista de URLs
$files = listFiles($directory);
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
foreach ($files as $file) {
    $url = $base_url . str_replace($_SERVER['DOCUMENT_ROOT'], '', realpath($file));
    $lastmod = date('Y-m-d', filemtime($file));
    echo '<url>';
    echo '<loc>' . htmlspecialchars($url) . '</loc>';
    echo '<lastmod>' . $lastmod . '</lastmod>';
    echo '<changefreq>monthly</changefreq>';
    echo '<priority>0.8</priority>';
    echo '</url>';
}
echo '</urlset>';
?>