<?php

if (!function_exists("get_board_branch_options")) {
function get_board_branch_options()
{
    return [
        "hongdae" => [
            "select_label" => "Hongdae",
            "badge_label" => "홍대",
        ],
        "nonsan" => [
            "select_label" => "Nonsan",
            "badge_label" => "논산",
        ],
        "chuncheon" => [
            "select_label" => "Chuncheon",
            "badge_label" => "춘천",
        ],
        "daechi" => [
            "select_label" => "Daechi",
            "badge_label" => "대치",
        ],
        "busan" => [
            "select_label" => "Busan",
            "badge_label" => "부산",
        ],
    ];
}
}

if (!function_exists("get_board_branch_badge_label")) {
function get_board_branch_badge_label($branch_key)
{
    $options = get_board_branch_options();

    if (isset($options[$branch_key])) {
        return $options[$branch_key]["badge_label"];
    }

    return "";
}
}
