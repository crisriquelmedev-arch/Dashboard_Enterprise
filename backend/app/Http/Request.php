<?php

declare(strict_types=1);

namespace App\Http;

final class Request {

    public function __construct(
        private string $method,
        private string $path,
        private array $query,
        )
    {}

    public static function fromGlobals():self{
        $method=$_SERVER['REQUEST_METHOD'] ?? 'GET';
        $path= parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
        $query = $_GET ?? [];

        return new self($method, $path, $query);
    }

    public function method():string{
        return $this->method;
    }

    public function path():string{
        return $this->path;
    }

    public function query():array{
        return $this->query;
    }

    public function queryInt(string $key, ?int $default =null): ?int{
        if(!isset($this->query[$key])){
            return $default;
        }
        return (int) $this->query[$key];
    }

    public function queryString(string $key, ?string $default = null): ?string{
        if(!isset($this->query[$key])){
            return $default;
        }
        $value = trim((string) $this->query[$key]);
        return $value === '' ? $default : $value;
    }


}