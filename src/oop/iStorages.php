<?php

interface iStorages
{
    public function all(array $only = []): array;

    public function get($key, $default = null): string;

    public function set($key, $value): string;

    public function has($key): string;

    public function remove($key): string;
}