<?php

class TemplateBuilder {
    private $mainContent;

    public function __construct(string $mainContent) {
        $this->mainContent = $mainContent;
    }

    public function displayWhole(): void {
        $this->displayStartOfTemplate();
        $this->displayMainContent();
        $this->displayEndOfTemplate();
    }

    private function displayStartOfTemplate(): void {
        ?>
            <!DOCTYPE html>
                <html>
                <head>
                    <meta charset="utf-8">
                    <link rel="stylesheet" href="template/style.css">
                </head>
                <body>
                    <h1>FizzBuzz</h1>
        <?php
    }

    private function displayMainContent(): void {
        echo $this->mainContent;
    }

    private function displayEndOfTemplate(): void {
        ?>
                </body>
            </html>
        <?php
    }
}
