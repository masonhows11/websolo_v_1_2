<?php
// Home
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;


Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});


// admin index
Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push('پنل مدیریت', route('admin.dashboard'));
});

// admin / users
Breadcrumbs::for('admin.users', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('کاربران', route('admin.users'));
});

// admin / admins
Breadcrumbs::for('admin.admins', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('مدیران', route('admin.admins'));
});

// admin / profile
Breadcrumbs::for('admin.profile', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('پروفایل مدیریت', route('admin.profile'));
});

// admin / profile / mobile
Breadcrumbs::for('admin.mobile', function ($trail) {
    $trail->parent('admin.profile');
    $trail->push('ویرایش شماره موبایل', route('admin.change.mobile'));
});
// roles
Breadcrumbs::for('admin.roles', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('نقش ها', route('admin.roles'));
});

Breadcrumbs::for('admin.roles.assign.users', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('تخصیص نقش ها', route('admin.role.list.users'));
    $trail->push('لیست کاربران', route('admin.role.list.users'));
});

Breadcrumbs::for('admin.roles.assign', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('لیست کاربران', route('admin.role.list.users'));
    $trail->push('تخصیص نقش ها', route('admin.roles.assign.form'));
});


// perms
Breadcrumbs::for('admin.perms', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(' مجوز ها', route('admin.perms'));
});

Breadcrumbs::for('admin.perms.assign.users', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('تخصیص مجوزها', route('admin.perm.list.users'));
    $trail->push('لیست کاربران', route('admin.perm.list.users'));
});

Breadcrumbs::for('admin.perms.assign', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('لیست کاربران', route('admin.perm.list.users'));
    $trail->push('تخصیص مجوزها', route('admin.perms.assign.form'));

});


// category
Breadcrumbs::for('admin.category.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('دسته بندی ها', route('admin.category.index'));

});
Breadcrumbs::for('admin.category.create', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('دسته بندی جدید', route('admin.category.create'));

});
Breadcrumbs::for('admin.category.edit', function ($trail, $category) {
    $trail->parent('admin.dashboard');
    $trail->push('ویرایش دسته بندی', route('admin.category.edit', $category));
    $trail->push($category, route('admin.category.edit', $category));
});

// brands
Breadcrumbs::for('admin.brands', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('برند ها', route('admin.brand.index'));
});
Breadcrumbs::for('admin.brands.create', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('برند جدید', route('admin.brand.create'));
});
Breadcrumbs::for('admin.brands.edit', function ($trail, $brand) {
    $trail->parent('admin.dashboard');
    $trail->push('ویرایش برند', route('admin.brand.edit', $brand));
    $trail->push($brand, route('admin.brand.edit', $brand));
});

// assign brands
Breadcrumbs::for('admin.brand.category', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('تخصیص برند', route('admin.brand.category'));
    $trail->push('دسته بندی ها', route('admin.brand.category'));
});

Breadcrumbs::for('admin.brand.assign', function ($trail, $category) {
    $trail->parent('admin.dashboard');
    $trail->push('دسته بندی ها', route('admin.brand.category'));
    $trail->push($category, route('admin.brand.assign', $category));
});


// attribute

Breadcrumbs::for('admin.attribute', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('ویژگی ها', route('admin.attribute.index'));
});

Breadcrumbs::for('admin.attribute.create', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('ویژگی ها', route('admin.attribute.index'));
    $trail->push('ویژگی جدید', route('admin.attribute.create'));
});

Breadcrumbs::for('admin.attribute.edit', function ($trail, $attribute) {
    $trail->parent('admin.dashboard');
    $trail->push('ویرایش ویژگی', route('admin.attribute.edit', $attribute));
    $trail->push($attribute, route('admin.attribute.edit', $attribute));
});

// attribute value

Breadcrumbs::for('admin.attribute.value', function ($trail, $attribute) {
    $trail->parent('admin.dashboard');
    $trail->push('ویژگی ها', route('admin.attribute.index'));
    $trail->push($attribute, route('admin.attribute.value', $attribute));
});


Breadcrumbs::for('admin.attribute.value.create', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('ویژگی ها', route('admin.attribute.index'));
    $trail->push('مقدار جدید', route('admin.attribute.values.create'));
});
