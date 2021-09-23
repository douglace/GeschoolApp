<?php

if (!function_exists("ges_ajax_response")) {
    function ges_ajax_response(bool $status = true, string $message = "", array $data = [])
    {
        return response()->json([
            "status" => $status,
            "message" => $message,
            "data" => $data
        ]);
    }
}