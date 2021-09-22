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

class AwsS3Data extends \Google\Model
{
  protected $awsAccessKeyType = AwsAccessKey::class;
  protected $awsAccessKeyDataType = '';
  public $bucketName;
  public $path;
  public $roleArn;

  /**
   * @param AwsAccessKey
   */
  public function setAwsAccessKey(AwsAccessKey $awsAccessKey)
  {
    $this->awsAccessKey = $awsAccessKey;
  }
  /**
   * @return AwsAccessKey
   */
  public function getAwsAccessKey()
  {
    return $this->awsAccessKey;
  }
  public function setBucketName($bucketName)
  {
    $this->bucketName = $bucketName;
  }
  public function getBucketName()
  {
    return $this->bucketName;
  }
  public function setPath($path)
  {
    $this->path = $path;
  }
  public function getPath()
  {
    return $this->path;
  }
  public function setRoleArn($roleArn)
  {
    $this->roleArn = $roleArn;
  }
  public function getRoleArn()
  {
    return $this->roleArn;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AwsS3Data::class, 'Google_Service_Storagetransfer_AwsS3Data');
