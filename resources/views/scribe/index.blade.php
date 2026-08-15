<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Furrydomindia API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://127.0.0.1:8000";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.11.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.11.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authentication-management" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authentication-management">
                    <a href="#authentication-management">Authentication Management</a>
                </li>
                                    <ul id="tocify-subheader-authentication-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="authentication-management-POSTapi-login">
                                <a href="#authentication-management-POSTapi-login">POST api/login</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-management-POSTapi-register">
                                <a href="#authentication-management-POSTapi-register">POST api/register</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-management-POSTapi-auth-google">
                                <a href="#authentication-management-POSTapi-auth-google">POST api/auth/google</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-management-POSTapi-forgot-password">
                                <a href="#authentication-management-POSTapi-forgot-password">POST api/forgot-password</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-management-POSTapi-reset-password">
                                <a href="#authentication-management-POSTapi-reset-password">POST api/reset-password</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-management-GETapi-me">
                                <a href="#authentication-management-GETapi-me">GET api/me</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-management-POSTapi-me">
                                <a href="#authentication-management-POSTapi-me">POST api/me</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-management-POSTapi-logout">
                                <a href="#authentication-management-POSTapi-logout">POST api/logout</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-user-profile-management" class="tocify-header">
                <li class="tocify-item level-1" data-unique="user-profile-management">
                    <a href="#user-profile-management">User & Profile Management</a>
                </li>
                                    <ul id="tocify-subheader-user-profile-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="user-profile-management-GETapi-team">
                                <a href="#user-profile-management-GETapi-team">GET api/team</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="user-profile-management-GETapi-users">
                                <a href="#user-profile-management-GETapi-users">GET api/users</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="user-profile-management-GETapi-users--id-">
                                <a href="#user-profile-management-GETapi-users--id-">GET api/users/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="user-profile-management-POSTapi-users">
                                <a href="#user-profile-management-POSTapi-users">POST api/users</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="user-profile-management-PUTapi-users--id-">
                                <a href="#user-profile-management-PUTapi-users--id-">PUT api/users/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="user-profile-management-DELETEapi-users--id-">
                                <a href="#user-profile-management-DELETEapi-users--id-">DELETE api/users/{id}</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-role-access-control-rbac" class="tocify-header">
                <li class="tocify-item level-1" data-unique="role-access-control-rbac">
                    <a href="#role-access-control-rbac">Role & Access Control (RBAC)</a>
                </li>
                                    <ul id="tocify-subheader-role-access-control-rbac" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="role-access-control-rbac-GETapi-volunteer-roles-public">
                                <a href="#role-access-control-rbac-GETapi-volunteer-roles-public">GET api/volunteer-roles/public</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="role-access-control-rbac-GETapi-roles">
                                <a href="#role-access-control-rbac-GETapi-roles">GET api/roles</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="role-access-control-rbac-GETapi-permissions">
                                <a href="#role-access-control-rbac-GETapi-permissions">GET api/permissions</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="role-access-control-rbac-POSTapi-roles">
                                <a href="#role-access-control-rbac-POSTapi-roles">POST api/roles</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="role-access-control-rbac-PUTapi-roles--id-">
                                <a href="#role-access-control-rbac-PUTapi-roles--id-">PUT api/roles/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="role-access-control-rbac-DELETEapi-roles--id-">
                                <a href="#role-access-control-rbac-DELETEapi-roles--id-">DELETE api/roles/{id}</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-donations-subscriptions" class="tocify-header">
                <li class="tocify-item level-1" data-unique="donations-subscriptions">
                    <a href="#donations-subscriptions">Donations & Subscriptions</a>
                </li>
                                    <ul id="tocify-subheader-donations-subscriptions" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="donations-subscriptions-POSTapi-donations-initiate">
                                <a href="#donations-subscriptions-POSTapi-donations-initiate">Initiate a donation (One-Time or Recurring)</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="donations-subscriptions-POSTapi-donations-verify">
                                <a href="#donations-subscriptions-POSTapi-donations-verify">Verify payment signature from checkout (One-Time or Recurring)</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="donations-subscriptions-GETapi-my-donations">
                                <a href="#donations-subscriptions-GETapi-my-donations">Get authenticated user's / donor's donation and subscription records</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="donations-subscriptions-GETapi-donations--id--invoice-download">
                                <a href="#donations-subscriptions-GETapi-donations--id--invoice-download">Download donation invoice PDF</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="donations-subscriptions-GETapi-donations">
                                <a href="#donations-subscriptions-GETapi-donations">Display a listing of donations (Transactions)</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="donations-subscriptions-POSTapi-donations">
                                <a href="#donations-subscriptions-POSTapi-donations">Store a manually created donation record</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="donations-subscriptions-GETapi-donations--id-">
                                <a href="#donations-subscriptions-GETapi-donations--id-">Display a specific donation</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="donations-subscriptions-POSTapi-donations--id--send-invoice">
                                <a href="#donations-subscriptions-POSTapi-donations--id--send-invoice">Send Donation Invoice PDF to donor's email</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="donations-subscriptions-POSTapi-donations--id--verify-qr">
                                <a href="#donations-subscriptions-POSTapi-donations--id--verify-qr">Verify payment status of a dynamic UPI QR Code donation</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="donations-subscriptions-DELETEapi-donations--id-">
                                <a href="#donations-subscriptions-DELETEapi-donations--id-">Delete a donation record</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="donations-subscriptions-GETapi-subscriptions">
                                <a href="#donations-subscriptions-GETapi-subscriptions">Display list of all subscriptions</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="donations-subscriptions-GETapi-subscriptions--id-">
                                <a href="#donations-subscriptions-GETapi-subscriptions--id-">Display a specific subscription details</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="donations-subscriptions-PUTapi-subscriptions--id-">
                                <a href="#donations-subscriptions-PUTapi-subscriptions--id-">Update subscription details</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="donations-subscriptions-POSTapi-subscriptions--id--cancel">
                                <a href="#donations-subscriptions-POSTapi-subscriptions--id--cancel">Cancel a recurring subscription</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-plans-causes" class="tocify-header">
                <li class="tocify-item level-1" data-unique="plans-causes">
                    <a href="#plans-causes">Plans & Causes</a>
                </li>
                                    <ul id="tocify-subheader-plans-causes" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="plans-causes-GETapi-plans">
                                <a href="#plans-causes-GETapi-plans">GET api/plans</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="plans-causes-GETapi-plans--id-">
                                <a href="#plans-causes-GETapi-plans--id-">GET api/plans/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="plans-causes-POSTapi-plans">
                                <a href="#plans-causes-POSTapi-plans">POST api/plans</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="plans-causes-PUTapi-plans--id-">
                                <a href="#plans-causes-PUTapi-plans--id-">PUT api/plans/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="plans-causes-DELETEapi-plans--id-">
                                <a href="#plans-causes-DELETEapi-plans--id-">DELETE api/plans/{id}</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-campaigns" class="tocify-header">
                <li class="tocify-item level-1" data-unique="campaigns">
                    <a href="#campaigns">Campaigns</a>
                </li>
                                    <ul id="tocify-subheader-campaigns" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="campaigns-GETapi-campaigns">
                                <a href="#campaigns-GETapi-campaigns">List all campaigns</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="campaigns-GETapi-campaigns--id-">
                                <a href="#campaigns-GETapi-campaigns--id-">Show a campaign detail</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="campaigns-POSTapi-campaigns">
                                <a href="#campaigns-POSTapi-campaigns">Store a new campaign</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="campaigns-PUTapi-campaigns--id-">
                                <a href="#campaigns-PUTapi-campaigns--id-">Update an existing campaign</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="campaigns-POSTapi-campaigns--id-">
                                <a href="#campaigns-POSTapi-campaigns--id-">Update an existing campaign</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="campaigns-DELETEapi-campaigns--id-">
                                <a href="#campaigns-DELETEapi-campaigns--id-">Delete a campaign</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-rescue-management" class="tocify-header">
                <li class="tocify-item level-1" data-unique="rescue-management">
                    <a href="#rescue-management">Rescue Management</a>
                </li>
                                    <ul id="tocify-subheader-rescue-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="rescue-management-GETapi-rescue-cases">
                                <a href="#rescue-management-GETapi-rescue-cases">Display a listing of rescue cases.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="rescue-management-GETapi-rescue-cases--id-">
                                <a href="#rescue-management-GETapi-rescue-cases--id-">Display the specified rescue case with relationships and activities.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="rescue-management-GETapi-rescue-cases--id--download">
                                <a href="#rescue-management-GETapi-rescue-cases--id--download">Download the rescue case report as PDF.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="rescue-management-POSTapi-rescue-cases--id--send-report">
                                <a href="#rescue-management-POSTapi-rescue-cases--id--send-report">Send the rescue case report PDF to the reporter's email.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="rescue-management-PUTapi-rescue-cases--id-">
                                <a href="#rescue-management-PUTapi-rescue-cases--id-">Update the specified rescue case in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="rescue-management-DELETEapi-rescue-cases--id-">
                                <a href="#rescue-management-DELETEapi-rescue-cases--id-">Remove the specified rescue case from storage.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-animal-reports" class="tocify-header">
                <li class="tocify-item level-1" data-unique="animal-reports">
                    <a href="#animal-reports">Animal Reports</a>
                </li>
                                    <ul id="tocify-subheader-animal-reports" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="animal-reports-POSTapi-animal-reports">
                                <a href="#animal-reports-POSTapi-animal-reports">Store a new animal report (Public submission).</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="animal-reports-GETapi-animal-reports">
                                <a href="#animal-reports-GETapi-animal-reports">Retrieve list of reports (Admin).</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="animal-reports-GETapi-animal-reports--id-">
                                <a href="#animal-reports-GETapi-animal-reports--id-">Retrieve single report details (Admin).</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="animal-reports-PUTapi-animal-reports--id-">
                                <a href="#animal-reports-PUTapi-animal-reports--id-">Update report notes or status (Admin).</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="animal-reports-POSTapi-animal-reports--id--accept">
                                <a href="#animal-reports-POSTapi-animal-reports--id--accept">Accept report & create Rescue Case (Admin).</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="animal-reports-DELETEapi-animal-reports--id-">
                                <a href="#animal-reports-DELETEapi-animal-reports--id-">Delete report (Admin).</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-volunteers" class="tocify-header">
                <li class="tocify-item level-1" data-unique="volunteers">
                    <a href="#volunteers">Volunteers</a>
                </li>
                                    <ul id="tocify-subheader-volunteers" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="volunteers-GETapi-volunteers-public">
                                <a href="#volunteers-GETapi-volunteers-public">GET api/volunteers/public</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="volunteers-POSTapi-volunteers">
                                <a href="#volunteers-POSTapi-volunteers">POST api/volunteers</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="volunteers-GETapi-volunteers">
                                <a href="#volunteers-GETapi-volunteers">GET api/volunteers</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="volunteers-GETapi-volunteers--id-">
                                <a href="#volunteers-GETapi-volunteers--id-">GET api/volunteers/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="volunteers-PUTapi-volunteers--id-">
                                <a href="#volunteers-PUTapi-volunteers--id-">PUT api/volunteers/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="volunteers-DELETEapi-volunteers--id-">
                                <a href="#volunteers-DELETEapi-volunteers--id-">DELETE api/volunteers/{id}</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-in-kind-contributions" class="tocify-header">
                <li class="tocify-item level-1" data-unique="in-kind-contributions">
                    <a href="#in-kind-contributions">In-Kind Contributions</a>
                </li>
                                    <ul id="tocify-subheader-in-kind-contributions" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="in-kind-contributions-GETapi-contributions-types">
                                <a href="#in-kind-contributions-GETapi-contributions-types">Public: Get available contribution types and categories.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="in-kind-contributions-GETapi-contributions-impact-summary">
                                <a href="#in-kind-contributions-GETapi-contributions-impact-summary">Public: Get public impact summary.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="in-kind-contributions-POSTapi-contributions">
                                <a href="#in-kind-contributions-POSTapi-contributions">Public: Store new contribution request.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="in-kind-contributions-GETapi-contributions-track--referenceNumber-">
                                <a href="#in-kind-contributions-GETapi-contributions-track--referenceNumber-">Public: Track contribution status by reference number.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="in-kind-contributions-GETapi-contributions">
                                <a href="#in-kind-contributions-GETapi-contributions">Admin: Get paginated contribution requests.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="in-kind-contributions-GETapi-contributions-stats">
                                <a href="#in-kind-contributions-GETapi-contributions-stats">Admin: Get statistics summary.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="in-kind-contributions-GETapi-contributions--id-">
                                <a href="#in-kind-contributions-GETapi-contributions--id-">Admin: Show single contribution detail.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="in-kind-contributions-PATCHapi-contributions--id--status">
                                <a href="#in-kind-contributions-PATCHapi-contributions--id--status">Admin: Update status and notes.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="in-kind-contributions-POSTapi-contributions--id--notes">
                                <a href="#in-kind-contributions-POSTapi-contributions--id--notes">Admin: Add internal note.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="in-kind-contributions-DELETEapi-contributions--id-">
                                <a href="#in-kind-contributions-DELETEapi-contributions--id-">Admin: Delete a contribution.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-wishlist-management" class="tocify-header">
                <li class="tocify-item level-1" data-unique="wishlist-management">
                    <a href="#wishlist-management">Wishlist Management</a>
                </li>
                                    <ul id="tocify-subheader-wishlist-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="wishlist-management-GETapi-wishlist-items">
                                <a href="#wishlist-management-GETapi-wishlist-items">Public: Fetch active wishlist items for website.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="wishlist-management-GETapi-admin-wishlist-items">
                                <a href="#wishlist-management-GETapi-admin-wishlist-items">Admin: Fetch all wishlist items (including inactive).</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="wishlist-management-POSTapi-admin-wishlist-items">
                                <a href="#wishlist-management-POSTapi-admin-wishlist-items">Admin: Store new wishlist item.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="wishlist-management-PUTapi-admin-wishlist-items--id-">
                                <a href="#wishlist-management-PUTapi-admin-wishlist-items--id-">Admin: Update wishlist item.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="wishlist-management-GETapi-admin-wishlist-items--id--toggle-urgent">
                                <a href="#wishlist-management-GETapi-admin-wishlist-items--id--toggle-urgent">Admin: Toggle item urgency.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="wishlist-management-GETapi-admin-wishlist-items--id--toggle-progress">
                                <a href="#wishlist-management-GETapi-admin-wishlist-items--id--toggle-progress">Admin: Toggle show progress bar option.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="wishlist-management-DELETEapi-admin-wishlist-items--id-">
                                <a href="#wishlist-management-DELETEapi-admin-wishlist-items--id-">Admin: Delete wishlist item.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-blog-content-cms" class="tocify-header">
                <li class="tocify-item level-1" data-unique="blog-content-cms">
                    <a href="#blog-content-cms">Blog & Content CMS</a>
                </li>
                                    <ul id="tocify-subheader-blog-content-cms" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="blog-content-cms-GETapi-blogs">
                                <a href="#blog-content-cms-GETapi-blogs">GET api/blogs</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="blog-content-cms-GETapi-blogs--id-">
                                <a href="#blog-content-cms-GETapi-blogs--id-">GET api/blogs/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="blog-content-cms-POSTapi-blogs">
                                <a href="#blog-content-cms-POSTapi-blogs">POST api/blogs</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="blog-content-cms-PUTapi-blogs--id-">
                                <a href="#blog-content-cms-PUTapi-blogs--id-">PUT api/blogs/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="blog-content-cms-DELETEapi-blogs--id-">
                                <a href="#blog-content-cms-DELETEapi-blogs--id-">DELETE api/blogs/{id}</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-media-gallery" class="tocify-header">
                <li class="tocify-item level-1" data-unique="media-gallery">
                    <a href="#media-gallery">Media & Gallery</a>
                </li>
                                    <ul id="tocify-subheader-media-gallery" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="media-gallery-GETapi-galleries">
                                <a href="#media-gallery-GETapi-galleries">GET api/galleries</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="media-gallery-GETapi-galleries--id-">
                                <a href="#media-gallery-GETapi-galleries--id-">GET api/galleries/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="media-gallery-GETapi-media">
                                <a href="#media-gallery-GETapi-media">GET api/media</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="media-gallery-GETapi-media--id-">
                                <a href="#media-gallery-GETapi-media--id-">GET api/media/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="media-gallery-POSTapi-galleries">
                                <a href="#media-gallery-POSTapi-galleries">POST api/galleries</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="media-gallery-PUTapi-galleries--id-">
                                <a href="#media-gallery-PUTapi-galleries--id-">PUT api/galleries/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="media-gallery-DELETEapi-galleries--id-">
                                <a href="#media-gallery-DELETEapi-galleries--id-">DELETE api/galleries/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="media-gallery-POSTapi-media">
                                <a href="#media-gallery-POSTapi-media">POST api/media</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="media-gallery-PUTapi-media--id-">
                                <a href="#media-gallery-PUTapi-media--id-">PUT api/media/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="media-gallery-DELETEapi-media--id-">
                                <a href="#media-gallery-DELETEapi-media--id-">DELETE api/media/{id}</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-notifications" class="tocify-header">
                <li class="tocify-item level-1" data-unique="notifications">
                    <a href="#notifications">Notifications</a>
                </li>
                                    <ul id="tocify-subheader-notifications" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="notifications-GETapi-notifications">
                                <a href="#notifications-GETapi-notifications">GET api/notifications</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="notifications-PUTapi-notifications-read-all">
                                <a href="#notifications-PUTapi-notifications-read-all">PUT api/notifications/read-all</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="notifications-PUTapi-notifications--id--read">
                                <a href="#notifications-PUTapi-notifications--id--read">PUT api/notifications/{id}/read</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="notifications-DELETEapi-notifications--id-">
                                <a href="#notifications-DELETEapi-notifications--id-">DELETE api/notifications/{id}</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-contact-enquiries" class="tocify-header">
                <li class="tocify-item level-1" data-unique="contact-enquiries">
                    <a href="#contact-enquiries">Contact Enquiries</a>
                </li>
                                    <ul id="tocify-subheader-contact-enquiries" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="contact-enquiries-POSTapi-contacts">
                                <a href="#contact-enquiries-POSTapi-contacts">POST api/contacts</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="contact-enquiries-GETapi-contacts">
                                <a href="#contact-enquiries-GETapi-contacts">GET api/contacts</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="contact-enquiries-GETapi-contacts--id-">
                                <a href="#contact-enquiries-GETapi-contacts--id-">GET api/contacts/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="contact-enquiries-PUTapi-contacts--id-">
                                <a href="#contact-enquiries-PUTapi-contacts--id-">PUT api/contacts/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="contact-enquiries-DELETEapi-contacts--id-">
                                <a href="#contact-enquiries-DELETEapi-contacts--id-">DELETE api/contacts/{id}</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-dashboard-analytics" class="tocify-header">
                <li class="tocify-item level-1" data-unique="dashboard-analytics">
                    <a href="#dashboard-analytics">Dashboard & Analytics</a>
                </li>
                                    <ul id="tocify-subheader-dashboard-analytics" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="dashboard-analytics-GETapi-dashboard-stats">
                                <a href="#dashboard-analytics-GETapi-dashboard-stats">Get comprehensive dashboard statistics.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-system-settings" class="tocify-header">
                <li class="tocify-item level-1" data-unique="system-settings">
                    <a href="#system-settings">System Settings</a>
                </li>
                                    <ul id="tocify-subheader-system-settings" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="system-settings-GETapi-settings-public">
                                <a href="#system-settings-GETapi-settings-public">GET api/settings/public</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="system-settings-GETapi-settings">
                                <a href="#system-settings-GETapi-settings">GET api/settings</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="system-settings-PUTapi-settings">
                                <a href="#system-settings-PUTapi-settings">PUT api/settings</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-general-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="general-endpoints">
                    <a href="#general-endpoints">General Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-general-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="general-endpoints-GETapi-sitemap-xml">
                                <a href="#general-endpoints-GETapi-sitemap-xml">Generate dynamic sitemap XML containing static pages, blogs, and active campaigns.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="general-endpoints-POSTapi-webhooks-razorpay">
                                <a href="#general-endpoints-POSTapi-webhooks-razorpay">Handle Razorpay incoming webhooks for subscription events.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="general-endpoints-GETapi-attachments">
                                <a href="#general-endpoints-GETapi-attachments">GET api/attachments</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="general-endpoints-GETapi-attachments--id-">
                                <a href="#general-endpoints-GETapi-attachments--id-">GET api/attachments/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="general-endpoints-POSTapi-attachments">
                                <a href="#general-endpoints-POSTapi-attachments">POST api/attachments</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="general-endpoints-DELETEapi-attachments--id-">
                                <a href="#general-endpoints-DELETEapi-attachments--id-">DELETE api/attachments/{id}</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: August 15, 2026</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>http://127.0.0.1:8000</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="authentication-management">Authentication Management</h1>

    <p>APIs for user authentication, registration, Google OAuth, password resets, and profile management.</p>

                                <h2 id="authentication-management-POSTapi-login">POST api/login</h2>

<p>
</p>



<span id="example-requests-POSTapi-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"gbailey@example.net\",
    \"password\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "gbailey@example.net",
    "password": "architecto"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-login">
</span>
<span id="execution-results-POSTapi-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-login"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-login">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-login" data-method="POST"
      data-path="api/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-login"
                    onclick="tryItOut('POSTapi-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-login"
                    onclick="cancelTryOut('POSTapi-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-login"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-login"
               value="gbailey@example.net"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>gbailey@example.net</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-login"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="authentication-management-POSTapi-register">POST api/register</h2>

<p>
</p>



<span id="example-requests-POSTapi-register">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/register" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"b\",
    \"email\": \"zbailey@example.net\",
    \"password\": \"-0pBNvYgxw\",
    \"phone\": \"a\",
    \"dob\": \"2026-08-15T16:17:02\",
    \"anniversary\": \"2026-08-15T16:17:02\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/register"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "b",
    "email": "zbailey@example.net",
    "password": "-0pBNvYgxw",
    "phone": "a",
    "dob": "2026-08-15T16:17:02",
    "anniversary": "2026-08-15T16:17:02"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-register">
</span>
<span id="execution-results-POSTapi-register" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-register"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-register"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-register">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-register" data-method="POST"
      data-path="api/register"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-register', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-register"
                    onclick="tryItOut('POSTapi-register');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-register"
                    onclick="cancelTryOut('POSTapi-register');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-register"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/register</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-register"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-register"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-register"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-register"
               value="zbailey@example.net"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>zbailey@example.net</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-register"
               value="-0pBNvYgxw"
               data-component="body">
    <br>
<p>Must be at least 6 characters. Example: <code>-0pBNvYgxw</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="POSTapi-register"
               value="a"
               data-component="body">
    <br>
<p>Must not be greater than 50 characters. Example: <code>a</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>dob</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="dob"                data-endpoint="POSTapi-register"
               value="2026-08-15T16:17:02"
               data-component="body">
    <br>
<p>Must be a valid date. Example: <code>2026-08-15T16:17:02</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>anniversary</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="anniversary"                data-endpoint="POSTapi-register"
               value="2026-08-15T16:17:02"
               data-component="body">
    <br>
<p>Must be a valid date. Example: <code>2026-08-15T16:17:02</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>avatar</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="avatar"                data-endpoint="POSTapi-register"
               value=""
               data-component="body">
    <br>

        </div>
        </form>

                    <h2 id="authentication-management-POSTapi-auth-google">POST api/auth/google</h2>

<p>
</p>



<span id="example-requests-POSTapi-auth-google">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/auth/google" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/auth/google"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-google">
</span>
<span id="execution-results-POSTapi-auth-google" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-google"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-google"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-google" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-google">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-auth-google" data-method="POST"
      data-path="api/auth/google"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-google', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-google"
                    onclick="tryItOut('POSTapi-auth-google');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-google"
                    onclick="cancelTryOut('POSTapi-auth-google');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-google"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/google</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-auth-google"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-auth-google"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="authentication-management-POSTapi-forgot-password">POST api/forgot-password</h2>

<p>
</p>



<span id="example-requests-POSTapi-forgot-password">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/forgot-password" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"gbailey@example.net\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/forgot-password"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "gbailey@example.net"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-forgot-password">
</span>
<span id="execution-results-POSTapi-forgot-password" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-forgot-password"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-forgot-password"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-forgot-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-forgot-password">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-forgot-password" data-method="POST"
      data-path="api/forgot-password"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-forgot-password', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-forgot-password"
                    onclick="tryItOut('POSTapi-forgot-password');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-forgot-password"
                    onclick="cancelTryOut('POSTapi-forgot-password');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-forgot-password"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/forgot-password</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-forgot-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-forgot-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-forgot-password"
               value="gbailey@example.net"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>gbailey@example.net</code></p>
        </div>
        </form>

                    <h2 id="authentication-management-POSTapi-reset-password">POST api/reset-password</h2>

<p>
</p>



<span id="example-requests-POSTapi-reset-password">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/reset-password" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"token\": \"architecto\",
    \"email\": \"zbailey@example.net\",
    \"password\": \"-0pBNvYgxw\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/reset-password"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "token": "architecto",
    "email": "zbailey@example.net",
    "password": "-0pBNvYgxw"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-reset-password">
</span>
<span id="execution-results-POSTapi-reset-password" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-reset-password"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-reset-password"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-reset-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-reset-password">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-reset-password" data-method="POST"
      data-path="api/reset-password"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-reset-password', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-reset-password"
                    onclick="tryItOut('POSTapi-reset-password');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-reset-password"
                    onclick="cancelTryOut('POSTapi-reset-password');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-reset-password"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/reset-password</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-reset-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-reset-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>token</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="token"                data-endpoint="POSTapi-reset-password"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-reset-password"
               value="zbailey@example.net"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>zbailey@example.net</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-reset-password"
               value="-0pBNvYgxw"
               data-component="body">
    <br>
<p>Must be at least 6 characters. Example: <code>-0pBNvYgxw</code></p>
        </div>
        </form>

                    <h2 id="authentication-management-GETapi-me">GET api/me</h2>

<p>
</p>



<span id="example-requests-GETapi-me">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/me" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/me"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-me">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-me" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-me"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-me"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-me" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-me">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-me" data-method="GET"
      data-path="api/me"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-me', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-me"
                    onclick="tryItOut('GETapi-me');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-me"
                    onclick="cancelTryOut('GETapi-me');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-me"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/me</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-me"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-me"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="authentication-management-POSTapi-me">POST api/me</h2>

<p>
</p>



<span id="example-requests-POSTapi-me">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/me" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"b\",
    \"phone\": \"n\",
    \"gender\": \"g\",
    \"dob\": \"2026-08-15T16:17:03\",
    \"anniversary\": \"2026-08-15T16:17:03\",
    \"bio\": \"architecto\",
    \"current_password\": \"architecto\",
    \"password\": \"]|{+-0pBNvYg\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/me"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "b",
    "phone": "n",
    "gender": "g",
    "dob": "2026-08-15T16:17:03",
    "anniversary": "2026-08-15T16:17:03",
    "bio": "architecto",
    "current_password": "architecto",
    "password": "]|{+-0pBNvYg"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-me">
</span>
<span id="execution-results-POSTapi-me" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-me"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-me"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-me" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-me">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-me" data-method="POST"
      data-path="api/me"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-me', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-me"
                    onclick="tryItOut('POSTapi-me');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-me"
                    onclick="cancelTryOut('POSTapi-me');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-me"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/me</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-me"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-me"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-me"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="POSTapi-me"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 50 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>gender</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="gender"                data-endpoint="POSTapi-me"
               value="g"
               data-component="body">
    <br>
<p>Must not be greater than 50 characters. Example: <code>g</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>dob</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="dob"                data-endpoint="POSTapi-me"
               value="2026-08-15T16:17:03"
               data-component="body">
    <br>
<p>Must be a valid date. Example: <code>2026-08-15T16:17:03</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>anniversary</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="anniversary"                data-endpoint="POSTapi-me"
               value="2026-08-15T16:17:03"
               data-component="body">
    <br>
<p>Must be a valid date. Example: <code>2026-08-15T16:17:03</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>bio</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="bio"                data-endpoint="POSTapi-me"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>avatar</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="avatar"                data-endpoint="POSTapi-me"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>current_password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="current_password"                data-endpoint="POSTapi-me"
               value="architecto"
               data-component="body">
    <br>
<p>This field is required when <code>password</code> is present. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-me"
               value="]|{+-0pBNvYg"
               data-component="body">
    <br>
<p>Must be at least 6 characters. Example: <code>]|{+-0pBNvYg</code></p>
        </div>
        </form>

                    <h2 id="authentication-management-POSTapi-logout">POST api/logout</h2>

<p>
</p>



<span id="example-requests-POSTapi-logout">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/logout" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/logout"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-logout">
</span>
<span id="execution-results-POSTapi-logout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-logout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-logout"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-logout">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-logout" data-method="POST"
      data-path="api/logout"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-logout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-logout"
                    onclick="tryItOut('POSTapi-logout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-logout"
                    onclick="cancelTryOut('POSTapi-logout');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-logout"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/logout</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="user-profile-management">User & Profile Management</h1>

    <p>APIs for user management, account details, and role assignments.</p>

                                <h2 id="user-profile-management-GETapi-team">GET api/team</h2>

<p>
</p>



<span id="example-requests-GETapi-team">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/team" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/team"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-team">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: true,
    &quot;message&quot;: &quot;Team members retrieved successfully.&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Amit Kumar&quot;,
            &quot;avatar&quot;: null,
            &quot;bio&quot;: &quot;Founder &amp; Director at Furrydom India, working towards animal welfare, rescue missions, sustainable feeding initiatives, and child development programs since 2020.&quot;,
            &quot;show_in_website&quot;: true,
            &quot;role&quot;: &quot;Founder &amp; Director&quot;,
            &quot;showInWebsite&quot;: true,
            &quot;roles&quot;: [
                {
                    &quot;id&quot;: 5,
                    &quot;name&quot;: &quot;Founder &amp; Director&quot;,
                    &quot;roleDescription&quot;: null,
                    &quot;pivot&quot;: {
                        &quot;model_type&quot;: &quot;App\\Models\\User&quot;,
                        &quot;model_id&quot;: 1,
                        &quot;role_id&quot;: 5
                    }
                }
            ]
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Divya Kumariya&quot;,
            &quot;avatar&quot;: null,
            &quot;bio&quot;: &quot;Managing fundraising operations and donor engagement initiatives across Maharashtra and Karnataka.&quot;,
            &quot;show_in_website&quot;: true,
            &quot;role&quot;: &quot;Director for Operations (COO)&quot;,
            &quot;showInWebsite&quot;: true,
            &quot;roles&quot;: [
                {
                    &quot;id&quot;: 6,
                    &quot;name&quot;: &quot;Director for Operations (COO)&quot;,
                    &quot;roleDescription&quot;: null,
                    &quot;pivot&quot;: {
                        &quot;model_type&quot;: &quot;App\\Models\\User&quot;,
                        &quot;model_id&quot;: 2,
                        &quot;role_id&quot;: 6
                    }
                }
            ]
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Jatin Jadhav&quot;,
            &quot;avatar&quot;: null,
            &quot;bio&quot;: &quot;Managing rescue operations, emergency response, treatment coordination, and animal adoption initiatives.&quot;,
            &quot;show_in_website&quot;: true,
            &quot;role&quot;: &quot;Rescue &amp; Field Operations Head&quot;,
            &quot;showInWebsite&quot;: true,
            &quot;roles&quot;: [
                {
                    &quot;id&quot;: 7,
                    &quot;name&quot;: &quot;Rescue &amp; Field Operations Head&quot;,
                    &quot;roleDescription&quot;: null,
                    &quot;pivot&quot;: {
                        &quot;model_type&quot;: &quot;App\\Models\\User&quot;,
                        &quot;model_id&quot;: 3,
                        &quot;role_id&quot;: 7
                    }
                }
            ]
        },
        {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Sakshi More&quot;,
            &quot;avatar&quot;: null,
            &quot;bio&quot;: &quot;Managing social media content, supporter engagement, and digital outreach initiatives.&quot;,
            &quot;show_in_website&quot;: true,
            &quot;role&quot;: &quot;Social Media &amp; Content Manager&quot;,
            &quot;showInWebsite&quot;: true,
            &quot;roles&quot;: [
                {
                    &quot;id&quot;: 8,
                    &quot;name&quot;: &quot;Social Media &amp; Content Manager&quot;,
                    &quot;roleDescription&quot;: null,
                    &quot;pivot&quot;: {
                        &quot;model_type&quot;: &quot;App\\Models\\User&quot;,
                        &quot;model_id&quot;: 4,
                        &quot;role_id&quot;: 8
                    }
                }
            ]
        },
        {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;Praveen Suthar&quot;,
            &quot;avatar&quot;: &quot;http://127.0.0.1:8000/storage/1/1786380872_airbrush-20190909234508-01.webp&quot;,
            &quot;bio&quot;: &quot;Providing technical guidance and managing Furrydom India&rsquo;s website, digital platforms, and technology initiatives to support the organization&rsquo;s operations, outreach, and mission.&quot;,
            &quot;show_in_website&quot;: true,
            &quot;role&quot;: &quot;Technical Advisor&quot;,
            &quot;showInWebsite&quot;: true,
            &quot;roles&quot;: [
                {
                    &quot;id&quot;: 9,
                    &quot;name&quot;: &quot;Technical Advisor&quot;,
                    &quot;roleDescription&quot;: null,
                    &quot;pivot&quot;: {
                        &quot;model_type&quot;: &quot;App\\Models\\User&quot;,
                        &quot;model_id&quot;: 5,
                        &quot;role_id&quot;: 9
                    }
                }
            ]
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-team" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-team"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-team"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-team" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-team">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-team" data-method="GET"
      data-path="api/team"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-team', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-team"
                    onclick="tryItOut('GETapi-team');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-team"
                    onclick="cancelTryOut('GETapi-team');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-team"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/team</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-team"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-team"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="user-profile-management-GETapi-users">GET api/users</h2>

<p>
</p>



<span id="example-requests-GETapi-users">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/users" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/users"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-users">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-users" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-users"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-users"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-users">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-users" data-method="GET"
      data-path="api/users"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-users', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-users"
                    onclick="tryItOut('GETapi-users');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-users"
                    onclick="cancelTryOut('GETapi-users');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-users"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/users</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-users"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-users"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="user-profile-management-GETapi-users--id-">GET api/users/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-users--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/users/8" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/users/8"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-users--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-users--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-users--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-users--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-users--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-users--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-users--id-" data-method="GET"
      data-path="api/users/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-users--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-users--id-"
                    onclick="tryItOut('GETapi-users--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-users--id-"
                    onclick="cancelTryOut('GETapi-users--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-users--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/users/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-users--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-users--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-users--id-"
               value="8"
               data-component="url">
    <br>
<p>The ID of the user. Example: <code>8</code></p>
            </div>
                    </form>

                    <h2 id="user-profile-management-POSTapi-users">POST api/users</h2>

<p>
</p>



<span id="example-requests-POSTapi-users">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/users" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"gbailey@example.net\",
    \"name\": \"m\",
    \"status\": \"Inactive\",
    \"bio\": \"architecto\",
    \"avatar\": \"architecto\",
    \"dob\": \"2026-08-15T16:17:03\",
    \"anniversary\": \"2026-08-15T16:17:03\",
    \"show_in_website\": true,
    \"showInWebsite\": false
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/users"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "gbailey@example.net",
    "name": "m",
    "status": "Inactive",
    "bio": "architecto",
    "avatar": "architecto",
    "dob": "2026-08-15T16:17:03",
    "anniversary": "2026-08-15T16:17:03",
    "show_in_website": true,
    "showInWebsite": false
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-users">
</span>
<span id="execution-results-POSTapi-users" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-users"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-users"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-users">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-users" data-method="POST"
      data-path="api/users"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-users', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-users"
                    onclick="tryItOut('POSTapi-users');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-users"
                    onclick="cancelTryOut('POSTapi-users');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-users"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/users</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-users"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-users"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-users"
               value="gbailey@example.net"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>gbailey@example.net</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-users"
               value="m"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>m</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="POSTapi-users"
               value="Inactive"
               data-component="body">
    <br>
<p>Example: <code>Inactive</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>Active</code></li> <li><code>Inactive</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>bio</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="bio"                data-endpoint="POSTapi-users"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>avatar</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="avatar"                data-endpoint="POSTapi-users"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>dob</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="dob"                data-endpoint="POSTapi-users"
               value="2026-08-15T16:17:03"
               data-component="body">
    <br>
<p>Must be a valid date. Example: <code>2026-08-15T16:17:03</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>anniversary</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="anniversary"                data-endpoint="POSTapi-users"
               value="2026-08-15T16:17:03"
               data-component="body">
    <br>
<p>Must be a valid date. Example: <code>2026-08-15T16:17:03</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>show_in_website</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="POSTapi-users" style="display: none">
            <input type="radio" name="show_in_website"
                   value="true"
                   data-endpoint="POSTapi-users"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-users" style="display: none">
            <input type="radio" name="show_in_website"
                   value="false"
                   data-endpoint="POSTapi-users"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>true</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>showInWebsite</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="POSTapi-users" style="display: none">
            <input type="radio" name="showInWebsite"
                   value="true"
                   data-endpoint="POSTapi-users"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-users" style="display: none">
            <input type="radio" name="showInWebsite"
                   value="false"
                   data-endpoint="POSTapi-users"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>false</code></p>
        </div>
        </form>

                    <h2 id="user-profile-management-PUTapi-users--id-">PUT api/users/{id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-users--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/users/8" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"gbailey@example.net\",
    \"name\": \"m\",
    \"status\": \"Inactive\",
    \"bio\": \"architecto\",
    \"avatar\": \"architecto\",
    \"dob\": \"2026-08-15T16:17:03\",
    \"anniversary\": \"2026-08-15T16:17:03\",
    \"show_in_website\": true,
    \"showInWebsite\": false
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/users/8"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "gbailey@example.net",
    "name": "m",
    "status": "Inactive",
    "bio": "architecto",
    "avatar": "architecto",
    "dob": "2026-08-15T16:17:03",
    "anniversary": "2026-08-15T16:17:03",
    "show_in_website": true,
    "showInWebsite": false
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-users--id-">
</span>
<span id="execution-results-PUTapi-users--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-users--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-users--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-users--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-users--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-users--id-" data-method="PUT"
      data-path="api/users/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-users--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-users--id-"
                    onclick="tryItOut('PUTapi-users--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-users--id-"
                    onclick="cancelTryOut('PUTapi-users--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-users--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/users/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-users--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-users--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-users--id-"
               value="8"
               data-component="url">
    <br>
<p>The ID of the user. Example: <code>8</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="PUTapi-users--id-"
               value="gbailey@example.net"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>gbailey@example.net</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-users--id-"
               value="m"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>m</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PUTapi-users--id-"
               value="Inactive"
               data-component="body">
    <br>
<p>Example: <code>Inactive</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>Active</code></li> <li><code>Inactive</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>bio</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="bio"                data-endpoint="PUTapi-users--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>avatar</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="avatar"                data-endpoint="PUTapi-users--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>dob</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="dob"                data-endpoint="PUTapi-users--id-"
               value="2026-08-15T16:17:03"
               data-component="body">
    <br>
<p>Must be a valid date. Example: <code>2026-08-15T16:17:03</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>anniversary</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="anniversary"                data-endpoint="PUTapi-users--id-"
               value="2026-08-15T16:17:03"
               data-component="body">
    <br>
<p>Must be a valid date. Example: <code>2026-08-15T16:17:03</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>show_in_website</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="PUTapi-users--id-" style="display: none">
            <input type="radio" name="show_in_website"
                   value="true"
                   data-endpoint="PUTapi-users--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-users--id-" style="display: none">
            <input type="radio" name="show_in_website"
                   value="false"
                   data-endpoint="PUTapi-users--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>true</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>showInWebsite</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="PUTapi-users--id-" style="display: none">
            <input type="radio" name="showInWebsite"
                   value="true"
                   data-endpoint="PUTapi-users--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-users--id-" style="display: none">
            <input type="radio" name="showInWebsite"
                   value="false"
                   data-endpoint="PUTapi-users--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>false</code></p>
        </div>
        </form>

                    <h2 id="user-profile-management-DELETEapi-users--id-">DELETE api/users/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-users--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/users/8" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/users/8"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-users--id-">
</span>
<span id="execution-results-DELETEapi-users--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-users--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-users--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-users--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-users--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-users--id-" data-method="DELETE"
      data-path="api/users/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-users--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-users--id-"
                    onclick="tryItOut('DELETEapi-users--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-users--id-"
                    onclick="cancelTryOut('DELETEapi-users--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-users--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/users/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-users--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-users--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-users--id-"
               value="8"
               data-component="url">
    <br>
<p>The ID of the user. Example: <code>8</code></p>
            </div>
                    </form>

                <h1 id="role-access-control-rbac">Role & Access Control (RBAC)</h1>

    <p>APIs for defining security roles, permissions, and access controls.</p>

                                <h2 id="role-access-control-rbac-GETapi-volunteer-roles-public">GET api/volunteer-roles/public</h2>

<p>
</p>



<span id="example-requests-GETapi-volunteer-roles-public">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/volunteer-roles/public" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/volunteer-roles/public"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-volunteer-roles-public">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: true,
    &quot;message&quot;: &quot;Public volunteer roles retrieved successfully.&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Rescue Volunteer&quot;,
            &quot;role_description&quot;: &quot;Responsible for emergency field rescue operations, animal transportation, and medical care coordination.&quot;,
            &quot;roleDescription&quot;: &quot;Responsible for emergency field rescue operations, animal transportation, and medical care coordination.&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Event Volunteer&quot;,
            &quot;role_description&quot;: &quot;Assists in organizing adoption drives, community awareness campaigns, and local events.&quot;,
            &quot;roleDescription&quot;: &quot;Assists in organizing adoption drives, community awareness campaigns, and local events.&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Fundraising Volunteer&quot;,
            &quot;role_description&quot;: &quot;Helps with donor engagement, corporate CSR outreach, and fundraising campaigns.&quot;,
            &quot;roleDescription&quot;: &quot;Helps with donor engagement, corporate CSR outreach, and fundraising campaigns.&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Social Media Volunteer&quot;,
            &quot;role_description&quot;: &quot;Manages digital media content, creates reels, and engages supporters across social channels.&quot;,
            &quot;roleDescription&quot;: &quot;Manages digital media content, creates reels, and engages supporters across social channels.&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-volunteer-roles-public" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-volunteer-roles-public"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-volunteer-roles-public"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-volunteer-roles-public" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-volunteer-roles-public">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-volunteer-roles-public" data-method="GET"
      data-path="api/volunteer-roles/public"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-volunteer-roles-public', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-volunteer-roles-public"
                    onclick="tryItOut('GETapi-volunteer-roles-public');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-volunteer-roles-public"
                    onclick="cancelTryOut('GETapi-volunteer-roles-public');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-volunteer-roles-public"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/volunteer-roles/public</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-volunteer-roles-public"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-volunteer-roles-public"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="role-access-control-rbac-GETapi-roles">GET api/roles</h2>

<p>
</p>



<span id="example-requests-GETapi-roles">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/roles" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/roles"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-roles">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-roles" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-roles"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-roles"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-roles" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-roles">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-roles" data-method="GET"
      data-path="api/roles"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-roles', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-roles"
                    onclick="tryItOut('GETapi-roles');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-roles"
                    onclick="cancelTryOut('GETapi-roles');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-roles"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/roles</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-roles"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-roles"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="role-access-control-rbac-GETapi-permissions">GET api/permissions</h2>

<p>
</p>



<span id="example-requests-GETapi-permissions">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/permissions" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/permissions"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-permissions">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-permissions" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-permissions"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-permissions"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-permissions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-permissions">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-permissions" data-method="GET"
      data-path="api/permissions"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-permissions', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-permissions"
                    onclick="tryItOut('GETapi-permissions');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-permissions"
                    onclick="cancelTryOut('GETapi-permissions');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-permissions"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/permissions</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-permissions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-permissions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="role-access-control-rbac-POSTapi-roles">POST api/roles</h2>

<p>
</p>



<span id="example-requests-POSTapi-roles">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/roles" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"architecto\",
    \"is_volunteer\": true,
    \"allow_notification\": false,
    \"role_description\": \"architecto\",
    \"roleDescription\": \"architecto\",
    \"permissions\": [
        \"architecto\"
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/roles"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "architecto",
    "is_volunteer": true,
    "allow_notification": false,
    "role_description": "architecto",
    "roleDescription": "architecto",
    "permissions": [
        "architecto"
    ]
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-roles">
</span>
<span id="execution-results-POSTapi-roles" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-roles"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-roles"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-roles" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-roles">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-roles" data-method="POST"
      data-path="api/roles"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-roles', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-roles"
                    onclick="tryItOut('POSTapi-roles');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-roles"
                    onclick="cancelTryOut('POSTapi-roles');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-roles"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/roles</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-roles"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-roles"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-roles"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_volunteer</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="POSTapi-roles" style="display: none">
            <input type="radio" name="is_volunteer"
                   value="true"
                   data-endpoint="POSTapi-roles"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-roles" style="display: none">
            <input type="radio" name="is_volunteer"
                   value="false"
                   data-endpoint="POSTapi-roles"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>true</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>allow_notification</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="POSTapi-roles" style="display: none">
            <input type="radio" name="allow_notification"
                   value="true"
                   data-endpoint="POSTapi-roles"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-roles" style="display: none">
            <input type="radio" name="allow_notification"
                   value="false"
                   data-endpoint="POSTapi-roles"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>false</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>role_description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="role_description"                data-endpoint="POSTapi-roles"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>roleDescription</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="roleDescription"                data-endpoint="POSTapi-roles"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>permissions</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="permissions[0]"                data-endpoint="POSTapi-roles"
               data-component="body">
        <input type="text" style="display: none"
               name="permissions[1]"                data-endpoint="POSTapi-roles"
               data-component="body">
    <br>

        </div>
        </form>

                    <h2 id="role-access-control-rbac-PUTapi-roles--id-">PUT api/roles/{id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-roles--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/roles/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"is_volunteer\": true,
    \"allow_notification\": false,
    \"role_description\": \"architecto\",
    \"roleDescription\": \"architecto\",
    \"permissions\": [
        \"architecto\"
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/roles/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "is_volunteer": true,
    "allow_notification": false,
    "role_description": "architecto",
    "roleDescription": "architecto",
    "permissions": [
        "architecto"
    ]
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-roles--id-">
</span>
<span id="execution-results-PUTapi-roles--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-roles--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-roles--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-roles--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-roles--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-roles--id-" data-method="PUT"
      data-path="api/roles/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-roles--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-roles--id-"
                    onclick="tryItOut('PUTapi-roles--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-roles--id-"
                    onclick="cancelTryOut('PUTapi-roles--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-roles--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/roles/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-roles--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-roles--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-roles--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the role. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-roles--id-"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_volunteer</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="PUTapi-roles--id-" style="display: none">
            <input type="radio" name="is_volunteer"
                   value="true"
                   data-endpoint="PUTapi-roles--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-roles--id-" style="display: none">
            <input type="radio" name="is_volunteer"
                   value="false"
                   data-endpoint="PUTapi-roles--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>true</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>allow_notification</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="PUTapi-roles--id-" style="display: none">
            <input type="radio" name="allow_notification"
                   value="true"
                   data-endpoint="PUTapi-roles--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-roles--id-" style="display: none">
            <input type="radio" name="allow_notification"
                   value="false"
                   data-endpoint="PUTapi-roles--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>false</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>role_description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="role_description"                data-endpoint="PUTapi-roles--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>roleDescription</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="roleDescription"                data-endpoint="PUTapi-roles--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>permissions</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="permissions[0]"                data-endpoint="PUTapi-roles--id-"
               data-component="body">
        <input type="text" style="display: none"
               name="permissions[1]"                data-endpoint="PUTapi-roles--id-"
               data-component="body">
    <br>

        </div>
        </form>

                    <h2 id="role-access-control-rbac-DELETEapi-roles--id-">DELETE api/roles/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-roles--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/roles/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/roles/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-roles--id-">
</span>
<span id="execution-results-DELETEapi-roles--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-roles--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-roles--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-roles--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-roles--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-roles--id-" data-method="DELETE"
      data-path="api/roles/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-roles--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-roles--id-"
                    onclick="tryItOut('DELETEapi-roles--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-roles--id-"
                    onclick="cancelTryOut('DELETEapi-roles--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-roles--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/roles/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-roles--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-roles--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-roles--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the role. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="donations-subscriptions">Donations & Subscriptions</h1>

    <p>APIs for processing online/offline donations, recurring monthly subscriptions, invoice generation, and donor receipts.</p>

                                <h2 id="donations-subscriptions-POSTapi-donations-initiate">Initiate a donation (One-Time or Recurring)</h2>

<p>
</p>



<span id="example-requests-POSTapi-donations-initiate">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/donations/initiate" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"amount\": 16,
    \"currency\": \"ngz\",
    \"donor_name\": \"miyv\",
    \"donor_email\": \"jdach@example.org\",
    \"donor_phone\": \"architecto\",
    \"pan_number\": \"IYVDL3142H$\\/i\",
    \"plan_id\": 16,
    \"campaign_id\": 16,
    \"type\": \"one_time\",
    \"anonymous\": true
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/donations/initiate"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "amount": 16,
    "currency": "ngz",
    "donor_name": "miyv",
    "donor_email": "jdach@example.org",
    "donor_phone": "architecto",
    "pan_number": "IYVDL3142H$\/i",
    "plan_id": 16,
    "campaign_id": 16,
    "type": "one_time",
    "anonymous": true
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-donations-initiate">
</span>
<span id="execution-results-POSTapi-donations-initiate" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-donations-initiate"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-donations-initiate"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-donations-initiate" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-donations-initiate">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-donations-initiate" data-method="POST"
      data-path="api/donations/initiate"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-donations-initiate', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-donations-initiate"
                    onclick="tryItOut('POSTapi-donations-initiate');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-donations-initiate"
                    onclick="cancelTryOut('POSTapi-donations-initiate');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-donations-initiate"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/donations/initiate</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-donations-initiate"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-donations-initiate"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>amount</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="amount"                data-endpoint="POSTapi-donations-initiate"
               value="16"
               data-component="body">
    <br>
<p>Must be at least 1. Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>currency</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="currency"                data-endpoint="POSTapi-donations-initiate"
               value="ngz"
               data-component="body">
    <br>
<p>Must be 3 characters. Example: <code>ngz</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>donor_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="donor_name"                data-endpoint="POSTapi-donations-initiate"
               value="miyv"
               data-component="body">
    <br>
<p>Must be at least 2 characters. Example: <code>miyv</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>donor_email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="donor_email"                data-endpoint="POSTapi-donations-initiate"
               value="jdach@example.org"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>jdach@example.org</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>donor_phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="donor_phone"                data-endpoint="POSTapi-donations-initiate"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>pan_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="pan_number"                data-endpoint="POSTapi-donations-initiate"
               value="IYVDL3142H$/i"
               data-component="body">
    <br>
<p>Must match the regex /^[A-Z]{5}[0-9]{4}[A-Z]{1}$/i. Example: <code>IYVDL3142H$/i</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>plan_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="plan_id"                data-endpoint="POSTapi-donations-initiate"
               value="16"
               data-component="body">
    <br>
<p>Validation for PAN format. Must match an existing stored value. Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>campaign_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="campaign_id"                data-endpoint="POSTapi-donations-initiate"
               value="16"
               data-component="body">
    <br>
<p>Must match an existing stored value. Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="type"                data-endpoint="POSTapi-donations-initiate"
               value="one_time"
               data-component="body">
    <br>
<p>Example: <code>one_time</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>one_time</code></li> <li><code>recurring</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>anonymous</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="POSTapi-donations-initiate" style="display: none">
            <input type="radio" name="anonymous"
                   value="true"
                   data-endpoint="POSTapi-donations-initiate"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-donations-initiate" style="display: none">
            <input type="radio" name="anonymous"
                   value="false"
                   data-endpoint="POSTapi-donations-initiate"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>true</code></p>
        </div>
        </form>

                    <h2 id="donations-subscriptions-POSTapi-donations-verify">Verify payment signature from checkout (One-Time or Recurring)</h2>

<p>
</p>



<span id="example-requests-POSTapi-donations-verify">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/donations/verify" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"type\": \"recurring\",
    \"razorpay_payment_id\": \"architecto\",
    \"razorpay_signature\": \"architecto\",
    \"razorpay_order_id\": \"architecto\",
    \"razorpay_subscription_id\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/donations/verify"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "type": "recurring",
    "razorpay_payment_id": "architecto",
    "razorpay_signature": "architecto",
    "razorpay_order_id": "architecto",
    "razorpay_subscription_id": "architecto"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-donations-verify">
</span>
<span id="execution-results-POSTapi-donations-verify" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-donations-verify"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-donations-verify"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-donations-verify" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-donations-verify">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-donations-verify" data-method="POST"
      data-path="api/donations/verify"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-donations-verify', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-donations-verify"
                    onclick="tryItOut('POSTapi-donations-verify');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-donations-verify"
                    onclick="cancelTryOut('POSTapi-donations-verify');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-donations-verify"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/donations/verify</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-donations-verify"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-donations-verify"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="type"                data-endpoint="POSTapi-donations-verify"
               value="recurring"
               data-component="body">
    <br>
<p>Example: <code>recurring</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>one_time</code></li> <li><code>recurring</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>razorpay_payment_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="razorpay_payment_id"                data-endpoint="POSTapi-donations-verify"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>razorpay_signature</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="razorpay_signature"                data-endpoint="POSTapi-donations-verify"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>razorpay_order_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="razorpay_order_id"                data-endpoint="POSTapi-donations-verify"
               value="architecto"
               data-component="body">
    <br>
<p>This field is required when <code>type</code> is <code>one_time</code>. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>razorpay_subscription_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="razorpay_subscription_id"                data-endpoint="POSTapi-donations-verify"
               value="architecto"
               data-component="body">
    <br>
<p>This field is required when <code>type</code> is <code>recurring</code>. Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="donations-subscriptions-GETapi-my-donations">Get authenticated user&#039;s / donor&#039;s donation and subscription records</h2>

<p>
</p>



<span id="example-requests-GETapi-my-donations">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/my-donations" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/my-donations"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-my-donations">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-my-donations" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-my-donations"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-my-donations"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-my-donations" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-my-donations">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-my-donations" data-method="GET"
      data-path="api/my-donations"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-my-donations', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-my-donations"
                    onclick="tryItOut('GETapi-my-donations');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-my-donations"
                    onclick="cancelTryOut('GETapi-my-donations');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-my-donations"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/my-donations</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-my-donations"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-my-donations"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="donations-subscriptions-GETapi-donations--id--invoice-download">Download donation invoice PDF</h2>

<p>
</p>



<span id="example-requests-GETapi-donations--id--invoice-download">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/donations/architecto/invoice/download" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/donations/architecto/invoice/download"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-donations--id--invoice-download">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-donations--id--invoice-download" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-donations--id--invoice-download"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-donations--id--invoice-download"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-donations--id--invoice-download" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-donations--id--invoice-download">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-donations--id--invoice-download" data-method="GET"
      data-path="api/donations/{id}/invoice/download"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-donations--id--invoice-download', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-donations--id--invoice-download"
                    onclick="tryItOut('GETapi-donations--id--invoice-download');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-donations--id--invoice-download"
                    onclick="cancelTryOut('GETapi-donations--id--invoice-download');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-donations--id--invoice-download"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/donations/{id}/invoice/download</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-donations--id--invoice-download"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-donations--id--invoice-download"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-donations--id--invoice-download"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the donation. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="donations-subscriptions-GETapi-donations">Display a listing of donations (Transactions)</h2>

<p>
</p>



<span id="example-requests-GETapi-donations">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/donations" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/donations"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-donations">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-donations" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-donations"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-donations"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-donations" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-donations">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-donations" data-method="GET"
      data-path="api/donations"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-donations', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-donations"
                    onclick="tryItOut('GETapi-donations');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-donations"
                    onclick="cancelTryOut('GETapi-donations');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-donations"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/donations</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-donations"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-donations"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="donations-subscriptions-POSTapi-donations">Store a manually created donation record</h2>

<p>
</p>



<span id="example-requests-POSTapi-donations">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/donations" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"amount\": 16,
    \"currency\": \"ngz\",
    \"donor_name\": \"miyv\",
    \"donor_email\": \"jdach@example.org\",
    \"donor_phone\": \"architecto\",
    \"pan_number\": \"IYVDL3142H$\\/i\",
    \"plan_id\": 16,
    \"campaign_id\": 16,
    \"status\": \"succeeded\",
    \"payment_gateway\": \"architecto\",
    \"gateway_transaction_id\": \"architecto\",
    \"anonymous\": true,
    \"created_at\": \"2026-08-15T16:17:03\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/donations"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "amount": 16,
    "currency": "ngz",
    "donor_name": "miyv",
    "donor_email": "jdach@example.org",
    "donor_phone": "architecto",
    "pan_number": "IYVDL3142H$\/i",
    "plan_id": 16,
    "campaign_id": 16,
    "status": "succeeded",
    "payment_gateway": "architecto",
    "gateway_transaction_id": "architecto",
    "anonymous": true,
    "created_at": "2026-08-15T16:17:03"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-donations">
</span>
<span id="execution-results-POSTapi-donations" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-donations"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-donations"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-donations" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-donations">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-donations" data-method="POST"
      data-path="api/donations"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-donations', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-donations"
                    onclick="tryItOut('POSTapi-donations');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-donations"
                    onclick="cancelTryOut('POSTapi-donations');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-donations"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/donations</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-donations"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-donations"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>amount</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="amount"                data-endpoint="POSTapi-donations"
               value="16"
               data-component="body">
    <br>
<p>Must be at least 1. Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>currency</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="currency"                data-endpoint="POSTapi-donations"
               value="ngz"
               data-component="body">
    <br>
<p>Must be 3 characters. Example: <code>ngz</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>donor_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="donor_name"                data-endpoint="POSTapi-donations"
               value="miyv"
               data-component="body">
    <br>
<p>Must be at least 2 characters. Example: <code>miyv</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>donor_email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="donor_email"                data-endpoint="POSTapi-donations"
               value="jdach@example.org"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>jdach@example.org</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>donor_phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="donor_phone"                data-endpoint="POSTapi-donations"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>pan_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="pan_number"                data-endpoint="POSTapi-donations"
               value="IYVDL3142H$/i"
               data-component="body">
    <br>
<p>Must match the regex /^[A-Z]{5}[0-9]{4}[A-Z]{1}$/i. Example: <code>IYVDL3142H$/i</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>plan_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="plan_id"                data-endpoint="POSTapi-donations"
               value="16"
               data-component="body">
    <br>
<p>Must match an existing stored value. Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>campaign_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="campaign_id"                data-endpoint="POSTapi-donations"
               value="16"
               data-component="body">
    <br>
<p>Must match an existing stored value. Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="POSTapi-donations"
               value="succeeded"
               data-component="body">
    <br>
<p>Example: <code>succeeded</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>succeeded</code></li> <li><code>pending</code></li> <li><code>failed</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>payment_gateway</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="payment_gateway"                data-endpoint="POSTapi-donations"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>gateway_transaction_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="gateway_transaction_id"                data-endpoint="POSTapi-donations"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>anonymous</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="POSTapi-donations" style="display: none">
            <input type="radio" name="anonymous"
                   value="true"
                   data-endpoint="POSTapi-donations"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-donations" style="display: none">
            <input type="radio" name="anonymous"
                   value="false"
                   data-endpoint="POSTapi-donations"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>true</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>created_at</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="created_at"                data-endpoint="POSTapi-donations"
               value="2026-08-15T16:17:03"
               data-component="body">
    <br>
<p>Must be a valid date. Example: <code>2026-08-15T16:17:03</code></p>
        </div>
        </form>

                    <h2 id="donations-subscriptions-GETapi-donations--id-">Display a specific donation</h2>

<p>
</p>



<span id="example-requests-GETapi-donations--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/donations/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/donations/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-donations--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-donations--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-donations--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-donations--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-donations--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-donations--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-donations--id-" data-method="GET"
      data-path="api/donations/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-donations--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-donations--id-"
                    onclick="tryItOut('GETapi-donations--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-donations--id-"
                    onclick="cancelTryOut('GETapi-donations--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-donations--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/donations/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-donations--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-donations--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-donations--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the donation. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="donations-subscriptions-POSTapi-donations--id--send-invoice">Send Donation Invoice PDF to donor&#039;s email</h2>

<p>
</p>



<span id="example-requests-POSTapi-donations--id--send-invoice">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/donations/architecto/send-invoice" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/donations/architecto/send-invoice"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-donations--id--send-invoice">
</span>
<span id="execution-results-POSTapi-donations--id--send-invoice" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-donations--id--send-invoice"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-donations--id--send-invoice"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-donations--id--send-invoice" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-donations--id--send-invoice">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-donations--id--send-invoice" data-method="POST"
      data-path="api/donations/{id}/send-invoice"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-donations--id--send-invoice', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-donations--id--send-invoice"
                    onclick="tryItOut('POSTapi-donations--id--send-invoice');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-donations--id--send-invoice"
                    onclick="cancelTryOut('POSTapi-donations--id--send-invoice');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-donations--id--send-invoice"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/donations/{id}/send-invoice</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-donations--id--send-invoice"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-donations--id--send-invoice"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="POSTapi-donations--id--send-invoice"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the donation. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="donations-subscriptions-POSTapi-donations--id--verify-qr">Verify payment status of a dynamic UPI QR Code donation</h2>

<p>
</p>



<span id="example-requests-POSTapi-donations--id--verify-qr">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/donations/architecto/verify-qr" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/donations/architecto/verify-qr"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-donations--id--verify-qr">
</span>
<span id="execution-results-POSTapi-donations--id--verify-qr" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-donations--id--verify-qr"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-donations--id--verify-qr"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-donations--id--verify-qr" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-donations--id--verify-qr">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-donations--id--verify-qr" data-method="POST"
      data-path="api/donations/{id}/verify-qr"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-donations--id--verify-qr', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-donations--id--verify-qr"
                    onclick="tryItOut('POSTapi-donations--id--verify-qr');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-donations--id--verify-qr"
                    onclick="cancelTryOut('POSTapi-donations--id--verify-qr');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-donations--id--verify-qr"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/donations/{id}/verify-qr</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-donations--id--verify-qr"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-donations--id--verify-qr"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="POSTapi-donations--id--verify-qr"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the donation. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="donations-subscriptions-DELETEapi-donations--id-">Delete a donation record</h2>

<p>
</p>



<span id="example-requests-DELETEapi-donations--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/donations/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/donations/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-donations--id-">
</span>
<span id="execution-results-DELETEapi-donations--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-donations--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-donations--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-donations--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-donations--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-donations--id-" data-method="DELETE"
      data-path="api/donations/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-donations--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-donations--id-"
                    onclick="tryItOut('DELETEapi-donations--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-donations--id-"
                    onclick="cancelTryOut('DELETEapi-donations--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-donations--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/donations/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-donations--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-donations--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-donations--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the donation. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="donations-subscriptions-GETapi-subscriptions">Display list of all subscriptions</h2>

<p>
</p>



<span id="example-requests-GETapi-subscriptions">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/subscriptions" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/subscriptions"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-subscriptions">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-subscriptions" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-subscriptions"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-subscriptions"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-subscriptions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-subscriptions">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-subscriptions" data-method="GET"
      data-path="api/subscriptions"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-subscriptions', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-subscriptions"
                    onclick="tryItOut('GETapi-subscriptions');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-subscriptions"
                    onclick="cancelTryOut('GETapi-subscriptions');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-subscriptions"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/subscriptions</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-subscriptions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-subscriptions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="donations-subscriptions-GETapi-subscriptions--id-">Display a specific subscription details</h2>

<p>
</p>



<span id="example-requests-GETapi-subscriptions--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/subscriptions/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/subscriptions/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-subscriptions--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-subscriptions--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-subscriptions--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-subscriptions--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-subscriptions--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-subscriptions--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-subscriptions--id-" data-method="GET"
      data-path="api/subscriptions/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-subscriptions--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-subscriptions--id-"
                    onclick="tryItOut('GETapi-subscriptions--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-subscriptions--id-"
                    onclick="cancelTryOut('GETapi-subscriptions--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-subscriptions--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/subscriptions/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-subscriptions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-subscriptions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-subscriptions--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the subscription. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="donations-subscriptions-PUTapi-subscriptions--id-">Update subscription details</h2>

<p>
</p>



<span id="example-requests-PUTapi-subscriptions--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/subscriptions/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"status\": \"cancelled\",
    \"admin_notes\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/subscriptions/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "status": "cancelled",
    "admin_notes": "architecto"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-subscriptions--id-">
</span>
<span id="execution-results-PUTapi-subscriptions--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-subscriptions--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-subscriptions--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-subscriptions--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-subscriptions--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-subscriptions--id-" data-method="PUT"
      data-path="api/subscriptions/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-subscriptions--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-subscriptions--id-"
                    onclick="tryItOut('PUTapi-subscriptions--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-subscriptions--id-"
                    onclick="cancelTryOut('PUTapi-subscriptions--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-subscriptions--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/subscriptions/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-subscriptions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-subscriptions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-subscriptions--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the subscription. Example: <code>architecto</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PUTapi-subscriptions--id-"
               value="cancelled"
               data-component="body">
    <br>
<p>Example: <code>cancelled</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>active</code></li> <li><code>pending</code></li> <li><code>cancelled</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>admin_notes</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="admin_notes"                data-endpoint="PUTapi-subscriptions--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="donations-subscriptions-POSTapi-subscriptions--id--cancel">Cancel a recurring subscription</h2>

<p>
</p>



<span id="example-requests-POSTapi-subscriptions--id--cancel">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/subscriptions/architecto/cancel" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/subscriptions/architecto/cancel"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-subscriptions--id--cancel">
</span>
<span id="execution-results-POSTapi-subscriptions--id--cancel" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-subscriptions--id--cancel"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-subscriptions--id--cancel"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-subscriptions--id--cancel" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-subscriptions--id--cancel">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-subscriptions--id--cancel" data-method="POST"
      data-path="api/subscriptions/{id}/cancel"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-subscriptions--id--cancel', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-subscriptions--id--cancel"
                    onclick="tryItOut('POSTapi-subscriptions--id--cancel');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-subscriptions--id--cancel"
                    onclick="cancelTryOut('POSTapi-subscriptions--id--cancel');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-subscriptions--id--cancel"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/subscriptions/{id}/cancel</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-subscriptions--id--cancel"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-subscriptions--id--cancel"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="POSTapi-subscriptions--id--cancel"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the subscription. Example: <code>architecto</code></p>
            </div>
                    </form>

                <h1 id="plans-causes">Plans & Causes</h1>

    <p>APIs for managing cause plans, sponsorship packages, and goals.</p>

                                <h2 id="plans-causes-GETapi-plans">GET api/plans</h2>

<p>
</p>



<span id="example-requests-GETapi-plans">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/plans" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/plans"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-plans">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: true,
    &quot;message&quot;: &quot;Plans retrieved successfully.&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;card_type&quot;: &quot;cause&quot;,
            &quot;title&quot;: &quot;Animal Rescue&quot;,
            &quot;description&quot;: &quot;24/7 rescue squads across Pune for injured &amp; abandoned animals.&quot;,
            &quot;category&quot;: &quot;Animal Welfare&quot;,
            &quot;sort_order&quot;: 1,
            &quot;image&quot;: &quot;https://images.unsplash.com/photo-1601979031925-424e53b6caaa?w=400&amp;q=80&quot;,
            &quot;alt&quot;: &quot;Man holding rescued dog on street&quot;,
            &quot;goal_amount&quot;: 2500,
            &quot;raised_amount&quot;: &quot;0.00&quot;,
            &quot;status&quot;: &quot;Active&quot;,
            &quot;featured&quot;: true,
            &quot;user_id&quot;: 8,
            &quot;created_at&quot;: &quot;2026-08-10T16:04:51.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-14T17:57:26.000000Z&quot;,
            &quot;cardType&quot;: &quot;cause&quot;,
            &quot;sortOrder&quot;: 1,
            &quot;goalAmount&quot;: 2500,
            &quot;media&quot;: [],
            &quot;user&quot;: {
                &quot;id&quot;: 8,
                &quot;name&quot;: &quot;Ananya Joshi&quot;,
                &quot;gender&quot;: null,
                &quot;phone&quot;: &quot;+91 95432 10987&quot;,
                &quot;bio&quot;: &quot;Corporate communications lead looking to connect NGO with CSR initiatives.&quot;,
                &quot;avatar&quot;: null,
                &quot;dob&quot;: null,
                &quot;anniversary&quot;: null,
                &quot;email&quot;: &quot;ananya.j@example.com&quot;,
                &quot;email_verified_at&quot;: &quot;2026-08-14T17:57:26.000000Z&quot;,
                &quot;show_in_website&quot;: true,
                &quot;status&quot;: &quot;Active&quot;,
                &quot;created_at&quot;: &quot;2026-08-10T16:04:51.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-08-14T17:57:26.000000Z&quot;,
                &quot;role&quot;: &quot;Fundraising Volunteer&quot;,
                &quot;showInWebsite&quot;: true,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;Fundraising Volunteer&quot;,
                        &quot;guard_name&quot;: &quot;api&quot;,
                        &quot;allow_notification&quot;: false,
                        &quot;is_volunteer&quot;: true,
                        &quot;role_description&quot;: &quot;Helps with donor engagement, corporate CSR outreach, and fundraising campaigns.&quot;,
                        &quot;created_at&quot;: &quot;2026-08-10T16:04:48.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2026-08-10T16:04:48.000000Z&quot;,
                        &quot;roleDescription&quot;: &quot;Helps with donor engagement, corporate CSR outreach, and fundraising campaigns.&quot;,
                        &quot;pivot&quot;: {
                            &quot;model_type&quot;: &quot;App\\Models\\User&quot;,
                            &quot;model_id&quot;: 8,
                            &quot;role_id&quot;: 3
                        }
                    }
                ]
            }
        },
        {
            &quot;id&quot;: 2,
            &quot;card_type&quot;: &quot;cause&quot;,
            &quot;title&quot;: &quot;Emergency Medical Care&quot;,
            &quot;description&quot;: &quot;On-ground triage, surgeries and post-op rehabilitation.&quot;,
            &quot;category&quot;: &quot;Medical Support&quot;,
            &quot;sort_order&quot;: 2,
            &quot;image&quot;: &quot;https://images.unsplash.com/photo-1587300003388-59208cc962cb?w=400&amp;q=80&quot;,
            &quot;alt&quot;: &quot;Puppy receiving veterinary care&quot;,
            &quot;goal_amount&quot;: 3200,
            &quot;raised_amount&quot;: &quot;0.00&quot;,
            &quot;status&quot;: &quot;Active&quot;,
            &quot;featured&quot;: true,
            &quot;user_id&quot;: 8,
            &quot;created_at&quot;: &quot;2026-08-10T16:04:51.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-14T17:57:26.000000Z&quot;,
            &quot;cardType&quot;: &quot;cause&quot;,
            &quot;sortOrder&quot;: 2,
            &quot;goalAmount&quot;: 3200,
            &quot;media&quot;: [],
            &quot;user&quot;: {
                &quot;id&quot;: 8,
                &quot;name&quot;: &quot;Ananya Joshi&quot;,
                &quot;gender&quot;: null,
                &quot;phone&quot;: &quot;+91 95432 10987&quot;,
                &quot;bio&quot;: &quot;Corporate communications lead looking to connect NGO with CSR initiatives.&quot;,
                &quot;avatar&quot;: null,
                &quot;dob&quot;: null,
                &quot;anniversary&quot;: null,
                &quot;email&quot;: &quot;ananya.j@example.com&quot;,
                &quot;email_verified_at&quot;: &quot;2026-08-14T17:57:26.000000Z&quot;,
                &quot;show_in_website&quot;: true,
                &quot;status&quot;: &quot;Active&quot;,
                &quot;created_at&quot;: &quot;2026-08-10T16:04:51.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-08-14T17:57:26.000000Z&quot;,
                &quot;role&quot;: &quot;Fundraising Volunteer&quot;,
                &quot;showInWebsite&quot;: true,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;Fundraising Volunteer&quot;,
                        &quot;guard_name&quot;: &quot;api&quot;,
                        &quot;allow_notification&quot;: false,
                        &quot;is_volunteer&quot;: true,
                        &quot;role_description&quot;: &quot;Helps with donor engagement, corporate CSR outreach, and fundraising campaigns.&quot;,
                        &quot;created_at&quot;: &quot;2026-08-10T16:04:48.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2026-08-10T16:04:48.000000Z&quot;,
                        &quot;roleDescription&quot;: &quot;Helps with donor engagement, corporate CSR outreach, and fundraising campaigns.&quot;,
                        &quot;pivot&quot;: {
                            &quot;model_type&quot;: &quot;App\\Models\\User&quot;,
                            &quot;model_id&quot;: 8,
                            &quot;role_id&quot;: 3
                        }
                    }
                ]
            }
        },
        {
            &quot;id&quot;: 3,
            &quot;card_type&quot;: &quot;cause&quot;,
            &quot;title&quot;: &quot;Daily Feeding Drives&quot;,
            &quot;description&quot;: &quot;Hot meals for 1,200+ street animals every single day.&quot;,
            &quot;category&quot;: &quot;Feeding Programs&quot;,
            &quot;sort_order&quot;: 3,
            &quot;image&quot;: &quot;https://images.unsplash.com/photo-1548199973-03cce0bbc87b?w=400&amp;q=80&quot;,
            &quot;alt&quot;: &quot;Woman feeding stray dogs on street&quot;,
            &quot;goal_amount&quot;: 1800,
            &quot;raised_amount&quot;: &quot;0.00&quot;,
            &quot;status&quot;: &quot;Active&quot;,
            &quot;featured&quot;: true,
            &quot;user_id&quot;: 8,
            &quot;created_at&quot;: &quot;2026-08-10T16:04:51.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-14T17:57:26.000000Z&quot;,
            &quot;cardType&quot;: &quot;cause&quot;,
            &quot;sortOrder&quot;: 3,
            &quot;goalAmount&quot;: 1800,
            &quot;media&quot;: [],
            &quot;user&quot;: {
                &quot;id&quot;: 8,
                &quot;name&quot;: &quot;Ananya Joshi&quot;,
                &quot;gender&quot;: null,
                &quot;phone&quot;: &quot;+91 95432 10987&quot;,
                &quot;bio&quot;: &quot;Corporate communications lead looking to connect NGO with CSR initiatives.&quot;,
                &quot;avatar&quot;: null,
                &quot;dob&quot;: null,
                &quot;anniversary&quot;: null,
                &quot;email&quot;: &quot;ananya.j@example.com&quot;,
                &quot;email_verified_at&quot;: &quot;2026-08-14T17:57:26.000000Z&quot;,
                &quot;show_in_website&quot;: true,
                &quot;status&quot;: &quot;Active&quot;,
                &quot;created_at&quot;: &quot;2026-08-10T16:04:51.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-08-14T17:57:26.000000Z&quot;,
                &quot;role&quot;: &quot;Fundraising Volunteer&quot;,
                &quot;showInWebsite&quot;: true,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;Fundraising Volunteer&quot;,
                        &quot;guard_name&quot;: &quot;api&quot;,
                        &quot;allow_notification&quot;: false,
                        &quot;is_volunteer&quot;: true,
                        &quot;role_description&quot;: &quot;Helps with donor engagement, corporate CSR outreach, and fundraising campaigns.&quot;,
                        &quot;created_at&quot;: &quot;2026-08-10T16:04:48.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2026-08-10T16:04:48.000000Z&quot;,
                        &quot;roleDescription&quot;: &quot;Helps with donor engagement, corporate CSR outreach, and fundraising campaigns.&quot;,
                        &quot;pivot&quot;: {
                            &quot;model_type&quot;: &quot;App\\Models\\User&quot;,
                            &quot;model_id&quot;: 8,
                            &quot;role_id&quot;: 3
                        }
                    }
                ]
            }
        },
        {
            &quot;id&quot;: 4,
            &quot;card_type&quot;: &quot;cause&quot;,
            &quot;title&quot;: &quot;Child Education Support&quot;,
            &quot;description&quot;: &quot;School kits, fees and tuition for underprivileged children.&quot;,
            &quot;category&quot;: &quot;Education&quot;,
            &quot;sort_order&quot;: 4,
            &quot;image&quot;: &quot;https://furydom-heartbeat-impact.lovable.app/assets/education-tQ1cevW9.jpg&quot;,
            &quot;alt&quot;: &quot;Children reading in a classroom&quot;,
            &quot;goal_amount&quot;: 200,
            &quot;raised_amount&quot;: &quot;400.00&quot;,
            &quot;status&quot;: &quot;Active&quot;,
            &quot;featured&quot;: true,
            &quot;user_id&quot;: 8,
            &quot;created_at&quot;: &quot;2026-08-10T16:04:51.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-15T11:00:25.000000Z&quot;,
            &quot;cardType&quot;: &quot;cause&quot;,
            &quot;sortOrder&quot;: 4,
            &quot;goalAmount&quot;: 200,
            &quot;media&quot;: [],
            &quot;user&quot;: {
                &quot;id&quot;: 8,
                &quot;name&quot;: &quot;Ananya Joshi&quot;,
                &quot;gender&quot;: null,
                &quot;phone&quot;: &quot;+91 95432 10987&quot;,
                &quot;bio&quot;: &quot;Corporate communications lead looking to connect NGO with CSR initiatives.&quot;,
                &quot;avatar&quot;: null,
                &quot;dob&quot;: null,
                &quot;anniversary&quot;: null,
                &quot;email&quot;: &quot;ananya.j@example.com&quot;,
                &quot;email_verified_at&quot;: &quot;2026-08-14T17:57:26.000000Z&quot;,
                &quot;show_in_website&quot;: true,
                &quot;status&quot;: &quot;Active&quot;,
                &quot;created_at&quot;: &quot;2026-08-10T16:04:51.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-08-14T17:57:26.000000Z&quot;,
                &quot;role&quot;: &quot;Fundraising Volunteer&quot;,
                &quot;showInWebsite&quot;: true,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;Fundraising Volunteer&quot;,
                        &quot;guard_name&quot;: &quot;api&quot;,
                        &quot;allow_notification&quot;: false,
                        &quot;is_volunteer&quot;: true,
                        &quot;role_description&quot;: &quot;Helps with donor engagement, corporate CSR outreach, and fundraising campaigns.&quot;,
                        &quot;created_at&quot;: &quot;2026-08-10T16:04:48.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2026-08-10T16:04:48.000000Z&quot;,
                        &quot;roleDescription&quot;: &quot;Helps with donor engagement, corporate CSR outreach, and fundraising campaigns.&quot;,
                        &quot;pivot&quot;: {
                            &quot;model_type&quot;: &quot;App\\Models\\User&quot;,
                            &quot;model_id&quot;: 8,
                            &quot;role_id&quot;: 3
                        }
                    }
                ]
            }
        },
        {
            &quot;id&quot;: 5,
            &quot;card_type&quot;: &quot;cause&quot;,
            &quot;title&quot;: &quot;Women Hygiene Programs&quot;,
            &quot;description&quot;: &quot;Sanitary kits and awareness across slum communities.&quot;,
            &quot;category&quot;: &quot;Women Empowerment&quot;,
            &quot;sort_order&quot;: 5,
            &quot;image&quot;: &quot;https://images.unsplash.com/photo-1594824476967-48c8b964273f?w=400&amp;q=80&quot;,
            &quot;alt&quot;: &quot;Woman receiving hygiene kit&quot;,
            &quot;goal_amount&quot;: 1500,
            &quot;raised_amount&quot;: &quot;0.00&quot;,
            &quot;status&quot;: &quot;Active&quot;,
            &quot;featured&quot;: false,
            &quot;user_id&quot;: 8,
            &quot;created_at&quot;: &quot;2026-08-10T16:04:51.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-14T17:57:26.000000Z&quot;,
            &quot;cardType&quot;: &quot;cause&quot;,
            &quot;sortOrder&quot;: 5,
            &quot;goalAmount&quot;: 1500,
            &quot;media&quot;: [],
            &quot;user&quot;: {
                &quot;id&quot;: 8,
                &quot;name&quot;: &quot;Ananya Joshi&quot;,
                &quot;gender&quot;: null,
                &quot;phone&quot;: &quot;+91 95432 10987&quot;,
                &quot;bio&quot;: &quot;Corporate communications lead looking to connect NGO with CSR initiatives.&quot;,
                &quot;avatar&quot;: null,
                &quot;dob&quot;: null,
                &quot;anniversary&quot;: null,
                &quot;email&quot;: &quot;ananya.j@example.com&quot;,
                &quot;email_verified_at&quot;: &quot;2026-08-14T17:57:26.000000Z&quot;,
                &quot;show_in_website&quot;: true,
                &quot;status&quot;: &quot;Active&quot;,
                &quot;created_at&quot;: &quot;2026-08-10T16:04:51.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-08-14T17:57:26.000000Z&quot;,
                &quot;role&quot;: &quot;Fundraising Volunteer&quot;,
                &quot;showInWebsite&quot;: true,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;Fundraising Volunteer&quot;,
                        &quot;guard_name&quot;: &quot;api&quot;,
                        &quot;allow_notification&quot;: false,
                        &quot;is_volunteer&quot;: true,
                        &quot;role_description&quot;: &quot;Helps with donor engagement, corporate CSR outreach, and fundraising campaigns.&quot;,
                        &quot;created_at&quot;: &quot;2026-08-10T16:04:48.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2026-08-10T16:04:48.000000Z&quot;,
                        &quot;roleDescription&quot;: &quot;Helps with donor engagement, corporate CSR outreach, and fundraising campaigns.&quot;,
                        &quot;pivot&quot;: {
                            &quot;model_type&quot;: &quot;App\\Models\\User&quot;,
                            &quot;model_id&quot;: 8,
                            &quot;role_id&quot;: 3
                        }
                    }
                ]
            }
        },
        {
            &quot;id&quot;: 6,
            &quot;card_type&quot;: &quot;cause&quot;,
            &quot;title&quot;: &quot;Ration Kit Distribution&quot;,
            &quot;description&quot;: &quot;Monthly grocery kits for families in extreme need.&quot;,
            &quot;category&quot;: &quot;Community Relief&quot;,
            &quot;sort_order&quot;: 6,
            &quot;image&quot;: &quot;https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?w=400&amp;q=80&quot;,
            &quot;alt&quot;: &quot;Volunteers distributing food kits&quot;,
            &quot;goal_amount&quot;: 2200,
            &quot;raised_amount&quot;: &quot;0.00&quot;,
            &quot;status&quot;: &quot;Active&quot;,
            &quot;featured&quot;: false,
            &quot;user_id&quot;: 8,
            &quot;created_at&quot;: &quot;2026-08-10T16:04:51.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-14T17:57:26.000000Z&quot;,
            &quot;cardType&quot;: &quot;cause&quot;,
            &quot;sortOrder&quot;: 6,
            &quot;goalAmount&quot;: 2200,
            &quot;media&quot;: [],
            &quot;user&quot;: {
                &quot;id&quot;: 8,
                &quot;name&quot;: &quot;Ananya Joshi&quot;,
                &quot;gender&quot;: null,
                &quot;phone&quot;: &quot;+91 95432 10987&quot;,
                &quot;bio&quot;: &quot;Corporate communications lead looking to connect NGO with CSR initiatives.&quot;,
                &quot;avatar&quot;: null,
                &quot;dob&quot;: null,
                &quot;anniversary&quot;: null,
                &quot;email&quot;: &quot;ananya.j@example.com&quot;,
                &quot;email_verified_at&quot;: &quot;2026-08-14T17:57:26.000000Z&quot;,
                &quot;show_in_website&quot;: true,
                &quot;status&quot;: &quot;Active&quot;,
                &quot;created_at&quot;: &quot;2026-08-10T16:04:51.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-08-14T17:57:26.000000Z&quot;,
                &quot;role&quot;: &quot;Fundraising Volunteer&quot;,
                &quot;showInWebsite&quot;: true,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;Fundraising Volunteer&quot;,
                        &quot;guard_name&quot;: &quot;api&quot;,
                        &quot;allow_notification&quot;: false,
                        &quot;is_volunteer&quot;: true,
                        &quot;role_description&quot;: &quot;Helps with donor engagement, corporate CSR outreach, and fundraising campaigns.&quot;,
                        &quot;created_at&quot;: &quot;2026-08-10T16:04:48.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2026-08-10T16:04:48.000000Z&quot;,
                        &quot;roleDescription&quot;: &quot;Helps with donor engagement, corporate CSR outreach, and fundraising campaigns.&quot;,
                        &quot;pivot&quot;: {
                            &quot;model_type&quot;: &quot;App\\Models\\User&quot;,
                            &quot;model_id&quot;: 8,
                            &quot;role_id&quot;: 3
                        }
                    }
                ]
            }
        },
        {
            &quot;id&quot;: 7,
            &quot;card_type&quot;: &quot;cause&quot;,
            &quot;title&quot;: &quot;Animal Rehabilitation&quot;,
            &quot;description&quot;: &quot;Post-rescue care and rehoming for recovering animals.&quot;,
            &quot;category&quot;: &quot;Animal Welfare&quot;,
            &quot;sort_order&quot;: 7,
            &quot;image&quot;: &quot;https://images.unsplash.com/photo-1509062522246-3755977927d7?w=400&amp;q=80&quot;,
            &quot;alt&quot;: &quot;Animal rehabilitation centre&quot;,
            &quot;goal_amount&quot;: 2800,
            &quot;raised_amount&quot;: &quot;0.00&quot;,
            &quot;status&quot;: &quot;Active&quot;,
            &quot;featured&quot;: false,
            &quot;user_id&quot;: 8,
            &quot;created_at&quot;: &quot;2026-08-10T16:04:51.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-14T17:57:26.000000Z&quot;,
            &quot;cardType&quot;: &quot;cause&quot;,
            &quot;sortOrder&quot;: 7,
            &quot;goalAmount&quot;: 2800,
            &quot;media&quot;: [],
            &quot;user&quot;: {
                &quot;id&quot;: 8,
                &quot;name&quot;: &quot;Ananya Joshi&quot;,
                &quot;gender&quot;: null,
                &quot;phone&quot;: &quot;+91 95432 10987&quot;,
                &quot;bio&quot;: &quot;Corporate communications lead looking to connect NGO with CSR initiatives.&quot;,
                &quot;avatar&quot;: null,
                &quot;dob&quot;: null,
                &quot;anniversary&quot;: null,
                &quot;email&quot;: &quot;ananya.j@example.com&quot;,
                &quot;email_verified_at&quot;: &quot;2026-08-14T17:57:26.000000Z&quot;,
                &quot;show_in_website&quot;: true,
                &quot;status&quot;: &quot;Active&quot;,
                &quot;created_at&quot;: &quot;2026-08-10T16:04:51.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-08-14T17:57:26.000000Z&quot;,
                &quot;role&quot;: &quot;Fundraising Volunteer&quot;,
                &quot;showInWebsite&quot;: true,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;Fundraising Volunteer&quot;,
                        &quot;guard_name&quot;: &quot;api&quot;,
                        &quot;allow_notification&quot;: false,
                        &quot;is_volunteer&quot;: true,
                        &quot;role_description&quot;: &quot;Helps with donor engagement, corporate CSR outreach, and fundraising campaigns.&quot;,
                        &quot;created_at&quot;: &quot;2026-08-10T16:04:48.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2026-08-10T16:04:48.000000Z&quot;,
                        &quot;roleDescription&quot;: &quot;Helps with donor engagement, corporate CSR outreach, and fundraising campaigns.&quot;,
                        &quot;pivot&quot;: {
                            &quot;model_type&quot;: &quot;App\\Models\\User&quot;,
                            &quot;model_id&quot;: 8,
                            &quot;role_id&quot;: 3
                        }
                    }
                ]
            }
        },
        {
            &quot;id&quot;: 8,
            &quot;card_type&quot;: &quot;cause&quot;,
            &quot;title&quot;: &quot;Community Development&quot;,
            &quot;description&quot;: &quot;Building resilient communities through sustainable initiatives.&quot;,
            &quot;category&quot;: &quot;Community Development&quot;,
            &quot;sort_order&quot;: 8,
            &quot;image&quot;: &quot;https://images.unsplash.com/photo-1559027615-cd4628902d4a?w=400&amp;q=80&quot;,
            &quot;alt&quot;: &quot;Community development initiative&quot;,
            &quot;goal_amount&quot;: 3000,
            &quot;raised_amount&quot;: &quot;0.00&quot;,
            &quot;status&quot;: &quot;Active&quot;,
            &quot;featured&quot;: false,
            &quot;user_id&quot;: 8,
            &quot;created_at&quot;: &quot;2026-08-10T16:04:51.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-14T17:57:26.000000Z&quot;,
            &quot;cardType&quot;: &quot;cause&quot;,
            &quot;sortOrder&quot;: 8,
            &quot;goalAmount&quot;: 3000,
            &quot;media&quot;: [],
            &quot;user&quot;: {
                &quot;id&quot;: 8,
                &quot;name&quot;: &quot;Ananya Joshi&quot;,
                &quot;gender&quot;: null,
                &quot;phone&quot;: &quot;+91 95432 10987&quot;,
                &quot;bio&quot;: &quot;Corporate communications lead looking to connect NGO with CSR initiatives.&quot;,
                &quot;avatar&quot;: null,
                &quot;dob&quot;: null,
                &quot;anniversary&quot;: null,
                &quot;email&quot;: &quot;ananya.j@example.com&quot;,
                &quot;email_verified_at&quot;: &quot;2026-08-14T17:57:26.000000Z&quot;,
                &quot;show_in_website&quot;: true,
                &quot;status&quot;: &quot;Active&quot;,
                &quot;created_at&quot;: &quot;2026-08-10T16:04:51.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-08-14T17:57:26.000000Z&quot;,
                &quot;role&quot;: &quot;Fundraising Volunteer&quot;,
                &quot;showInWebsite&quot;: true,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;Fundraising Volunteer&quot;,
                        &quot;guard_name&quot;: &quot;api&quot;,
                        &quot;allow_notification&quot;: false,
                        &quot;is_volunteer&quot;: true,
                        &quot;role_description&quot;: &quot;Helps with donor engagement, corporate CSR outreach, and fundraising campaigns.&quot;,
                        &quot;created_at&quot;: &quot;2026-08-10T16:04:48.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2026-08-10T16:04:48.000000Z&quot;,
                        &quot;roleDescription&quot;: &quot;Helps with donor engagement, corporate CSR outreach, and fundraising campaigns.&quot;,
                        &quot;pivot&quot;: {
                            &quot;model_type&quot;: &quot;App\\Models\\User&quot;,
                            &quot;model_id&quot;: 8,
                            &quot;role_id&quot;: 3
                        }
                    }
                ]
            }
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-plans" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-plans"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-plans"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-plans" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-plans">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-plans" data-method="GET"
      data-path="api/plans"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-plans', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-plans"
                    onclick="tryItOut('GETapi-plans');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-plans"
                    onclick="cancelTryOut('GETapi-plans');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-plans"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/plans</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-plans"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-plans"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="plans-causes-GETapi-plans--id-">GET api/plans/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-plans--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/plans/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/plans/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-plans--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: true,
    &quot;message&quot;: &quot;Plan retrieved successfully.&quot;,
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;card_type&quot;: &quot;cause&quot;,
        &quot;title&quot;: &quot;Animal Rescue&quot;,
        &quot;description&quot;: &quot;24/7 rescue squads across Pune for injured &amp; abandoned animals.&quot;,
        &quot;category&quot;: &quot;Animal Welfare&quot;,
        &quot;sort_order&quot;: 1,
        &quot;image&quot;: &quot;https://images.unsplash.com/photo-1601979031925-424e53b6caaa?w=400&amp;q=80&quot;,
        &quot;alt&quot;: &quot;Man holding rescued dog on street&quot;,
        &quot;goal_amount&quot;: 2500,
        &quot;raised_amount&quot;: &quot;0.00&quot;,
        &quot;status&quot;: &quot;Active&quot;,
        &quot;featured&quot;: true,
        &quot;user_id&quot;: 8,
        &quot;created_at&quot;: &quot;2026-08-10T16:04:51.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-08-14T17:57:26.000000Z&quot;,
        &quot;cardType&quot;: &quot;cause&quot;,
        &quot;sortOrder&quot;: 1,
        &quot;goalAmount&quot;: 2500,
        &quot;media&quot;: [],
        &quot;user&quot;: {
            &quot;id&quot;: 8,
            &quot;name&quot;: &quot;Ananya Joshi&quot;,
            &quot;gender&quot;: null,
            &quot;phone&quot;: &quot;+91 95432 10987&quot;,
            &quot;bio&quot;: &quot;Corporate communications lead looking to connect NGO with CSR initiatives.&quot;,
            &quot;avatar&quot;: null,
            &quot;dob&quot;: null,
            &quot;anniversary&quot;: null,
            &quot;email&quot;: &quot;ananya.j@example.com&quot;,
            &quot;email_verified_at&quot;: &quot;2026-08-14T17:57:26.000000Z&quot;,
            &quot;show_in_website&quot;: true,
            &quot;status&quot;: &quot;Active&quot;,
            &quot;created_at&quot;: &quot;2026-08-10T16:04:51.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-14T17:57:26.000000Z&quot;,
            &quot;role&quot;: &quot;Fundraising Volunteer&quot;,
            &quot;showInWebsite&quot;: true,
            &quot;roles&quot;: [
                {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Fundraising Volunteer&quot;,
                    &quot;guard_name&quot;: &quot;api&quot;,
                    &quot;allow_notification&quot;: false,
                    &quot;is_volunteer&quot;: true,
                    &quot;role_description&quot;: &quot;Helps with donor engagement, corporate CSR outreach, and fundraising campaigns.&quot;,
                    &quot;created_at&quot;: &quot;2026-08-10T16:04:48.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2026-08-10T16:04:48.000000Z&quot;,
                    &quot;roleDescription&quot;: &quot;Helps with donor engagement, corporate CSR outreach, and fundraising campaigns.&quot;,
                    &quot;pivot&quot;: {
                        &quot;model_type&quot;: &quot;App\\Models\\User&quot;,
                        &quot;model_id&quot;: 8,
                        &quot;role_id&quot;: 3
                    }
                }
            ]
        }
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-plans--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-plans--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-plans--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-plans--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-plans--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-plans--id-" data-method="GET"
      data-path="api/plans/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-plans--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-plans--id-"
                    onclick="tryItOut('GETapi-plans--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-plans--id-"
                    onclick="cancelTryOut('GETapi-plans--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-plans--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/plans/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-plans--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-plans--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-plans--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the plan. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="plans-causes-POSTapi-plans">POST api/plans</h2>

<p>
</p>



<span id="example-requests-POSTapi-plans">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/plans" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "cardType=mission"\
    --form "card_type=mission"\
    --form "title=bngz"\
    --form "description=Eius et animi quos velit et."\
    --form "category=architecto"\
    --form "sortOrder=16"\
    --form "image=architecto"\
    --form "alt=architecto"\
    --form "goalAmount=39"\
    --form "status=Draft"\
    --form "featured=1"\
    --form "file=@/tmp/phphbhapl6p6ddr3IsO1ur" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/plans"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('cardType', 'mission');
body.append('card_type', 'mission');
body.append('title', 'bngz');
body.append('description', 'Eius et animi quos velit et.');
body.append('category', 'architecto');
body.append('sortOrder', '16');
body.append('image', 'architecto');
body.append('alt', 'architecto');
body.append('goalAmount', '39');
body.append('status', 'Draft');
body.append('featured', '1');
body.append('file', document.querySelector('input[name="file"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-plans">
</span>
<span id="execution-results-POSTapi-plans" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-plans"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-plans"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-plans" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-plans">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-plans" data-method="POST"
      data-path="api/plans"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-plans', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-plans"
                    onclick="tryItOut('POSTapi-plans');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-plans"
                    onclick="cancelTryOut('POSTapi-plans');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-plans"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/plans</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-plans"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-plans"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>cardType</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="cardType"                data-endpoint="POSTapi-plans"
               value="mission"
               data-component="body">
    <br>
<p>Example: <code>mission</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>cause</code></li> <li><code>mission</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>card_type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="card_type"                data-endpoint="POSTapi-plans"
               value="mission"
               data-component="body">
    <br>
<p>Example: <code>mission</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>cause</code></li> <li><code>mission</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="POSTapi-plans"
               value="bngz"
               data-component="body">
    <br>
<p>Must be at least 2 characters. Example: <code>bngz</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTapi-plans"
               value="Eius et animi quos velit et."
               data-component="body">
    <br>
<p>Example: <code>Eius et animi quos velit et.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>category</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="category"                data-endpoint="POSTapi-plans"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>sortOrder</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="sortOrder"                data-endpoint="POSTapi-plans"
               value="16"
               data-component="body">
    <br>
<p>Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="image"                data-endpoint="POSTapi-plans"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>alt</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="alt"                data-endpoint="POSTapi-plans"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>goalAmount</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="goalAmount"                data-endpoint="POSTapi-plans"
               value="39"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>39</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="POSTapi-plans"
               value="Draft"
               data-component="body">
    <br>
<p>Example: <code>Draft</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>Active</code></li> <li><code>Inactive</code></li> <li><code>Draft</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>featured</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="POSTapi-plans" style="display: none">
            <input type="radio" name="featured"
                   value="true"
                   data-endpoint="POSTapi-plans"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-plans" style="display: none">
            <input type="radio" name="featured"
                   value="false"
                   data-endpoint="POSTapi-plans"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>true</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>file</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="file"                data-endpoint="POSTapi-plans"
               value=""
               data-component="body">
    <br>
<p>Must be a file. Must be an image. Must not be greater than 10240 kilobytes. Example: <code>/tmp/phphbhapl6p6ddr3IsO1ur</code></p>
        </div>
        </form>

                    <h2 id="plans-causes-PUTapi-plans--id-">PUT api/plans/{id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-plans--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/plans/1" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "cardType=cause"\
    --form "card_type=mission"\
    --form "title=bngz"\
    --form "description=Eius et animi quos velit et."\
    --form "category=architecto"\
    --form "sortOrder=16"\
    --form "image=architecto"\
    --form "alt=architecto"\
    --form "goalAmount=39"\
    --form "status=Active"\
    --form "featured="\
    --form "file=@/tmp/php4iik3sqjueh2aspxyk4" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/plans/1"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('cardType', 'cause');
body.append('card_type', 'mission');
body.append('title', 'bngz');
body.append('description', 'Eius et animi quos velit et.');
body.append('category', 'architecto');
body.append('sortOrder', '16');
body.append('image', 'architecto');
body.append('alt', 'architecto');
body.append('goalAmount', '39');
body.append('status', 'Active');
body.append('featured', '');
body.append('file', document.querySelector('input[name="file"]').files[0]);

fetch(url, {
    method: "PUT",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-plans--id-">
</span>
<span id="execution-results-PUTapi-plans--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-plans--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-plans--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-plans--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-plans--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-plans--id-" data-method="PUT"
      data-path="api/plans/{id}"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-plans--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-plans--id-"
                    onclick="tryItOut('PUTapi-plans--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-plans--id-"
                    onclick="cancelTryOut('PUTapi-plans--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-plans--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/plans/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-plans--id-"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-plans--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-plans--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the plan. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>cardType</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="cardType"                data-endpoint="PUTapi-plans--id-"
               value="cause"
               data-component="body">
    <br>
<p>Example: <code>cause</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>cause</code></li> <li><code>mission</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>card_type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="card_type"                data-endpoint="PUTapi-plans--id-"
               value="mission"
               data-component="body">
    <br>
<p>Example: <code>mission</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>cause</code></li> <li><code>mission</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="PUTapi-plans--id-"
               value="bngz"
               data-component="body">
    <br>
<p>Must be at least 2 characters. Example: <code>bngz</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTapi-plans--id-"
               value="Eius et animi quos velit et."
               data-component="body">
    <br>
<p>Example: <code>Eius et animi quos velit et.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>category</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="category"                data-endpoint="PUTapi-plans--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>sortOrder</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="sortOrder"                data-endpoint="PUTapi-plans--id-"
               value="16"
               data-component="body">
    <br>
<p>Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="image"                data-endpoint="PUTapi-plans--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>alt</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="alt"                data-endpoint="PUTapi-plans--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>goalAmount</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="goalAmount"                data-endpoint="PUTapi-plans--id-"
               value="39"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>39</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PUTapi-plans--id-"
               value="Active"
               data-component="body">
    <br>
<p>Example: <code>Active</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>Active</code></li> <li><code>Inactive</code></li> <li><code>Draft</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>featured</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="PUTapi-plans--id-" style="display: none">
            <input type="radio" name="featured"
                   value="true"
                   data-endpoint="PUTapi-plans--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-plans--id-" style="display: none">
            <input type="radio" name="featured"
                   value="false"
                   data-endpoint="PUTapi-plans--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>false</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>file</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="file"                data-endpoint="PUTapi-plans--id-"
               value=""
               data-component="body">
    <br>
<p>Must be a file. Must be an image. Must not be greater than 10240 kilobytes. Example: <code>/tmp/php4iik3sqjueh2aspxyk4</code></p>
        </div>
        </form>

                    <h2 id="plans-causes-DELETEapi-plans--id-">DELETE api/plans/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-plans--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/plans/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/plans/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-plans--id-">
</span>
<span id="execution-results-DELETEapi-plans--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-plans--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-plans--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-plans--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-plans--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-plans--id-" data-method="DELETE"
      data-path="api/plans/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-plans--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-plans--id-"
                    onclick="tryItOut('DELETEapi-plans--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-plans--id-"
                    onclick="cancelTryOut('DELETEapi-plans--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-plans--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/plans/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-plans--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-plans--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-plans--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the plan. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="campaigns">Campaigns</h1>

    <p>APIs for managing fundraising campaigns, targets, and progress metrics.</p>

                                <h2 id="campaigns-GETapi-campaigns">List all campaigns</h2>

<p>
</p>



<span id="example-requests-GETapi-campaigns">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/campaigns" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/campaigns"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-campaigns">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: true,
    &quot;message&quot;: &quot;Campaigns retrieved successfully.&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;title&quot;: &quot;Buy an Animal Ambulance&quot;,
            &quot;slug&quot;: &quot;buy-animal-ambulance&quot;,
            &quot;description&quot;: &quot;We need a fully equipped animal ambulance to respond quickly to emergency street rescues, accidents, and trauma cases across the city. The vehicle will include stretchers, oxygen support, first-aid kits, and critical medical supplies.&quot;,
            &quot;cover_image&quot;: &quot;https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&amp;fit=crop&amp;w=800&amp;q=80&quot;,
            &quot;gallery_images&quot;: [
                &quot;https://images.unsplash.com/photo-1583511655857-d19b40a7a54e?auto=format&amp;fit=crop&amp;w=600&amp;q=80&quot;,
                &quot;https://images.unsplash.com/photo-1543466835-00a7907e9de1?auto=format&amp;fit=crop&amp;w=600&amp;q=80&quot;
            ],
            &quot;goal_amount&quot;: 2500000,
            &quot;raised_amount&quot;: 1250000,
            &quot;start_date&quot;: &quot;2026-08-04T17:57:26.000000Z&quot;,
            &quot;end_date&quot;: &quot;2026-10-13T17:57:26.000000Z&quot;,
            &quot;status&quot;: &quot;Active&quot;,
            &quot;created_at&quot;: &quot;2026-08-10T16:04:51.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-14T17:57:26.000000Z&quot;,
            &quot;progress_percentage&quot;: 50,
            &quot;cover_image_url&quot;: &quot;https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&amp;fit=crop&amp;w=800&amp;q=80&quot;,
            &quot;gallery_image_urls&quot;: [
                &quot;https://images.unsplash.com/photo-1583511655857-d19b40a7a54e?auto=format&amp;fit=crop&amp;w=600&amp;q=80&quot;,
                &quot;https://images.unsplash.com/photo-1543466835-00a7907e9de1?auto=format&amp;fit=crop&amp;w=600&amp;q=80&quot;
            ],
            &quot;seo&quot;: null,
            &quot;media&quot;: []
        },
        {
            &quot;id&quot;: 2,
            &quot;title&quot;: &quot;Purchase Land for Animal Shelter&quot;,
            &quot;slug&quot;: &quot;purchase-land-animal-shelter&quot;,
            &quot;description&quot;: &quot;Our current rented shelter facility is at maximum capacity. We aim to purchase a dedicated 2-acre plot of land to build a permanent, safe sanctuary for older, disabled, and recovering animals. This will feature open play areas, quarantine zones, and an onsite clinic.&quot;,
            &quot;cover_image&quot;: &quot;https://images.unsplash.com/photo-1548199973-03cce0bbc87b?auto=format&amp;fit=crop&amp;w=800&amp;q=80&quot;,
            &quot;gallery_images&quot;: [
                &quot;https://images.unsplash.com/photo-1534361960057-19889db9621e?auto=format&amp;fit=crop&amp;w=600&amp;q=80&quot;,
                &quot;https://images.unsplash.com/photo-1596492784531-6e6eb5ea9993?auto=format&amp;fit=crop&amp;w=600&amp;q=80&quot;
            ],
            &quot;goal_amount&quot;: 5000000,
            &quot;raised_amount&quot;: 3800000,
            &quot;start_date&quot;: &quot;2026-07-15T17:57:26.000000Z&quot;,
            &quot;end_date&quot;: &quot;2026-11-12T17:57:26.000000Z&quot;,
            &quot;status&quot;: &quot;Active&quot;,
            &quot;created_at&quot;: &quot;2026-08-10T16:04:51.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-14T17:57:26.000000Z&quot;,
            &quot;progress_percentage&quot;: 76,
            &quot;cover_image_url&quot;: &quot;https://images.unsplash.com/photo-1548199973-03cce0bbc87b?auto=format&amp;fit=crop&amp;w=800&amp;q=80&quot;,
            &quot;gallery_image_urls&quot;: [
                &quot;https://images.unsplash.com/photo-1534361960057-19889db9621e?auto=format&amp;fit=crop&amp;w=600&amp;q=80&quot;,
                &quot;https://images.unsplash.com/photo-1596492784531-6e6eb5ea9993?auto=format&amp;fit=crop&amp;w=600&amp;q=80&quot;
            ],
            &quot;seo&quot;: null,
            &quot;media&quot;: []
        },
        {
            &quot;id&quot;: 4,
            &quot;title&quot;: &quot;Medical Treatment Fund&quot;,
            &quot;slug&quot;: &quot;medical-treatment-fund&quot;,
            &quot;description&quot;: &quot;We treat over 100 outdoor animals every month for critical illnesses, skin infections, tumors, and broken bones. This fund is used directly to cover surgeries, diagnostics, boarding fee, and prescription medications.&quot;,
            &quot;cover_image&quot;: &quot;https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&amp;fit=crop&amp;w=800&amp;q=80&quot;,
            &quot;gallery_images&quot;: [],
            &quot;goal_amount&quot;: 1000000,
            &quot;raised_amount&quot;: 150000,
            &quot;start_date&quot;: &quot;2026-07-30T17:57:26.000000Z&quot;,
            &quot;end_date&quot;: &quot;2026-09-28T17:57:26.000000Z&quot;,
            &quot;status&quot;: &quot;Active&quot;,
            &quot;created_at&quot;: &quot;2026-08-10T16:04:51.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-14T17:57:26.000000Z&quot;,
            &quot;progress_percentage&quot;: 15,
            &quot;cover_image_url&quot;: &quot;https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&amp;fit=crop&amp;w=800&amp;q=80&quot;,
            &quot;gallery_image_urls&quot;: [],
            &quot;seo&quot;: null,
            &quot;media&quot;: []
        },
        {
            &quot;id&quot;: 3,
            &quot;title&quot;: &quot;Animal Food Drive&quot;,
            &quot;slug&quot;: &quot;animal-food-drive&quot;,
            &quot;description&quot;: &quot;Daily feeding drives keep thousands of stray dogs and cats healthy and prevent starvation. Help us stock up on kibble, wet food, rice, and fresh vegetables for our community kitchens that feed over 500 street animals daily.&quot;,
            &quot;cover_image&quot;: &quot;https://images.unsplash.com/photo-1589924691995-400dc9ecc119?auto=format&amp;fit=crop&amp;w=800&amp;q=80&quot;,
            &quot;gallery_images&quot;: [
                &quot;https://images.unsplash.com/photo-1518791841217-8f162f1e1131?auto=format&amp;fit=crop&amp;w=600&amp;q=80&quot;
            ],
            &quot;goal_amount&quot;: 500000,
            &quot;raised_amount&quot;: 500000,
            &quot;start_date&quot;: &quot;2026-08-09T17:57:26.000000Z&quot;,
            &quot;end_date&quot;: &quot;2026-09-03T17:57:26.000000Z&quot;,
            &quot;status&quot;: &quot;Closed&quot;,
            &quot;created_at&quot;: &quot;2026-08-10T16:04:51.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-14T19:30:09.000000Z&quot;,
            &quot;progress_percentage&quot;: 100,
            &quot;cover_image_url&quot;: &quot;https://images.unsplash.com/photo-1589924691995-400dc9ecc119?auto=format&amp;fit=crop&amp;w=800&amp;q=80&quot;,
            &quot;gallery_image_urls&quot;: [
                &quot;https://images.unsplash.com/photo-1518791841217-8f162f1e1131?auto=format&amp;fit=crop&amp;w=600&amp;q=80&quot;
            ],
            &quot;seo&quot;: null,
            &quot;media&quot;: []
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-campaigns" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-campaigns"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-campaigns"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-campaigns" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-campaigns">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-campaigns" data-method="GET"
      data-path="api/campaigns"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-campaigns', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-campaigns"
                    onclick="tryItOut('GETapi-campaigns');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-campaigns"
                    onclick="cancelTryOut('GETapi-campaigns');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-campaigns"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/campaigns</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-campaigns"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-campaigns"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="campaigns-GETapi-campaigns--id-">Show a campaign detail</h2>

<p>
</p>



<span id="example-requests-GETapi-campaigns--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/campaigns/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/campaigns/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-campaigns--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: true,
    &quot;message&quot;: &quot;Campaign retrieved successfully.&quot;,
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;title&quot;: &quot;Buy an Animal Ambulance&quot;,
        &quot;slug&quot;: &quot;buy-animal-ambulance&quot;,
        &quot;description&quot;: &quot;We need a fully equipped animal ambulance to respond quickly to emergency street rescues, accidents, and trauma cases across the city. The vehicle will include stretchers, oxygen support, first-aid kits, and critical medical supplies.&quot;,
        &quot;cover_image&quot;: &quot;https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&amp;fit=crop&amp;w=800&amp;q=80&quot;,
        &quot;gallery_images&quot;: [
            &quot;https://images.unsplash.com/photo-1583511655857-d19b40a7a54e?auto=format&amp;fit=crop&amp;w=600&amp;q=80&quot;,
            &quot;https://images.unsplash.com/photo-1543466835-00a7907e9de1?auto=format&amp;fit=crop&amp;w=600&amp;q=80&quot;
        ],
        &quot;goal_amount&quot;: 2500000,
        &quot;raised_amount&quot;: 1250000,
        &quot;start_date&quot;: &quot;2026-08-04T17:57:26.000000Z&quot;,
        &quot;end_date&quot;: &quot;2026-10-13T17:57:26.000000Z&quot;,
        &quot;status&quot;: &quot;Active&quot;,
        &quot;created_at&quot;: &quot;2026-08-10T16:04:51.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-08-14T17:57:26.000000Z&quot;,
        &quot;progress_percentage&quot;: 50,
        &quot;cover_image_url&quot;: &quot;https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&amp;fit=crop&amp;w=800&amp;q=80&quot;,
        &quot;gallery_image_urls&quot;: [
            &quot;https://images.unsplash.com/photo-1583511655857-d19b40a7a54e?auto=format&amp;fit=crop&amp;w=600&amp;q=80&quot;,
            &quot;https://images.unsplash.com/photo-1543466835-00a7907e9de1?auto=format&amp;fit=crop&amp;w=600&amp;q=80&quot;
        ],
        &quot;seo&quot;: null,
        &quot;media&quot;: []
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-campaigns--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-campaigns--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-campaigns--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-campaigns--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-campaigns--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-campaigns--id-" data-method="GET"
      data-path="api/campaigns/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-campaigns--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-campaigns--id-"
                    onclick="tryItOut('GETapi-campaigns--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-campaigns--id-"
                    onclick="cancelTryOut('GETapi-campaigns--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-campaigns--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/campaigns/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-campaigns--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-campaigns--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-campaigns--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the campaign. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="campaigns-POSTapi-campaigns">Store a new campaign</h2>

<p>
</p>



<span id="example-requests-POSTapi-campaigns">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/campaigns" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "title=bngz"\
    --form "slug=architecto"\
    --form "description=Eius et animi quos velit et."\
    --form "goal_amount=60"\
    --form "raised_amount=42"\
    --form "start_date=2026-08-15T16:17:03"\
    --form "end_date=2026-08-15T16:17:03"\
    --form "status=Active"\
    --form "cover_image_file=@/tmp/phpdbr9lk5flpd3eaIUK7q" \
    --form "gallery_image_files[]=@/tmp/phpc2fjq1j1t0f5ec2Rcck" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/campaigns"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('title', 'bngz');
body.append('slug', 'architecto');
body.append('description', 'Eius et animi quos velit et.');
body.append('goal_amount', '60');
body.append('raised_amount', '42');
body.append('start_date', '2026-08-15T16:17:03');
body.append('end_date', '2026-08-15T16:17:03');
body.append('status', 'Active');
body.append('cover_image_file', document.querySelector('input[name="cover_image_file"]').files[0]);
body.append('gallery_image_files[]', document.querySelector('input[name="gallery_image_files[]"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-campaigns">
</span>
<span id="execution-results-POSTapi-campaigns" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-campaigns"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-campaigns"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-campaigns" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-campaigns">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-campaigns" data-method="POST"
      data-path="api/campaigns"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-campaigns', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-campaigns"
                    onclick="tryItOut('POSTapi-campaigns');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-campaigns"
                    onclick="cancelTryOut('POSTapi-campaigns');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-campaigns"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/campaigns</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-campaigns"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-campaigns"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="POSTapi-campaigns"
               value="bngz"
               data-component="body">
    <br>
<p>Must be at least 2 characters. Example: <code>bngz</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="slug"                data-endpoint="POSTapi-campaigns"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTapi-campaigns"
               value="Eius et animi quos velit et."
               data-component="body">
    <br>
<p>Example: <code>Eius et animi quos velit et.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>goal_amount</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="goal_amount"                data-endpoint="POSTapi-campaigns"
               value="60"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>60</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>raised_amount</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="raised_amount"                data-endpoint="POSTapi-campaigns"
               value="42"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>42</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>start_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="start_date"                data-endpoint="POSTapi-campaigns"
               value="2026-08-15T16:17:03"
               data-component="body">
    <br>
<p>Must be a valid date. Example: <code>2026-08-15T16:17:03</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>end_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="end_date"                data-endpoint="POSTapi-campaigns"
               value="2026-08-15T16:17:03"
               data-component="body">
    <br>
<p>Must be a valid date. Example: <code>2026-08-15T16:17:03</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="POSTapi-campaigns"
               value="Active"
               data-component="body">
    <br>
<p>Example: <code>Active</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>Active</code></li> <li><code>Completed</code></li> <li><code>Closed</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>cover_image_file</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="cover_image_file"                data-endpoint="POSTapi-campaigns"
               value=""
               data-component="body">
    <br>
<p>Must be an image. Must not be greater than 5120 kilobytes. Example: <code>/tmp/phpdbr9lk5flpd3eaIUK7q</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>gallery_image_files</code></b>&nbsp;&nbsp;
<small>file[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="gallery_image_files[0]"                data-endpoint="POSTapi-campaigns"
               data-component="body">
        <input type="file" style="display: none"
               name="gallery_image_files[1]"                data-endpoint="POSTapi-campaigns"
               data-component="body">
    <br>
<p>Must be an image. Must not be greater than 5120 kilobytes.</p>
        </div>
        </form>

                    <h2 id="campaigns-PUTapi-campaigns--id-">Update an existing campaign</h2>

<p>
</p>



<span id="example-requests-PUTapi-campaigns--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/campaigns/1" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "title=bngz"\
    --form "slug=architecto"\
    --form "description=Eius et animi quos velit et."\
    --form "goal_amount=60"\
    --form "raised_amount=42"\
    --form "start_date=2026-08-15T16:17:03"\
    --form "end_date=2026-08-15T16:17:03"\
    --form "status=Active"\
    --form "cover_image_file=@/tmp/php951v5lqr3c20bhqW1ns" \
    --form "gallery_image_files[]=@/tmp/php0adme9bf5h5tbKKNEf3" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/campaigns/1"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('title', 'bngz');
body.append('slug', 'architecto');
body.append('description', 'Eius et animi quos velit et.');
body.append('goal_amount', '60');
body.append('raised_amount', '42');
body.append('start_date', '2026-08-15T16:17:03');
body.append('end_date', '2026-08-15T16:17:03');
body.append('status', 'Active');
body.append('cover_image_file', document.querySelector('input[name="cover_image_file"]').files[0]);
body.append('gallery_image_files[]', document.querySelector('input[name="gallery_image_files[]"]').files[0]);

fetch(url, {
    method: "PUT",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-campaigns--id-">
</span>
<span id="execution-results-PUTapi-campaigns--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-campaigns--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-campaigns--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-campaigns--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-campaigns--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-campaigns--id-" data-method="PUT"
      data-path="api/campaigns/{id}"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-campaigns--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-campaigns--id-"
                    onclick="tryItOut('PUTapi-campaigns--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-campaigns--id-"
                    onclick="cancelTryOut('PUTapi-campaigns--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-campaigns--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/campaigns/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-campaigns--id-"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-campaigns--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-campaigns--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the campaign. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="PUTapi-campaigns--id-"
               value="bngz"
               data-component="body">
    <br>
<p>Must be at least 2 characters. Example: <code>bngz</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="slug"                data-endpoint="PUTapi-campaigns--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTapi-campaigns--id-"
               value="Eius et animi quos velit et."
               data-component="body">
    <br>
<p>Example: <code>Eius et animi quos velit et.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>goal_amount</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="goal_amount"                data-endpoint="PUTapi-campaigns--id-"
               value="60"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>60</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>raised_amount</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="raised_amount"                data-endpoint="PUTapi-campaigns--id-"
               value="42"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>42</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>start_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="start_date"                data-endpoint="PUTapi-campaigns--id-"
               value="2026-08-15T16:17:03"
               data-component="body">
    <br>
<p>Must be a valid date. Example: <code>2026-08-15T16:17:03</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>end_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="end_date"                data-endpoint="PUTapi-campaigns--id-"
               value="2026-08-15T16:17:03"
               data-component="body">
    <br>
<p>Must be a valid date. Example: <code>2026-08-15T16:17:03</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PUTapi-campaigns--id-"
               value="Active"
               data-component="body">
    <br>
<p>Example: <code>Active</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>Active</code></li> <li><code>Completed</code></li> <li><code>Closed</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>cover_image_file</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="cover_image_file"                data-endpoint="PUTapi-campaigns--id-"
               value=""
               data-component="body">
    <br>
<p>Must be an image. Must not be greater than 5120 kilobytes. Example: <code>/tmp/php951v5lqr3c20bhqW1ns</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>gallery_image_files</code></b>&nbsp;&nbsp;
<small>file[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="gallery_image_files[0]"                data-endpoint="PUTapi-campaigns--id-"
               data-component="body">
        <input type="file" style="display: none"
               name="gallery_image_files[1]"                data-endpoint="PUTapi-campaigns--id-"
               data-component="body">
    <br>
<p>Must be an image. Must not be greater than 5120 kilobytes.</p>
        </div>
        </form>

                    <h2 id="campaigns-POSTapi-campaigns--id-">Update an existing campaign</h2>

<p>
</p>



<span id="example-requests-POSTapi-campaigns--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/campaigns/1" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "title=bngz"\
    --form "slug=architecto"\
    --form "description=Eius et animi quos velit et."\
    --form "goal_amount=60"\
    --form "raised_amount=42"\
    --form "start_date=2026-08-15T16:17:03"\
    --form "end_date=2026-08-15T16:17:03"\
    --form "status=Closed"\
    --form "cover_image_file=@/tmp/php524q02fgagsbfWgkfWP" \
    --form "gallery_image_files[]=@/tmp/phpcgmbnbt0sjnf4BqApe3" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/campaigns/1"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('title', 'bngz');
body.append('slug', 'architecto');
body.append('description', 'Eius et animi quos velit et.');
body.append('goal_amount', '60');
body.append('raised_amount', '42');
body.append('start_date', '2026-08-15T16:17:03');
body.append('end_date', '2026-08-15T16:17:03');
body.append('status', 'Closed');
body.append('cover_image_file', document.querySelector('input[name="cover_image_file"]').files[0]);
body.append('gallery_image_files[]', document.querySelector('input[name="gallery_image_files[]"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-campaigns--id-">
</span>
<span id="execution-results-POSTapi-campaigns--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-campaigns--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-campaigns--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-campaigns--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-campaigns--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-campaigns--id-" data-method="POST"
      data-path="api/campaigns/{id}"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-campaigns--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-campaigns--id-"
                    onclick="tryItOut('POSTapi-campaigns--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-campaigns--id-"
                    onclick="cancelTryOut('POSTapi-campaigns--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-campaigns--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/campaigns/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-campaigns--id-"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-campaigns--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="POSTapi-campaigns--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the campaign. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="POSTapi-campaigns--id-"
               value="bngz"
               data-component="body">
    <br>
<p>Must be at least 2 characters. Example: <code>bngz</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="slug"                data-endpoint="POSTapi-campaigns--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTapi-campaigns--id-"
               value="Eius et animi quos velit et."
               data-component="body">
    <br>
<p>Example: <code>Eius et animi quos velit et.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>goal_amount</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="goal_amount"                data-endpoint="POSTapi-campaigns--id-"
               value="60"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>60</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>raised_amount</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="raised_amount"                data-endpoint="POSTapi-campaigns--id-"
               value="42"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>42</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>start_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="start_date"                data-endpoint="POSTapi-campaigns--id-"
               value="2026-08-15T16:17:03"
               data-component="body">
    <br>
<p>Must be a valid date. Example: <code>2026-08-15T16:17:03</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>end_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="end_date"                data-endpoint="POSTapi-campaigns--id-"
               value="2026-08-15T16:17:03"
               data-component="body">
    <br>
<p>Must be a valid date. Example: <code>2026-08-15T16:17:03</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="POSTapi-campaigns--id-"
               value="Closed"
               data-component="body">
    <br>
<p>Example: <code>Closed</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>Active</code></li> <li><code>Completed</code></li> <li><code>Closed</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>cover_image_file</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="cover_image_file"                data-endpoint="POSTapi-campaigns--id-"
               value=""
               data-component="body">
    <br>
<p>Must be an image. Must not be greater than 5120 kilobytes. Example: <code>/tmp/php524q02fgagsbfWgkfWP</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>gallery_image_files</code></b>&nbsp;&nbsp;
<small>file[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="gallery_image_files[0]"                data-endpoint="POSTapi-campaigns--id-"
               data-component="body">
        <input type="file" style="display: none"
               name="gallery_image_files[1]"                data-endpoint="POSTapi-campaigns--id-"
               data-component="body">
    <br>
<p>Must be an image. Must not be greater than 5120 kilobytes.</p>
        </div>
        </form>

                    <h2 id="campaigns-DELETEapi-campaigns--id-">Delete a campaign</h2>

<p>
</p>



<span id="example-requests-DELETEapi-campaigns--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/campaigns/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/campaigns/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-campaigns--id-">
</span>
<span id="execution-results-DELETEapi-campaigns--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-campaigns--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-campaigns--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-campaigns--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-campaigns--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-campaigns--id-" data-method="DELETE"
      data-path="api/campaigns/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-campaigns--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-campaigns--id-"
                    onclick="tryItOut('DELETEapi-campaigns--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-campaigns--id-"
                    onclick="cancelTryOut('DELETEapi-campaigns--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-campaigns--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/campaigns/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-campaigns--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-campaigns--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-campaigns--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the campaign. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="rescue-management">Rescue Management</h1>

    <p>APIs for rescue cases, case assignments, status workflows, and animal care tracking.</p>

                                <h2 id="rescue-management-GETapi-rescue-cases">Display a listing of rescue cases.</h2>

<p>
</p>



<span id="example-requests-GETapi-rescue-cases">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/rescue-cases" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/rescue-cases"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-rescue-cases">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-rescue-cases" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-rescue-cases"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-rescue-cases"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-rescue-cases" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-rescue-cases">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-rescue-cases" data-method="GET"
      data-path="api/rescue-cases"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-rescue-cases', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-rescue-cases"
                    onclick="tryItOut('GETapi-rescue-cases');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-rescue-cases"
                    onclick="cancelTryOut('GETapi-rescue-cases');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-rescue-cases"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/rescue-cases</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-rescue-cases"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-rescue-cases"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="rescue-management-GETapi-rescue-cases--id-">Display the specified rescue case with relationships and activities.</h2>

<p>
</p>



<span id="example-requests-GETapi-rescue-cases--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/rescue-cases/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/rescue-cases/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-rescue-cases--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-rescue-cases--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-rescue-cases--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-rescue-cases--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-rescue-cases--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-rescue-cases--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-rescue-cases--id-" data-method="GET"
      data-path="api/rescue-cases/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-rescue-cases--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-rescue-cases--id-"
                    onclick="tryItOut('GETapi-rescue-cases--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-rescue-cases--id-"
                    onclick="cancelTryOut('GETapi-rescue-cases--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-rescue-cases--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/rescue-cases/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-rescue-cases--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-rescue-cases--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-rescue-cases--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the rescue case. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="rescue-management-GETapi-rescue-cases--id--download">Download the rescue case report as PDF.</h2>

<p>
</p>



<span id="example-requests-GETapi-rescue-cases--id--download">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/rescue-cases/architecto/download" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/rescue-cases/architecto/download"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-rescue-cases--id--download">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-rescue-cases--id--download" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-rescue-cases--id--download"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-rescue-cases--id--download"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-rescue-cases--id--download" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-rescue-cases--id--download">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-rescue-cases--id--download" data-method="GET"
      data-path="api/rescue-cases/{id}/download"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-rescue-cases--id--download', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-rescue-cases--id--download"
                    onclick="tryItOut('GETapi-rescue-cases--id--download');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-rescue-cases--id--download"
                    onclick="cancelTryOut('GETapi-rescue-cases--id--download');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-rescue-cases--id--download"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/rescue-cases/{id}/download</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-rescue-cases--id--download"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-rescue-cases--id--download"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-rescue-cases--id--download"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the rescue case. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="rescue-management-POSTapi-rescue-cases--id--send-report">Send the rescue case report PDF to the reporter&#039;s email.</h2>

<p>
</p>



<span id="example-requests-POSTapi-rescue-cases--id--send-report">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/rescue-cases/architecto/send-report" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/rescue-cases/architecto/send-report"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-rescue-cases--id--send-report">
</span>
<span id="execution-results-POSTapi-rescue-cases--id--send-report" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-rescue-cases--id--send-report"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-rescue-cases--id--send-report"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-rescue-cases--id--send-report" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-rescue-cases--id--send-report">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-rescue-cases--id--send-report" data-method="POST"
      data-path="api/rescue-cases/{id}/send-report"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-rescue-cases--id--send-report', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-rescue-cases--id--send-report"
                    onclick="tryItOut('POSTapi-rescue-cases--id--send-report');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-rescue-cases--id--send-report"
                    onclick="cancelTryOut('POSTapi-rescue-cases--id--send-report');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-rescue-cases--id--send-report"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/rescue-cases/{id}/send-report</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-rescue-cases--id--send-report"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-rescue-cases--id--send-report"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="POSTapi-rescue-cases--id--send-report"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the rescue case. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="rescue-management-PUTapi-rescue-cases--id-">Update the specified rescue case in storage.</h2>

<p>
</p>



<span id="example-requests-PUTapi-rescue-cases--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/rescue-cases/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"status\": \"adopted\",
    \"description\": \"Eius et animi quos velit et.\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/rescue-cases/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "status": "adopted",
    "description": "Eius et animi quos velit et."
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-rescue-cases--id-">
</span>
<span id="execution-results-PUTapi-rescue-cases--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-rescue-cases--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-rescue-cases--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-rescue-cases--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-rescue-cases--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-rescue-cases--id-" data-method="PUT"
      data-path="api/rescue-cases/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-rescue-cases--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-rescue-cases--id-"
                    onclick="tryItOut('PUTapi-rescue-cases--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-rescue-cases--id-"
                    onclick="cancelTryOut('PUTapi-rescue-cases--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-rescue-cases--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/rescue-cases/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-rescue-cases--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-rescue-cases--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-rescue-cases--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the rescue case. Example: <code>architecto</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>rescuer_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="rescuer_id"                data-endpoint="PUTapi-rescue-cases--id-"
               value=""
               data-component="body">
    <br>
<p>Must match an existing stored value.</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PUTapi-rescue-cases--id-"
               value="adopted"
               data-component="body">
    <br>
<p>Example: <code>adopted</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>dispatched</code></li> <li><code>admitted</code></li> <li><code>in_treatment</code></li> <li><code>recovered</code></li> <li><code>released</code></li> <li><code>adopted</code></li> <li><code>deceased</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTapi-rescue-cases--id-"
               value="Eius et animi quos velit et."
               data-component="body">
    <br>
<p>Example: <code>Eius et animi quos velit et.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>clinic_details</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="clinic_details"                data-endpoint="PUTapi-rescue-cases--id-"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>recovery_details</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="recovery_details"                data-endpoint="PUTapi-rescue-cases--id-"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>adoption_details</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="adoption_details"                data-endpoint="PUTapi-rescue-cases--id-"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>release_details</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="release_details"                data-endpoint="PUTapi-rescue-cases--id-"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>deceased_details</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="deceased_details"                data-endpoint="PUTapi-rescue-cases--id-"
               value=""
               data-component="body">
    <br>

        </div>
        </form>

                    <h2 id="rescue-management-DELETEapi-rescue-cases--id-">Remove the specified rescue case from storage.</h2>

<p>
</p>



<span id="example-requests-DELETEapi-rescue-cases--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/rescue-cases/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/rescue-cases/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-rescue-cases--id-">
</span>
<span id="execution-results-DELETEapi-rescue-cases--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-rescue-cases--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-rescue-cases--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-rescue-cases--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-rescue-cases--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-rescue-cases--id-" data-method="DELETE"
      data-path="api/rescue-cases/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-rescue-cases--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-rescue-cases--id-"
                    onclick="tryItOut('DELETEapi-rescue-cases--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-rescue-cases--id-"
                    onclick="cancelTryOut('DELETEapi-rescue-cases--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-rescue-cases--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/rescue-cases/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-rescue-cases--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-rescue-cases--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-rescue-cases--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the rescue case. Example: <code>architecto</code></p>
            </div>
                    </form>

                <h1 id="animal-reports">Animal Reports</h1>

    <p>APIs for submitting, viewing, and processing public animal distress reports.</p>

                                <h2 id="animal-reports-POSTapi-animal-reports">Store a new animal report (Public submission).</h2>

<p>
</p>



<span id="example-requests-POSTapi-animal-reports">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/animal-reports" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "reporter_name=b"\
    --form "reporter_mobile=ngzmiyvdljnikhwa"\
    --form "reporter_email=breitenberg.gilbert@example.com"\
    --form "animal_type=u"\
    --form "approximate_age=w"\
    --form "color=p"\
    --form "gender=w"\
    --form "injuries[]=architecto"\
    --form "address=architecto"\
    --form "landmark=n"\
    --form "latitude=4326.41688"\
    --form "longitude=4326.41688"\
    --form "urgency=medium"\
    --form "description=Eius et animi quos velit et."\
    --form "photos[]=@/tmp/php4nduq35egmpsesEWHrI" \
    --form "video=@/tmp/php76urjo5msf965JdntHD" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/animal-reports"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('reporter_name', 'b');
body.append('reporter_mobile', 'ngzmiyvdljnikhwa');
body.append('reporter_email', 'breitenberg.gilbert@example.com');
body.append('animal_type', 'u');
body.append('approximate_age', 'w');
body.append('color', 'p');
body.append('gender', 'w');
body.append('injuries[]', 'architecto');
body.append('address', 'architecto');
body.append('landmark', 'n');
body.append('latitude', '4326.41688');
body.append('longitude', '4326.41688');
body.append('urgency', 'medium');
body.append('description', 'Eius et animi quos velit et.');
body.append('photos[]', document.querySelector('input[name="photos[]"]').files[0]);
body.append('video', document.querySelector('input[name="video"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-animal-reports">
</span>
<span id="execution-results-POSTapi-animal-reports" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-animal-reports"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-animal-reports"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-animal-reports" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-animal-reports">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-animal-reports" data-method="POST"
      data-path="api/animal-reports"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-animal-reports', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-animal-reports"
                    onclick="tryItOut('POSTapi-animal-reports');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-animal-reports"
                    onclick="cancelTryOut('POSTapi-animal-reports');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-animal-reports"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/animal-reports</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-animal-reports"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-animal-reports"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>reporter_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="reporter_name"                data-endpoint="POSTapi-animal-reports"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>reporter_mobile</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="reporter_mobile"                data-endpoint="POSTapi-animal-reports"
               value="ngzmiyvdljnikhwa"
               data-component="body">
    <br>
<p>Must not be greater than 20 characters. Example: <code>ngzmiyvdljnikhwa</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>reporter_email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="reporter_email"                data-endpoint="POSTapi-animal-reports"
               value="breitenberg.gilbert@example.com"
               data-component="body">
    <br>
<p>Must be a valid email address. Must not be greater than 255 characters. Example: <code>breitenberg.gilbert@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>animal_type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="animal_type"                data-endpoint="POSTapi-animal-reports"
               value="u"
               data-component="body">
    <br>
<p>Must not be greater than 100 characters. Example: <code>u</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>approximate_age</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="approximate_age"                data-endpoint="POSTapi-animal-reports"
               value="w"
               data-component="body">
    <br>
<p>Must not be greater than 100 characters. Example: <code>w</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>color</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="color"                data-endpoint="POSTapi-animal-reports"
               value="p"
               data-component="body">
    <br>
<p>Must not be greater than 100 characters. Example: <code>p</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>gender</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="gender"                data-endpoint="POSTapi-animal-reports"
               value="w"
               data-component="body">
    <br>
<p>Must not be greater than 50 characters. Example: <code>w</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>injuries</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="injuries[0]"                data-endpoint="POSTapi-animal-reports"
               data-component="body">
        <input type="text" style="display: none"
               name="injuries[1]"                data-endpoint="POSTapi-animal-reports"
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="address"                data-endpoint="POSTapi-animal-reports"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>landmark</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="landmark"                data-endpoint="POSTapi-animal-reports"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>latitude</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="latitude"                data-endpoint="POSTapi-animal-reports"
               value="4326.41688"
               data-component="body">
    <br>
<p>Example: <code>4326.41688</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>longitude</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="longitude"                data-endpoint="POSTapi-animal-reports"
               value="4326.41688"
               data-component="body">
    <br>
<p>Example: <code>4326.41688</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>urgency</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="urgency"                data-endpoint="POSTapi-animal-reports"
               value="medium"
               data-component="body">
    <br>
<p>Example: <code>medium</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>low</code></li> <li><code>medium</code></li> <li><code>high</code></li> <li><code>critical</code></li> <li><code>Low</code></li> <li><code>Medium</code></li> <li><code>High</code></li> <li><code>Critical</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTapi-animal-reports"
               value="Eius et animi quos velit et."
               data-component="body">
    <br>
<p>Example: <code>Eius et animi quos velit et.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>photos</code></b>&nbsp;&nbsp;
<small>file[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="photos[0]"                data-endpoint="POSTapi-animal-reports"
               data-component="body">
        <input type="file" style="display: none"
               name="photos[1]"                data-endpoint="POSTapi-animal-reports"
               data-component="body">
    <br>
<p>Must be a file. Must be an image. Must not be greater than 10240 kilobytes.</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>video</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="video"                data-endpoint="POSTapi-animal-reports"
               value=""
               data-component="body">
    <br>
<p>Must be a file. Must not be greater than 51200 kilobytes. Example: <code>/tmp/php76urjo5msf965JdntHD</code></p>
        </div>
        </form>

                    <h2 id="animal-reports-GETapi-animal-reports">Retrieve list of reports (Admin).</h2>

<p>
</p>



<span id="example-requests-GETapi-animal-reports">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/animal-reports" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/animal-reports"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-animal-reports">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-animal-reports" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-animal-reports"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-animal-reports"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-animal-reports" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-animal-reports">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-animal-reports" data-method="GET"
      data-path="api/animal-reports"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-animal-reports', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-animal-reports"
                    onclick="tryItOut('GETapi-animal-reports');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-animal-reports"
                    onclick="cancelTryOut('GETapi-animal-reports');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-animal-reports"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/animal-reports</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-animal-reports"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-animal-reports"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="animal-reports-GETapi-animal-reports--id-">Retrieve single report details (Admin).</h2>

<p>
</p>



<span id="example-requests-GETapi-animal-reports--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/animal-reports/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/animal-reports/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-animal-reports--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-animal-reports--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-animal-reports--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-animal-reports--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-animal-reports--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-animal-reports--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-animal-reports--id-" data-method="GET"
      data-path="api/animal-reports/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-animal-reports--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-animal-reports--id-"
                    onclick="tryItOut('GETapi-animal-reports--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-animal-reports--id-"
                    onclick="cancelTryOut('GETapi-animal-reports--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-animal-reports--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/animal-reports/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-animal-reports--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-animal-reports--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-animal-reports--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the animal report. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="animal-reports-PUTapi-animal-reports--id-">Update report notes or status (Admin).</h2>

<p>
</p>



<span id="example-requests-PUTapi-animal-reports--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/animal-reports/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"status\": \"pending\",
    \"admin_notes\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/animal-reports/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "status": "pending",
    "admin_notes": "architecto"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-animal-reports--id-">
</span>
<span id="execution-results-PUTapi-animal-reports--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-animal-reports--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-animal-reports--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-animal-reports--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-animal-reports--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-animal-reports--id-" data-method="PUT"
      data-path="api/animal-reports/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-animal-reports--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-animal-reports--id-"
                    onclick="tryItOut('PUTapi-animal-reports--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-animal-reports--id-"
                    onclick="cancelTryOut('PUTapi-animal-reports--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-animal-reports--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/animal-reports/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-animal-reports--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-animal-reports--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-animal-reports--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the animal report. Example: <code>architecto</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PUTapi-animal-reports--id-"
               value="pending"
               data-component="body">
    <br>
<p>Example: <code>pending</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>pending</code></li> <li><code>accepted</code></li> <li><code>rejected</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>admin_notes</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="admin_notes"                data-endpoint="PUTapi-animal-reports--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="animal-reports-POSTapi-animal-reports--id--accept">Accept report &amp; create Rescue Case (Admin).</h2>

<p>
</p>



<span id="example-requests-POSTapi-animal-reports--id--accept">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/animal-reports/architecto/accept" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"status\": \"released\",
    \"description\": \"Eius et animi quos velit et.\",
    \"admin_notes\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/animal-reports/architecto/accept"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "status": "released",
    "description": "Eius et animi quos velit et.",
    "admin_notes": "architecto"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-animal-reports--id--accept">
</span>
<span id="execution-results-POSTapi-animal-reports--id--accept" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-animal-reports--id--accept"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-animal-reports--id--accept"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-animal-reports--id--accept" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-animal-reports--id--accept">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-animal-reports--id--accept" data-method="POST"
      data-path="api/animal-reports/{id}/accept"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-animal-reports--id--accept', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-animal-reports--id--accept"
                    onclick="tryItOut('POSTapi-animal-reports--id--accept');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-animal-reports--id--accept"
                    onclick="cancelTryOut('POSTapi-animal-reports--id--accept');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-animal-reports--id--accept"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/animal-reports/{id}/accept</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-animal-reports--id--accept"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-animal-reports--id--accept"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="POSTapi-animal-reports--id--accept"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the animal report. Example: <code>architecto</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>rescuer_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="rescuer_id"                data-endpoint="POSTapi-animal-reports--id--accept"
               value=""
               data-component="body">
    <br>
<p>Must match an existing stored value.</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="POSTapi-animal-reports--id--accept"
               value="released"
               data-component="body">
    <br>
<p>Example: <code>released</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>dispatched</code></li> <li><code>admitted</code></li> <li><code>in_treatment</code></li> <li><code>recovered</code></li> <li><code>released</code></li> <li><code>adopted</code></li> <li><code>deceased</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTapi-animal-reports--id--accept"
               value="Eius et animi quos velit et."
               data-component="body">
    <br>
<p>Example: <code>Eius et animi quos velit et.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>admin_notes</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="admin_notes"                data-endpoint="POSTapi-animal-reports--id--accept"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="animal-reports-DELETEapi-animal-reports--id-">Delete report (Admin).</h2>

<p>
</p>



<span id="example-requests-DELETEapi-animal-reports--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/animal-reports/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/animal-reports/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-animal-reports--id-">
</span>
<span id="execution-results-DELETEapi-animal-reports--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-animal-reports--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-animal-reports--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-animal-reports--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-animal-reports--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-animal-reports--id-" data-method="DELETE"
      data-path="api/animal-reports/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-animal-reports--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-animal-reports--id-"
                    onclick="tryItOut('DELETEapi-animal-reports--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-animal-reports--id-"
                    onclick="cancelTryOut('DELETEapi-animal-reports--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-animal-reports--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/animal-reports/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-animal-reports--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-animal-reports--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-animal-reports--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the animal report. Example: <code>architecto</code></p>
            </div>
                    </form>

                <h1 id="volunteers">Volunteers</h1>

    <p>APIs for volunteer applications, approvals, and volunteer directory management.</p>

                                <h2 id="volunteers-GETapi-volunteers-public">GET api/volunteers/public</h2>

<p>
</p>



<span id="example-requests-GETapi-volunteers-public">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/volunteers/public" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/volunteers/public"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-volunteers-public">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: true,
    &quot;message&quot;: &quot;Public volunteers retrieved successfully.&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 8,
            &quot;full_name&quot;: &quot;Ananya Joshi&quot;,
            &quot;fullName&quot;: &quot;Ananya Joshi&quot;,
            &quot;city&quot;: &quot;Pune&quot;,
            &quot;role&quot;: &quot;Fundraising Volunteer&quot;,
            &quot;reason&quot;: &quot;Corporate communications lead looking to connect NGO with CSR initiatives.&quot;,
            &quot;bio&quot;: &quot;Corporate communications lead looking to connect NGO with CSR initiatives.&quot;,
            &quot;avatar&quot;: null,
            &quot;show_in_website&quot;: true,
            &quot;created_at&quot;: &quot;2026-08-10T16:04:51.000000Z&quot;
        },
        {
            &quot;id&quot;: 7,
            &quot;full_name&quot;: &quot;Rohan Mehta&quot;,
            &quot;fullName&quot;: &quot;Rohan Mehta&quot;,
            &quot;city&quot;: &quot;Pune&quot;,
            &quot;role&quot;: &quot;Social Media Volunteer&quot;,
            &quot;reason&quot;: &quot;Experienced photographer and video editor wanting to create reels for animal adoption.&quot;,
            &quot;bio&quot;: &quot;Experienced photographer and video editor wanting to create reels for animal adoption.&quot;,
            &quot;avatar&quot;: null,
            &quot;show_in_website&quot;: true,
            &quot;created_at&quot;: &quot;2026-08-10T16:04:51.000000Z&quot;
        },
        {
            &quot;id&quot;: 6,
            &quot;full_name&quot;: &quot;Aarav Sharma&quot;,
            &quot;fullName&quot;: &quot;Aarav Sharma&quot;,
            &quot;city&quot;: &quot;Pune&quot;,
            &quot;role&quot;: &quot;Rescue Volunteer&quot;,
            &quot;reason&quot;: &quot;I have a 2-wheeler and weekend availability to help rescue stray animals in need.&quot;,
            &quot;bio&quot;: &quot;I have a 2-wheeler and weekend availability to help rescue stray animals in need.&quot;,
            &quot;avatar&quot;: null,
            &quot;show_in_website&quot;: true,
            &quot;created_at&quot;: &quot;2026-08-10T16:04:50.000000Z&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-volunteers-public" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-volunteers-public"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-volunteers-public"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-volunteers-public" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-volunteers-public">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-volunteers-public" data-method="GET"
      data-path="api/volunteers/public"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-volunteers-public', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-volunteers-public"
                    onclick="tryItOut('GETapi-volunteers-public');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-volunteers-public"
                    onclick="cancelTryOut('GETapi-volunteers-public');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-volunteers-public"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/volunteers/public</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-volunteers-public"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-volunteers-public"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="volunteers-POSTapi-volunteers">POST api/volunteers</h2>

<p>
</p>



<span id="example-requests-POSTapi-volunteers">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/volunteers" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"full_name\": \"bngz\",
    \"email\": \"rempel.chadrick@example.org\",
    \"phone\": \"architecto\",
    \"city\": \"architecto\",
    \"role\": \"architecto\",
    \"reason\": \"architecto\",
    \"status\": \"Rejected\",
    \"adminNotes\": \"architecto\",
    \"admin_notes\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/volunteers"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "full_name": "bngz",
    "email": "rempel.chadrick@example.org",
    "phone": "architecto",
    "city": "architecto",
    "role": "architecto",
    "reason": "architecto",
    "status": "Rejected",
    "adminNotes": "architecto",
    "admin_notes": "architecto"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-volunteers">
</span>
<span id="execution-results-POSTapi-volunteers" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-volunteers"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-volunteers"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-volunteers" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-volunteers">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-volunteers" data-method="POST"
      data-path="api/volunteers"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-volunteers', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-volunteers"
                    onclick="tryItOut('POSTapi-volunteers');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-volunteers"
                    onclick="cancelTryOut('POSTapi-volunteers');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-volunteers"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/volunteers</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-volunteers"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-volunteers"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>full_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="full_name"                data-endpoint="POSTapi-volunteers"
               value="bngz"
               data-component="body">
    <br>
<p>Must be at least 2 characters. Example: <code>bngz</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-volunteers"
               value="rempel.chadrick@example.org"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>rempel.chadrick@example.org</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="POSTapi-volunteers"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>city</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="city"                data-endpoint="POSTapi-volunteers"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>role</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="role"                data-endpoint="POSTapi-volunteers"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>reason</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="reason"                data-endpoint="POSTapi-volunteers"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="POSTapi-volunteers"
               value="Rejected"
               data-component="body">
    <br>
<p>Example: <code>Rejected</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>Pending</code></li> <li><code>Approved</code></li> <li><code>Rejected</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>adminNotes</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="adminNotes"                data-endpoint="POSTapi-volunteers"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>admin_notes</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="admin_notes"                data-endpoint="POSTapi-volunteers"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="volunteers-GETapi-volunteers">GET api/volunteers</h2>

<p>
</p>



<span id="example-requests-GETapi-volunteers">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/volunteers" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/volunteers"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-volunteers">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-volunteers" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-volunteers"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-volunteers"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-volunteers" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-volunteers">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-volunteers" data-method="GET"
      data-path="api/volunteers"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-volunteers', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-volunteers"
                    onclick="tryItOut('GETapi-volunteers');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-volunteers"
                    onclick="cancelTryOut('GETapi-volunteers');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-volunteers"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/volunteers</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-volunteers"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-volunteers"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="volunteers-GETapi-volunteers--id-">GET api/volunteers/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-volunteers--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/volunteers/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/volunteers/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-volunteers--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-volunteers--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-volunteers--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-volunteers--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-volunteers--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-volunteers--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-volunteers--id-" data-method="GET"
      data-path="api/volunteers/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-volunteers--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-volunteers--id-"
                    onclick="tryItOut('GETapi-volunteers--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-volunteers--id-"
                    onclick="cancelTryOut('GETapi-volunteers--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-volunteers--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/volunteers/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-volunteers--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-volunteers--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-volunteers--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the volunteer. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="volunteers-PUTapi-volunteers--id-">PUT api/volunteers/{id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-volunteers--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/volunteers/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"full_name\": \"bngz\",
    \"email\": \"rempel.chadrick@example.org\",
    \"phone\": \"architecto\",
    \"city\": \"architecto\",
    \"role\": \"architecto\",
    \"reason\": \"architecto\",
    \"status\": \"Pending\",
    \"adminNotes\": \"architecto\",
    \"admin_notes\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/volunteers/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "full_name": "bngz",
    "email": "rempel.chadrick@example.org",
    "phone": "architecto",
    "city": "architecto",
    "role": "architecto",
    "reason": "architecto",
    "status": "Pending",
    "adminNotes": "architecto",
    "admin_notes": "architecto"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-volunteers--id-">
</span>
<span id="execution-results-PUTapi-volunteers--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-volunteers--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-volunteers--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-volunteers--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-volunteers--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-volunteers--id-" data-method="PUT"
      data-path="api/volunteers/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-volunteers--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-volunteers--id-"
                    onclick="tryItOut('PUTapi-volunteers--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-volunteers--id-"
                    onclick="cancelTryOut('PUTapi-volunteers--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-volunteers--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/volunteers/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-volunteers--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-volunteers--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-volunteers--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the volunteer. Example: <code>architecto</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>full_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="full_name"                data-endpoint="PUTapi-volunteers--id-"
               value="bngz"
               data-component="body">
    <br>
<p>Must be at least 2 characters. Example: <code>bngz</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="PUTapi-volunteers--id-"
               value="rempel.chadrick@example.org"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>rempel.chadrick@example.org</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="PUTapi-volunteers--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>city</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="city"                data-endpoint="PUTapi-volunteers--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>role</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="role"                data-endpoint="PUTapi-volunteers--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>reason</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="reason"                data-endpoint="PUTapi-volunteers--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PUTapi-volunteers--id-"
               value="Pending"
               data-component="body">
    <br>
<p>Example: <code>Pending</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>Pending</code></li> <li><code>Approved</code></li> <li><code>Rejected</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>adminNotes</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="adminNotes"                data-endpoint="PUTapi-volunteers--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>admin_notes</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="admin_notes"                data-endpoint="PUTapi-volunteers--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="volunteers-DELETEapi-volunteers--id-">DELETE api/volunteers/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-volunteers--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/volunteers/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/volunteers/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-volunteers--id-">
</span>
<span id="execution-results-DELETEapi-volunteers--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-volunteers--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-volunteers--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-volunteers--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-volunteers--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-volunteers--id-" data-method="DELETE"
      data-path="api/volunteers/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-volunteers--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-volunteers--id-"
                    onclick="tryItOut('DELETEapi-volunteers--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-volunteers--id-"
                    onclick="cancelTryOut('DELETEapi-volunteers--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-volunteers--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/volunteers/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-volunteers--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-volunteers--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-volunteers--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the volunteer. Example: <code>architecto</code></p>
            </div>
                    </form>

                <h1 id="in-kind-contributions">In-Kind Contributions</h1>

    <p>APIs for physical item donations, food/supplies contributions, and logistics.</p>

                                <h2 id="in-kind-contributions-GETapi-contributions-types">Public: Get available contribution types and categories.</h2>

<p>
</p>



<span id="example-requests-GETapi-contributions-types">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/contributions/types" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/contributions/types"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-contributions-types">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;types&quot;: [
        {
            &quot;id&quot;: &quot;food&quot;,
            &quot;label&quot;: &quot;Give Food&quot;,
            &quot;description&quot;: &quot;Pet food, grains, milk packets, and animal meals.&quot;
        },
        {
            &quot;id&quot;: &quot;supplies&quot;,
            &quot;label&quot;: &quot;Give Supplies&quot;,
            &quot;description&quot;: &quot;Medicines, blankets, bowls, cages, and stationery.&quot;
        },
        {
            &quot;id&quot;: &quot;services&quot;,
            &quot;label&quot;: &quot;Give Services&quot;,
            &quot;description&quot;: &quot;Animal transportation, printing, grooming, &amp; logistics.&quot;
        },
        {
            &quot;id&quot;: &quot;business_csr&quot;,
            &quot;label&quot;: &quot;Business / CSR Support&quot;,
            &quot;description&quot;: &quot;Corporate supply sponsorship &amp; recurring monthly drives.&quot;
        }
    ],
    &quot;categories&quot;: {
        &quot;food&quot;: [
            &quot;Dog Food&quot;,
            &quot;Cat Food&quot;,
            &quot;Rice &amp; Grains&quot;,
            &quot;Milk &amp; Formula&quot;,
            &quot;Vegetables &amp; Meat&quot;,
            &quot;Meal Packets&quot;
        ],
        &quot;supplies&quot;: [
            &quot;Medicines &amp; First Aid&quot;,
            &quot;Blankets &amp; Towels&quot;,
            &quot;Pet Beds &amp; Cages&quot;,
            &quot;Bowls &amp; Leashes&quot;,
            &quot;Stationery &amp; School Bags&quot;
        ],
        &quot;services&quot;: [
            &quot;Animal Transportation&quot;,
            &quot;Free Printing&quot;,
            &quot;Grooming &amp; Hygiene&quot;,
            &quot;Storage &amp; Logistics&quot;
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-contributions-types" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-contributions-types"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-contributions-types"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-contributions-types" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-contributions-types">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-contributions-types" data-method="GET"
      data-path="api/contributions/types"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-contributions-types', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-contributions-types"
                    onclick="tryItOut('GETapi-contributions-types');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-contributions-types"
                    onclick="cancelTryOut('GETapi-contributions-types');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-contributions-types"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/contributions/types</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-contributions-types"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-contributions-types"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="in-kind-contributions-GETapi-contributions-impact-summary">Public: Get public impact summary.</h2>

<p>
</p>



<span id="example-requests-GETapi-contributions-impact-summary">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/contributions/impact-summary" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/contributions/impact-summary"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-contributions-impact-summary">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;impact&quot;: {
        &quot;foodDistributedKg&quot;: 850,
        &quot;medicalUnitsProvided&quot;: 240,
        &quot;shelterItemsProvided&quot;: 150,
        &quot;volunteersAndSkillSupporters&quot;: 45,
        &quot;corporatePartners&quot;: 12
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-contributions-impact-summary" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-contributions-impact-summary"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-contributions-impact-summary"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-contributions-impact-summary" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-contributions-impact-summary">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-contributions-impact-summary" data-method="GET"
      data-path="api/contributions/impact-summary"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-contributions-impact-summary', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-contributions-impact-summary"
                    onclick="tryItOut('GETapi-contributions-impact-summary');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-contributions-impact-summary"
                    onclick="cancelTryOut('GETapi-contributions-impact-summary');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-contributions-impact-summary"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/contributions/impact-summary</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-contributions-impact-summary"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-contributions-impact-summary"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="in-kind-contributions-POSTapi-contributions">Public: Store new contribution request.</h2>

<p>
</p>



<span id="example-requests-POSTapi-contributions">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/contributions" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"type\": \"food\",
    \"contributor_name\": \"b\",
    \"contributor_email\": \"zbailey@example.net\",
    \"contributor_phone\": \"i\",
    \"city\": \"y\",
    \"address\": \"v\",
    \"fulfillment_method\": \"drop_off\",
    \"preferred_date\": \"2026-08-15T16:17:03\",
    \"items\": [
        {
            \"item_name\": \"d\",
            \"quantity\": 37
        }
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/contributions"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "type": "food",
    "contributor_name": "b",
    "contributor_email": "zbailey@example.net",
    "contributor_phone": "i",
    "city": "y",
    "address": "v",
    "fulfillment_method": "drop_off",
    "preferred_date": "2026-08-15T16:17:03",
    "items": [
        {
            "item_name": "d",
            "quantity": 37
        }
    ]
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-contributions">
</span>
<span id="execution-results-POSTapi-contributions" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-contributions"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-contributions"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-contributions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-contributions">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-contributions" data-method="POST"
      data-path="api/contributions"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-contributions', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-contributions"
                    onclick="tryItOut('POSTapi-contributions');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-contributions"
                    onclick="cancelTryOut('POSTapi-contributions');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-contributions"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/contributions</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-contributions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-contributions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="type"                data-endpoint="POSTapi-contributions"
               value="food"
               data-component="body">
    <br>
<p>Example: <code>food</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>food</code></li> <li><code>supplies</code></li> <li><code>services</code></li> <li><code>business_csr</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>contributor_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="contributor_name"                data-endpoint="POSTapi-contributions"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>contributor_email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="contributor_email"                data-endpoint="POSTapi-contributions"
               value="zbailey@example.net"
               data-component="body">
    <br>
<p>Must be a valid email address. Must not be greater than 255 characters. Example: <code>zbailey@example.net</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>contributor_phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="contributor_phone"                data-endpoint="POSTapi-contributions"
               value="i"
               data-component="body">
    <br>
<p>Must not be greater than 50 characters. Example: <code>i</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>city</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="city"                data-endpoint="POSTapi-contributions"
               value="y"
               data-component="body">
    <br>
<p>Must not be greater than 100 characters. Example: <code>y</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="address"                data-endpoint="POSTapi-contributions"
               value="v"
               data-component="body">
    <br>
<p>Must not be greater than 500 characters. Example: <code>v</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fulfillment_method</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fulfillment_method"                data-endpoint="POSTapi-contributions"
               value="drop_off"
               data-component="body">
    <br>
<p>Example: <code>drop_off</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>pickup</code></li> <li><code>drop_off</code></li> <li><code>courier</code></li> <li><code>digital</code></li> <li><code>on_site</code></li> <li><code>n_a</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>preferred_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="preferred_date"                data-endpoint="POSTapi-contributions"
               value="2026-08-15T16:17:03"
               data-component="body">
    <br>
<p>Must be a valid date. Example: <code>2026-08-15T16:17:03</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>items</code></b>&nbsp;&nbsp;
<small>object[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
<br>

            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>item_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="items.0.item_name"                data-endpoint="POSTapi-contributions"
               value="d"
               data-component="body">
    <br>
<p>This field is required when <code>items</code> is present. Must not be greater than 255 characters. Example: <code>d</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>quantity</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="items.0.quantity"                data-endpoint="POSTapi-contributions"
               value="37"
               data-component="body">
    <br>
<p>This field is required when <code>items</code> is present. Must be at least 0.01. Example: <code>37</code></p>
                    </div>
                                    </details>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>skill</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="skill"                data-endpoint="POSTapi-contributions"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>schedule</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="schedule"                data-endpoint="POSTapi-contributions"
               value=""
               data-component="body">
    <br>

        </div>
        </form>

                    <h2 id="in-kind-contributions-GETapi-contributions-track--referenceNumber-">Public: Track contribution status by reference number.</h2>

<p>
</p>



<span id="example-requests-GETapi-contributions-track--referenceNumber-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/contributions/track/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/contributions/track/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-contributions-track--referenceNumber-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Contribution reference number not found.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-contributions-track--referenceNumber-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-contributions-track--referenceNumber-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-contributions-track--referenceNumber-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-contributions-track--referenceNumber-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-contributions-track--referenceNumber-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-contributions-track--referenceNumber-" data-method="GET"
      data-path="api/contributions/track/{referenceNumber}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-contributions-track--referenceNumber-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-contributions-track--referenceNumber-"
                    onclick="tryItOut('GETapi-contributions-track--referenceNumber-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-contributions-track--referenceNumber-"
                    onclick="cancelTryOut('GETapi-contributions-track--referenceNumber-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-contributions-track--referenceNumber-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/contributions/track/{referenceNumber}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-contributions-track--referenceNumber-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-contributions-track--referenceNumber-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>referenceNumber</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="referenceNumber"                data-endpoint="GETapi-contributions-track--referenceNumber-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="in-kind-contributions-GETapi-contributions">Admin: Get paginated contribution requests.</h2>

<p>
</p>



<span id="example-requests-GETapi-contributions">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/contributions" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/contributions"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-contributions">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-contributions" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-contributions"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-contributions"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-contributions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-contributions">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-contributions" data-method="GET"
      data-path="api/contributions"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-contributions', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-contributions"
                    onclick="tryItOut('GETapi-contributions');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-contributions"
                    onclick="cancelTryOut('GETapi-contributions');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-contributions"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/contributions</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-contributions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-contributions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="in-kind-contributions-GETapi-contributions-stats">Admin: Get statistics summary.</h2>

<p>
</p>



<span id="example-requests-GETapi-contributions-stats">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/contributions/stats" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/contributions/stats"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-contributions-stats">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-contributions-stats" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-contributions-stats"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-contributions-stats"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-contributions-stats" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-contributions-stats">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-contributions-stats" data-method="GET"
      data-path="api/contributions/stats"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-contributions-stats', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-contributions-stats"
                    onclick="tryItOut('GETapi-contributions-stats');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-contributions-stats"
                    onclick="cancelTryOut('GETapi-contributions-stats');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-contributions-stats"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/contributions/stats</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-contributions-stats"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-contributions-stats"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="in-kind-contributions-GETapi-contributions--id-">Admin: Show single contribution detail.</h2>

<p>
</p>



<span id="example-requests-GETapi-contributions--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/contributions/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/contributions/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-contributions--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-contributions--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-contributions--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-contributions--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-contributions--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-contributions--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-contributions--id-" data-method="GET"
      data-path="api/contributions/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-contributions--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-contributions--id-"
                    onclick="tryItOut('GETapi-contributions--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-contributions--id-"
                    onclick="cancelTryOut('GETapi-contributions--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-contributions--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/contributions/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-contributions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-contributions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-contributions--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the contribution. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="in-kind-contributions-PATCHapi-contributions--id--status">Admin: Update status and notes.</h2>

<p>
</p>



<span id="example-requests-PATCHapi-contributions--id--status">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://127.0.0.1:8000/api/contributions/1/status" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"status\": \"scheduled\",
    \"admin_notes\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/contributions/1/status"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "status": "scheduled",
    "admin_notes": "architecto"
};

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PATCHapi-contributions--id--status">
</span>
<span id="execution-results-PATCHapi-contributions--id--status" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHapi-contributions--id--status"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-contributions--id--status"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PATCHapi-contributions--id--status" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-contributions--id--status">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PATCHapi-contributions--id--status" data-method="PATCH"
      data-path="api/contributions/{id}/status"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHapi-contributions--id--status', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHapi-contributions--id--status"
                    onclick="tryItOut('PATCHapi-contributions--id--status');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHapi-contributions--id--status"
                    onclick="cancelTryOut('PATCHapi-contributions--id--status');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHapi-contributions--id--status"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/contributions/{id}/status</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PATCHapi-contributions--id--status"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PATCHapi-contributions--id--status"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PATCHapi-contributions--id--status"
               value="1"
               data-component="url">
    <br>
<p>The ID of the contribution. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PATCHapi-contributions--id--status"
               value="scheduled"
               data-component="body">
    <br>
<p>Example: <code>scheduled</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>pending</code></li> <li><code>under_review</code></li> <li><code>approved</code></li> <li><code>contacted</code></li> <li><code>scheduled</code></li> <li><code>received</code></li> <li><code>completed</code></li> <li><code>rejected</code></li> <li><code>cancelled</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>admin_notes</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="admin_notes"                data-endpoint="PATCHapi-contributions--id--status"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>assigned_to</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="assigned_to"                data-endpoint="PATCHapi-contributions--id--status"
               value=""
               data-component="body">
    <br>
<p>Must match an existing stored value.</p>
        </div>
        </form>

                    <h2 id="in-kind-contributions-POSTapi-contributions--id--notes">Admin: Add internal note.</h2>

<p>
</p>



<span id="example-requests-POSTapi-contributions--id--notes">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/contributions/1/notes" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"notes\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/contributions/1/notes"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "notes": "architecto"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-contributions--id--notes">
</span>
<span id="execution-results-POSTapi-contributions--id--notes" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-contributions--id--notes"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-contributions--id--notes"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-contributions--id--notes" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-contributions--id--notes">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-contributions--id--notes" data-method="POST"
      data-path="api/contributions/{id}/notes"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-contributions--id--notes', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-contributions--id--notes"
                    onclick="tryItOut('POSTapi-contributions--id--notes');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-contributions--id--notes"
                    onclick="cancelTryOut('POSTapi-contributions--id--notes');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-contributions--id--notes"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/contributions/{id}/notes</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-contributions--id--notes"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-contributions--id--notes"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="POSTapi-contributions--id--notes"
               value="1"
               data-component="url">
    <br>
<p>The ID of the contribution. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>notes</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="notes"                data-endpoint="POSTapi-contributions--id--notes"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="in-kind-contributions-DELETEapi-contributions--id-">Admin: Delete a contribution.</h2>

<p>
</p>



<span id="example-requests-DELETEapi-contributions--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/contributions/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/contributions/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-contributions--id-">
</span>
<span id="execution-results-DELETEapi-contributions--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-contributions--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-contributions--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-contributions--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-contributions--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-contributions--id-" data-method="DELETE"
      data-path="api/contributions/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-contributions--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-contributions--id-"
                    onclick="tryItOut('DELETEapi-contributions--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-contributions--id-"
                    onclick="cancelTryOut('DELETEapi-contributions--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-contributions--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/contributions/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-contributions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-contributions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-contributions--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the contribution. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="wishlist-management">Wishlist Management</h1>

    <p>APIs for shelter wishlist items, urgent needs, and stock tracking.</p>

                                <h2 id="wishlist-management-GETapi-wishlist-items">Public: Fetch active wishlist items for website.</h2>

<p>
</p>



<span id="example-requests-GETapi-wishlist-items">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/wishlist-items" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/wishlist-items"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-wishlist-items">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;items&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;title&quot;: &quot;Surgical Gauze Rolls (Pack of 4)&quot;,
            &quot;category&quot;: &quot;MEDICAL&quot;,
            &quot;price&quot;: &quot;₹165&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?w=500&amp;auto=format&amp;fit=crop&amp;q=80&quot;,
            &quot;flipkart_url&quot;: &quot;https://www.flipkart.com/search?q=surgical+gauze+roll&quot;,
            &quot;amazon_url&quot;: &quot;https://www.amazon.in/s?k=surgical+gauze+roll&quot;,
            &quot;target_quantity&quot;: 100,
            &quot;received_quantity&quot;: 45,
            &quot;is_urgent&quot;: true,
            &quot;is_active&quot;: true,
            &quot;order_priority&quot;: 1,
            &quot;created_at&quot;: &quot;2026-08-13T18:46:15.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-13T18:57:31.000000Z&quot;,
            &quot;show_progress_bar&quot;: false
        },
        {
            &quot;id&quot;: 2,
            &quot;title&quot;: &quot;Surgical Cotton Roll 1 KG (100% Pure Absorbent)&quot;,
            &quot;category&quot;: &quot;MEDICAL&quot;,
            &quot;price&quot;: &quot;₹289&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1583947215259-38e31be8751f?w=500&amp;auto=format&amp;fit=crop&amp;q=80&quot;,
            &quot;flipkart_url&quot;: &quot;https://www.flipkart.com/search?q=surgical+cotton+roll+1kg&quot;,
            &quot;amazon_url&quot;: &quot;https://www.amazon.in/s?k=surgical+cotton+roll+1kg&quot;,
            &quot;target_quantity&quot;: 50,
            &quot;received_quantity&quot;: 28,
            &quot;is_urgent&quot;: true,
            &quot;is_active&quot;: true,
            &quot;order_priority&quot;: 2,
            &quot;created_at&quot;: &quot;2026-08-13T18:46:15.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-13T19:02:23.000000Z&quot;,
            &quot;show_progress_bar&quot;: true
        },
        {
            &quot;id&quot;: 4,
            &quot;title&quot;: &quot;Sterile Wound Dressings &amp; Gauze Pads&quot;,
            &quot;category&quot;: &quot;MEDICAL&quot;,
            &quot;price&quot;: &quot;₹185&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=500&amp;auto=format&amp;fit=crop&amp;q=80&quot;,
            &quot;flipkart_url&quot;: &quot;https://www.flipkart.com/search?q=sterile+wound+dressing&quot;,
            &quot;amazon_url&quot;: &quot;https://www.amazon.in/s?k=sterile+wound+dressing&quot;,
            &quot;target_quantity&quot;: 40,
            &quot;received_quantity&quot;: 15,
            &quot;is_urgent&quot;: true,
            &quot;is_active&quot;: true,
            &quot;order_priority&quot;: 4,
            &quot;created_at&quot;: &quot;2026-08-13T18:46:15.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-13T18:46:15.000000Z&quot;,
            &quot;show_progress_bar&quot;: true
        },
        {
            &quot;id&quot;: 9,
            &quot;title&quot;: &quot;NexGard Flea &amp; Tick Chewable Tablets&quot;,
            &quot;category&quot;: &quot;MEDICAL&quot;,
            &quot;price&quot;: &quot;₹2,099&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1628771065518-0d82f1938462?w=500&amp;auto=format&amp;fit=crop&amp;q=80&quot;,
            &quot;flipkart_url&quot;: &quot;https://www.flipkart.com/search?q=nexgard+chewable+tablets+dog&quot;,
            &quot;amazon_url&quot;: &quot;https://www.amazon.in/s?k=nexgard+chewable+tablets+dog&quot;,
            &quot;target_quantity&quot;: 30,
            &quot;received_quantity&quot;: 14,
            &quot;is_urgent&quot;: true,
            &quot;is_active&quot;: true,
            &quot;order_priority&quot;: 9,
            &quot;created_at&quot;: &quot;2026-08-13T18:46:15.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-13T18:46:15.000000Z&quot;,
            &quot;show_progress_bar&quot;: false
        },
        {
            &quot;id&quot;: 10,
            &quot;title&quot;: &quot;Vet-Pro Sensitive Adult Dry Dog Kibble 10kg&quot;,
            &quot;category&quot;: &quot;FOOD&quot;,
            &quot;price&quot;: &quot;₹4,599&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1589924691995-400dc9ecc119?w=500&amp;auto=format&amp;fit=crop&amp;q=80&quot;,
            &quot;flipkart_url&quot;: &quot;https://www.flipkart.com/search?q=vet+pro+sensitive+dog+food+10kg&quot;,
            &quot;amazon_url&quot;: &quot;https://www.amazon.in/s?k=vet+pro+sensitive+dog+food+10kg&quot;,
            &quot;target_quantity&quot;: 25,
            &quot;received_quantity&quot;: 18,
            &quot;is_urgent&quot;: true,
            &quot;is_active&quot;: true,
            &quot;order_priority&quot;: 10,
            &quot;created_at&quot;: &quot;2026-08-13T18:46:15.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-13T18:46:15.000000Z&quot;,
            &quot;show_progress_bar&quot;: false
        },
        {
            &quot;id&quot;: 3,
            &quot;title&quot;: &quot;Self-Adhesive Elastic Bandage Wrap (6 Pack)&quot;,
            &quot;category&quot;: &quot;MEDICAL&quot;,
            &quot;price&quot;: &quot;₹289&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1603398938378-e54eab446dde?w=500&amp;auto=format&amp;fit=crop&amp;q=80&quot;,
            &quot;flipkart_url&quot;: &quot;https://www.flipkart.com/search?q=self+adhesive+bandage+wrap&quot;,
            &quot;amazon_url&quot;: &quot;https://www.amazon.in/s?k=self+adhesive+bandage+wrap&quot;,
            &quot;target_quantity&quot;: 60,
            &quot;received_quantity&quot;: 30,
            &quot;is_urgent&quot;: false,
            &quot;is_active&quot;: true,
            &quot;order_priority&quot;: 3,
            &quot;created_at&quot;: &quot;2026-08-13T18:46:15.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-13T18:46:15.000000Z&quot;,
            &quot;show_progress_bar&quot;: true
        },
        {
            &quot;id&quot;: 5,
            &quot;title&quot;: &quot;IV Infusion Sets &amp; Saline Tubes (Pack of 10)&quot;,
            &quot;category&quot;: &quot;MEDICAL&quot;,
            &quot;price&quot;: &quot;₹355&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1584017911766-d451b3d0e843?w=500&amp;auto=format&amp;fit=crop&amp;q=80&quot;,
            &quot;flipkart_url&quot;: &quot;https://www.flipkart.com/search?q=iv+infusion+set&quot;,
            &quot;amazon_url&quot;: &quot;https://www.amazon.in/s?k=iv+infusion+set&quot;,
            &quot;target_quantity&quot;: 30,
            &quot;received_quantity&quot;: 12,
            &quot;is_urgent&quot;: false,
            &quot;is_active&quot;: true,
            &quot;order_priority&quot;: 5,
            &quot;created_at&quot;: &quot;2026-08-13T18:46:15.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-13T18:46:15.000000Z&quot;,
            &quot;show_progress_bar&quot;: false
        },
        {
            &quot;id&quot;: 6,
            &quot;title&quot;: &quot;Antiseptic Disinfectant Floor Cleaner 5 Litres&quot;,
            &quot;category&quot;: &quot;HYGIENE&quot;,
            &quot;price&quot;: &quot;₹550&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1585421514284-efb74c2b69ba?w=500&amp;auto=format&amp;fit=crop&amp;q=80&quot;,
            &quot;flipkart_url&quot;: &quot;https://www.flipkart.com/search?q=disinfectant+floor+cleaner+5l&quot;,
            &quot;amazon_url&quot;: &quot;https://www.amazon.in/s?k=disinfectant+floor+cleaner+5l&quot;,
            &quot;target_quantity&quot;: 40,
            &quot;received_quantity&quot;: 22,
            &quot;is_urgent&quot;: false,
            &quot;is_active&quot;: true,
            &quot;order_priority&quot;: 6,
            &quot;created_at&quot;: &quot;2026-08-13T18:46:15.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-13T18:46:15.000000Z&quot;,
            &quot;show_progress_bar&quot;: false
        },
        {
            &quot;id&quot;: 7,
            &quot;title&quot;: &quot;Pure Aloe Vera Soothing Gel 500ml&quot;,
            &quot;category&quot;: &quot;MEDICAL&quot;,
            &quot;price&quot;: &quot;₹350&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1567928257400-f1454b1d701d?w=500&amp;auto=format&amp;fit=crop&amp;q=80&quot;,
            &quot;flipkart_url&quot;: &quot;https://www.flipkart.com/search?q=aloe+vera+gel+500ml&quot;,
            &quot;amazon_url&quot;: &quot;https://www.amazon.in/s?k=aloe+vera+gel+500ml&quot;,
            &quot;target_quantity&quot;: 25,
            &quot;received_quantity&quot;: 10,
            &quot;is_urgent&quot;: false,
            &quot;is_active&quot;: true,
            &quot;order_priority&quot;: 7,
            &quot;created_at&quot;: &quot;2026-08-13T18:46:15.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-14T17:51:14.000000Z&quot;,
            &quot;show_progress_bar&quot;: false
        },
        {
            &quot;id&quot;: 8,
            &quot;title&quot;: &quot;Anti-Flea &amp; Tick Medicated Pet Shampoo 1L&quot;,
            &quot;category&quot;: &quot;HYGIENE&quot;,
            &quot;price&quot;: &quot;₹1,299&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1535294435445-d7249524ef2e?w=500&amp;auto=format&amp;fit=crop&amp;q=80&quot;,
            &quot;flipkart_url&quot;: &quot;https://www.flipkart.com/search?q=anti+flea+tick+shampoo+dog&quot;,
            &quot;amazon_url&quot;: &quot;https://www.amazon.in/s?k=anti+flea+tick+shampoo+dog&quot;,
            &quot;target_quantity&quot;: 20,
            &quot;received_quantity&quot;: 8,
            &quot;is_urgent&quot;: false,
            &quot;is_active&quot;: true,
            &quot;order_priority&quot;: 8,
            &quot;created_at&quot;: &quot;2026-08-13T18:46:15.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-13T19:07:02.000000Z&quot;,
            &quot;show_progress_bar&quot;: false
        },
        {
            &quot;id&quot;: 11,
            &quot;title&quot;: &quot;Drools Adult Chicken &amp; Eggs Dry Kibble 20kg&quot;,
            &quot;category&quot;: &quot;FOOD&quot;,
            &quot;price&quot;: &quot;₹2,999&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1568640347023-a616a30bc3bd?w=500&amp;auto=format&amp;fit=crop&amp;q=80&quot;,
            &quot;flipkart_url&quot;: &quot;https://www.flipkart.com/search?q=drools+adult+dog+food+20kg&quot;,
            &quot;amazon_url&quot;: &quot;https://www.amazon.in/s?k=drools+adult+dog+food+20kg&quot;,
            &quot;target_quantity&quot;: 50,
            &quot;received_quantity&quot;: 35,
            &quot;is_urgent&quot;: false,
            &quot;is_active&quot;: true,
            &quot;order_priority&quot;: 11,
            &quot;created_at&quot;: &quot;2026-08-13T18:46:15.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-13T18:46:15.000000Z&quot;,
            &quot;show_progress_bar&quot;: true
        },
        {
            &quot;id&quot;: 12,
            &quot;title&quot;: &quot;Nitrile Examination Gloves Powder-Free (Box of 100)&quot;,
            &quot;category&quot;: &quot;HYGIENE&quot;,
            &quot;price&quot;: &quot;₹499&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1584744982491-665216d95f8b?w=500&amp;auto=format&amp;fit=crop&amp;q=80&quot;,
            &quot;flipkart_url&quot;: &quot;https://www.flipkart.com/search?q=nitrile+gloves+box+of+100&quot;,
            &quot;amazon_url&quot;: &quot;https://www.amazon.in/s?k=nitrile+gloves+box+of+100&quot;,
            &quot;target_quantity&quot;: 40,
            &quot;received_quantity&quot;: 26,
            &quot;is_urgent&quot;: false,
            &quot;is_active&quot;: true,
            &quot;order_priority&quot;: 12,
            &quot;created_at&quot;: &quot;2026-08-13T18:46:15.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-13T18:46:15.000000Z&quot;,
            &quot;show_progress_bar&quot;: true
        },
        {
            &quot;id&quot;: 13,
            &quot;title&quot;: &quot;Latex Surgical Examination Gloves (Box of 100)&quot;,
            &quot;category&quot;: &quot;HYGIENE&quot;,
            &quot;price&quot;: &quot;₹420&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1588776814546-1ffcf47267a5?w=500&amp;auto=format&amp;fit=crop&amp;q=80&quot;,
            &quot;flipkart_url&quot;: &quot;https://www.flipkart.com/search?q=latex+examination+gloves+box+of+100&quot;,
            &quot;amazon_url&quot;: &quot;https://www.amazon.in/s?k=latex+examination+gloves+box+of+100&quot;,
            &quot;target_quantity&quot;: 30,
            &quot;received_quantity&quot;: 19,
            &quot;is_urgent&quot;: false,
            &quot;is_active&quot;: true,
            &quot;order_priority&quot;: 13,
            &quot;created_at&quot;: &quot;2026-08-13T18:46:15.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-13T18:46:15.000000Z&quot;,
            &quot;show_progress_bar&quot;: true
        },
        {
            &quot;id&quot;: 14,
            &quot;title&quot;: &quot;Pet Grooming &amp; Dryer Warmer 2000W&quot;,
            &quot;category&quot;: &quot;EQUIPMENT&quot;,
            &quot;price&quot;: &quot;₹987&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?w=500&amp;auto=format&amp;fit=crop&amp;q=80&quot;,
            &quot;flipkart_url&quot;: &quot;https://www.flipkart.com/search?q=pet+grooming+dryer&quot;,
            &quot;amazon_url&quot;: &quot;https://www.amazon.in/s?k=pet+grooming+dryer&quot;,
            &quot;target_quantity&quot;: 10,
            &quot;received_quantity&quot;: 4,
            &quot;is_urgent&quot;: false,
            &quot;is_active&quot;: true,
            &quot;order_priority&quot;: 14,
            &quot;created_at&quot;: &quot;2026-08-13T18:46:15.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-13T18:46:15.000000Z&quot;,
            &quot;show_progress_bar&quot;: true
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-wishlist-items" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-wishlist-items"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-wishlist-items"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-wishlist-items" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-wishlist-items">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-wishlist-items" data-method="GET"
      data-path="api/wishlist-items"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-wishlist-items', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-wishlist-items"
                    onclick="tryItOut('GETapi-wishlist-items');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-wishlist-items"
                    onclick="cancelTryOut('GETapi-wishlist-items');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-wishlist-items"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/wishlist-items</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-wishlist-items"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-wishlist-items"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="wishlist-management-GETapi-admin-wishlist-items">Admin: Fetch all wishlist items (including inactive).</h2>

<p>
</p>



<span id="example-requests-GETapi-admin-wishlist-items">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/admin/wishlist-items" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/wishlist-items"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-admin-wishlist-items">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-admin-wishlist-items" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-admin-wishlist-items"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-admin-wishlist-items"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-admin-wishlist-items" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-admin-wishlist-items">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-admin-wishlist-items" data-method="GET"
      data-path="api/admin/wishlist-items"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-admin-wishlist-items', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-admin-wishlist-items"
                    onclick="tryItOut('GETapi-admin-wishlist-items');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-admin-wishlist-items"
                    onclick="cancelTryOut('GETapi-admin-wishlist-items');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-admin-wishlist-items"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/admin/wishlist-items</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-admin-wishlist-items"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-admin-wishlist-items"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="wishlist-management-POSTapi-admin-wishlist-items">Admin: Store new wishlist item.</h2>

<p>
</p>



<span id="example-requests-POSTapi-admin-wishlist-items">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/admin/wishlist-items" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"title\": \"b\",
    \"category\": \"EQUIPMENT\",
    \"price\": \"n\",
    \"image_url\": \"http:\\/\\/crooks.biz\\/et-fugiat-sunt-nihil-accusantium\",
    \"flipkart_url\": \"http:\\/\\/tillman.com\\/\",
    \"amazon_url\": \"http:\\/\\/www.schuster.biz\\/perspiciatis-quo-omnis-nostrum-aut-adipisci-quidem-nostrum-qui\",
    \"target_quantity\": 40,
    \"received_quantity\": 3,
    \"is_urgent\": false,
    \"show_progress_bar\": true,
    \"is_active\": false
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/wishlist-items"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "b",
    "category": "EQUIPMENT",
    "price": "n",
    "image_url": "http:\/\/crooks.biz\/et-fugiat-sunt-nihil-accusantium",
    "flipkart_url": "http:\/\/tillman.com\/",
    "amazon_url": "http:\/\/www.schuster.biz\/perspiciatis-quo-omnis-nostrum-aut-adipisci-quidem-nostrum-qui",
    "target_quantity": 40,
    "received_quantity": 3,
    "is_urgent": false,
    "show_progress_bar": true,
    "is_active": false
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-admin-wishlist-items">
</span>
<span id="execution-results-POSTapi-admin-wishlist-items" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-admin-wishlist-items"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-admin-wishlist-items"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-admin-wishlist-items" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-admin-wishlist-items">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-admin-wishlist-items" data-method="POST"
      data-path="api/admin/wishlist-items"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-admin-wishlist-items', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-admin-wishlist-items"
                    onclick="tryItOut('POSTapi-admin-wishlist-items');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-admin-wishlist-items"
                    onclick="cancelTryOut('POSTapi-admin-wishlist-items');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-admin-wishlist-items"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/admin/wishlist-items</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-admin-wishlist-items"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-admin-wishlist-items"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="POSTapi-admin-wishlist-items"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>category</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="category"                data-endpoint="POSTapi-admin-wishlist-items"
               value="EQUIPMENT"
               data-component="body">
    <br>
<p>Example: <code>EQUIPMENT</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>MEDICAL</code></li> <li><code>FOOD</code></li> <li><code>HYGIENE</code></li> <li><code>EQUIPMENT</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>price</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="price"                data-endpoint="POSTapi-admin-wishlist-items"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 50 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image_url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="image_url"                data-endpoint="POSTapi-admin-wishlist-items"
               value="http://crooks.biz/et-fugiat-sunt-nihil-accusantium"
               data-component="body">
    <br>
<p>Must be a valid URL. Must not be greater than 2048 characters. Example: <code>http://crooks.biz/et-fugiat-sunt-nihil-accusantium</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>flipkart_url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="flipkart_url"                data-endpoint="POSTapi-admin-wishlist-items"
               value="http://tillman.com/"
               data-component="body">
    <br>
<p>Must be a valid URL. Must not be greater than 2048 characters. Example: <code>http://tillman.com/</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>amazon_url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="amazon_url"                data-endpoint="POSTapi-admin-wishlist-items"
               value="http://www.schuster.biz/perspiciatis-quo-omnis-nostrum-aut-adipisci-quidem-nostrum-qui"
               data-component="body">
    <br>
<p>Must be a valid URL. Must not be greater than 2048 characters. Example: <code>http://www.schuster.biz/perspiciatis-quo-omnis-nostrum-aut-adipisci-quidem-nostrum-qui</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>target_quantity</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="target_quantity"                data-endpoint="POSTapi-admin-wishlist-items"
               value="40"
               data-component="body">
    <br>
<p>Must be at least 1. Example: <code>40</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>received_quantity</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="received_quantity"                data-endpoint="POSTapi-admin-wishlist-items"
               value="3"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>3</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_urgent</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="POSTapi-admin-wishlist-items" style="display: none">
            <input type="radio" name="is_urgent"
                   value="true"
                   data-endpoint="POSTapi-admin-wishlist-items"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-admin-wishlist-items" style="display: none">
            <input type="radio" name="is_urgent"
                   value="false"
                   data-endpoint="POSTapi-admin-wishlist-items"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>false</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>show_progress_bar</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="POSTapi-admin-wishlist-items" style="display: none">
            <input type="radio" name="show_progress_bar"
                   value="true"
                   data-endpoint="POSTapi-admin-wishlist-items"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-admin-wishlist-items" style="display: none">
            <input type="radio" name="show_progress_bar"
                   value="false"
                   data-endpoint="POSTapi-admin-wishlist-items"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>true</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="POSTapi-admin-wishlist-items" style="display: none">
            <input type="radio" name="is_active"
                   value="true"
                   data-endpoint="POSTapi-admin-wishlist-items"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-admin-wishlist-items" style="display: none">
            <input type="radio" name="is_active"
                   value="false"
                   data-endpoint="POSTapi-admin-wishlist-items"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>false</code></p>
        </div>
        </form>

                    <h2 id="wishlist-management-PUTapi-admin-wishlist-items--id-">Admin: Update wishlist item.</h2>

<p>
</p>



<span id="example-requests-PUTapi-admin-wishlist-items--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/admin/wishlist-items/3" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"title\": \"b\",
    \"category\": \"MEDICAL\",
    \"price\": \"n\",
    \"image_url\": \"http:\\/\\/crooks.biz\\/et-fugiat-sunt-nihil-accusantium\",
    \"flipkart_url\": \"http:\\/\\/tillman.com\\/\",
    \"amazon_url\": \"http:\\/\\/www.schuster.biz\\/perspiciatis-quo-omnis-nostrum-aut-adipisci-quidem-nostrum-qui\",
    \"target_quantity\": 40,
    \"received_quantity\": 3,
    \"is_urgent\": true,
    \"show_progress_bar\": true,
    \"is_active\": false
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/wishlist-items/3"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "b",
    "category": "MEDICAL",
    "price": "n",
    "image_url": "http:\/\/crooks.biz\/et-fugiat-sunt-nihil-accusantium",
    "flipkart_url": "http:\/\/tillman.com\/",
    "amazon_url": "http:\/\/www.schuster.biz\/perspiciatis-quo-omnis-nostrum-aut-adipisci-quidem-nostrum-qui",
    "target_quantity": 40,
    "received_quantity": 3,
    "is_urgent": true,
    "show_progress_bar": true,
    "is_active": false
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-admin-wishlist-items--id-">
</span>
<span id="execution-results-PUTapi-admin-wishlist-items--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-admin-wishlist-items--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-admin-wishlist-items--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-admin-wishlist-items--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-admin-wishlist-items--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-admin-wishlist-items--id-" data-method="PUT"
      data-path="api/admin/wishlist-items/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-admin-wishlist-items--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-admin-wishlist-items--id-"
                    onclick="tryItOut('PUTapi-admin-wishlist-items--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-admin-wishlist-items--id-"
                    onclick="cancelTryOut('PUTapi-admin-wishlist-items--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-admin-wishlist-items--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/admin/wishlist-items/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-admin-wishlist-items--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-admin-wishlist-items--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-admin-wishlist-items--id-"
               value="3"
               data-component="url">
    <br>
<p>The ID of the wishlist item. Example: <code>3</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="PUTapi-admin-wishlist-items--id-"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>category</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="category"                data-endpoint="PUTapi-admin-wishlist-items--id-"
               value="MEDICAL"
               data-component="body">
    <br>
<p>Example: <code>MEDICAL</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>MEDICAL</code></li> <li><code>FOOD</code></li> <li><code>HYGIENE</code></li> <li><code>EQUIPMENT</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>price</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="price"                data-endpoint="PUTapi-admin-wishlist-items--id-"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 50 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image_url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="image_url"                data-endpoint="PUTapi-admin-wishlist-items--id-"
               value="http://crooks.biz/et-fugiat-sunt-nihil-accusantium"
               data-component="body">
    <br>
<p>Must be a valid URL. Must not be greater than 2048 characters. Example: <code>http://crooks.biz/et-fugiat-sunt-nihil-accusantium</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>flipkart_url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="flipkart_url"                data-endpoint="PUTapi-admin-wishlist-items--id-"
               value="http://tillman.com/"
               data-component="body">
    <br>
<p>Must be a valid URL. Must not be greater than 2048 characters. Example: <code>http://tillman.com/</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>amazon_url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="amazon_url"                data-endpoint="PUTapi-admin-wishlist-items--id-"
               value="http://www.schuster.biz/perspiciatis-quo-omnis-nostrum-aut-adipisci-quidem-nostrum-qui"
               data-component="body">
    <br>
<p>Must be a valid URL. Must not be greater than 2048 characters. Example: <code>http://www.schuster.biz/perspiciatis-quo-omnis-nostrum-aut-adipisci-quidem-nostrum-qui</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>target_quantity</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="target_quantity"                data-endpoint="PUTapi-admin-wishlist-items--id-"
               value="40"
               data-component="body">
    <br>
<p>Must be at least 1. Example: <code>40</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>received_quantity</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="received_quantity"                data-endpoint="PUTapi-admin-wishlist-items--id-"
               value="3"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>3</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_urgent</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="PUTapi-admin-wishlist-items--id-" style="display: none">
            <input type="radio" name="is_urgent"
                   value="true"
                   data-endpoint="PUTapi-admin-wishlist-items--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-admin-wishlist-items--id-" style="display: none">
            <input type="radio" name="is_urgent"
                   value="false"
                   data-endpoint="PUTapi-admin-wishlist-items--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>true</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>show_progress_bar</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="PUTapi-admin-wishlist-items--id-" style="display: none">
            <input type="radio" name="show_progress_bar"
                   value="true"
                   data-endpoint="PUTapi-admin-wishlist-items--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-admin-wishlist-items--id-" style="display: none">
            <input type="radio" name="show_progress_bar"
                   value="false"
                   data-endpoint="PUTapi-admin-wishlist-items--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>true</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="PUTapi-admin-wishlist-items--id-" style="display: none">
            <input type="radio" name="is_active"
                   value="true"
                   data-endpoint="PUTapi-admin-wishlist-items--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-admin-wishlist-items--id-" style="display: none">
            <input type="radio" name="is_active"
                   value="false"
                   data-endpoint="PUTapi-admin-wishlist-items--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>false</code></p>
        </div>
        </form>

                    <h2 id="wishlist-management-GETapi-admin-wishlist-items--id--toggle-urgent">Admin: Toggle item urgency.</h2>

<p>
</p>



<span id="example-requests-GETapi-admin-wishlist-items--id--toggle-urgent">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/admin/wishlist-items/3/toggle-urgent" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/wishlist-items/3/toggle-urgent"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-admin-wishlist-items--id--toggle-urgent">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-admin-wishlist-items--id--toggle-urgent" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-admin-wishlist-items--id--toggle-urgent"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-admin-wishlist-items--id--toggle-urgent"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-admin-wishlist-items--id--toggle-urgent" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-admin-wishlist-items--id--toggle-urgent">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-admin-wishlist-items--id--toggle-urgent" data-method="GET"
      data-path="api/admin/wishlist-items/{id}/toggle-urgent"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-admin-wishlist-items--id--toggle-urgent', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-admin-wishlist-items--id--toggle-urgent"
                    onclick="tryItOut('GETapi-admin-wishlist-items--id--toggle-urgent');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-admin-wishlist-items--id--toggle-urgent"
                    onclick="cancelTryOut('GETapi-admin-wishlist-items--id--toggle-urgent');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-admin-wishlist-items--id--toggle-urgent"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/admin/wishlist-items/{id}/toggle-urgent</code></b>
        </p>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/admin/wishlist-items/{id}/toggle-urgent</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/admin/wishlist-items/{id}/toggle-urgent</code></b>
        </p>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/admin/wishlist-items/{id}/toggle-urgent</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-admin-wishlist-items--id--toggle-urgent"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-admin-wishlist-items--id--toggle-urgent"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-admin-wishlist-items--id--toggle-urgent"
               value="3"
               data-component="url">
    <br>
<p>The ID of the wishlist item. Example: <code>3</code></p>
            </div>
                    </form>

                    <h2 id="wishlist-management-GETapi-admin-wishlist-items--id--toggle-progress">Admin: Toggle show progress bar option.</h2>

<p>
</p>



<span id="example-requests-GETapi-admin-wishlist-items--id--toggle-progress">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/admin/wishlist-items/3/toggle-progress" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/wishlist-items/3/toggle-progress"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-admin-wishlist-items--id--toggle-progress">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-admin-wishlist-items--id--toggle-progress" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-admin-wishlist-items--id--toggle-progress"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-admin-wishlist-items--id--toggle-progress"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-admin-wishlist-items--id--toggle-progress" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-admin-wishlist-items--id--toggle-progress">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-admin-wishlist-items--id--toggle-progress" data-method="GET"
      data-path="api/admin/wishlist-items/{id}/toggle-progress"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-admin-wishlist-items--id--toggle-progress', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-admin-wishlist-items--id--toggle-progress"
                    onclick="tryItOut('GETapi-admin-wishlist-items--id--toggle-progress');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-admin-wishlist-items--id--toggle-progress"
                    onclick="cancelTryOut('GETapi-admin-wishlist-items--id--toggle-progress');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-admin-wishlist-items--id--toggle-progress"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/admin/wishlist-items/{id}/toggle-progress</code></b>
        </p>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/admin/wishlist-items/{id}/toggle-progress</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/admin/wishlist-items/{id}/toggle-progress</code></b>
        </p>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/admin/wishlist-items/{id}/toggle-progress</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-admin-wishlist-items--id--toggle-progress"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-admin-wishlist-items--id--toggle-progress"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-admin-wishlist-items--id--toggle-progress"
               value="3"
               data-component="url">
    <br>
<p>The ID of the wishlist item. Example: <code>3</code></p>
            </div>
                    </form>

                    <h2 id="wishlist-management-DELETEapi-admin-wishlist-items--id-">Admin: Delete wishlist item.</h2>

<p>
</p>



<span id="example-requests-DELETEapi-admin-wishlist-items--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/admin/wishlist-items/3" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/wishlist-items/3"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-admin-wishlist-items--id-">
</span>
<span id="execution-results-DELETEapi-admin-wishlist-items--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-admin-wishlist-items--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-admin-wishlist-items--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-admin-wishlist-items--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-admin-wishlist-items--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-admin-wishlist-items--id-" data-method="DELETE"
      data-path="api/admin/wishlist-items/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-admin-wishlist-items--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-admin-wishlist-items--id-"
                    onclick="tryItOut('DELETEapi-admin-wishlist-items--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-admin-wishlist-items--id-"
                    onclick="cancelTryOut('DELETEapi-admin-wishlist-items--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-admin-wishlist-items--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/admin/wishlist-items/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-admin-wishlist-items--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-admin-wishlist-items--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-admin-wishlist-items--id-"
               value="3"
               data-component="url">
    <br>
<p>The ID of the wishlist item. Example: <code>3</code></p>
            </div>
                    </form>

                <h1 id="blog-content-cms">Blog & Content CMS</h1>

    <p>APIs for managing blog posts, categories, and articles.</p>

                                <h2 id="blog-content-cms-GETapi-blogs">GET api/blogs</h2>

<p>
</p>



<span id="example-requests-GETapi-blogs">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/blogs" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/blogs"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-blogs">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: true,
    &quot;message&quot;: &quot;Blogs retrieved successfully.&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;title&quot;: &quot;10 Ways to Help Stray Animals in Your Neighborhood&quot;,
            &quot;slug&quot;: &quot;10-ways-help-stray-animals-neighborhood&quot;,
            &quot;author&quot;: &quot;Dr. Rohan Sharma&quot;,
            &quot;category&quot;: &quot;Animal Welfare&quot;,
            &quot;tags&quot;: [
                &quot;Stray Animals&quot;,
                &quot;Animal Rescue&quot;,
                &quot;Community&quot;
            ],
            &quot;excerpt&quot;: &quot;Discover simple yet impactful ways you can support street animals, from providing fresh water to setting up temporary shelters.&quot;,
            &quot;content&quot;: &quot;&lt;h3&gt;1. Provide Fresh Water and Food&lt;/h3&gt;&lt;p&gt;Water is essential, especially during scorching summers. Place clean earthen bowls filled with water in shaded spots outside your gate and replenish them daily.&lt;/p&gt;&lt;h3&gt;2. Build Temporary Shelters&lt;/h3&gt;&lt;p&gt;During heavy rains or severe winters, strays look for warm, dry spots. You can build simple, low-cost rain shelters using discarded plastic boxes, tarps, and old blankets.&lt;/p&gt;&lt;h3&gt;3. Coordinate Vaccinations&lt;/h3&gt;&lt;p&gt;Ensuring local dogs are vaccinated against rabies protects both the animals and your human neighbors. Work with local vets or NGOs to organize local vaccination schedules.&lt;/p&gt;&lt;h3&gt;4. Report Injured Animals&lt;/h3&gt;&lt;p&gt;If you see a dog or cat with wounds, skin disease, or limping, call a local animal rescue group immediately instead of ignoring them. Timely intervention saves lives.&quot;,
            &quot;status&quot;: &quot;Published&quot;,
            &quot;featured_image&quot;: {
                &quot;url&quot;: &quot;https://images.unsplash.com/photo-1543466835-00a7907e9de1?auto=format&amp;fit=crop&amp;w=800&amp;q=80&quot;,
                &quot;alt&quot;: &quot;Happy dog on street&quot;
            },
            &quot;user_id&quot;: 8,
            &quot;created_at&quot;: &quot;2026-08-10T16:04:51.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-14T17:57:26.000000Z&quot;,
            &quot;featuredImage&quot;: {
                &quot;url&quot;: &quot;https://images.unsplash.com/photo-1543466835-00a7907e9de1?auto=format&amp;fit=crop&amp;w=800&amp;q=80&quot;,
                &quot;alt&quot;: &quot;Happy dog on street&quot;
            },
            &quot;seo&quot;: null,
            &quot;media&quot;: [],
            &quot;user&quot;: {
                &quot;id&quot;: 8,
                &quot;name&quot;: &quot;Ananya Joshi&quot;,
                &quot;gender&quot;: null,
                &quot;phone&quot;: &quot;+91 95432 10987&quot;,
                &quot;bio&quot;: &quot;Corporate communications lead looking to connect NGO with CSR initiatives.&quot;,
                &quot;avatar&quot;: null,
                &quot;dob&quot;: null,
                &quot;anniversary&quot;: null,
                &quot;email&quot;: &quot;ananya.j@example.com&quot;,
                &quot;email_verified_at&quot;: &quot;2026-08-14T17:57:26.000000Z&quot;,
                &quot;show_in_website&quot;: true,
                &quot;status&quot;: &quot;Active&quot;,
                &quot;created_at&quot;: &quot;2026-08-10T16:04:51.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-08-14T17:57:26.000000Z&quot;,
                &quot;role&quot;: &quot;Fundraising Volunteer&quot;,
                &quot;showInWebsite&quot;: true,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;Fundraising Volunteer&quot;,
                        &quot;guard_name&quot;: &quot;api&quot;,
                        &quot;allow_notification&quot;: false,
                        &quot;is_volunteer&quot;: true,
                        &quot;role_description&quot;: &quot;Helps with donor engagement, corporate CSR outreach, and fundraising campaigns.&quot;,
                        &quot;created_at&quot;: &quot;2026-08-10T16:04:48.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2026-08-10T16:04:48.000000Z&quot;,
                        &quot;roleDescription&quot;: &quot;Helps with donor engagement, corporate CSR outreach, and fundraising campaigns.&quot;,
                        &quot;pivot&quot;: {
                            &quot;model_type&quot;: &quot;App\\Models\\User&quot;,
                            &quot;model_id&quot;: 8,
                            &quot;role_id&quot;: 3
                        }
                    }
                ]
            }
        },
        {
            &quot;id&quot;: 2,
            &quot;title&quot;: &quot;Understanding Animal Rescue: What Happens After a Rescue Call&quot;,
            &quot;slug&quot;: &quot;understanding-animal-rescue-what-happens-after-call&quot;,
            &quot;author&quot;: &quot;Priya Patel&quot;,
            &quot;category&quot;: &quot;Rescue Stories&quot;,
            &quot;tags&quot;: [
                &quot;Rescue Operations&quot;,
                &quot;Rehabilitation&quot;,
                &quot;Behind the Scenes&quot;
            ],
            &quot;excerpt&quot;: &quot;Take a behind-the-scenes look at our rescue operations and learn about the rehabilitation journey of an injured animal.&quot;,
            &quot;content&quot;: &quot;&lt;h3&gt;Phase 1: The Emergency Call &amp; Dispatch&lt;/h3&gt;&lt;p&gt;Our helpline receives dozens of calls daily. Once verified, our ambulance team is dispatched with capture nets, cages, and emergency medical kits to safely secure the injured animal.&lt;/p&gt;&lt;h3&gt;Phase 2: Veterinary Assessment&lt;/h3&gt;&lt;p&gt;Upon arrival at the clinic, the rescue animal receives immediate treatment. This includes wound dressing, pain relief injections, blood tests, and X-rays if fractures are suspected.&lt;/p&gt;&lt;h3&gt;Phase 3: Rest &amp; Rehabilitation&lt;/h3&gt;&lt;p&gt;Recovery takes time. Animals are housed in quarantine or general wards depending on their illness. They receive nutritious meals, medicine, and socialization from volunteers to help rebuild their trust in humans.&lt;/p&gt;&lt;h3&gt;Phase 4: Release or Adoption&lt;/h3&gt;&lt;p&gt;Once fully recovered, street animals are released back to their original territories as mandated by animal protection laws, while disabled or highly vulnerable animals are put up for adoption.&quot;,
            &quot;status&quot;: &quot;Published&quot;,
            &quot;featured_image&quot;: {
                &quot;url&quot;: &quot;https://images.unsplash.com/photo-1583511655857-d19b40a7a54e?auto=format&amp;fit=crop&amp;w=800&amp;q=80&quot;,
                &quot;alt&quot;: &quot;Rescued puppy receiving treatment&quot;
            },
            &quot;user_id&quot;: 8,
            &quot;created_at&quot;: &quot;2026-08-10T16:04:51.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-14T17:57:26.000000Z&quot;,
            &quot;featuredImage&quot;: {
                &quot;url&quot;: &quot;https://images.unsplash.com/photo-1583511655857-d19b40a7a54e?auto=format&amp;fit=crop&amp;w=800&amp;q=80&quot;,
                &quot;alt&quot;: &quot;Rescued puppy receiving treatment&quot;
            },
            &quot;seo&quot;: null,
            &quot;media&quot;: [],
            &quot;user&quot;: {
                &quot;id&quot;: 8,
                &quot;name&quot;: &quot;Ananya Joshi&quot;,
                &quot;gender&quot;: null,
                &quot;phone&quot;: &quot;+91 95432 10987&quot;,
                &quot;bio&quot;: &quot;Corporate communications lead looking to connect NGO with CSR initiatives.&quot;,
                &quot;avatar&quot;: null,
                &quot;dob&quot;: null,
                &quot;anniversary&quot;: null,
                &quot;email&quot;: &quot;ananya.j@example.com&quot;,
                &quot;email_verified_at&quot;: &quot;2026-08-14T17:57:26.000000Z&quot;,
                &quot;show_in_website&quot;: true,
                &quot;status&quot;: &quot;Active&quot;,
                &quot;created_at&quot;: &quot;2026-08-10T16:04:51.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-08-14T17:57:26.000000Z&quot;,
                &quot;role&quot;: &quot;Fundraising Volunteer&quot;,
                &quot;showInWebsite&quot;: true,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;Fundraising Volunteer&quot;,
                        &quot;guard_name&quot;: &quot;api&quot;,
                        &quot;allow_notification&quot;: false,
                        &quot;is_volunteer&quot;: true,
                        &quot;role_description&quot;: &quot;Helps with donor engagement, corporate CSR outreach, and fundraising campaigns.&quot;,
                        &quot;created_at&quot;: &quot;2026-08-10T16:04:48.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2026-08-10T16:04:48.000000Z&quot;,
                        &quot;roleDescription&quot;: &quot;Helps with donor engagement, corporate CSR outreach, and fundraising campaigns.&quot;,
                        &quot;pivot&quot;: {
                            &quot;model_type&quot;: &quot;App\\Models\\User&quot;,
                            &quot;model_id&quot;: 8,
                            &quot;role_id&quot;: 3
                        }
                    }
                ]
            }
        },
        {
            &quot;id&quot;: 3,
            &quot;title&quot;: &quot;Why Daily Feeding Drives Matter for Street Dogs&quot;,
            &quot;slug&quot;: &quot;why-daily-feeding-drives-matter-street-dogs&quot;,
            &quot;author&quot;: &quot;Aman Sen&quot;,
            &quot;category&quot;: &quot;Daily Feeding&quot;,
            &quot;tags&quot;: [
                &quot;Feeding Drives&quot;,
                &quot;Street Dogs&quot;,
                &quot;Dog Care&quot;
            ],
            &quot;excerpt&quot;: &quot;Daily feeding drives do more than just fill bellies. They build trust, reduce aggression, and help monitor the health of street dogs.&quot;,
            &quot;content&quot;: &quot;&lt;h3&gt;Beyond Just Nutrition&lt;/h3&gt;\n\n&lt;p&gt;Feeding street dogs regularly helps calm their survival instinct. When animals know they do not have to fight for scraps of food in garbage piles, dog fights and territorial aggression decrease dramatically.&lt;/p&gt;\n\n&lt;h3&gt;Community Vaccination &amp;amp; Health Checks&lt;/h3&gt;\n\n&lt;p&gt;Feeding times are the perfect window to check on an animal&amp;rsquo;s health. Volunteers can spot new injuries, monitor pregnant dogs, and administer oral medications (like deworming or tick treatment) hidden inside the food.&lt;/p&gt;\n\n&lt;h3&gt;Connecting Humans and Strays&lt;/h3&gt;\n\n&lt;p&gt;Regular feeding drives foster a sense of friendship between local residents and street animals. This reduces complaints and builds a more compassionate community that watches out for their four-legged neighbors.&lt;/p&gt;\n\n&lt;p&gt;&lt;img alt=\&quot;Awareness workshop\&quot; src=\&quot;https://saahasforpune.org/images/saahasXiteach2.jpg\&quot; style=\&quot;height:139px; width:300px\&quot; /&gt;&lt;/p&gt;\n\n&lt;p&gt;Feeding times are the perfect window to check on an animal&amp;rsquo;s health. Volunteers can spot new injuries, monitor pregnant dogs, and administer oral medications (like deworming or tick treatment) hidden inside the food.&lt;/p&gt;\n\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n\n&lt;p&gt;&lt;img alt=\&quot;School programme\&quot; src=\&quot;https://saahasforpune.org/images/saahasXiteach5-scaled.jpeg\&quot; style=\&quot;height:300px; width:400px\&quot; /&gt;&lt;/p&gt;\n\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n\n&lt;p&gt;&lt;img alt=\&quot;School programme\&quot; src=\&quot;https://saahasforpune.org/images/saahasXiteach5-scaled.jpeg\&quot; style=\&quot;height:300px; width:400px\&quot; /&gt;&lt;/p&gt;\n\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n\n&lt;p&gt;&lt;img alt=\&quot;School programme\&quot; src=\&quot;https://saahasforpune.org/images/saahasXiteach5-scaled.jpeg\&quot; style=\&quot;height:300px; width:400px\&quot; /&gt;&lt;/p&gt;\n\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n\n&lt;p&gt;&lt;img alt=\&quot;School programme\&quot; src=\&quot;https://saahasforpune.org/images/saahasXiteach5-scaled.jpeg\&quot; style=\&quot;height:300px; width:400px\&quot; /&gt;&lt;/p&gt;\n\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n\n&lt;p&gt;&lt;img alt=\&quot;School programme\&quot; src=\&quot;https://saahasforpune.org/images/saahasXiteach5-scaled.jpeg\&quot; style=\&quot;height:300px; width:400px\&quot; /&gt;&lt;/p&gt;&quot;,
            &quot;status&quot;: &quot;Published&quot;,
            &quot;featured_image&quot;: {
                &quot;url&quot;: &quot;https://images.unsplash.com/photo-1589924691995-400dc9ecc119?auto=format&amp;fit=crop&amp;w=800&amp;q=80&quot;,
                &quot;alt&quot;: &quot;Feeding a street dog&quot;
            },
            &quot;user_id&quot;: 8,
            &quot;created_at&quot;: &quot;2026-08-10T16:04:51.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-14T18:08:27.000000Z&quot;,
            &quot;featuredImage&quot;: {
                &quot;url&quot;: &quot;https://images.unsplash.com/photo-1589924691995-400dc9ecc119?auto=format&amp;fit=crop&amp;w=800&amp;q=80&quot;,
                &quot;alt&quot;: &quot;Feeding a street dog&quot;
            },
            &quot;seo&quot;: {
                &quot;id&quot;: 1,
                &quot;seoable_type&quot;: &quot;App\\Models\\Blog&quot;,
                &quot;seoable_id&quot;: 3,
                &quot;meta_title&quot;: null,
                &quot;meta_description&quot;: null,
                &quot;keywords&quot;: [],
                &quot;created_at&quot;: &quot;2026-08-14T18:08:27.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-08-14T18:08:27.000000Z&quot;,
                &quot;og_image&quot;: null,
                &quot;canonical_url&quot;: null,
                &quot;no_index&quot;: false
            },
            &quot;media&quot;: [],
            &quot;user&quot;: {
                &quot;id&quot;: 8,
                &quot;name&quot;: &quot;Ananya Joshi&quot;,
                &quot;gender&quot;: null,
                &quot;phone&quot;: &quot;+91 95432 10987&quot;,
                &quot;bio&quot;: &quot;Corporate communications lead looking to connect NGO with CSR initiatives.&quot;,
                &quot;avatar&quot;: null,
                &quot;dob&quot;: null,
                &quot;anniversary&quot;: null,
                &quot;email&quot;: &quot;ananya.j@example.com&quot;,
                &quot;email_verified_at&quot;: &quot;2026-08-14T17:57:26.000000Z&quot;,
                &quot;show_in_website&quot;: true,
                &quot;status&quot;: &quot;Active&quot;,
                &quot;created_at&quot;: &quot;2026-08-10T16:04:51.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-08-14T17:57:26.000000Z&quot;,
                &quot;role&quot;: &quot;Fundraising Volunteer&quot;,
                &quot;showInWebsite&quot;: true,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;Fundraising Volunteer&quot;,
                        &quot;guard_name&quot;: &quot;api&quot;,
                        &quot;allow_notification&quot;: false,
                        &quot;is_volunteer&quot;: true,
                        &quot;role_description&quot;: &quot;Helps with donor engagement, corporate CSR outreach, and fundraising campaigns.&quot;,
                        &quot;created_at&quot;: &quot;2026-08-10T16:04:48.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2026-08-10T16:04:48.000000Z&quot;,
                        &quot;roleDescription&quot;: &quot;Helps with donor engagement, corporate CSR outreach, and fundraising campaigns.&quot;,
                        &quot;pivot&quot;: {
                            &quot;model_type&quot;: &quot;App\\Models\\User&quot;,
                            &quot;model_id&quot;: 8,
                            &quot;role_id&quot;: 3
                        }
                    }
                ]
            }
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-blogs" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-blogs"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-blogs"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-blogs" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-blogs">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-blogs" data-method="GET"
      data-path="api/blogs"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-blogs', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-blogs"
                    onclick="tryItOut('GETapi-blogs');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-blogs"
                    onclick="cancelTryOut('GETapi-blogs');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-blogs"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/blogs</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-blogs"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-blogs"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="blog-content-cms-GETapi-blogs--id-">GET api/blogs/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-blogs--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/blogs/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/blogs/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-blogs--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: true,
    &quot;message&quot;: &quot;Blog retrieved successfully.&quot;,
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;title&quot;: &quot;10 Ways to Help Stray Animals in Your Neighborhood&quot;,
        &quot;slug&quot;: &quot;10-ways-help-stray-animals-neighborhood&quot;,
        &quot;author&quot;: &quot;Dr. Rohan Sharma&quot;,
        &quot;category&quot;: &quot;Animal Welfare&quot;,
        &quot;tags&quot;: [
            &quot;Stray Animals&quot;,
            &quot;Animal Rescue&quot;,
            &quot;Community&quot;
        ],
        &quot;excerpt&quot;: &quot;Discover simple yet impactful ways you can support street animals, from providing fresh water to setting up temporary shelters.&quot;,
        &quot;content&quot;: &quot;&lt;h3&gt;1. Provide Fresh Water and Food&lt;/h3&gt;&lt;p&gt;Water is essential, especially during scorching summers. Place clean earthen bowls filled with water in shaded spots outside your gate and replenish them daily.&lt;/p&gt;&lt;h3&gt;2. Build Temporary Shelters&lt;/h3&gt;&lt;p&gt;During heavy rains or severe winters, strays look for warm, dry spots. You can build simple, low-cost rain shelters using discarded plastic boxes, tarps, and old blankets.&lt;/p&gt;&lt;h3&gt;3. Coordinate Vaccinations&lt;/h3&gt;&lt;p&gt;Ensuring local dogs are vaccinated against rabies protects both the animals and your human neighbors. Work with local vets or NGOs to organize local vaccination schedules.&lt;/p&gt;&lt;h3&gt;4. Report Injured Animals&lt;/h3&gt;&lt;p&gt;If you see a dog or cat with wounds, skin disease, or limping, call a local animal rescue group immediately instead of ignoring them. Timely intervention saves lives.&quot;,
        &quot;status&quot;: &quot;Published&quot;,
        &quot;featured_image&quot;: {
            &quot;url&quot;: &quot;https://images.unsplash.com/photo-1543466835-00a7907e9de1?auto=format&amp;fit=crop&amp;w=800&amp;q=80&quot;,
            &quot;alt&quot;: &quot;Happy dog on street&quot;
        },
        &quot;user_id&quot;: 8,
        &quot;created_at&quot;: &quot;2026-08-10T16:04:51.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-08-14T17:57:26.000000Z&quot;,
        &quot;featuredImage&quot;: {
            &quot;url&quot;: &quot;https://images.unsplash.com/photo-1543466835-00a7907e9de1?auto=format&amp;fit=crop&amp;w=800&amp;q=80&quot;,
            &quot;alt&quot;: &quot;Happy dog on street&quot;
        },
        &quot;seo&quot;: null,
        &quot;media&quot;: []
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-blogs--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-blogs--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-blogs--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-blogs--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-blogs--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-blogs--id-" data-method="GET"
      data-path="api/blogs/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-blogs--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-blogs--id-"
                    onclick="tryItOut('GETapi-blogs--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-blogs--id-"
                    onclick="cancelTryOut('GETapi-blogs--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-blogs--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/blogs/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-blogs--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-blogs--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-blogs--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the blog. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="blog-content-cms-POSTapi-blogs">POST api/blogs</h2>

<p>
</p>



<span id="example-requests-POSTapi-blogs">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/blogs" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "title=bngzmiyvdljnikhwaykcmyuwpwlvqwrsitcpscqldzsnrwtujwvlxjklqppwqbewtnnoqitpxn"\
    --form "slug=architecto"\
    --form "author=architecto"\
    --form "category=architecto"\
    --form "excerpt=n"\
    --form "content=architecto"\
    --form "status=Draft"\
    --form "file=@/tmp/php8cnev3ramjhh88jXVHE" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/blogs"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('title', 'bngzmiyvdljnikhwaykcmyuwpwlvqwrsitcpscqldzsnrwtujwvlxjklqppwqbewtnnoqitpxn');
body.append('slug', 'architecto');
body.append('author', 'architecto');
body.append('category', 'architecto');
body.append('excerpt', 'n');
body.append('content', 'architecto');
body.append('status', 'Draft');
body.append('file', document.querySelector('input[name="file"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-blogs">
</span>
<span id="execution-results-POSTapi-blogs" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-blogs"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-blogs"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-blogs" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-blogs">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-blogs" data-method="POST"
      data-path="api/blogs"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-blogs', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-blogs"
                    onclick="tryItOut('POSTapi-blogs');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-blogs"
                    onclick="cancelTryOut('POSTapi-blogs');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-blogs"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/blogs</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-blogs"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-blogs"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="POSTapi-blogs"
               value="bngzmiyvdljnikhwaykcmyuwpwlvqwrsitcpscqldzsnrwtujwvlxjklqppwqbewtnnoqitpxn"
               data-component="body">
    <br>
<p>Must be at least 3 characters. Example: <code>bngzmiyvdljnikhwaykcmyuwpwlvqwrsitcpscqldzsnrwtujwvlxjklqppwqbewtnnoqitpxn</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="slug"                data-endpoint="POSTapi-blogs"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>author</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="author"                data-endpoint="POSTapi-blogs"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>category</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="category"                data-endpoint="POSTapi-blogs"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>excerpt</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="excerpt"                data-endpoint="POSTapi-blogs"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 300 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>content</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="content"                data-endpoint="POSTapi-blogs"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="POSTapi-blogs"
               value="Draft"
               data-component="body">
    <br>
<p>Example: <code>Draft</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>Draft</code></li> <li><code>Published</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>file</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="file"                data-endpoint="POSTapi-blogs"
               value=""
               data-component="body">
    <br>
<p>Must be a file. Must be an image. Must not be greater than 10240 kilobytes. Example: <code>/tmp/php8cnev3ramjhh88jXVHE</code></p>
        </div>
        </form>

                    <h2 id="blog-content-cms-PUTapi-blogs--id-">PUT api/blogs/{id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-blogs--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/blogs/1" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "title=bngzmiyvdljnikhwaykcmyuwpwlvqwrsitcpscqldzsnrwtujwvlxjklqppwqbewtnnoqitpxn"\
    --form "slug=architecto"\
    --form "author=architecto"\
    --form "category=architecto"\
    --form "excerpt=n"\
    --form "content=architecto"\
    --form "status=Published"\
    --form "file=@/tmp/php146ji13g7qv424v8zA0" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/blogs/1"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('title', 'bngzmiyvdljnikhwaykcmyuwpwlvqwrsitcpscqldzsnrwtujwvlxjklqppwqbewtnnoqitpxn');
body.append('slug', 'architecto');
body.append('author', 'architecto');
body.append('category', 'architecto');
body.append('excerpt', 'n');
body.append('content', 'architecto');
body.append('status', 'Published');
body.append('file', document.querySelector('input[name="file"]').files[0]);

fetch(url, {
    method: "PUT",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-blogs--id-">
</span>
<span id="execution-results-PUTapi-blogs--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-blogs--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-blogs--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-blogs--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-blogs--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-blogs--id-" data-method="PUT"
      data-path="api/blogs/{id}"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-blogs--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-blogs--id-"
                    onclick="tryItOut('PUTapi-blogs--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-blogs--id-"
                    onclick="cancelTryOut('PUTapi-blogs--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-blogs--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/blogs/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-blogs--id-"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-blogs--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-blogs--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the blog. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="PUTapi-blogs--id-"
               value="bngzmiyvdljnikhwaykcmyuwpwlvqwrsitcpscqldzsnrwtujwvlxjklqppwqbewtnnoqitpxn"
               data-component="body">
    <br>
<p>Must be at least 3 characters. Example: <code>bngzmiyvdljnikhwaykcmyuwpwlvqwrsitcpscqldzsnrwtujwvlxjklqppwqbewtnnoqitpxn</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="slug"                data-endpoint="PUTapi-blogs--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>author</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="author"                data-endpoint="PUTapi-blogs--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>category</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="category"                data-endpoint="PUTapi-blogs--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>excerpt</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="excerpt"                data-endpoint="PUTapi-blogs--id-"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 300 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>content</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="content"                data-endpoint="PUTapi-blogs--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PUTapi-blogs--id-"
               value="Published"
               data-component="body">
    <br>
<p>Example: <code>Published</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>Draft</code></li> <li><code>Published</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>file</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="file"                data-endpoint="PUTapi-blogs--id-"
               value=""
               data-component="body">
    <br>
<p>Must be a file. Must be an image. Must not be greater than 10240 kilobytes. Example: <code>/tmp/php146ji13g7qv424v8zA0</code></p>
        </div>
        </form>

                    <h2 id="blog-content-cms-DELETEapi-blogs--id-">DELETE api/blogs/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-blogs--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/blogs/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/blogs/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-blogs--id-">
</span>
<span id="execution-results-DELETEapi-blogs--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-blogs--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-blogs--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-blogs--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-blogs--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-blogs--id-" data-method="DELETE"
      data-path="api/blogs/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-blogs--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-blogs--id-"
                    onclick="tryItOut('DELETEapi-blogs--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-blogs--id-"
                    onclick="cancelTryOut('DELETEapi-blogs--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-blogs--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/blogs/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-blogs--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-blogs--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-blogs--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the blog. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="media-gallery">Media & Gallery</h1>

    <p>APIs for managing media items, photo galleries, and shelter photos.</p>

                                <h2 id="media-gallery-GETapi-galleries">GET api/galleries</h2>

<p>
</p>



<span id="example-requests-GETapi-galleries">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/galleries" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/galleries"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-galleries">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: true,
    &quot;message&quot;: &quot;Gallery items retrieved successfully.&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;title&quot;: &quot;my image&quot;,
            &quot;src&quot;: &quot;https://images.pexels.com/photos/8583581/pexels-photo-8583581.jpeg&quot;,
            &quot;alt&quot;: &quot;dummy image&quot;,
            &quot;category&quot;: &quot;Rescue &amp; recovery&quot;,
            &quot;desc&quot;: &quot;test&quot;,
            &quot;status&quot;: &quot;Active&quot;,
            &quot;sort_order&quot;: 1,
            &quot;user_id&quot;: 5,
            &quot;created_at&quot;: &quot;2026-08-14T15:12:30.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-14T15:12:30.000000Z&quot;,
            &quot;sortOrder&quot;: 1,
            &quot;media&quot;: [],
            &quot;user&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Praveen Suthar&quot;,
                &quot;gender&quot;: &quot;Male&quot;,
                &quot;phone&quot;: &quot;+919783410487&quot;,
                &quot;bio&quot;: &quot;Providing technical guidance and managing Furrydom India&rsquo;s website, digital platforms, and technology initiatives to support the organization&rsquo;s operations, outreach, and mission.&quot;,
                &quot;avatar&quot;: &quot;http://127.0.0.1:8000/storage/1/1786380872_airbrush-20190909234508-01.webp&quot;,
                &quot;dob&quot;: &quot;2026-08-20&quot;,
                &quot;anniversary&quot;: &quot;2026-08-19&quot;,
                &quot;email&quot;: &quot;praveensuthar9553@gmail.com&quot;,
                &quot;email_verified_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
                &quot;show_in_website&quot;: true,
                &quot;status&quot;: &quot;Active&quot;,
                &quot;created_at&quot;: &quot;2026-08-10T16:04:50.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
                &quot;role&quot;: &quot;Technical Advisor&quot;,
                &quot;showInWebsite&quot;: true,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 9,
                        &quot;name&quot;: &quot;Technical Advisor&quot;,
                        &quot;guard_name&quot;: &quot;api&quot;,
                        &quot;allow_notification&quot;: false,
                        &quot;is_volunteer&quot;: false,
                        &quot;role_description&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                        &quot;created_at&quot;: &quot;2026-08-10T16:04:48.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2026-08-10T16:38:35.000000Z&quot;,
                        &quot;roleDescription&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                        &quot;pivot&quot;: {
                            &quot;model_type&quot;: &quot;App\\Models\\User&quot;,
                            &quot;model_id&quot;: 5,
                            &quot;role_id&quot;: 9
                        }
                    }
                ]
            }
        },
        {
            &quot;id&quot;: 2,
            &quot;title&quot;: &quot;Feeding Stray Dogs&quot;,
            &quot;src&quot;: &quot;https://images.pexels.com/photos/16465615/pexels-photo-16465615.jpeg&quot;,
            &quot;alt&quot;: &quot;dummy image&quot;,
            &quot;category&quot;: &quot;Community Events&quot;,
            &quot;desc&quot;: &quot;test&quot;,
            &quot;status&quot;: &quot;Active&quot;,
            &quot;sort_order&quot;: 1,
            &quot;user_id&quot;: 5,
            &quot;created_at&quot;: &quot;2026-08-14T15:13:15.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-14T15:13:15.000000Z&quot;,
            &quot;sortOrder&quot;: 1,
            &quot;media&quot;: [],
            &quot;user&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Praveen Suthar&quot;,
                &quot;gender&quot;: &quot;Male&quot;,
                &quot;phone&quot;: &quot;+919783410487&quot;,
                &quot;bio&quot;: &quot;Providing technical guidance and managing Furrydom India&rsquo;s website, digital platforms, and technology initiatives to support the organization&rsquo;s operations, outreach, and mission.&quot;,
                &quot;avatar&quot;: &quot;http://127.0.0.1:8000/storage/1/1786380872_airbrush-20190909234508-01.webp&quot;,
                &quot;dob&quot;: &quot;2026-08-20&quot;,
                &quot;anniversary&quot;: &quot;2026-08-19&quot;,
                &quot;email&quot;: &quot;praveensuthar9553@gmail.com&quot;,
                &quot;email_verified_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
                &quot;show_in_website&quot;: true,
                &quot;status&quot;: &quot;Active&quot;,
                &quot;created_at&quot;: &quot;2026-08-10T16:04:50.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
                &quot;role&quot;: &quot;Technical Advisor&quot;,
                &quot;showInWebsite&quot;: true,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 9,
                        &quot;name&quot;: &quot;Technical Advisor&quot;,
                        &quot;guard_name&quot;: &quot;api&quot;,
                        &quot;allow_notification&quot;: false,
                        &quot;is_volunteer&quot;: false,
                        &quot;role_description&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                        &quot;created_at&quot;: &quot;2026-08-10T16:04:48.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2026-08-10T16:38:35.000000Z&quot;,
                        &quot;roleDescription&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                        &quot;pivot&quot;: {
                            &quot;model_type&quot;: &quot;App\\Models\\User&quot;,
                            &quot;model_id&quot;: 5,
                            &quot;role_id&quot;: 9
                        }
                    }
                ]
            }
        },
        {
            &quot;id&quot;: 3,
            &quot;title&quot;: &quot;Feeding Stray Dogs&quot;,
            &quot;src&quot;: &quot;https://images.pexels.com/photos/38369207/pexels-photo-38369207.jpeg&quot;,
            &quot;alt&quot;: &quot;ee&quot;,
            &quot;category&quot;: &quot;Community Events&quot;,
            &quot;desc&quot;: &quot;testt&quot;,
            &quot;status&quot;: &quot;Active&quot;,
            &quot;sort_order&quot;: 1,
            &quot;user_id&quot;: 5,
            &quot;created_at&quot;: &quot;2026-08-14T15:15:09.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-14T15:15:09.000000Z&quot;,
            &quot;sortOrder&quot;: 1,
            &quot;media&quot;: [],
            &quot;user&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Praveen Suthar&quot;,
                &quot;gender&quot;: &quot;Male&quot;,
                &quot;phone&quot;: &quot;+919783410487&quot;,
                &quot;bio&quot;: &quot;Providing technical guidance and managing Furrydom India&rsquo;s website, digital platforms, and technology initiatives to support the organization&rsquo;s operations, outreach, and mission.&quot;,
                &quot;avatar&quot;: &quot;http://127.0.0.1:8000/storage/1/1786380872_airbrush-20190909234508-01.webp&quot;,
                &quot;dob&quot;: &quot;2026-08-20&quot;,
                &quot;anniversary&quot;: &quot;2026-08-19&quot;,
                &quot;email&quot;: &quot;praveensuthar9553@gmail.com&quot;,
                &quot;email_verified_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
                &quot;show_in_website&quot;: true,
                &quot;status&quot;: &quot;Active&quot;,
                &quot;created_at&quot;: &quot;2026-08-10T16:04:50.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
                &quot;role&quot;: &quot;Technical Advisor&quot;,
                &quot;showInWebsite&quot;: true,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 9,
                        &quot;name&quot;: &quot;Technical Advisor&quot;,
                        &quot;guard_name&quot;: &quot;api&quot;,
                        &quot;allow_notification&quot;: false,
                        &quot;is_volunteer&quot;: false,
                        &quot;role_description&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                        &quot;created_at&quot;: &quot;2026-08-10T16:04:48.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2026-08-10T16:38:35.000000Z&quot;,
                        &quot;roleDescription&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                        &quot;pivot&quot;: {
                            &quot;model_type&quot;: &quot;App\\Models\\User&quot;,
                            &quot;model_id&quot;: 5,
                            &quot;role_id&quot;: 9
                        }
                    }
                ]
            }
        },
        {
            &quot;id&quot;: 4,
            &quot;title&quot;: &quot;Ingured&quot;,
            &quot;src&quot;: &quot;https://images.pexels.com/photos/7469274/pexels-photo-7469274.jpeg&quot;,
            &quot;alt&quot;: &quot;te&quot;,
            &quot;category&quot;: &quot;Volunteer Activities&quot;,
            &quot;desc&quot;: &quot;tset&quot;,
            &quot;status&quot;: &quot;Active&quot;,
            &quot;sort_order&quot;: 1,
            &quot;user_id&quot;: 5,
            &quot;created_at&quot;: &quot;2026-08-14T15:16:00.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-14T15:16:00.000000Z&quot;,
            &quot;sortOrder&quot;: 1,
            &quot;media&quot;: [],
            &quot;user&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Praveen Suthar&quot;,
                &quot;gender&quot;: &quot;Male&quot;,
                &quot;phone&quot;: &quot;+919783410487&quot;,
                &quot;bio&quot;: &quot;Providing technical guidance and managing Furrydom India&rsquo;s website, digital platforms, and technology initiatives to support the organization&rsquo;s operations, outreach, and mission.&quot;,
                &quot;avatar&quot;: &quot;http://127.0.0.1:8000/storage/1/1786380872_airbrush-20190909234508-01.webp&quot;,
                &quot;dob&quot;: &quot;2026-08-20&quot;,
                &quot;anniversary&quot;: &quot;2026-08-19&quot;,
                &quot;email&quot;: &quot;praveensuthar9553@gmail.com&quot;,
                &quot;email_verified_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
                &quot;show_in_website&quot;: true,
                &quot;status&quot;: &quot;Active&quot;,
                &quot;created_at&quot;: &quot;2026-08-10T16:04:50.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
                &quot;role&quot;: &quot;Technical Advisor&quot;,
                &quot;showInWebsite&quot;: true,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 9,
                        &quot;name&quot;: &quot;Technical Advisor&quot;,
                        &quot;guard_name&quot;: &quot;api&quot;,
                        &quot;allow_notification&quot;: false,
                        &quot;is_volunteer&quot;: false,
                        &quot;role_description&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                        &quot;created_at&quot;: &quot;2026-08-10T16:04:48.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2026-08-10T16:38:35.000000Z&quot;,
                        &quot;roleDescription&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                        &quot;pivot&quot;: {
                            &quot;model_type&quot;: &quot;App\\Models\\User&quot;,
                            &quot;model_id&quot;: 5,
                            &quot;role_id&quot;: 9
                        }
                    }
                ]
            }
        },
        {
            &quot;id&quot;: 5,
            &quot;title&quot;: &quot;Feeding Stray Dogs&quot;,
            &quot;src&quot;: &quot;https://images.pexels.com/photos/7008099/pexels-photo-7008099.jpeg&quot;,
            &quot;alt&quot;: &quot;Feeding stray dogs in Pune&quot;,
            &quot;category&quot;: &quot;Feeding Programs&quot;,
            &quot;desc&quot;: &quot;tstete&quot;,
            &quot;status&quot;: &quot;Active&quot;,
            &quot;sort_order&quot;: 1,
            &quot;user_id&quot;: 5,
            &quot;created_at&quot;: &quot;2026-08-14T15:16:58.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-14T15:16:58.000000Z&quot;,
            &quot;sortOrder&quot;: 1,
            &quot;media&quot;: [],
            &quot;user&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Praveen Suthar&quot;,
                &quot;gender&quot;: &quot;Male&quot;,
                &quot;phone&quot;: &quot;+919783410487&quot;,
                &quot;bio&quot;: &quot;Providing technical guidance and managing Furrydom India&rsquo;s website, digital platforms, and technology initiatives to support the organization&rsquo;s operations, outreach, and mission.&quot;,
                &quot;avatar&quot;: &quot;http://127.0.0.1:8000/storage/1/1786380872_airbrush-20190909234508-01.webp&quot;,
                &quot;dob&quot;: &quot;2026-08-20&quot;,
                &quot;anniversary&quot;: &quot;2026-08-19&quot;,
                &quot;email&quot;: &quot;praveensuthar9553@gmail.com&quot;,
                &quot;email_verified_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
                &quot;show_in_website&quot;: true,
                &quot;status&quot;: &quot;Active&quot;,
                &quot;created_at&quot;: &quot;2026-08-10T16:04:50.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
                &quot;role&quot;: &quot;Technical Advisor&quot;,
                &quot;showInWebsite&quot;: true,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 9,
                        &quot;name&quot;: &quot;Technical Advisor&quot;,
                        &quot;guard_name&quot;: &quot;api&quot;,
                        &quot;allow_notification&quot;: false,
                        &quot;is_volunteer&quot;: false,
                        &quot;role_description&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                        &quot;created_at&quot;: &quot;2026-08-10T16:04:48.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2026-08-10T16:38:35.000000Z&quot;,
                        &quot;roleDescription&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                        &quot;pivot&quot;: {
                            &quot;model_type&quot;: &quot;App\\Models\\User&quot;,
                            &quot;model_id&quot;: 5,
                            &quot;role_id&quot;: 9
                        }
                    }
                ]
            }
        },
        {
            &quot;id&quot;: 6,
            &quot;title&quot;: &quot;Feeding Stray Dogs&quot;,
            &quot;src&quot;: &quot;https://images.pexels.com/photos/16652369/pexels-photo-16652369.jpeg&quot;,
            &quot;alt&quot;: &quot;dummy image&quot;,
            &quot;category&quot;: &quot;Radium collar Initiative&quot;,
            &quot;desc&quot;: &quot;tetgsdf&quot;,
            &quot;status&quot;: &quot;Active&quot;,
            &quot;sort_order&quot;: 1,
            &quot;user_id&quot;: 5,
            &quot;created_at&quot;: &quot;2026-08-14T15:18:12.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-14T15:18:12.000000Z&quot;,
            &quot;sortOrder&quot;: 1,
            &quot;media&quot;: [],
            &quot;user&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Praveen Suthar&quot;,
                &quot;gender&quot;: &quot;Male&quot;,
                &quot;phone&quot;: &quot;+919783410487&quot;,
                &quot;bio&quot;: &quot;Providing technical guidance and managing Furrydom India&rsquo;s website, digital platforms, and technology initiatives to support the organization&rsquo;s operations, outreach, and mission.&quot;,
                &quot;avatar&quot;: &quot;http://127.0.0.1:8000/storage/1/1786380872_airbrush-20190909234508-01.webp&quot;,
                &quot;dob&quot;: &quot;2026-08-20&quot;,
                &quot;anniversary&quot;: &quot;2026-08-19&quot;,
                &quot;email&quot;: &quot;praveensuthar9553@gmail.com&quot;,
                &quot;email_verified_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
                &quot;show_in_website&quot;: true,
                &quot;status&quot;: &quot;Active&quot;,
                &quot;created_at&quot;: &quot;2026-08-10T16:04:50.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
                &quot;role&quot;: &quot;Technical Advisor&quot;,
                &quot;showInWebsite&quot;: true,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 9,
                        &quot;name&quot;: &quot;Technical Advisor&quot;,
                        &quot;guard_name&quot;: &quot;api&quot;,
                        &quot;allow_notification&quot;: false,
                        &quot;is_volunteer&quot;: false,
                        &quot;role_description&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                        &quot;created_at&quot;: &quot;2026-08-10T16:04:48.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2026-08-10T16:38:35.000000Z&quot;,
                        &quot;roleDescription&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                        &quot;pivot&quot;: {
                            &quot;model_type&quot;: &quot;App\\Models\\User&quot;,
                            &quot;model_id&quot;: 5,
                            &quot;role_id&quot;: 9
                        }
                    }
                ]
            }
        },
        {
            &quot;id&quot;: 7,
            &quot;title&quot;: &quot;my image&quot;,
            &quot;src&quot;: &quot;https://images.pexels.com/photos/16465614/pexels-photo-16465614.jpeg&quot;,
            &quot;alt&quot;: &quot;Feeding stray dogs in Pune&quot;,
            &quot;category&quot;: &quot;Auto Feeder Project&quot;,
            &quot;desc&quot;: &quot;tsersdf&quot;,
            &quot;status&quot;: &quot;Active&quot;,
            &quot;sort_order&quot;: 1,
            &quot;user_id&quot;: 5,
            &quot;created_at&quot;: &quot;2026-08-14T15:18:47.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-14T15:18:47.000000Z&quot;,
            &quot;sortOrder&quot;: 1,
            &quot;media&quot;: [],
            &quot;user&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Praveen Suthar&quot;,
                &quot;gender&quot;: &quot;Male&quot;,
                &quot;phone&quot;: &quot;+919783410487&quot;,
                &quot;bio&quot;: &quot;Providing technical guidance and managing Furrydom India&rsquo;s website, digital platforms, and technology initiatives to support the organization&rsquo;s operations, outreach, and mission.&quot;,
                &quot;avatar&quot;: &quot;http://127.0.0.1:8000/storage/1/1786380872_airbrush-20190909234508-01.webp&quot;,
                &quot;dob&quot;: &quot;2026-08-20&quot;,
                &quot;anniversary&quot;: &quot;2026-08-19&quot;,
                &quot;email&quot;: &quot;praveensuthar9553@gmail.com&quot;,
                &quot;email_verified_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
                &quot;show_in_website&quot;: true,
                &quot;status&quot;: &quot;Active&quot;,
                &quot;created_at&quot;: &quot;2026-08-10T16:04:50.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
                &quot;role&quot;: &quot;Technical Advisor&quot;,
                &quot;showInWebsite&quot;: true,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 9,
                        &quot;name&quot;: &quot;Technical Advisor&quot;,
                        &quot;guard_name&quot;: &quot;api&quot;,
                        &quot;allow_notification&quot;: false,
                        &quot;is_volunteer&quot;: false,
                        &quot;role_description&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                        &quot;created_at&quot;: &quot;2026-08-10T16:04:48.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2026-08-10T16:38:35.000000Z&quot;,
                        &quot;roleDescription&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                        &quot;pivot&quot;: {
                            &quot;model_type&quot;: &quot;App\\Models\\User&quot;,
                            &quot;model_id&quot;: 5,
                            &quot;role_id&quot;: 9
                        }
                    }
                ]
            }
        },
        {
            &quot;id&quot;: 8,
            &quot;title&quot;: &quot;Ingured&quot;,
            &quot;src&quot;: &quot;https://images.pexels.com/photos/36625705/pexels-photo-36625705.jpeg&quot;,
            &quot;alt&quot;: &quot;Feeding stray dogs in Pune&quot;,
            &quot;category&quot;: &quot;Volunteer Activities&quot;,
            &quot;desc&quot;: &quot;stest&quot;,
            &quot;status&quot;: &quot;Active&quot;,
            &quot;sort_order&quot;: 1,
            &quot;user_id&quot;: 5,
            &quot;created_at&quot;: &quot;2026-08-14T15:19:31.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-14T15:19:31.000000Z&quot;,
            &quot;sortOrder&quot;: 1,
            &quot;media&quot;: [],
            &quot;user&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Praveen Suthar&quot;,
                &quot;gender&quot;: &quot;Male&quot;,
                &quot;phone&quot;: &quot;+919783410487&quot;,
                &quot;bio&quot;: &quot;Providing technical guidance and managing Furrydom India&rsquo;s website, digital platforms, and technology initiatives to support the organization&rsquo;s operations, outreach, and mission.&quot;,
                &quot;avatar&quot;: &quot;http://127.0.0.1:8000/storage/1/1786380872_airbrush-20190909234508-01.webp&quot;,
                &quot;dob&quot;: &quot;2026-08-20&quot;,
                &quot;anniversary&quot;: &quot;2026-08-19&quot;,
                &quot;email&quot;: &quot;praveensuthar9553@gmail.com&quot;,
                &quot;email_verified_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
                &quot;show_in_website&quot;: true,
                &quot;status&quot;: &quot;Active&quot;,
                &quot;created_at&quot;: &quot;2026-08-10T16:04:50.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
                &quot;role&quot;: &quot;Technical Advisor&quot;,
                &quot;showInWebsite&quot;: true,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 9,
                        &quot;name&quot;: &quot;Technical Advisor&quot;,
                        &quot;guard_name&quot;: &quot;api&quot;,
                        &quot;allow_notification&quot;: false,
                        &quot;is_volunteer&quot;: false,
                        &quot;role_description&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                        &quot;created_at&quot;: &quot;2026-08-10T16:04:48.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2026-08-10T16:38:35.000000Z&quot;,
                        &quot;roleDescription&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                        &quot;pivot&quot;: {
                            &quot;model_type&quot;: &quot;App\\Models\\User&quot;,
                            &quot;model_id&quot;: 5,
                            &quot;role_id&quot;: 9
                        }
                    }
                ]
            }
        },
        {
            &quot;id&quot;: 9,
            &quot;title&quot;: &quot;Meals support&quot;,
            &quot;src&quot;: &quot;https://images.pexels.com/photos/25204930/pexels-photo-25204930.jpeg&quot;,
            &quot;alt&quot;: &quot;Meals support&quot;,
            &quot;category&quot;: &quot;Meals &amp; Ration Support&quot;,
            &quot;desc&quot;: &quot;Meals support&quot;,
            &quot;status&quot;: &quot;Active&quot;,
            &quot;sort_order&quot;: 1,
            &quot;user_id&quot;: 5,
            &quot;created_at&quot;: &quot;2026-08-14T15:21:01.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-14T15:21:01.000000Z&quot;,
            &quot;sortOrder&quot;: 1,
            &quot;media&quot;: [],
            &quot;user&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Praveen Suthar&quot;,
                &quot;gender&quot;: &quot;Male&quot;,
                &quot;phone&quot;: &quot;+919783410487&quot;,
                &quot;bio&quot;: &quot;Providing technical guidance and managing Furrydom India&rsquo;s website, digital platforms, and technology initiatives to support the organization&rsquo;s operations, outreach, and mission.&quot;,
                &quot;avatar&quot;: &quot;http://127.0.0.1:8000/storage/1/1786380872_airbrush-20190909234508-01.webp&quot;,
                &quot;dob&quot;: &quot;2026-08-20&quot;,
                &quot;anniversary&quot;: &quot;2026-08-19&quot;,
                &quot;email&quot;: &quot;praveensuthar9553@gmail.com&quot;,
                &quot;email_verified_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
                &quot;show_in_website&quot;: true,
                &quot;status&quot;: &quot;Active&quot;,
                &quot;created_at&quot;: &quot;2026-08-10T16:04:50.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
                &quot;role&quot;: &quot;Technical Advisor&quot;,
                &quot;showInWebsite&quot;: true,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 9,
                        &quot;name&quot;: &quot;Technical Advisor&quot;,
                        &quot;guard_name&quot;: &quot;api&quot;,
                        &quot;allow_notification&quot;: false,
                        &quot;is_volunteer&quot;: false,
                        &quot;role_description&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                        &quot;created_at&quot;: &quot;2026-08-10T16:04:48.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2026-08-10T16:38:35.000000Z&quot;,
                        &quot;roleDescription&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                        &quot;pivot&quot;: {
                            &quot;model_type&quot;: &quot;App\\Models\\User&quot;,
                            &quot;model_id&quot;: 5,
                            &quot;role_id&quot;: 9
                        }
                    }
                ]
            }
        },
        {
            &quot;id&quot;: 10,
            &quot;title&quot;: &quot;Meals support&quot;,
            &quot;src&quot;: &quot;https://images.pexels.com/photos/35247605/pexels-photo-35247605.jpeg&quot;,
            &quot;alt&quot;: &quot;https://images.pexels.com/photos/35247605/pexels-photo-35247605.jpeg&quot;,
            &quot;category&quot;: &quot;Meals &amp; Ration Support&quot;,
            &quot;desc&quot;: &quot;vse&quot;,
            &quot;status&quot;: &quot;Active&quot;,
            &quot;sort_order&quot;: 1,
            &quot;user_id&quot;: 5,
            &quot;created_at&quot;: &quot;2026-08-14T15:21:51.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-14T15:21:51.000000Z&quot;,
            &quot;sortOrder&quot;: 1,
            &quot;media&quot;: [],
            &quot;user&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Praveen Suthar&quot;,
                &quot;gender&quot;: &quot;Male&quot;,
                &quot;phone&quot;: &quot;+919783410487&quot;,
                &quot;bio&quot;: &quot;Providing technical guidance and managing Furrydom India&rsquo;s website, digital platforms, and technology initiatives to support the organization&rsquo;s operations, outreach, and mission.&quot;,
                &quot;avatar&quot;: &quot;http://127.0.0.1:8000/storage/1/1786380872_airbrush-20190909234508-01.webp&quot;,
                &quot;dob&quot;: &quot;2026-08-20&quot;,
                &quot;anniversary&quot;: &quot;2026-08-19&quot;,
                &quot;email&quot;: &quot;praveensuthar9553@gmail.com&quot;,
                &quot;email_verified_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
                &quot;show_in_website&quot;: true,
                &quot;status&quot;: &quot;Active&quot;,
                &quot;created_at&quot;: &quot;2026-08-10T16:04:50.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
                &quot;role&quot;: &quot;Technical Advisor&quot;,
                &quot;showInWebsite&quot;: true,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 9,
                        &quot;name&quot;: &quot;Technical Advisor&quot;,
                        &quot;guard_name&quot;: &quot;api&quot;,
                        &quot;allow_notification&quot;: false,
                        &quot;is_volunteer&quot;: false,
                        &quot;role_description&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                        &quot;created_at&quot;: &quot;2026-08-10T16:04:48.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2026-08-10T16:38:35.000000Z&quot;,
                        &quot;roleDescription&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                        &quot;pivot&quot;: {
                            &quot;model_type&quot;: &quot;App\\Models\\User&quot;,
                            &quot;model_id&quot;: 5,
                            &quot;role_id&quot;: 9
                        }
                    }
                ]
            }
        },
        {
            &quot;id&quot;: 11,
            &quot;title&quot;: &quot;child&quot;,
            &quot;src&quot;: &quot;https://images.pexels.com/photos/37249876/pexels-photo-37249876.jpeg&quot;,
            &quot;alt&quot;: &quot;Feeding stray dogs in Pune&quot;,
            &quot;category&quot;: &quot;Child Education Program&quot;,
            &quot;desc&quot;: &quot;child education&quot;,
            &quot;status&quot;: &quot;Active&quot;,
            &quot;sort_order&quot;: 1,
            &quot;user_id&quot;: 5,
            &quot;created_at&quot;: &quot;2026-08-14T16:44:16.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-14T16:44:16.000000Z&quot;,
            &quot;sortOrder&quot;: 1,
            &quot;media&quot;: [],
            &quot;user&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Praveen Suthar&quot;,
                &quot;gender&quot;: &quot;Male&quot;,
                &quot;phone&quot;: &quot;+919783410487&quot;,
                &quot;bio&quot;: &quot;Providing technical guidance and managing Furrydom India&rsquo;s website, digital platforms, and technology initiatives to support the organization&rsquo;s operations, outreach, and mission.&quot;,
                &quot;avatar&quot;: &quot;http://127.0.0.1:8000/storage/1/1786380872_airbrush-20190909234508-01.webp&quot;,
                &quot;dob&quot;: &quot;2026-08-20&quot;,
                &quot;anniversary&quot;: &quot;2026-08-19&quot;,
                &quot;email&quot;: &quot;praveensuthar9553@gmail.com&quot;,
                &quot;email_verified_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
                &quot;show_in_website&quot;: true,
                &quot;status&quot;: &quot;Active&quot;,
                &quot;created_at&quot;: &quot;2026-08-10T16:04:50.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
                &quot;role&quot;: &quot;Technical Advisor&quot;,
                &quot;showInWebsite&quot;: true,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 9,
                        &quot;name&quot;: &quot;Technical Advisor&quot;,
                        &quot;guard_name&quot;: &quot;api&quot;,
                        &quot;allow_notification&quot;: false,
                        &quot;is_volunteer&quot;: false,
                        &quot;role_description&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                        &quot;created_at&quot;: &quot;2026-08-10T16:04:48.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2026-08-10T16:38:35.000000Z&quot;,
                        &quot;roleDescription&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                        &quot;pivot&quot;: {
                            &quot;model_type&quot;: &quot;App\\Models\\User&quot;,
                            &quot;model_id&quot;: 5,
                            &quot;role_id&quot;: 9
                        }
                    }
                ]
            }
        },
        {
            &quot;id&quot;: 12,
            &quot;title&quot;: &quot;child school&quot;,
            &quot;src&quot;: &quot;https://images.pexels.com/photos/18012456/pexels-photo-18012456.jpeg&quot;,
            &quot;alt&quot;: &quot;child school&quot;,
            &quot;category&quot;: &quot;Child Education Program&quot;,
            &quot;desc&quot;: &quot;child school&quot;,
            &quot;status&quot;: &quot;Active&quot;,
            &quot;sort_order&quot;: 1,
            &quot;user_id&quot;: 5,
            &quot;created_at&quot;: &quot;2026-08-14T16:45:14.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-14T16:45:14.000000Z&quot;,
            &quot;sortOrder&quot;: 1,
            &quot;media&quot;: [],
            &quot;user&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Praveen Suthar&quot;,
                &quot;gender&quot;: &quot;Male&quot;,
                &quot;phone&quot;: &quot;+919783410487&quot;,
                &quot;bio&quot;: &quot;Providing technical guidance and managing Furrydom India&rsquo;s website, digital platforms, and technology initiatives to support the organization&rsquo;s operations, outreach, and mission.&quot;,
                &quot;avatar&quot;: &quot;http://127.0.0.1:8000/storage/1/1786380872_airbrush-20190909234508-01.webp&quot;,
                &quot;dob&quot;: &quot;2026-08-20&quot;,
                &quot;anniversary&quot;: &quot;2026-08-19&quot;,
                &quot;email&quot;: &quot;praveensuthar9553@gmail.com&quot;,
                &quot;email_verified_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
                &quot;show_in_website&quot;: true,
                &quot;status&quot;: &quot;Active&quot;,
                &quot;created_at&quot;: &quot;2026-08-10T16:04:50.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
                &quot;role&quot;: &quot;Technical Advisor&quot;,
                &quot;showInWebsite&quot;: true,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 9,
                        &quot;name&quot;: &quot;Technical Advisor&quot;,
                        &quot;guard_name&quot;: &quot;api&quot;,
                        &quot;allow_notification&quot;: false,
                        &quot;is_volunteer&quot;: false,
                        &quot;role_description&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                        &quot;created_at&quot;: &quot;2026-08-10T16:04:48.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2026-08-10T16:38:35.000000Z&quot;,
                        &quot;roleDescription&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                        &quot;pivot&quot;: {
                            &quot;model_type&quot;: &quot;App\\Models\\User&quot;,
                            &quot;model_id&quot;: 5,
                            &quot;role_id&quot;: 9
                        }
                    }
                ]
            }
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-galleries" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-galleries"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-galleries"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-galleries" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-galleries">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-galleries" data-method="GET"
      data-path="api/galleries"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-galleries', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-galleries"
                    onclick="tryItOut('GETapi-galleries');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-galleries"
                    onclick="cancelTryOut('GETapi-galleries');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-galleries"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/galleries</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-galleries"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-galleries"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="media-gallery-GETapi-galleries--id-">GET api/galleries/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-galleries--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/galleries/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/galleries/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-galleries--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: true,
    &quot;message&quot;: &quot;Gallery item retrieved successfully.&quot;,
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;title&quot;: &quot;my image&quot;,
        &quot;src&quot;: &quot;https://images.pexels.com/photos/8583581/pexels-photo-8583581.jpeg&quot;,
        &quot;alt&quot;: &quot;dummy image&quot;,
        &quot;category&quot;: &quot;Rescue &amp; recovery&quot;,
        &quot;desc&quot;: &quot;test&quot;,
        &quot;status&quot;: &quot;Active&quot;,
        &quot;sort_order&quot;: 1,
        &quot;user_id&quot;: 5,
        &quot;created_at&quot;: &quot;2026-08-14T15:12:30.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-08-14T15:12:30.000000Z&quot;,
        &quot;sortOrder&quot;: 1,
        &quot;media&quot;: [],
        &quot;user&quot;: {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;Praveen Suthar&quot;,
            &quot;gender&quot;: &quot;Male&quot;,
            &quot;phone&quot;: &quot;+919783410487&quot;,
            &quot;bio&quot;: &quot;Providing technical guidance and managing Furrydom India&rsquo;s website, digital platforms, and technology initiatives to support the organization&rsquo;s operations, outreach, and mission.&quot;,
            &quot;avatar&quot;: &quot;http://127.0.0.1:8000/storage/1/1786380872_airbrush-20190909234508-01.webp&quot;,
            &quot;dob&quot;: &quot;2026-08-20&quot;,
            &quot;anniversary&quot;: &quot;2026-08-19&quot;,
            &quot;email&quot;: &quot;praveensuthar9553@gmail.com&quot;,
            &quot;email_verified_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
            &quot;show_in_website&quot;: true,
            &quot;status&quot;: &quot;Active&quot;,
            &quot;created_at&quot;: &quot;2026-08-10T16:04:50.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
            &quot;role&quot;: &quot;Technical Advisor&quot;,
            &quot;showInWebsite&quot;: true,
            &quot;roles&quot;: [
                {
                    &quot;id&quot;: 9,
                    &quot;name&quot;: &quot;Technical Advisor&quot;,
                    &quot;guard_name&quot;: &quot;api&quot;,
                    &quot;allow_notification&quot;: false,
                    &quot;is_volunteer&quot;: false,
                    &quot;role_description&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                    &quot;created_at&quot;: &quot;2026-08-10T16:04:48.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2026-08-10T16:38:35.000000Z&quot;,
                    &quot;roleDescription&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                    &quot;pivot&quot;: {
                        &quot;model_type&quot;: &quot;App\\Models\\User&quot;,
                        &quot;model_id&quot;: 5,
                        &quot;role_id&quot;: 9
                    }
                }
            ]
        }
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-galleries--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-galleries--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-galleries--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-galleries--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-galleries--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-galleries--id-" data-method="GET"
      data-path="api/galleries/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-galleries--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-galleries--id-"
                    onclick="tryItOut('GETapi-galleries--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-galleries--id-"
                    onclick="cancelTryOut('GETapi-galleries--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-galleries--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/galleries/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-galleries--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-galleries--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-galleries--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the gallery. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="media-gallery-GETapi-media">GET api/media</h2>

<p>
</p>



<span id="example-requests-GETapi-media">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/media" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/media"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-media">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: true,
    &quot;message&quot;: &quot;Gallery items retrieved successfully.&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;title&quot;: &quot;my image&quot;,
            &quot;src&quot;: &quot;https://images.pexels.com/photos/8583581/pexels-photo-8583581.jpeg&quot;,
            &quot;alt&quot;: &quot;dummy image&quot;,
            &quot;category&quot;: &quot;Rescue &amp; recovery&quot;,
            &quot;desc&quot;: &quot;test&quot;,
            &quot;status&quot;: &quot;Active&quot;,
            &quot;sort_order&quot;: 1,
            &quot;user_id&quot;: 5,
            &quot;created_at&quot;: &quot;2026-08-14T15:12:30.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-14T15:12:30.000000Z&quot;,
            &quot;sortOrder&quot;: 1,
            &quot;media&quot;: [],
            &quot;user&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Praveen Suthar&quot;,
                &quot;gender&quot;: &quot;Male&quot;,
                &quot;phone&quot;: &quot;+919783410487&quot;,
                &quot;bio&quot;: &quot;Providing technical guidance and managing Furrydom India&rsquo;s website, digital platforms, and technology initiatives to support the organization&rsquo;s operations, outreach, and mission.&quot;,
                &quot;avatar&quot;: &quot;http://127.0.0.1:8000/storage/1/1786380872_airbrush-20190909234508-01.webp&quot;,
                &quot;dob&quot;: &quot;2026-08-20&quot;,
                &quot;anniversary&quot;: &quot;2026-08-19&quot;,
                &quot;email&quot;: &quot;praveensuthar9553@gmail.com&quot;,
                &quot;email_verified_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
                &quot;show_in_website&quot;: true,
                &quot;status&quot;: &quot;Active&quot;,
                &quot;created_at&quot;: &quot;2026-08-10T16:04:50.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
                &quot;role&quot;: &quot;Technical Advisor&quot;,
                &quot;showInWebsite&quot;: true,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 9,
                        &quot;name&quot;: &quot;Technical Advisor&quot;,
                        &quot;guard_name&quot;: &quot;api&quot;,
                        &quot;allow_notification&quot;: false,
                        &quot;is_volunteer&quot;: false,
                        &quot;role_description&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                        &quot;created_at&quot;: &quot;2026-08-10T16:04:48.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2026-08-10T16:38:35.000000Z&quot;,
                        &quot;roleDescription&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                        &quot;pivot&quot;: {
                            &quot;model_type&quot;: &quot;App\\Models\\User&quot;,
                            &quot;model_id&quot;: 5,
                            &quot;role_id&quot;: 9
                        }
                    }
                ]
            }
        },
        {
            &quot;id&quot;: 2,
            &quot;title&quot;: &quot;Feeding Stray Dogs&quot;,
            &quot;src&quot;: &quot;https://images.pexels.com/photos/16465615/pexels-photo-16465615.jpeg&quot;,
            &quot;alt&quot;: &quot;dummy image&quot;,
            &quot;category&quot;: &quot;Community Events&quot;,
            &quot;desc&quot;: &quot;test&quot;,
            &quot;status&quot;: &quot;Active&quot;,
            &quot;sort_order&quot;: 1,
            &quot;user_id&quot;: 5,
            &quot;created_at&quot;: &quot;2026-08-14T15:13:15.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-14T15:13:15.000000Z&quot;,
            &quot;sortOrder&quot;: 1,
            &quot;media&quot;: [],
            &quot;user&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Praveen Suthar&quot;,
                &quot;gender&quot;: &quot;Male&quot;,
                &quot;phone&quot;: &quot;+919783410487&quot;,
                &quot;bio&quot;: &quot;Providing technical guidance and managing Furrydom India&rsquo;s website, digital platforms, and technology initiatives to support the organization&rsquo;s operations, outreach, and mission.&quot;,
                &quot;avatar&quot;: &quot;http://127.0.0.1:8000/storage/1/1786380872_airbrush-20190909234508-01.webp&quot;,
                &quot;dob&quot;: &quot;2026-08-20&quot;,
                &quot;anniversary&quot;: &quot;2026-08-19&quot;,
                &quot;email&quot;: &quot;praveensuthar9553@gmail.com&quot;,
                &quot;email_verified_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
                &quot;show_in_website&quot;: true,
                &quot;status&quot;: &quot;Active&quot;,
                &quot;created_at&quot;: &quot;2026-08-10T16:04:50.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
                &quot;role&quot;: &quot;Technical Advisor&quot;,
                &quot;showInWebsite&quot;: true,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 9,
                        &quot;name&quot;: &quot;Technical Advisor&quot;,
                        &quot;guard_name&quot;: &quot;api&quot;,
                        &quot;allow_notification&quot;: false,
                        &quot;is_volunteer&quot;: false,
                        &quot;role_description&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                        &quot;created_at&quot;: &quot;2026-08-10T16:04:48.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2026-08-10T16:38:35.000000Z&quot;,
                        &quot;roleDescription&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                        &quot;pivot&quot;: {
                            &quot;model_type&quot;: &quot;App\\Models\\User&quot;,
                            &quot;model_id&quot;: 5,
                            &quot;role_id&quot;: 9
                        }
                    }
                ]
            }
        },
        {
            &quot;id&quot;: 3,
            &quot;title&quot;: &quot;Feeding Stray Dogs&quot;,
            &quot;src&quot;: &quot;https://images.pexels.com/photos/38369207/pexels-photo-38369207.jpeg&quot;,
            &quot;alt&quot;: &quot;ee&quot;,
            &quot;category&quot;: &quot;Community Events&quot;,
            &quot;desc&quot;: &quot;testt&quot;,
            &quot;status&quot;: &quot;Active&quot;,
            &quot;sort_order&quot;: 1,
            &quot;user_id&quot;: 5,
            &quot;created_at&quot;: &quot;2026-08-14T15:15:09.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-14T15:15:09.000000Z&quot;,
            &quot;sortOrder&quot;: 1,
            &quot;media&quot;: [],
            &quot;user&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Praveen Suthar&quot;,
                &quot;gender&quot;: &quot;Male&quot;,
                &quot;phone&quot;: &quot;+919783410487&quot;,
                &quot;bio&quot;: &quot;Providing technical guidance and managing Furrydom India&rsquo;s website, digital platforms, and technology initiatives to support the organization&rsquo;s operations, outreach, and mission.&quot;,
                &quot;avatar&quot;: &quot;http://127.0.0.1:8000/storage/1/1786380872_airbrush-20190909234508-01.webp&quot;,
                &quot;dob&quot;: &quot;2026-08-20&quot;,
                &quot;anniversary&quot;: &quot;2026-08-19&quot;,
                &quot;email&quot;: &quot;praveensuthar9553@gmail.com&quot;,
                &quot;email_verified_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
                &quot;show_in_website&quot;: true,
                &quot;status&quot;: &quot;Active&quot;,
                &quot;created_at&quot;: &quot;2026-08-10T16:04:50.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
                &quot;role&quot;: &quot;Technical Advisor&quot;,
                &quot;showInWebsite&quot;: true,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 9,
                        &quot;name&quot;: &quot;Technical Advisor&quot;,
                        &quot;guard_name&quot;: &quot;api&quot;,
                        &quot;allow_notification&quot;: false,
                        &quot;is_volunteer&quot;: false,
                        &quot;role_description&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                        &quot;created_at&quot;: &quot;2026-08-10T16:04:48.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2026-08-10T16:38:35.000000Z&quot;,
                        &quot;roleDescription&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                        &quot;pivot&quot;: {
                            &quot;model_type&quot;: &quot;App\\Models\\User&quot;,
                            &quot;model_id&quot;: 5,
                            &quot;role_id&quot;: 9
                        }
                    }
                ]
            }
        },
        {
            &quot;id&quot;: 4,
            &quot;title&quot;: &quot;Ingured&quot;,
            &quot;src&quot;: &quot;https://images.pexels.com/photos/7469274/pexels-photo-7469274.jpeg&quot;,
            &quot;alt&quot;: &quot;te&quot;,
            &quot;category&quot;: &quot;Volunteer Activities&quot;,
            &quot;desc&quot;: &quot;tset&quot;,
            &quot;status&quot;: &quot;Active&quot;,
            &quot;sort_order&quot;: 1,
            &quot;user_id&quot;: 5,
            &quot;created_at&quot;: &quot;2026-08-14T15:16:00.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-14T15:16:00.000000Z&quot;,
            &quot;sortOrder&quot;: 1,
            &quot;media&quot;: [],
            &quot;user&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Praveen Suthar&quot;,
                &quot;gender&quot;: &quot;Male&quot;,
                &quot;phone&quot;: &quot;+919783410487&quot;,
                &quot;bio&quot;: &quot;Providing technical guidance and managing Furrydom India&rsquo;s website, digital platforms, and technology initiatives to support the organization&rsquo;s operations, outreach, and mission.&quot;,
                &quot;avatar&quot;: &quot;http://127.0.0.1:8000/storage/1/1786380872_airbrush-20190909234508-01.webp&quot;,
                &quot;dob&quot;: &quot;2026-08-20&quot;,
                &quot;anniversary&quot;: &quot;2026-08-19&quot;,
                &quot;email&quot;: &quot;praveensuthar9553@gmail.com&quot;,
                &quot;email_verified_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
                &quot;show_in_website&quot;: true,
                &quot;status&quot;: &quot;Active&quot;,
                &quot;created_at&quot;: &quot;2026-08-10T16:04:50.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
                &quot;role&quot;: &quot;Technical Advisor&quot;,
                &quot;showInWebsite&quot;: true,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 9,
                        &quot;name&quot;: &quot;Technical Advisor&quot;,
                        &quot;guard_name&quot;: &quot;api&quot;,
                        &quot;allow_notification&quot;: false,
                        &quot;is_volunteer&quot;: false,
                        &quot;role_description&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                        &quot;created_at&quot;: &quot;2026-08-10T16:04:48.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2026-08-10T16:38:35.000000Z&quot;,
                        &quot;roleDescription&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                        &quot;pivot&quot;: {
                            &quot;model_type&quot;: &quot;App\\Models\\User&quot;,
                            &quot;model_id&quot;: 5,
                            &quot;role_id&quot;: 9
                        }
                    }
                ]
            }
        },
        {
            &quot;id&quot;: 5,
            &quot;title&quot;: &quot;Feeding Stray Dogs&quot;,
            &quot;src&quot;: &quot;https://images.pexels.com/photos/7008099/pexels-photo-7008099.jpeg&quot;,
            &quot;alt&quot;: &quot;Feeding stray dogs in Pune&quot;,
            &quot;category&quot;: &quot;Feeding Programs&quot;,
            &quot;desc&quot;: &quot;tstete&quot;,
            &quot;status&quot;: &quot;Active&quot;,
            &quot;sort_order&quot;: 1,
            &quot;user_id&quot;: 5,
            &quot;created_at&quot;: &quot;2026-08-14T15:16:58.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-14T15:16:58.000000Z&quot;,
            &quot;sortOrder&quot;: 1,
            &quot;media&quot;: [],
            &quot;user&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Praveen Suthar&quot;,
                &quot;gender&quot;: &quot;Male&quot;,
                &quot;phone&quot;: &quot;+919783410487&quot;,
                &quot;bio&quot;: &quot;Providing technical guidance and managing Furrydom India&rsquo;s website, digital platforms, and technology initiatives to support the organization&rsquo;s operations, outreach, and mission.&quot;,
                &quot;avatar&quot;: &quot;http://127.0.0.1:8000/storage/1/1786380872_airbrush-20190909234508-01.webp&quot;,
                &quot;dob&quot;: &quot;2026-08-20&quot;,
                &quot;anniversary&quot;: &quot;2026-08-19&quot;,
                &quot;email&quot;: &quot;praveensuthar9553@gmail.com&quot;,
                &quot;email_verified_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
                &quot;show_in_website&quot;: true,
                &quot;status&quot;: &quot;Active&quot;,
                &quot;created_at&quot;: &quot;2026-08-10T16:04:50.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
                &quot;role&quot;: &quot;Technical Advisor&quot;,
                &quot;showInWebsite&quot;: true,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 9,
                        &quot;name&quot;: &quot;Technical Advisor&quot;,
                        &quot;guard_name&quot;: &quot;api&quot;,
                        &quot;allow_notification&quot;: false,
                        &quot;is_volunteer&quot;: false,
                        &quot;role_description&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                        &quot;created_at&quot;: &quot;2026-08-10T16:04:48.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2026-08-10T16:38:35.000000Z&quot;,
                        &quot;roleDescription&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                        &quot;pivot&quot;: {
                            &quot;model_type&quot;: &quot;App\\Models\\User&quot;,
                            &quot;model_id&quot;: 5,
                            &quot;role_id&quot;: 9
                        }
                    }
                ]
            }
        },
        {
            &quot;id&quot;: 6,
            &quot;title&quot;: &quot;Feeding Stray Dogs&quot;,
            &quot;src&quot;: &quot;https://images.pexels.com/photos/16652369/pexels-photo-16652369.jpeg&quot;,
            &quot;alt&quot;: &quot;dummy image&quot;,
            &quot;category&quot;: &quot;Radium collar Initiative&quot;,
            &quot;desc&quot;: &quot;tetgsdf&quot;,
            &quot;status&quot;: &quot;Active&quot;,
            &quot;sort_order&quot;: 1,
            &quot;user_id&quot;: 5,
            &quot;created_at&quot;: &quot;2026-08-14T15:18:12.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-14T15:18:12.000000Z&quot;,
            &quot;sortOrder&quot;: 1,
            &quot;media&quot;: [],
            &quot;user&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Praveen Suthar&quot;,
                &quot;gender&quot;: &quot;Male&quot;,
                &quot;phone&quot;: &quot;+919783410487&quot;,
                &quot;bio&quot;: &quot;Providing technical guidance and managing Furrydom India&rsquo;s website, digital platforms, and technology initiatives to support the organization&rsquo;s operations, outreach, and mission.&quot;,
                &quot;avatar&quot;: &quot;http://127.0.0.1:8000/storage/1/1786380872_airbrush-20190909234508-01.webp&quot;,
                &quot;dob&quot;: &quot;2026-08-20&quot;,
                &quot;anniversary&quot;: &quot;2026-08-19&quot;,
                &quot;email&quot;: &quot;praveensuthar9553@gmail.com&quot;,
                &quot;email_verified_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
                &quot;show_in_website&quot;: true,
                &quot;status&quot;: &quot;Active&quot;,
                &quot;created_at&quot;: &quot;2026-08-10T16:04:50.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
                &quot;role&quot;: &quot;Technical Advisor&quot;,
                &quot;showInWebsite&quot;: true,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 9,
                        &quot;name&quot;: &quot;Technical Advisor&quot;,
                        &quot;guard_name&quot;: &quot;api&quot;,
                        &quot;allow_notification&quot;: false,
                        &quot;is_volunteer&quot;: false,
                        &quot;role_description&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                        &quot;created_at&quot;: &quot;2026-08-10T16:04:48.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2026-08-10T16:38:35.000000Z&quot;,
                        &quot;roleDescription&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                        &quot;pivot&quot;: {
                            &quot;model_type&quot;: &quot;App\\Models\\User&quot;,
                            &quot;model_id&quot;: 5,
                            &quot;role_id&quot;: 9
                        }
                    }
                ]
            }
        },
        {
            &quot;id&quot;: 7,
            &quot;title&quot;: &quot;my image&quot;,
            &quot;src&quot;: &quot;https://images.pexels.com/photos/16465614/pexels-photo-16465614.jpeg&quot;,
            &quot;alt&quot;: &quot;Feeding stray dogs in Pune&quot;,
            &quot;category&quot;: &quot;Auto Feeder Project&quot;,
            &quot;desc&quot;: &quot;tsersdf&quot;,
            &quot;status&quot;: &quot;Active&quot;,
            &quot;sort_order&quot;: 1,
            &quot;user_id&quot;: 5,
            &quot;created_at&quot;: &quot;2026-08-14T15:18:47.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-14T15:18:47.000000Z&quot;,
            &quot;sortOrder&quot;: 1,
            &quot;media&quot;: [],
            &quot;user&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Praveen Suthar&quot;,
                &quot;gender&quot;: &quot;Male&quot;,
                &quot;phone&quot;: &quot;+919783410487&quot;,
                &quot;bio&quot;: &quot;Providing technical guidance and managing Furrydom India&rsquo;s website, digital platforms, and technology initiatives to support the organization&rsquo;s operations, outreach, and mission.&quot;,
                &quot;avatar&quot;: &quot;http://127.0.0.1:8000/storage/1/1786380872_airbrush-20190909234508-01.webp&quot;,
                &quot;dob&quot;: &quot;2026-08-20&quot;,
                &quot;anniversary&quot;: &quot;2026-08-19&quot;,
                &quot;email&quot;: &quot;praveensuthar9553@gmail.com&quot;,
                &quot;email_verified_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
                &quot;show_in_website&quot;: true,
                &quot;status&quot;: &quot;Active&quot;,
                &quot;created_at&quot;: &quot;2026-08-10T16:04:50.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
                &quot;role&quot;: &quot;Technical Advisor&quot;,
                &quot;showInWebsite&quot;: true,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 9,
                        &quot;name&quot;: &quot;Technical Advisor&quot;,
                        &quot;guard_name&quot;: &quot;api&quot;,
                        &quot;allow_notification&quot;: false,
                        &quot;is_volunteer&quot;: false,
                        &quot;role_description&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                        &quot;created_at&quot;: &quot;2026-08-10T16:04:48.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2026-08-10T16:38:35.000000Z&quot;,
                        &quot;roleDescription&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                        &quot;pivot&quot;: {
                            &quot;model_type&quot;: &quot;App\\Models\\User&quot;,
                            &quot;model_id&quot;: 5,
                            &quot;role_id&quot;: 9
                        }
                    }
                ]
            }
        },
        {
            &quot;id&quot;: 8,
            &quot;title&quot;: &quot;Ingured&quot;,
            &quot;src&quot;: &quot;https://images.pexels.com/photos/36625705/pexels-photo-36625705.jpeg&quot;,
            &quot;alt&quot;: &quot;Feeding stray dogs in Pune&quot;,
            &quot;category&quot;: &quot;Volunteer Activities&quot;,
            &quot;desc&quot;: &quot;stest&quot;,
            &quot;status&quot;: &quot;Active&quot;,
            &quot;sort_order&quot;: 1,
            &quot;user_id&quot;: 5,
            &quot;created_at&quot;: &quot;2026-08-14T15:19:31.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-14T15:19:31.000000Z&quot;,
            &quot;sortOrder&quot;: 1,
            &quot;media&quot;: [],
            &quot;user&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Praveen Suthar&quot;,
                &quot;gender&quot;: &quot;Male&quot;,
                &quot;phone&quot;: &quot;+919783410487&quot;,
                &quot;bio&quot;: &quot;Providing technical guidance and managing Furrydom India&rsquo;s website, digital platforms, and technology initiatives to support the organization&rsquo;s operations, outreach, and mission.&quot;,
                &quot;avatar&quot;: &quot;http://127.0.0.1:8000/storage/1/1786380872_airbrush-20190909234508-01.webp&quot;,
                &quot;dob&quot;: &quot;2026-08-20&quot;,
                &quot;anniversary&quot;: &quot;2026-08-19&quot;,
                &quot;email&quot;: &quot;praveensuthar9553@gmail.com&quot;,
                &quot;email_verified_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
                &quot;show_in_website&quot;: true,
                &quot;status&quot;: &quot;Active&quot;,
                &quot;created_at&quot;: &quot;2026-08-10T16:04:50.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
                &quot;role&quot;: &quot;Technical Advisor&quot;,
                &quot;showInWebsite&quot;: true,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 9,
                        &quot;name&quot;: &quot;Technical Advisor&quot;,
                        &quot;guard_name&quot;: &quot;api&quot;,
                        &quot;allow_notification&quot;: false,
                        &quot;is_volunteer&quot;: false,
                        &quot;role_description&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                        &quot;created_at&quot;: &quot;2026-08-10T16:04:48.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2026-08-10T16:38:35.000000Z&quot;,
                        &quot;roleDescription&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                        &quot;pivot&quot;: {
                            &quot;model_type&quot;: &quot;App\\Models\\User&quot;,
                            &quot;model_id&quot;: 5,
                            &quot;role_id&quot;: 9
                        }
                    }
                ]
            }
        },
        {
            &quot;id&quot;: 9,
            &quot;title&quot;: &quot;Meals support&quot;,
            &quot;src&quot;: &quot;https://images.pexels.com/photos/25204930/pexels-photo-25204930.jpeg&quot;,
            &quot;alt&quot;: &quot;Meals support&quot;,
            &quot;category&quot;: &quot;Meals &amp; Ration Support&quot;,
            &quot;desc&quot;: &quot;Meals support&quot;,
            &quot;status&quot;: &quot;Active&quot;,
            &quot;sort_order&quot;: 1,
            &quot;user_id&quot;: 5,
            &quot;created_at&quot;: &quot;2026-08-14T15:21:01.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-14T15:21:01.000000Z&quot;,
            &quot;sortOrder&quot;: 1,
            &quot;media&quot;: [],
            &quot;user&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Praveen Suthar&quot;,
                &quot;gender&quot;: &quot;Male&quot;,
                &quot;phone&quot;: &quot;+919783410487&quot;,
                &quot;bio&quot;: &quot;Providing technical guidance and managing Furrydom India&rsquo;s website, digital platforms, and technology initiatives to support the organization&rsquo;s operations, outreach, and mission.&quot;,
                &quot;avatar&quot;: &quot;http://127.0.0.1:8000/storage/1/1786380872_airbrush-20190909234508-01.webp&quot;,
                &quot;dob&quot;: &quot;2026-08-20&quot;,
                &quot;anniversary&quot;: &quot;2026-08-19&quot;,
                &quot;email&quot;: &quot;praveensuthar9553@gmail.com&quot;,
                &quot;email_verified_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
                &quot;show_in_website&quot;: true,
                &quot;status&quot;: &quot;Active&quot;,
                &quot;created_at&quot;: &quot;2026-08-10T16:04:50.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
                &quot;role&quot;: &quot;Technical Advisor&quot;,
                &quot;showInWebsite&quot;: true,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 9,
                        &quot;name&quot;: &quot;Technical Advisor&quot;,
                        &quot;guard_name&quot;: &quot;api&quot;,
                        &quot;allow_notification&quot;: false,
                        &quot;is_volunteer&quot;: false,
                        &quot;role_description&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                        &quot;created_at&quot;: &quot;2026-08-10T16:04:48.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2026-08-10T16:38:35.000000Z&quot;,
                        &quot;roleDescription&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                        &quot;pivot&quot;: {
                            &quot;model_type&quot;: &quot;App\\Models\\User&quot;,
                            &quot;model_id&quot;: 5,
                            &quot;role_id&quot;: 9
                        }
                    }
                ]
            }
        },
        {
            &quot;id&quot;: 10,
            &quot;title&quot;: &quot;Meals support&quot;,
            &quot;src&quot;: &quot;https://images.pexels.com/photos/35247605/pexels-photo-35247605.jpeg&quot;,
            &quot;alt&quot;: &quot;https://images.pexels.com/photos/35247605/pexels-photo-35247605.jpeg&quot;,
            &quot;category&quot;: &quot;Meals &amp; Ration Support&quot;,
            &quot;desc&quot;: &quot;vse&quot;,
            &quot;status&quot;: &quot;Active&quot;,
            &quot;sort_order&quot;: 1,
            &quot;user_id&quot;: 5,
            &quot;created_at&quot;: &quot;2026-08-14T15:21:51.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-14T15:21:51.000000Z&quot;,
            &quot;sortOrder&quot;: 1,
            &quot;media&quot;: [],
            &quot;user&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Praveen Suthar&quot;,
                &quot;gender&quot;: &quot;Male&quot;,
                &quot;phone&quot;: &quot;+919783410487&quot;,
                &quot;bio&quot;: &quot;Providing technical guidance and managing Furrydom India&rsquo;s website, digital platforms, and technology initiatives to support the organization&rsquo;s operations, outreach, and mission.&quot;,
                &quot;avatar&quot;: &quot;http://127.0.0.1:8000/storage/1/1786380872_airbrush-20190909234508-01.webp&quot;,
                &quot;dob&quot;: &quot;2026-08-20&quot;,
                &quot;anniversary&quot;: &quot;2026-08-19&quot;,
                &quot;email&quot;: &quot;praveensuthar9553@gmail.com&quot;,
                &quot;email_verified_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
                &quot;show_in_website&quot;: true,
                &quot;status&quot;: &quot;Active&quot;,
                &quot;created_at&quot;: &quot;2026-08-10T16:04:50.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
                &quot;role&quot;: &quot;Technical Advisor&quot;,
                &quot;showInWebsite&quot;: true,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 9,
                        &quot;name&quot;: &quot;Technical Advisor&quot;,
                        &quot;guard_name&quot;: &quot;api&quot;,
                        &quot;allow_notification&quot;: false,
                        &quot;is_volunteer&quot;: false,
                        &quot;role_description&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                        &quot;created_at&quot;: &quot;2026-08-10T16:04:48.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2026-08-10T16:38:35.000000Z&quot;,
                        &quot;roleDescription&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                        &quot;pivot&quot;: {
                            &quot;model_type&quot;: &quot;App\\Models\\User&quot;,
                            &quot;model_id&quot;: 5,
                            &quot;role_id&quot;: 9
                        }
                    }
                ]
            }
        },
        {
            &quot;id&quot;: 11,
            &quot;title&quot;: &quot;child&quot;,
            &quot;src&quot;: &quot;https://images.pexels.com/photos/37249876/pexels-photo-37249876.jpeg&quot;,
            &quot;alt&quot;: &quot;Feeding stray dogs in Pune&quot;,
            &quot;category&quot;: &quot;Child Education Program&quot;,
            &quot;desc&quot;: &quot;child education&quot;,
            &quot;status&quot;: &quot;Active&quot;,
            &quot;sort_order&quot;: 1,
            &quot;user_id&quot;: 5,
            &quot;created_at&quot;: &quot;2026-08-14T16:44:16.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-14T16:44:16.000000Z&quot;,
            &quot;sortOrder&quot;: 1,
            &quot;media&quot;: [],
            &quot;user&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Praveen Suthar&quot;,
                &quot;gender&quot;: &quot;Male&quot;,
                &quot;phone&quot;: &quot;+919783410487&quot;,
                &quot;bio&quot;: &quot;Providing technical guidance and managing Furrydom India&rsquo;s website, digital platforms, and technology initiatives to support the organization&rsquo;s operations, outreach, and mission.&quot;,
                &quot;avatar&quot;: &quot;http://127.0.0.1:8000/storage/1/1786380872_airbrush-20190909234508-01.webp&quot;,
                &quot;dob&quot;: &quot;2026-08-20&quot;,
                &quot;anniversary&quot;: &quot;2026-08-19&quot;,
                &quot;email&quot;: &quot;praveensuthar9553@gmail.com&quot;,
                &quot;email_verified_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
                &quot;show_in_website&quot;: true,
                &quot;status&quot;: &quot;Active&quot;,
                &quot;created_at&quot;: &quot;2026-08-10T16:04:50.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
                &quot;role&quot;: &quot;Technical Advisor&quot;,
                &quot;showInWebsite&quot;: true,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 9,
                        &quot;name&quot;: &quot;Technical Advisor&quot;,
                        &quot;guard_name&quot;: &quot;api&quot;,
                        &quot;allow_notification&quot;: false,
                        &quot;is_volunteer&quot;: false,
                        &quot;role_description&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                        &quot;created_at&quot;: &quot;2026-08-10T16:04:48.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2026-08-10T16:38:35.000000Z&quot;,
                        &quot;roleDescription&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                        &quot;pivot&quot;: {
                            &quot;model_type&quot;: &quot;App\\Models\\User&quot;,
                            &quot;model_id&quot;: 5,
                            &quot;role_id&quot;: 9
                        }
                    }
                ]
            }
        },
        {
            &quot;id&quot;: 12,
            &quot;title&quot;: &quot;child school&quot;,
            &quot;src&quot;: &quot;https://images.pexels.com/photos/18012456/pexels-photo-18012456.jpeg&quot;,
            &quot;alt&quot;: &quot;child school&quot;,
            &quot;category&quot;: &quot;Child Education Program&quot;,
            &quot;desc&quot;: &quot;child school&quot;,
            &quot;status&quot;: &quot;Active&quot;,
            &quot;sort_order&quot;: 1,
            &quot;user_id&quot;: 5,
            &quot;created_at&quot;: &quot;2026-08-14T16:45:14.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-08-14T16:45:14.000000Z&quot;,
            &quot;sortOrder&quot;: 1,
            &quot;media&quot;: [],
            &quot;user&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Praveen Suthar&quot;,
                &quot;gender&quot;: &quot;Male&quot;,
                &quot;phone&quot;: &quot;+919783410487&quot;,
                &quot;bio&quot;: &quot;Providing technical guidance and managing Furrydom India&rsquo;s website, digital platforms, and technology initiatives to support the organization&rsquo;s operations, outreach, and mission.&quot;,
                &quot;avatar&quot;: &quot;http://127.0.0.1:8000/storage/1/1786380872_airbrush-20190909234508-01.webp&quot;,
                &quot;dob&quot;: &quot;2026-08-20&quot;,
                &quot;anniversary&quot;: &quot;2026-08-19&quot;,
                &quot;email&quot;: &quot;praveensuthar9553@gmail.com&quot;,
                &quot;email_verified_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
                &quot;show_in_website&quot;: true,
                &quot;status&quot;: &quot;Active&quot;,
                &quot;created_at&quot;: &quot;2026-08-10T16:04:50.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-08-15T11:52:58.000000Z&quot;,
                &quot;role&quot;: &quot;Technical Advisor&quot;,
                &quot;showInWebsite&quot;: true,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 9,
                        &quot;name&quot;: &quot;Technical Advisor&quot;,
                        &quot;guard_name&quot;: &quot;api&quot;,
                        &quot;allow_notification&quot;: false,
                        &quot;is_volunteer&quot;: false,
                        &quot;role_description&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                        &quot;created_at&quot;: &quot;2026-08-10T16:04:48.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2026-08-10T16:38:35.000000Z&quot;,
                        &quot;roleDescription&quot;: &quot;Technology &amp; Platform Advisor&quot;,
                        &quot;pivot&quot;: {
                            &quot;model_type&quot;: &quot;App\\Models\\User&quot;,
                            &quot;model_id&quot;: 5,
                            &quot;role_id&quot;: 9
                        }
                    }
                ]
            }
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-media" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-media"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-media"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-media" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-media">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-media" data-method="GET"
      data-path="api/media"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-media', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-media"
                    onclick="tryItOut('GETapi-media');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-media"
                    onclick="cancelTryOut('GETapi-media');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-media"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/media</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-media"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-media"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="media-gallery-GETapi-media--id-">GET api/media/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-media--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/media/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/media/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-media--id-">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-media--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-media--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-media--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-media--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-media--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-media--id-" data-method="GET"
      data-path="api/media/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-media--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-media--id-"
                    onclick="tryItOut('GETapi-media--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-media--id-"
                    onclick="cancelTryOut('GETapi-media--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-media--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/media/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-media--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-media--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-media--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the medium. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="media-gallery-POSTapi-galleries">POST api/galleries</h2>

<p>
</p>



<span id="example-requests-POSTapi-galleries">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/galleries" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "title=bngz"\
    --form "src=architecto"\
    --form "alt=architecto"\
    --form "category=architecto"\
    --form "desc=n"\
    --form "status=Inactive"\
    --form "sortOrder=16"\
    --form "file=@/tmp/phpeohiqqoe4sl99Ylzrle" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/galleries"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('title', 'bngz');
body.append('src', 'architecto');
body.append('alt', 'architecto');
body.append('category', 'architecto');
body.append('desc', 'n');
body.append('status', 'Inactive');
body.append('sortOrder', '16');
body.append('file', document.querySelector('input[name="file"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-galleries">
</span>
<span id="execution-results-POSTapi-galleries" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-galleries"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-galleries"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-galleries" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-galleries">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-galleries" data-method="POST"
      data-path="api/galleries"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-galleries', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-galleries"
                    onclick="tryItOut('POSTapi-galleries');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-galleries"
                    onclick="cancelTryOut('POSTapi-galleries');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-galleries"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/galleries</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-galleries"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-galleries"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="POSTapi-galleries"
               value="bngz"
               data-component="body">
    <br>
<p>Must be at least 2 characters. Example: <code>bngz</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>src</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="src"                data-endpoint="POSTapi-galleries"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>alt</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="alt"                data-endpoint="POSTapi-galleries"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>category</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="category"                data-endpoint="POSTapi-galleries"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>desc</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="desc"                data-endpoint="POSTapi-galleries"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 300 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="POSTapi-galleries"
               value="Inactive"
               data-component="body">
    <br>
<p>Example: <code>Inactive</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>Active</code></li> <li><code>Inactive</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>sortOrder</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="sortOrder"                data-endpoint="POSTapi-galleries"
               value="16"
               data-component="body">
    <br>
<p>Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>file</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="file"                data-endpoint="POSTapi-galleries"
               value=""
               data-component="body">
    <br>
<p>Must be a file. Must be an image. Must not be greater than 10240 kilobytes. Example: <code>/tmp/phpeohiqqoe4sl99Ylzrle</code></p>
        </div>
        </form>

                    <h2 id="media-gallery-PUTapi-galleries--id-">PUT api/galleries/{id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-galleries--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/galleries/1" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "title=bngz"\
    --form "src=architecto"\
    --form "alt=architecto"\
    --form "category=architecto"\
    --form "desc=n"\
    --form "status=Inactive"\
    --form "sortOrder=16"\
    --form "file=@/tmp/phpotmi213c27hk6h4VFSu" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/galleries/1"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('title', 'bngz');
body.append('src', 'architecto');
body.append('alt', 'architecto');
body.append('category', 'architecto');
body.append('desc', 'n');
body.append('status', 'Inactive');
body.append('sortOrder', '16');
body.append('file', document.querySelector('input[name="file"]').files[0]);

fetch(url, {
    method: "PUT",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-galleries--id-">
</span>
<span id="execution-results-PUTapi-galleries--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-galleries--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-galleries--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-galleries--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-galleries--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-galleries--id-" data-method="PUT"
      data-path="api/galleries/{id}"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-galleries--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-galleries--id-"
                    onclick="tryItOut('PUTapi-galleries--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-galleries--id-"
                    onclick="cancelTryOut('PUTapi-galleries--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-galleries--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/galleries/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-galleries--id-"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-galleries--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-galleries--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the gallery. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="PUTapi-galleries--id-"
               value="bngz"
               data-component="body">
    <br>
<p>Must be at least 2 characters. Example: <code>bngz</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>src</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="src"                data-endpoint="PUTapi-galleries--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>alt</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="alt"                data-endpoint="PUTapi-galleries--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>category</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="category"                data-endpoint="PUTapi-galleries--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>desc</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="desc"                data-endpoint="PUTapi-galleries--id-"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 300 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PUTapi-galleries--id-"
               value="Inactive"
               data-component="body">
    <br>
<p>Example: <code>Inactive</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>Active</code></li> <li><code>Inactive</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>sortOrder</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="sortOrder"                data-endpoint="PUTapi-galleries--id-"
               value="16"
               data-component="body">
    <br>
<p>Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>file</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="file"                data-endpoint="PUTapi-galleries--id-"
               value=""
               data-component="body">
    <br>
<p>Must be a file. Must be an image. Must not be greater than 10240 kilobytes. Example: <code>/tmp/phpotmi213c27hk6h4VFSu</code></p>
        </div>
        </form>

                    <h2 id="media-gallery-DELETEapi-galleries--id-">DELETE api/galleries/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-galleries--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/galleries/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/galleries/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-galleries--id-">
</span>
<span id="execution-results-DELETEapi-galleries--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-galleries--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-galleries--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-galleries--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-galleries--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-galleries--id-" data-method="DELETE"
      data-path="api/galleries/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-galleries--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-galleries--id-"
                    onclick="tryItOut('DELETEapi-galleries--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-galleries--id-"
                    onclick="cancelTryOut('DELETEapi-galleries--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-galleries--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/galleries/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-galleries--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-galleries--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-galleries--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the gallery. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="media-gallery-POSTapi-media">POST api/media</h2>

<p>
</p>



<span id="example-requests-POSTapi-media">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/media" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "title=bngz"\
    --form "src=architecto"\
    --form "alt=architecto"\
    --form "category=architecto"\
    --form "desc=n"\
    --form "status=Active"\
    --form "sortOrder=16"\
    --form "file=@/tmp/phpjrep9kqpqcr2dgsTPZW" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/media"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('title', 'bngz');
body.append('src', 'architecto');
body.append('alt', 'architecto');
body.append('category', 'architecto');
body.append('desc', 'n');
body.append('status', 'Active');
body.append('sortOrder', '16');
body.append('file', document.querySelector('input[name="file"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-media">
</span>
<span id="execution-results-POSTapi-media" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-media"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-media"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-media" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-media">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-media" data-method="POST"
      data-path="api/media"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-media', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-media"
                    onclick="tryItOut('POSTapi-media');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-media"
                    onclick="cancelTryOut('POSTapi-media');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-media"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/media</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-media"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-media"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="POSTapi-media"
               value="bngz"
               data-component="body">
    <br>
<p>Must be at least 2 characters. Example: <code>bngz</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>src</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="src"                data-endpoint="POSTapi-media"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>alt</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="alt"                data-endpoint="POSTapi-media"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>category</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="category"                data-endpoint="POSTapi-media"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>desc</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="desc"                data-endpoint="POSTapi-media"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 300 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="POSTapi-media"
               value="Active"
               data-component="body">
    <br>
<p>Example: <code>Active</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>Active</code></li> <li><code>Inactive</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>sortOrder</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="sortOrder"                data-endpoint="POSTapi-media"
               value="16"
               data-component="body">
    <br>
<p>Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>file</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="file"                data-endpoint="POSTapi-media"
               value=""
               data-component="body">
    <br>
<p>Must be a file. Must be an image. Must not be greater than 10240 kilobytes. Example: <code>/tmp/phpjrep9kqpqcr2dgsTPZW</code></p>
        </div>
        </form>

                    <h2 id="media-gallery-PUTapi-media--id-">PUT api/media/{id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-media--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/media/architecto" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "title=bngz"\
    --form "src=architecto"\
    --form "alt=architecto"\
    --form "category=architecto"\
    --form "desc=n"\
    --form "status=Inactive"\
    --form "sortOrder=16"\
    --form "file=@/tmp/phpe2qsp607qk75f1jNFgM" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/media/architecto"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('title', 'bngz');
body.append('src', 'architecto');
body.append('alt', 'architecto');
body.append('category', 'architecto');
body.append('desc', 'n');
body.append('status', 'Inactive');
body.append('sortOrder', '16');
body.append('file', document.querySelector('input[name="file"]').files[0]);

fetch(url, {
    method: "PUT",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-media--id-">
</span>
<span id="execution-results-PUTapi-media--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-media--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-media--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-media--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-media--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-media--id-" data-method="PUT"
      data-path="api/media/{id}"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-media--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-media--id-"
                    onclick="tryItOut('PUTapi-media--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-media--id-"
                    onclick="cancelTryOut('PUTapi-media--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-media--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/media/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-media--id-"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-media--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-media--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the medium. Example: <code>architecto</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="PUTapi-media--id-"
               value="bngz"
               data-component="body">
    <br>
<p>Must be at least 2 characters. Example: <code>bngz</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>src</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="src"                data-endpoint="PUTapi-media--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>alt</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="alt"                data-endpoint="PUTapi-media--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>category</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="category"                data-endpoint="PUTapi-media--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>desc</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="desc"                data-endpoint="PUTapi-media--id-"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 300 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PUTapi-media--id-"
               value="Inactive"
               data-component="body">
    <br>
<p>Example: <code>Inactive</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>Active</code></li> <li><code>Inactive</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>sortOrder</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="sortOrder"                data-endpoint="PUTapi-media--id-"
               value="16"
               data-component="body">
    <br>
<p>Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>file</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="file"                data-endpoint="PUTapi-media--id-"
               value=""
               data-component="body">
    <br>
<p>Must be a file. Must be an image. Must not be greater than 10240 kilobytes. Example: <code>/tmp/phpe2qsp607qk75f1jNFgM</code></p>
        </div>
        </form>

                    <h2 id="media-gallery-DELETEapi-media--id-">DELETE api/media/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-media--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/media/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/media/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-media--id-">
</span>
<span id="execution-results-DELETEapi-media--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-media--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-media--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-media--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-media--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-media--id-" data-method="DELETE"
      data-path="api/media/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-media--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-media--id-"
                    onclick="tryItOut('DELETEapi-media--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-media--id-"
                    onclick="cancelTryOut('DELETEapi-media--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-media--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/media/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-media--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-media--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-media--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the medium. Example: <code>architecto</code></p>
            </div>
                    </form>

                <h1 id="notifications">Notifications</h1>

    <p>APIs for user notifications, unread badges, and marking notifications as read.</p>

                                <h2 id="notifications-GETapi-notifications">GET api/notifications</h2>

<p>
</p>



<span id="example-requests-GETapi-notifications">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/notifications" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/notifications"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-notifications">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-notifications" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-notifications"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-notifications"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-notifications" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-notifications">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-notifications" data-method="GET"
      data-path="api/notifications"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-notifications', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-notifications"
                    onclick="tryItOut('GETapi-notifications');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-notifications"
                    onclick="cancelTryOut('GETapi-notifications');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-notifications"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/notifications</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-notifications"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-notifications"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="notifications-PUTapi-notifications-read-all">PUT api/notifications/read-all</h2>

<p>
</p>



<span id="example-requests-PUTapi-notifications-read-all">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/notifications/read-all" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/notifications/read-all"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-notifications-read-all">
</span>
<span id="execution-results-PUTapi-notifications-read-all" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-notifications-read-all"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-notifications-read-all"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-notifications-read-all" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-notifications-read-all">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-notifications-read-all" data-method="PUT"
      data-path="api/notifications/read-all"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-notifications-read-all', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-notifications-read-all"
                    onclick="tryItOut('PUTapi-notifications-read-all');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-notifications-read-all"
                    onclick="cancelTryOut('PUTapi-notifications-read-all');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-notifications-read-all"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/notifications/read-all</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-notifications-read-all"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-notifications-read-all"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="notifications-PUTapi-notifications--id--read">PUT api/notifications/{id}/read</h2>

<p>
</p>



<span id="example-requests-PUTapi-notifications--id--read">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/notifications/architecto/read" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/notifications/architecto/read"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-notifications--id--read">
</span>
<span id="execution-results-PUTapi-notifications--id--read" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-notifications--id--read"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-notifications--id--read"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-notifications--id--read" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-notifications--id--read">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-notifications--id--read" data-method="PUT"
      data-path="api/notifications/{id}/read"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-notifications--id--read', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-notifications--id--read"
                    onclick="tryItOut('PUTapi-notifications--id--read');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-notifications--id--read"
                    onclick="cancelTryOut('PUTapi-notifications--id--read');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-notifications--id--read"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/notifications/{id}/read</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-notifications--id--read"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-notifications--id--read"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-notifications--id--read"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the notification. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="notifications-DELETEapi-notifications--id-">DELETE api/notifications/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-notifications--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/notifications/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/notifications/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-notifications--id-">
</span>
<span id="execution-results-DELETEapi-notifications--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-notifications--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-notifications--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-notifications--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-notifications--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-notifications--id-" data-method="DELETE"
      data-path="api/notifications/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-notifications--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-notifications--id-"
                    onclick="tryItOut('DELETEapi-notifications--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-notifications--id-"
                    onclick="cancelTryOut('DELETEapi-notifications--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-notifications--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/notifications/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-notifications--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-notifications--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-notifications--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the notification. Example: <code>architecto</code></p>
            </div>
                    </form>

                <h1 id="contact-enquiries">Contact Enquiries</h1>

    <p>APIs for submitting public contact forms and managing inquiry messages.</p>

                                <h2 id="contact-enquiries-POSTapi-contacts">POST api/contacts</h2>

<p>
</p>



<span id="example-requests-POSTapi-contacts">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/contacts" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"bngz\",
    \"email\": \"rempel.chadrick@example.org\",
    \"phone\": \"architecto\",
    \"subject\": \"architecto\",
    \"message\": \"architecto\",
    \"recaptcha_token\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/contacts"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "bngz",
    "email": "rempel.chadrick@example.org",
    "phone": "architecto",
    "subject": "architecto",
    "message": "architecto",
    "recaptcha_token": "architecto"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-contacts">
</span>
<span id="execution-results-POSTapi-contacts" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-contacts"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-contacts"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-contacts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-contacts">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-contacts" data-method="POST"
      data-path="api/contacts"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-contacts', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-contacts"
                    onclick="tryItOut('POSTapi-contacts');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-contacts"
                    onclick="cancelTryOut('POSTapi-contacts');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-contacts"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/contacts</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-contacts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-contacts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-contacts"
               value="bngz"
               data-component="body">
    <br>
<p>Must be at least 2 characters. Example: <code>bngz</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-contacts"
               value="rempel.chadrick@example.org"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>rempel.chadrick@example.org</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="POSTapi-contacts"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>subject</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="subject"                data-endpoint="POSTapi-contacts"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>message</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="message"                data-endpoint="POSTapi-contacts"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>recaptcha_token</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="recaptcha_token"                data-endpoint="POSTapi-contacts"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="contact-enquiries-GETapi-contacts">GET api/contacts</h2>

<p>
</p>



<span id="example-requests-GETapi-contacts">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/contacts" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/contacts"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-contacts">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-contacts" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-contacts"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-contacts"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-contacts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-contacts">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-contacts" data-method="GET"
      data-path="api/contacts"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-contacts', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-contacts"
                    onclick="tryItOut('GETapi-contacts');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-contacts"
                    onclick="cancelTryOut('GETapi-contacts');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-contacts"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/contacts</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-contacts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-contacts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="contact-enquiries-GETapi-contacts--id-">GET api/contacts/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-contacts--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/contacts/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/contacts/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-contacts--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-contacts--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-contacts--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-contacts--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-contacts--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-contacts--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-contacts--id-" data-method="GET"
      data-path="api/contacts/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-contacts--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-contacts--id-"
                    onclick="tryItOut('GETapi-contacts--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-contacts--id-"
                    onclick="cancelTryOut('GETapi-contacts--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-contacts--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/contacts/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-contacts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-contacts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-contacts--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the contact. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="contact-enquiries-PUTapi-contacts--id-">PUT api/contacts/{id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-contacts--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/contacts/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"status\": \"Unread\",
    \"adminNotes\": \"architecto\",
    \"admin_notes\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/contacts/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "status": "Unread",
    "adminNotes": "architecto",
    "admin_notes": "architecto"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-contacts--id-">
</span>
<span id="execution-results-PUTapi-contacts--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-contacts--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-contacts--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-contacts--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-contacts--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-contacts--id-" data-method="PUT"
      data-path="api/contacts/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-contacts--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-contacts--id-"
                    onclick="tryItOut('PUTapi-contacts--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-contacts--id-"
                    onclick="cancelTryOut('PUTapi-contacts--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-contacts--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/contacts/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-contacts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-contacts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-contacts--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the contact. Example: <code>architecto</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PUTapi-contacts--id-"
               value="Unread"
               data-component="body">
    <br>
<p>Example: <code>Unread</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>Unread</code></li> <li><code>Read</code></li> <li><code>Replied</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>adminNotes</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="adminNotes"                data-endpoint="PUTapi-contacts--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>admin_notes</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="admin_notes"                data-endpoint="PUTapi-contacts--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="contact-enquiries-DELETEapi-contacts--id-">DELETE api/contacts/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-contacts--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/contacts/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/contacts/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-contacts--id-">
</span>
<span id="execution-results-DELETEapi-contacts--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-contacts--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-contacts--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-contacts--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-contacts--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-contacts--id-" data-method="DELETE"
      data-path="api/contacts/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-contacts--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-contacts--id-"
                    onclick="tryItOut('DELETEapi-contacts--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-contacts--id-"
                    onclick="cancelTryOut('DELETEapi-contacts--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-contacts--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/contacts/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-contacts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-contacts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-contacts--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the contact. Example: <code>architecto</code></p>
            </div>
                    </form>

                <h1 id="dashboard-analytics">Dashboard & Analytics</h1>

    <p>APIs for administrative KPI summaries, rescue statistics, and donation analytics.</p>

                                <h2 id="dashboard-analytics-GETapi-dashboard-stats">Get comprehensive dashboard statistics.</h2>

<p>
</p>



<span id="example-requests-GETapi-dashboard-stats">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/dashboard/stats" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/dashboard/stats"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-dashboard-stats">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-dashboard-stats" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-dashboard-stats"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-dashboard-stats"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-dashboard-stats" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-dashboard-stats">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-dashboard-stats" data-method="GET"
      data-path="api/dashboard/stats"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-dashboard-stats', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-dashboard-stats"
                    onclick="tryItOut('GETapi-dashboard-stats');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-dashboard-stats"
                    onclick="cancelTryOut('GETapi-dashboard-stats');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-dashboard-stats"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/dashboard/stats</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-dashboard-stats"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-dashboard-stats"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="system-settings">System Settings</h1>

    <p>APIs for site configuration, payment gateway keys, and general settings.</p>

                                <h2 id="system-settings-GETapi-settings-public">GET api/settings/public</h2>

<p>
</p>



<span id="example-requests-GETapi-settings-public">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/settings/public" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/settings/public"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-settings-public">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: true,
    &quot;message&quot;: &quot;Public settings retrieved successfully.&quot;,
    &quot;data&quot;: {
        &quot;general&quot;: {
            &quot;site_name&quot;: &quot;Furrydom India&quot;,
            &quot;site_slogan&quot;: &quot;All Lives Matter&quot;,
            &quot;contact_email&quot;: &quot;care@furrydom.org&quot;,
            &quot;contact_phone&quot;: &quot;+91 98220 14785&quot;,
            &quot;site_address&quot;: &quot;Plot 14, Baner Road,\nPune, Maharashtra 411045&quot;,
            &quot;logo_url&quot;: &quot;http://127.0.0.1:8000/storage/3/1786789655_furrydom-logo.webp&quot;,
            &quot;favicon_url&quot;: &quot;/favicon.ico&quot;,
            &quot;signature_url&quot;: &quot;http://127.0.0.1:8000/storage/4/1786789854_signature-freedom.webp&quot;
        },
        &quot;social&quot;: {
            &quot;facebook_url&quot;: &quot;https://facebook.com&quot;,
            &quot;instagram_url&quot;: &quot;https://instagram.com&quot;,
            &quot;twitter_url&quot;: &quot;https://twitter.com&quot;,
            &quot;youtube_url&quot;: &quot;https://youtube.com&quot;,
            &quot;linkedin_url&quot;: &quot;https://linkedin.com&quot;,
            &quot;whatsapp_group_url&quot;: &quot;https://chat.whatsapp.com/demo&quot;,
            &quot;google_maps_embed&quot;: &quot;&quot;
        },
        &quot;seo&quot;: {
            &quot;website_name&quot;: &quot;Furrydom India&quot;,
            &quot;meta_title&quot;: &quot;Furrydom India &mdash; Animal Welfare, Child Development &amp; Relief Foundation&quot;,
            &quot;meta_description&quot;: &quot;Furrydom is a registered non-profit organization dedicated to animal rescue, medical treatment, stray feeding drives, and child education programs.&quot;,
            &quot;og_image&quot;: &quot;/assets/images/herosection.gif&quot;,
            &quot;favicon&quot;: &quot;/favicon.ico&quot;,
            &quot;google_analytics_id&quot;: null,
            &quot;google_search_console&quot;: null,
            &quot;robots&quot;: &quot;index, follow&quot;
        }
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-settings-public" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-settings-public"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-settings-public"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-settings-public" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-settings-public">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-settings-public" data-method="GET"
      data-path="api/settings/public"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-settings-public', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-settings-public"
                    onclick="tryItOut('GETapi-settings-public');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-settings-public"
                    onclick="cancelTryOut('GETapi-settings-public');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-settings-public"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/settings/public</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-settings-public"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-settings-public"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="system-settings-GETapi-settings">GET api/settings</h2>

<p>
</p>



<span id="example-requests-GETapi-settings">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/settings" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/settings"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-settings">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-settings" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-settings"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-settings"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-settings" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-settings">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-settings" data-method="GET"
      data-path="api/settings"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-settings', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-settings"
                    onclick="tryItOut('GETapi-settings');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-settings"
                    onclick="cancelTryOut('GETapi-settings');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-settings"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/settings</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-settings"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-settings"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="system-settings-PUTapi-settings">PUT api/settings</h2>

<p>
</p>



<span id="example-requests-PUTapi-settings">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/settings" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/settings"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-settings">
</span>
<span id="execution-results-PUTapi-settings" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-settings"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-settings"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-settings" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-settings">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-settings" data-method="PUT"
      data-path="api/settings"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-settings', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-settings"
                    onclick="tryItOut('PUTapi-settings');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-settings"
                    onclick="cancelTryOut('PUTapi-settings');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-settings"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/settings</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-settings"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-settings"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>notification</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="notification"                data-endpoint="PUTapi-settings"
               value=""
               data-component="body">
    <br>

        </div>
        </form>

                <h1 id="general-endpoints">General Endpoints</h1>

    

                                <h2 id="general-endpoints-GETapi-sitemap-xml">Generate dynamic sitemap XML containing static pages, blogs, and active campaigns.</h2>

<p>
</p>



<span id="example-requests-GETapi-sitemap-xml">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/sitemap.xml" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/sitemap.xml"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-sitemap-xml">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: text/xml; charset=utf-8
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">&lt;?xml version=&quot;1.0&quot; encoding=&quot;UTF-8&quot;?&gt;&lt;urlset xmlns=&quot;http://www.sitemaps.org/schemas/sitemap/0.9&quot;&gt;
    &lt;url&gt;
        &lt;loc&gt;https://furrydom-front.vercel.app/&lt;/loc&gt;
        &lt;changefreq&gt;daily&lt;/changefreq&gt;
        &lt;priority&gt;1.0&lt;/priority&gt;
    &lt;/url&gt;
    &lt;url&gt;
        &lt;loc&gt;https://furrydom-front.vercel.app/about&lt;/loc&gt;
        &lt;changefreq&gt;monthly&lt;/changefreq&gt;
        &lt;priority&gt;0.8&lt;/priority&gt;
    &lt;/url&gt;
    &lt;url&gt;
        &lt;loc&gt;https://furrydom-front.vercel.app/causes&lt;/loc&gt;
        &lt;changefreq&gt;daily&lt;/changefreq&gt;
        &lt;priority&gt;0.9&lt;/priority&gt;
    &lt;/url&gt;
    &lt;url&gt;
        &lt;loc&gt;https://furrydom-front.vercel.app/ways-to-give&lt;/loc&gt;
        &lt;changefreq&gt;weekly&lt;/changefreq&gt;
        &lt;priority&gt;0.9&lt;/priority&gt;
    &lt;/url&gt;
    &lt;url&gt;
        &lt;loc&gt;https://furrydom-front.vercel.app/volunteer&lt;/loc&gt;
        &lt;changefreq&gt;monthly&lt;/changefreq&gt;
        &lt;priority&gt;0.8&lt;/priority&gt;
    &lt;/url&gt;
    &lt;url&gt;
        &lt;loc&gt;https://furrydom-front.vercel.app/blog&lt;/loc&gt;
        &lt;changefreq&gt;daily&lt;/changefreq&gt;
        &lt;priority&gt;0.9&lt;/priority&gt;
    &lt;/url&gt;
    &lt;url&gt;
        &lt;loc&gt;https://furrydom-front.vercel.app/contact&lt;/loc&gt;
        &lt;changefreq&gt;monthly&lt;/changefreq&gt;
        &lt;priority&gt;0.7&lt;/priority&gt;
    &lt;/url&gt;
    &lt;url&gt;
        &lt;loc&gt;https://furrydom-front.vercel.app/gallery&lt;/loc&gt;
        &lt;changefreq&gt;weekly&lt;/changefreq&gt;
        &lt;priority&gt;0.7&lt;/priority&gt;
    &lt;/url&gt;
    &lt;url&gt;
        &lt;loc&gt;https://furrydom-front.vercel.app/report-injured&lt;/loc&gt;
        &lt;changefreq&gt;weekly&lt;/changefreq&gt;
        &lt;priority&gt;0.9&lt;/priority&gt;
    &lt;/url&gt;
    &lt;url&gt;
        &lt;loc&gt;https://furrydom-front.vercel.app/privacy-policy&lt;/loc&gt;
        &lt;changefreq&gt;yearly&lt;/changefreq&gt;
        &lt;priority&gt;0.3&lt;/priority&gt;
    &lt;/url&gt;
    &lt;url&gt;
        &lt;loc&gt;https://furrydom-front.vercel.app/terms-of-use&lt;/loc&gt;
        &lt;changefreq&gt;yearly&lt;/changefreq&gt;
        &lt;priority&gt;0.3&lt;/priority&gt;
    &lt;/url&gt;

        &lt;url&gt;
        &lt;loc&gt;https://furrydom-front.vercel.app/blog/10-ways-help-stray-animals-neighborhood&lt;/loc&gt;
        &lt;lastmod&gt;2026-08-14T17:57:26+00:00&lt;/lastmod&gt;
        &lt;changefreq&gt;weekly&lt;/changefreq&gt;
        &lt;priority&gt;0.8&lt;/priority&gt;
    &lt;/url&gt;
        &lt;url&gt;
        &lt;loc&gt;https://furrydom-front.vercel.app/blog/understanding-animal-rescue-what-happens-after-call&lt;/loc&gt;
        &lt;lastmod&gt;2026-08-14T17:57:26+00:00&lt;/lastmod&gt;
        &lt;changefreq&gt;weekly&lt;/changefreq&gt;
        &lt;priority&gt;0.8&lt;/priority&gt;
    &lt;/url&gt;
        &lt;url&gt;
        &lt;loc&gt;https://furrydom-front.vercel.app/blog/why-daily-feeding-drives-matter-street-dogs&lt;/loc&gt;
        &lt;lastmod&gt;2026-08-14T18:08:27+00:00&lt;/lastmod&gt;
        &lt;changefreq&gt;weekly&lt;/changefreq&gt;
        &lt;priority&gt;0.8&lt;/priority&gt;
    &lt;/url&gt;
    
        &lt;url&gt;
        &lt;loc&gt;https://furrydom-front.vercel.app/causes/buy-animal-ambulance&lt;/loc&gt;
        &lt;lastmod&gt;2026-08-14T17:57:26+00:00&lt;/lastmod&gt;
        &lt;changefreq&gt;daily&lt;/changefreq&gt;
        &lt;priority&gt;0.9&lt;/priority&gt;
    &lt;/url&gt;
        &lt;url&gt;
        &lt;loc&gt;https://furrydom-front.vercel.app/causes/purchase-land-animal-shelter&lt;/loc&gt;
        &lt;lastmod&gt;2026-08-14T17:57:26+00:00&lt;/lastmod&gt;
        &lt;changefreq&gt;daily&lt;/changefreq&gt;
        &lt;priority&gt;0.9&lt;/priority&gt;
    &lt;/url&gt;
        &lt;url&gt;
        &lt;loc&gt;https://furrydom-front.vercel.app/causes/medical-treatment-fund&lt;/loc&gt;
        &lt;lastmod&gt;2026-08-14T17:57:26+00:00&lt;/lastmod&gt;
        &lt;changefreq&gt;daily&lt;/changefreq&gt;
        &lt;priority&gt;0.9&lt;/priority&gt;
    &lt;/url&gt;
    &lt;/urlset&gt;
</code>
 </pre>
    </span>
<span id="execution-results-GETapi-sitemap-xml" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-sitemap-xml"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-sitemap-xml"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-sitemap-xml" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-sitemap-xml">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-sitemap-xml" data-method="GET"
      data-path="api/sitemap.xml"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-sitemap-xml', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-sitemap-xml"
                    onclick="tryItOut('GETapi-sitemap-xml');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-sitemap-xml"
                    onclick="cancelTryOut('GETapi-sitemap-xml');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-sitemap-xml"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/sitemap.xml</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-sitemap-xml"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-sitemap-xml"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="general-endpoints-POSTapi-webhooks-razorpay">Handle Razorpay incoming webhooks for subscription events.</h2>

<p>
</p>



<span id="example-requests-POSTapi-webhooks-razorpay">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/webhooks/razorpay" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/webhooks/razorpay"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-webhooks-razorpay">
</span>
<span id="execution-results-POSTapi-webhooks-razorpay" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-webhooks-razorpay"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-webhooks-razorpay"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-webhooks-razorpay" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-webhooks-razorpay">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-webhooks-razorpay" data-method="POST"
      data-path="api/webhooks/razorpay"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-webhooks-razorpay', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-webhooks-razorpay"
                    onclick="tryItOut('POSTapi-webhooks-razorpay');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-webhooks-razorpay"
                    onclick="cancelTryOut('POSTapi-webhooks-razorpay');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-webhooks-razorpay"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/webhooks/razorpay</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-webhooks-razorpay"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-webhooks-razorpay"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="general-endpoints-GETapi-attachments">GET api/attachments</h2>

<p>
</p>



<span id="example-requests-GETapi-attachments">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/attachments" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/attachments"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-attachments">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-attachments" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-attachments"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-attachments"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-attachments" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-attachments">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-attachments" data-method="GET"
      data-path="api/attachments"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-attachments', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-attachments"
                    onclick="tryItOut('GETapi-attachments');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-attachments"
                    onclick="cancelTryOut('GETapi-attachments');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-attachments"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/attachments</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-attachments"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-attachments"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="general-endpoints-GETapi-attachments--id-">GET api/attachments/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-attachments--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/attachments/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/attachments/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-attachments--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-attachments--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-attachments--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-attachments--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-attachments--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-attachments--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-attachments--id-" data-method="GET"
      data-path="api/attachments/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-attachments--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-attachments--id-"
                    onclick="tryItOut('GETapi-attachments--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-attachments--id-"
                    onclick="cancelTryOut('GETapi-attachments--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-attachments--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/attachments/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-attachments--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-attachments--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-attachments--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the attachment. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="general-endpoints-POSTapi-attachments">POST api/attachments</h2>

<p>
</p>



<span id="example-requests-POSTapi-attachments">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/attachments" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "name=architecto"\
    --form "attachable_type=architecto"\
    --form "attachable_id=16"\
    --form "file=@/tmp/php4ff9qrrl08b6fPzMsNL" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/attachments"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('name', 'architecto');
body.append('attachable_type', 'architecto');
body.append('attachable_id', '16');
body.append('file', document.querySelector('input[name="file"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-attachments">
</span>
<span id="execution-results-POSTapi-attachments" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-attachments"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-attachments"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-attachments" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-attachments">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-attachments" data-method="POST"
      data-path="api/attachments"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-attachments', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-attachments"
                    onclick="tryItOut('POSTapi-attachments');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-attachments"
                    onclick="cancelTryOut('POSTapi-attachments');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-attachments"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/attachments</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-attachments"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-attachments"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>file</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="file"                data-endpoint="POSTapi-attachments"
               value=""
               data-component="body">
    <br>
<p>Must be a file. Must be an image. Must not be greater than 20480 kilobytes. Example: <code>/tmp/php4ff9qrrl08b6fPzMsNL</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-attachments"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>attachable_type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="attachable_type"                data-endpoint="POSTapi-attachments"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>attachable_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="attachable_id"                data-endpoint="POSTapi-attachments"
               value="16"
               data-component="body">
    <br>
<p>Example: <code>16</code></p>
        </div>
        </form>

                    <h2 id="general-endpoints-DELETEapi-attachments--id-">DELETE api/attachments/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-attachments--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/attachments/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/attachments/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-attachments--id-">
</span>
<span id="execution-results-DELETEapi-attachments--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-attachments--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-attachments--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-attachments--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-attachments--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-attachments--id-" data-method="DELETE"
      data-path="api/attachments/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-attachments--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-attachments--id-"
                    onclick="tryItOut('DELETEapi-attachments--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-attachments--id-"
                    onclick="cancelTryOut('DELETEapi-attachments--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-attachments--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/attachments/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-attachments--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-attachments--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-attachments--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the attachment. Example: <code>architecto</code></p>
            </div>
                    </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
