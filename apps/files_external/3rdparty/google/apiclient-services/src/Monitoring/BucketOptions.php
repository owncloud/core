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

namespace Google\Service\Monitoring;

class BucketOptions extends \Google\Model
{
  protected $explicitBucketsType = Explicit::class;
  protected $explicitBucketsDataType = '';
  protected $exponentialBucketsType = Exponential::class;
  protected $exponentialBucketsDataType = '';
  protected $linearBucketsType = Linear::class;
  protected $linearBucketsDataType = '';

  /**
   * @param Explicit
   */
  public function setExplicitBuckets(Explicit $explicitBuckets)
  {
    $this->explicitBuckets = $explicitBuckets;
  }
  /**
   * @return Explicit
   */
  public function getExplicitBuckets()
  {
    return $this->explicitBuckets;
  }
  /**
   * @param Exponential
   */
  public function setExponentialBuckets(Exponential $exponentialBuckets)
  {
    $this->exponentialBuckets = $exponentialBuckets;
  }
  /**
   * @return Exponential
   */
  public function getExponentialBuckets()
  {
    return $this->exponentialBuckets;
  }
  /**
   * @param Linear
   */
  public function setLinearBuckets(Linear $linearBuckets)
  {
    $this->linearBuckets = $linearBuckets;
  }
  /**
   * @return Linear
   */
  public function getLinearBuckets()
  {
    return $this->linearBuckets;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BucketOptions::class, 'Google_Service_Monitoring_BucketOptions');
