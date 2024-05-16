<?php

use App\Models\Option;

function db_get_option( $key )
{
    return Option::where('key', $key)->first();
}

function db_set_option( $key, $value )
{
    Option::where('key', $key)->update(['value' => $value]);
}

function db_get_options( $array_with_keys )
{
    return Option::whereIn('key', $array_with_keys)->get();
}

function db_set_options( $array_key_value )
{
    $upsert = [];
    foreach ( $array_key_value as $key => $value ) {
        $upsert[] = [
            'key' => $key,
            'value' => $value
        ];
    }
    Option::upsert( $upsert, ['key'] );
}
