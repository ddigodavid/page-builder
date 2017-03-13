<?php
namespace App\Services;

class PageService
{

    public function removeDirectives($pageHtml)
    {
        $pageHtml = preg_replace("/directive=[\"|'](.*?)[\"|']|contenteditable=\"true\"/", '', $pageHtml);

        $pageHtml = preg_replace("/class=\\\"cke_editable cke_editable_inline cke_contents_ltr\\\"/", '', $pageHtml);
        $pageHtml = preg_replace("/role=\"textbox\"/", '', $pageHtml);
        $pageHtml = preg_replace("/spellcheck=\"false\"/", '', $pageHtml);
        $pageHtml = preg_replace("/aria-label=\"Rich Text Editor, editor[1-9]\"/", '', $pageHtml);
        $pageHtml = preg_replace("/title=\"Rich Text Editor, editor[1-9]\"/", '', $pageHtml);
        $pageHtml = preg_replace("/tabindex=\"[0-9]\"/", '', $pageHtml);

        return $pageHtml;
    }
}