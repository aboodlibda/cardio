create table addresses
(
    id             bigint unsigned auto_increment
        primary key,
    address_line_1 text            not null,
    address_line_2 text            null,
    postal_code    varchar(191)    not null,
    country        varchar(191)    not null,
    city           varchar(191)    not null,
    phone_number   varchar(191)    not null,
    customer_id    bigint unsigned not null,
    created_at     timestamp       null,
    updated_at     timestamp       null
)
    collate = utf8mb4_unicode_ci;

create index addresses_customer_id_foreign
    on addresses (customer_id);

create table attribute_values
(
    id           bigint unsigned auto_increment
        primary key,
    value        varchar(191)    not null,
    attribute_id bigint unsigned not null,
    created_at   timestamp       null,
    updated_at   timestamp       null
)
    collate = utf8mb4_unicode_ci;

create index attribute_values_attribute_id_foreign
    on attribute_values (attribute_id);

create table attributes
(
    id         bigint unsigned auto_increment
        primary key,
    name       varchar(191) not null,
    created_at timestamp    null,
    updated_at timestamp    null
)
    collate = utf8mb4_unicode_ci;

create table cache
(
    `key`      varchar(191) not null
        primary key,
    value      mediumtext   not null,
    expiration int          not null
)
    collate = utf8mb4_unicode_ci;

create table cache_locks
(
    `key`      varchar(191) not null
        primary key,
    owner      varchar(191) not null,
    expiration int          not null
)
    collate = utf8mb4_unicode_ci;

create table categories
(
    id          bigint unsigned auto_increment
        primary key,
    parent_id   int                         null,
    name        json                        not null,
    description json                        null,
    image       varchar(191)                null,
    status      enum ('active', 'inactive') not null,
    slug        varchar(191)                null,
    created_at  timestamp                   null,
    updated_at  timestamp                   null,
    constraint categories_slug_unique
        unique (slug)
)
    collate = utf8mb4_unicode_ci;

create table category_products
(
    id          bigint unsigned auto_increment
        primary key,
    category_id bigint unsigned not null,
    product_id  bigint unsigned not null,
    created_at  timestamp       null,
    updated_at  timestamp       null
)
    collate = utf8mb4_unicode_ci;

create table coupon_products
(
    id         bigint unsigned auto_increment
        primary key,
    product_id bigint unsigned not null,
    coupon_id  bigint unsigned not null,
    created_at timestamp       null,
    updated_at timestamp       null
)
    collate = utf8mb4_unicode_ci;

create table coupons
(
    id             bigint unsigned auto_increment
        primary key,
    code           varchar(191)                                 not null,
    description    text                                         null,
    discount_value varchar(191)                                 not null,
    discount_type  enum ('percentage', 'fixed')                 not null,
    times_used     varchar(191)                default '0'      not null,
    max_used       varchar(191)                                 not null,
    status         enum ('active', 'inactive') default 'active' not null,
    start_date     date                                         not null,
    end_date       date                                         not null,
    created_at     timestamp                                    null,
    updated_at     timestamp                                    null,
    constraint coupons_code_unique
        unique (code)
)
    collate = utf8mb4_unicode_ci;

create table customers
(
    id                bigint unsigned auto_increment
        primary key,
    first_name        varchar(191)                not null,
    last_name         varchar(191)                not null,
    user_name         varchar(191)                not null,
    email             varchar(191)                not null,
    email_verified_at timestamp                   null,
    password          varchar(191)                not null,
    phone_number      varchar(191)                not null,
    status            enum ('active', 'inactive') not null,
    gender            enum ('male', 'female')     not null,
    remember_token    varchar(100)                null,
    created_at        timestamp                   null,
    updated_at        timestamp                   null,
    constraint customers_email_unique
        unique (email),
    constraint customers_phone_number_unique
        unique (phone_number),
    constraint customers_user_name_unique
        unique (user_name)
)
    collate = utf8mb4_unicode_ci;

create table failed_jobs
(
    id         bigint unsigned auto_increment
        primary key,
    uuid       varchar(191)                        not null,
    connection text                                not null,
    queue      text                                not null,
    payload    longtext                            not null,
    exception  longtext                            not null,
    failed_at  timestamp default CURRENT_TIMESTAMP not null,
    constraint failed_jobs_uuid_unique
        unique (uuid)
)
    collate = utf8mb4_unicode_ci;

create table images
(
    id         bigint unsigned auto_increment
        primary key,
    image      varchar(191)    not null,
    product_id bigint unsigned not null,
    created_at timestamp       null,
    updated_at timestamp       null
)
    collate = utf8mb4_unicode_ci;

create index images_product_id_foreign
    on images (product_id);

create table job_batches
(
    id             varchar(191) not null
        primary key,
    name           varchar(191) not null,
    total_jobs     int          not null,
    pending_jobs   int          not null,
    failed_jobs    int          not null,
    failed_job_ids longtext     not null,
    options        mediumtext   null,
    cancelled_at   int          null,
    created_at     int          not null,
    finished_at    int          null
)
    collate = utf8mb4_unicode_ci;

create table jobs
(
    id           bigint unsigned auto_increment
        primary key,
    queue        varchar(191)     not null,
    payload      longtext         not null,
    attempts     tinyint unsigned not null,
    reserved_at  int unsigned     null,
    available_at int unsigned     not null,
    created_at   int unsigned     not null
)
    collate = utf8mb4_unicode_ci;

create index jobs_queue_index
    on jobs (queue);

create table migrations
(
    id        int unsigned auto_increment
        primary key,
    migration varchar(191) not null,
    batch     int          not null
)
    collate = utf8mb4_unicode_ci;

create table order_items
(
    id         bigint unsigned auto_increment
        primary key,
    order_id   bigint unsigned not null,
    product_id bigint unsigned not null,
    quantity   int             not null,
    price      decimal(10, 2)  not null,
    subtotal   decimal(10, 2)  not null,
    created_at timestamp       null,
    updated_at timestamp       null
)
    collate = utf8mb4_unicode_ci;

create index order_items_order_id_foreign
    on order_items (order_id);

create index order_items_product_id_foreign
    on order_items (product_id);

create table orders
(
    id           bigint unsigned auto_increment
        primary key,
    customer_id  bigint unsigned                                         not null,
    order_number varchar(191)                                            not null,
    total_amount decimal(10, 2)                                          not null,
    status       enum ('pending', 'processing', 'completed', 'canceled') not null,
    coupon_id    bigint unsigned                                         null,
    created_at   timestamp                                               null,
    updated_at   timestamp                                               null,
    constraint orders_order_number_unique
        unique (order_number)
)
    collate = utf8mb4_unicode_ci;

create index orders_coupon_id_foreign
    on orders (coupon_id);

create index orders_customer_id_foreign
    on orders (customer_id);

create table password_reset_tokens
(
    email      varchar(191) not null
        primary key,
    token      varchar(191) not null,
    created_at timestamp    null
)
    collate = utf8mb4_unicode_ci;

create table payments
(
    id             bigint unsigned auto_increment
        primary key,
    order_id       bigint unsigned                                           not null,
    amount         decimal(10, 2)                                            not null,
    payment_method varchar(191)                                              not null,
    payment_status enum ('pending', 'completed', 'failed') default 'pending' not null,
    currency       varchar(191)                            default 'USD'     not null,
    transaction_id varchar(191)                                              null,
    gateway        varchar(191)                                              null,
    paid_at        timestamp                                                 null,
    created_at     timestamp                                                 null,
    updated_at     timestamp                                                 null
)
    collate = utf8mb4_unicode_ci;

create index payments_order_id_foreign
    on payments (order_id);

create table permissions
(
    id          bigint unsigned auto_increment
        primary key,
    role_id     bigint unsigned not null,
    name        varchar(191)    not null,
    permissions text            null,
    description varchar(191)    null,
    created_at  timestamp       null,
    updated_at  timestamp       null
)
    collate = utf8mb4_unicode_ci;

create index permissions_role_id_foreign
    on permissions (role_id);

create table product_attributes
(
    id           bigint unsigned auto_increment
        primary key,
    product_id   bigint unsigned not null,
    attribute_id bigint unsigned not null,
    created_at   timestamp       null,
    updated_at   timestamp       null
)
    collate = utf8mb4_unicode_ci;

create table product_tags
(
    id         bigint unsigned auto_increment
        primary key,
    product_id bigint unsigned not null,
    tag_id     bigint unsigned not null,
    created_at timestamp       null,
    updated_at timestamp       null
)
    collate = utf8mb4_unicode_ci;

create table products
(
    id               bigint unsigned auto_increment
        primary key,
    name             json                                                       not null,
    description      json                                                       not null,
    price            varchar(191)                                               not null,
    status           enum ('published', 'unpublished', 'draft') default 'draft' not null,
    user_id          bigint unsigned                                            not null,
    slug             varchar(191)                                               not null,
    quantity         varchar(191)                                               not null,
    discounted_price varchar(191)                                               not null,
    vat_amount       varchar(191)                                               null,
    discount_type    enum ('no_discount', 'percentage', 'fixed_price')          not null,
    tax_type         enum ('free', 'taxable_goods', 'downloadable_product')     not null,
    SKU              varchar(191)                                               null,
    created_at       timestamp                                                  null,
    updated_at       timestamp                                                  null,
    constraint products_sku_unique
        unique (SKU),
    constraint products_slug_unique
        unique (slug)
)
    collate = utf8mb4_unicode_ci;

create table roles
(
    id          bigint unsigned auto_increment
        primary key,
    name        varchar(191) not null,
    description varchar(191) null,
    created_at  timestamp    null,
    updated_at  timestamp    null
)
    collate = utf8mb4_unicode_ci;

create table sessions
(
    id            varchar(191)    not null
        primary key,
    user_id       bigint unsigned null,
    ip_address    varchar(45)     null,
    user_agent    text            null,
    payload       longtext        not null,
    last_activity int             not null
)
    collate = utf8mb4_unicode_ci;

create index sessions_last_activity_index
    on sessions (last_activity);

create index sessions_user_id_index
    on sessions (user_id);

create table sponsors
(
    id          bigint unsigned auto_increment
        primary key,
    name        varchar(191) not null,
    description text         null,
    logo        varchar(191) not null,
    created_at  timestamp    null,
    updated_at  timestamp    null
)
    collate = utf8mb4_unicode_ci;

create table tags
(
    id         bigint unsigned auto_increment
        primary key,
    name       varchar(191) not null,
    created_at timestamp    null,
    updated_at timestamp    null
)
    collate = utf8mb4_unicode_ci;

create table transactions
(
    id                     bigint unsigned auto_increment
        primary key,
    payment_id             bigint unsigned                                           not null,
    transaction_type       varchar(191)                                              not null,
    transaction_status     enum ('pending', 'completed', 'failed') default 'pending' not null,
    amount                 decimal(10, 2)                                            not null,
    gateway_transaction_id varchar(191)                                              null,
    error_message          varchar(191)                                              null,
    created_at             timestamp                                                 null,
    updated_at             timestamp                                                 null
)
    collate = utf8mb4_unicode_ci;

create index transactions_payment_id_foreign
    on transactions (payment_id);

create table users
(
    id                bigint unsigned auto_increment
        primary key,
    name              varchar(191)                not null,
    user_name         varchar(191)                not null,
    phone_number      varchar(191)                not null,
    avatar            varchar(191)                null,
    gender            enum ('male', 'female')     not null,
    status            enum ('active', 'inactive') not null,
    role_id           bigint unsigned             not null,
    email             varchar(191)                not null,
    email_verified_at timestamp                   null,
    password          varchar(191)                not null,
    remember_token    varchar(100)                null,
    created_at        timestamp                   null,
    updated_at        timestamp                   null,
    constraint users_email_unique
        unique (email),
    constraint users_phone_number_unique
        unique (phone_number),
    constraint users_user_name_unique
        unique (user_name)
)
    collate = utf8mb4_unicode_ci;

create table variant_values
(
    id                 bigint unsigned auto_increment
        primary key,
    variant_id         bigint unsigned not null,
    attribute_value_id bigint unsigned not null,
    created_at         timestamp       null,
    updated_at         timestamp       null
)
    collate = utf8mb4_unicode_ci;

create index variant_values_attribute_value_id_foreign
    on variant_values (attribute_value_id);

create index variant_values_variant_id_foreign
    on variant_values (variant_id);

create table variants
(
    id         bigint unsigned auto_increment
        primary key,
    product_id bigint unsigned not null,
    created_at timestamp       null,
    updated_at timestamp       null
)
    collate = utf8mb4_unicode_ci;

create index variants_product_id_foreign
    on variants (product_id);


