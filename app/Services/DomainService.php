<?php

namespace App\Services;

use App\Models\Domain;
use Illuminate\Support\Facades\Auth;

class DomainService
{
    public function sanitizeDomain(string $input): string
    {
        $host = parse_url(trim($input), PHP_URL_HOST);

        if (! $host) {
            $host = trim(str_replace(['http://', 'https://', 'www.'], '', $input));
        } else {
            $host = preg_replace('/^www\./', '', $host);
        }

        return strtolower($host);
    }

    public function validateDomainFormat(string $domain): bool
    {
        return preg_match('/^(http:\/\/|https:\/\/|www\.)/i', $domain);
    }

    public function isDomainTaken(string $cleanDomain, ?int $ignoreId = null): bool
    {
        $query = Domain::where('domain', $cleanDomain);

        if ($ignoreId) {
            $query->where('id', '!=', $ignoreId);
        }

        return $query->exists();
    }

    public function createDomain(string $cleanDomain): Domain
    {
        return Domain::create([
            'user_id' => Auth::id(),
            'domain' => $cleanDomain,
        ]);
    }

    public function updateDomain(Domain $domain, string $cleanDomain): Domain
    {
        $domain->update(['domain' => $cleanDomain]);

        return $domain;
    }

    public function deleteDomain(Domain $domain): void
    {
        $domain->delete();
    }
}
