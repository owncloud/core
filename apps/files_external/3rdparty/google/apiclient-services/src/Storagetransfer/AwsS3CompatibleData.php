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

namespace Google\Service\Storagetransfer;

class AwsS3CompatibleData extends \Google\Model
{
  /**
   * @var string
   */
  public $bucketName;
  /**
   * @var string
   */
  public $endpoint;
  /**
   * @var string
   */
  public $path;
  /**
   * @var string
   */
  public $region;
  protected $s3MetadataType = S3CompatibleMetadata::class;
  protected $s3MetadataDataType = '';

  /**
   * @param string
   */
  public function setBucketName($bucketName)
  {
    $this->bucketName = $bucketName;
  }
  /**
   * @return string
   */
  public function getBucketName()
  {
    return $this->bucketName;
  }
  /**
   * @param string
   */
  public function setEndpoint($endpoint)
  {
    $this->endpoint = $endpoint;
  }
  /**
   * @return string
   */
  public function getEndpoint()
  {
    return $this->endpoint;
  }
  /**
   * @param string
   */
  public function setPath($path)
  {
    $this->path = $path;
  }
  /**
   * @return string
   */
  public function getPath()
  {
    return $this->path;
  }
  /**
   * @param string
   */
  public function setRegion($region)
  {
    $this->region = $region;
  }
  /**
   * @return string
   */
  public function getRegion()
  {
    return $this->region;
  }
  /**
   * @param S3CompatibleMetadata
   */
  public function setS3Metadata(S3CompatibleMetadata $s3Metadata)
  {
    $this->s3Metadata = $s3Metadata;
  }
  /**
   * @return S3CompatibleMetadata
   */
  public function getS3Metadata()
  {
    return $this->s3Metadata;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AwsS3CompatibleData::class, 'Google_Service_Storagetransfer_AwsS3CompatibleData');
