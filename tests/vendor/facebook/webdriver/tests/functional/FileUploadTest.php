<?php
// Copyright 2004-present Facebook. All Rights Reserved.
//
// Licensed under the Apache License, Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
//
//     http://www.apache.org/licenses/LICENSE-2.0
//
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.

/**
 * An example test case for php-webdriver.
 * 
 * Try running it by 
 *   '../vendor/phpunit/phpunit/phpunit.php ExampleTestCase.php'
 */
class FileUploadTest extends WebDriverTestCase {
  
  public function testFileUploading() {
    $this->driver->get($this->getTestPath('upload.html'));
    $file_input = $this->driver->findElement(WebDriverBy::id('upload'));
    $file_input->setFileDetector(new LocalFileDetector())
               ->sendKeys(__DIR__ . '/files/FileUploadTestCaseFile.txt');
    self::assertNotEquals($this->getFilePath(), $file_input->getAttribute('value'));
  }

  public function testUselessFileDetectorSendKeys() {
    $this->driver->get($this->getTestPath('upload.html'));
    $file_input = $this->driver->findElement(WebDriverBy::id('upload'));
    $file_input->sendKeys($this->getFilePath());
    self::assertEquals($this->getFilePath(), $file_input->getAttribute('value'));
  }
  
  private function getFilePath() {
    return __DIR__ . '/files/FileUploadTestCaseFile.txt';
  }
}
