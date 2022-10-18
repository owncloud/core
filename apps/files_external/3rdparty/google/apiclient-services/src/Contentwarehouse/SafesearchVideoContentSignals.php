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

class SafesearchVideoContentSignals extends \Google\Model
{
  /**
   * @var float[]
   */
  public $scores;
  /**
   * @var string
   */
  public $versionTag;
  protected $videoClassifierOutputType = SafesearchVideoClassifierOutput::class;
  protected $videoClassifierOutputDataType = '';

  /**
   * @param float[]
   */
  public function setScores($scores)
  {
    $this->scores = $scores;
  }
  /**
   * @return float[]
   */
  public function getScores()
  {
    return $this->scores;
  }
  /**
   * @param string
   */
  public function setVersionTag($versionTag)
  {
    $this->versionTag = $versionTag;
  }
  /**
   * @return string
   */
  public function getVersionTag()
  {
    return $this->versionTag;
  }
  /**
   * @param SafesearchVideoClassifierOutput
   */
  public function setVideoClassifierOutput(SafesearchVideoClassifierOutput $videoClassifierOutput)
  {
    $this->videoClassifierOutput = $videoClassifierOutput;
  }
  /**
   * @return SafesearchVideoClassifierOutput
   */
  public function getVideoClassifierOutput()
  {
    return $this->videoClassifierOutput;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SafesearchVideoContentSignals::class, 'Google_Service_Contentwarehouse_SafesearchVideoContentSignals');
