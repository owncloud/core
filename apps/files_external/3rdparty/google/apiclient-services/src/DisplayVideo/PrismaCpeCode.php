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

namespace Google\Service\DisplayVideo;

class PrismaCpeCode extends \Google\Model
{
  /**
   * @var string
   */
  public $prismaClientCode;
  /**
   * @var string
   */
  public $prismaEstimateCode;
  /**
   * @var string
   */
  public $prismaProductCode;

  /**
   * @param string
   */
  public function setPrismaClientCode($prismaClientCode)
  {
    $this->prismaClientCode = $prismaClientCode;
  }
  /**
   * @return string
   */
  public function getPrismaClientCode()
  {
    return $this->prismaClientCode;
  }
  /**
   * @param string
   */
  public function setPrismaEstimateCode($prismaEstimateCode)
  {
    $this->prismaEstimateCode = $prismaEstimateCode;
  }
  /**
   * @return string
   */
  public function getPrismaEstimateCode()
  {
    return $this->prismaEstimateCode;
  }
  /**
   * @param string
   */
  public function setPrismaProductCode($prismaProductCode)
  {
    $this->prismaProductCode = $prismaProductCode;
  }
  /**
   * @return string
   */
  public function getPrismaProductCode()
  {
    return $this->prismaProductCode;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PrismaCpeCode::class, 'Google_Service_DisplayVideo_PrismaCpeCode');
