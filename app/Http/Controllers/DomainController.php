<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateDomainRequest;
use App\Models\Domain;
use App\Services\DomainService;

class DomainController extends Controller
{
    protected $domainService;

    public function __construct(DomainService $domainService)
    {
        $this->domainService = $domainService;
    }

    public function store(StoreUpdateDomainRequest $request)
    {
        $original = $request->input('domain');

        if (! $this->domainService->validateDomainFormat($original)) {
            return back()->with('error', 'This is not a valid URL. It must start with http://, https://, or www.');
        }

        $cleanDomain = $this->domainService->sanitizeDomain($original);

        if ($this->domainService->isDomainTaken($cleanDomain)) {
            return back()->with('error', 'This domain is already added by another user.');
        }

        $this->domainService->createDomain($cleanDomain);

        return back()->with('success', 'Domain added successfully!');
    }

    public function update(StoreUpdateDomainRequest $request, Domain $domain)
    {
        $original = $request->input('domain');

        if (! $this->domainService->validateDomainFormat($original)) {
            return back()->with('error', 'This is not a valid URL. It must start with http://, https://, or www.');
        }

        $cleanDomain = $this->domainService->sanitizeDomain($original);

        if ($this->domainService->isDomainTaken($cleanDomain, $domain->id)) {
            return back()->with('error', 'This domain is already used by another user.');
        }

        $this->domainService->updateDomain($domain, $cleanDomain);

        return back()->with('success', 'Domain updated successfully!');
    }

    public function destroy(Domain $domain)
    {
        $this->domainService->deleteDomain($domain);

        return back()->with('success', 'Domain deleted successfully!');
    }
}
