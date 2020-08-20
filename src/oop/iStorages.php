<?php

interface iStorages
{
    public function all(array $only = []): array;

    public function get($key, $default = null);

    public function set($key, $value);

    public function has($key): bool;

    public function remove($key);
}