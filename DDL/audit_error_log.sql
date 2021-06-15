create table audit_error_log
(
    id bigint GENERATED ALWAYS AS IDENTITY
        constraint error_log_pk
            primary key,
    type text not null,
    message text,
    exception_message text,
    ip inet,
    country_code text,
    method text,
    path text,
    parameters text,
    body text,
    exception_trace text,
    user_id integer not null,
    created_at timestamp with time zone default CURRENT_TIMESTAMP not null
);
