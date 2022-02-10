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

namespace Google\Service\Dfareporting;

class Browser extends \Google\Model
{
  /**
   * @var string
   */
  public $browserVersionId;
  /**
   * @var string
   */
  public $dartId;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $majorVersion;
  /**
   * @var string
   */
  public $minorVersion;
  /**
   * @var string
   */
  public $name;

  /**
   * @param string
   */
  public function setBrowserVersionId($browserVersionId)
  {
    $this->browserVersionId = $browserVersionId;
  }
  /**
   * @return string
   */
  public function getBrowserVersionId()
  {
    return $this->browserVersionId;
  }
  /**
   * @param string
   */
  public function setDartId($dartId)
  {
    $this->dartId = $dartId;
  }
  /**
   * @return string
   */
  public function getDartId()
  {
    return $this->dartId;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param string
   */
  public function setMajorVersion($majorVersion)
  {
    $this->majorVersion = $majorVersion;
  }
  /**
   * @return string
   */
  public function getMajorVersion()
  {
    return $this->majorVersion;
  }
  /**
   * @param string
   */
  public function setMinorVersion($minorVersion)
  {
    $this->minorVersion = $minorVersion;
  }
  /**
   * @return string
   */
  public function getMinorVersion()
  {
    return $this->minorVersion;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Browser::class, 'Google_Service_Dfareporting_Browser');
