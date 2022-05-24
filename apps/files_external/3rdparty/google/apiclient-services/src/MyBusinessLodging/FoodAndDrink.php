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

namespace Google\Service\MyBusinessLodging;

class FoodAndDrink extends \Google\Model
{
  /**
   * @var bool
   */
  public $bar;
  /**
   * @var string
   */
  public $barException;
  /**
   * @var bool
   */
  public $breakfastAvailable;
  /**
   * @var string
   */
  public $breakfastAvailableException;
  /**
   * @var bool
   */
  public $breakfastBuffet;
  /**
   * @var string
   */
  public $breakfastBuffetException;
  /**
   * @var bool
   */
  public $buffet;
  /**
   * @var string
   */
  public $buffetException;
  /**
   * @var bool
   */
  public $dinnerBuffet;
  /**
   * @var string
   */
  public $dinnerBuffetException;
  /**
   * @var bool
   */
  public $freeBreakfast;
  /**
   * @var string
   */
  public $freeBreakfastException;
  /**
   * @var bool
   */
  public $restaurant;
  /**
   * @var string
   */
  public $restaurantException;
  /**
   * @var int
   */
  public $restaurantsCount;
  /**
   * @var string
   */
  public $restaurantsCountException;
  /**
   * @var bool
   */
  public $roomService;
  /**
   * @var string
   */
  public $roomServiceException;
  /**
   * @var bool
   */
  public $tableService;
  /**
   * @var string
   */
  public $tableServiceException;
  /**
   * @var bool
   */
  public $twentyFourHourRoomService;
  /**
   * @var string
   */
  public $twentyFourHourRoomServiceException;
  /**
   * @var bool
   */
  public $vendingMachine;
  /**
   * @var string
   */
  public $vendingMachineException;

  /**
   * @param bool
   */
  public function setBar($bar)
  {
    $this->bar = $bar;
  }
  /**
   * @return bool
   */
  public function getBar()
  {
    return $this->bar;
  }
  /**
   * @param string
   */
  public function setBarException($barException)
  {
    $this->barException = $barException;
  }
  /**
   * @return string
   */
  public function getBarException()
  {
    return $this->barException;
  }
  /**
   * @param bool
   */
  public function setBreakfastAvailable($breakfastAvailable)
  {
    $this->breakfastAvailable = $breakfastAvailable;
  }
  /**
   * @return bool
   */
  public function getBreakfastAvailable()
  {
    return $this->breakfastAvailable;
  }
  /**
   * @param string
   */
  public function setBreakfastAvailableException($breakfastAvailableException)
  {
    $this->breakfastAvailableException = $breakfastAvailableException;
  }
  /**
   * @return string
   */
  public function getBreakfastAvailableException()
  {
    return $this->breakfastAvailableException;
  }
  /**
   * @param bool
   */
  public function setBreakfastBuffet($breakfastBuffet)
  {
    $this->breakfastBuffet = $breakfastBuffet;
  }
  /**
   * @return bool
   */
  public function getBreakfastBuffet()
  {
    return $this->breakfastBuffet;
  }
  /**
   * @param string
   */
  public function setBreakfastBuffetException($breakfastBuffetException)
  {
    $this->breakfastBuffetException = $breakfastBuffetException;
  }
  /**
   * @return string
   */
  public function getBreakfastBuffetException()
  {
    return $this->breakfastBuffetException;
  }
  /**
   * @param bool
   */
  public function setBuffet($buffet)
  {
    $this->buffet = $buffet;
  }
  /**
   * @return bool
   */
  public function getBuffet()
  {
    return $this->buffet;
  }
  /**
   * @param string
   */
  public function setBuffetException($buffetException)
  {
    $this->buffetException = $buffetException;
  }
  /**
   * @return string
   */
  public function getBuffetException()
  {
    return $this->buffetException;
  }
  /**
   * @param bool
   */
  public function setDinnerBuffet($dinnerBuffet)
  {
    $this->dinnerBuffet = $dinnerBuffet;
  }
  /**
   * @return bool
   */
  public function getDinnerBuffet()
  {
    return $this->dinnerBuffet;
  }
  /**
   * @param string
   */
  public function setDinnerBuffetException($dinnerBuffetException)
  {
    $this->dinnerBuffetException = $dinnerBuffetException;
  }
  /**
   * @return string
   */
  public function getDinnerBuffetException()
  {
    return $this->dinnerBuffetException;
  }
  /**
   * @param bool
   */
  public function setFreeBreakfast($freeBreakfast)
  {
    $this->freeBreakfast = $freeBreakfast;
  }
  /**
   * @return bool
   */
  public function getFreeBreakfast()
  {
    return $this->freeBreakfast;
  }
  /**
   * @param string
   */
  public function setFreeBreakfastException($freeBreakfastException)
  {
    $this->freeBreakfastException = $freeBreakfastException;
  }
  /**
   * @return string
   */
  public function getFreeBreakfastException()
  {
    return $this->freeBreakfastException;
  }
  /**
   * @param bool
   */
  public function setRestaurant($restaurant)
  {
    $this->restaurant = $restaurant;
  }
  /**
   * @return bool
   */
  public function getRestaurant()
  {
    return $this->restaurant;
  }
  /**
   * @param string
   */
  public function setRestaurantException($restaurantException)
  {
    $this->restaurantException = $restaurantException;
  }
  /**
   * @return string
   */
  public function getRestaurantException()
  {
    return $this->restaurantException;
  }
  /**
   * @param int
   */
  public function setRestaurantsCount($restaurantsCount)
  {
    $this->restaurantsCount = $restaurantsCount;
  }
  /**
   * @return int
   */
  public function getRestaurantsCount()
  {
    return $this->restaurantsCount;
  }
  /**
   * @param string
   */
  public function setRestaurantsCountException($restaurantsCountException)
  {
    $this->restaurantsCountException = $restaurantsCountException;
  }
  /**
   * @return string
   */
  public function getRestaurantsCountException()
  {
    return $this->restaurantsCountException;
  }
  /**
   * @param bool
   */
  public function setRoomService($roomService)
  {
    $this->roomService = $roomService;
  }
  /**
   * @return bool
   */
  public function getRoomService()
  {
    return $this->roomService;
  }
  /**
   * @param string
   */
  public function setRoomServiceException($roomServiceException)
  {
    $this->roomServiceException = $roomServiceException;
  }
  /**
   * @return string
   */
  public function getRoomServiceException()
  {
    return $this->roomServiceException;
  }
  /**
   * @param bool
   */
  public function setTableService($tableService)
  {
    $this->tableService = $tableService;
  }
  /**
   * @return bool
   */
  public function getTableService()
  {
    return $this->tableService;
  }
  /**
   * @param string
   */
  public function setTableServiceException($tableServiceException)
  {
    $this->tableServiceException = $tableServiceException;
  }
  /**
   * @return string
   */
  public function getTableServiceException()
  {
    return $this->tableServiceException;
  }
  /**
   * @param bool
   */
  public function setTwentyFourHourRoomService($twentyFourHourRoomService)
  {
    $this->twentyFourHourRoomService = $twentyFourHourRoomService;
  }
  /**
   * @return bool
   */
  public function getTwentyFourHourRoomService()
  {
    return $this->twentyFourHourRoomService;
  }
  /**
   * @param string
   */
  public function setTwentyFourHourRoomServiceException($twentyFourHourRoomServiceException)
  {
    $this->twentyFourHourRoomServiceException = $twentyFourHourRoomServiceException;
  }
  /**
   * @return string
   */
  public function getTwentyFourHourRoomServiceException()
  {
    return $this->twentyFourHourRoomServiceException;
  }
  /**
   * @param bool
   */
  public function setVendingMachine($vendingMachine)
  {
    $this->vendingMachine = $vendingMachine;
  }
  /**
   * @return bool
   */
  public function getVendingMachine()
  {
    return $this->vendingMachine;
  }
  /**
   * @param string
   */
  public function setVendingMachineException($vendingMachineException)
  {
    $this->vendingMachineException = $vendingMachineException;
  }
  /**
   * @return string
   */
  public function getVendingMachineException()
  {
    return $this->vendingMachineException;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FoodAndDrink::class, 'Google_Service_MyBusinessLodging_FoodAndDrink');
