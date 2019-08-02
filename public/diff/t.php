<?php

// include the Diff class
require_once './class.diff.php';

$diff = Diff::compareFiles("a.txt", "b.txt");

echo Diff::toTable($diff);


?>

<style>
    .diff td{
        vertical-align : top;
        white-space    : pre;
        white-space    : pre-wrap;
        font-family    : monospace;
    }
    .diff td.diffDeleted{
        background:#FFE0E0;
    }
    .diff td.diffInserted{
        background:#E0FFE0;
    }
</style>