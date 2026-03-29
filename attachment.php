<?php
global $wp_query;

// 404 として扱う
$wp_query->set_404();
status_header(404);
nocache_headers();

// 404 テンプレートを表示
include get_query_template('404');
exit;