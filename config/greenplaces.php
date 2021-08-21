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
            "blogcategory_image" => $uploadsUrlPath."blogcategory_image/",
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
            "blogcategory_image" => $uploadsDocPath."blogcategory_image/",
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
    "send_notification_to_admin_email" => env('ADMIN_EMAIL_RECEIVE_NOTIFICAITON'),
    "contact_no" => "+919033752754",
    "email_id" => "axaymalaviya70@gmail.com",
    "facebook" => "axaymalaviya70@gmail.com",
    "instagram" => "axaymalaviya70@gmail.com",
    "twitter" => "axaymalaviya70@gmail.com",
    "address" => "H-52, Prarthana Bunglow, 6, Vasant Nagar, Ognaj, Ahmedabad, Gujarat 382481",
    "contact_no" => "+919033752754",

];
