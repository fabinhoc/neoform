<?php

use App\Models\Company;
use App\Services\CompanyService;
use Illuminate\Support\Facades\Storage;
use Faker\Factory as Faker;

beforeEach(function () {
    Storage::fake('public'); // Usa o disco fake para testar uploads
});

test('it should create a company without logo', function () {
    $service = new CompanyService();
    $factory = Company::factory()->make(['logo' => '']);

    $response = $service->create($factory->toArray());

    expect($response)->toBeInstanceOf(Company::class);
});

it('should create a company with logo', function () {
    $faker = Faker::create();

    $data = [
        'name' => 'Test Company',
        'email' => 'test@company.com',
        'logo' => $faker->image(public_path('storage'), 640, 480, null, false),
    ];

    $companyService = new CompanyService();

    $company = $companyService->create($data);

    expect($company)->toBeInstanceOf(Company::class);
    expect($company->name)->toBe('Test Company');

    $this->assertTrue(Storage::disk('public')->exists($company->logo));
});

it('should update a company and delete the old logo', function () {
    $faker = Faker::create();

    $company = Company::factory()->create([
        'name' => 'Existing Company',
        'email' => 'existing@company.com',
        'logo' => 'old-logo.jpg', // Logo existente
    ]);

    $data = [
        'name' => 'Updated Company',
        'email' => 'updated@company.com',
        'logo' => $faker->image(public_path('storage'), 640, 480, null, false),
    ];

    $companyService = new CompanyService();

    $updatedCompany = $companyService->update($company->id, $data);

    expect($updatedCompany->name)->toBe('Updated Company');
    expect($updatedCompany->email)->toBe('updated@company.com');

    $this->assertFalse(Storage::disk('public')->exists($company->logo));
    $this->assertTrue(Storage::disk('public')->exists($updatedCompany->logo));
});
