<?php

Route::group(['prefix' => config('hc.admin_url'), 'middleware' => ['web', 'auth']], function ()
{
    Route::get('hc-companies/addresses-types', ['as' => 'admin.routes.hc.companies.addresses.types.index', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_list'], 'uses' => 'hccompanies\\HCCompaniesAddressesTypesController@adminIndex']);

    Route::group(['prefix' => 'api/hc-companies/addresses-types'], function ()
    {
        Route::get('/', ['as' => 'admin.api.routes.hc.companies.addresses.types', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_list'], 'uses' => 'hccompanies\\HCCompaniesAddressesTypesController@apiIndexPaginate']);
        Route::post('/', ['middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_create'], 'uses' => 'hccompanies\\HCCompaniesAddressesTypesController@apiStore']);
        Route::delete('/', ['middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_delete'], 'uses' => 'hccompanies\\HCCompaniesAddressesTypesController@apiDestroy']);

        Route::get('list', ['as' => 'admin.api.routes.hc.companies.addresses.types.list', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_list'], 'uses' => 'hccompanies\\HCCompaniesAddressesTypesController@apiIndex']);
        Route::post('restore', ['as' => 'admin.api.routes.hc.companies.addresses.types.restore', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_update'], 'uses' => 'hccompanies\\HCCompaniesAddressesTypesController@apiRestore']);
        Route::post('merge', ['as' => 'api.v1.routes.hc.companies.addresses.types.merge', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_create', 'acl:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_delete'], 'uses' => 'hccompanies\\HCCompaniesAddressesTypesController@apiMerge']);
        Route::delete('force', ['as' => 'admin.api.routes.hc.companies.addresses.types.force', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_force_delete'], 'uses' => 'hccompanies\\HCCompaniesAddressesTypesController@apiForceDelete']);

        Route::group(['prefix' => '{id}'], function ()
        {
            Route::get('/', ['as' => 'admin.api.routes.hc.companies.addresses.types.single', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_list'], 'uses' => 'hccompanies\\HCCompaniesAddressesTypesController@apiShow']);
            Route::put('/', ['middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_update'], 'uses' => 'hccompanies\\HCCompaniesAddressesTypesController@apiUpdate']);
            Route::delete('/', ['middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_delete'], 'uses' => 'hccompanies\\HCCompaniesAddressesTypesController@apiDestroy']);

            Route::put('strict', ['as' => 'admin.api.routes.hc.companies.addresses.types.update.strict', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_update'], 'uses' => 'hccompanies\\HCCompaniesAddressesTypesController@apiUpdateStrict']);
            Route::post('duplicate', ['as' => 'admin.api.routes.hc.companies.addresses.types.duplicate.single', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_list', 'acl:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_create'], 'uses' => 'hccompanies\\HCCompaniesAddressesTypesController@apiDuplicate']);
            Route::delete('force', ['as' => 'admin.api.routes.hc.companies.addresses.types.force.single', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_force_delete'], 'uses' => 'hccompanies\\HCCompaniesAddressesTypesController@apiForceDelete']);
        });
    });
});
