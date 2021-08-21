<?php

if ($github = getenv('GITHUB_CONTEXT')) {

    // Extract Github Actions variables
    $github = json_decode($github, true);

    // Get tags from API
    $opts = [
        'http' => [
            'method' => 'GET',
            'header' => [
                'User-Agent: PHP'
            ]
        ]
    ];
    $context = stream_context_create($opts);
    $content = json_decode(file_get_contents($github['event']['repository']['tags_url'], false, $context), true);

    // Extract tag and update by 1.
    $latest_tag = $content[0]['name'];
    $tag_pieces = explode('.', $latest_tag);
    $version = (int) array_pop($tag_pieces);
    array_push($tag_pieces, $version + 1);
    $tag = implode('.', $tag_pieces);
    putenv('TAG=$tag');
}