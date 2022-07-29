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

namespace Google\Service\YouTube;

class Cuepoint extends \Google\Model
{
  /**
   * @var string
   */
  public $cueType;
  /**
   * @var string
   */
  public $durationSecs;
  /**
   * @var string
   */
  public $etag;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $insertionOffsetTimeMs;
  /**
   * @var string
   */
  public $walltimeMs;

  /**
   * @param string
   */
  public function setCueType($cueType)
  {
    $this->cueType = $cueType;
  }
  /**
   * @return string
   */
  public function getCueType()
  {
    return $this->cueType;
  }
  /**
   * @param string
   */
  public function setDurationSecs($durationSecs)
  {
    $this->durationSecs = $durationSecs;
  }
  /**
   * @return string
   */
  public function getDurationSecs()
  {
    return $this->durationSecs;
  }
  /**
   * @param string
   */
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  /**
   * @return string
   */
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setInsertionOffsetTimeMs($insertionOffsetTimeMs)
  {
    $this->insertionOffsetTimeMs = $insertionOffsetTimeMs;
  }
  /**
   * @return string
   */
  public function getInsertionOffsetTimeMs()
  {
    return $this->insertionOffsetTimeMs;
  }
  /**
   * @param string
   */
  public function setWalltimeMs($walltimeMs)
  {
    $this->walltimeMs = $walltimeMs;
  }
  /**
   * @return string
   */
  public function getWalltimeMs()
  {
    return $this->walltimeMs;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Cuepoint::class, 'Google_Service_YouTube_Cuepoint');
