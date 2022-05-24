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

namespace Google\Service\CloudAsset;

class GoogleCloudAssetV1Edge extends \Google\Model
{
  /**
   * @var string
   */
  public $sourceNode;
  /**
   * @var string
   */
  public $targetNode;

  /**
   * @param string
   */
  public function setSourceNode($sourceNode)
  {
    $this->sourceNode = $sourceNode;
  }
  /**
   * @return string
   */
  public function getSourceNode()
  {
    return $this->sourceNode;
  }
  /**
   * @param string
   */
  public function setTargetNode($targetNode)
  {
    $this->targetNode = $targetNode;
  }
  /**
   * @return string
   */
  public function getTargetNode()
  {
    return $this->targetNode;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudAssetV1Edge::class, 'Google_Service_CloudAsset_GoogleCloudAssetV1Edge');
