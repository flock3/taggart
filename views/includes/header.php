<!DOCTYPE html>
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title><?php echo isset($title) ? $title : 'Taggart' ?></title>
    <link rel="stylesheet" href="/html/stylesheets/foundation.min.css">
    <link rel="stylesheet" href="/html//stylesheets/app.css">
    <script src="/html//javascripts/modernizr.foundation.js"></script>
</head>
<body>

<div class="row">
    <nav class="top-bar">
        <ul class="title-area">
            <!-- Title Area -->
            <li class="name">
                <h1><a href="/">Taggart</a></h1>
            </li>

        </ul>

        <section class="top-bar-section">
            <!-- Left Nav Section -->
            <ul class="right">
                <li class="divider"></li>
                <li class="active"><a href="#">Main Item 1</a></li>
                <li class="divider"></li>
                <li><a href="#">Main Item 2</a></li>
                <li class="divider"></li>
                <li class="has-dropdown"><a href="#">Main Item 3</a>

                    <ul class="dropdown">
                        <li class="has-dropdown"><a href="#">Dropdown Level 1a</a>

                            <ul class="dropdown">
                                <li><label>Dropdown Level 2 Label</label></li>
                                <li><a href="#">Dropdown Level 2a</a></li>
                                <li><a href="#">Dropdown Level 2b</a></li>
                                <li class="has-dropdown"><a href="#">Dropdown Level 2c</a>

                                    <ul class="dropdown">
                                        <li><label>Dropdown Level 3 Label</label></li>
                                        <li><a href="#">Dropdown Level 3a</a></li>
                                        <li><a href="#">Dropdown Level 3b</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Dropdown Level 3c</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Dropdown Level 2d</a></li>
                                <li><a href="#">Dropdown Level 2e</a></li>
                                <li><a href="#">Dropdown Level 2f</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Dropdown Level 1b</a></li>
                        <li><a href="#">Dropdown Level 1c</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Dropdown Level 1d</a></li>
                        <li><a href="#">Dropdown Level 1e</a></li>
                        <li><a href="#">Dropdown Level 1f</a></li>
                        <li class="divider"></li>
                        <li><a href="#">See all &rarr;</a></li>
                    </ul>
                </li>
            </ul>
        </section>
    </nav>
</div>