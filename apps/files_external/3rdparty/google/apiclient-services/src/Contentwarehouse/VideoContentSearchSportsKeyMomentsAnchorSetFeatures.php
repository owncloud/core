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

class VideoContentSearchSportsKeyMomentsAnchorSetFeatures extends \Google\Model
{
  /**
   * @var string
   */
  public $prefilterClassificationLabel;
  /**
   * @var string
   */
  public $tensorflowModelVersion;

  /**
   * @param string
   */
  public function setPrefilterClassificationLabel($prefilterClassificationLabel)
  {
    $this->prefilterClassificationLabel = $prefilterClassificationLabel;
  }
  /**
   * @return string
   */
  public function getPrefilterClassificationLabel()
  {
    return $this->prefilterClassificationLabel;
  }
  /**
   * @param string
   */
  public function setTensorflowModelVersion($tensorflowModelVersion)
  {
    $this->tensorflowModelVersion = $tensorflowModelVersion;
  }
  /**
   * @return string
   */
  public function getTensorflowModelVersion()
  {
    return $this->tensorflowModelVersion;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchSportsKeyMomentsAnchorSetFeatures::class, 'Google_Service_Contentwarehouse_VideoContentSearchSportsKeyMomentsAnchorSetFeatures');
