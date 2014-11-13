<?php

/**
 * Includes file
 *
 * This file includes the entire VObject library in one go.
 * The benefit is that an autoloader is not needed, which is often faster.
 *
 * @copyright Copyright (C) 2007-2014 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */

// Begin includes
include __DIR__ . '/DateTimeParser.php';
include __DIR__ . '/ElementList.php';
include __DIR__ . '/FreeBusyGenerator.php';
include __DIR__ . '/Node.php';
include __DIR__ . '/Parameter.php';
include __DIR__ . '/ParseException.php';
include __DIR__ . '/Property.php';
include __DIR__ . '/Reader.php';
include __DIR__ . '/RecurrenceIterator.php';
include __DIR__ . '/Splitter/SplitterInterface.php';
include __DIR__ . '/StringUtil.php';
include __DIR__ . '/TimeZoneUtil.php';
include __DIR__ . '/Version.php';
include __DIR__ . '/Splitter/VCard.php';
include __DIR__ . '/Component.php';
include __DIR__ . '/Document.php';
include __DIR__ . '/Property/Compound.php';
include __DIR__ . '/Property/DateTime.php';
include __DIR__ . '/Property/MultiDateTime.php';
include __DIR__ . '/Splitter/ICalendar.php';
include __DIR__ . '/Component/VAlarm.php';
include __DIR__ . '/Component/VCalendar.php';
include __DIR__ . '/Component/VEvent.php';
include __DIR__ . '/Component/VFreeBusy.php';
include __DIR__ . '/Component/VJournal.php';
include __DIR__ . '/Component/VTodo.php';
// End includes
