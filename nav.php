<nav>
    <a class="<?php
    if ($path_parts['filename'] == "index") {
        print 'activePage';
    }
    ?>" href="index.php">Home</a>

    <a class="<?php
    if ($path_parts['filename'] == "detail") {
        print 'activePage';
    }
    ?>" href="detail.php">Recycling</a>

    <a class="<?php
    if ($path_parts['filename'] == "array") {
        print 'activePage';
    }
    ?>" href="array.php">States</a>

    <a class="<?php
    if ($path_parts['filename'] == "form") {
        print 'activePage';
    }
    ?>" href="form.php">Survey</a>
</nav>