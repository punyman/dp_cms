<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ' :attribute 必须是被允许的.',
    'active_url'           => ' :attribute 不是有效URL.',
    'after'                => ' :attribute 必须在 :date 之后.',
    'alpha'                => ' :attribute 可能只包含字母.',
    'alpha_dash'           => ' :attribute 可能只包含字母，数字，下划线.',
    'alpha_num'            => ' :attribute 可能只包含字母和数字.',
    'array'                => ' :attribute 必须是数组.',
    'before'               => ' :attribute 必须在 :date 之前.',
    'between'              => [
        'numeric' => ' :attribute 必须在 :min 与 :max 之间.',
        'file'    => ' :attribute 必须在 :min 与 :max 千字节之间.',
        'string'  => ' :attribute 必须在 :min 与 :max 个字符之间.',
        'array'   => ' :attribute 必须有 :min 到 :max 项.',
    ],
    'boolean'              => ' :attribute 必须为true或false.',
    'confirmed'            => ' :attribute 不匹配.',
    'date'                 => ' :attribute 不是有效日期.',
    'date_format'          => ' :attribute 没有匹配 :format 这个格式.',
    'different'            => ' :attribute 和 :other 必须是不同的.',
    'digits'               => ' :attribute 必须是 :digits 这样的数字.',
    'digits_between'       => ' :attribute 必须在 :min 和 :max 之间.',
    'email'                => ' :attribute 必须是一个有效的邮件地址.',
    'exists'               => '所选的 :attribute 是无效的.',
    'filled'               => ' :attribute 是一个必须字段.',
    'image'                => ' :attribute 必须是一个图片.',
    'in'                   => '所选 :attribute 属性无效.',
    'integer'              => ' :attribute 必须是整数.',
    'ip'                   => ' :attribute 必须是有效的IP地址.',
    'json'                 => ' :attribute 必须是一个有效的JSON字符串.',
    'max'                  => [
        'numeric' => ' :attribute 可能不大于 :max.',
        'file'    => ' :attribute 不能大于 :max 字节.',
        'string'  => ' :attribute 可能不大于 :max 字符.',
        'array'   => ':attribute 不能超过 :max 项.',
    ],
    'mimes'                => ':attribute 必须是 type: :values 文件.',
    'min'                  => [
        'numeric' => ':attribute 必须至少 :min.',
        'file'    => ':attribute 必须至少 :min 字节.',
        'string'  => ':attribute 必须至少 :min 个字符.',
        'array'   => ':attribute 必须至少有 :min 项.',
    ],
    'not_in'               => '所选 :attribute 无效.',
    'numeric'              => ':attribute 必须是一个数字.',
    'regex'                => ':attribute 是一个无效的格式.',
    'required'             => ':attribute 字段是必须的.',
    'required_if'          => ':attribute 是必需的， 当 :other 是 :value.',
    'required_unless'      => ':attribute 字段是必须的，除非 :other 在 :values.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => 'The :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'The :attribute must be :size.',
        'file'    => 'The :attribute must be :size kilobytes.',
        'string'  => 'The :attribute must be :size characters.',
        'array'   => 'The :attribute must contain :size items.',
    ],
    'string'               => 'The :attribute must be a string.',
    'timezone'             => 'The :attribute must be a valid zone.',
    'unique'               => 'The :attribute has already been taken.',
    'url'                  => 'The :attribute format is invalid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
