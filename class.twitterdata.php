<?php

include_once("abstract.databoundobject.php");
include_once("class.pdofactory.php");

class TwitterData extends DataBoundObject {

    protected $URL;
    protected $AuthorName;
    protected $AuthorUrl;
    protected $Photo;

    protected function DefineTableName() {
        return("twitter_data");
    }

    protected function DefineRelationMap() {

        return(array(
            "id" => "ID",
            "url" => "URL",
            "author_name" => "AuthorName",
            "author_url" => "AuthorUrl",
            "photo" => "Photo",
        ));
    }
}


?>
