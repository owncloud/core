<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\Contentwarehouse;

class LegalCitationCourtDocumentPub extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "page" => "Page",
        "paragraph" => "Paragraph",
        "reporter" => "Reporter",
        "volume" => "Volume",
        "year" => "Year",
  ];
  /**
   * @var string
   */
  public $page;
  /**
   * @var string
   */
  public $paragraph;
  /**
   * @var string
   */
  public $reporter;
  /**
   * @var int
   */
  public $volume;
  /**
   * @var int
   */
  public $year;

  /**
   * @param string
   */
  public function setPage($page)
  {
    $this->page = $page;
  }
  /**
   * @return string
   */
  public function getPage()
  {
    return $this->page;
  }
  /**
   * @param string
   */
  public function setParagraph($paragraph)
  {
    $this->paragraph = $paragraph;
  }
  /**
   * @return string
   */
  public function getParagraph()
  {
    return $this->paragraph;
  }
  /**
   * @param string
   */
  public function setReporter($reporter)
  {
    $this->reporter = $reporter;
  }
  /**
   * @return string
   */
  public function getReporter()
  {
    return $this->reporter;
  }
  /**
   * @param int
   */
  public function setVolume($volume)
  {
    $this->volume = $volume;
  }
  /**
   * @return int
   */
  public function getVolume()
  {
    return $this->volume;
  }
  /**
   * @param int
   */
  public function setYear($year)
  {
    $this->year = $year;
  }
  /**
   * @return int
   */
  public function getYear()
  {
    return $this->year;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LegalCitationCourtDocumentPub::class, 'Google_Service_Contentwarehouse_LegalCitationCourtDocumentPub');
