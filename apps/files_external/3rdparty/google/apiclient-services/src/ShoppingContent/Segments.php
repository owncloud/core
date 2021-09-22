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

class Segments extends \Google\Model
{
  public $brand;
  public $categoryL1;
  public $categoryL2;
  public $categoryL3;
  public $categoryL4;
  public $categoryL5;
  public $currencyCode;
  public $customLabel0;
  public $customLabel1;
  public $customLabel2;
  public $customLabel3;
  public $customLabel4;
  protected $dateType = Date::class;
  protected $dateDataType = '';
  public $offerId;
  public $productTypeL1;
  public $productTypeL2;
  public $productTypeL3;
  public $productTypeL4;
  public $productTypeL5;
  public $program;
  public $title;
  protected $weekType = Date::class;
  protected $weekDataType = '';

  public function setBrand($brand)
  {
    $this->brand = $brand;
  }
  public function getBrand()
  {
    return $this->brand;
  }
  public function setCategoryL1($categoryL1)
  {
    $this->categoryL1 = $categoryL1;
  }
  public function getCategoryL1()
  {
    return $this->categoryL1;
  }
  public function setCategoryL2($categoryL2)
  {
    $this->categoryL2 = $categoryL2;
  }
  public function getCategoryL2()
  {
    return $this->categoryL2;
  }
  public function setCategoryL3($categoryL3)
  {
    $this->categoryL3 = $categoryL3;
  }
  public function getCategoryL3()
  {
    return $this->categoryL3;
  }
  public function setCategoryL4($categoryL4)
  {
    $this->categoryL4 = $categoryL4;
  }
  public function getCategoryL4()
  {
    return $this->categoryL4;
  }
  public function setCategoryL5($categoryL5)
  {
    $this->categoryL5 = $categoryL5;
  }
  public function getCategoryL5()
  {
    return $this->categoryL5;
  }
  public function setCurrencyCode($currencyCode)
  {
    $this->currencyCode = $currencyCode;
  }
  public function getCurrencyCode()
  {
    return $this->currencyCode;
  }
  public function setCustomLabel0($customLabel0)
  {
    $this->customLabel0 = $customLabel0;
  }
  public function getCustomLabel0()
  {
    return $this->customLabel0;
  }
  public function setCustomLabel1($customLabel1)
  {
    $this->customLabel1 = $customLabel1;
  }
  public function getCustomLabel1()
  {
    return $this->customLabel1;
  }
  public function setCustomLabel2($customLabel2)
  {
    $this->customLabel2 = $customLabel2;
  }
  public function getCustomLabel2()
  {
    return $this->customLabel2;
  }
  public function setCustomLabel3($customLabel3)
  {
    $this->customLabel3 = $customLabel3;
  }
  public function getCustomLabel3()
  {
    return $this->customLabel3;
  }
  public function setCustomLabel4($customLabel4)
  {
    $this->customLabel4 = $customLabel4;
  }
  public function getCustomLabel4()
  {
    return $this->customLabel4;
  }
  /**
   * @param Date
   */
  public function setDate(Date $date)
  {
    $this->date = $date;
  }
  /**
   * @return Date
   */
  public function getDate()
  {
    return $this->date;
  }
  public function setOfferId($offerId)
  {
    $this->offerId = $offerId;
  }
  public function getOfferId()
  {
    return $this->offerId;
  }
  public function setProductTypeL1($productTypeL1)
  {
    $this->productTypeL1 = $productTypeL1;
  }
  public function getProductTypeL1()
  {
    return $this->productTypeL1;
  }
  public function setProductTypeL2($productTypeL2)
  {
    $this->productTypeL2 = $productTypeL2;
  }
  public function getProductTypeL2()
  {
    return $this->productTypeL2;
  }
  public function setProductTypeL3($productTypeL3)
  {
    $this->productTypeL3 = $productTypeL3;
  }
  public function getProductTypeL3()
  {
    return $this->productTypeL3;
  }
  public function setProductTypeL4($productTypeL4)
  {
    $this->productTypeL4 = $productTypeL4;
  }
  public function getProductTypeL4()
  {
    return $this->productTypeL4;
  }
  public function setProductTypeL5($productTypeL5)
  {
    $this->productTypeL5 = $productTypeL5;
  }
  public function getProductTypeL5()
  {
    return $this->productTypeL5;
  }
  public function setProgram($program)
  {
    $this->program = $program;
  }
  public function getProgram()
  {
    return $this->program;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
  /**
   * @param Date
   */
  public function setWeek(Date $week)
  {
    $this->week = $week;
  }
  /**
   * @return Date
   */
  public function getWeek()
  {
    return $this->week;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Segments::class, 'Google_Service_ShoppingContent_Segments');
