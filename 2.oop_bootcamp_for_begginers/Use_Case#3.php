<?php

class Content {
    public $title;
    public $text;

    public function __construct($title, $text) {
        $this->title = $title;
        $this->text = $text;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getText() {
        return $this->text;
    }

    public function showTitle() {
        return $this->title;
    }
}

class Article extends Content {
    private $Breaking;

    public function __construct($title, $text, $Breaking = false) {
        parent::__construct($title, $text);
        $this->Breaking = $Breaking;
    }

    public function showTitle() {
        if ($this->Breaking) {
            return "BREAKING: " . $this->title;
        }
        return $this->title;
    }
}

class Ads extends Content {
    public function showTitle() {
        return strtoupper($this->title);
    }
}

class Announce extends Content {
    public function showTitle() {
        return strtoupper($this->title ). " - apply now!";
    }
}

$contents = array(
    new Article("Article 1", "this is the text of article 1", true), //true pour le marquage 
    new Article("Article 2", "this is the text of article 2"),
    new Ads("Ads 1", "This is the text of ads 1"),
    new Announce("Announce 1", "this is the text of the announce")
);

foreach ($contents as $content) {
    echo "<h1>" . $content->showTitle() . "</h1>\n";
    echo "<p>" . $content->getText() . "</p>\n";
}
?>
