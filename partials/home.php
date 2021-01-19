<?php
require "header.partial.php";
require 'home.elements.php';
require 'footer.partial.php';
include '../controllas/content.con.php';

$articles = get_content();
render_header();
render_body($articles);
render_footer();


