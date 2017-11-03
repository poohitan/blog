<?php
$plugin_name = 'shadowbox';
$plugin_version = '0.3';
$plugin_description = $_l['lightbox_desc'];
$plugin_author = 'muhas';

register_hook('MQ_HEADER_BEFORE', 'shadowboxload');
register_hook('MQ_POST_SHOW_BEFORE', 'shadowboxpost');
register_hook('MQ_RSS_ENTRY_PROCESS_BEFORE', 'shadowboxpost');

?>
