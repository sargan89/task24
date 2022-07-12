<?php

function get_template_contents(string $filePath, array $variables = []): string
{
    if ([] !== $variables) {
        extract($variables, EXTR_PREFIX_ALL | EXTR_OVERWRITE, '');
    }

    ob_start();

    require $filePath;

    return ob_get_clean();
}

function get_header(string $title): void {
    echo get_template_contents(__DIR__ . '/../templates/header.php', [
        'title' => $title,
    ]);
}

function get_footer(): void {
    echo get_template_contents(__DIR__ . '/../templates/footer.php');
}