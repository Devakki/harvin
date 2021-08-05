<?php

$uploadsUrlPath = 'uploads/';
$uploadsDocPath = "/uploads/";

return [

    "status_codes" => [
        "success" => "200",
        "success_with_empty" => "201",
        "auth_fail" => "401",
        "form_validation" => "422",
        "normal_error" => "403",
        "server_side" => "500",
    ],

    "path" => [
        //HTTP URL Paths [Eg. get image]
        //http://localhost:8000/storage/app/public/
        "url" => [
            "blog_image" => $uploadsUrlPath."blog_image/",
            "blog_full_image" => $uploadsUrlPath."blog_full_image/",
            "team_image" => $uploadsUrlPath."team_image/",
            "organization_image" => $uploadsUrlPath."organization_image/",
            "certifypost_image" => $uploadsUrlPath."certifypost_image/",
            "company_image" => $uploadsUrlPath."company_image/",
            "statics_image" => $uploadsUrlPath."statics_image/",
            "testimonial_image" => $uploadsUrlPath."testimonial_image/",
            "pledge_image" => $uploadsUrlPath."pledge_image/",
            "pledge_full_image" => $uploadsUrlPath."pledge_full_image/",
            "badge_image" => $uploadsUrlPath."badge_image/",
            "credibility_image" => $uploadsUrlPath."credibility_image/",
        ],

        //Storage Document Paths [Eg. store image]
        // /var/www/html/projectname/storage/
        "doc" => [
            "blog_image" => $uploadsDocPath."blog_image/",
            "blog_full_image" => $uploadsDocPath."blog_full_image/",
            "team_image" => $uploadsDocPath."team_image/",
            "organization_image" => $uploadsDocPath."organization_image/",
            "certifypost_image" => $uploadsDocPath."certifypost_image/",
            "company_image" => $uploadsDocPath."company_image/",
            "testimonial_image" => $uploadsDocPath."testimonial_image/",
            "statics_image" => $uploadsDocPath."statics_image/",
            "pledge_image" => $uploadsDocPath."pledge_image/",
            "pledge_full_image" => $uploadsDocPath."pledge_full_image/",
            "badge_image" => $uploadsDocPath."badge_image/",
            "credibility_image" => $uploadsDocPath."credibility_image/",
        ]
    ],
    "no_of_sustainable_blog_display_per_page" => 3,
    "no_of_client_story_display_per_page" => 4,
    "no_of_organization_display_home_page" => 16,
    "no_of_pledge_display_certify_page" => 6,
    "no_of_pledge_display_credibility_home_page" => 6,
    'recaptcha' => [
        'sitekey' => env('GOOGLE_RECAPTCHA_SITE_KEY'),
        'secret' => env('GOOGLE_RECAPTCHA_SECRET_KEY'),
    ],
    "no_of_popular_artical_display_per_page" => 3,
    "artical_id" => 3,
    "why_certify" => 4,
    "carbon_calculator_id" => 5,
    "no_of_latest_artical_display_per_page" => 8, 
    "carboncalculatorlink" =>  env('APP_URL'),
    "send_notification_to_admin_email" => env('ADMIN_EMAIL_RECEIVE_NOTIFICAITON'),
   
];
