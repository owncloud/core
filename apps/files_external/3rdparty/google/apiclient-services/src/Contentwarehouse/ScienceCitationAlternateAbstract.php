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

class ScienceCitationAlternateAbstract extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "abstractDisplay" => "AbstractDisplay",
        "abstractHtml" => "AbstractHtml",
        "abstractHtmlLeftOver" => "AbstractHtmlLeftOver",
        "abstractLanguage" => "AbstractLanguage",
        "abstractText" => "AbstractText",
  ];
  /**
   * @var string
   */
  public $abstractDisplay;
  /**
   * @var string
   */
  public $abstractHtml;
  /**
   * @var string
   */
  public $abstractHtmlLeftOver;
  /**
   * @var string
   */
  public $abstractLanguage;
  /**
   * @var string
   */
  public $abstractText;

  /**
   * @param string
   */
  public function setAbstractDisplay($abstractDisplay)
  {
    $this->abstractDisplay = $abstractDisplay;
  }
  /**
   * @return string
   */
  public function getAbstractDisplay()
  {
    return $this->abstractDisplay;
  }
  /**
   * @param string
   */
  public function setAbstractHtml($abstractHtml)
  {
    $this->abstractHtml = $abstractHtml;
  }
  /**
   * @return string
   */
  public function getAbstractHtml()
  {
    return $this->abstractHtml;
  }
  /**
   * @param string
   */
  public function setAbstractHtmlLeftOver($abstractHtmlLeftOver)
  {
    $this->abstractHtmlLeftOver = $abstractHtmlLeftOver;
  }
  /**
   * @return string
   */
  public function getAbstractHtmlLeftOver()
  {
    return $this->abstractHtmlLeftOver;
  }
  /**
   * @param string
   */
  public function setAbstractLanguage($abstractLanguage)
  {
    $this->abstractLanguage = $abstractLanguage;
  }
  /**
   * @return string
   */
  public function getAbstractLanguage()
  {
    return $this->abstractLanguage;
  }
  /**
   * @param string
   */
  public function setAbstractText($abstractText)
  {
    $this->abstractText = $abstractText;
  }
  /**
   * @return string
   */
  public function getAbstractText()
  {
    return $this->abstractText;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ScienceCitationAlternateAbstract::class, 'Google_Service_Contentwarehouse_ScienceCitationAlternateAbstract');
