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

class Google_Service_CloudRetail_GoogleCloudRetailV2ProductInputConfig extends Google_Model
{
  protected $bigQuerySourceType = 'Google_Service_CloudRetail_GoogleCloudRetailV2BigQuerySource';
  protected $bigQuerySourceDataType = '';
  protected $gcsSourceType = 'Google_Service_CloudRetail_GoogleCloudRetailV2GcsSource';
  protected $gcsSourceDataType = '';
  protected $productInlineSourceType = 'Google_Service_CloudRetail_GoogleCloudRetailV2ProductInlineSource';
  protected $productInlineSourceDataType = '';

  /**
   * @param Google_Service_CloudRetail_GoogleCloudRetailV2BigQuerySource
   */
  public function setBigQuerySource(Google_Service_CloudRetail_GoogleCloudRetailV2BigQuerySource $bigQuerySource)
  {
    $this->bigQuerySource = $bigQuerySource;
  }
  /**
   * @return Google_Service_CloudRetail_GoogleCloudRetailV2BigQuerySource
   */
  public function getBigQuerySource()
  {
    return $this->bigQuerySource;
  }
  /**
   * @param Google_Service_CloudRetail_GoogleCloudRetailV2GcsSource
   */
  public function setGcsSource(Google_Service_CloudRetail_GoogleCloudRetailV2GcsSource $gcsSource)
  {
    $this->gcsSource = $gcsSource;
  }
  /**
   * @return Google_Service_CloudRetail_GoogleCloudRetailV2GcsSource
   */
  public function getGcsSource()
  {
    return $this->gcsSource;
  }
  /**
   * @param Google_Service_CloudRetail_GoogleCloudRetailV2ProductInlineSource
   */
  public function setProductInlineSource(Google_Service_CloudRetail_GoogleCloudRetailV2ProductInlineSource $productInlineSource)
  {
    $this->productInlineSource = $productInlineSource;
  }
  /**
   * @return Google_Service_CloudRetail_GoogleCloudRetailV2ProductInlineSource
   */
  public function getProductInlineSource()
  {
    return $this->productInlineSource;
  }
}
