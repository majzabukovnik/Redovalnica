<?php

function base_path(string $path): string{
    return __DIR__ . '/../' . $path;
}

function view(string $path, array $attributes = []): void
{
    extract($attributes);

    require_once base_path("views/html/" . $path . ".php");
}