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

namespace Google\Service\ShoppingContent;

class ReportRow extends \Google\Model
{
  protected $metricsType = Metrics::class;
  protected $metricsDataType = '';
  protected $productViewType = ProductView::class;
  protected $productViewDataType = '';
  protected $segmentsType = Segments::class;
  protected $segmentsDataType = '';

  /**
   * @param Metrics
   */
  public function setMetrics(Metrics $metrics)
  {
    $this->metrics = $metrics;
  }
  /**
   * @return Metrics
   */
  public function getMetrics()
  {
    return $this->metrics;
  }
  /**
   * @param ProductView
   */
  public function setProductView(ProductView $productView)
  {
    $this->productView = $productView;
  }
  /**
   * @return ProductView
   */
  public function getProductView()
  {
    return $this->productView;
  }
  /**
   * @param Segments
   */
  public function setSegments(Segments $segments)
  {
    $this->segments = $segments;
  }
  /**
   * @return Segments
   */
  public function getSegments()
  {
    return $this->segments;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ReportRow::class, 'Google_Service_ShoppingContent_ReportRow');
