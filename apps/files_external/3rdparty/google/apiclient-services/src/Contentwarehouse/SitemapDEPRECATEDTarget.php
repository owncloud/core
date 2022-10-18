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

class SitemapDEPRECATEDTarget extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "dEPRECATEDAnchor" => "DEPRECATEDAnchor",
        "dEPRECATEDRunningAnchor" => "DEPRECATEDRunningAnchor",
        "dEPRECATEDTitle" => "DEPRECATEDTitle",
  ];
  /**
   * @var string
   */
  public $dEPRECATEDAnchor;
  /**
   * @var bool
   */
  public $dEPRECATEDRunningAnchor;
  /**
   * @var string
   */
  public $dEPRECATEDTitle;
  /**
   * @var string
   */
  public $displaytitle;
  /**
   * @var int
   */
  public $score;
  /**
   * @var string
   */
  public $url;

  /**
   * @param string
   */
  public function setDEPRECATEDAnchor($dEPRECATEDAnchor)
  {
    $this->dEPRECATEDAnchor = $dEPRECATEDAnchor;
  }
  /**
   * @return string
   */
  public function getDEPRECATEDAnchor()
  {
    return $this->dEPRECATEDAnchor;
  }
  /**
   * @param bool
   */
  public function setDEPRECATEDRunningAnchor($dEPRECATEDRunningAnchor)
  {
    $this->dEPRECATEDRunningAnchor = $dEPRECATEDRunningAnchor;
  }
  /**
   * @return bool
   */
  public function getDEPRECATEDRunningAnchor()
  {
    return $this->dEPRECATEDRunningAnchor;
  }
  /**
   * @param string
   */
  public function setDEPRECATEDTitle($dEPRECATEDTitle)
  {
    $this->dEPRECATEDTitle = $dEPRECATEDTitle;
  }
  /**
   * @return string
   */
  public function getDEPRECATEDTitle()
  {
    return $this->dEPRECATEDTitle;
  }
  /**
   * @param string
   */
  public function setDisplaytitle($displaytitle)
  {
    $this->displaytitle = $displaytitle;
  }
  /**
   * @return string
   */
  public function getDisplaytitle()
  {
    return $this->displaytitle;
  }
  /**
   * @param int
   */
  public function setScore($score)
  {
    $this->score = $score;
  }
  /**
   * @return int
   */
  public function getScore()
  {
    return $this->score;
  }
  /**
   * @param string
   */
  public function setUrl($url)
  {
    $this->url = $url;
  }
  /**
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SitemapDEPRECATEDTarget::class, 'Google_Service_Contentwarehouse_SitemapDEPRECATEDTarget');
