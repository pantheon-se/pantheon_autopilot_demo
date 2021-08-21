<?php

$tag = shell_exec('git describe --tags $(git rev-list --tags --max-count=1)');
$tag_pieces = explode('.', $tag);
$version = (int) array_pop($tag_pieces);
array_push($tag_pieces, $version+1);
$tag = implode('.', $tag_pieces);
echo trim($tag);