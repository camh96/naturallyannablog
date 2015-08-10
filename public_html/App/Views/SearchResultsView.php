<?php

namespace App\Views;

class SearchResultsView extends View
{
    public function render()
    {
        extract($this->data);

        $page = "search";
        $page_title = "Search Posts";

        include "templates/master.inc.php";
    }

    protected function content()
    {
        extract($this->data);
        include "templates/searchresults.inc.php";
    }
}
