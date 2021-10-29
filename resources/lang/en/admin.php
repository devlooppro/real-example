<?php

return [
    'permissions' => [
        // view admin as a whole
        'admin' => 'Login to admin panel',

        // manage translations
        'admin_translation_index' => 'View translations',
        'admin_translation_create' => 'Creating translations',
        'admin_translation_edit' => 'Editing translations',
        'admin_translation_rescan' => 'Rescan translations',

        // manage users (admins)
        'admin_admin-user_index' => 'View admin users',
        'admin_admin-user_create' => 'Creating admin users',
        'admin_admin-user_edit' => 'Editing admin users',
        'admin_admin-user_delete' => 'Deleting admin users',

        // roles
        'admin_role_index' => 'View roles',
        'admin_role_create' => 'Creating roles',
        'admin_role_edit' => 'Editing roles',
        'admin_role_delete' => 'Deleting roles',
        'admin_role_bulk-delete' => 'Bulk deleting roles',

        // users
        'admin_user_index' => 'View users',
        'admin_user_create' => 'Creating users',
        'admin_user_edit' => 'Editing users',
        'admin_user_delete' => 'Deleting users',

        // ability to upload
        'admin_upload' => 'Upload to admin panel',

        'admin_admin-user_impersonal-login' => 'Admin user impersonal-login'
    ],

    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',

            //Belongs to many relations
            'roles' => 'Roles',

        ],
    ],

    'multiselect' => [
        'actions' => [
            'can_not_remove_this_value' => 'Can not remove this value',
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];
