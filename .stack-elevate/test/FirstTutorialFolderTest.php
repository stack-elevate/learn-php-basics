<?php

use PHPUnit\Framework\TestCase;

class FirstTutorialFolderTest extends TestCase
{
    /** @var array */
    private $rootDir;

    protected function setUp(): void
    {
        $this->rootDir = $this->getRootDir();
    }

    /**
     * Gets the contents of the parent directory of the current working directory.
     *
     * @param string|null $dir Optional starting directory; defaults to the current working directory.
     * @return array The list of files/folders in the parent directory.
     * @throws Exception if the folder cannot be found or read.
     */
    private function getRootDir($dir = null): array
    {
        if ($dir === null) {
            $dir = getcwd();
        }
        // Go one directory up
        $pathToRoot = dirname($dir);

        if (!is_dir($pathToRoot)) {
            throw new \Exception("Could not find folder {$pathToRoot}");
        }

        $rootDir = scandir($pathToRoot);

        if ($rootDir === false) {
            throw new \Exception("Could not read folder {$pathToRoot}");
        }

        return $rootDir;
    }

    public function testIndexHtmlExists(): void
    {
        // Assert that 'index.html' is in the array of files.
        $this->assertContains(
            'index.html',
            $this->rootDir,
            "The folder should contain an index.html file."
        );
    }
}
