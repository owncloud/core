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

class BlobstoreBlobRef extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "blobID" => "BlobID",
        "options" => "Options",
        "refID" => "RefID",
        "shardBin" => "ShardBin",
        "size" => "Size",
        "sourceV2BlobID" => "SourceV2BlobID",
        "v2ReadBlobToken" => "V2ReadBlobToken",
  ];
  /**
   * @var string
   */
  public $blobID;
  /**
   * @var string
   */
  public $options;
  /**
   * @var string
   */
  public $refID;
  /**
   * @var int
   */
  public $shardBin;
  /**
   * @var string
   */
  public $size;
  /**
   * @var string
   */
  public $sourceV2BlobID;
  /**
   * @var string
   */
  public $v2ReadBlobToken;

  /**
   * @param string
   */
  public function setBlobID($blobID)
  {
    $this->blobID = $blobID;
  }
  /**
   * @return string
   */
  public function getBlobID()
  {
    return $this->blobID;
  }
  /**
   * @param string
   */
  public function setOptions($options)
  {
    $this->options = $options;
  }
  /**
   * @return string
   */
  public function getOptions()
  {
    return $this->options;
  }
  /**
   * @param string
   */
  public function setRefID($refID)
  {
    $this->refID = $refID;
  }
  /**
   * @return string
   */
  public function getRefID()
  {
    return $this->refID;
  }
  /**
   * @param int
   */
  public function setShardBin($shardBin)
  {
    $this->shardBin = $shardBin;
  }
  /**
   * @return int
   */
  public function getShardBin()
  {
    return $this->shardBin;
  }
  /**
   * @param string
   */
  public function setSize($size)
  {
    $this->size = $size;
  }
  /**
   * @return string
   */
  public function getSize()
  {
    return $this->size;
  }
  /**
   * @param string
   */
  public function setSourceV2BlobID($sourceV2BlobID)
  {
    $this->sourceV2BlobID = $sourceV2BlobID;
  }
  /**
   * @return string
   */
  public function getSourceV2BlobID()
  {
    return $this->sourceV2BlobID;
  }
  /**
   * @param string
   */
  public function setV2ReadBlobToken($v2ReadBlobToken)
  {
    $this->v2ReadBlobToken = $v2ReadBlobToken;
  }
  /**
   * @return string
   */
  public function getV2ReadBlobToken()
  {
    return $this->v2ReadBlobToken;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BlobstoreBlobRef::class, 'Google_Service_Contentwarehouse_BlobstoreBlobRef');
