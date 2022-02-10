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

namespace Google\Service\Dataflow;

class CounterUpdate extends \Google\Model
{
  /**
   * @var bool
   */
  public $boolean;
  /**
   * @var bool
   */
  public $cumulative;
  protected $distributionType = DistributionUpdate::class;
  protected $distributionDataType = '';
  public $floatingPoint;
  protected $floatingPointListType = FloatingPointList::class;
  protected $floatingPointListDataType = '';
  protected $floatingPointMeanType = FloatingPointMean::class;
  protected $floatingPointMeanDataType = '';
  protected $integerType = SplitInt64::class;
  protected $integerDataType = '';
  protected $integerGaugeType = IntegerGauge::class;
  protected $integerGaugeDataType = '';
  protected $integerListType = IntegerList::class;
  protected $integerListDataType = '';
  protected $integerMeanType = IntegerMean::class;
  protected $integerMeanDataType = '';
  /**
   * @var array
   */
  public $internal;
  protected $nameAndKindType = NameAndKind::class;
  protected $nameAndKindDataType = '';
  /**
   * @var string
   */
  public $shortId;
  protected $stringListType = StringList::class;
  protected $stringListDataType = '';
  protected $structuredNameAndMetadataType = CounterStructuredNameAndMetadata::class;
  protected $structuredNameAndMetadataDataType = '';

  /**
   * @param bool
   */
  public function setBoolean($boolean)
  {
    $this->boolean = $boolean;
  }
  /**
   * @return bool
   */
  public function getBoolean()
  {
    return $this->boolean;
  }
  /**
   * @param bool
   */
  public function setCumulative($cumulative)
  {
    $this->cumulative = $cumulative;
  }
  /**
   * @return bool
   */
  public function getCumulative()
  {
    return $this->cumulative;
  }
  /**
   * @param DistributionUpdate
   */
  public function setDistribution(DistributionUpdate $distribution)
  {
    $this->distribution = $distribution;
  }
  /**
   * @return DistributionUpdate
   */
  public function getDistribution()
  {
    return $this->distribution;
  }
  public function setFloatingPoint($floatingPoint)
  {
    $this->floatingPoint = $floatingPoint;
  }
  public function getFloatingPoint()
  {
    return $this->floatingPoint;
  }
  /**
   * @param FloatingPointList
   */
  public function setFloatingPointList(FloatingPointList $floatingPointList)
  {
    $this->floatingPointList = $floatingPointList;
  }
  /**
   * @return FloatingPointList
   */
  public function getFloatingPointList()
  {
    return $this->floatingPointList;
  }
  /**
   * @param FloatingPointMean
   */
  public function setFloatingPointMean(FloatingPointMean $floatingPointMean)
  {
    $this->floatingPointMean = $floatingPointMean;
  }
  /**
   * @return FloatingPointMean
   */
  public function getFloatingPointMean()
  {
    return $this->floatingPointMean;
  }
  /**
   * @param SplitInt64
   */
  public function setInteger(SplitInt64 $integer)
  {
    $this->integer = $integer;
  }
  /**
   * @return SplitInt64
   */
  public function getInteger()
  {
    return $this->integer;
  }
  /**
   * @param IntegerGauge
   */
  public function setIntegerGauge(IntegerGauge $integerGauge)
  {
    $this->integerGauge = $integerGauge;
  }
  /**
   * @return IntegerGauge
   */
  public function getIntegerGauge()
  {
    return $this->integerGauge;
  }
  /**
   * @param IntegerList
   */
  public function setIntegerList(IntegerList $integerList)
  {
    $this->integerList = $integerList;
  }
  /**
   * @return IntegerList
   */
  public function getIntegerList()
  {
    return $this->integerList;
  }
  /**
   * @param IntegerMean
   */
  public function setIntegerMean(IntegerMean $integerMean)
  {
    $this->integerMean = $integerMean;
  }
  /**
   * @return IntegerMean
   */
  public function getIntegerMean()
  {
    return $this->integerMean;
  }
  /**
   * @param array
   */
  public function setInternal($internal)
  {
    $this->internal = $internal;
  }
  /**
   * @return array
   */
  public function getInternal()
  {
    return $this->internal;
  }
  /**
   * @param NameAndKind
   */
  public function setNameAndKind(NameAndKind $nameAndKind)
  {
    $this->nameAndKind = $nameAndKind;
  }
  /**
   * @return NameAndKind
   */
  public function getNameAndKind()
  {
    return $this->nameAndKind;
  }
  /**
   * @param string
   */
  public function setShortId($shortId)
  {
    $this->shortId = $shortId;
  }
  /**
   * @return string
   */
  public function getShortId()
  {
    return $this->shortId;
  }
  /**
   * @param StringList
   */
  public function setStringList(StringList $stringList)
  {
    $this->stringList = $stringList;
  }
  /**
   * @return StringList
   */
  public function getStringList()
  {
    return $this->stringList;
  }
  /**
   * @param CounterStructuredNameAndMetadata
   */
  public function setStructuredNameAndMetadata(CounterStructuredNameAndMetadata $structuredNameAndMetadata)
  {
    $this->structuredNameAndMetadata = $structuredNameAndMetadata;
  }
  /**
   * @return CounterStructuredNameAndMetadata
   */
  public function getStructuredNameAndMetadata()
  {
    return $this->structuredNameAndMetadata;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CounterUpdate::class, 'Google_Service_Dataflow_CounterUpdate');
